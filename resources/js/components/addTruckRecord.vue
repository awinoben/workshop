<template>
       <div class="container">
            <div v-bind:class="{ succmsg: succmsg }">
                <div class="col-md-12 col-lg-12">
                    <div class="alert alert-success">Data inserted successfully</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 com-lg-7  offset-md-3">
                    <form method = "post" name="addrecord" id="addrecord" action="#" enctype="multipart/form-data" @submit.prevent="addRecord">
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
                succmsg:  true,
            }
        },
        methods: {
            addRecord() {
                this.$http.post('http://127.0.0.1:8000/api/truckrecords',{
                        'driver_name': this.post.driver_name,
                        'driver_phone': this.post.driver_phone,
                        'company': this.post.company,
                        'owner_name': this.post.owner_name,
                        'owner_email': this.post.owner_email,
                        'truck_model': this.post.truck_model,
                        'truck_registration': this.post.truck_registration,
                        'truck_chassis_number': this.post.truck_chassis_number,
                        'engine_number': this.post.engine_number,
                        'mileage': this.post.mileage
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
                    });
            }
            
        },
        computed: {
}
    }
</script>
<style scoped>
    .succmsg {
        display: none;
    }
</style>