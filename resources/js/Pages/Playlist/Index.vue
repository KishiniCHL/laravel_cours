<template>
  <MusicLayout>
    <template #title>
      Liste de mes playlists
    </template>
    <template #action>
      <Link :href="route('playlists.create')" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">Créer une playlist</Link>
    </template>
    <template #content>
      <div class="w-full max-w-7xl bg-[#f8f4e5] p-[50px_100px] border-2 border-black shadow-[15px_15px_1px_#ffa580,15px_15px_1px_2px_rgba(0,0,0,1)] mx-auto">
        <div class="overflow-x-auto relative">
          <table class="w-full text-m text-left">
            <thead class="text-s text-gray-700 uppercase">
              <tr class="border-b  dark:border-gray-700">
                <th scope="col" class="py-3 px-6">#</th>
                <th scope="col" class="py-3 px-6">Titre</th>
                <th scope="col" class="py-3 px-6">Nombre de musiques</th>
                <th scope="col" class="py-3 px-6">Créé le</th>
                <th scope="col" class="py-3 px-6">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(playlist, i) in playlists" :key="playlist.uuid" class="border-b dark:border-gray-700 hover:bg-[#ffa580]">
                <td class="py-4 px-6">{{ i + 1 }}</td>
                <td class="py-4 px-6">{{ playlist.title }}</td>
                <td class="py-4 px-6">{{ playlist.tracks_count }}</td>
                <td class="py-4 px-6">{{ $moment(playlist.created_at).format('DD/MM/YYYY') }}</td>
                <td class="py-4 px-6">
                  <Link :href="route('playlists.show', playlist.uuid)" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">
                    Voir la playlist
                  </Link>
                </td> 
              </tr>
            </tbody>
          </table>
        </div>
      </div>
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