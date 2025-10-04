<template>
  <Transition name="toast">
    <div 
      v-if="visible" 
      :class="['toast', typeClass]"
      @click="close"
    >
      <div class="toast-icon">
        <i :class="iconClass"></i>
      </div>
      <p class="toast-message">{{ message }}</p>
      <button class="toast-close" @click.stop="close">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </Transition>
</template>

<script src="../logic/Toast.js"></script>

<style scoped src="../style/Toast.css"></style>