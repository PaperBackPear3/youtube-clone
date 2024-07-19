<script lang="ts">
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { computed } from 'vue';
import { ref } from 'vue';


export default {
    setup() {
        const variables = ref({
            userQuery: '',
        })

        const { result, loading } = useQuery(gql`
     query getVideos($userQuery: String!) {
        searchVideos(query: $userQuery) {
            id
            title
            description
            thumbnail
            video_path
            duration
            views_count
            updated_at
        }
        }
    `, variables)

        const searchVideos = (event: KeyboardEvent) => {
            variables.value.userQuery = (event.target as HTMLInputElement).value
        }

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
            <div>
                <h1>
                    <b>titolo: {{ video.title }}</b>
                </h1>
                <p>
                    description: {{ video.description }}
                </p>
                <div class='div-list'>
                    <div>
                        duration: {{ (Number(video.duration) / 60).toFixed(2) }} min
                    </div>
                    <div>
                        <b>views:</b> {{ video.views_count }}
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<style scoped>
template {
    font-family: Arial, sans-serif;
    /* Sets font for the list */
    max-width: 600px;
    /* Sets max width for better readability */
    background: #f9f9f9;
    /* Light background color */
    border-radius: 8px;
    /* Rounds the corners of the list */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Adds a subtle shadow */
    overflow: hidden;
    /* Clips children if they overflow */
    min-height: 500px;

}

.searchbar-container {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
    height: 40px;
}

.searchbar {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 0.5rem;
    width: 100%;
    font-size: 1rem;
    outline: none;
    transition: border-color 0.3s;
    /* Smooth border color transition */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Adds a subtle shadow */
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    size: 40;
    margin-bottom: 12px;
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

.div-list {
    display: flex;
    flex-direction: column;
    padding: 1rem;
}

/* General UL style */
ul {
    list-style-type: none;
    /* Removes default bullets */
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    /* Sets font for the list */
    max-width: 600px;
    /* Sets max width for better readability */
    background: #f9f9f9;
    /* Light background color */
    border-radius: 8px;
    /* Rounds the corners of the list */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Adds a subtle shadow */
    overflow: hidden;
    /* Clips children if they overflow */
}

/* General LI style */
ul li {
    padding: 12px 18px;
    /* Adds padding inside the list items */
    border-bottom: 1px solid #ddd;
    /* Adds a subtle divider line */
    display: flex;
    /* Flexbox for better control */
    align-items: center;
    /* Center align items */
    transition: background 0.3s;
    /* Smooth background color transition */
}

/* Last LI style - no border */
ul li:last-child {
    border-bottom: none;
    /* Removes border from the last item */
}

/* Custom bullet points using pseudo-elements */
ul li::before {
    content: '•';
    /* Custom bullet */
    color: #ff6347;
    /* Tomato color */
    font-size: 24px;
    /* Larger bullet size */
    margin-right: 16px;
    /* Space between bullet and text */
}

/* Hover effect for LI */
ul li:hover {
    background: #ff6347;
    /* Changes background on hover */
    color: #fff;
    /* Changes text color on hover */
}
</style>