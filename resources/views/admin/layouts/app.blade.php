<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6d4299 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #6b7280;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .btn-secondary:hover {
            background: #4b5563;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(75, 85, 99, 0.4);
        }

        .btn-danger {
            background: #ef4444;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .btn-success {
            background: #10b981;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .btn-edit {
            color: #60a5fa;
            transition: all 0.3s ease;
            transform: scale(1);
            display: inline-block;
            vertical-align: middle;
            text-decoration: none;
        }

        .btn-edit:hover {
            color: #3b82f6;
            transform: scale(1.2);
            filter: drop-shadow(0 0 8px rgba(96, 165, 250, 0.6));
        }

        .btn-delete {
            color: #f87171;
            transition: all 0.3s ease;
            transform: scale(1);
            background: none;
            border: none;
            cursor: pointer;
            display: inline-block;
            vertical-align: baseline;
            padding: 0;
            margin: 0;
            margin-top: 15px;
        }

        .btn-delete:hover {
            color: #ef4444;
            transform: scale(1.2);
            filter: drop-shadow(0 0 8px rgba(248, 113, 113, 0.6));
        }

        .btn-status {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .btn-status:hover {
            transform: translateY(-1px);
            filter: brightness(1.1);
        }

        .nav-link-hover {
            transition: all 0.3s ease;
            transform: translateX(0);
        }

        .nav-link-hover:hover {
            transform: translateX(5px);
            background: rgba(255, 255, 255, 0.1);
        }

        .quick-action-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(0) scale(1);
        }

        .quick-action-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* Add Project Button Animations */
        .add-project-btn {
            position: relative;
            overflow: hidden;
        }

        .add-project-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .add-project-btn:hover::before {
            left: 100%;
        }

        .plus-icon {
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            color: #60a5fa;
        }

        .add-project-btn:hover .plus-icon {
            transform: rotate(180deg) scale(1.2);
            color: #3b82f6;
            filter: drop-shadow(0 0 8px rgba(59, 130, 246, 0.6));
        }

        .add-project-btn:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        /* Mobile menu responsive styles */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }

        .main-content {
            margin-left: 256px; /* Width of sidebar */
            transition: margin-left 0.3s ease;
        }

        @media (min-width: 768px) {
            .main-content {
                margin-left: 256px;
            }
        }
    </style>
