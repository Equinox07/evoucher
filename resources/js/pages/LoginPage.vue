<template>
  <div>

      <div class="card mb-3 mt-5 mx-auto" style="max-width: 900px;">
        <div class="row no-gutters">
            <div class="col-md-6">
                <img :src="'/images/refmarket.jpg'" width="450px;" class="card-image" alt="">
            </div>
            <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title">LOGIN</h5>
              

                 <form action="">
                      <div class="form-group">
                         <label for="email">E-mail</label>
                         <input v-model="user.email" class="form-control" type="email">
                      </div>
                      <div class="form-group">
                         <label for="password">Password</label>
                          <input v-model="user.password" class="form-control" type="password">
                      </div>
                      <button @click.prevent="loginUser()" class="btn btn-primary" :disabled="user.email == '' || user.password == '' " >LOGIN</button>
                  </form>
            </div>
            </div>
        </div>
        </div>
      <!-- <div class="row">
          <div class="col-lg-6">
              <img :src="'/images/refmarket.jpg'" width="150px;" class="img-responsive" alt="">
          </div>
      </div>
      <div class="col-lg-4 mx-auto">
      <app-login></app-login>
      </div> -->
  </div>
</template>

<script>
import LoginVue from '../components/Login.vue'
export default {
    components: {
        'appLogin' : LoginVue
    },
    data() {
        return {
            user: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        loginUser(){
            console.log(this.user)
        }
    }

}
</script>

<style>

</style>