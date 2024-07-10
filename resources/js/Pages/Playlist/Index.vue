<template>
  <MusicLayout>
    <template #title>
      Liste de mes playlists
    </template>
    <template #action>
      <Link :href="route('playlists.create')" class="bg-blue-500 text-white font-bold px-6 py-3">Créer une playlist</Link>
    </template>
    <template #content>
      <div>
        <input v-model="filter" type="search" class="shadow border rounded py-2 px-3 text-gray-700">
        <div class="grid grid-cols-3 gap-4">
        <Track 
        v-for="track in filteredTracks"
        :key="track.uuid" :tracks="track" @played="play"/>
        </div>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import Track from '@/Components/Track/Track.vue';
import { Link } from '@inertiajs/vue3';

export default {
  name: 'Index',
  components: {
    MusicLayout,
    Track,
  },
  props: {
    playlists: Array,
  },
}
</script>