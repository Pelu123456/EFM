<template>
  <div :class="['sidebar', { 'open': isSidebarOpen, 'closed': !isSidebarOpen }]">
    <!-- Logo Section -->
    <div class="sidebar-header">
      <div class="logo">
        <div class="logo-icon">
          <i class="fas fa-person-running"></i>
        </div>
        <span v-if="isSidebarOpen" class="logo-text">Tournament</span>
      </div>
    </div>

    <ul class="nav-list" style="margin-top: 12px">
      <li class="nav-item" :class="{ active: currentRoute === 'dashboard' }">
        <a href="#" class="nav-link" @click.prevent="setActive('dashboard')">
          <i class="fas fa-home"></i>
          <span v-if="isSidebarOpen">Dashboard</span>
        </a>
      </li>
    </ul>

    <!-- Giải đấu -->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">GIẢI ĐẤU</h3>
      <ul class="nav-list">
        <li class="nav-item" :class="{ active: currentRoute === 'tournaments'}">
          <a href="#" class="nav-link" @click.prevent="setActive('tournaments')">
            <i class="fas fa-file-alt"></i>
            <span v-if="isSidebarOpen">Tất cả giải đấu</span>
          </a>
        </li>
        <li class="nav-item" :class="{ active: currentRoute === 'leagues' }">
          <a href="#" class="nav-link" @click.prevent="setActive('leagues')">
            <i class="fas fa-trophy"></i>
            <span v-if="isSidebarOpen"> Tạo giải đấu</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Đội bóng -->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">ĐỘI BÓNG</h3>
      <ul class="nav-list">
        <li class="nav-item" :class="{ active: currentRoute === 'teams' }">
          <a href="#" class="nav-link" @click.prevent="setActive('teams')">
            <i class="fas fa-users"></i>
            <span v-if="isSidebarOpen">Đội bóng</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Lịch thi đấu -->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">LỊch ĐấU</h3>
      <ul class="nav-list">
        <li class="nav-item" :class="{ active: currentRoute === 'schedule' }">
          <a href="#" class="nav-link" @click.prevent="setActive('schedule')">
            <i class="fas fa-calendar-alt"></i>
            <span v-if="isSidebarOpen">Lịch thi đấu</span>
          </a>
        </li>
        <li class="nav-item" :class="{ active: currentRoute === 'results' }">
          <a href="#" class="nav-link" @click.prevent="setActive('results')">
            <i class="fas fa-futbol"></i>
            <span v-if="isSidebarOpen">Kết quả</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Bảng xếp hạng -->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">BẢNG XẾP HẠNG</h3>
      <ul class="nav-list">
        <li class="nav-item" :class="{ active: currentRoute === 'standings' }">
          <a href="#" class="nav-link" @click.prevent="setActive('standings')">
            <i class="fas fa-list-ol"></i>
            <span v-if="isSidebarOpen">Xếp hạng</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Thống kê -->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">THỐNG KÊ</h3>
      <ul class="nav-list">
        <li class="nav-item" :class="{ active: currentRoute === 'statistics' }">
          <a href="#" class="nav-link" @click.prevent="setActive('statistics')">
            <i class="fas fa-chart-bar"></i>
            <span v-if="isSidebarOpen">Thống kê</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
  isSidebarOpen: {
    type: Boolean,
    default: true,
  },
})

const currentRoute = ref('')
function setActive(route) {
  currentRoute.value = route
}

onMounted(() => {
  const link = document.createElement('link')
  link.rel = 'stylesheet'
  link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
  document.head.appendChild(link)
})
</script>


<style scoped>
.sidebar {
  background: #475569;
  color: #e2e8f0;
  height: 100vh;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 1000;
  overflow-y: auto;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.sidebar.open {
  width: 260px;
  transform: translateX(0);
}

.sidebar.closed {
  width: 70px;
  transform: translateX(0);
}

.sidebar-header {
  padding: 20px 24px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar.closed .sidebar-header {
  padding: 20px 12px;
}

.logo {
  display: flex;
  align-items: center;
  gap: 12px;
}

.logo-icon {
  width: 40px;
  height: 40px;
  background: #22d3ee;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 18px;
  flex-shrink: 0;
}

.logo-text {
  font-size: 18px;
  font-weight: 600;
  color: #f1f5f9;
  opacity: 1;
  transition: opacity 0.2s ease;
}

.sidebar-section {
  padding: 24px 0 0 0;
}

.section-title {
  font-size: 11px;
  font-weight: 700;
  color: #cbd5e1;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin: 0 0 16px 24px;
  opacity: 1;
  transition: opacity 0.2s ease;
}

.nav-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-item {
  margin-bottom: 2px;
}

.nav-link {
  display: flex;
  align-items: center;
  padding: 12px 24px;
  color: #cbd5e1;
  text-decoration: none;
  font-size: 14px;
  font-weight: 500;
  transition: all 0.2s ease;
  position: relative;
}

.sidebar.closed .nav-link {
  padding: 12px 25px;
  justify-content: center;
}

.nav-link:hover {
  background: rgba(255, 255, 255, 0.1);
  color: #f1f5f9;
}

.nav-item.active .nav-link {
  background: rgba(34, 211, 238, 0.2);
  color: #22d3ee;
  border-right: 3px solid #22d3ee;
}

.nav-link i {
  width: 20px;
  font-size: 16px;
  margin-right: 12px;
  text-align: center;
  flex-shrink: 0;
}

.sidebar.closed .nav-link i {
  margin-right: 0;
}

.nav-link span {
  flex: 1;
  opacity: 1;
  transition: opacity 0.2s ease;
}

.expandable {
  justify-content: space-between;
}

.expand-icon {
  width: 12px !important;
  font-size: 12px !important;
  margin-right: 0 !important;
  transition: transform 0.2s ease;
}

.nav-link:hover .expand-icon {
  transform: rotate(90deg);
}

/* Scrollbar styling */
.sidebar::-webkit-scrollbar {
  width: 6px;
}

.sidebar::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.1);
}

.sidebar::-webkit-scrollbar-thumb {
  background: rgba(255, 255, 255, 0.3);
  border-radius: 3px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
  background: rgba(255, 255, 255, 0.5);
}

/* Responsive */
@media (max-width: 768px) {
  .sidebar {
    transform: translateX(-100%);
  }

  .sidebar.open {
    transform: translateX(0);
  }
}
</style>