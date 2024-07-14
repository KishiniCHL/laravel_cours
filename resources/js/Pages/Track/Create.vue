<template>
  <MusicLayout>
    <template #title>
      Créer musique
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
            <label for="title">Title : </label>
            <input type="text" id="title" v-model="form.title" :class="{ 'border-red-500': form.errors.title }"
              placeholder="Titre">
          </div>

          <div class="mb-3">
            <label for="artist">Artiste : </label>
            <input type="text" id="artist" v-model="form.artist" placeholder="Artiste">
          </div>

          <div class="mb-3">
            <label for="display">Afficher la musique : </label>
            <select id="display" v-model="form.display" required>
              <option :value="true">Publique</option>
              <option :value="false">Privé</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="poster">Poster : </label>
            <input @input="form.poster = $event.target.files[0]" type="file" id="poster" name="poster"
              class="bg-[#eab3e6] border border-[#c77ac0] shadow-[inset_0_1px_0_0_rgba(255,255,255,.7)] box-border text-[#291b28] cursor-pointer inline-block font-sans text-sm font-normal leading-[1.15385] m-0 p-[8px] align-baseline no-underline select-none touch-manipulation whitespace-nowrap rounded-[3px] hover:bg-[#b3d3ea] hover:text-[#2c5777] focus:bg-[#b3d3ea] focus:text-[#2c5777] focus:outline-none focus:ring-4 focus:ring-[rgba(0,149,255,.15)] active:bg-[#a0c7e4] active:text-[#2c5777] active:shadow-none">
          </div>

          <div class="mb-3">
            <label for="music">Musique : </label>
            <input @input="form.music = $event.target.files[0]" type="file" id="music" name="music"
              class="bg-[#eab3e6] border border-[#c77ac0] shadow-[inset_0_1px_0_0_rgba(255,255,255,.7)] box-border text-[#291b28] cursor-pointer inline-block font-sans text-sm font-normal leading-[1.15385] m-0 p-[8px] align-baseline no-underline select-none touch-manipulation whitespace-nowrap rounded-[3px] hover:bg-[#b3d3ea] hover:text-[#2c5777] focus:bg-[#b3d3ea] focus:text-[#2c5777] focus:outline-none focus:ring-4 focus:ring-[rgba(0,149,255,.15)] active:bg-[#a0c7e4] active:text-[#2c5777] active:shadow-none">
          </div>

          <input type="submit"
            :class="`text-white font-bold px-6 py-3 cursor-pointer ${form.processing ? 'bg-gray-500' : 'bg-pink-700 hover:bg-white'} border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-7 py-4 mt-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3`"
            value="Créer la musique">

          <!-- <p>{{ form }}</p> -->
        </form>
      </div>

    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
  name: 'Create',
  components: {
    MusicLayout,
    Link,
  },
  props: {
    tracks: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        artist: '',
        display: true,
        poster: null,
        music: null,
      }),
    };
  },
  methods: {
    submitForm() {
      this.form.post(route('tracks.store'), {
        onSuccess: () => this.$inertia.visit(route('tracks.index')),
      });
    },
  },
}
</script>