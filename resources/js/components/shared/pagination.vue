<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    pagination: { type: Object, required: true },
})
</script>

<template>
     <nav class="relative flex justify-center">
        <template v-for="link in pagination.links" :key="link.label">
            <Link
                preserve-scroll
                :href="link.url ?? ''"
                v-html="link.label"
                class="flex items-center justify-center px-3 py-2 text-sm rounded-lg text-gray-600"
                :class="{ 'bg-gray-200': link.active, '!text-gray-300': !link.url }"
            />
        </template>
    </nav>
</template>
