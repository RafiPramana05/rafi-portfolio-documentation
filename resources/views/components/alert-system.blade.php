<!-- Modern Alert System Component -->
<div id="alert-container" class="fixed top-4 right-4 z-50 max-w-sm w-full space-y-2">
    <!-- Toast notifications will be injected here -->
</div>

<!-- Confirmation Modal -->
<div id="confirmation-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95 opacity-0" id="modal-content">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 dark:bg-red-900 rounded-full">
                <i id="modal-icon" class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-xl"></i>
            </div>
            <h3 id="modal-title" class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">
                Confirm Action
            </h3>
            <p id="modal-message" class="text-sm text-gray-600 dark:text-gray-300 text-center mb-6">
                Are you sure you want to proceed?
            </p>
            <div class="flex gap-3">
                <button id="modal-cancel" class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                    Cancel
                </button>
                <button id="modal-confirm" class="flex-1 px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 transition-colors duration-200">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Toast Animations */
@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: scale(1);
    }
    to {
        opacity: 0;
        transform: scale(0.95);
    }
}

.toast-enter {
    animation: slideInRight 0.3s ease-out;
}

.toast-exit {
    animation: slideOutRight 0.3s ease-in;
}

.modal-enter {
    animation: fadeIn 0.3s ease-out;
}

.modal-exit {
    animation: fadeOut 0.3s ease-in;
}

/* Progress bar for auto-dismiss */
.toast-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    background-color: rgba(255, 255, 255, 0.3);
    animation: progressBar 5s linear;
}

@keyframes progressBar {
    from {
        width: 100%;
    }
    to {
        width: 0%;
    }
}

/* Glassmorphism effect */
.glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Hover effects */
.toast-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

/* Button pulse effect */
.pulse-on-hover:hover {
    animation: pulse 0.5s ease-in-out;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}
</style>

<script>
class AlertSystem {
    constructor() {
        this.container = document.getElementById('alert-container');
        this.modal = document.getElementById('confirmation-modal');
        this.modalContent = document.getElementById('modal-content');
        this.modalIcon = document.getElementById('modal-icon');
        this.modalTitle = document.getElementById('modal-title');
        this.modalMessage = document.getElementById('modal-message');
        this.modalCancel = document.getElementById('modal-cancel');
        this.modalConfirm = document.getElementById('modal-confirm');
        
        this.initializeEventListeners();
    }

