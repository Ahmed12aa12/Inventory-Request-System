<template>
    <div class="container">
      <div class="header">  <h2>Dashboard</h2> <br/><br/></div>

     <div class="content"  >
           <div class="row" v-if="$auth.isAdmin()" >
            <div class="col mt-3">
            <div class="card ">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                  <div class="align-self-center" style=" font-size:10px">
                    <i class="fas fa-building red--text  float-left fa-5x"></i>
                  </div>
                      <div class=" ml-lg-5 text-right">
                        <h3 class="black--text" v-if="count">{{ count['faculty'] }}</h3>
                        <span style="font-size:20px" class="black--text"> Faculties</span>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>

            <div class="col mt-3" >
            <div class="card ">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                  <div class="align-self-center" style=" font-size:10px">
                    <i class="fas fa-gopuram yellow--text float-left fa-5x"></i>
                  </div>
                      <div class=" ml-lg-5 text-right">
                        <h3 class="black--text" v-if="count">{{ count['dep'] }}</h3>
                        <span style="font-size:20px" class="black--text"> Departments</span>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
            
            <div class="col mt-3">
            <div class="card ">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                  <div class="align-self-center" style=" font-size:10px">
                    <i class="fas fa-users green--text float-left fa-5x"></i>
                  </div>
                      <div class=" ml-lg-5 text-right">
                        <h3 class="black--text" v-if="count">{{ count['user'] }}</h3>
                        <span style="font-size:20px" class="black--text"> Users</span>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>

        </div>  

      <div class="row " v-if="$auth.isAdmin()">
          <div class="col mt-2">
          <div class="card ">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                <div class="align-self-center" style=" font-size:10px">
                  <i class="fas fa-file-signature blue--text float-left fa-5x"></i>
                </div>
                    <div class=" ml-lg-5 text-right">
                      <h3 class="black--text" v-if="count">{{ count['order'] }}</h3>
                      <span style="font-size:20px" class="black--text"> Orders</span>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col mt-2">
          <div class="card ">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                <div class="align-self-center" style=" font-size:10px">
                  <i class="fas fa-sitemap grey--text float-left fa-5x"></i>
                </div>
                    <div class=" ml-lg-5 text-right">
                      <h3 class="black--text" v-if="count">{{ count['category'] }}</h3>
                      <span style="font-size:20px" class="black--text"> Categories</span>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col mt-2">
          <div class="card ">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                <div class="align-self-center" style=" font-size:10px">
                  <i class="fas fa-truck-loading orange--text float-left fa-5x"></i>
                </div>
                    <div class=" ml-lg-5 text-right">
                      <h3 class="black--text" v-if="count">{{ count['item'] }}</h3>
                      <span style="font-size:20px" class="black--text"> Items</span>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div> 

     </div>
     
       <div class="row">
          <div class="col-12 mt-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title blue--text" >Requests</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" >
                    <button class="btn btn-primary btn-block" @click="newModal">
                        Request
                        <i class="fa fa-arrow-alt-circle-right white--text "></i>
                        </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Second Name</th>
                      <th>Third Name</th>
                      <th>From</th>
                      <th>Status</th>
                      <th>Sended_At</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="request in requests" :key="request.id">
                      <td>{{ request.id }}</td>
                      <td>{{ request.Name_En }}</td>
                      <td v-if="request.user">{{ request.user.department.Name_En }}</td>
                      <td>{{ request.statues }}</td>
                      <th>Sended_At</th>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>
                        <a href="#" @click="editModal"><i class="fa fa-edit  "></i></a>
                        <span>/</span>       
                        <a href="#"><i class="fa fa-trash red--text"></i></a>
                      </td>

                    </tr>
                     <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>
                        <a href="#" @click="editModal"><i class="fa fa-edit  "></i></a>
                        <span>/</span>       
                        <a href="#"><i class="fa fa-trash red--text"></i></a>
                      </td>

                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog   modal-dialog-centered modal-lg" role="document">
            <div class="modal-content blue--text">
            <div class="modal-header">
                <h5 v-show="editmode" class="modal-title" id="exampleModalCenterTitle">INVENTORY REQUEST SYSTEM</h5>
                <h5 v-show="!editmode" class="modal-title" id="exampleModalCenterTitle">INVENTORY REQUEST SYSTEM</h5>
                <img style="vertical-align:middle;" src="http://moodle.uoz.edu.krd/pluginfile.php/1/theme_klassroom/favicon/1567461354/favi.ico" alt="" width="24" height="24">

            </div>
            <form @submit.prevent="editmode ?  updateuser():submitrequest()">
                         <div class="modal-body"> 
                             <div class="form-group mt-4">
                               <textarea  class="form-control" Placeholder="Description" v-model="form.description" rows="4" cols="100">
                                </textarea>
                              </div>
                              <div class="form-group mt-4">
                                   <div class="form-check form-check-inline mb-4 ml-2"  v-for="item in Items" :key="item.id">
                                      <label class="form-check-label ml-2 mr-2">{{item.Name_En}}</label>
                                      <input class="form-check-input" type="checkbox" :value="item" v-model="form.item_id" >
                                      <input type="number" class="form-control-plaintext">
                                  </div>
                                  
                              </div>
                         </div>  

            <div class="modal-footer" style="overflow: hidden;" >
              
                        <a href="#" v-show="editmode"  ><i class="fa fa-check green--text ml-0  " style="float:left "></i></a>
                        <a href="#" v-show="editmode"><i class="fa fa-times red--text  "></i></a>
                        <a href="#" v-show="editmode"><i class="fa fa-external-link-square-alt  "></i></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                  <button v-show="!editmode" type="submit" class="btn btn-success">Submit</button>
                  <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
            </div>

                </form>
            </div>
        
            </div>
        </div>
