<template>
    <MusicLayout>
      <template #title>
        Modifier une musique
      </template>
      <template #action>
        <Link :href="route('tracks.index')" class="bg-blue-500 text-white font-bold px-6 py-3">Retour</Link>
      </template>
      <template #content>

        <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="title">Title :</label>
              <input type="text" id="title" v-model="form.title" :class="{ 'border-red-500' : form.errors.title }" placeholder="Titre">
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
<!-- 
            <div class="mb-3">
              <label for="poster">Poster :</label>
              <input @input="form.poster = $event.target.files[0]" type="file" id="poster" name="poster">
            </div>
            
            <div class="mb-3">
            <label for="music">music :</label>
            <input @input="form.music = $event.target.files[0]" type="file" id="music" name="music">
            </div> -->

            <input type="submit" value="Modifier la musique" class=" text-white font-bold rounded py-2 px-4"
          :class="[form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700']" :disabled="form.processing">

            <p>{{ form }}</p>
        </form>
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
      tracks: Object,
    },
    data() {
      return {
        form: this.$inertia.form( {
          title: this.tracks.title,
          artist: this.tracks.artist,
          display: this.tracks.display ? true : false, 
        }),
      };
  },
  methods: {
    submitForm() {
      this.form.put(route('tracks.update', { track: this.track}), {

      });},
  },
  }
  </script>