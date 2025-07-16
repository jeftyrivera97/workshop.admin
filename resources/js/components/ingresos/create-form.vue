<script setup lang="ts">

import { Button } from '@/components/ui/button'
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { CircleArrowLeft } from 'lucide-vue-next';
import { Save } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3'
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'

defineProps({
    categorias: { type: Object, required: true },
})

const form = reactive({
    descripcion: '',
    fecha: '',
    id_categoria: '',
    total: '',
    id_usuario: '',
    id_estado: '',
    created_at: '',
    updated_at: '',
    descripcionServicio: '',
    id_cliente: '',
    id_auto: '',
    id_categoria_servicio: '',
    color: '',
    placa: '',
    id_pago_categoria: '',
})


function submit() {
    router.post('/ingreso', form)
}


</script>

<template>
    <form @submit.prevent="submit">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="fecha">Fecha</Label>
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
                    <Label htmlFor="total">Total Ingreso</Label>
                    <Input type="number" id="total" name="total" v-model="form.total"
                        placeholder="Ingrese Total Ingreso" required />
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
                        <Save />Guardar Ingreso
                    </Button>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/ingreso"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>
            </div>
            <div>

            </div>
            <div>

            </div>
            <div>

            </div>
        </div>


    </form>
</template>
