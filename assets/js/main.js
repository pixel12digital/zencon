// Main JavaScript for Zencom Telecom Website

document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navMobile = document.querySelector('.nav-mobile');
    if (mobileToggle && navMobile) {
        mobileToggle.addEventListener('click', function() {
            navMobile.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });
        navMobile.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMobile.classList.remove('active');
                mobileToggle.classList.remove('active');
            });
        });
    }
});

function initializeApp() {
    setupHeader();
    setupMobileMenu();
    setupSmoothScrolling();
    setupAnimations();
    setupFormValidation();
    setupWhatsAppButton();
    setupScrollEffects();
}

// ===== HEADER E NAVEGAÇÃO =====
function setupHeader() {
    const header = document.querySelector('.header');
    let lastScrollTop = 0;

    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Adicionar classe scrolled quando rolar
        if (scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Efeito de hide/show no scroll
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    });
}

// ===== MENU MOBILE =====
function setupMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navMobile = document.querySelector('.nav-mobile');
    const navLinks = document.querySelectorAll('.nav-link');

    if (mobileToggle && navMobile) {
        mobileToggle.addEventListener('click', function() {
            navMobile.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });

        navMobile.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMobile.classList.remove('active');
                mobileToggle.classList.remove('active');
            });
        });

        // Fechar menu ao clicar fora
        document.addEventListener('click', (e) => {
            if (!navMobile.contains(e.target) && !mobileToggle.contains(e.target)) {
                navMobile.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        });
    }
}

// ===== SCROLL SUAVE =====
function setupSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ===== ANIMAÇÕES =====
function setupAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Elementos para animar
    const animatedElements = document.querySelectorAll('.frase-impacto, .planos-combos, .entretenimentos, .central-cliente, .sobre-nos, .contato');
    
    animatedElements.forEach(el => {
        el.classList.add('fade-in-up');
        observer.observe(el);
    });

    // Animar cards de planos quando implementados
    const planCards = document.querySelectorAll('.plan-card, .combo-card');
    planCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        observer.observe(card);
    });
}

// ===== VALIDAÇÃO DE FORMULÁRIO =====
function setupFormValidation() {
    const form = document.querySelector('.contato-form');
    
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            
            // Validação básica
            if (validateForm(data)) {
                submitForm(data);
            }
        });

        // Validação em tempo real
        const inputs = form.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', () => {
                validateField(input);
            });
            
            input.addEventListener('input', () => {
                clearFieldError(input);
            });
        });
    }
}

function validateForm(data) {
    let isValid = true;
    
    if (!data.nome || data.nome.trim().length < 2) {
        showFieldError('nome', 'Nome deve ter pelo menos 2 caracteres');
        isValid = false;
    }
    
    if (!data.email || !isValidEmail(data.email)) {
        showFieldError('email', 'E-mail inválido');
        isValid = false;
    }
    
    if (!data.telefone || data.telefone.trim().length < 10) {
        showFieldError('telefone', 'Telefone inválido');
        isValid = false;
    }
    
    if (!data.mensagem || data.mensagem.trim().length < 10) {
        showFieldError('mensagem', 'Mensagem deve ter pelo menos 10 caracteres');
        isValid = false;
    }
    
    return isValid;
}

function validateField(field) {
    const value = field.value.trim();
    const fieldName = field.name;
    
    switch (fieldName) {
        case 'nome':
            if (value.length < 2) {
                showFieldError(fieldName, 'Nome deve ter pelo menos 2 caracteres');
                return false;
            }
            break;
        case 'email':
            if (!isValidEmail(value)) {
                showFieldError(fieldName, 'E-mail inválido');
                return false;
            }
            break;
        case 'telefone':
            if (value.length < 10) {
                showFieldError(fieldName, 'Telefone inválido');
                return false;
            }
            break;
        case 'mensagem':
            if (value.length < 10) {
                showFieldError(fieldName, 'Mensagem deve ter pelo menos 10 caracteres');
                return false;
            }
            break;
    }
    
    clearFieldError(fieldName);
    return true;
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showFieldError(fieldName, message) {
    const field = document.querySelector(`[name="${fieldName}"]`);
    if (field) {
        field.classList.add('error');
        
        // Remover mensagem de erro anterior
        const existingError = field.parentNode.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
        
        // Adicionar nova mensagem de erro
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        errorDiv.style.color = '#dc2626';
        errorDiv.style.fontSize = '0.875rem';
        errorDiv.style.marginTop = '0.25rem';
        
        field.parentNode.appendChild(errorDiv);
    }
}

function clearFieldError(fieldName) {
    const field = document.querySelector(`[name="${fieldName}"]`);
    if (field) {
        field.classList.remove('error');
        const errorMessage = field.parentNode.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }
}

function submitForm(data) {
    // Simular envio do formulário
    const submitBtn = document.querySelector('.contato-form .btn');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Enviando...';
    submitBtn.disabled = true;
    
    // Simular delay de envio
    setTimeout(() => {
        showMessage('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success');
        document.querySelector('.contato-form').reset();
        
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 2000);
}

function showMessage(message, type) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}`;
    messageDiv.textContent = message;
    messageDiv.style.padding = '1rem';
    messageDiv.style.borderRadius = '8px';
    messageDiv.style.marginBottom = '1rem';
    messageDiv.style.textAlign = 'center';
    
    if (type === 'success') {
        messageDiv.style.backgroundColor = '#d1fae5';
        messageDiv.style.color = '#065f46';
        messageDiv.style.border = '1px solid #a7f3d0';
    } else {
        messageDiv.style.backgroundColor = '#fee2e2';
        messageDiv.style.color = '#991b1b';
        messageDiv.style.border = '1px solid #fecaca';
    }
    
    const form = document.querySelector('.contato-form');
    form.parentNode.insertBefore(messageDiv, form);
    
    // Remover mensagem após 5 segundos
    setTimeout(() => {
        messageDiv.remove();
    }, 5000);
}

// ===== BOTÃO WHATSAPP =====
function setupWhatsAppButton() {
    // Criar botão flutuante do WhatsApp se não existir
    if (!document.querySelector('.whatsapp-float')) {
        const whatsappBtn = document.createElement('a');
        whatsappBtn.href = 'https://wa.me/5511986386542?text=Olá! Gostaria de saber mais sobre os planos da Zencom Telecom.';
        whatsappBtn.className = 'whatsapp-float';
        whatsappBtn.target = '_blank';
        whatsappBtn.rel = 'noopener';
        whatsappBtn.innerHTML = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
            </svg>
        `;
        
        document.body.appendChild(whatsappBtn);
    }
}

