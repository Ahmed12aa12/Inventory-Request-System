<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Faculty</v-toolbar-title>
            <v-divider
                    class="mx-2"
                    inset
                    vertical
            ></v-divider>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="700px">
                <v-btn slot="activator" color="primary" dark class="mb-2">New Faculty</v-btn>
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
                                    <v-text-field v-model="editedItem.Name_Ku" label="Name kurdish"></v-text-field>
                                </v-flex>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.Name_Ar" label="Name Arabic"></v-text-field>
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
                :items="tableData"
                :search="search"
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td>{{ props.item.Name_En }}</td>
                <td>{{ props.item.created_at }}</td>
                <td class="justify-center layout px-0">
                    <v-icon
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                    >
                        edit
                    </v-icon>
                    <v-icon
                            small
                            @click="deleteItem(props.item)"
                    >
                        delete
                    </v-icon>
                </td>
            </template>
            <template slot="no-data">
                <v-btn color="primary" @click="initialize">Reset</v-btn>
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
        {text: 'Name ' ,value:'Name_En'},
        {text: 'Created At ' ,value:'value'},
        {text: 'Actions', sortable: false,value:'value'},
      ],
      tableData: [],
      editedIndex: -1,
      editedItem: {
        Name_En: '',
        Name_Ku: '',
        Name_Ar: '',  
      },
      defaultItem: {
        Name_En: '',
        Name_Ku: '',
        Name_Ar: '',
      },

    }),

    computed: {
      formTitle() {
        return this.editedIndex === -1 ? 'New Faculty' : 'Edit Faculty';
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
        axios.get('/apimain/faculty/').then(response => {
          this.tableData = response.data.data;
        });
      },

      editItem(item) {
        this.editedIndex = this.tableData.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      deleteItem(item) {
        const index = this.tableData.indexOf(item);
        confirm('Are you sure you want to delete this item?') && this.tableData.splice(index, 1);

        axios.delete('/apimain/faculty/'+item.id).then(response=>console.log(response.data))

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
           Object.assign(this.tableData[this.editedIndex], this.editedItem);
           
         axios.put('/apimain/faculty/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));

        } else {
          this.tableData.push(this.editedItem);

          axios.post('/apimain/faculty/',this.editedItem).then(response=>console.log(response.data));
        }
        this.close();
      },
    },
  };
</script>