<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import IndexTable from '@/components/ingresos/index-table.vue'
import SearchInput from '@/components/shared/search.vue'
import AddButton from '@/components/shared/add-button.vue'
import ResponseMessage from '@/components/shared/flash-message.vue'


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Ingresos',
        href: route('ingreso.index'),
    },
];

defineProps({
    contador: { type: String, required: true },
    head: { type: String, required: true },
    modulo: { type: String, required: true },
    data: { type: Object, required: true },
    tableHeaders: { type: Object, required: true },
})

const info = "Nuevo Ingreso";
const infoServicio = "Nuevo Ingreso con Servicio";
const href = route('ingreso.create');
const hrefServicio = route('create-servicio');
const search = "Buscar Ingreso";
const searchRoute = "/ingreso";
</script>

<template>
    <Head :title="modulo" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-4">
                <div>
                    <SearchInput :search="search" :searchRoute="searchRoute"/>
                </div>
                <div>
                    <!-- empty column -->
                </div>
                <div>
                    <AddButton :info="infoServicio" :href="hrefServicio" />
                </div>
                <div>
                    <AddButton :info="info" :href="href" />
                </div>
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div>
                    <ResponseMessage />
                </div>
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-1">
                <div>
                    <IndexTable :data="data" :tableHeaders="tableHeaders" :modulo="modulo" :contador="contador" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
