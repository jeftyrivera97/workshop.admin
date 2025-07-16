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
    codigo_empleado: props.data.codigo_empleado,
    descripcion: props.data.descripcion,
    id_categoria: props.data.id_categoria,
    telefono: props.data.telefono,
    id_usuario: props.data.id_usuario,
    created_at: props.data.created_at,
    updated_at: props.data.updated_at,
})

</script>

<template>
    <form @submit.prevent="form.put(route('empleado.update', data.id))">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="codigo_empleado">Identidad Empleado</Label>
                    <Input type="text" id="codigo_empleado" name="codigo_empleado" v-model="form.codigo_empleado"
                        placeholder="Ingrese Identidad/RTN" required />
                </div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="descripcion">Nombre y Apellido</Label>
                    <Input type="text" id="descripcion" name="descripcion" v-model="form.descripcion"
                        placeholder="Ingrese Nombre y Apellido" required />
                </div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="id_proveedor">Cargo</Label>
                    <Select v-model="form.id_categoria" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione un Cargo" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Categorias</SelectLabel>
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
                    <Label htmlFor="descripcion">Telefono</Label>
                    <Input type="text" id="telefono" name="telefono" v-model="form.telefono"
                        placeholder="Ingrese Telefono" required />
                </div>

            </div>
            <div>


            </div>
            <div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Button type="submit">
                        <Save />Guardar Empleado
                    </Button>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/empleado"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>
            </div>
        </div>
    </form>
</template>
