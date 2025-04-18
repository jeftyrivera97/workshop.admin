<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import EditForm from '@/components/proveedores/edit-form.vue'


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Editar Proveedor',
        href: route('proveedor.index'),
    },
];
const props = defineProps({
    head: { type: String, required: true },
    data: { type: Object, required: true },
    categorias: { type: Object, required: true },
})

</script>

<template>

    <Head title="Editar Proveedor" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <EditForm :data="data" :categorias="categorias"/>
        </div>
    </AppLayout>
</template>
