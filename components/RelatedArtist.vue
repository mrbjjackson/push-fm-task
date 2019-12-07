<template>
   <li class="flex group btn relative transition btn-secondary py-2 pl-3 mr-4 mb-4">
    <a class="flex related-artist-link flex-wrap" :href="artistLink" :title="artist.name" >
       <artist-image class="track-img inline-block rounded-full w-10 h-10 lg:w-12 lg:h-12 bg-cover bg-no-repeat bg-center border border-white bg-indigo-dark mr-4"
        :name="artist.name"
        :image="artist.images[1].url"
        :id="artist.id" />
       {{artist.name}}
    </a>
  </li>
</template>



<script>

import ArtistImage from './ArtistImage.vue'

export default {
  name: 'RelatedArtist',
  components: {
    ArtistImage
  },
  props: ['artist' ],
  computed: {
    artistLink: function() { return `./index.php?id=${this.artist.id}` }
  }
}
</script>



<style>

</style>