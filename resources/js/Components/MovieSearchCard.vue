<script setup>
const props = defineProps({
    movie: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <a class="p-5 flex flex-col bg-gray-300 shadow-xl hover:bg-gray-500" :href="route('get.movie' , movie.id)">
        <h1
            class="font-bold text-2xl">
            {{ movie.title }}
        </h1>
        <p class="text-sm opacity-70">
            {{ movie.release_date.slice(0, 4) }}
        </p>

        <p class="text-xs opacity-50">
            {{ movie.overview }}
        </p>


    </a>
</template>