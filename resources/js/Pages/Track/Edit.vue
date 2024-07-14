<template>
  <MusicLayout>
    <template #title>
      Modifier une musique
    </template>
    <template #action>
      <Link :href="route('tracks.index')"
        class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">
      Retour</Link>
    </template>
    <template #content>
      <div
        class="w-full max-w-7xl bg-[#f8f4e5] p-[50px_100px] border-2 border-black shadow-[15px_15px_1px_#ffa580,15px_15px_1px_2px_rgba(0,0,0,1)]">

        <form @submit.prevent="submitForm" class="flex flex-col items-center">
          <div class="mb-3">
            <label for="title">Title :</label>
            <input type="text" id="title" v-model="form.title" :class="{ 'border-red-500': form.errors.title }"
              placeholder="Titre">
          </div>

          <div class="mb-3">
            <label for="artist">Artiste :</label>
            <input type="text" id="artist" v-model="form.artist" placeholder="Artiste">
          </div>

          <div class="mb-3">
            <label for="display">Afficher la musique : </label>
            <select id="display" v-model="form.display">
              <option :value="true">Publique</option>
              <option :value="false">Privé</option>
            </select>
          </div>

          <input type="submit" value="Modifier la musique"
            :class="`text-white font-bold px-6 py-3 cursor-pointer ${form.processing ? 'bg-gray-500' : 'bg-pink-700 hover:bg-white'} border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-7 py-2 mt-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3`">

          <!-- <p>{{ form }}</p> -->
        </form>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  name: 'Edit',
  components: {
    MusicLayout,
  },
  props: {
    track: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        title: this.track.title,
        artist: this.track.artist,
        display: this.track.display ? true : false,
      }),
    };
  },
  methods: {
    submitForm() {
      this.form.put(route('tracks.update', { track: this.track }), {

      });
    },
  },
}
</script>