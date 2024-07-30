<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MovieSearchCard from '@/Components/MovieSearchCard.vue'
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    query: { type: String, default: '' },
    movies: { type: Array, default: [] },
}
);

let query = ref(props.query)
let movies = ref(props.movies)
let isSearched = ref(false);

function searchMovie() {
    axios.get(route('search.movies', query.value), {})
        .then((res) => { movies.value = res.data.movies; console.log(movies); isSearched.value = true; })
        .catch((err) => console.error(err))
}










</script>

<template>
    <AppLayout title="Search">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                Search
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 ">

                    <form @submit.prevent="searchMovie" class="flex flex-row gap-0 ">
                        <input type="text" v-model="query"
                            class=" rounded-s-md bg-transparent border-r-0 border-2 focus:border-yellow-500 w-full" />
                        <button type="submit"
                            class="rounded-e-md bg-transparent  border-2 border-gray-500 border-l-0 text-center p-2">
                            Search
                        </button>
                    </form>



                    <div v-if="movies.length > 0" class="flex flex-col mt-5 gap-2">
                        <MovieSearchCard v-for="movie in movies" :movie="movie" :key="movie.id" />
                    </div>

                    <div class="text-4xl p-5 font-extrabold text-center">
                        <p v-if="isSearched">
                            No movies found :/
                        </p>
                        <p v-else>
                            Let search some movie!
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
