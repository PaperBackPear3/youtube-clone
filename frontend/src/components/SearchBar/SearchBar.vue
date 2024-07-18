<script setup lang="ts" />
<template>
    <div class="searchbar-container">
        <input type="text" placeholder="Search" class="searchbar" v-model="search" @input="searchVideos" />
    </div>
</template>

<style scoped>
.searchbar-container {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.searchbar {
    padding: 0.5rem;
    border-radius: 5px;
    border: 1px solid var(--color-border);
}
</style>