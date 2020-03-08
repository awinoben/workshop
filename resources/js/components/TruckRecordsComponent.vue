<template>
    <div id="postsrec">
        
        <div class="row justify-content-center">
        <div v-bind:class="{ succmsg: succmsg }">
                <div class="col-md-12 col-lg-12">
                    <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
                </div>
            </div>
        <div class="col-md-12">
           <!-- Button trigger modal -->
            
            <!-- Modal -->
            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" v-bind:class="{ showmodal:showmodal }">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method = "post" name="addrecord" id="addrecord" action="#" @submit.prevent="updateRecord">
                        <div class="form-group">
                            <label for="title">Driver's Name</label>
                            <input type="text" name="driver_name" id="driver_name" class="form-control" placeholder="Driver's Name" v-model="post.driver_name"/>
                            {{ post.driver_name }}
                        </div>
                        <div class="form-group">
                            <label for="driver_phone">Driver Phone Number</label>
                            <input type="phone" name="driver_phone" id="driver_phone" class="form-control" placeholder="Driver's Phone" v-model="post.driver_phone"/>
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" name="company" id="company" class="form-control" placeholder="Company Name" v-model="post.company"/>
                        </div>
                        <div class="form-group">
                            <label for="owner_name">Owner's Name</label>
                            <input type="text" name="owner_name" id="owner_name" class="form-control" placeholder="Owner's Name" v-model="post.owner_name"/>
                        </div>
                        <div class="form-group">
                            <label for="owner_email">Owner's Email</label>
                            <input type="email" name="owner_email" id="owner_email" class="form-control" placeholder="Owner's email" v-model="post.owner_email"/>
                        </div>
                        <div class="form-group">
                            <label for="truck_model">Truck Model</label>
                            <select class="form-control" name="truck_model" id="truck_model" v-model="post.truck_model" required>
                                <option>Select Model...</option>
                                <option value="Model 2518">Model 2518</option>
                                <option value="Model 9016">Model 9016</option>
                                <option value="Model Tipper">Model Tipper</option>
                                <option value="Model Dost">Model Dost</option>
                                <option value="Model Partner">Model Partner</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="truck_registration">Truck Registration</label>
                            <input type="text" name="truck_registration" id="truck_registration" class="form-control" placeholder="Truck Registration" v-model="post.truck_registration"/>
                        </div>
                         <div class="form-group">
                            <label for="truck_chassis_number">Truck Chassis Number</label>
                            <input type="text" name="truck_chassis_number" id="truck_chassis_number" class="form-control" placeholder="Truck Chassis Number" v-model="post.truck_chassis_number"/>
                        </div>
                        <div class="form-group">
                            <label for="engine_number">Engine Number</label>
                            <input type="text" name="engine_number" id="engine_number" class="form-control" placeholder="Engine Number" v-model="post.engine_number"/>
                        </div>
                        <div class="form-group">
                            <label for="mileage">Mileage</label>
                            <input type="text" name="mileage" id="mileage" class="form-control" placeholder="Mileage" v-model="post.mileage"/>
                        </div>
<div class="form-group text-right">
                            <button class="btn btn-success">Submit</button>
                        </div>
</form>
                  </div>
                  
                </div>
              </div>
            </div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                            <p>Are you sure want to delete the record? </p>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" v-on:click="hideModal()">Cancel</button>
                        </div>
<div class="form-group text-center">
                            <button class="btn btn-success" v-on:click="deleteRecord()">Ok</button>
                        </div>
                  </div>
                  
                </div>
              </div>
            </div>
<div class="card">
                <div class="card-header">Truck Records</div>
