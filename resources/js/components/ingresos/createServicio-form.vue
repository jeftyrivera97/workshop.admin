<script setup lang="ts">

import { Button } from '@/components/ui/button'
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { RadioGroup, RadioGroupItem } from '@/components/ui/radio-group'
import { reactive } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import { CircleArrowLeft } from 'lucide-vue-next';
import { Save } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue';
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'

const props = defineProps({
    categorias: { type: Object, required: true },
    servicios: { type: Object, required: true },
    autos: { type: Object, required: true },
    clientes: { type: Object, required: true },
    pagos_categorias: { type: Object, required: true },
    colores: { type: Object, required: true },
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

console.log(props.colores);



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
                                <SelectItem v-for="option in categorias" :value="option.id">
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
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Cliente</Label>
                    <Select v-model="form.id_cliente" id="id_cliente" name="id_cliente">
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione un Cliente" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Clientes</SelectLabel>
                                <SelectItem v-for="option in clientes" :value="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Automovil</Label>
                    <Select v-model="form.id_auto" id="id_auto" name="id_auto">
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione un Auto" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup v-for="auto in autos" :value="auto.id">
                                <SelectItem v-for="marca in auto.marcas" :value="auto.id">
                                    {{ marca.descripcion }} {{ auto.modelo }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Categoria de Servicio</Label>
                    <Select v-model="form.id_categoria_servicio" id="id_categoria_servicio"
                        name="id_categoria_servicio">
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione una Categoria" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Categorias</SelectLabel>
                                <SelectItem v-for="option in servicios" :value="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Tipo de Pago</Label>
                    <Select v-model="form.id_pago_categoria" id="id_pago_categoria" name="id_pago_categoria">
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione Tipo de Pago" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Tipos de Pagos</SelectLabel>
                                <SelectItem v-for="option in pagos_categorias" :value="option.id">
                                    {{ option.descripcion }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Color</Label>
                    <Select v-model="form.color" id="color" name="color">
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione Color" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Colores</SelectLabel>
                                <SelectItem v-for="option in colores" :value="option">
                                    {{ option }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Placa</Label>
                    <Input type="text" id="placa" name="placa" v-model="form.placa" placeholder="Ingrese Placa" />
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
        </div>


    </form>
</template>
