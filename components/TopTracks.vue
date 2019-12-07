<template>
  <div class="top-tracks">
    <h4 class="mb-4">{{name}}'s top tracks:</h4>
    <ul>
      <li v-for="track in tracks" :key="track.id"><Track :track="track" /></li>
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
}
</script>


<style>

</style>