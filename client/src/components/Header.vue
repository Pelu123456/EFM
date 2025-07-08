<template>
  <header class="header">
    <div class="header-left">
      <button class="icon-btn" @click="$emit('toggle-sidebar')">
        <div class="menu-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </button>
      
      <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input 
          type="text" 
          class="search-input" 
          placeholder="Tìm kiếm..."
          v-model="searchQuery"
          @input="handleSearch"
        >
      </div>
    </div>

    <div class="header-right">
      <button class="icon-btn" @click="toggleTheme">
        <i :class="isDarkMode ? 'fas fa-moon' : 'fas fa-sun'"></i>
      </button>
      
      <button class="icon-btn">
        <i class="fas fa-cog"></i>
      </button>
      
      <button class="icon-btn notification-badge" >
        <i class="fas fa-bell"></i>
      </button>
      
      <div class="profile-container">
        <button class="icon-btn profile-btn" @click="toggleProfile">
          <i class="fas fa-user"></i>
        </button>
        
        <!-- Profile Dropdown -->
        <div v-if="showProfileMenu" class="profile-dropdown">
          <div class="profile-header">
            <div class="profile-avatar">
              <i class="fas fa-user"></i>
            </div>
            <div class="profile-info">
              <div class="profile-name">{{ user_name }}</div>
              <div class="profile-email">{{ user_email }}</div>
            </div>
          </div>
          
          <div class="profile-menu">
            <button class="profile-menu-item" @click="openSettings">
              <i class="fas fa-cog"></i>
              <span>Cài đặt</span>
            </button>
            
            <button class="profile-menu-item" @click="changePassword">
              <i class="fas fa-lock"></i>
              <span>Đổi mật khẩu</span>
            </button>
            
            <div class="profile-menu-divider"></div>
            
            <button class="profile-menu-item logout-btn" @click="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span>Đăng xuất</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted, watch, onUnmounted } from 'vue'

// Define emits
const emit = defineEmits(['toggle-sidebar'])
const user_name = 'Nguyen Van A'
const user_email = 'nguyenvana@gmail.com'

// Reactive data
const searchQuery = ref('')
const isDarkMode = ref(false)
const showProfileMenu = ref(false)

// Load FontAwesome on component mount
onMounted(() => {
  const link = document.createElement('link')
  link.rel = 'stylesheet'
  link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
  document.head.appendChild(link)
  
  // Add click outside listener
  document.addEventListener('click', handleClickOutside)
})

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside)
})

// Watch for theme changes
watch(isDarkMode, (newVal) => {
  const body = document.body
  if (newVal) {
    body.style.background = '#0f172a'
    body.style.color = '#e2e8f0'
  } else {
    body.style.background = '#f8fafc'
    body.style.color = '#1e293b'
  }
})

// Methods
const toggleTheme = () => {
  isDarkMode.value = !isDarkMode.value
}

const handleSearch = () => {
  console.log('tìm kiếm cho :', searchQuery.value)
}

const openSettings = () => {
  showProfileMenu.value = false
  alert('chức năng đang phát triển')
}

const toggleProfile = () => {
  showProfileMenu.value = !showProfileMenu.value
}


const changePassword = () => {
  showProfileMenu.value = false
  alert('chức năng đang phát triển')
}

const logout = () => {
  showProfileMenu.value = false
  alert('chức năng đang phát triển')
}

const handleClickOutside = (event) => {
  const profileContainer = document.querySelector('.profile-container')
  if (profileContainer && !profileContainer.contains(event.target)) {
    showProfileMenu.value = false
  }
}
</script>

<style scoped>
.header {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  padding: 0 24px;
  height: 64px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky;
  top: 0;
  z-index: 100;
}

.header-left {
  display: flex;
  align-items: center;
  gap: 16px;
}

.header-right {
  display: flex;
  align-items: center;
  gap: 12px;
}

.icon-btn {
  width: 40px;
  height: 40px;
  border: none;
  background: transparent;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: #64748b;
  transition: all 0.2s ease;
  font-size: 16px;
}

.icon-btn:hover {
  background: rgba(0, 0, 0, 0.05);
  color: #334155;
}

.menu-btn {
  width: 20px;
  height: 16px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  cursor: pointer;
}

.menu-btn span {
  width: 100%;
  height: 2px;
  background: #64748b;
  border-radius: 1px;
  transition: all 0.3s ease;
}

.menu-btn:hover span {
  background: #334155;
}

.search-container {
  position: relative;
  width: 280px;
}

.search-input {
  width: 100%;
  height: 36px;
  padding: 0 12px 0 40px;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  background: #f8fafc;
  font-size: 14px;
  color: #334155;
  transition: all 0.2s ease;
}

.search-input:focus {
  outline: none;
  border-color: #3b82f6;
  background: white;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-input::placeholder {
  color: #94a3b8;
}

.search-icon {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
  font-size: 14px;
}

.notification-badge {
  position: relative;
}

.notification-badge::after {
  content: '';
  position: absolute;
  top: 8px;
  right: 8px;
  width: 8px;
  height: 8px;
  background: #10b981;
  border-radius: 50%;
  border: 2px solid white;
}

/* Profile Dropdown Styles */
.profile-container {
  position: relative;
}

.profile-dropdown {
  position: absolute;
  top: 100%;
  right: 0;
  margin-top: 8px;
  width: 280px;
  background: white;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  z-index: 1000;
  animation: slideDown 0.2s ease;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.profile-header {
  background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
  padding: 20px;
  display: flex;
  align-items: center;
  gap: 12px;
  color: white;
}

.profile-avatar {
  width: 48px;
  height: 48px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  color: white;
}

.profile-info {
  flex: 1;
}

.profile-name {
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 4px;
}

.profile-email {
  font-size: 14px;
  opacity: 0.9;
}

.profile-menu {
  padding: 8px 0;
}

.profile-menu-item {
  width: 100%;
  padding: 12px 20px;
  border: none;
  background: transparent;
  display: flex;
  align-items: center;
  gap: 12px;
  cursor: pointer;
  transition: all 0.2s ease;
  color: #374151;
  font-size: 14px;
  text-align: left;
}

.profile-menu-item:hover {
  background: #f3f4f6;
}

.profile-menu-item i {
  width: 16px;
  color: #6b7280;
}

.profile-menu-divider {
  height: 1px;
  background: #e5e7eb;
  margin: 8px 0;
}

.logout-btn {
  color: #dc2626;
}

.logout-btn:hover {
  background: #fef2f2;
}

.logout-btn i {
  color: #dc2626;
}

/* Responsive */
@media (max-width: 768px) {
  .header {
    padding: 0 16px;
  }

  .search-container {
    width: 200px;
  }

  .header-right {
    gap: 8px;
  }

  .icon-btn {
    width: 36px;
    height: 36px;
  }
  
  .profile-dropdown {
    width: 260px;
  }
}

@media (max-width: 480px) {
  .search-container {
    display: none;
  }

  .header-left {
    gap: 12px;
  }

  .header-right {
    gap: 6px;
  }
  
  .profile-dropdown {
    width: 240px;
    right: -20px;
  }
}
</style>