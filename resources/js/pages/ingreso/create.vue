<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateForm from '@/components/ingresos/create-form.vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Crear Nuevo Ingreso',
        href: route('ingreso.create'),
    },
];

const props = defineProps({
    head: { type: String, required: true },
    categorias: {type:Object, required:true},
})

</script>

<template>

    <Head :title=props.head />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <CreateForm :categorias="categorias" />
        </div>
    </AppLayout>
</template>
