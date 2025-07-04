<template>
  <div class="header-bar">
    <div class="header-left">
      <span class="logo">Myleague</span>
    </div>
    <div class="header-right">
      <nav class="nav-menu">
        <span class="nav-item">Home</span>
        <div class="nav-item dropdown-container" ref="tournamentDropdownRef" @click="toggleTournamentDropdown">
          <span>Tournament <i class="fas fa-caret-down"></i></span>
          <ul v-if="showTournamentDropdown" class="dropdown">
            <li>Create tournament</li>
            <li>Find tournament</li>
          </ul>
        </div>
      </nav>
      <div class="user-menu" ref="userDropdownRef" @click="toggleUserDropdown">
        <span class="user-name">
          {{ username }}
          <i class="fas fa-caret-down"></i>
        </span>
        <ul v-if="showUserDropdown" class="dropdown">
          <li>Thông tin tài khoản</li>
          <li>Quản lý giải đấu</li>
          <li @click="handleLogout()">Đăng xuất</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useRouter } from 'vue-router';

const router = useRouter();

// State
const showUserDropdown = ref(false)
const showTournamentDropdown = ref(false)
const username = ref('Nguyen Van A') // sau này lấy từ backend
const userDropdownRef = ref(null)
const tournamentDropdownRef = ref(null)

// Toggle dropdowns
const toggleUserDropdown = () => {
  showUserDropdown.value = !showUserDropdown.value
  showTournamentDropdown.value = false
}

const toggleTournamentDropdown = () => {
  showTournamentDropdown.value = !showTournamentDropdown.value
  showUserDropdown.value = false
}

// Click outside logic
const handleClickOutside = (event) => {
  // Kiểm tra user dropdown
  if (userDropdownRef.value && !userDropdownRef.value.contains(event.target)) {
    showUserDropdown.value = false
  }
  
  // Kiểm tra tournament dropdown
  if (tournamentDropdownRef.value && !tournamentDropdownRef.value.contains(event.target)) {
    showTournamentDropdown.value = false
  }
}

const handleLogout = async() => {
  router.push('/');
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)

  // Load FontAwesome
  const link = document.createElement('link')
  link.rel = 'stylesheet'
  link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
  document.head.appendChild(link)
})

onBeforeUnmount(() => {
  document.removeEventListener('click', handleClickOutside)
})
</script>

<style scoped>
.header-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1f2937;
  color: white;
  padding: 12px 24px;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header-left .logo {
  font-size: 24px;
  font-weight: 700;
  letter-spacing: -0.5px;
}

.header-right {
  display: flex;
  align-items: center;
  gap: 32px;
}

.nav-menu {
  display: flex;
  align-items: center;
  gap: 24px;
}

.nav-item {
  cursor: pointer;
  padding: 8px 12px;
  border-radius: 6px;
  transition: background-color 0.2s ease;
  font-weight: 500;
}

.nav-item:hover {
  background-color: rgba(255, 255, 255, 0.1);
}

.dropdown-container {
  position: relative;
}

.user-menu {
  cursor: pointer;
  position: relative;
  padding: 8px 12px;
  border-radius: 6px;
  transition: background-color 0.2s ease;
}

.user-menu:hover {
  background-color: rgba(255, 255, 255, 0.1);
}

.user-name {
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 6px;
}

.user-name i {
  font-size: 12px;
  transition: transform 0.2s ease;
}

.dropdown-container i {
  font-size: 12px;
  transition: transform 0.2s ease;
  margin-left: 6px;
}

.user-menu:hover .user-name i,
.dropdown-container:hover i {
  transform: rotate(180deg);
}

.dropdown {
  position: absolute;
  right: 0;
  top: 100%;
  margin-top: 8px;
  background-color: white;
  color: #374151;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  list-style: none;
  padding: 8px 0;
  min-width: 180px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  z-index: 1000;
}

.dropdown li {
  padding: 12px 16px;
  cursor: pointer;
  font-weight: 500;
  transition: background-color 0.2s ease;
}

.dropdown li:hover {
  background-color: #f9fafb;
}

.dropdown li:first-child {
  border-radius: 8px 8px 0 0;
}

.dropdown li:last-child {
  border-radius: 0 0 8px 8px;
}

/* Responsive */
@media (max-width: 768px) {
  .header-bar {
    padding: 12px 16px;
  }
  
  .header-right {
    gap: 16px;
  }
  
  .nav-menu {
    gap: 16px;
  }
  
  .nav-item {
    padding: 6px 8px;
  }
}
</style>