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
    dataServicio: { type: Object, required: true },
    categorias: {type:Object, required:true},
    servicios: {type:Object, required:true},
    autos: {type:Object, required:true},
    clientes: {type:Object, required:true},
    pagos_categorias: {type:Object, required:true},
})

const form = useForm({
    descripcion: props.data.descripcion,
    fecha: props.data.fecha,
    id_categoria: props.data.id_categoria,
    total: props.data.total,
    id_usuario: props.data.id_usuario,
    id_estado: props.data.id_estado,
    created_at: props.data.created_at,
    updated_at: props.data.updated_at,
    descripcionServicio: props.dataServicio.descripcionServicio,
    id_cliente: props.dataServicio.id_cliente,
    id_auto: props.dataServicio.id_auto,
    id_categoria_servicio: props.dataServicio.id_categoria,
    color: props.dataServicio.color,
    placa: props.dataServicio.placa,
    id_pago_categoria: props.dataServicio.id_pago_categoria,
})

</script>

<template>
    <form @submit.prevent="form.put(route('ingreso.update', data.id))">
        <div className="grid grid-cols-4 grid-rows-3 gap-4">
            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="fecha">Fecha</Label>
                    <Input type="date" id="fecha" name="fecha" v-model="form.fecha" placeholder="Ingrese Fecha"
                        required />
                </div>
            </div>
            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="descripcion">Descripcion</Label>
                    <Input type="text" id="descripcion" name="descripcion" v-model="form.descripcion"
                        placeholder="Ingrese Descripcion" required />
                </div>
            </div>

            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
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
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="total">Total Ingreso</Label>
                    <Input type="number" id="total" name="total" v-model="form.total" placeholder="Ingrese Total Ingreso"
                        required />
                </div>

            </div>
            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
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
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Automovil</Label>
                    <Select v-model="form.id_auto" id="id_auto" name="id_auto" >
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione un Auto" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup v-for="auto in autos" :value="auto.id">
                                <SelectLabel>Automoviles</SelectLabel>
                                <SelectItem v-for="marca in auto.marcas" :value="auto.id">
                                    {{ marca.descripcion }} {{auto.modelo}}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Categoria de Servicio</Label>
                    <Select v-model="form.id_categoria_servicio"  id="id_categoria_servicio" name="id_categoria_servicio" >
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
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Tipo de Pago</Label>
                    <Select v-model="form.id_pago_categoria"  id="id_pago_categoria" name="id_pago_categoria" >
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
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Color</Label>
                    <Input type="text" id="color" name="color" v-model="form.color"
                        placeholder="Ingrese Color"  />
                </div>

            </div>
            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Placa</Label>
                    <Input type="text" id="placa" name="placa" v-model="form.placa"
                        placeholder="Ingrese Placa"  />
                </div>

            </div>


            <div>

            </div>
            <div>

            </div>

            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Button type="submit">
                        <Save />Guardar Ingreso
                    </Button>
                </div>
            </div>
            <div>
                <div className="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/ingreso"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>
            </div>
        </div>
    </form>
</template>
