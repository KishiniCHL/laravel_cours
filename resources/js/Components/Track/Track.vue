<template>
    <div>
        <div class="w-full h-1/2">
            <!-- <img :src="'storage/' + tracks.image" alt=""> -->
            <img :src="`storage/${tracks.poster}`" alt="">
        </div>
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ tracks.titre }}</div>
            <small class="text-grey-700 text-base">{{ tracks.artist }}</small>
        </div>
        <button class="bg-blue-500 py-2 px-6" @click="handleClick">Lire</button>
        {{ tracks.title }}
    </div>
</template>

<script>
    export default  {
        name: 'Track',
        emits: ['play'],
        props: {
            tracks: Object,
        },
        methods: {
            handleClick(){
                this.$emit('played', this.tracks);
            }
        },
    }
</script>