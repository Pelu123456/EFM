<template>
  <div class="page-background">
    <div class="input-group">
      <form class="login-form" @submit.prevent="handleLogin">
        <div class="form-header">
          <h2>Sign in</h2>
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
          Sign in
        </button>
      </form>
    </div>
  </div>
</template>

<script src="../logic/LoginPage.js"></script>

<style scoped src="../style/LoginPage.css"></style>