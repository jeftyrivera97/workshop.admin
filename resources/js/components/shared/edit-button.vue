<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Link } from '@inertiajs/vue3'
import { Pencil } from 'lucide-vue-next';

const props = defineProps({
    id: { type: String, required: true },
    editRoute: { type: String, required: true },
})

</script>

<template>
    <Link :href="route(`${editRoute}`, id)" method="get" as="button">
        <Button variant="outline" size="icon">
        <Pencil/>
    </Button>
    </Link>

</template>
