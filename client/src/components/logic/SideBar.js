import { onMounted, onBeforeUnmount } from "vue";
import { useRoute } from "vue-router";
const router = useRoute();

export default {
  name: "SideBar",
  props: {
    isSidebarOpen: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      currentRoute: "dashboard", // Set default route
      isTournamentDropdownOpen: false,
    };
  },

  computed: {
    isTournamentActive() {
      return this.currentRoute === 'tournaments-parent';
    },

    hasActiveTournamentChild() {
      return ['tournaments', 'create-tournament', 'tournament-schedule', 'tournament-standings', 'tournament-results'].includes(this.currentRoute);
    }
  },

  methods: {
    setActive(route) {
      this.currentRoute = route;

      // Auto-expand tournament dropdown if selecting a tournament-related route
      if (this.hasActiveTournamentChild) {
        this.isTournamentDropdownOpen = true;
      }
    },

    toggleTournamentDropdown() {
      this.isTournamentDropdownOpen = !this.isTournamentDropdownOpen;
    },

    handleResize() {
      if (window.innerWidth <= 768) {
        this.$emit('update:isSidebarOpen', false); // Emit lên cha để đóng sidebar
      }
    }
  },

  watch: {
    isSidebarOpen(newVal) {
      if (!newVal) {
        this.isTournamentDropdownOpen = false;
      }
    }
  },

  mounted() {
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css";
    document.head.appendChild(link);

    // Auto-expand tournament dropdown if currently on a tournament page
    if (this.hasActiveTournamentChild) {
      this.isTournamentDropdownOpen = true;
    }

    this.handleResize(); // first check on mount
    window.addEventListener("resize", this.handleResize);
  },

  beforeUnmount() {
    window.removeEventListener("resize", this.handleResize);
  }
};
