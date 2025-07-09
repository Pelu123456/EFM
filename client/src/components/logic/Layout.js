import Header from "../template/Header.vue";
import Sidebar from "../template/SideBar.vue";

export default {
  name: "Layout",
  components: {
    Header,
    Sidebar,
  },
  data() {
    return {
      isSidebarOpen: true,
    };
  },
  methods: {
    toggleSidebar() {
      this.isSidebarOpen = !this.isSidebarOpen;
    },
  },
  mounted() {
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.href =
      "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css";
    document.head.appendChild(link);

    // Setup body styles
    document.body.style.margin = "0";
    document.body.style.padding = "0";
    document.body.style.fontFamily ='-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
    document.body.style.background = "#f8fafc";
    document.body.style.color = "#1e293b";
  },
};
