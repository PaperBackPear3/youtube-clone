<script lang="ts">
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { computed, watch } from 'vue';
import { ref } from 'vue';


export default {
    // data() {
    //     return {
    //         userQuery: '',
    //     }
    // },
    // methods: {
    //     searchVideos(event: KeyboardEvent) {
    //         this.userQuery = (event.target as HTMLInputElement).value
    //     }
    // },

    setup() {
        const variables = ref({
            userQuery: '',
        })

        const { result, loading } = useQuery(gql`
     query getVideos($userQuery: String!) {
        searchVideos(query: $userQuery) {
            id
            title
        }
        }
    `, variables)

        const searchVideos = (event: KeyboardEvent) => {
            variables.value.userQuery = (event.target as HTMLInputElement).value
        }

        watch(result, value => {
            console.log(value, result)
            console.log(value.searchVideos, result)
        })

        const videos = computed(() => result.value?.searchVideos ?? [])

        return { videos, loading, searchVideos }
    },

}

</script>





<template>
    <div class="searchbar-container">
        <input type="text" placeholder="Search" class="searchbar" @keydown.enter="searchVideos" />
        <!-- <button @click="searchVideos">Search</button> -->
    </div>

    <div v-if="loading">Loading...</div>
    <ul v-else-if="videos">
        <li v-for="video of videos" :key="video.id">
            titolo:{{ video.title }}
        </li>
    </ul>
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