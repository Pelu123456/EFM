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

<script setup>
import { ref, onMounted } from 'vue'
import Header from './Header.vue'
import Sidebar from './Sidebar.vue'

// Reactive data
const isSidebarOpen = ref(true)

// Load FontAwesome and setup body styles
onMounted(() => {
  const link = document.createElement('link')
  link.rel = 'stylesheet'
  link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
  document.head.appendChild(link)
  
  // Setup body styles
  document.body.style.margin = '0'
  document.body.style.padding = '0'
  document.body.style.fontFamily = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif'
  document.body.style.background = '#f8fafc'
  document.body.style.color = '#1e293b'
})

// Methods
const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value
}
</script>

<style scoped>
.layout-wrapper {
  display: flex;
  min-height: 100vh;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.main-wrapper {
  flex: 1;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  margin-left: 260px;
}

.sidebar-closed .main-wrapper {
  margin-left: 70px;
}

.main-content {
  padding: 24px;
  min-height: calc(100vh - 64px);
}

.demo-content {
  max-width: 1200px;
  margin: 0 auto;
}

.demo-content h1 {
  color: #1e293b;
  font-size: 28px;
  margin-bottom: 16px;
}

.demo-content p {
  color: #64748b;
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 16px;
}

.demo-info {
  background: rgba(59, 130, 246, 0.1);
  padding: 20px;
  border-radius: 12px;
  margin: 24px 0;
}

.demo-info p {
  margin-bottom: 8px;
  font-size: 14px;
}

.feature-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 32px;
}

.feature-card {
  background: white;
  padding: 24px;
  border-radius: 12px;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  transition: transform 0.2s ease;
}

.feature-card:hover {
  transform: translateY(-2px);
}

.feature-card i {
  font-size: 32px;
  color: #22d3ee;
  margin-bottom: 16px;
}

.feature-card h3 {
  color: #1e293b;
  margin-bottom: 12px;
  font-size: 18px;
}

.feature-card p {
  color: #64748b;
  font-size: 14px;
  margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
  .main-wrapper {
    margin-left: 0;
  }
  
  .sidebar-closed .main-wrapper {
    margin-left: 0;
  }
}
</style>