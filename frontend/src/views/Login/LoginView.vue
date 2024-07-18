<script setup lang="ts">
defineProps({
    status: String
})

console.log(status)
</script>

<template>
    <div>
        <h1>Login</h1>
    </div>
    <div v-if="status==='register'">
        <h1>Create Account</h1>
    </div>

</template>