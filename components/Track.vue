<template>
  <div class="track">
    <button v-on:click="loadTrack(track)" class="font-bold inline-flex items-center rounded-full text-left relative leading-none whitespace-no-wrap truncate select-none transition max-w-full overflow-hidden text-sm lg:text-base px-4 py-2 text-action hover:bg-action-20 active:bg-action-25">
    <img class="track-img inline-block rounded-full w-10 h-10 lg:w-12 lg:h-12 bg-cover bg-no-repeat bg-center border border-white bg-indigo-dark mr-4" :src="track.image"/>
    {{track.title}}<span class="duration"> ({{track.duration}})</span>
    </button>
    </div>
</template>

<script>
export default {
    name: "Track",
    props: ['track'],
    methods: {
      loadTrack: function(t){
        this.$emit('changeTrack', t)
      }
    }
}
</script>


<style>
.duration {
  display:inline-block;
  padding-left:6px;
  font-size:0.8em;
}
</style>
