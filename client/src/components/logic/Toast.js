export default {
  name: 'Toast',
  props: {
    message: String,
    type: {
      type: String,
      default: 'info'
    },
    duration: {
      type: Number,
      default: 3000
    }
  },
  data() {
    return {
      visible: false
    }
  },
  computed: {
    typeClass() {
      return `toast-${this.type}`;
    },
    iconClass() {
      const icons = {
        success: 'fas fa-check-circle',
        error: 'fas fa-exclamation-circle',
        warning: 'fas fa-exclamation-triangle',
        info: 'fas fa-info-circle'
      };
      return icons[this.type] || icons.info;
    }
  },
  mounted() {
    this.visible = true;
    if (this.duration > 0) {
      setTimeout(() => {
        this.close();
      }, this.duration);
    }
  },
  methods: {
    close() {
      this.visible = false;
      setTimeout(() => {
        this.$emit('close');
      }, 300);
    }
  }
}