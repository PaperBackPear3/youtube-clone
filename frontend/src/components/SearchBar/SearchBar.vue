<script setup lang="ts">

import { ref } from 'vue';

const search = ref('');

const searchVideos = () => {
    console.log(search.value);
}

</script>


<template>
    <div class="searchbar-container">
        <input type="text" placeholder="Search" class="searchbar" v-model="search" @keydown.enter="searchVideos" />
        <button @click="searchVideos">Search</button>
    </div>
</template>

<style scoped>
.searchbar-container {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
    height: 2rem;
}

input {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    size: 40;
}

button {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    cursor: pointer;
    font-weight: bold;
}
</style>