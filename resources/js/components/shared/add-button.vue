<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Plus } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    href: { type: String, required: true },
    info: { type: String, required: true },
})

</script>


<template>
     <Link :href="href"><Button variant="outline"> <Plus />{{info}}</Button></Link>
</template>
