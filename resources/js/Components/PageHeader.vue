<script setup>
import { Head } from '@inertiajs/vue3'
const props = defineProps({    
    title: String
});
</script>
<template>    
    <Head :title="title" />
    <h1 class="text-xl font-medium">
        <slot name="title">
            {{ title }}
        </slot>
    </h1>
</template>