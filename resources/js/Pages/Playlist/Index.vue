<template>
  <MusicLayout>
    <template #title>
      Liste de mes playlists
    </template>
    <template #action>
      <Link :href="route('playlists.create')" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">Créer une playlist</Link>
    </template>
    <template #content>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Nombre de musiques</th>
            <th>Créé le</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(playlist, i) in playlists" :key="playlist.uuid">
            <td>{{ i + 1 }}</td>
            <td>{{ playlist.title }}</td>
            <td>{{ playlist.tracks_count }}</td>
            <td>{{ $moment(playlist.created_at).format('DD/MM/YYYY') }}</td>
            <td>
              <Link :href="route('playlists.show', playlist.uuid)" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">
                Voir la playlist
              </Link>
            </td> 
          </tr>
        </tbody>
      </table>
      <!-- <ul>
        <li v-for="playlist in playlists" :key="playlist.id">{{ playlist.title }}</li>
      </ul> -->
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
    playlists: Array,
  },
  mounted() {
    console.log(this.playlists); 
  },
}
</script>