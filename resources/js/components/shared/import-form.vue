<script setup lang="ts">

import { Button } from '@/components/ui/button'
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { reactive } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import { CircleArrowLeft } from 'lucide-vue-next';
import { useForm } from '@inertiajs/vue3'
import { Save } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3'
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'

const props = defineProps({
    url: { type: String, required: true },
})

const form = useForm({
    file: null,
})

function submit() {
    router.post(`${props.url}`, form)
}


</script>

<template>
    <form @submit.prevent="submit">
        <div className="grid grid-cols-2 grid-rows-2 gap-4">
            <div>
                <div class="grid w-full max-w-sm items-center gap-1.5">
                    <Label for="file">Archivo</Label>
                    <Input id="file" name="file" type="file" accept=".csv"
                        @input="form.file = $event.target.files[0]" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    <Button type="submit">
                        <Save />Subir
                    </Button>
                </div>
            </div>
        </div>
    </form>
</template>
