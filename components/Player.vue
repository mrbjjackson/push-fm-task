<template>
    <div class="player rounded relative border border-indigo-25 bg-white mt-6 px-4 lg:px-6 py-6 lg:py-6 shadow-table transition flex-no-wrap flex flex-col h-full">
      <h6 class="mb-4">Track Preview</h6>
      <div class="flex flex-col lg:flex-row">
        <div class="player-controls relative mr-4 w-36 mb-4 lg:mb-0">
          <img class="p-4 player-image track-img inline-block rounded-full w-36 h-36 lg:w-36 lg:h-36 bg-cover bg-no-repeat bg-center border" :src="track.image" />
          <div class="player-control control-pause" v-on:click="playPause" v-if="playing">
            <svg data-v-21a91f7c="" width="100%" height="100%" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112 139"><rect data-v-21a91f7c="" width="42" height="139" fill="#fff" stroke="none"></rect> <rect data-v-21a91f7c="" x="70" width="42" height="139" fill="#fff" stroke="none"></rect></svg>
          </div>
          <div class="player-control control-play" v-on:click="playPause" v-else>
            <svg width="100%" height="100%" viewBox="0 0 82 118" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path  fill="#fff" stroke="none" style="fill:#fff; stroke:none" d="M0 3.55308V114.447C0 116.205 0 117.084 0.471612 117.491C0.880821 117.845 1.49467 118.032 2.12282 117.996C2.84675 117.954 3.68996 117.332 5.37638 116.089L80.5884 60.6417C81.3679 60.0671 81.7576 59.7797 81.9037 59.4484C82.0321 59.157 82.0321 58.843 81.9037 58.5516C81.7576 58.2203 81.3679 57.9329 80.5884 57.3583L5.37638 1.91134C3.68996 0.668104 2.84675 0.0464846 2.12282 0.00448125C1.49467 -0.031964 0.88082 0.155484 0.471611 0.508698C0 0.915768 0 1.79488 0 3.55308Z"/>
            </svg>
          </div>
          <div class="control-time" v-on:click="playPause">
            <svg width="100%" height="100%" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle stroke="#f199ae" style="stroke:#f199ae; stroke-width:4px; stroke-dasharray:300; transform-origin:center center; transform:rotate(-90deg); transition:all 0.25s linear;" :style="time" cx="50" cy="50" r="47"/>
            </svg>
          </div>
        </div>
        <div class="player-info">
          <h4 class="player-title pb-2">{{track.title}}</h4>
          <h5 class="player-title">{{track.trackAlbum}}</h5>
          <p>Popularity: {{track.popularity}}</p>
          <p><a :href="track.spotifyLink">Listen on Spotify</a></p>
        </div>
      </div>
      
      <audio ref="audioplayer" preload="auto">
        <source :src="track.preview" type="audio/mpeg" />
        Your browser doesn't support audio right now.
      </audio>
    </div>
</template>
<script>
export default {
  props: ['track'],
  name: 'Player',
  data: function() {
    return {
      playing: false,
      player: undefined,
      strokeLength: 300,
      timeTicker: 123,
      timer: undefined
    }
  },
  computed: {
    time: function() {
      let progress = 0
      let totalTime = 30
      let currentTime = 0
      let timeTick = this.timeTicker

      if (this.player) {
      currentTime = this.player.currentTime
      progress = this.strokeLength - ((currentTime / totalTime) * this.strokeLength)
      }

      return `stroke-dashoffset:${progress}px;`

    }
  },
  methods: {
    playPause: function() {
      this.player = this.$refs.audioplayer
      this.playing = !this.playing
    }
  },
  watch: {
		playing(value) {
      const vm = this

			if (value) {
        this.timer = setInterval(function () {
          vm.timeTicker++
        }, 250)

        return this.player.play();
      }
      clearInterval(this.timer);
			this.player.pause();
    },
    track(value) {
      if (value) {
        this.player = this.$refs.audioplayer
        this.player.pause()
        this.player.load()
        if(this.playing)
        this.player.play()
      }
    }
	}
}
</script>
<style scoped>
  .player-info {
    display:flex;
    flex-direction: column;
    justify-content: center;
    text-align:center;
  }

  .player-info p {
    font-size:0.9em;
    line-height: 1.5em;
  }

  @media screen and (min-width: 992px) {

  .player-info {
    text-align:left;
  }
  }

  .player-title {
    line-height:1em;
    margin-bottom:0.2em;
    
  }
  .player-tite:before, .player-title:after {
    margin:0;
  }
  .player-image {
    border:none;
  }
  .player-control {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -20px;
    margin-left:-20px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 2;
    flex-shrink:0;
  }

  .player-controls {
    flex-shrink:0;
    align-self: center;
  }
  .control-time {
    position: absolute;
    top:0;
  }
</style>