</div>
 
</template>

<script>
    export default {

       data()
       {
            return {
               count: '',
              editmode:false,
              requests:{},
              Items:{},
                form:new Form({

                id:'',
                item_id:[],
                quantity:[],
                description:''

                
                              })
            }
       },
       methods:{
    countdata()
    {
      this.form.get('/apimain/dashboard/')
        .then((response)=>{
          this.count = response.data
        });

        axios.get('/apimain/item/')
        .then((response)=>{
          this.Items = response.data
        });
    },
         //reset modal from old data

         newModal(){
          this.editmode = false,
          this.form.reset();
              $('#exampleModalCenter').modal('show');

         },

         //show Modal to Edit function same modal of create new user 
           editModal(user){
            this. editmode=true,
             //reset modal form
          this.form.reset();
              $('#exampleModalCenter').modal('show');
              //fill data of user to update them 
              this.form.fill(user);

         },

            updateuser()
            {
              //ل آظهار ال پرۆگریسبار 
              
               this.$Progress.start();       
               
            
              this.form.put('api/user/'+this.form.id)
              .then(()=>{
                      Fire.$emit('AfterCreate');
                    $('#exampleModalCenter').modal('hide'); 

                swal.fire(
                  'Updated!',
                  'the information has apdate',
                  'success',

                )    
                  
                this.$Progress.finish(); 

              })
              .catch(()=>{
             
                this.$Progress.fail();

              });   
            
           
             

            },

             // delete user

            deleteuser(id){

              swal.fire({

                          title: 'Are you sure?',
                          text: "You won't be able to revert this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!'

                        }).then((result) => {
                          //send request to delete function to api usercontroller
                          if (result.value)
                           {  this.form.delete('api/user/'+id).then(()=>{
                             
                                    swal.fire(
                                        //alert
                                        'Deleted!',
                                        
                                        //alert body commint
                                        'Your file has been deleted.',
                                        // mark icon
                                          'success',
                           
                                      )
                                        Fire.$emit('AfterCreate')

                                  }).catch(()=>{
                                        swal.fire('Failed!','there was some thing wrong','warning')
                                  });  }
                            })

            },



           submitrequest()
           {
             //ل آظهار ال پرۆگریسبار 
               this.$Progress.start();
               //ارسال داتا
               this.form.post('apimain/dashboard/')
               .then(()=>{
                    Fire.$emit('AfterCreate');
                         $('#exampleModalCenter').modal('hide')
                       toast.fire({
                                icon: 'success',
                                 title: 'The Request Recived'
                      })
                                //ل آظهار ال پرۆگریسبار 
   
               this.$Progress.finish();
               })
               .catch(()=>{

               })
             
           }

       },
        created() {
            this.count = this.countdata()

          //المصنوعون سابقا
//لا نحتاج ل رفرش 
            Fire.$on('AfterCreate',()=>{
              console.log('error')
              this.countdata();
            });

            //کل ٣  ثوانی یقوم ب الرفرش  

           //setInterval(()=>this.loaduser(),3000);
           
        }
    }
</script>
