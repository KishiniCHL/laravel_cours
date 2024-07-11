<template>
    <MusicLayout>
      <template #title>
        Créer playlist
      </template>
      <template #action>
        <Link :href="route('playlists.index')" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">Retour</Link>
      </template>
      <template #content>
        <form @submit.prevent="submitForm">

          <div class="mb-3">
              <label for="title">Title :</label>
              <input type="text" id="title" v-model="form.title" :class="{ 'border-red-500' : form.errors.title }" placeholder="Titre">
            </div>

            <input type="submit" :class="`text-white font-bold px-6 py-3 cursor-pointer ${form.processing ? 'bg-gray-500' : 'bg-pink-700 hover:bg-white'} border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-7 py-2 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3`" value="Créer la playlist">

            <div v-for="track in tracks" :key="track.uuid">
              <input :id="track.uuid" :value="track.uuid" v-model="form.tracks" type="checkbox" name="tracks">
              <label :for="track.uuid">{{ track.title }}</label>
            </div>

            <p>{{ form.tracks }}</p>
        </form>
      </template>
    </MusicLayout>
  </template>
  
  <script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
  
  export default {
    name: 'Create',
    components: {
      MusicLayout,
    },
    props: {
      playlists: Array,
      tracks: Array,
    },
    data() {
    return {
      form: this.$inertia.form( {
        title: '',
        tracks: [],
      }),
    };
  },
  methods: {
    submitForm() {
      this.form.post(route('playlists.store'), {
        onSuccess: () => this.$inertia.visit(route('playlists.index')),
      });},
  },
  }
  </script>