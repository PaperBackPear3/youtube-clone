<script setup lang="ts" />
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