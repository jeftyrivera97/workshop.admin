<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { router, usePage } from '@inertiajs/vue3'
import { Trash2 } from 'lucide-vue-next';

const props = defineProps({
    id: { type: String, required: true },
    stringRoute: { type: String, required: true },
})

const destroy = (id:string) =>{
    if (confirm('¿Estas seguro de esta accion?')) {
        router.delete(route(`${props.stringRoute}`, id))
    }
}
</script>

<template>
    <Button variant="destructive" size="icon" @click="destroy(id)">
        <Trash2 />
    </Button>
</template>
