<template>
  <MusicLayout>
    <template #title>
      Créer une clé API
    </template>
    <template #action>
      <Link :href="route('api-keys.index')" class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-5 py-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3">Retour</Link>
    </template>
    <template #content>
      <div class="w-full max-w-7xl bg-[#f8f4e5] p-[50px_100px] border-2 border-black shadow-[15px_15px_1px_#ffa580,15px_15px_1px_2px_rgba(0,0,0,1)]">
        <form @submit.prevent="submitForm" class="flex flex-col items-center">
        <div class="mb-3">
          <label for="name">Nom de la clé : </label>
          <input type="text" id="name" v-model="form.name" :class="{ 'border-red-500' : form.errors.name }" placeholder="Nom de la clé">
        </div>
        <input type="submit" :class="`text-white font-bold px-6 py-3 cursor-pointer ${form.processing ? 'bg-gray-500' : 'bg-pink-700 hover:bg-white'} border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-7 py-4 mt-4 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3`"  value="Créer la clé">
      </form>
      </div>
      
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
  data() {
    return {
      form: this.$inertia.form({
        name: '', 
      }),
    };
  },
  methods: {
    submitForm() {
      this.form.post(route('api-keys.store'), { 
        onSuccess: () => this.$inertia.visit(route('api-keys.index')), 
      });
    },
  },
}
</script>