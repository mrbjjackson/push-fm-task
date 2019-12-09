<template>

  <div class="relative w-full lg:container mx-auto">
    <div class="error inline-block w-full border rounded p-4 lg:p-6 text-base leading-none select-none transition border-error bg-error-5 text-black" v-if="error">
      Sorry we couldn't find that artist on Spotify.
      <a href="/index.php?id=0gxyHStUsqpMadRV0Di1Qt">Maybe try this one.</a>
    </div>
    <div class="spotify-browser" v-else>
      <div class="relative py-2 transition lg:overflow-x-hidden flex flex-no-wrap  ">
        <div class="flex-grow">
          <h6 class="mb-2">Spotify catalogue explorer</h6>
          <h1 class="mb-8">{{artist.name}}</h1>
          <div class="artist-stats flex flex-wrap">
            <div class="followers mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Followers:</span><h3 class="block w-full text-black leading-none nofix mb-2 lg:mb-4">{{followers}}</h3></div>
            <div class="popularity mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Popularity:</span><h3 class="block w-full text-black leading-none nofix mb-2 lg:mb-4"> {{popularity}}</h3></div>
            <div class="popularity mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Listen:</span><h3 class="block w-full text-black leading-none nofix mb-2 lg:mb-4"><a :href="link">Spotify</a></h3></div>
            <div class="followers mr-8"><span class="block w-full text-indigo text-xs font-semibold mb-2 lg:mb-2">Genres:</span><ul class="genres flex flex-wrap" > <li v-for="(genre, index) in genres" class="mr-2 mb-2" :key="index"><h5 class="block w-full pt-2">{{genre}}</h5></li></ul></div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap w-full mb-6 lg:mb-8">
          <div class=" xxl:w-auto xxl:flex-1 mb-6 lg:mb-8 xxl:mb-0 lg:mr-8 ">
            <div class="rounded relative border-indigo-25 transition lg:overflow-x-hidden flex-no-wrap flex flex-col h-full ">
              <ArtistImage :name="name" :image="image" :id="id"></ArtistImage>
              <Player v-bind:track="playingTrack"/>              
            </div>
          </div>
          <div class="w-full xxl:w-auto xxl:flex-1 mb-6 lg:mb-8 xxl:mb-0 ">
            <div class="rounded relative border border-indigo-25 bg-white px-4 lg:px-6 py-6 lg:py-8 shadow-table transition flex-no-wrap flex flex-col h-full">
              <div class="absolute w-2/5 right-0 text-left hidden lg:block" style="top: -74px; transform:scaleX(-1)"><svg version="1.1" viewBox="0 0 96 144" class="svg-icon svg-original" data-name="toucan" style="width: 136px; height: 136px;"><defs><filter x="-.7%" y="-4.1%" width="102%" height="110.9%" filterUnits="objectBoundingBox" id="svgicon_toucan_a"><feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset><feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur><feComposite in="shadowBlurOuter1" in2="SourceAlpha" operator="out" result="shadowBlurOuter1"></feComposite><feColorMatrix values="0 0 0 0 0.160784314 0 0 0 0 0.207843137 0 0 0 0 0.51372549 0 0 0 0.05 0" in="shadowBlurOuter1" result="shadowMatrixOuter1"></feColorMatrix><feMerge><feMergeNode in="shadowMatrixOuter1"></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><path pid="0" id="svgicon_toucan_b" d="M.555.394h38.414V29.72H.555z"></path></defs><g filter="url(#svgicon_toucan_a)" transform="translate(4 -8)" fill="none" fill-rule="evenodd"><path pid="1" d="M84.676 52.822s7.679-11.473-4.879-29.438C75.28 16.98 66.97 13.423 62.09 12l-.09.445a61.485 61.485 0 0 1 9.847 14.941c1.355 2.846 2.44 5.781 2.71 8.894.09.711.09 1.334.09 2.045v.09c.904.533 1.808 1.067 2.62 1.69 4.247 3.112 6.776 8.626 7.59 12.895l-.181-.178z" fill="#323086"></path><path pid="2" d="M65.004 13.454c3.844 1.432 10.482 4.654 14.326 10.293 8.56 12.71 7.162 22.108 5.765 26.225-1.223-3.759-3.407-7.966-6.988-10.651-.7-.537-1.398-.985-2.184-1.522 0-.537 0-1.163-.087-1.79-.262-2.774-1.049-5.639-2.708-9.219-2.097-4.654-4.805-9.219-8.124-13.336M85.007 54c.175 0 .262 0 .437-.09.35-.179.524-.537.437-.984 1.31-2.506 6.027-13.695-5.066-30.074-5.154-7.519-14.763-10.92-17.558-11.815-.262-.09-.524 0-.699.09-.174.09-.349.358-.436.626l-.088.448c-.087.268 0 .537.175.805 3.843 4.476 6.988 9.398 9.346 14.858 1.573 3.401 2.359 5.997 2.534 8.682.087.716.087 1.253.087 1.97v.089c0 .358.175.626.437.806.873.537 1.747 1.074 2.445 1.61 3.844 2.954 6.028 8.056 6.901 11.815-.087.358-.087.716.175.985l.175.179c.262-.09.436 0 .698 0" fill="#323086"></path><path pid="3" d="M75 39c-3.584-1.974-7.525-3.23-11.467-4.308-6.361-1.705-16.574-1.525-16.574-1.525.358-3.231.269-6.552-1.254-9.423-1.523-2.872-4.57-5.026-7.705-4.667l2.24-6.641c7.256-1.885 15.14-1.974 22.397.09 0 0 5.733 6.012 8.242 11.487 1.344 2.872 3.763 9.872 4.121 12.923V39z" fill="#E3AD00"></path><g transform="matrix(-1 0 0 1 76 10)"><mask id="svgicon_toucan_c" fill="#fff"><use xlink:href="#svgicon_toucan_b"></use></mask><path pid="4" d="M2.328 26.897v.53c3.368-1.677 7.09-2.735 10.193-3.618 5.23-1.412 12.94-1.5 15.688-1.5-.265-3.617.178-6.441 1.419-8.823 1.595-2.912 4.343-4.853 7.18-5.03l-1.685-4.853c-7.002-1.764-14.448-1.676-21.007.177-.975.97-5.672 6.176-7.8 10.853-1.33 2.559-3.634 9.353-3.988 12.264m-.887 2.824c-.177 0-.354 0-.443-.088-.266-.177-.443-.441-.443-.794V26.72c.354-3.088 2.748-10.059 4.166-12.97C7.203 8.28 12.787 2.455 13.053 2.19c.088-.088.266-.176.443-.264 7.09-2.03 15.068-2.03 22.602-.088.266.088.532.264.62.529l2.216 6.53c.09.264 0 .617-.177.793-.177.265-.532.353-.798.353-2.481-.264-5.318 1.412-6.736 4.147-1.152 2.206-1.595 5.03-1.152 8.736 0 .265-.089.53-.266.706-.177.176-.443.264-.71.264-.088 0-10.015-.176-16.131 1.5-3.457.971-7.534 2.206-11.168 4.147-.089.177-.177.177-.355.177" fill="#323086" mask="url(#svgicon_toucan_c)"></path></g><path pid="5" d="M62.543 33.992C67.455 35.252 75 38.942 75 39.122c-.175 2.16-.79 4.681-1.93 6.481 0 0-5.615.54-9.3.36-3.86-.18-7.72-.72-11.492-1.62-1.842-.45-3.772-1.08-5-2.61-1.843-2.34-1.228-5.67-.965-8.64-.088.09 9.913-.63 16.23.9" fill="#D3614F"></path><path pid="6" d="M71.648 43.818c-1.411.09-5.822.454-8.821.364a59.265 59.265 0 0 1-11.38-1.637c-1.764-.455-3.528-1-4.587-2.364-1.411-1.819-1.146-4.456-.882-7.001v-.273h.088c2.47-.091 10.145-.364 15.173.91 4.058 1.09 10.144 3.909 11.82 4.818-.088 2-.617 3.819-1.411 5.183M64.503 46c3.528 0 7.498-.364 7.762-.364.265 0 .53-.182.618-.454 1.147-1.728 1.852-4.274 2.117-7.002 0-.636 0-.909-4.94-3.091-1.852-.818-5.38-2.273-8.292-3.091-5.292-1.273-13.143-1-15.702-.91h-.97c-.44.091-.706.364-.794.819 0 .363-.088.727-.088 1.09-.265 2.82-.617 5.91 1.235 8.366 1.411 1.727 3.44 2.455 5.47 2.91a62.94 62.94 0 0 0 11.731 1.636c.706.091 1.235.091 1.853.091" fill="#323086"></path><path pid="7" d="M14.585 48.467L10.244 82.1C6.257 98.65 3.068 115.466.498 132.372c-.62 4.36-1.151 9.254 1.595 12.635.354.445.797.89 1.418.979 1.24.178 1.949-1.335 2.303-2.58 1.329-5.072 2.303-10.233 3.012-15.483.354-2.58.62-5.16 1.595-7.474.886-2.135 2.303-4.004 3.455-5.961 2.746-4.716 4.34-10.144 4.43-15.571 1.771.623 5.758-1.424 6.378-3.115 1.152-3.203 1.152-3.203 1.595-6.584.088-.8.177-1.601.62-2.224.62-.89 1.772-1.602 2.835-1.513 13.112.712 33.222-5.783 17.541-38.26 0 0-3.19-4.004-2.569-6.673.62-2.67 3.632-11.745 1.24-16.372-3.632-7.03-11.428-6.14-11.428-6.14L18.66 20.172l-4.075 28.295z" fill="#181A4E"></path><path pid="8" d="M13 48l6.307-27.843 15.901-2.12s7.817-.885 11.46 6.098c2.398 4.596-.622 13.7-1.244 16.264C44.802 42.962 48 47.028 48 47.028L13 48z" fill="#FFF"></path><path pid="9" d="M46.397 46.321l-32.483.893 5.996-26.43L35.3 18.73c.27 0 7.339-.715 10.65 5.714 1.968 3.75-.09 11.251-.985 14.466-.179.536-.268.982-.358 1.34-.447 1.964.806 4.464 1.79 6.071M12.84 49l35.257-.982c.358 0 .626-.179.805-.536.18-.268.09-.625-.089-.893-1.163-1.429-2.774-4.375-2.416-5.893.09-.357.179-.715.358-1.25.984-3.75 3.132-11.43.805-15.805-3.937-7.5-12.349-6.608-12.438-6.608l-16.018 2.143c-.358.09-.716.357-.716.714l-6.353 28.128c-.09.268 0 .536.18.803.089.09.357.179.625.179" fill="#323086"></path><path pid="10" d="M25.863 13.075c-1.53.447-3.059.983-4.319 2.056-1.979 1.699-2.609 4.381-3.419 6.796C9.218 48.215 6.07 64.399 4 88.809c4.229 1.252 16.645-3.934 19.614-7.153 2.969-3.22 5.488-6.528 6.118-10.909 6.838.715 16.555-3.934 19.164-10.283 2.609-6.348.45-14.306-4.949-18.508-3.239-2.504-10.886-4.292-14.125-6.707-3.24-2.414-5.668-6.884-3.779-10.461 1.8-3.308 6.208-3.934 9.537-5.723 3.059-1.698 5.128-3.487 5.938-6.795-.09 0-9.717-.984-15.655.805" fill="#323086"></path><path pid="11" d="M29.138 69.168c-.442 0-.795.355-.883.797-.53 3.896-2.738 6.994-5.74 10.359-2.737 3.01-13.422 7.348-17.66 6.994 2.119-24.613 5.474-40.637 13.775-65.25.088-.354.176-.708.353-.973.618-1.948 1.324-4.073 2.737-5.312 1.148-.974 2.65-1.506 3.886-1.86 4.415-1.328 10.95-1.062 13.952-.885-.883 2.39-2.65 3.807-5.122 5.135-.883.531-2.031.885-3.002 1.328-2.561 1.062-5.299 2.125-6.711 4.692-2.12 3.984.53 8.854 3.973 11.51 1.678 1.24 4.239 2.302 6.976 3.364 2.65 1.062 5.387 2.125 6.888 3.276 5.033 3.984 6.976 11.42 4.592 17.264-2.473 6.109-11.833 10.27-17.926 9.65 0-.089-.088-.089-.088-.089M5.384 89c5.387 0 15.718-4.604 18.456-7.525 2.649-2.922 5.21-6.198 6.093-10.447 6.799.265 16.16-4.161 18.896-10.801 2.738-6.64.53-14.963-5.121-19.39-1.766-1.327-4.592-2.478-7.33-3.54-2.472-.975-5.12-2.037-6.534-3.1-2.914-2.213-5.033-6.108-3.444-9.207 1.06-2.036 3.356-2.922 5.74-3.895 1.06-.443 2.208-.886 3.179-1.417 3.09-1.77 5.387-3.63 6.27-7.26.088-.265 0-.531-.177-.797-.177-.177-.442-.354-.706-.354-2.385-.177-10.332-.796-15.63.797-1.501.443-3.18.974-4.592 2.213-1.854 1.594-2.56 3.896-3.267 6.11-.088.353-.177.619-.353.973C8.474 46.415 5.119 62.528 3 87.76c0 .443.265.797.618.886.53.265 1.06.354 1.766.354" fill="#323086"></path><path pid="12" d="M35.473 23.897c1.767 0 4.152.546 4.859 1.73 1.148 1.728 1.237 4.094.265 5.823-1.06 2.002-3.445 3.094-5.654 2.64-2.12-.456-3.975-2.458-4.152-4.733-.177-2.184 1.237-4.55 3.357-5.369.177-.09.707-.09 1.325-.09zM35.915 36c2.562 0 5.035-1.456 6.184-3.73 1.325-2.367 1.148-5.46-.265-7.736-1.59-2.457-6.36-2.912-8.304-2.275-2.827 1.092-4.77 4.277-4.506 7.28.265 3.094 2.65 5.733 5.566 6.37.353.091.795.091 1.325.091z" fill="#323086"></path><path pid="13" d="M35.522 31c1.367-1.404 2.05-2.895.88-5 0 0-2.442 2.456-.88 5" fill="#323086"></path><path pid="14" d="M35.53 32c.294 0 .588-.092.784-.276 1.177-1.29 2.55-3.316.98-6.263-.097-.277-.392-.461-.784-.461-.294 0-.686.092-.883.276-.098.092-2.844 3.132-.98 6.263.196.277.392.461.784.461h.098z" fill="#323086"></path></g></svg></div>
              <TopTracks :tracks="tracks" :name="name" v-on:changeTrack="changeTrack($event)"></TopTracks>
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
import Player from './Player.vue'

