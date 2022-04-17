<template>
  <div>
    <h1>Register</h1>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" v-model="user.name" />
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input
        type="email"
        class="form-control"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
        v-model="user.email"
      />
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input
        type="password"
        class="form-control"
        id="exampleInputPassword1"
        v-model="user.password"
      />
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label"
        >Password Confirmation</label
      >
      <input
        type="password"
        class="form-control"
        id="exampleInputPassword1"
        v-model="user.password_confirmation"
      />
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label"
        >Choose Medical Center</label
      >
      <select class="form-control" @change="onChange($event)">
        <option
          v-for="item in medical_center"
          :key="item.id"
          :value="item.medical_center_name"
        >
          {{ item.medical_center_name }}
        </option>
      </select>
    </div>
    <button type="button" @click="register()" class="btn btn-primary">
      Submit
    </button>
  </div>
</template>

<script>
export default {
    mounted(){
        this.allMedicalCenters();
    },
  data() {
    return {
        medical_center : [] ,
      user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        medical_center_name : ""
        
      },
    };
  },

  methods: {
    register() {
        if( this.user.name === "" || this.user.email === "" || this.user.password === "" || this.user.password_confirmation === ""){
          alert("please complete your data")
        }else if( this.user.password != this.user.password_confirmation ){
          alert("password is not match") 
        }
        else{
          this.user.medical_center_name = this.medical_center[0].medical_center_name
          this.axios
            .post("http://127.0.0.1:8000/api/register", this.user)
            .then(({ data }) => {
                alert('account is created');
              this.$router.push("/login");
            })
            .catch((e) => {
              console.log(e.response);
            });
        }
    },
    allMedicalCenters(){
        this.axios
        .get("http://127.0.0.1:8000/api/all_medical_center")
        .then((  response ) => {
            this.medical_center = response.data.data;
            console.log(this.medical_center)
        })
        .catch((error) => {
          console.log(error);
        });
    },
    onChange(event) {
        this.user.medical_center_name = event.target.value
        console.log(this.user.medical_center_name)
    },
  },
};
</script>