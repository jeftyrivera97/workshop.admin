<script setup lang="ts">
import { type BreadcrumbItem } from '../../types';
import AppLayout from '../../layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import IndexTable from '@/components/proveedores/index-table.vue'
import SearchInput from '@/components/shared/search.vue'
import AddButton from '@/components/shared/add-button.vue'
import ResponseMessage from '@/components/shared/flash-message.vue'
import ImportForm from '@/components/shared/import-form.vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Proveedores',
        href: route('proveedor.index'),
    },
];
const props = defineProps({
    contador: { type: String, required: true },
    head: { type: String, required: true },
    modulo: { type: String, required: true },
    data: { type: Object, required: true },
    tableHeaders: { type: Object, required: true },
})

const info = "Nuevo Proveedor";
const href = route('proveedor.create');
const search = "Buscar Proveedor";
const searchRoute = "/proveedor";

const url = "/import-proveedor"
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
                    <!-- empty column -->
                </div>
                <div>
                    <AddButton :info="info" :href="href" />
                </div>
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-1">
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
