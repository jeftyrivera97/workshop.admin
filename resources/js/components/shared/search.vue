<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { Input } from "@/components/ui/input"

const props = defineProps({
    search: { type: String, required: true },
    searchRoute: { type: String, required: true },
})

const form = reactive({
    query: null,
})

function submit() {
    router.get(`${props.searchRoute}`, form)
}

</script>

<template>

    <div className="flex w-full max-w-sm items-center space-x-2">
        <form @submit.prevent="submit">
            <Input type="text" id="query" name="query" v-model="form.query" :placeholder="search" />
            <!-- <Button size="icon">
                                <Search />
                            </Button> -->
        </form>
    </div>
</template>
