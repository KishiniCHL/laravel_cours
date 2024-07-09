<template>
  <MusicLayout>
    <template #title>
      Liste de mes tracks
    </template>
    <template #action>
      Ajouter une musique
    </template>
    <template #content>
      <div>
        <!-- <ul>
          <li v-for="track in tracks" :key="track.uuid">
            {{ track.title }} ({{ track.artist }})
          </li>
        </ul> -->
        <Track 
        v-for="track in tracks"
        :key="track.uuid" :tracks="track" @played="play"/>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import Track from '@/Components/Track/Track.vue';

export default {
  name: 'Index',
  components: {
    MusicLayout,
    Track,
  },
  props: {
    tracks: Array,
  },
  data(){
    return {
      audio: null,
      currentTrack: null,
    }
  },
  methods :{
    play(track){
      const url = `storage/` + track.music;
      console.log(url);

      if(! this.currentTrack){
        this.audio = new Audio(url);
        this.audio.play();
      } else if (this.currentTrack !== track.uuid){
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