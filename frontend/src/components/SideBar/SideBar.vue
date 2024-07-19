<script lang="ts">
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { computed } from 'vue';

export default {
    setup() {
        const { result } = useQuery(gql`
      query getChannels {
        channels {
            id
            name
            avatar
        }
      }
    `)
        const channels = computed(() => result.value?.channels ?? [])
        return { channels }
    },
}


</script>


<template>
    <div class="sidebar">
        <nav>
            <ul>
                <li>
                    <RouterLink to="/home">Home</RouterLink>
                </li>
                <li>
                    <RouterLink to="/channels">Channels</RouterLink>
                </li>
                <li>
                    <RouterLink to="/channels">Your Videos</RouterLink>
                </li>
            </ul>
        </nav>

        <nav class='overflowAuto'>
            <h2>Channels</h2>
            <ul v-if="channels">
                <li v-for="channel in channels" :key="channel.id">
                    {{ channel.name }}
                    <!-- <img :src="channel.avatar" alt="channel avatar" /> -->
                    <!-- <RouterLink :to="'/channels/' + channel.id">{{ channel.name }}</RouterLink> -->
                </li>
            </ul>
        </nav>
    </div>

</template>

<style scoped>
/* Sidebar container */
.sidebar {
    width: 250px;
    /* Width of the sidebar */
    height: 100vh;
    /* Full height */
    background-color: #333;
    /* Dark background color */
    color: #fff;
    /* Light text color */
    overflow-y: auto;
    /* Enable vertical scrolling */
    position: fixed;
    /* Fixed position on the left */
    top: 0;
    left: 0;
    padding: 20px;
    /* Padding inside the sidebar */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    /* Subtle shadow for depth */
}

/* General UL style */
.sidebar ul {
    list-style-type: none;
    /* Removes default bullets */
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    /* Sets font for the list */
    background: transparent;
    /* Transparent background */
}

/* General LI style */
.sidebar ul li {
    padding: 12px 18px;
    /* Adds padding inside the list items */
    border-bottom: 1px solid #555;
    /* Adds a subtle divider line */
    display: flex;
    /* Flexbox for better control */
    align-items: center;
    /* Center align items */
    transition: background 0.3s;
    /* Smooth background color transition */
}

/* Last LI style - no border */
.sidebar ul li:last-child {
    border-bottom: none;
    /* Removes border from the last item */
}

/* Custom bullet points using pseudo-elements */
.sidebar ul li::before {
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
.sidebar ul li:hover {
    background: #ff6347;
    /* Changes background on hover */
    color: #fff;
    /* Changes text color on hover */
}
</style>