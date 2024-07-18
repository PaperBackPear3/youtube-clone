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
    <aside class="sidebar">
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

        <nav>
            <h2>Channels</h2>
            <ul v-if="channels">
                <li v-for="channel in channels" :key="channel.id">
                    {{ channel.name }}
                    <!-- <img :src="channel.avatar" alt="channel avatar" /> -->
                    <!-- <RouterLink :to="'/channels/' + channel.id">{{ channel.name }}</RouterLink> -->
                </li>
            </ul>
        </nav>
    </aside>

</template>

<style scoped>
.sidebar {
    background-color: var(--color-bg-secondary);
    border-right: 1px solid var(--color-border);
    height: 100vh;
    width: 200px;
    position: fixed;
    top: 0;
    left: 0;
}
</style>