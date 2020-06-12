<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Roles</v-toolbar-title>
            <v-divider
                    class="mx-2"
                    inset
                    vertical
            ></v-divider>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="700px">
                <v-btn v-if="$auth.can('create_role')||$auth.isAdmin()" slot="activator" color="primary" dark class="mb-2">create New role</v-btn>
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12 >
                                    <v-text-field v-model="editedItem.name" label="Name"></v-text-field>
                                </v-flex>

                                <v-flex xs12>
                                    <v-select
                                            v-model="editedItem.permissions"
                                            :items="allPermissions"
                                            label="Permissions"
                                            item-text="name"
                                            return-object
                                            multiple
                                            chips
                                    ></v-select>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
                        <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
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
                <td>{{ props.item.name }}</td>
                <td>{{ props.item.created_at }}</td>
                <td style="width: 40%" v-if="props.item.permissions">
                    <v-chip
                            small
                            v-for="(permission,index) in props.item.permissions"
                            color="primary" text-color="white"
                            :key="index"
                    >
                        {{permission.name}}
                    </v-chip>
                </td>
                <td v-else>n/a</td>
                <td class="justify-center layout px-0">
                    <v-icon
                    v-if="$auth.can('update_role')||$auth.isAdmin()"
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                    >
                        edit
                    </v-icon>
                    <v-icon
                    v-if="$auth.can('delete_role')||$auth.isAdmin()"
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
      search:'',
      headers: [
        {text: 'Name', value: 'name'},
        {text: 'create At', value: 'name'},
        {text: 'Permissions', value: 'name'},
        {text: 'Actions', value: 'name', sortable: false},
      ],
      tableData: [],
      editedIndex: -1,
      allPermissions:[],
      editedItem: {
        name: '',
        created_at: '',
      },
      defaultItem: {
        name: '',
        created_at: '',
      },

    }),

    computed: {
      formTitle() {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item';
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

        axios.get('/api/roles').then(response => {
          this.tableData = response.data.data;
        });

        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);
      },

      editItem(item) {
        this.editedIndex = this.tableData.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      deleteItem(item) {
        const index = this.tableData.indexOf(item);
        confirm('Are you sure you want to delete this item?') && this.tableData.splice(index, 1);

        axios.delete('/api/roles/'+item.id).then(response=>console.log(response.data))

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

          axios.put('/api/roles/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));
        } else {
          this.tableData.push(this.editedItem);

          axios.post('/api/roles', this.editedItem).then(response=>console.log(response.data));
        }
        this.close();
      },
    },
  };
</script>