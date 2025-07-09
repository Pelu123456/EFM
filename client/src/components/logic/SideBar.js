import { ref, onMounted } from "vue";
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
      currentRoute: "",
    };
  },
  methods: {
    setActive(route) {
      this.currentRoute = route;
    },
  },

  onMounted() {
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.href =
      "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css";
    document.head.appendChild(link);
  },
};
