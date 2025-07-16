<script setup lang="ts">
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow, } from '@/components/ui/table'
import DeleteOption from '@/components/shared/delete-button.vue'
import EditOption from '@/components/shared/edit-button.vue'
import TablePagination from '@/components/shared/pagination.vue'

const props = defineProps({
    data: { type: Object, required: true },
    modulo: { type: String, required: true },
    contador: { type: String, required: true },
    tableHeaders: { type: Object, required: true },
})

const stringRoute = "auto.destroy";
const editRoute = "auto.edit";

</script>

<template>
    <span>Tabla de {{ modulo }} ({{ props.contador }})</span>
    <nav class="relative flex justify-center">
        <Table>
            <TableCaption>Todos los Registros</TableCaption>
            <TableHeader>
                <TableRow>
                    <TableHead v-for="header in tableHeaders" :key="header.index">{{ header }}</TableHead>
                    <TableHead class="text-right">
                        Opciones
                    </TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="item in data.data" :key="item.id">
                    <TableCell v-for="marca in item.id_marca" :key="marca.id">{{ marca.descripcion }}</TableCell>
                    <TableCell>{{ item.modelo }}</TableCell>
                    <TableCell>{{ item.year }}</TableCell>
                    <TableCell>{{ item.traccion }}</TableCell>
                    <TableCell>{{ item.cilindraje }}</TableCell>
                    <TableCell>{{ item.combustion }}</TableCell>
                    <TableCell v-for="categoria in item.id_categoria" :key="categoria.id">{{ categoria.descripcion }}</TableCell>
                    <TableCell class="text-right">
                        <EditOption :id="item.id" :editRoute="editRoute" />
                        <DeleteOption :id="item.id" :stringRoute="stringRoute" />
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </nav>
    <TablePagination :pagination="data.meta" />
</template>
