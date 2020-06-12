<template>
    <div>
<v-toolbar dark flat color="grey-lighten">
    <v-toolbar-title>Users</v-toolbar-title>
    <v-divider
            class="mx-2"
            inset
            vertical
    ></v-divider>
    <v-spacer></v-spacer>
    <v-dialog v-model="dialog" max-width="700px">
        <v-btn v-if="$auth.can('create_user')" slot="activator"  color="primary" dark class="mb-2">Create New User</v-btn>
      
        <v-card>
            <v-card-title>
                <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
            <v-container grid-list-md>
                <v-layout wrap >
                    <v-flex xs12 >
                        <v-text-field v-model="editedItem.Name_En" label="Name English"></v-text-field>
                    </v-flex>                                
                    <v-flex xs12 >
                        <v-text-field v-model="editedItem.Name_Ar" label="Name Arabic"></v-text-field>
                    </v-flex>                                
                    <v-flex xs12 >
                        <v-text-field v-model="editedItem.Name_Ku" label="Name Kurdish"></v-text-field>
                    </v-flex>                                
                    <v-flex xs12 >
                        <v-text-field v-model="editedItem.Phone" label="Phone"></v-text-field>
                    </v-flex>                                

                    <v-flex xs12 >
                        <v-text-field v-model="editedItem.email" :rules="editedItem.emailrule" label="Email" required></v-text-field>
                    </v-flex>

                    <v-flex xs12 >
                        <v-text-field v-model="editedItem.password" label="password"></v-text-field>
                    </v-flex>

                    <v-flex xs12 >
                        <v-text-field v-model="editedItem.confirm_password" label="Confirm Password"></v-text-field>
                    </v-flex>
                                    
                    <v-flex xs12>
                        <h3>Department</h3>
                          <v-select
                              :items="allDepartments" 
                              item-value="id"
                              v-model="editedItem.Dep_id"
                              label="Departments"
                            item-text="Name_En"
                          ></v-select>
                    </v-flex>

                    <v-flex xs12>
                        <h3>Roles</h3>
                        <v-select
                                v-model="editedItem.role"
                                :items="allRoles"
                                label="Roles"
                                item-text="name"
                                return-object
                                multiple
                                chips
                        ></v-select>
                    </v-flex>

                    <!-- <v-flex xs12>
                        <v-select
                                v-model="editedItem.permissions"
                                :items="allPermissions"
                                label="Permissions"
                                item-text="name"
                                return-object
                                multiple
                                chips
                        ></v-select>
                    </v-flex> -->

                </v-layout>
            </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn  color="blue darken-1" flat @click="close">Cancel</v-btn>
                <v-btn  color="blue darken-1" flat @click="save">Save</v-btn>
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
                :items="User"
                :search="search"

                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td>{{ props.item.Name_En }}</td>
                <td class="text-xs-right">{{ props.item.email }}</td>
                <td class="text-xs-right" v-if="props.item.role">
                  <v-chip small color="primary" >{{ props.item.role.name }}</v-chip>
                 </td>
                <td class="text-xs-right" v-else>n/a</td>
                <td class="text-xs-right" v-if="props.item.department">{{ props.item.department.Name_En }}</td>
                <td class="text-xs-right" v-else>n/a</td>
                 <td class="text-xs-right" v-if="props.item.department">{{ props.item.department.Name_En }}</td>
                <td class="text-xs-right" v-else>n/a</td>
                <td class="text-xs-right">{{ props.item.created_at }}</td>
                <td class="justify-center layout px-0">
                    <v-icon
                    v-if="$auth.can('update_user')"
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                    >
                        edit
                    </v-icon>
                    <v-icon
                    v-if="$auth.can('delete_user')"
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
       valid: true,
      headers: [
        {text: 'Username', value: 'name'},
        {text: 'Email', value: 'email'},
        {text: 'Role', value: 'role'},
        {text: 'Department', value: 'role'},
        {text: 'Status', value: 'd'},
        {text: 'Created', value: 'created_at'},
        {text: 'Actions', value: 'name', sortable: false},
      ],
      User: [],
      editedIndex: -1,
      allRoles:[],
      allDepartments:[],
      allPermissions:[],
      editedItem: {
        Name_En: '',
        Name_Ku: '',
        Name_Ar: '',
        Phone:'',
        Dep_id:'',
        email: '',
      emailrule:[
                v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
        role:{},
        department:{},
        permissions:[],
        created_at: '',
      },
      defaultItem: {
        Name_En: '',
        Name_Ku: '',
        Name_Ar: '',
        Phone:'',
        Dep_id:'',
        email: '',
        role:{},
        department:{},
        permissions:[],
        created_at: '',

      },

    }),

    computed: {
      formTitle() {
        return this.editedIndex === -1 ? 'New User' : 'Edit User';
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

        axios.get('/api/users').then(response => {
          this.User =response.data.data;
        });

        axios.get('/api/roles').then(response=>this.allRoles=response.data.data);
        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);
        axios.get('/apimain/department').then(response => {
                this.allDepartments = response.data;
              });  
            },

      editItem(item) {
        this.editedIndex = this.User.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      deleteItem(item) {
        const index = this.User.indexOf(item);
        confirm('Are you sure you want to delete this item?') && this.User.splice(index, 1);

        axios.delete('/api/users/'+item.id).then(response=>console.log(response.data))

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
          Object.assign(this.User[this.editedIndex], this.editedItem);

          axios.put('/api/users/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));
        } else {
          this.User.push(this.editedItem);

          axios.post('/api/users/',this.editedItem).then(response=>console.log(response.data));
        }
        this.close();
      },
    },
  };
</script>