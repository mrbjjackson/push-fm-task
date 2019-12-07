<template>

  <div class="relative w-full lg:container mx-auto">
    <div class="error" v-if="error">{{ error }}</div>
    <div class="spotify-browser" v-else>
      <div class="relative py-6 lg:py-8 transition lg:overflow-x-hidden flex-no-wrap ">
        <h6 class="mb-2">Spotify catalogue explorer</h6>
        <h1 class="mb-8">{{artist.name}}</h1>
        <div class="artist-stats flex flex-wrap">
          <div class="followers mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Followers:</span><h3 class="block w-full text-black leading-none nofix mb-2 lg:mb-4">{{followers}}</h3></div>
          <div class="popularity mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Popularity:</span><h3 class="block w-full text-black leading-none nofix mb-2 lg:mb-4"> {{popularity}}</h3></div>
          <div class="popularity mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Listen:</span><h3 class="block w-full text-black leading-none nofix mb-2 lg:mb-4"><a :href="link">Spotify</a></h3></div>
          <div class="followers mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Genres:</span><ul class="flex flex-wrap" > <li v-for="(genre, index) in genres" class="mr-2 mb-2" :key="index"><a href="#" class="group btn relative transition btn-small btn-secondary">{{genre}}</a></li></ul></div>
        </div>
      </div>
      <div class="flex flex-wrap w-full mb-6 lg:mb-8">
          <div class=" xxl:w-auto xxl:flex-1 mb-6 lg:mb-8 xxl:mb-0 lg:mr-8 ">
            <div class="rounded relative border-indigo-25 transition lg:overflow-x-hidden flex-no-wrap flex flex-col h-full ">
              <ArtistImage :name="name" :image="image" :id="id"></ArtistImage>
            </div>
          </div>
          <div class="w-full xxl:w-auto xxl:flex-1 mb-6 lg:mb-8 xxl:mb-0 ">
            <div class="rounded relative border border-indigo-25 bg-white px-4 lg:px-6 py-6 lg:py-8 shadow-table transition lg:overflow-x-hidden flex-no-wrap flex flex-col h-full">
              <TopTracks :tracks="topTracks" :name="name"></TopTracks>
            </div>
          </div>
      </div>
      <div class="flex flex-wrap w-full mb-6 lg:mb-8">
          <div class="w-full xxl:w-auto xxl:flex-1 mb-6 lg:mb-8 xxl:mb-0 ">
            <div class="rounded relative border border-indigo-25 bg-white px-4 lg:px-6 py-6 lg:py-8 shadow-table transition lg:overflow-x-hidden flex-no-wrap flex flex-col h-full">
              <RelatedArtists v-bind:artists="relatedArtists" ></RelatedArtists>
            </div>
          </div>
      </div>
    </div>
  </div>

</template>

<script>
import ArtistImage from './ArtistImage.vue'
import RelatedArtists from './RelatedArtists.vue'
import TopTracks from './TopTracks.vue'

export default {
  name: 'Main',
  components: {
    ArtistImage,
    RelatedArtists,
    TopTracks
  },
  props: ['artist', 'relatedArtists', 'error'],
  computed: {
    name: function() { return this.artist.name },
    image: function() { return this.artist.images[0].url },
    id: function() { return this.artist.id },
    genres: function() { return this.artist.genres },
    link: function() { return this.artist.external_urls.spotify },
    followers: function() {return this.artist.followers.total},
    popularity: function() {return this.artist.popularity},
    topTracks: function() {
      const topTracks = phpTopTracks
      return topTracks.map((track) => {
        const t = {
          title: track.name,
          link: track.href,
          image: track.album.images[0].url,
          id: track.id,
          preview: track.preview_url
        }
        return t
      })
    },
  }
}
</script>

<style></style>