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
    empleados: { type: Object, required: true },
    categorias: {type:Object, required:true},
})

const form = useForm({
    fecha: props.data.fecha,
    descripcion: props.data.descripcion,
    id_empleado: props.data.id_empleado,
    id_categoria: props.data.id_categoria,
    total: props.data.total,
    id_usuario: props.data.id_usuario,
    created_at: props.data.created_at,
    updated_at: props.data.updated_at,
})

console.log(form.id_empleado);
console.log(props.data);



</script>

<template>
    <form @submit.prevent="form.put(route('planilla.update', data.id))">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="fecha">Fecha</Label>
                    <Input 
                        type="date" 
                        id="fecha" 
                        name="fecha" 
                        v-model="form.fecha" 
                        placeholder="Ingrese Fecha"
                        required 
                    />
                </div>
            </div>
            
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="descripcion">Descripción</Label>
                    <Input 
                        type="text" 
                        id="descripcion" 
                        name="descripcion" 
                        v-model="form.descripcion"
                        placeholder="Ingrese Descripción" 
                        required 
                    />
                </div>
            </div>

            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="id_empleado">Empleado</Label>
                    <Select v-model="form.id_empleado" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione un empleado" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Empleados</SelectLabel>
                                <SelectItem 
                                    v-for="option in empleados" 
                                    :key="option.id" 
                                    :value="option.id"
                                >
                                    {{ option.descripcion }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="id_categoria">Categoría</Label>
                    <Select v-model="form.id_categoria" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione una categoría" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Categorías</SelectLabel>
                                <SelectItem 
                                    v-for="option in categorias" 
                                    :key="option.id" 
                                    :value="option.id"
                                >
                                    {{ option.descripcion }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="total">Total</Label>
                    <Input 
                        type="number" 
                        id="total" 
                        name="total" 
                        v-model="form.total"
                        placeholder="Ingrese Total L. Planilla" 
                        step="0.01"
                        min="0"
                        required 
                    />
                </div>
            </div>
            
            <div>
                <!-- empty column -->
            </div>

            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="submit">Acción</Label>
                    <Button type="submit" :disabled="form.processing">
                        <Save class="mr-2 h-4 w-4" />
                        {{ form.processing ? 'Guardando...' : 'Guardar Planilla' }}
                    </Button>
                </div>
            </div>

            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="back">Navegación</Label>
                    <Link href="/planilla"> 
                        <Button variant="destructive" type="button">
                            <CircleArrowLeft class="mr-2 h-4 w-4" />
                            Regresar
                        </Button>
                    </Link>
                </div>
            </div>

            <div>
                <!-- empty column -->
            </div>
        </div>
    </form>
</template>
