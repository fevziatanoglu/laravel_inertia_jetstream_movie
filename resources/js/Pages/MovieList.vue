<script setup>
import MovieCard from '@/Components/MovieCard.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps(
    {
        movieList: {
            type: Object,
            required: true,
        },
        movies: {
            type: Array,
            required: true,
        }
    }
)

let query = '';
let searchedMovies = ref([]);




function addMovieToList(movie_id) {
    router.post(route('add.movie.movielist', { 'list_id': props.movieList.id, 'movie_id': movie_id }), { 'list_id': props.movieList.id, 'movie_id': movie_id }, {
        onSuccess: (resp) => {
            console.log(resp);
        },
        onError: (error) => {
            console.error(error);
        },
    })
}



function searchMovies() {
    console.log(query);
    axios.get(route('search.movies', query))
        .then(response => {
            searchedMovies.value = response.data.movies;
        })
        .catch(error => {
            console.log(error)
        });

}



</script>

<template>
    <AppLayout :title="movieList.title" class="text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 ">
            <div class="flex flex-col justify-between h-full bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">


                <h1 class="text-black font-extrabold text-5xl">{{ movieList.title }}</h1>
                <!-- movies -->
                <div class="flex flex-wrap  gap-4 justify-start mt-3">
                    <MovieCard v-if="movies.length > 0" v-for="movie in movies" :key="movie.id" :movie="movie"
                        v-bind="$page.props.auth.user.id == movieList.user_id ? { list_id: movieList.id } : {}" />
                    <p v-else class="text-5xl font-bold text-gray-500">There is no film in this list, let's add some</p>
                </div>




                <!-- search -->
                <div v-if="$page.props.auth.user.id == movieList.user_id">

                    <div class=" flex flex-col justify-center mt-10">
                        <div class=" flex flex-row ">
                            <input v-model="query" type="text" placeholder="Search a movie for your list"
                                class="text-black px-4 py-2 border rounded-l w-full" />
                            <button v-on:click="searchMovies"
                                class="rounded-e-md bg-transparent  border-2 border-gray-500 border-l-0 text-center p-2 text-black">Search</button>
                        </div>

                        <!-- searched movies -->
                        <div class="flex flex-col gap-4 mt-4">
                            <div v-for="movie in searchedMovies" :key="movie.id"
                                class="text-black bg-gray-400 p-5 shadow-lg flex flex-row justify-between">
                                <div>
                                    <h1 class="font-bold font-2xl">{{ movie.title }}</h1>
                                    <p class="font-light opacity-50">{{ movie.release_date.slice(0, 4) }}</p>
                                    <a :href="route('get.movie', movie.id)"
                                        class="underline hover:opacity-50 font-semibold ">Check movie page</a>

                                </div>

                                <div class="text-xl flex flex-col gap-2 justify-center items-center">
                                    <button v-if="!movies.some(listMovie => listMovie.id == movie.id)"
                                        v-on:click="addMovieToList(movie.id)"
                                        class="bg-green-500 px-5 py-2 font-extrabold text-white rounded-lg"> Add movie
                                    </button>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>






            </div>

        </div>
    </AppLayout>
</template>
