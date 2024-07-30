<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MovieHeader from '@/Components/MovieHeader.vue';
import ActorCard from '@/Components/ActorCard.vue';




const props = defineProps({
    actors: { type: Array, required: true },
    movie: { type: Object, required: true }
}
);

console.log(props.actors)


</script>


<template>
    <AppLayout :title="movie.title" class="bg-black">

        <MovieHeader :id="movie.id" :title="movie.title" />

        <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white flex flex-row justify-between items-center gap-5 ">

            <ActorCard v-for="actor in actors" :actor="actor" :key="actor.id"/>
        </div>

    </AppLayout>
</template>
