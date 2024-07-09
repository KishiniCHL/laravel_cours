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
        <ul>
          <li v-for="track in tracks" :key="track.uuid">
            {{ track.title }} ({{ track.artist }})
          </li>
        </ul>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  name: 'Index',
  components: {
    MusicLayout,
  },
  props: {
    tracks: Array,
  },
}
</script>