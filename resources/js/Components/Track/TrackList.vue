<template>
  <div class="py-2 mx-20">
    <div class="max-w-3xl	">
      <input v-model="filter" type="search"
        class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full mb-4">
    </div>
    <div class="flex flex-wrap -mx-2 justify-center sm:justify-start">
      <div v-for="track in filteredTracks" :key="track.uuid" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
        <Track :tracks="track" @played="play" />
      </div>
    </div>
  </div>
</template>

<script>
import Track from '@/Components/Track/Track.vue';

export default {
  name: 'TrackList',
  components: {
    Track,
  },
  props: {
    tracks: Array,
  },
  data() {
    return {
      audio: null,
      currentTrack: null,
      filter: '',
    }
  },
  computed: {
    filteredTracks() {
      return this.tracks.filter(track =>
        track.title.toLowerCase().includes(this.filter.toLowerCase()) ||
        track.artist.toLowerCase().includes(this.filter.toLowerCase())
      );
    }
  },
  methods: {
    play(track) {
      const url = '/storage/' + track.music;
      console.log(url);

      if (!this.currentTrack) {
        this.audio = new Audio(url);
        this.audio.play();
      } else if (this.currentTrack !== track.uuid) {
        this.audio.pause();
        this.audio.src = url;
        this.audio.play();
      } else {
        this.audio.paused ? this.audio.play() : this.audio.pause();
      }

      this.currentTrack = track.uuid;
      this.audio.addEventListener('ended', () => this.currentTrack = null);
    }
  }
}
</script>