<template>
    <MusicLayout>
        <template #content>   
            <div>
                liste de mes tracks 

                {{ tracks }}

                <ul>
                    <li v-for="track in tracks"
                    :key="track.uuid">
                    {{ track.title }} - {{ track.artist }} - {{ track.album }} - {{ track.genre }} - {{ track.year }} - {{ track.duration }} - {{ track.size }} - {{ track.bitrate }} - {{ track.path }} - {{ track.created_at }} - {{ track.updated_at }}
                    </li>
                </ul>
            </div>
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
        tracks: Array,
    },
    
}

</script>