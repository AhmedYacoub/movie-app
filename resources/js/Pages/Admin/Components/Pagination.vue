<script setup>
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    links: Array,
});
</script>

<template>
    <Link
        v-for="link in links"
        :href="link.url"
        v-html="link.label"
        :key="link"
        class="px-3 py-2 mx-1 my-1 text-sm leading-4 text-gray-500 border rounded-md"
        :class="{
            'text-gray-400': !link.url,
            'font-bold bg-gray-300': link.active,
        }"
    />
</template>
