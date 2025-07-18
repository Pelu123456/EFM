import { useRouter } from "vue-router";

export default {
  name: "LoginPage",
  data() {
    return {
      username: "",
      password: "",
      showPassword: false,
    };
  },
  methods: {
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
    handleLogin() {
      if (username.value && password.value) {
        this.$router.push("/dashboard");
      }
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
