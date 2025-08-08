// Carousel Functionality
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.carousel-slide');
    const navDots = document.querySelectorAll('.nav-dot');
    
    if (!carousel || slides.length === 0) return;
    
    let currentSlide = 0;
    let isTransitioning = false;
    
    // Auto-play interval (optional)
    let autoPlayInterval;
    const autoPlayDelay = 5000; // 5 seconds
    
    // Initialize carousel
    function initCarousel() {
        showSlide(0);
        startAutoPlay();
    }
    
    // Show specific slide
    function showSlide(index) {
        if (isTransitioning) return;
        
        isTransitioning = true;
        
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        navDots.forEach(dot => dot.classList.remove('active'));
        
        // Add active class to current slide and dot
        if (slides[index]) {
            slides[index].classList.add('active');
            currentSlide = index;
        }
        
        if (navDots[index]) {
            navDots[index].classList.add('active');
        }
        
        // Reset transition flag after animation
        setTimeout(() => {
            isTransitioning = false;
        }, 300);
    }
    
    // Go to next slide
    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }
    
    // Go to previous slide
    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    }
    
    // Start auto-play
    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, autoPlayDelay);
    }
    
    // Stop auto-play
    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
        }
    }
    
    // Navigation dots event listeners
    navDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopAutoPlay();
            showSlide(index);
            startAutoPlay();
        });
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        } else if (e.key === 'ArrowRight') {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        }
    });
    
    // Pause auto-play on hover
    const carouselSection = document.querySelector('.carousel-section');
    if (carouselSection) {
        carouselSection.addEventListener('mouseenter', stopAutoPlay);
        carouselSection.addEventListener('mouseleave', startAutoPlay);
    }
    
    // Touch/swipe support for mobile
    let startX = 0;
    let endX = 0;
    
    carousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });
    
    carousel.addEventListener('touchend', (e) => {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
    });
    
    function handleSwipe() {
        const threshold = 50; // minimum distance for swipe
        const distance = startX - endX;
        
        if (Math.abs(distance) > threshold) {
            stopAutoPlay();
            if (distance > 0) {
                // Swipe left - next slide
                nextSlide();
            } else {
                // Swipe right - previous slide
                prevSlide();
            }
            startAutoPlay();
        }
    }
    
    // Initialize the carousel
    initCarousel();
});

// Contact Form Functionality
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const formMessages = document.getElementById('formMessages');
    
    if (!contactForm) return;
    
    // Phone number formatting
    const phoneInput = document.getElementById('contact_phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            let formattedValue = '';
            
            if (value.length > 0) {
                formattedValue = '(' + value.substring(0, 2);
                if (value.length > 2) {
                    formattedValue += ') ' + value.substring(2, 7);
                }
                if (value.length > 7) {
                    formattedValue += ' ' + value.substring(7, 11);
                }
            }
            
            e.target.value = formattedValue;
        });
    }
    
    // Form validation
    function validateForm() {
        const name = document.getElementById('contact_name').value.trim();
        const email = document.getElementById('contact_email').value.trim();
        const phone = document.getElementById('contact_phone').value.trim();
        const message = document.getElementById('contact_message').value.trim();
        
        // Clear previous messages
        formMessages.innerHTML = '';
        formMessages.className = 'form-messages';
        
        // Check required fields
        if (!name || !email || !phone || !message) {
            showMessage('Por favor, preencha todos os campos obrigatórios.', 'error');
            return false;
        }
        
        // Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showMessage('Por favor, insira um email válido.', 'error');
            return false;
        }
        
        // Validate phone (basic validation)
        const phoneDigits = phone.replace(/\D/g, '');
        if (phoneDigits.length < 10) {
            showMessage('Por favor, insira um telefone válido.', 'error');
            return false;
        }
        
        return true;
    }
    
    // Show form messages
    function showMessage(message, type) {
        formMessages.innerHTML = '<p>' + message + '</p>';
        formMessages.className = 'form-messages ' + type;
        formMessages.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    
    // Handle form submission
    contactForm.addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault();
            return;
        }
        
        // Show loading state
        const submitBtn = contactForm.querySelector('.contact-submit-btn');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'ENVIANDO...';
        submitBtn.disabled = true;
        
        // Reset button state after a delay (in case of redirect issues)
        setTimeout(() => {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
    
    // Handle URL parameters for success/error messages
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.get('contact_success')) {
        showMessage('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success');
        // Clear URL parameters
        const newUrl = window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
    
    if (urlParams.get('contact_error')) {
        const errorType = urlParams.get('contact_error');
        let errorMessage = 'Ocorreu um erro ao enviar a mensagem. Tente novamente.';
        
        switch (errorType) {
            case 'required_fields':
                errorMessage = 'Por favor, preencha todos os campos obrigatórios.';
                break;
            case 'invalid_email':
                errorMessage = 'Por favor, insira um email válido.';
                break;
            case 'send_failed':
                errorMessage = 'Falha no envio da mensagem. Tente novamente mais tarde.';
                break;
        }
        
        showMessage(errorMessage, 'error');
        // Clear URL parameters
        const newUrl = window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
    
    // Input focus effects
    const formInputs = contactForm.querySelectorAll('.form-input, .form-textarea');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (this.value === '') {
                this.parentElement.classList.remove('focused');
            }
        });
        
        // Check if input has value on load
        if (input.value !== '') {
            input.parentElement.classList.add('focused');
        }
    });
});

// Additional utility functions
function pauseCarousel() {
    const event = new CustomEvent('pauseCarousel');
    document.dispatchEvent(event);
}

function resumeCarousel() {
    const event = new CustomEvent('resumeCarousel');
    document.dispatchEvent(event);
}