export default {
  name: 'Main',
  components: {
    ArtistImage,
    RelatedArtists,
    TopTracks,
    Player
  },
  data: function() {
    return {
      playingTrack: undefined
    }
  },
  props: ['artist', 'relatedArtists', 'error', 'topTracks'],
  computed: {
    name: function() { return this.artist.name },
    image: function() { return this.artist.images[0].url },
    id: function() { return this.artist.id },
    genres: function() { return this.artist.genres },
    link: function() { return this.artist.external_urls.spotify },
    followers: function() {return this.artist.followers.total},
    popularity: function() {return this.artist.popularity},
    tracks: function() {

      return this.topTracks.map((track) => {
        const millisecondsToTime = function (milli){ 
          var seconds = Math.floor((milli / 1000) % 60);
          var minutes = Math.floor((milli / (60 * 1000)) % 60);
          seconds = ("0" + seconds).slice(-2);

          return minutes + ":" + seconds;
        }

        const t = {
          title: track.name,
          link: track.href,
          image: track.album.images[1].url,
          id: track.id,
          preview: track.preview_url,
          trackAlbum: track.album.name,
          spotifyLink: track.external_urls.spotify,
          popularity: track.popularity,
          duration: millisecondsToTime(track.duration_ms)
        }
        return t
      })
    },
  },
  beforeMount: function() {
    this.playingTrack = this.tracks[0]
  },
  methods: {
    changeTrack: function(t){
      this.playingTrack = t
    }
  }
}
</script>

<style scoped>
.flex-grow {
  flex-grow:1;
}

.genres {
  text-transform: capitalize;
}

h5 {
  display:inline-block;
}

.genres h5::after {
display: inline-block;
content: '/';
padding:0 5px;
}

.genres li:last-child h5::after {
  content:'';
}

</style>