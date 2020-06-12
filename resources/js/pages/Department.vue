<template>
<div>
  <v-toolbar dark flat color="grey-lighten">
      <v-toolbar-title>Department</v-toolbar-title>
      <v-divider
              class="mx-2"
              inset
              vertical
      ></v-divider>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="700px">
          <v-btn v-if="$auth.can('create_department')||$auth.isAdmin()" slot="activator" color="primary" dark class="mb-2">New Department</v-btn>
          <v-card>
              <v-card-title>
                  <span class="headline">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text>
                  <v-container grid-list-md>
                      <v-layout wrap>
                          <v-flex xs12 >
                              <v-text-field v-model="editedItem.Name_En" label="Name English"></v-text-field>
                          </v-flex>
                          <v-flex xs12 >
                              <v-text-field v-model="editedItem.Name_Ku" label="Name Kurdish"></v-text-field>
                          </v-flex>
                          <v-flex xs12 >
                              <v-text-field v-model="editedItem.Name_Ar" label="Name Arabic"></v-text-field>
                          </v-flex>
                          
                       <v-flex xs12>

                        <v-select
                         :items="allfaculties" 
                         item-value="id"
                         v-model="editedItem.faculty_id"
                        label="Faculty"
                       item-text="Name_En"
                        ></v-select>
                       </v-flex>
                      </v-layout>
                  </v-container>
              </v-card-text>

              <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="red" flat @click="close">Cancel</v-btn>
                  <v-btn color="green" flat @click="save">Save</v-btn>
              </v-card-actions>
          </v-card>
      </v-dialog>
  </v-toolbar>
  <v-spacer></v-spacer>
          <v-text-field
          v-model="search"
          append-icon="search"
          label="Search"
          single-line
          hide-details
  ></v-text-field>
    <v-spacer></v-spacer>
  <v-data-table
          :headers="headers"
          :items="departments"
          :search="search"
          class="elevation-1"
  >
      <template slot="items" slot-scope="props">
          <td>{{ props.item.Name_En }}</td>
          <td class="text-xs-right" v-if="props.item.faculty">
           {{ props.item.faculty.Name_En }}</td>
          <td>{{ props.item.created_at }}</td>
          <td class="justify-center layout px-0">
              <v-icon
              v-if="$auth.can('update_department')||$auth.isAdmin()"
                      small
                      class="mr-2"
                      @click="editItem(props.item)"
              >
                  edit
              </v-icon>
              <v-icon
              v-if="$auth.can('delete_department')||$auth.isAdmin()"
                      small
                      @click="deleteItem(props.item)"
              >
                  delete
              </v-icon>
          </td>
      </template>
      <template slot="no-data">
          <v-btn v-if="$auth.can('reset')" color="primary" @click="initialize">Reset</v-btn>
      </template>
  </v-data-table>
</div>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      
        search: '',
      headers: [
        {text: 'Name ' ,value:'name'},
        {text: 'Faculty ' ,value:'name'},
        {text: 'Created At ' ,value:'value'},
        {text: 'Actions', sortable: false,value:'value'},
      ],
      departments: [],
      allfaculties: [],
      editedIndex: -1,
      editedItem: {
      Name_En: '',
      Name_Ku: '',
      Name_Ar: '',
       faculty_id:'',
       faculty:{}


      },

      defaultItem: {
       Name_En: '',
      Name_Ku: '',
      Name_Ar: '',
       faculty_id:'',
       faculty:{}
      


      },

    }),

    computed: {
      formTitle() {
        return this.editedIndex === -1 ? 'New department' : 'Edit department';
      },
    },

    watch: {
      dialog(val) {
        val || this.close();
      },
    },

    created() {
      this.initialize();
    },

    methods: {
      initialize() {
        axios.get('/apimain/department/').then(response => {
          this.departments = response.data;
        });
            axios.get('/apimain/faculty/').then(response => {
          this.allfaculties = response.data.data;
        });

      },

      editItem(item) {
        this.editedIndex = this.departments.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      deleteItem(item) {
        const index = this.departments.indexOf(item);
        confirm('Are you sure you want to delete this item?') && this.departments.splice(index, 1);

        axios.delete('/apimain/department/'+item.id).then(response=>console.log(response.data))

      },

      close() {
        this.dialog = false;
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem);
          this.editedIndex = -1;
        }, 300);
      },

      save() {
        if (this.editedIndex > -1) {
         axios.put('/apimain/department/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));
           Object.assign(this.departments[this.editedIndex], this.editedItem);

        } else {
          this.departments.push(this.editedItem);

          axios.post('/apimain/department/',this.editedItem).then(response=>console.log(response.data));
        }
        this.close();
      },
    },
  };
</script>
