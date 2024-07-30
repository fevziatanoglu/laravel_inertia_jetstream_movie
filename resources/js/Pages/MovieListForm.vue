<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router, usePage } from '@inertiajs/vue3';

const props = defineProps(
    {


    }
)

let title = '';
let description = ''
let isPublic = false;



function createMovieList() {
    console.log(name , description , isPublic);
    router.post(route('add.movielist'), { 'title' : title , 'description' : description , 'isPublic' : isPublic }, {
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
    <AppLayout title="Create Movie List">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 ">
                <div
                    class="flex flex-col justify-center items-center w-full h-full  p-5 gap-16 text-white bg-gray-400 shadow-xl">

                    <h1 class="text-2xl font-bold">Create a New Movie List</h1>

                    <form @submit.prevent="createMovieList"
                        class=" w-1/2 flex flex-col justify-start items-center gap-5">

                        <div class="flex justify-between items-center w-full ">
                            <label for="name">Name</label>
                            <input type="text" v-model="title" id="title" required class="w-1/2 text-black" />
                            <!-- <span v-if="errors.name" class="error">{{ errors.name }}</span> -->

                        </div>

                        <div class="flex justify-between items-center w-full ">
                            <label for="description">Description</label>
                            <textarea v-model="description" id="description" class="w-1/2 text-black"></textarea>
                            <!-- <span v-if="errors.description" class="error">{{ errors.description }}</span> -->
                        </div>

                        <div class="flex justify-between items-center w-full ">
                            <label for="isPublic">Is Public</label>
                            <input type="checkbox" v-model="isPublic" id="isPublic" />
                            <!-- <span v-if="errors.isPublic" class="error">{{ errors.isPublic }}</span> -->
                        </div>

                        <button class="bg-yellow-500 rounded p-5 font-bold w-full" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
