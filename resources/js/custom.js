// Custom JavaScript untuk AquaVie

// Document Ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('AquaVie Loaded!');
    
    // Initialize tooltips if any
    initTooltips();
    
    // Initialize smooth scrolling
    initSmoothScroll();
    
    // Auto-hide alerts after 5 seconds
    autoHideAlerts();
});

// Smooth Scrolling for anchor links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

// Initialize tooltips
function initTooltips() {
    const tooltips = document.querySelectorAll('[data-tooltip]');
    tooltips.forEach(element => {
        element.addEventListener('mouseenter', function() {
            showTooltip(this);
        });
        element.addEventListener('mouseleave', function() {
            hideTooltip(this);
        });
    });
}

function showTooltip(element) {
    const text = element.getAttribute('data-tooltip');
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip';
    tooltip.textContent = text;
    tooltip.style.position = 'absolute';
    tooltip.style.background = '#333';
    tooltip.style.color = 'white';
    tooltip.style.padding = '8px 12px';
    tooltip.style.borderRadius = '6px';
    tooltip.style.fontSize = '14px';
    tooltip.style.zIndex = '1000';
    tooltip.style.pointerEvents = 'none';
    
    document.body.appendChild(tooltip);
    
    const rect = element.getBoundingClientRect();
    tooltip.style.top = (rect.top - tooltip.offsetHeight - 8) + 'px';
    tooltip.style.left = (rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2)) + 'px';
    
    element._tooltip = tooltip;
}

function hideTooltip(element) {
    if (element._tooltip) {
        element._tooltip.remove();
        delete element._tooltip;
    }
}

// Auto-hide alerts
function autoHideAlerts() {
    const alerts = document.querySelectorAll('.alert-auto-hide, [role="alert"]');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 5000);
    });
}

// Show Toast Notification
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast fixed top-4 right-4 max-w-sm bg-white p-4 rounded-lg shadow-xl z-50 flex items-center gap-3`;
    
    let icon = '';
    let colorClass = '';
    
    switch(type) {
        case 'success':
            icon = `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>`;
            colorClass = 'border-l-4 border-green-500';
            break;
        case 'error':
            icon = `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>`;
            colorClass = 'border-l-4 border-red-500';
            break;
        case 'warning':
            icon = `<svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>`;
            colorClass = 'border-l-4 border-yellow-500';
            break;
        case 'info':
            icon = `<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>`;
            colorClass = 'border-l-4 border-blue-500';
            break;
    }
    
    toast.className += ` ${colorClass}`;
    toast.innerHTML = `
        ${icon}
        <span class="text-gray-800">${message}</span>
        <button onclick="this.parentElement.remove()" class="ml-auto">
            <svg class="w-5 h-5 text-gray-500 hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    `;
    
    document.body.appendChild(toast);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        toast.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            toast.remove();
        }, 500);
    }, 5000);
}

// Confirm Dialog
function confirmDialog(message, callback) {
    const result = confirm(message);
    if (result && callback) {
        callback();
    }
    return result;
}

// Loading Spinner
function showLoading() {
    const loader = document.createElement('div');
    loader.id = 'globalLoader';
    loader.className = 'fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50';
    loader.innerHTML = `
        <div class="bg-white rounded-2xl p-8 shadow-2xl">
            <div class="spinner border-4 border-teal-200 border-t-teal-600 rounded-full w-16 h-16 animate-spin"></div>
            <p class="mt-4 text-gray-700 text-center">Loading...</p>
        </div>
    `;
    document.body.appendChild(loader);
}

function hideLoading() {
    const loader = document.getElementById('globalLoader');
    if (loader) {
        loader.remove();
    }
}

// Format Number with separator
function formatNumber(number) {
    return new Intl.NumberFormat('id-ID').format(number);
}

// Format Currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
}

// Format Date
function formatDate(date) {
    const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    return new Date(date).toLocaleDateString('id-ID', options);
}

// Debounce Function
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

// Copy to Clipboard
function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Teks berhasil disalin!', 'success');
        }).catch(() => {
            showToast('Gagal menyalin teks', 'error');
        });
    } else {
        // Fallback for older browsers
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        try {
            document.execCommand('copy');
            showToast('Teks berhasil disalin!', 'success');
        } catch (err) {
            showToast('Gagal menyalin teks', 'error');
        }
        document.body.removeChild(textarea);
    }
}

// Validate Email
function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Validate Phone Number (Indonesian format)
function isValidPhone(phone) {
    const re = /^(\+62|62|0)[0-9]{9,12}$/;
    return re.test(phone.replace(/\s/g, ''));
}

// Export functions to window object for global access
window.showToast = showToast;
window.confirmDialog = confirmDialog;
window.showLoading = showLoading;
window.hideLoading = hideLoading;
window.formatNumber = formatNumber;
window.formatCurrency = formatCurrency;
window.formatDate = formatDate;
window.copyToClipboard = copyToClipboard;
window.isValidEmail = isValidEmail;
window.isValidPhone = isValidPhone;
window.debounce = debounce;