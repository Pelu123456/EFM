<template>
  <div class="page-background">
    <div class="input-group">
      <form class="login-form" @submit.prevent="handleLogin">
        <div class="form-header">
          <h2>Sign In</h2>
        </div>
        
        <div class="form-field">
          <label for="username">Username</label>
          <input 
            type="text"
            id="username"
            v-model="username"
            class="form-input"
            placeholder="Enter username"
            required
          />
        </div>

        <div class="form-field">
          <label for="password">Password</label>
          <div class="password-input-wrapper">
            <input 
              type="password"
              id="password"
              v-model="password"
              :type="showPassword ? 'text' : 'password'"
              class="form-input"
              placeholder="Enter password"
              required
            />
            <button 
              type="button" 
              class="password-toggle"
              @click="togglePassword"
            >
              <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
            </button>
          </div>
        </div>

        <button type="submit" class="submit-btn">
          Sign In
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const username = ref('');
const password = ref('');
const showPassword = ref(false);

onMounted(() => {

  const link = document.createElement('link');
  link.rel = 'stylesheet';
  link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
  document.head.appendChild(link);
});

const togglePassword = () => {
  showPassword.value = !showPassword.value;
};

const handleLogin = async () => {
  // Thêm validation logic ở đây
  if (username.value && password.value) {
    router.push('/homepage');
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

* {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
  overflow: hidden;
}

.page-background {
  background-image: url('/assets/images/background_3.jpg'); 
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  display: flex;
  align-items: stretch;
  justify-content: flex-end;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.page-background::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.1) 100%);
  pointer-events: none;
}

.input-group {
  width: 600px;
  height: 100vh;
  min-height: 100vh;
  max-height: 100vh;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  border-radius: 0;
  box-shadow: -10px 0 30px rgba(0, 0, 0, 0.15);
  position: relative;
  z-index: 1;
  border-left: 1px solid rgba(255, 255, 255, 0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.login-form {
  width: 100%;
  max-width: 450px;
  padding: 40px 50px;
  color: #1a1a1a;
}

.form-header {
  text-align: center;
  margin-bottom: 35px;
}

.form-header h2 {
  font-size: 32px;
  font-weight: 700;
  color: #1a1a1a;
  margin: 0;
  letter-spacing: -0.5px;
  position: relative;
}

.form-header h2::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 50px;
  height: 3px;
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  border-radius: 2px;
}

.form-field {
  margin-bottom: 25px;
  position: relative;
}

.form-field label {
  display: block;
  margin-bottom: 10px;
  font-size: 14px;
  font-weight: 600;
  color: #374151;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.form-input {
  width: 100%;
  padding: 16px 20px;
  border: 2px solid #e5e7eb;
  border-radius: 12px;
  font-size: 16px;
  color: #1a1a1a;
  background-color: #ffffff;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  font-weight: 500;
}

.form-input:focus {
  outline: none;
  border-color: #667eea;
  background-color: #ffffff;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
  transform: translateY(-1px);
}

.form-input::placeholder {
  color: #9ca3af;
  font-weight: 400;
}

.password-input-wrapper {
  position: relative;
}

.password-toggle {
  position: absolute;
  right: 16px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  cursor: pointer;
  color: #6b7280;
  font-size: 18px;
  padding: 8px;
  transition: all 0.2s ease;
  border-radius: 6px;
}

.password-toggle:hover {
  color: #667eea;
  background-color: rgba(102, 126, 234, 0.1);
}

.submit-btn {
  width: 100%;
  padding: 16px;
  background: #1a1a1a;
  color: white;
  border: none;
  border-radius: 12px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-top: 20px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.submit-btn:hover {
  background: #333333;
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(26, 26, 26, 0.3);
}

.submit-btn:active {
  transform: translateY(0);
  box-shadow: 0 4px 12px rgba(26, 26, 26, 0.3);
}

.form-footer {
  text-align: center;
  margin-top: 25px;
}

.forgot-password {
  color: #667eea;
  text-decoration: none;
  font-size: 14px;
  font-weight: 500;
  transition: all 0.2s ease;
  position: relative;
}

.forgot-password:hover {
  color: #764ba2;
}

.forgot-password::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  transition: width 0.3s ease;
}

.forgot-password:hover::after {
  width: 100%;
}

/* Responsive design */
@media (max-width: 768px) {
  .page-background {
    justify-content: center;
    align-items: stretch;
  }
  
  .input-group {
    width: 100vw;
    height: 100vh;
    min-height: 100vh;
    max-height: 100vh;
    border-radius: 0;
    border-left: none;
    box-shadow: none;
    overflow: hidden;
  }
  
  .login-form {
    padding: 35px 30px;
    max-width: 400px;
  }
  
  .form-header h2 {
    font-size: 24px;
  }
}

@media (max-width: 480px) {
  .input-group {
    width: 100vw;
    height: 100vh;
    min-height: 100vh;
    max-height: 100vh;
    border-radius: 0;
    overflow: hidden;
  }
  
  .login-form {
    padding: 30px 25px;
    max-width: 360px;
  }
  
  .form-header h2 {
    font-size: 22px;
  }
  
  .form-input {
    padding: 12px 16px;
    font-size: 14px;
  }
  
  .submit-btn {
    padding: 14px;
    font-size: 14px;
  }
}</style>