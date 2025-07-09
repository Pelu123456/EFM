<template>
  <div :class="['layout-wrapper', { 'sidebar-open': isSidebarOpen, 'sidebar-closed': !isSidebarOpen }]">
    <!-- Sidebar Component -->
    <Sidebar :isSidebarOpen="isSidebarOpen" />
    
    <!-- Main Content Area -->
    <div class="main-wrapper">
      <!-- Header Component -->
      <Header @toggle-sidebar="toggleSidebar" />
      
      <!-- Main Content -->
      <main class="main-content">
        <div class="demo-content">
          <h1>Responsive Sidebar Layout Demo</h1>
          <p>
           đây là demo
          </p>
          
          <div class="feature-cards">
            <div class="feature-card">
              <i class="fas fa-expand-arrows-alt"></i>
              <h3>Responsive Design</h3>
              <p>Adapts to different screen sizes with smooth transitions</p>
            </div>
            <div class="feature-card">
              <i class="fas fa-palette"></i>
              <h3>Theme Toggle</h3>
              <p>Switch between light and dark themes seamlessly</p>
            </div>
            <div class="feature-card">
              <i class="fas fa-search"></i>
              <h3>Search Function</h3>
              <p>Built-in search functionality with live updates</p>
            </div>
            <div class="feature-card">
              <i class="fas fa-cube"></i>
              <h3>Modular Components</h3>
              <p>Separated into Header, Sidebar, and Layout components</p>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script src="../logic/Layout.js"></script>

<style scoped src="../style/Layout.css"></style>