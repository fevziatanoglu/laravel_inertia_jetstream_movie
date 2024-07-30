<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CommentCard from '@/Components/CommentCard.vue';


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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 ">


                <div v-if="$page.props.auth.user.id == user.id">
                    <a :href="route('get.movielist.form')">Create Movie List</a>
                </div>

                <!-- lists -->
                <h1>My Lists</h1>

                <div class=" flex flex-row justify-start gap-5">
                    <a class="bg-gray-300 shadow-lg p-5 " v-for="list in lists" :key="list.id" :href="route('get.movielist', list.id)">
                       

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
                <div>
                    <h1>my comments</h1>
                    <CommentCard v-if="comments.length > 0" v-for="comment in comments" :key="comment.id"
                        :comment="comment" />

                </div>
            </div>
        </div>


    </AppLayout>
</template>
