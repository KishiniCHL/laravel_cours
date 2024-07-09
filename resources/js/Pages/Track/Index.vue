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
        :key="track.uuid" :tracks="track"/>
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
}
</script>