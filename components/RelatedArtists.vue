
<template>
  <div class="related-artists">
    <h4 class="mb-4">Related Artists</h4>
    <ul class="flex flex-wrap"><RelatedArtist v-for="artist in artists" v-bind:artist="artist" v-bind:key="artist.id"></RelatedArtist></ul>
  </div>
</template>


<script>
import RelatedArtist from './RelatedArtist.vue'

export default {
  name: 'RelatedArtists',
  components: {
    RelatedArtist
  },
  props: ['artists']
}
</script>

<style>

</style>