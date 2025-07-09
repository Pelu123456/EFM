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

<script src="../logic/Header.js"></script>

<style scoped src="../style/Header.css"></style>