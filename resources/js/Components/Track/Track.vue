<template>
    <div>
        <div class="w-full h-1/2">
            Image
        </div>
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ tracks.titre }}</div>
            <small class="text-grey-700 text-base">{{ tracks.artist }}</small>
        </div>
        <button>Lire</button>
        track {{ tracks.title }}
    </div>
</template>

<script>
    export default  {
        name: 'Track',
        props: {
            tracks: Object,
        },
    }
</script>