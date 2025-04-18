<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import EditForm from '@/components/ingresos/editservicio-form.vue'


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Editar Ingreso con Servicio',
        href: route('ingreso.index'),
    },
];
const props = defineProps({
    head: { type: String, required: true },
    data: { type: Object, required: true },
    dataServicio: { type: Object, required: true },
    categorias: {type:Object, required:true},
    servicios: {type:Object, required:true},
    autos: {type:Object, required:true},
    clientes: {type:Object, required:true},
    pagos_categorias: {type:Object, required:true},

})

</script>

<template>

    <Head title="Editar Ingreso" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <EditForm :data="data" :dataServicio="dataServicio" :categorias="categorias" :servicios="servicios"
            :autos="autos" :clientes="clientes" :pagos_categorias="pagos_categorias" />
        </div>
    </AppLayout>
</template>
