<template>
    <MusicLayout>
      <template #title>
        Créer musique
      </template>
      <template #action>
        <Link :href="route('tracks.index')" class="bg-blue-500 text-white font-bold px-6 py-3">Retour</Link>
      </template>
      <template #content>
        formulaire de creation

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

            <input type="submit" class=" text-white font-bold px-6 py-3 cursor-pointer" :class="(form.processing ? 'bg-gray-500' : 'bg-blue-500')" value="Créer la musique">

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