export default {
  name: 'Header',
  emits: ['toggle-sidebar'],
  data() {
    return {
      user_name: 'Nguyen Van A',
      user_email: 'nguyenvana@gmail.com',
      searchQuery: '',
      isDarkMode: false,
      showProfileMenu: false
    }
  },
  methods: {
    toggleTheme() {
      this.isDarkMode = !this.isDarkMode
    },
    handleSearch() {
      console.log('Search for... :', this.searchQuery)
    },
    openSettings() {
      this.showProfileMenu = false
      alert('Feature in development')
    },
    toggleProfile() {
      this.showProfileMenu = !this.showProfileMenu
    },
    logout() {
      this.showProfileMenu = false
      alert('Feature in development')
    },
    handleClickOutside(event) {
      const profileContainer = document.querySelector('.profile-container')
      if (profileContainer && !profileContainer.contains(event.target)) {
        this.showProfileMenu = false
      }
    }
  },
  // Watch for theme changes
  watch: {
    isDarkMode(newVal) {
      const body = document.body
      if (newVal) {
        body.style.background = '#0f172a'
        body.style.color = '#e2e8f0'
      } else {
        body.style.background = '#f8fafc'
        body.style.color = '#1e293b'
      }
    }
  },
  mounted() {
    const link = document.createElement('link')
    link.rel = 'stylesheet'
    link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
    document.head.appendChild(link)

    document.addEventListener('click', this.handleClickOutside)
  },
  unmounted() {
    document.removeEventListener('click', this.handleClickOutside)
  }
}