<div class="card-body">
                    <table class="table table-striped" v-bind:pagenumber = "pagenumber">
                    <thead>
                      <tr>
                        <th scope="col">Driver's Name</th>
                        <th scope="col">Driver's Phone</th>
                        <th scope="col">Owners's Name</th>
                        <th scope="col">Owner's Eamil</th>
                        <th scope="col">Model</th>
                        <th scope="col" colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="post in laravelData.data" :key="post.id">
                        <th scope="row">{{ post.driver_name }}</th>
                        <td>{{ post.driver_phone}}</td>
                        <td>{{ post.owner_name }}</td>
                        <td>{{ post.owner_email }}</td>
                        <td>{{ post.truck_model }}</td>
                        <td><a href="#" v-on:click="editRecord(post.id)" data-target="#exampleModal"  data-toggle="modal" v-bind:title="post.title">Edit</a></td>
                        <td><a href="#" data-target="#exampleModal2" v-on:click="deleteId(post.id)"  data-toggle="modal" v-bind:id="id"  >Delete</a></td>
                      </tr>
                      
                    </tbody>
                  </table>
                  <pagination :data="laravelData" :limit="2" @pagination-change-page="truckLists">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                  </pagination>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
    
    export default {
        
        data() {
            return {
                post: {
                    'driver_name': '',
                    'driver_phone': '',
                    'company': '',
                    'owner_name': '',
                    'owner_email': '',
                    'truck_model': '',
                    'truck_registration': '',
                    'truck_chassis_number': '',
                    'engine_number': '',
                    'mileage': ''
                },
                laravelData: {},
                id: '',
                succmsg:  true,
                showmodal: false,
                pagenumber: 1,
                actionmsg: '',
            }
        },
        methods: {
            truckLists(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                this.$http.get('http://127.0.0.1:8000/api/truckrecords?page='+ page).then((response) => {
                    //this.posts = response.data.data;
                    this.laravelData = response.data;
                    this.pagenumber = page;
});
            },
editRecord(truckid) {
                this.$http.get('http://127.0.0.1:8000/api/truckrecords/'+ truckid).
                    then((data) => {
                        this.post.driver_name = data.data.data.driver_name;
                        this.post.driver_phone = data.data.data.driver_phone;
                        this.post.company = data.data.data.company;
                        this.post.owner_name = data.data.data.owner_name;
                        this.post.owner_email = data.data.data.owner_email;
                        this.post.truck_model = data.data.data.truck_model;
                        this.post.truck_registration = data.data.data.truck_registration;
                        this.post.truck_chassis_number = data.data.data.truck_chassis_number;
                        this.post.engine_number = data.data.data.engine_number;
                        this.post.mileage = data.data.data.mileage;
                        this.id = truckid;
                    });
            },
            updateRecord() {
                   this.$http.put('http://127.0.0.1:8000/api/truckrecords/'+this.id,{
                        'driver_name': this.post.driver_name,
                        'driver_phone': this.post.driver_phone,
                        'company': this.post.company,
                        'owner_name': this.post.owner_name,
                        'owner_email': this.post.owner_email,
                        'truck_model': this.post.truck_model,
                        'truck_registration': this.post.truck_registration,
                        'truck_chassis_number': this.post.truck_chassis_number,
                        'engine_number': this.post.engine_number,
                        'mileage': this.post.mileage,
                    }).
                    then((data) => {
                        this.succmsg = false;
                        console.log(data);
                        this.post.driver_name = '';
                        this.post.driver_phone = '';
                        this.post.company = '';
                        this.post.owner_name = '';
                        this.post.owner_email = '';
                        this.post.truck_model = '';
                        this.post.truck_registration = '';
                        this.post.truck_chassis_number = '';
                        this.post.engine_number = '';
                        this.post.mileage = '';
                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                        this.actionmsg = "Data updated successfully";
                        $('#exampleModal').modal('hide');
this.truckLists(this.pagenumber);
                        
                    });
            },
            deleteId(truckid) {
                    this.id = truckid;
            },
            deleteRecord() {
                   this.$http.delete('http://127.0.0.1:8000/api/truckrecords/'+this.id).
                    then((data) => {
                        this.succmsg = false;;
                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                         
                         this.actionmsg = "Data deleted successfully";
this.truckLists(this.pagenumber);
                        $('#exampleModal2').modal('hide');
                        
                    });
            },
            hideModal() {
                $('#exampleModal2').modal('hide');
            }
            
        },
        mounted() {
            this.truckLists();
        }
    }
</script>
<style scoped>
    .succmsg {
        display: none;
    }
    .showmodal {
        display: none !important;
        opacity: 0;
    }
</style>