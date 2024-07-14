<template>
  <MusicLayout>
    <template #title>
      Musiques de la playlist : {{ playlist.title }}
    </template>
    <template #action>
      <Link :href="route('playlists.index')"
            class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">
        Retour
      </Link>
    </template>
    <template #content>
      <div v-if="tracks && tracks.length">
        <TrackList :tracks="tracks" />
      </div>
      <div v-else class="text-center py-4">
        <p class="text-3xl ">Il n'y a pas de musiques dans cette playlist... （o´・ェ・｀o）</p>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import TrackList from '@/Components/Track/TrackList.vue';

export default {
  name: 'Show',
  components: {
    MusicLayout,
    TrackList,
  },
  props: {
    playlist: Object,
    tracks: Array,
  },
}
</script>