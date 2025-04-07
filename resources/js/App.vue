<template>
  <Gallery :photos="photos" />
</template>

<script>
import Gallery from './components/Gallery.vue';

export default {
  name: 'App',
  data() {
    return {
      photos: [],
    };
  },
  mounted() {
    const appElement = document.getElementById('app');
    if (appElement && appElement.dataset.photos) {
      this.photos = JSON.parse(appElement.dataset.photos);
    }
  },
  components: { Gallery },
};
</script>
