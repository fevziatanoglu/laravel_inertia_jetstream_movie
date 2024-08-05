<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CommentCard from '@/Components/CommentCard.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    user: { type: Object, required: true },
    lists: { type: Array, required: true },
    comments: { type: Array, required: true }
}
);


console.log(props.lists)

</script>


<template>
    <AppLayout :title="user.name + 's profile'">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ user.name }}'s profile
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 flex flex-col gap-5">


                <div v-if="$page.props.auth.user.id == user.id">
                    <Link :href="route('get.movielist.form')"
                        class="bg-green-500 py-2 px-5 font-extrabold text-white rounded-md">Create Movie List</Link>
                </div>

                <!-- lists -->
                <h1 class="text-6xl text-bold">Lists</h1>

                <div class=" flex flex-row justify-start gap-5">
                    <a class="bg-gray-300 shadow-lg p-5 " v-for="list in lists" :key="list.id"
                        :href="route('get.movielist', list.id)">


                        <h1 class="text-xl font-bold">
                            {{ list.title }}
                        </h1>

                        <p class="text-xs font-light">
                            {{ list.description }}
                        </p>

                        <p>has {{ (list.movies.length || 0) }} movies</p>
                    </a>

                </div>
                <!-- comment -->
                <h1 class="text-6xl text-bold m-1">Comments</h1>

                <div>
                    <CommentCard v-if="comments.length > 0" v-for="comment in comments" :key="comment.id"
                        :comment="comment" />

                </div>
            </div>
        </div>


    </AppLayout>
</template>
