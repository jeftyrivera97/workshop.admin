<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import EditForm from '@/components/autos/edit-form.vue'


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Editar Auto',
        href: route('auto.index'),
    },
];
const props = defineProps({
    head: { type: String, required: true },
    data: { type: Object, required: true },
    categorias: { type: Object, required: true },
    marcas: { type: Object, required: true },
    tracciones: { type: Object, required: true },
})

</script>

<template>

    <Head title="Editar Auto" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <EditForm :data="data" :marcas="marcas" :categorias="categorias" :tracciones="tracciones" />
        </div>
    </AppLayout>
</template>
