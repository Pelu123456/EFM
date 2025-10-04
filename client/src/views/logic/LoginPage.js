import api from "../../api";
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
    async handleLogin() {

  if (!this.username || !this.password) {
    this.$toast.error("Please enter username and password");
    return;
  }

  try {
    const response = await api.post("/api/login", {
      username: this.username,
      password: this.password,
    });

    //Save token to local storage
    const token = response.data.access_token;
    localStorage.setItem("token", token);
    localStorage.setItem("user_name", response.data.user.name);
    localStorage.setItem("user_email", response.data.user.email);

    this.$toast.success("Login successful!");
    setTimeout(()=>{
      this.$router.push("/dashboard");
    },500)
    
  } catch (error) {
    console.error("Login failed:", error);

    // Handle specific error responses
    if (error.response && error.response.status === 401) {
      this.$toast.error("Wrong username or password");
    } else {
      this.$toast.error("An error occurred during login. Please try again.");
    }
  }
},

  },
  mounted() {
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.href =
      "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css";
    document.head.appendChild(link);
  },
};
