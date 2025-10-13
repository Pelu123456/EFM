import { createApp } from 'vue';
import Toast from '../components/template/Toast.vue';

const toastPlugin = {
  install(app) {
    const showToast = (message, type = 'info', duration = 3000) => {
      const container = document.createElement('div');
      document.body.appendChild(container);

      const toastApp = createApp(Toast, {
        message,
        type,
        duration,
        onClose: () => {
          toastApp.unmount();
          document.body.removeChild(container);
        }
      });

      toastApp.mount(container);
    };
    // Add $toast methods to global properties
    app.config.globalProperties.$toast = {
      success: (message, duration) => showToast(message, 'success', duration),
      error: (message, duration) => showToast(message, 'error', duration),
      warning: (message, duration) => showToast(message, 'warning', duration),
      info: (message, duration) => showToast(message, 'info', duration)
    };
  }
};

export default toastPlugin;