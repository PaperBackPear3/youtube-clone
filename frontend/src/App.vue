<script setup lang="ts">
import HomePageView from './views/Home/HomePageView.vue';
</script>

<template>
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
</style>