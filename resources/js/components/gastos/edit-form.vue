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
    categorias: { type: Object, required: true },
})

const form = useForm({
    codigo_gasto: props.data.codigo_gasto,
    fecha: props.data.fecha,
    descripcion: props.data.descripcion,
    id_categoria: props.data.id_categoria,
    total: props.data.total,
    id_usuario: props.data.id_usuario,
    created_at: props.data.created_at,
    updated_at: props.data.updated_at,
})

</script>

<template>
    <form @submit.prevent="form.put(route('gasto.update', data.id))">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="codigo_gasto">Codigo Gasto</Label>
                    <Input type="text" id="codigo_gasto" name="codigo_gasto" v-model="form.codigo_gasto"
                        placeholder="Genere o Ingrese Codigo Producto" required />
                </div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="descripcion">Fecha</Label>
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
                                <SelectItem v-for="option in categorias"  :key="option.id"  :value="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>

            </div>
            <div>

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
                        <Save />Guardar Gasto
                    </Button>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/gasto"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>
            </div>
        </div>
    </form>
</template>
