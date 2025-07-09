<template>
  <div class="page-background">
    <div class="input-group">
      <form class="login-form" @submit.prevent="handleLogin">
        <div class="form-header">
          <h2>Đăng nhập</h2>
        </div>
        
        <div class="form-field">
          <label for="username">Email</label>
          <input 
            type="text"
            id="username"
            v-model="username"
            class="form-input"
            placeholder="Nhập email"
            required
          />
        </div>

        <div class="form-field">
          <label for="password">Mật Khẩu</label>
          <div class="password-input-wrapper">
            <input 
              type="password"
              id="password"
              v-model="password"
              :type="showPassword ? 'text' : 'password'"
              class="form-input"
              placeholder="Nhập mật khẩu"
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
          Đăng nhập
        </button>
      </form>
    </div>
  </div>
</template>

<script src="../logic/LoginPage.js"></script>

<style scoped src="../style/LoginPage.css"></style>