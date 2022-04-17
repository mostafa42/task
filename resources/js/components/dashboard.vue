<template>

  <div class="container">
    
    <h1 class="text-center">
      <span class="badge bg-secondary"
        > My Info </span
      >
    </h1>
    <div class="card" style="width: 18rem">
      <img
        src="https://www.seekpng.com/png/full/847-8474751_download-empty-profile.png"
        class="card-img-top"
        alt=""
      />
      <div class="card-body">
        <h5 class="card-title">{{ user.name }}</h5>
        <p class="card-text">
          email <span class="badge bg-secondary">{{ user.email }}</span>
        </p>
      </div>
    </div>
    <h1 class="text-center">
      <span class="badge bg-secondary"
        >Doctors Related To {{ user.medical_center_name }} Medical Center</span
      >
    </h1>
    <div class="container" v-if="this.doctors.length > 0">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12" v-for="item in doctors" :key="item.id">
          <div class="card" style="width: 18rem">
            <img
              src="https://www.seekpng.com/png/full/847-8474751_download-empty-profile.png"
              class="card-img-top"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title">{{ item.name }}</h5>
              <p class="card-text">
                email <span class="badge bg-secondary">{{ item.email }}</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card" style="width: 18rem">
            <img
              src="https://www.seekpng.com/png/full/847-8474751_download-empty-profile.png"
              class="card-img-top"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title">{{ user.name }}</h5>
              <p class="card-text">
                email <span class="badge bg-secondary">{{ user.email }}</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" v-else>
        <h1 class="text-center">There is no doctors related </h1>
    </div>
    <br />
  </div>
</template>
<script>
export default {
    mounted(){
        this.allDoctorsRelatedToMedicalCenters()
    },
  data() {
    return {
      user: this.auth.user,
      doctors : []
    };
  },
  methods:{
      allDoctorsRelatedToMedicalCenters(){
        this.axios
        .get("http://127.0.0.1:8000/api/all_doctors_related_to_medical_center/" + this.user.medical_center_name)
        .then((  response ) => {
            this.doctors = response.data.data;
            console.log(response)
        })
        .catch((error) => {
          console.log(error);
        });
    },
  }
};
</script>