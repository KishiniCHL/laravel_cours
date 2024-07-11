<template>
  <MusicLayout>
    <template #title>
      <!-- {{ $page.props.auth.user.admin }} -->
      {{ $page.props.isAdmin }}
      <div class="pt-7 text-center sm:text-left ml-20">
        Liste de mes tracks
      </div>
    </template>
    <template #action>
      <div class="pt-7 flex justify-center sm:justify-start mr-20">
        <Link v-if="$page.props.isAdmin" :href="route('tracks.create')"
          class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">
        Créer une musique</Link>
      </div>
    </template>
    <template #content>
      <TrackList :tracks="tracks" />
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import TrackList from '@/Components/Track/TrackList.vue';

export default {
  name: 'Index',
  components: {
    MusicLayout,
    TrackList,
  },
  props: {
    tracks: Array,
  },
}
</script>