<template>
    <div class="mx-3 mt-7">
        <div>
            <div class="w-full">
                <img :src="`/storage/${tracks.poster}`" />
            </div>
            <div>
                <div class="font-bold text-xl mb-3">{{ tracks.title }}</div>
                <p class="text-grey-700 text-base mb-3">{{ tracks.artist }}</p>
            </div>
            <!-- Lire button always visible -->
            <div>
                <button
                    class="bg-pink-700 hover:bg-white text-white hover:text-pink-700 border border-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-m px-7 py-2 text-center me-2 mb-2 dark:border-pink-400 dark:bg-pink-400 dark:text-white dark:hover:bg-white dark:hover:text-pink-500 dark:focus:ring-pink-900 mr-3"
                    @click="handleClick">Lire</button>
            </div>
            <div v-if="$page.props.isAdmin">
                <div class="flex"> <!-- Flex container for Modifier and Supprimer buttons -->
                    <Link :href="route('tracks.edit', { track: tracks })"
                        class="bg-purple-700 hover:bg-white text-white hover:text-purple-700 border border-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-m px-7 py-2 text-center me-2 mb-2 dark:border-purple-400 dark:bg-purple-400 dark:text-white dark:hover:bg-white dark:hover:text-purple-500 dark:focus:ring-purple-900 mr-3">
                    Modifier
                    </Link>
                    <Link :href="route('tracks.destroy', { track: tracks })"
                        class="bg-red-700 hover:bg-white text-white hover:text-red-700 border border-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-m px-7 py-2 text-center me-2 mb-2 dark:border-red-400 dark:bg-red-400 dark:text-white dark:hover:bg-white dark:hover:text-red-500 dark:focus:ring-red-900 mr-3"
                        as="button" method="delete">
                    Supprimer
                    </Link>
                </div>
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