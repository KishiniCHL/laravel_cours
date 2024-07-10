<template>
    <div>
        <div class="w-full h-1/2">
            <!-- <img :src="'storage/' + tracks.image" alt=""> -->
            <img :src="`storage/${tracks.poster}`" alt="">
        </div>
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ tracks.title }}</div>
            <small class="text-grey-700 text-base">{{ tracks.artist }}</small>
        </div>
        <button class="bg-blue-500 py-2 px-6" @click="handleClick">Lire</button>
        <div class="w-full">
            <Link :href="route('tracks.edit', { track: tracks })"
             class="bg-purple-500 text-white font-bold px-6 py-3">Edit</Link>
        </div>
        <div class="w-full">
            <Link :href="route('tracks.destroy', { track: tracks })"
             class="bg-pink-500 text-white font-bold px-6 py-3" as="button" methode="delete">Supprimer</Link>
        </div>
    </div>
</template>

<script>
    export default  {
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
            handleClick(){
                this.$emit('played', this.tracks);
            }
        },
    }
</script>