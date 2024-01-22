<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    pagination: Object
})
</script>

<template>
    <nav class="relative flex justify-center">
        <template v-for="link in  pagination.links " :key="link.label">
            <Link :href="link.url ?? ''" v-html="link.label"
                class="flex items-center justif-center px-3 py-2 rounded-md text-gray-600 hover:bg-gray-200"
                :class="{ 'bg-gray-300': link.active, '!text-gray-300': !link.url }" preserve-scroll />
        </template>
    </nav>
</template>