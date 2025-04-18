<script setup>
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'

const props = defineProps({
    color: { type: String, required: true },
})

</script>

<template>
    <Select v-model="color">
        <SelectTrigger>
            <SelectValue placeholder="Seleccione un Color" />
        </SelectTrigger>
        <SelectContent>
            <SelectGroup>
                <SelectLabel>Rojos</SelectLabel>
                <SelectItem>Rojo Carmesi</SelectItem>
                <SelectItem>Rojo Rubi</SelectItem>
                <SelectItem>Rojo Escarlata</SelectItem>
                <SelectItem>Rojo Amaranto</SelectItem>
                <SelectItem>Rojo Granate</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Verdes</SelectLabel>
                <SelectItem>Verde</SelectItem>
                <SelectItem>Esmeralda</SelectItem>
                <SelectItem>Jade</SelectItem>
                <SelectItem>Verde Oliva</SelectItem>
                <SelectItem>Verde verones</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Azules</SelectLabel>
                <SelectItem>Azul</SelectItem>
                <SelectItem>Azul Marino</SelectItem>
                <SelectItem>Azul Zafiro</SelectItem>
                <SelectItem>Azul Indigo</SelectItem>
                <SelectItem>Azul Claro</SelectItem>
                <SelectItem>Azul Turqui</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Magenta</SelectLabel>
                <SelectItem>Magenta</SelectItem>
                <SelectItem>Fucsia</SelectItem>
                <SelectItem>Morado</SelectItem>
                <SelectItem>Lila</SelectItem>
                <SelectItem>Salmon</SelectItem>
                <SelectItem>Rosa</SelectItem>
                <SelectItem>Lavanda</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Cian</SelectLabel>
                <SelectItem>Cian</SelectItem>
                <SelectItem>Turquesa</SelectItem>
                <SelectItem>Celeste</SelectItem>
                <SelectItem>Aguamarina</SelectItem>
                <SelectItem>Menta</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Amarillo</SelectLabel>
                <SelectItem>Amarillo</SelectItem>
                <SelectItem>Ammarillo Lima</SelectItem>
                <SelectItem>Amarillo Oro</SelectItem>
                <SelectItem>Amarillo Ambar</SelectItem>
                <SelectItem>Amarillo Indio</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Marron</SelectLabel>
                <SelectItem>Marron</SelectItem>
                <SelectItem>Caqui</SelectItem>
                <SelectItem>Ocre</SelectItem>
                <SelectItem>Siena</SelectItem>
                <SelectItem>Borgoña</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Naranja</SelectLabel>
                <SelectItem>Naranja</SelectItem>
                <SelectItem>Zanahoria</SelectItem>
                <SelectItem>Sesamo</SelectItem>
                <SelectItem>Albaricoque</SelectItem>
                <SelectItem>Beige</SelectItem>
                <SelectItem>Durazno</SelectItem>
            </SelectGroup>
            <SelectGroup>
                <SelectLabel>Blancos</SelectLabel>
                <SelectItem>Naranja</SelectItem>
                <SelectItem>Blanco</SelectItem>
                <SelectItem>Blanco Nieve</SelectItem>
                <SelectItem>Blanco Hueso</SelectItem>
                <SelectItem>Blanco Lino</SelectItem>
                <SelectItem>Blanco Marfil</SelectItem>
                <SelectItem>Blanco Zinc</SelectItem>
                <SelectItem>Plata</SelectItem>
                <SelectItem>Gris</SelectItem>
                <SelectItem>Negro</SelectItem>
            </SelectGroup>
        </SelectContent>
    </Select>
</template>
