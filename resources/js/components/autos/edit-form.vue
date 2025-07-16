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
    marcas: { type: Object, required: true },
    categorias: { type: Object, required: true },
    tracciones: { type: Object, required: true },
})

const form = useForm({
    id_marca: props.data.id_marca,
    modelo: props.data.modelo,
    year: props.data.year,
    traccion: props.data.traccion,
    cilindraje: props.data.cilindraje,
    combustion: props.data.combustion,
    id_categoria: props.data.id_categoria,
    id_estado: props.data.id_estado,
    id_usuario: props.data.id_usuario,
    created_at:props.data.created_at,
    updated_at: props.data.updated_at,
})

</script>

<template>
    <form @submit.prevent="form.put(route('auto.update', data.id))">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="id_marca">Marca</Label>
                    <Select v-model="form.id_marca" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione una Marca" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Marcas</SelectLabel>
                                <SelectItem v-for="option in marcas" :value="option.id" :key="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="descripcion">Modelo</Label>
                    <Input type="text" id="modelo" name="modelo" v-model="form.modelo" placeholder="Ingrese Descripcion"
                        required />
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="year">Año</Label>
                    <Input type="number" id="year" name="year" v-model="form.year" placeholder="Ingrese Año" step="any"
                        min="1980" max="2030" />
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="traccion">Traccion</Label>
                    <Select v-model="form.traccion" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione una Traccion" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Tracciones</SelectLabel>
                                <SelectItem v-for="option in tracciones" :value="option" :key="option.id">
                                    {{ option }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="base">Ingrese Cilindraje Motor</Label>
                    <Input type="number" id="cilindraje" name="cilindraje" v-model="form.cilindraje"
                        placeholder="Ingrese Cilindraje" min="1.0" max="5.0" step="any" required />
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="base">Combustion del Motor</Label>
                    <Select v-model="form.combustion" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione Combustion" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Base</SelectLabel>
                                <SelectItem value="Gasolina">Gasolina</SelectItem>
                                <SelectItem value="Diesel">Diesel</SelectItem>
                                <SelectItem value="Electrico">Electrico</SelectItem>
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
                    <Label htmlFor="accion">Accion</Label>
                    <Button type="submit">
                        <Save />Guardar Auto
                    </Button>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/auto"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>
            </div>
        </div>
    </form>
</template>
