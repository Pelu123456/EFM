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
          <span v-if="isSidebarOpen">TRANG CHỦ</span>
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

<script src="../logic/SideBar.js"></script>

<style scoped src="../style/SideBar.css"></style>