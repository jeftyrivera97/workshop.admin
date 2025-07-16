<script setup lang="ts">

import { Button } from '@/components/ui/button';
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { CircleArrowLeft } from 'lucide-vue-next';
import { Save } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'

const props = defineProps({
    data: { type: Object, required: true },
    proveedores: { type: Object, required: true },
    categorias: { type: Object, required: true },
})

const form = useForm({
    codigo_compra: props.data.codigo_compra,
    fecha: props.data.fecha,
    descripcion: props.data.descripcion,
    id_categoria: props.data.id_categoria,
    id_proveedor: props.data.id_proveedor,
    id_tipo_cuenta: props.data.id_tipo_cuenta,
    id_estado_cuenta: props.data.id_estado_cuenta,
    fecha_pago: props.data.fecha_pago,
    gravado18: props.data.gravado18,
    gravado15: props.data.gravado15,
    impuesto18: props.data.impuesto18,
    impuesto15: props.data.impuesto15,
    exento: props.data.exento,
    total: props.data.total,
    id_usuario: props.data.id_usuario,
    created_at: props.data.created_at,
    updated_at: props.data.updated_at,
})

</script>

<template>
    <form @submit.prevent="form.put(route('compra.update', data.id))">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="codigo_compra">Codigo Compra</Label>
                    <Input type="text" id="codigo_compra" name="codigo_compra" v-model="form.codigo_compra"
                        placeholder="Genere o Ingrese Codigo Producto" required />
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="descripcion">Fecha de Compra</Label>
                    <Input type="date" id="fecha" name="fecha" v-model="form.fecha" placeholder="Ingrese Fecha"
                        required />
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="descripcion">Descripcion</Label>
                    <Input type="text" id="descripcion" name="descripcion" v-model="form.descripcion"
                        placeholder="Ingrese Descripcion" required />
                </div>


            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="id_proveedor">Proveedores</Label>
                    <Select v-model="form.id_proveedor" required>
                        <SelectTrigger>
                            <SelectValue />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Proveedores</SelectLabel>
                                <SelectItem v-for="option in proveedores" :value="option.id" :key="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>

            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="id_categoria">Categoria</Label>
                    <Select v-model="form.id_categoria" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione una Categoria" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Categorias</SelectLabel>
                                <SelectItem :value="form.id_categoria.id">{{ form.id_categoria.descripcion }}
                                </SelectItem>
                                <SelectItem v-for="option in categorias" :value="option.id" :key="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="total">Total</Label>
                    <Input type="text" id="total" name="total" v-model="form.total"
                        placeholder="Ingrese Total L. Factura" required />
                </div>


            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Button type="submit">
                        <Save />Guardar Compra
                    </Button>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/compra"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>
            </div>
        </div>
    </form>
</template>
