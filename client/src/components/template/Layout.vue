<template>
  <div
    :class="[
      'layout-wrapper',
      { 'sidebar-open': isSidebarOpen, 'sidebar-closed': !isSidebarOpen },
    ]"
  >
    <!-- Sidebar Component -->
    <Sidebar
      :isSidebarOpen="isSidebarOpen"
      @update:isSidebarOpen="isSidebarOpen = $event"
    />

    <!-- Main Content Area -->
    <div class="main-wrapper">
      <!-- Header Component -->
      <Header @toggle-sidebar="toggleSidebar" />

      <router-view />
    </div>
  </div>
</template>

<script src="../logic/Layout.js"></script>

<style scoped src="../style/Layout.css"></style>