</head>
<body class="bg-gray-900 text-white" style="background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 1080"><defs><linearGradient id="grad1" x1="0%25" y1="0%25" x2="100%25" y2="100%25"><stop offset="0%25" style="stop-color:%23667eea;stop-opacity:0.1" /><stop offset="100%25" style="stop-color:%23764ba2;stop-opacity:0.1" /></linearGradient></defs><rect width="1920" height="1080" fill="url(%23grad1)"/></svg>

    <!-- Navigation -->
    <nav class="glass border-b border-gray-800">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold gradient-text">
                        <i class="fas fa-cog mr-2"></i>
                        Admin Panel
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="{{ route('project.index') }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-external-link-alt mr-1"></i>
                            View Site
                        </a>
                        <div class="text-gray-300">
                            <i class="fas fa-user mr-1"></i>
                            {{ session('admin_name') }}
                        </div>
                        <a href="{{ route('admin.logout') }}" class="text-red-400 hover:text-red-300 transition-colors">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout
                        </a>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <button id="mobileMenuToggle" class="md:hidden text-xl hover:text-blue-400 transition-colors">
                        <i class="fas fa-bars" id="menuIcon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenuOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="fixed left-0 top-16 bottom-0 w-64 glass z-50 transform -translate-x-full transition-transform duration-300 md:hidden">
        <div class="p-6">
            <!-- Mobile User Info -->
            <div class="mb-6 pb-4 border-b border-gray-700">
                <div class="text-gray-300 mb-2">
                    <i class="fas fa-user mr-2"></i>
                    {{ session('admin_name') }}
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('project.index') }}" target="_blank" class="text-sm text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-external-link-alt mr-1"></i>
                        View Site
                    </a>
                    <a href="{{ route('admin.logout') }}" class="text-sm text-red-400 hover:text-red-300 transition-colors">
                        <i class="fas fa-sign-out-alt mr-1"></i>
                        Logout
                    </a>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-home mr-3"></i>
                Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.projects.index') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-project-diagram mr-3"></i>
                <span class="flex-1">All Projects</span>
                </a>

                <a href="{{ route('admin.messages.index') }}" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.messages.*') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-envelope mr-3"></i>
                <span class="flex-1">Messages</span>
                @if(\App\Models\Contact::unread()->count() > 0)
                    <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full font-semibold ml-2 animate-pulse">
                        {{ \App\Models\Contact::unread()->count() }}
                    </span>
                @endif
                </a>

                <a href="{{ route('admin.projects.create') }}" class="nav-link-hover add-project-btn flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.projects.create') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-plus mr-3 plus-icon"></i>
                <span class="flex-1">Add New Project</span>
                </a>

                <hr class="my-4 border-gray-700">

                <a href="{{ route('project.index') }}" target="_blank" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300">
                <i class="fas fa-external-link-alt mr-3"></i>
                View Website
                </a>
            </nav>
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="hidden md:block fixed left-0 top-16 bottom-0 w-64 glass z-30">
        <div class="p-6">
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-home mr-3"></i>
                Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.projects.index') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-project-diagram mr-3"></i>
                <span class="flex-1">All Projects</span>
                </a>

                <a href="{{ route('admin.messages.index') }}" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.messages.*') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-envelope mr-3"></i>
                <span class="flex-1">Messages</span>
                @if(\App\Models\Contact::unread()->count() > 0)
                    <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full font-semibold ml-2 animate-pulse">
                        {{ \App\Models\Contact::unread()->count() }}
                    </span>
                @endif
                </a>

                <a href="{{ route('admin.projects.create') }}" class="nav-link-hover add-project-btn flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300 {{ request()->routeIs('admin.projects.create') ? 'bg-gray-800 bg-opacity-50 text-white' : '' }}">
                <i class="fas fa-plus mr-3 plus-icon"></i>
                <span class="flex-1">Add New Project</span>
                </a>

                <hr class="my-4 border-gray-700">

                <a href="{{ route('project.index') }}" target="_blank" class="nav-link-hover flex items-center px-4 py-3 text-gray-300 hover:text-white rounded-lg transition-all duration-300">
                <i class="fas fa-external-link-alt mr-3"></i>
                View Website
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content min-h-screen pt-5">
        <!-- Include Alert System -->
        @include('components.alert-system')

        <!-- Auto-show session messages -->
        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('{{ session('success') }}', 'success');
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('{{ session('error') }}', 'error');
                });
            </script>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-8 bg-black">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-400">© {{ date('Y') }} Rafi Pramana Putra. All rights reserved.</p>
            <p class="text-gray-500 text-sm mt-2">Built with Laravel & Tailwind CSS</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
            const menuIcon = document.getElementById('menuIcon');

            if (mobileMenuToggle && mobileMenu) {
                // Toggle mobile menu
                mobileMenuToggle.addEventListener('click', function() {
                    const isMenuOpen = !mobileMenu.classList.contains('-translate-x-full');

                    if (isMenuOpen) {
                        // Close menu
                        closeMobileMenu();
                    } else {
                        // Open menu
                        openMobileMenu();
                    }
                });

                // Close menu when clicking overlay
                mobileMenuOverlay.addEventListener('click', function() {
                    closeMobileMenu();
                });

                // Close menu when clicking on navigation links
                const mobileNavLinks = mobileMenu.querySelectorAll('a');
                mobileNavLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        closeMobileMenu();
                    });
                });

                function openMobileMenu() {
                    mobileMenu.classList.remove('-translate-x-full');
                    mobileMenuOverlay.classList.remove('hidden');
                    menuIcon.className = 'fas fa-times';
                    document.body.style.overflow = 'hidden'; // Prevent body scroll
                }

                function closeMobileMenu() {
                    mobileMenu.classList.add('-translate-x-full');
                    mobileMenuOverlay.classList.add('hidden');
                    menuIcon.className = 'fas fa-bars';
                    document.body.style.overflow = ''; // Restore body scroll
                }

                // Close menu on window resize if screen becomes larger
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 768) { // md breakpoint
                        closeMobileMenu();
                    }
                });
            }
        });
    </script>
</body>
</html>
