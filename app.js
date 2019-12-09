import Vue from 'vue'
import Main from './components/Main.vue'

new Vue({
  render: (createEl) => {
    return createEl( Main, { props: {
      artist: phpArtist,
      relatedArtists: phpRelatedArtists,
      topTracks: phpTopTracks,
      error: phpError
    } })
  }
}).$mount('#app')
