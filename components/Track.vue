<template>
  <div class="track">
    <button class="font-bold inline-flex items-center rounded-full text-left relative leading-none whitespace-no-wrap truncate select-none transition max-w-full overflow-hidden text-sm lg:text-base px-4 py-2 text-action hover:bg-action-20 active:bg-action-25">
    <img class="track-img inline-block rounded-full w-10 h-10 lg:w-12 lg:h-12 bg-cover bg-no-repeat bg-center border border-white bg-indigo-dark mr-4" :src="track.image"/>
    {{track.title}}
    </button>
    </div>
</template>

<script>
export default {
    name: "Track",
    props: ['track']
}
</script>


<style>
</style>
