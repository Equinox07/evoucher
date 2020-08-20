<template>
  <div class="container">
    <h1 class="display-4">Welcome</h1>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">What would you like to do</div>
        <div class="card-body">
          <button class="btn btn-primary">Generate Card</button>
          <button @click="registerStudent()" class="btn btn-info">Register Student</button>
        </div>
      </div>
    </div>
    <div class="row mt-5">
     <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center">
                <i class="fa fa-edit fa-2x primary float-left text-info"></i>
              </div>
              <div class="media-body text-right">
                <h3>278</h3>
                <span>Generated Cards</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">Students 0</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">Active 0</div>
        </div>
      </div>
    </div>

    <modal name="register-student" :width="500" :height="500" :adaptive="true">
      <div>
        <div class="card">
          <div class="card-header">ENTER STUDENT DETAILS</div>
          <div class="card-body">
            <form action>
              <div class="form-group">
                <label for>Institution Name</label>
                <select v-model="student.school_id" class="form-control">
                  <option value="null" disabled>Select Institution</option>
                  <option
                    :value="school.id"
                    v-for="(school, index) in schools"
                    :key="index"
                  >{{school.name}}</option>
                </select>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for>Student First Name</label>
                    <input type="text" v-model="student.firstname" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for>Last Name</label>
                    <input type="text" v-model="student.lastname" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for>Student Email</label>
                    <input type="text" v-model="student.email" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for>Mobile</label>
                    <input type="text" v-model="student.mobile" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for>Voucher Code</label>
                <select v-model="student.voucher_id" class="form-control">
                  <option value="null" disabled>Select Voucher</option>
                  <option
                    :value="voucher.id"
                    v-for="(voucher, index) in vouchers"
                    :key="index"
                  >{{voucher.voucher_code}}</option>
                </select>
              </div>
              <button @click.prevent="saveStudent()" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      student: {
        firstname: "",
        lastname: "",
        mobile: "",
        school_id: "",
        voucher_id: "",
        card: {},
      },
      card: {},
      schools: {},
      vouchers: {},
    };
  },
  methods: {
      openLoading() {
          const loading = this.$vs.loading({
              text: 'Loading...',
              type: 'circles'
          })
          setTimeout(() => {
            loading.close()
          }, 3000)
      },
    generateCard() {
        console.log("Voucher Generated...", this.card);
    },
    registerStudent() {
        this.openLoading();
      this.$modal.show("register-student");
    },
    async saveStudent() {
        const data = this.student
      await axios
        .post("api/students", data)
        .then(({ data }) => {
          console.log(data);
            this.$modal.hide("register-student");
            this.student = {};
            this.loadVouchers();
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
    async loadSchool() {
      await axios
        .get("api/schools")
        .then(({ data }) => {
          this.schools = data;
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
    async loadVouchers() {
      await axios
        .get("api/vouchers")
        .then(({ data }) => {
          this.vouchers = data;
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
  },
  mounted() {
    this.loadSchool();
    this.loadVouchers();
  },
};
</script>

<style>
</style>