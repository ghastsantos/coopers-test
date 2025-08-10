document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-track');
    const pages = document.querySelectorAll('.carousel-page');
    const navDots = document.querySelectorAll('.nav-dot');
    
    if (!carousel || pages.length === 0) return;
    
    let currentPage = 0;
    let isTransitioning = false;
    
    function initCarousel() {
        showPage(0);
    }
    
    function showPage(index) {
        if (isTransitioning) return;
        
        isTransitioning = true;
        
        pages.forEach(page => page.classList.remove('active'));
        navDots.forEach(dot => {
            dot.classList.remove('active');
            dot.blur();
        });
        
        if (pages[index]) {
            pages[index].classList.add('active');
            currentPage = index;
        }
        
        if (navDots[index]) {
            navDots[index].classList.add('active');
        }
        
        setTimeout(() => {
            isTransitioning = false;
        }, 500);
    }
    
    function nextPage() {
        const next = (currentPage + 1) % pages.length;
        showPage(next);
    }
    
    function prevPage() {
        const prev = (currentPage - 1 + pages.length) % pages.length;
        showPage(prev);
    }
    
    navDots.forEach((dot, index) => {
        dot.addEventListener('click', (e) => {
            e.preventDefault();
            dot.blur();
            showPage(index);
        });
    });
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevPage();
        } else if (e.key === 'ArrowRight') {
            nextPage();
        }
    });

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
        const threshold = 50;
        const distance = startX - endX;
        
        if (Math.abs(distance) > threshold) {
            if (distance > 0) {
                nextPage();
            } else {
                prevPage();
            }
        }
    }
    
    initCarousel();
});

document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const formMessages = document.getElementById('formMessages');
    
    if (!contactForm) return;
    
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
    
    function validateForm() {
        const name = document.getElementById('contact_name').value.trim();
        const email = document.getElementById('contact_email').value.trim();
        const phone = document.getElementById('contact_phone').value.trim();
        const message = document.getElementById('contact_message').value.trim();
        
        formMessages.innerHTML = '';
        formMessages.className = 'form-messages';
        
        if (!name || !email || !phone || !message) {
            showMessage('Por favor, preencha todos os campos obrigatórios.', 'error');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showMessage('Por favor, insira um email válido.', 'error');
            return false;
        }
        
        const phoneDigits = phone.replace(/\D/g, '');
        if (phoneDigits.length < 10) {
            showMessage('Por favor, insira um telefone válido.', 'error');
            return false;
        }
        
        return true;
    }
    
    function showMessage(message, type) {
        formMessages.innerHTML = '<p>' + message + '</p>';
        formMessages.className = 'form-messages ' + type;
        formMessages.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    
    contactForm.addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault();
            return;
        }
        
        const submitBtn = contactForm.querySelector('.contact-submit-btn');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'ENVIANDO...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
    
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.get('contact_success')) {
        showMessage('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success');
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
        const newUrl = window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
    
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
        
        if (input.value !== '') {
            input.parentElement.classList.add('focused');
        }
    });
});

function pauseCarousel() {
    const event = new CustomEvent('pauseCarousel');
    document.dispatchEvent(event);
}

function resumeCarousel() {
    const event = new CustomEvent('resumeCarousel');
    document.dispatchEvent(event);
}