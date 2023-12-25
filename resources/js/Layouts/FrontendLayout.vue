<template>
    <slot/>

    <HomeFooter></HomeFooter>
</template>

<script setup>
    import HomeFooter from "@/Layouts/Partials/HomeFooter.vue"
</script>

<style>
    body{
        @apply flex min-h-screen flex-col bg-gray-900;
    }
</style>
