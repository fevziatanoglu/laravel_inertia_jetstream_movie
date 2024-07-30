<script setup>
import CommentCard from '@/Components/CommentCard.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({

    comments: { type: Array },
    lists: { type: Array }
});




</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white flex flex-col gap-5 mt-5">




            <CommentCard v-for="comment in comments" :comment="comment" :key="comment.id" />
            <div v-for="list in lists" class="bg-gray-200 rounded shadow-xl p-5 text-xl">
                <div class="flex flex-row gap-2">
                    <a :href="route('get.movielist', list.id)" class="underline font-bold">{{ list.title }}</a>
                    <p>
                       movie list updated by 
                    </p>
                    <a :href="route('get.user', list.user_id)" class="underline font-bold">{{ list.user_id }}</a>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