    initializeEventListeners() {
        // Close modal when clicking outside
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.hideModal();
            }
        });

        // Cancel button
        this.modalCancel.addEventListener('click', () => {
            this.hideModal();
        });

        // Escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !this.modal.classList.contains('hidden')) {
                this.hideModal();
            }
        });
    }

    showToast(message, type = 'info', duration = 5000) {
        const toast = document.createElement('div');
        
        const typeStyles = {
            success: {
                bg: 'bg-green-500',
                text: 'text-white',
                icon: 'fas fa-check-circle'
            },
            error: {
                bg: 'bg-red-500',
                text: 'text-white',
                icon: 'fas fa-exclamation-circle'
            },
            warning: {
                bg: 'bg-yellow-500',
                text: 'text-white',
                icon: 'fas fa-exclamation-triangle'
            },
            info: {
                bg: 'bg-blue-500',
                text: 'text-white',
                icon: 'fas fa-info-circle'
            }
        };

        const style = typeStyles[type] || typeStyles.info;
        
        toast.className = `relative ${style.bg} ${style.text} p-4 rounded-lg shadow-lg cursor-pointer toast-hover transition-all duration-300 toast-enter`;
        toast.innerHTML = `
            <div class="flex items-center">
                <i class="${style.icon} mr-3"></i>
                <span class="flex-1 text-sm font-medium">${message}</span>
                <button class="ml-4 text-white hover:text-gray-200 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="toast-progress"></div>
        `;

        // Add close functionality
        const closeBtn = toast.querySelector('button');
        closeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            this.removeToast(toast);
        });

        // Add click to dismiss
        toast.addEventListener('click', () => {
            this.removeToast(toast);
        });

        this.container.appendChild(toast);

        // Auto remove after duration
        if (duration > 0) {
            setTimeout(() => {
                this.removeToast(toast);
            }, duration);
        }

        return toast;
    }

    removeToast(toast) {
        toast.classList.remove('toast-enter');
        toast.classList.add('toast-exit');
        
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }

    showConfirmation(options = {}) {
        const {
            title = 'Confirm Action',
            message = 'Are you sure you want to proceed?',
            confirmText = 'Confirm',
            cancelText = 'Cancel',
            type = 'danger',
            onConfirm = () => {},
            onCancel = () => {}
        } = options;

        const typeStyles = {
            danger: {
                icon: 'fas fa-exclamation-triangle',
                iconBg: 'bg-red-100 dark:bg-red-900',
                iconColor: 'text-red-600 dark:text-red-400',
                confirmBg: 'bg-red-600 hover:bg-red-700'
            },
            warning: {
                icon: 'fas fa-exclamation-triangle',
                iconBg: 'bg-yellow-100 dark:bg-yellow-900',
                iconColor: 'text-yellow-600 dark:text-yellow-400',
                confirmBg: 'bg-yellow-600 hover:bg-yellow-700'
            },
            info: {
                icon: 'fas fa-info-circle',
                iconBg: 'bg-blue-100 dark:bg-blue-900',
                iconColor: 'text-blue-600 dark:text-blue-400',
                confirmBg: 'bg-blue-600 hover:bg-blue-700'
            }
        };

        const style = typeStyles[type] || typeStyles.danger;

        // Update modal content
        this.modalIcon.className = `${style.icon} ${style.iconColor} text-xl`;
        this.modalIcon.parentElement.className = `flex items-center justify-center w-12 h-12 mx-auto mb-4 ${style.iconBg} rounded-full`;
        this.modalTitle.textContent = title;
        this.modalMessage.textContent = message;
        this.modalConfirm.textContent = confirmText;
        this.modalCancel.textContent = cancelText;
        this.modalConfirm.className = `flex-1 px-4 py-2 text-sm font-medium text-white ${style.confirmBg} border border-transparent rounded-md transition-colors duration-200 pulse-on-hover`;

        // Set up event listeners
        const confirmHandler = () => {
            onConfirm();
            this.hideModal();
            this.modalConfirm.removeEventListener('click', confirmHandler);
        };

        const cancelHandler = () => {
            onCancel();
            this.hideModal();
            this.modalCancel.removeEventListener('click', cancelHandler);
        };

        this.modalConfirm.addEventListener('click', confirmHandler);
        this.modalCancel.addEventListener('click', cancelHandler);

        // Show modal
        this.modal.classList.remove('hidden');
        this.modalContent.classList.add('modal-enter');
        this.modalContent.classList.remove('scale-95', 'opacity-0');
        this.modalContent.classList.add('scale-100', 'opacity-100');
    }

    hideModal() {
        this.modalContent.classList.add('modal-exit');
        this.modalContent.classList.remove('scale-100', 'opacity-100');
        this.modalContent.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            this.modal.classList.add('hidden');
            this.modalContent.classList.remove('modal-enter', 'modal-exit');
        }, 300);
    }
}

// Initialize the alert system
window.alertSystem = new AlertSystem();

// Global helper functions
window.showToast = (message, type = 'info', duration = 5000) => {
    return window.alertSystem.showToast(message, type, duration);
};

window.showConfirmation = (options) => {
    return window.alertSystem.showConfirmation(options);
};

// Replace default confirm and alert
window.customConfirm = (message, callback) => {
    showConfirmation({
        message: message,
        onConfirm: () => callback(true),
        onCancel: () => callback(false)
    });
};

window.customAlert = (message, type = 'info') => {
    showToast(message, type);
};
</script>
