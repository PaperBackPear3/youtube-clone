<script setup lang="ts">
import SideBar from './components/SideBar/SideBar.vue';
import HomePageView from './views/Home/HomePageView.vue';
</script>

<template>
  <SideBar />
  <header>
    <div class="links">
      <RouterLink to="/login">Log in</RouterLink>
      <RouterLink to="/login/register">Create New Account</RouterLink>
    </div>
    <div class="wrapper">
      <HomePageView />

    </div>
  </header>
</template>

<style scoped>
.wrapper {
  margin-left: 250px;
}
</style>