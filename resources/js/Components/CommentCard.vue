<script setup>
import { router, usePage } from "@inertiajs/vue3"


const props = defineProps({
    comment: { type: Object, required: true }
})

function deleteComment() {
    router.delete(route('delete.comment' , {'comment' : props.comment.id}) , {
        onSuccess: (res) => {
            router.visit('');
            // console.log(res)
        },
        onError: (error) => {
            console.error(error);
        },
    })
}



</script>

<template>
    <div class="bg-gray-200 rounded shadow-xl p-5">
        <div class="flex flex-row justify-between items-center  w-full ">
            <div class="flex flex-row items-center gap-2">
                <a :href="route('get.user' , comment.user_id)" class=" text-2xl font-bold hover:underline">{{ comment.user_name }}</a>
                <p class="text-yellow-600">{{ comment.score + ' score' }} </p>
            </div>
            
            <button v-if="usePage().props.auth.user.id == comment.user_id" v-on:click="deleteComment" class="justify-self-end bg-red-500 rounded-md px-3 py-2 text-white">X</button>
        </div>
        <a class="underline font-semibold hover:opacity-50" :href="route('get.movie', comment.commentable_id)">{{
            comment.movie_name }}</a>
        {{ comment.content }}
    </div>
</template>