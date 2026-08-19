<template>
    <div class="errors text-red-500 text-sm">{{ error }}</div>
    </template>

    <script setup lang="ts">
    defineProps<{
        error?:string
    }>();
</script>