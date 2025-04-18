<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateForm from '@/components/planillas/create-form.vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Crear Nuevo Pago de Planilla',
        href: route('planilla.create'),
    },
];

const props = defineProps({
    head: { type: String, required: true },
    empleados: {type:Object, required:true},
    categorias: {type:Object, required:true},
})

</script>

<template>

    <Head :title=props.head />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <CreateForm :empleados="empleados" :categorias="categorias"/>
        </div>
    </AppLayout>
</template>
