<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateForm from '@/components/compras/create-form.vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Crear Nueva Compra',
        href: route('compra.create'),
    },
];

const props = defineProps({
    head: { type: String, required: true },
    proveedores: {type: Object, required:true},
    categorias: {type:Object, required:true},
})

</script>

<template>

    <Head :title=props.head />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <CreateForm :proveedores="proveedores" :categorias="categorias" />
        </div>
    </AppLayout>
</template>
