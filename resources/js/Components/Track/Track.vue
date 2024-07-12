<template>
    <div class="mx-3 mt-7">
        <div class="flex flex-wrap justify-center">
            <div class="w-full">
                <img :src="`/storage/${tracks.poster}`" />
            </div>
            <div>
                <div class="font-bold text-xl mb-3">{{ tracks.title }}</div>
                <p class="text-grey-700 text-base mb-3">{{ tracks.artist }}</p>
            </div>
            <button
                class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-7 py-2 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3"
                @click="handleClick">Lire</button>
            <div v-if="$page.props.isAdmin" class="w-ull flex justify-content-between">
                <Link :href="route('tracks.edit', { track: tracks })"
                    class="bg-lime-600 hover:bg-lime-700 text-white font-bold rounded py-2 px-4">
                Modifier
                </Link>
                <Link :href="route('tracks.destroy', { track: tracks })"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold rounded py-2 px-4" as="button"
                    method="delete">
                Supprimer
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Track',
    emits: ['play'],
    props: {
        active: {
            type: Boolean,
            default: false,
        },
        tracks: Object,
    },
    methods: {
        handleClick() {
            this.$emit('played', this.tracks);
        }
    },
}
</script>