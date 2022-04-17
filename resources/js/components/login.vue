<template>
      <div>
    <h1>Login</h1>
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
      <button type="button" @click="login" class="btn btn-primary">Submit</button>
  </div>
</template>

<script>
    import Auth from '../Auth.js';
    import Navbar from '../components/Navbar.vue'

     

    export default {
      

      components:{
        Navbar
      },
        data() {
            return {
                user: {
                    email: '',
                    password: '',
                }
            };
        },

        methods: {
            login() {
                if( this.user.email === "" || this.user.password === "" ){
                  alert("please complete your data")
                }else{
                  this.axios.post('http://127.0.0.1:8000/api/login', this.user)
                    .then(({data}) => {
                        alert("loggened successfully")
                        Auth.login(data.access_token,data.user); //set local storage
                        this.$router.push('/dashboard');
                    })
                    .catch((error) => {
                      alert("invalid Credentials !")
                        console.log(error);
                    });
                }
            }
        }
    }
</script>