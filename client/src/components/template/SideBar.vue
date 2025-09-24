<template>
  <div :class="['sidebar', { open: isSidebarOpen, closed: !isSidebarOpen }]">
    <!-- Logo Section -->
    <div class="sidebar-header">
      <div class="logo">
        <div class="logo-icon">
          <i class="fas fa-person-running"></i>
        </div>
        <span v-if="isSidebarOpen" class="logo-text">MY TOUR</span>
      </div>
    </div>

    <ul class="nav-list" style="margin-top: 12px">
      <li class="nav-item" :class="{ active: currentRoute === 'dashboard' }">
        <router-link
          to="/dashboard"
          class="nav-link"
          :class="{ active: activeItem === 'dashboard' }"
          @click.native.prevent="setActive('dashboard')"
        >
          <i class="fas fa-home"></i>
          <span v-if="isSidebarOpen">DASHBOARD</span>
        </router-link>
      </li>
    </ul>

    <!-- Tournament -->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">TOURNAMENT MANAGEMENT</h3>
      <ul class="nav-list">
        <!-- Parent menu item with dropdown toggle -->
        <li
          class="nav-item dropdown-parent"
          :class="{
            active: isTournamentActive,
            expanded: isTournamentDropdownOpen,
            'has-active-child': hasActiveTournamentChild,
          }"
        >
          <a
            href="#"
            class="nav-link dropdown-toggle"
            @click.prevent="toggleTournamentDropdown"
          >
            <i class="fas fa-trophy"></i>
            <span v-if="isSidebarOpen">Tournament</span>
            <i
              v-if="isSidebarOpen"
              class="fas fa-chevron-down dropdown-arrow"
              :class="{ rotated: isTournamentDropdownOpen }"
            ></i>
          </a>

          <!-- Dropdown menu -->
          <ul
            v-if="isSidebarOpen"
            class="dropdown-menu"
            :class="{ show: isTournamentDropdownOpen }"
          >
            <li
              class="dropdown-item"
              :class="{ active: currentRoute === 'tournaments' }"
            >
              <router-link
                to="all-tournaments"
                class="nav-link"
                @click.prevent="setActive('tournaments')"
              >
                <i class="fas fa-file-alt"></i>
                <span>All tournaments</span>
              </router-link>
            </li>
            <li
              class="dropdown-item"
              :class="{ active: currentRoute === 'create-tournament' }"
            >
              <router-link
                to="/create-tournament"
                class="nav-link"
                @click.native="setActive('create-tournament')"
              >
                <i class="fas fa-plus-circle"></i>
                <span>Create tournament</span>
              </router-link>
            </li>
            <li
              class="dropdown-item"
              :class="{ active: currentRoute === 'tournament-schedule' }"
            >
              <a
                href="#"
                class="nav-link"
                @click.prevent="setActive('tournament-schedule')"
              >
                <i class="fas fa-calendar-alt"></i>
                <span>Match schedule</span>
              </a>
            </li>
            <li
              class="dropdown-item"
              :class="{ active: currentRoute === 'tournament-standings' }"
            >
              <a
                href="#"
                class="nav-link"
                @click.prevent="setActive('tournament-standings')"
              >
                <i class="fas fa-list-ol"></i>
                <span>Leaderboard</span>
              </a>
            </li>
            <li
              class="dropdown-item"
              :class="{ active: currentRoute === 'tournament-results' }"
            >
              <a
                href="#"
                class="nav-link"
                @click.prevent="setActive('tournament-results')"
              >
                <i class="fas fa-futbol"></i>
                <span>Match results</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Team -->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">TEAM</h3>
      <ul class="nav-list">
        <li class="nav-item" :class="{ active: currentRoute === 'teams' }">
          <a href="#" class="nav-link" @click.prevent="setActive('teams')">
            <i class="fas fa-users"></i>
            <span v-if="isSidebarOpen">Team</span>
          </a>
        </li>
      </ul>
    </div>

    <!--Statitics-->
    <div class="sidebar-section">
      <h3 v-if="isSidebarOpen" class="section-title">STATISTICS</h3>
      <ul class="nav-list">
        <li class="nav-item" :class="{ active: currentRoute === 'statistics' }">
          <a href="#" class="nav-link" @click.prevent="setActive('statistics')">
            <i class="fas fa-chart-bar"></i>
            <span v-if="isSidebarOpen">Statistics</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script src="../logic/SideBar.js"></script>

<style scoped src="../style/SideBar.css"></style>
