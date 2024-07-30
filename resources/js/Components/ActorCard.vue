<script setup>

const props = defineProps({
    actor : {type : Object , required : true}
})

</script>


<template>
    <div class="flex flex-col justify-center items-center">
        <img :src="actor.profile_path" alt="Actor Profile" class="h-[150px] rounded-t-xl">
        <h1 class="text-2xl font-bold">{{ actor.name }}</h1>
        <p class="font-semibold text-gray-600">{{ actor.pivot.character }}</p>
    </div>
</template>