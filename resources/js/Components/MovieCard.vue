<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'



const props = defineProps({
    movie: {
        type: Object,
        required: true,
    },
    list_id: {
        type: Number,
        required: true,
    }


});

let list_id = ref(props.list_id);
console.log(list_id);

function deleteMovieFromList() {
    router.delete(route('delete.movie.movielist', { 'list': props.list_id, 'movie': props.movie.id }),  {
        preserveState: true,
        onSuccess: (resp) => {
            console.log(resp);
        },
        onError: (error) => {
            console.error(error);
        },
    })
}

</script>

<template>
    <div class="relative h-[500px] w-[300px] rounded-2xl overflow-hidden hover:border-4 border-yellow-500 ">
        <a :href="route('get.movie', movie.id)" class="h-full w-full z-0 ">
            <img :src="(movie.poster_path || movie.backdrop_path)" alt="Movie Poster"
                class="absolute  h-full w-full object-cover bg-white">
            <h1
                class="absolute bottom-0 left-0 p-4 text-white bg-black bg-opacity-50 w-full text-center text-2xl font-bold">
                {{ movie.title }}
            </h1>
            <h1 class="absolute top-0 left-0 p-4 text-whitec text-xl font-bold rounded-lg w-full text-border ">
                {{ movie.release_date.slice(0, 4) }}
            </h1>

        </a>
        <button v-if="list_id" v-on:click="deleteMovieFromList"
            class="bg-red-500 p-3 absolute z-20 top-0 right-0 hover:opacity-50 text-white">X</button>

    </div>


</template>