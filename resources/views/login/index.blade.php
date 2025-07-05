@extends('layouts.app')

@section('content')
<style>
    .login-container {
        min-height: calc(100vh - 120px); /* Account for navbar and footer */
        padding-top: 80px; /* Space for fixed navbar */
        padding-bottom: 80px; /* Space for footer */
        background: linear-gradient(135deg, #1a202c 0%, #2d3748 50%, #1a202c 100%);
        position: relative;
        overflow: hidden;
    }

    /* Responsive spacing adjustments */
    @media (max-width: 768px) {
        .login-container {
            min-height: calc(100vh - 100px);
            padding-top: 60px;
            padding-bottom: 60px;
        }
    }

    @media (max-width: 480px) {
        .login-container {
            padding-top: 40px;
            padding-bottom: 40px;
        }
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 1080"><defs><linearGradient id="grad1" x1="0%25" y1="0%25" x2="100%25" y2="100%25"><stop offset="0%25" style="stop-color:%23667eea;stop-opacity:0.15" /><stop offset="100%25" style="stop-color:%23764ba2;stop-opacity:0.15" /></linearGradient></defs><rect width="1920" height="1080" fill="url(%23grad1)"/></svg>');
        animation: backgroundFloat 20s ease-in-out infinite;
    }

    @keyframes backgroundFloat {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-20px) scale(1.02); }
    }

    .login-form {
        animation: slideInUp 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        z-index: 10;
    }

    @keyframes slideInUp {
        0% {
            opacity: 0;
            transform: translateY(60px) scale(0.95);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .admin-logo {
        animation: logoFloat 3s ease-in-out infinite, logoGlow 2s ease-in-out infinite alternate;
        position: relative;
    }

    @keyframes logoFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(5deg); }
    }

    @keyframes logoGlow {
        0% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.4); }
        100% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.8), 0 0 60px rgba(118, 75, 162, 0.4); }
    }

    .input-group {
        animation: fadeInLeft 0.6s ease-out;
        animation-fill-mode: both;
    }

    .input-group:nth-child(1) { animation-delay: 0.2s; }
    .input-group:nth-child(2) { animation-delay: 0.4s; }

    @keyframes fadeInLeft {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .login-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform: translateY(0);
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .login-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.6s;
    }

    .login-btn:hover::before {
        left: 100%;
    }

    .login-btn:hover {
        background: linear-gradient(135deg, #5a6fd8 0%, #6d4299 100%);
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4), 0 5px 15px rgba(0,0,0,0.1);
    }

    .login-btn:active {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .back-link {
        animation: fadeIn 1s ease-out 0.8s both;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        transform: translateX(-5px);
        color: #60a5fa !important;
    }

    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    .form-input {
        transition: all 0.3s ease;
        position: relative;
    }

    .form-input:focus {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
    }

    .alert-animate {
        animation: alertSlide 0.5s ease-out;
    }

    @keyframes alertSlide {
        0% {
            opacity: 0;
            transform: translateY(-20px) scale(0.95);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
</style>

<div class="login-container flex items-center justify-center">
    <!-- Floating Particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="glass max-w-md w-full mx-4 p-6 sm:p-8 rounded-2xl login-form mb-8">
        <div class="text-center mb-6 sm:mb-8">
            <div class="admin-logo w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center">
                <i class="fas fa-user-shield text-2xl sm:text-3xl text-white"></i>
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold gradient-text mb-2">Admin Login</h2>
            <p class="text-sm sm:text-base text-gray-400">Masuk ke panel admin untuk mengelola projects</p>
        </div>

        @if(session('success'))
            <div class="alert-animate bg-green-500 bg-opacity-20 text-green-300 p-4 rounded-lg mb-6 border border-green-500 border-opacity-50">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-animate bg-red-500 bg-opacity-20 text-red-300 p-4 rounded-lg mb-6 border border-red-500 border-opacity-50">
                @foreach($errors->all() as $error)
                    <p><i class="fas fa-exclamation-circle mr-2"></i>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4 sm:space-y-6">
            @csrf

            <div class="input-group">
                <label for="username" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-user mr-1"></i>Username
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input id="username" name="username" type="text" required
                           class="form-input w-full pl-10 pr-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400"
                           placeholder="Masukkan username" value="{{ old('username') }}">
                </div>
            </div>

            <div class="input-group">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-lock mr-1"></i>Password
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input id="password" name="password" type="password" required
                           class="form-input w-full pl-10 pr-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400"
                           placeholder="Masukkan password">
                </div>
            </div>

            <button type="submit" class="login-btn w-full text-white py-4 rounded-lg font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <span class="relative z-10">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk
                </span>
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('project.index') }}" class="back-link text-blue-400 hover:text-blue-300 inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Halaman Project
            </a>
        </div>
    </div>
</div>

<script>
    // Add loading state to login button
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.querySelector('form');
        const loginBtn = document.querySelector('.login-btn');
        const btnText = loginBtn.querySelector('span');
        const originalText = btnText.innerHTML;

        loginForm.addEventListener('submit', function() {
            loginBtn.disabled = true;
            loginBtn.style.opacity = '0.8';
            btnText.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Masuk...';

            // Re-enable after 5 seconds as fallback
            setTimeout(() => {
                loginBtn.disabled = false;
                loginBtn.style.opacity = '1';
                btnText.innerHTML = originalText;
            }, 5000);
        });

        // Add ripple effect to button
        loginBtn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple-effect');

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
</script>

<style>
    .ripple-effect {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.05);
        position: relative;
    }

    .glass::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: inherit;
        background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0.1) 100%);
        pointer-events: none;
    }

    .gradient-text {
        background: linear-gradient(135deg, #6c78ff 0%, #c181f6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
        z-index: 1;
    }

    .particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        background: rgba(102, 126, 234, 0.6);
        border-radius: 50%;
        animation: particle-float 6s infinite ease-in-out;
    }

    .particle:nth-child(1) {
        width: 4px;
        height: 4px;
        left: 10%;
        animation-delay: 0s;
        animation-duration: 8s;
    }

    .particle:nth-child(2) {
        width: 6px;
        height: 6px;
        left: 70%;
        animation-delay: 1s;
        animation-duration: 10s;
    }

    .particle:nth-child(3) {
        width: 3px;
        height: 3px;
        left: 40%;
        animation-delay: 2s;
        animation-duration: 7s;
    }

    .particle:nth-child(4) {
        width: 5px;
        height: 5px;
        left: 90%;
        animation-delay: 3s;
        animation-duration: 9s;
    }

    @keyframes particle-float {
        0%, 100% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }
</style>
@endsection
