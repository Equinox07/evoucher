<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link class="nav-link" to="/">
            Home
          </router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Application</a>
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
        <li class="nav-item">
        <router-link to="/login" class="nav-link">
          Login
        </router-link>
        </li>
        <li class="nav-item">
        <router-link to="/bank" class="nav-link">
          Bank
        </router-link>
        </li>
        <li class="nav-item">
        <router-link to="/student" class="nav-link">
          Student
        </router-link>
        </li>
        <li class="nav-item">
        <router-link :to="{name: 'admin.dashboard'}" class="nav-link">
          Admin
        </router-link>
        </li>
        
      </ul>
    </div>
  </nav>
  <router-view></router-view>
</div>

</template>

<script>
export default {

}
</script>

<style>

</style>