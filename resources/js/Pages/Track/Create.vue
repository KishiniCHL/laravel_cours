<template>
    <MusicLayout>
      <template #title>
        Créer musique
      </template>
      <template #action>
        <Link :href="route('tracks.index')" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">Retour</Link>
      </template>
      <template #content>
        <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="title">Title :</label>
              <input type="text" id="title" v-model="form.title" :class="{ 'border-red-500' : form.errors.title }" placeholder="Titre">
            </div>

            <div class="mb-3">
              <label for="artist">Artiste :</label>
              <input type="text" id="artist" v-model="form.artist" placeholder="Ariste">
            </div>

            <div class="mb-3">
              <label for="display">Afficher la musique : </label>
              <select id="display" v-model="form.display" required>
                  <option :value="true">Publique</option>
                  <option :value="false">Privé</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="poster">Poster :</label>
              <input @input="form.poster = $event.target.files[0]" type="file" id="poster" name="poster">
            </div>
            
            <div class="mb-3">
            <label for="music">music :</label>
            <input @input="form.music = $event.target.files[0]" type="file" id="music" name="music">
            </div>

            <input type="submit" :class="`text-white font-bold px-6 py-3 cursor-pointer ${form.processing ? 'bg-gray-500' : 'bg-pink-700 hover:bg-white'} border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-7 py-2 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3`" value="Créer la musique">

            <p>{{ form }}</p>
        </form>
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
      form: this.$inertia.form( {
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
      });},
  },
  }
  </script>