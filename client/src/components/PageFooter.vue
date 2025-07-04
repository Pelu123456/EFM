<template>
  <footer class="footer">
    <div class="footer-content">
      <!-- Left Section - Language Selector -->
      <div class="footer-left">
        <div class="language-selector">
          <span class="language-label">Language</span>
          <div class="language-dropdown">
            <button class="language-btn" @click="toggleLanguage">
              <span class="language-code">EN</span>
              <span class="language-text">English</span>
              <i class="fas fa-chevron-down"></i>
            </button>
            <div class="language-options" v-show="showLanguageOptions">
              <div class="language-option" @click="selectLanguage('EN', 'English')">
                <span class="language-code">EN</span>
                <span class="language-text">English</span>
              </div>
              <div class="language-option" @click="selectLanguage('VI', 'Tiếng Việt')">
                <span class="language-code">VI</span>
                <span class="language-text">Tiếng Việt</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Center Section - Contact & Social -->
      <div class="footer-center">
        <div class="contact-info">
          <a href="mailto:contact@score7.io" class="contact-link">
            contact@score7.io
          </a>
          <div class="social-links">
            <a href="#" class="social-link">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-link">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Right Section - Made in -->
      <div class="footer-right">
        <div class="made-in">
          <span>Made in London with</span>
          <i class="fas fa-heart"></i>
        </div>
      </div>
    </div>

    <!-- Bottom Links -->
    <div class="footer-bottom">
      <div class="footer-links">
        <a href="#" class="footer-link">Privacy Policy</a>
        <a href="#" class="footer-link">Terms of Service</a>
        <a href="#" class="footer-link">Cancellation & Refund Policy</a>
      </div>
      <div class="copyright">
        <span>Copyright © Score7 2025</span>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { ref } from 'vue'

const showLanguageOptions = ref(false)
const selectedLanguage = ref({ code: 'EN', text: 'English' })

const toggleLanguage = () => {
  showLanguageOptions.value = !showLanguageOptions.value
}

const selectLanguage = (code, text) => {
  selectedLanguage.value = { code, text }
  showLanguageOptions.value = false
}
</script>

<style scoped>
.footer {
  background: #2d3748;
  color: #e2e8f0;
  padding: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 40px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-left {
  flex: 1;
}

.language-selector {
  position: relative;
}

.language-label {
  font-size: 0.9rem;
  color: #a0aec0;
  margin-bottom: 8px;
  display: block;
}

.language-dropdown {
  position: relative;
}

.language-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  padding: 10px 16px;
  color: white;
  cursor: pointer;
  transition: all 0.2s ease;
  font-size: 0.95rem;
}

.language-btn:hover {
  background: rgba(255, 255, 255, 0.15);
  border-color: rgba(255, 255, 255, 0.3);
}

.language-code {
  font-weight: 600;
  min-width: 20px;
}

.language-text {
  color: #e2e8f0;
}

.language-btn i {
  margin-left: auto;
  font-size: 0.8rem;
  transition: transform 0.2s ease;
}

.language-options {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: #1a202c;
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
  z-index: 10;
  margin-top: 4px;
}

.language-option {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 16px;
  cursor: pointer;
  transition: background 0.2s ease;
}

.language-option:hover {
  background: rgba(255, 255, 255, 0.1);
}

.language-option:first-child {
  border-radius: 8px 8px 0 0;
}

.language-option:last-child {
  border-radius: 0 0 8px 8px;
}

.footer-center {
  flex: 1;
  display: flex;
  justify-content: center;
}

.contact-info {
  display: flex;
  align-items: center;
  gap: 20px;
}

.contact-link {
  color: #e2e8f0;
  text-decoration: none;
  font-size: 0.95rem;
  transition: color 0.2s ease;
}

.contact-link:hover {
  color: #ffeaa7;
}

.social-links {
  display: flex;
  gap: 12px;
}

.social-link {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  color: #e2e8f0;
  text-decoration: none;
  transition: all 0.2s ease;
  font-size: 0.9rem;
}

.social-link:hover {
  background: rgba(255, 255, 255, 0.2);
  color: #ffeaa7;
  transform: translateY(-2px);
}

.footer-right {
  flex: 1;
  display: flex;
  justify-content: flex-end;
}

.made-in {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.9rem;
  color: #a0aec0;
}

.made-in i {
  color: #e53e3e;
  font-size: 0.8rem;
}

.footer-bottom {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 16px;
  padding: 20px 40px;
  background: #2d3748;
  text-align: center;
}

.footer-links {
  display: flex;
  gap: 32px;
}

.footer-link {
  color: #a0aec0;
  text-decoration: none;
  font-size: 0.9rem;
  transition: color 0.2s ease;
}

.footer-link:hover {
  color: #ffeaa7;
}

.copyright {
  color: #a0aec0;
  font-size: 0.9rem;
}

@media (max-width: 768px) {
  .footer-content {
    flex-direction: column;
    gap: 20px;
    text-align: center;
  }

  .footer-left,
  .footer-center,
  .footer-right {
    flex: none;
  }

  .footer-bottom {
    flex-direction: column;
    gap: 16px;
    text-align: center;
  }

  .footer-links {
    flex-direction: column;
    gap: 16px;
  }
}
</style>