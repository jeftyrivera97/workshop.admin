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
    empleados: { type: Object, required: true },
    categorias: { type: Object, required: true },
})

const form = reactive({
    descripcion: '',
    fecha: '',
    id_empleado: '',
    id_categoria: '',
    total: '',
    id_usuario: '',
    id_estado: '',
    created_at: '',
    updated_at: '',
})


function submit() {
    router.post('/planilla', form)
}

</script>

<template>
    <form @submit.prevent="submit">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
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
                    <Label htmlFor="id_empleado">Empleado</Label>
                    <Select v-model="form.id_empleado" required>
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione un Empleado" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Empleados</SelectLabel>
                                <SelectItem v-for="option in empleados" :key="option.id" :value="option.id">
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
                                <SelectItem v-for="option in categorias" :key="option.id" :value="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>

            </div>

            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="total">Total Pago</Label>
                    <Input type="text" id="total" name="total" v-model="form.total" placeholder="Ingrese Total L. Pago"
                        required />
                </div>

            </div>
            <div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Button type="submit">
                        <Save />Guardar Planilla
                    </Button>
                </div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/planilla"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>

            </div>
        </div>
    </form>
</template>
