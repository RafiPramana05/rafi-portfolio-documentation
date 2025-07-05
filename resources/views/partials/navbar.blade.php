<nav class="fixed top-0 left-0 right-0 z-50 navbar-blur transition-all duration-300" id="navbar">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold gradient-text">VI</h1>
                <div class="hidden md:flex space-x-8">
                    <a href="{{route('portofolio.home')}}" class="hover:text-blue-400 transition-colors">Home</a>
                    <a href="#about" class="nav-link hover:text-blue-400 transition-colors" data-section="about">About</a>
                    <a href="#skills" class="nav-link hover:text-blue-400 transition-colors" data-section="skills">Skills</a>
                    <a href="#projects" class="nav-link hover:text-blue-400 transition-colors" data-section="projects">Projects</a>
                    <a href="#awards" class="nav-link hover:text-blue-400 transition-colors" data-section="awards">Awards</a>
                    <a href="#contact" class="nav-link hover:text-blue-400 transition-colors" data-section="contact">Contact</a>
                    <a href="{{route('project.index')}}" class="hover:text-blue-400 transition-colors">Projects Page</a>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="musicToggle" class="text-xl hover:text-blue-400 transition-colors">
                        <i class="fas fa-volume-up" id="musicIcon"></i>
                    </button>
                    <button id="mobileMenuToggle" class="md:hidden text-xl hover:text-blue-400 transition-colors">
                        <i class="fas fa-bars" id="menuIcon"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="md:hidden hidden mt-4 space-y-4 bg-gray-800 bg-opacity-95 backdrop-filter backdrop-blur-lg rounded-lg p-4">
                <a href="{{route('portofolio.home')}}" class="block py-2 hover:text-blue-400 transition-colors">Home</a>
                <a href="#about" class="nav-link block py-2 hover:text-blue-400 transition-colors" data-section="about">About</a>
                <a href="#skills" class="nav-link block py-2 hover:text-blue-400 transition-colors" data-section="skills">Skills</a>
                <a href="#projects" class="nav-link block py-2 hover:text-blue-400 transition-colors" data-section="projects">Projects</a>
                <a href="#awards" class="nav-link block py-2 hover:text-blue-400 transition-colors" data-section="awards">Awards</a>
                <a href="#contact" class="nav-link block py-2 hover:text-blue-400 transition-colors" data-section="contact">Contact</a>
                <a href="{{route('project.index')}}" class="block py-2 hover:text-blue-400 transition-colors">Projects Page</a>
            </div>
        </div>
    </nav>

    <script>
        // Navigation handling with proper cleanup
        if (!window.navbarInitialized) {
            window.navbarInitialized = true;

            function handleNavClick(e) {
                e.preventDefault();

                const section = this.getAttribute('data-section');
                const isHomePage = window.location.pathname === '/' || window.location.pathname.includes('/portofolio');
                const isProjectPage = window.location.pathname.includes('/project');
                const isLoginPage = window.location.pathname.includes('/admin/login');

                if (isHomePage) {
                    // If on home page, scroll to section
                    const targetElement = document.getElementById(section);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                } else {
                    // If on other pages (project, login, etc), redirect to home with section hash
                    window.location.href = '{{route("portofolio.home")}}#' + section;
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Get all navigation links with data-section attribute
                const navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    // Remove any existing listeners first
                    link.removeEventListener('click', handleNavClick);
                    // Add the click handler
                    link.addEventListener('click', handleNavClick);
                });

                // Mobile menu toggle
                const mobileMenuToggle = document.getElementById('mobileMenuToggle');
                const mobileMenu = document.getElementById('mobileMenu');
                const menuIcon = document.getElementById('menuIcon');

                if (mobileMenuToggle && mobileMenu) {
                    mobileMenuToggle.addEventListener('click', function() {
                        mobileMenu.classList.toggle('hidden');
                        
                        // Toggle icon
                        if (mobileMenu.classList.contains('hidden')) {
                            menuIcon.className = 'fas fa-bars';
                        } else {
                            menuIcon.className = 'fas fa-times';
                        }
                    });

                    // Close mobile menu when clicking on a link
                    const mobileNavLinks = mobileMenu.querySelectorAll('a');
                    mobileNavLinks.forEach(link => {
                        link.addEventListener('click', function() {
                            mobileMenu.classList.add('hidden');
                            menuIcon.className = 'fas fa-bars';
                        });
                    });
                }
            });
        }
    </script>
