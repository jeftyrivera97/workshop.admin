<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateForm from '@/components/ingresos/createServicio-form.vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Crear Nuevo Ingreso con Servicio',
        href: route('ingreso.create'),
    },
];

const props = defineProps({
    head: { type: String, required: true },
    categorias: {type:Object, required:true},
    servicios: {type:Object, required:true},
    autos: {type:Object, required:true},
    clientes: {type:Object, required:true},
    pagos_categorias: {type:Object, required:true},
    colores: {type:Object, required:true},
})

</script>

<template>

    <Head :title=props.head />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <CreateForm :categorias="categorias" :servicios="servicios" :autos="autos" :clientes="clientes" :pagos_categorias="pagos_categorias" :colores="colores" />
        </div>
    </AppLayout>
</template>
