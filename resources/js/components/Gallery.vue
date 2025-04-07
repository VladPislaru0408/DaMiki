<template>
  <div>
    <div class="row">
      <div
        v-for="(photo, index) in photos"
        :key="photo.id"
        class="col-12 col-sm-6 col-md-4 mb-4"
      >
        <div class="card shadow-sm" @click="openModal(index)" style="cursor: pointer;">
          <img :src="photo.url" class="card-img-top" :alt="photo.title">
          <div v-if="photo.title" class="card-body">
            <p class="card-text text-center">{{ photo.title }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div v-if="isModalOpen" class="modal fade show d-block" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ currentPhoto.title }}</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="closeModal"></button>
          </div>
          <div class="modal-body">
            <img :src="currentPhoto.url" class="img-fluid" :alt="currentPhoto.title">
          </div>
        </div>
      </div>
      <div class="modal-backdrop fade show" @click="closeModal"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Gallery",
  props: {
    photos: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      isModalOpen: false,
      currentPhotoIndex: null,
    };
  },
  computed: {
    currentPhoto() {
      return this.photos[this.currentPhotoIndex] || {};
    },
  },
  mounted() {
    console.log(this.photos)
  },
  methods: {
    openModal(index) {
      this.currentPhotoIndex = index;
      this.isModalOpen = true;
    },
    closeModal() {
      this.isModalOpen = false;
    },
  },
};
</script>

<style scoped>
.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  z-index: 1040;
}
.modal {
  z-index: 1050;
}
</style>
