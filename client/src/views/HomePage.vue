<template>
    <div class="page-container">
        <PageHeader/>
        <div class="page-content">
            <div class="page-content-left">
                <div class="hero-text">
                    <h1 class="main-title">
                        <span class="gradient-text">Simple Approach</span>
                        <br>to Manage
                        <span class="highlight-text">Tournaments!</span>
                    </h1>
                    <h3 class="subtitle">
                        Customize match rules, set up fair brackets,
                        <br>and keep everyone informed in
                        <span class="accent-text">real-time</span>
                    </h3>
                    <div class="cta-buttons">
                        <button class="btn-primary">
                            <span>Get Started</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="features-preview">
                        <div class="feature-item">
                            <i class="fas fa-trophy"></i>
                            <span>Easy Tournament Setup</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-users"></i>
                            <span>Team Management</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Live Statistics</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-right">
                <div class="image-container">
                    <div class="image-wrapper">
                        <img :src="team_img" alt="Tournament Team" class="hero-image">
                        <div class="image-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <PageFooter/>
    </div>
</template>

<script setup>
import PageHeader from '../components/PageHeader.vue';
import PageFooter from '../components/PageFooter.vue';
const team_img = './assets/images/team_image.jpeg'
</script>

<style scoped>
.page-content {
    display: flex;
    min-height: calc(100vh - 80px);
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.page-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.page-content-left {
    flex: 1;
    display: flex;
    align-items: center;
    padding: 60px 80px;
    position: relative;
    z-index: 2;
}

.hero-text {
    max-width: 600px;
    animation: fadeInUp 0.8s ease-out;
}

.main-title {
    font-size: 4rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 24px;
    color: white;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.gradient-text {
    background: linear-gradient(45deg, #ffeaa7, #fab1a0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: inline-block;
}

.highlight-text {
    color: #ffeaa7;
    position: relative;
}

.highlight-text::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #ffeaa7, #fab1a0);
    border-radius: 2px;
}

.subtitle {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 400;
    line-height: 1.6;
    margin-bottom: 40px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.accent-text {
    color: #ffeaa7;
    font-weight: 600;
}

.cta-buttons {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 60px;
}

.btn-primary, .btn-secondary {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 50px;
    border: none;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    position: relative;
    overflow: hidden;
}

.btn-primary {
    background: #2d3748;
    color: white;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    min-width: 200px;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
    background: #1a202c;
}

.btn-secondary {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

.features-preview {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    font-weight: 500;
}

.feature-item i {
    font-size: 1.2rem;
    color: #ffeaa7;
}

.page-content-right {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 80px;
    position: relative;
}

.image-container {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-wrapper {
    position: relative;
    width: 450px;
    height: 450px;
    border-radius: 30px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: float 6s ease-in-out infinite;
}

.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.image-wrapper:hover .hero-image {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
    pointer-events: none;
}

.floating-cards {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.card {
    position: absolute;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    animation: cardFloat 4s ease-in-out infinite;
}

.card-1 {
    top: 10%;
    right: -10%;
    animation-delay: 0s;
}

.card-2 {
    bottom: 30%;
    left: -15%;
    animation-delay: 1s;
}

.card-3 {
    top: 40%;
    right: -20%;
    animation-delay: 2s;
}

.card-icon {
    font-size: 2rem;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
}

.card-text {
    color: white;
}

.card-title {
    font-size: 0.85rem;
    font-weight: 500;
    opacity: 0.9;
    margin-bottom: 4px;
}

.card-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: #ffeaa7;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Feature Bar */
.feature-bar {
    background: #2d3748;
    padding: 24px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 80px;
}

.feature-bar .feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: white;
    font-size: 1rem;
    font-weight: 500;
}

.feature-bar .feature-item i {
    font-size: 1.2rem;
    color: #48bb78;
    background: rgba(72, 187, 120, 0.1);
    padding: 8px;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}
@media (max-width: 1024px) {
    .page-content {
        flex-direction: column;
        text-align: center;
    }
    
    .page-content-left {
        padding: 40px;
    }
    
    .main-title {
        font-size: 3rem;
    }
    
    .image-wrapper {
        width: 350px;
        height: 350px;
    }
    
    .cta-buttons {
        justify-content: center;
    }
    
    .features-preview {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .main-title {
        font-size: 2.5rem;
    }
    
    .subtitle {
        font-size: 1.1rem;
    }
    
    .cta-buttons {
        justify-content: center;
    }
    
    .btn-primary, .btn-secondary {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
    
    .image-wrapper {
        width: 280px;
        height: 280px;
    }
    
    .card {
        padding: 15px;
    }
    
    .card-1, .card-2, .card-3 {
        position: relative;
        top: auto;
        left: auto;
        right: auto;
        bottom: auto;
        margin: 10px;
    }
}
</style>