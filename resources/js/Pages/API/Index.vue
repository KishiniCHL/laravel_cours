<template>
  <MusicLayout>
    <template #title>
      Liste de mes clés API
    </template>
    <template #action>
      <Link :href="route('api-keys.create')" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">Créer une clé API</Link>
    </template>
    <template #content>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Clé</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(apiKey, i) in apiKeys" :key="apiKey.uuid">
            <td>{{ i + 1 }}</td>
            <td>{{ apiKey.name }}</td>
            <td>{{ apiKey.key }}</td>
            <td>
              <Link :href="route('api-keys.show', apiKey.uuid)" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">
                Voir la clé
              </Link>
            </td> 
          </tr>
        </tbody>
      </table>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  name: 'Index',
  components: {
    MusicLayout,
  },
  props: {
    userApiKeys: Array, 
  },
  data() {
    return {
      apiKeys: [], 
    };
  },
  mounted() {
    this.apiKeys = this.userApiKeys; 
    console.log(this.apiKeys); 
  },
}
</script>