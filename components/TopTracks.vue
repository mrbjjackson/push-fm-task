<template>
  <div class="top-tracks">
    <h4 class="mb-4">{{name}}'s top tracks:</h4>
    <ul>
      <li v-for="track in tracks" :key="track.id"><Track :track="track" v-on:changeTrack="changeTrack($event)" /></li>
    </ul>
  </div>
</template>
<script>

import Track from './Track.vue'
export default {
  name: "TopTracks",
  components: {
    Track
  },
  props: ['name','tracks','id' ],
  methods: {
    changeTrack: function(t) {
        this.$emit('changeTrack', t)
    }
  }
}
</script>


<style>

</style>