// ===== EFEITOS DE SCROLL =====
function setupScrollEffects() {
    // Parallax suave para elementos
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax');
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    // Contador animado
    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.dataset.target);
                const duration = 2000; // 2 segundos
                const increment = target / (duration / 16); // 60fps
                let current = 0;
                
                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                
                updateCounter();
                counterObserver.unobserve(counter);
            }
        });
    });
    
    counters.forEach(counter => counterObserver.observe(counter));
}

// ===== UTILITÁRIOS =====
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ===== CSS ADICIONAL DINÂMICO =====
const additionalCSS = `
    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background: #25d366;
        color: white;
        border-radius: 50%;
        text-align: center;
        font-size: 30px;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        animation: pulse 2s infinite;
    }

    .whatsapp-float:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        color: white;
    }

    @keyframes pulse {
        0% { box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4); }
        50% { box-shadow: 0 4px 25px rgba(37, 211, 102, 0.8); }
        100% { box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4); }
    }

    .nav.active {
        display: flex !important;
        position: fixed;
        top: 70px;
        left: 0;
        width: 100vw;
        height: calc(100vh - 70px);
        z-index: 2500;
        background: rgba(30, 58, 138, 0.98);
        flex-direction: column;
        padding: 1rem 0;
        box-shadow: var(--shadow-lg);
    }

    .nav.active .nav-list {
        flex-direction: column;
        gap: 0;
    }

    .nav.active .nav-link {
        padding: 1rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav.active .nav-link:last-child {
        border-bottom: none;
    }

    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
    }

    .fade-in-up.animate-in {
        opacity: 1;
        transform: translateY(0);
    }

    .error {
        border-color: #dc2626 !important;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1) !important;
    }

    .header {
        transition: all 0.3s ease;
    }
`;

// Injetar CSS adicional
const style = document.createElement('style');
style.textContent = additionalCSS;
document.head.appendChild(style);

// Menu Mobile
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navMobile = document.querySelector('.nav-mobile');
    
    if (mobileToggle && navMobile) {
        mobileToggle.addEventListener('click', function() {
            navMobile.classList.toggle('active');
        });
    }
    
    // Scroll suave com offset do header fixo
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#home') {
                window.location.reload();
                return;
            }
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const header = document.querySelector('.header');
                const headerHeight = header ? header.offsetHeight : 0;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 10;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// ===== ACCORDION APPS/STREAMINGS =====
document.addEventListener('DOMContentLoaded', function() {
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            const openItem = item.parentElement.querySelector('.accordion-item.open');
            if (openItem && openItem !== item) {
                openItem.classList.remove('open');
                openItem.querySelector('.accordion-header').classList.remove('active');
            }
            item.classList.toggle('open');
            this.classList.toggle('active');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('formContatoApp');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var nome = form.nome.value.trim();
            var telefone = form.telefone.value.trim();
            var assunto = form.assunto.value;
            var mensagem = form.mensagem.value.trim();
            var texto = `Olá! Gostaria de falar sobre: *${assunto}*\n\n*Nome:* ${nome}\n*Telefone:* ${telefone}`;
            if (mensagem) texto += `\n*Mensagem:* ${mensagem}`;
            var foneZap = '5511986386492'; // Altere para o número desejado
            var url = `https://wa.me/${foneZap}?text=${encodeURIComponent(texto)}`;
            window.open(url, '_blank');
        });
    }
}); 