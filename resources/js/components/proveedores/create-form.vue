<script setup lang="ts">

import { Button } from '@/components/ui/button'
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { reactive } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import { CircleArrowLeft } from 'lucide-vue-next';
import { Save } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3'
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'

const props = defineProps({

    categorias: {type:Object, required:true}
})

const form = reactive({
    codigo_proveedor: '',
    descripcion: '',
    categoria: '',
    contacto: '',
    telefono: '',
    id_estado: '',
    id_usuario: '',
    id_empresa: '',

})


function submit() {
    router.post('/proveedor', form)
}

</script>

<template>
    <form @submit.prevent="submit">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="codigo_proveedor">Codigo Proveedor</Label>
                    <Input type="text" id="codigo_proveedor" name="codigo_proveedor" v-model="form.codigo_proveedor"
                        placeholder="Genere o Ingrese Codigo Producto" required />
                </div>

            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="descripcion">Descripcion</Label>
                    <Input type="text" id="descripcion" name="descripcion" v-model="form.descripcion"
                        placeholder="Ingrese Nombre" required />
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="label">Categoria</Label>
                    <Select v-model="form.categoria" id="categoria" name="categoria">
                        <SelectTrigger>
                            <SelectValue placeholder="Seleccione Caategoria" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Categorias</SelectLabel>
                                <SelectItem v-for="option in categorias" :value="option">
                                    {{ option }}
                                </SelectItem>

                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="contacto">Contacto/Vendedor</Label>
                    <Input type="text" id="contacto" name="contacto" v-model="form.contacto"
                        placeholder="Ingrese Contacto" required />
                </div>

            </div>

            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="telefono">Telefono</Label>
                    <Input type="text" id="telefono" name="telefono" v-model="form.telefono"
                        placeholder="Ingrese Telefono" required />
                </div>

            </div>
            <div>


            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Button type="submit">
                        <Save />Guardar Proveedor
                    </Button>
                </div>
            </div>
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label htmlFor="accion">Accion</Label>
                    <Link href="/proveedor"> <Button variant="destructive">
                        <CircleArrowLeft />Regresar
                    </Button></Link>
                </div>
            </div>
        </div>
    </form>
</template>
