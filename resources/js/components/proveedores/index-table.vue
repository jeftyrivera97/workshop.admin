<script setup>
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

const stringRoute = "proveedor.destroy";
const editRoute = "proveedor.edit";

</script>

<template>
    <span>Tabla de {{modulo}} ({{ props.contador }})</span>
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
                    <TableCell class="font-medium">
                        {{ item.codigo_proveedor }}
                    </TableCell>
                    <TableCell>{{ item.descripcion }}</TableCell>
                    <TableCell>{{ item.categoria }}</TableCell>
                    <TableCell>{{ item.contacto }}</TableCell>
                    <TableCell>{{ item.telefono }}</TableCell>
                    <TableCell class="text-right">
                        <EditOption :id="item.id" :editRoute="editRoute" />
                        <DeleteOption :id="item.id" :stringRoute="stringRoute"/>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </nav>
    <TablePagination :pagination="data.meta" />
</template>
