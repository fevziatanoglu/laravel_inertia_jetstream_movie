<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import MovieHeader from '@/Components/MovieHeader.vue';
import CommentCard from '@/Components/CommentCard.vue';



const props = defineProps({
    comments: { type: Object, required: true },
    movie: { type: Object, required: true },
}
);

console.log(props.comments);


let commentText = ref('');
let commentScore = ref(0);

function addComment() {
    console.log(commentText , commentScore);
    router.post(route('add.comment', { 'movie': props.movie.id, 'content': commentText.value, 'score': commentScore.value }), {}, {
        onSuccess: (res) => {
            // router.visit('');
            console.log(res)
        },
        onError: (error) => {
            console.error(error);
        },
    })
}



</script>


<template>
    <AppLayout :title="movie.title + 's Comments'">
        <MovieHeader :id="movie.id" :title="movie.title" />


        <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white flex flex-col gap-5 ">

            <form @submit.prevent="addComment" method="post" class="flex flex-row p-2 px-40 w-full">
                <input type="text" :placeholder="'Lets comment about ' + movie.title" v-model="commentText" required
                    class="rounded-s-md bg-transparent border-r-0 border-2 focus:border-yellow-500 w-full" />
                <input id="score" type="number" v-model="commentScore" min="0" max="5" />

                <button
                    class="rounded-e-md bg-transparent  border-2 border-gray-500 border-l-0 text-center p-2">Comment</button>
            </form>


            <CommentCard v-for="comment in comments" :comment="comment" :key="comment.id" />

        </div>




    </AppLayout>
</template>
