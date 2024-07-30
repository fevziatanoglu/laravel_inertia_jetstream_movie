<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MovieHeader from '@/Components/MovieHeader.vue';

import { router } from '@inertiajs/vue3';
import { ref } from 'vue';


const props = defineProps({
    movie: { type: Object, required: true },
    score: { type: Object, required: true }
}
);


console.log(props.score)

</script>


<template>
    <AppLayout :title="movie.title">

        <MovieHeader :id="movie.id" :title="movie.title" />

        <!-- main -->
        <div class="relative  overflow-hidden flex justify-center  items-center  p-0 mt-3">
            <!-- backdrop -->
            <img style="pointer-events: none" :src="movie.backdrop_path || movie.poster_path" alt="Movie backdrop"
                class="h-screen  w-screen  absolute  top-0 blur-md   opacity-70 " />
            <!-- movie info container -->
            <div class="h-full  py-16  w-full z-10 flex flex-col justify-center items-center bg-black bg-opacity-30 ">
                <!-- movie info  -->
                <div class="w-3/5  flex flex-row  gap-5 text-white ">
                    <!-- movie poster -->
                    <img :src="movie.poster_path" alt="Movie poster"
                        class="h-[350px] border-white border-2 rounded-2xl">
                    <!-- movie datas container -->
                    <div class=" flex flex-col    justify-between   text-3xl">
                        <!-- title -->
                        <h1 class="text-7xl font-bold text-border">
                            {{ movie.title }}
                        </h1>
                        <!-- genres container -->
                        <div class="flex flex-row gap-2 text-sm">
                            <!-- genre -->
                            <div v-for="genre in movie.genres" :key="genre.id"
                                class="bg-white bg-opacity-30 rounded-lg px-2 py-1 text-center ">
                                {{ genre.name }}
                            </div>
                        </div>
                        <!-- time -->
                        <div class="text-yellow-300 flex flex-row items-center gap-2">
                            <p class="text-4xl">{{ score.avarage }}</p>
                            <p class="opacity-70 text-md">
                                ({{ score.counter }})
                            </p>

                        </div>
                        <div class="text-xl">
                            {{ movie.runtime }} mn
                        </div>
                        <!-- date -->
                        <div>
                            {{ movie.release_date.slice(0, 4) }}
                        </div>
                        <!-- overview -->
                        <p class="text-sm text-gray-300">
                            {{ movie.overview }}
                        </p>
                    </div>

                </div>
                <!-- cast container -->
                <!-- <div class=" flex flex-row w-full justify-evenly">
                    <MemberCard v-for="member in movie.crew" :member="member"></MemberCard>
                </div> -->


            </div>


        </div>
    </AppLayout>
</template>
