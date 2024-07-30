<script setup>


const props = defineProps({
    id: { type: Number, required: true },
    title: { type: String, required: true }
})
</script>







<template #header>
    <div class=" flex flex-row gap-10 text-xl items-center py-3 justify-center ">
        <a :href="route('get.movie', id)" class="font-semibold text-3xl text-gray-800 leading-tight ">
            {{ title }}
        </a>
        <a :href="route('get.movie', id)">Movie</a>
        <a :href="route('get.actors', id)">Crew</a>
        <a :href="route('get.comments', id)">Comments</a>
    </div>

</template>
