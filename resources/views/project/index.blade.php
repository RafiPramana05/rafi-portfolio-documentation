@extends('layouts.app')

@section('content')
<style>
    .project-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
    }

    .project-card:hover {
        transform: translateY(-15px) scale(1.08) !important;
        box-shadow: 0 25px 50px rgba(0,0,0,0.3), 0 0 30px rgba(102, 126, 234, 0.5) !important;
    }

    .project-icon {
        transition: all 0.3s ease;
    }

    .project-card:hover .project-icon {
        transform: scale(1.2) rotate(5deg);
    }


</style>

<!-- Projects Section -->
<section class="py-16 sm:py-20 bg-gray-800 bg-opacity-70 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6">
        
        <h2 class="text-3xl sm:text-4xl font-bold text-center mb-8 sm:mb-10 mt-6 sm:mt-8 gradient-text" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">All Projects & Experiences</h2>

        <!-- Projects -->
        @if($projects->count() > 0)
        <div class="mb-12 sm:mb-16">
            <h3 class="text-2xl sm:text-3xl font-bold text-center mb-8 sm:mb-12 gradient-text" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">Projects</h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($projects as $index => $project)
                <!-- Project Card -->
                <div class="glass rounded-2xl overflow-hidden project-card" data-aos="flip-left" data-aos-delay="{{ 300 + ($index * 200) }}" data-aos-duration="1000">
                    <div class="h-40 sm:h-48 {{ $project->gradient_class ? 'bg-gradient-to-r ' . $project->gradient_class : '' }} flex items-center justify-center" @if($project->gradient_style) style="{{ $project->gradient_style }}" @endif>
                        <i class="{{ $project->icon }} text-4xl sm:text-5xl md:text-6xl text-white project-icon"></i>
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-400 mb-4">{{ $project->description }}</p>
                        @if($project->duration)
                            <p class="text-sm text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt mr-1"></i>{{ $project->duration }}
                            </p>
                        @endif
                        @if($project->location)
                            <p class="text-sm text-gray-500 mb-4">
                                <i class="fas fa-map-marker-alt mr-1"></i>{{ $project->location }}
                            </p>
                        @endif
                        @if($project->tags)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($project->tags as $tag)
                                    <span class="px-3 py-1 bg-green-600 rounded-full text-sm">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex space-x-4">
                            @if($project->link)
                                @php
                                    $link = $project->link;
                                    $icon = 'fas fa-globe'; // Default website icon
                                    $color = 'text-blue-400';
                                    
                                    if (str_contains(strtolower($link), 'instagram.com')) {
                                        $icon = 'fab fa-instagram';
                                        $color = 'text-pink-400';
                                    } elseif (str_contains(strtolower($link), 'linkedin.com')) {
                                        $icon = 'fab fa-linkedin';
                                        $color = 'text-blue-400';
                                    } elseif (str_contains(strtolower($link), 'facebook.com')) {
                                        $icon = 'fab fa-facebook';
                                        $color = 'text-blue-600';
                                    } elseif (str_contains(strtolower($link), 'gmail.com') || str_contains(strtolower($link), 'mail.google.com')) {
                                        $icon = 'fas fa-envelope';
                                        $color = 'text-red-400';
                                    } elseif (str_contains(strtolower($link), 'whatsapp.com') || str_contains(strtolower($link), 'wa.me')) {
                                        $icon = 'fab fa-whatsapp';
                                        $color = 'text-green-400';
                                    } elseif (str_contains(strtolower($link), 'github.com')) {
                                        $icon = 'fab fa-github';
                                        $color = 'text-gray-400';
                                    } elseif (str_contains(strtolower($link), 'youtube.com') || str_contains(strtolower($link), 'youtu.be')) {
                                        $icon = 'fab fa-youtube';
                                        $color = 'text-red-600';
                                    } elseif (str_contains(strtolower($link), 'twitter.com') || str_contains(strtolower($link), 'x.com')) {
                                        $icon = 'fab fa-twitter';
                                        $color = 'text-blue-400';
                                    } elseif (str_contains(strtolower($link), 'dribbble.com')) {
                                        $icon = 'fab fa-dribbble';
                                        $color = 'text-pink-400';
                                    } elseif (str_contains(strtolower($link), 'behance.net')) {
                                        $icon = 'fab fa-behance';
                                        $color = 'text-blue-500';
                                    }
                                @endphp
                                <a href="{{ $project->link }}" target="_blank" class="{{ $color }} hover:text-gray-300 transition-colors">
                                    <i class="{{ $icon }} text-xl"></i>
                                </a>
                            @else
                                <a href="https://www.linkedin.com/in/rafipramanaputra" class="text-blue-400 hover:text-blue-300 transition-colors">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Experiences -->
        @if($experiences->count() > 0)
        <div class="mb-12 sm:mb-16">
            <h3 class="text-2xl sm:text-3xl font-bold text-center mb-8 sm:mb-12 gradient-text" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">Experiences</h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($experiences as $index => $experience)
                <!-- Experience Card -->
                <div class="glass rounded-2xl overflow-hidden project-card" data-aos="flip-left" data-aos-delay="{{ 300 + ($index * 200) }}" data-aos-duration="1000">
                    <div class="h-40 sm:h-48 {{ $experience->gradient_class ? 'bg-gradient-to-r ' . $experience->gradient_class : '' }} flex items-center justify-center" @if($experience->gradient_style) style="{{ $experience->gradient_style }}" @endif>
                        <i class="{{ $experience->icon }} text-4xl sm:text-5xl md:text-6xl text-white project-icon"></i>
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-2">{{ $experience->title }}</h3>
                        <p class="text-gray-400 mb-4">{{ $experience->description }}</p>
                        @if($experience->duration)
                            <p class="text-sm text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt mr-1"></i>{{ $experience->duration }}
                            </p>
                        @endif
                        @if($experience->location)
                            <p class="text-sm text-gray-500 mb-4">
                                <i class="fas fa-map-marker-alt mr-1"></i>{{ $experience->location }}
                            </p>
                        @endif
                        @if($experience->tags)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($experience->tags as $tag)
                                    <span class="px-3 py-1 bg-blue-600 rounded-full text-sm">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex space-x-4">
                            @if($experience->link)
                                @php
                                    $link = $experience->link;
                                    $icon = 'fas fa-globe'; // Default website icon
                                    $color = 'text-blue-400';
                                    
                                    if (str_contains(strtolower($link), 'instagram.com')) {
                                        $icon = 'fab fa-instagram';
                                        $color = 'text-pink-400';
                                    } elseif (str_contains(strtolower($link), 'linkedin.com')) {
                                        $icon = 'fab fa-linkedin';
                                        $color = 'text-blue-400';
                                    } elseif (str_contains(strtolower($link), 'facebook.com')) {
                                        $icon = 'fab fa-facebook';
                                        $color = 'text-blue-600';
                                    } elseif (str_contains(strtolower($link), 'gmail.com') || str_contains(strtolower($link), 'mail.google.com')) {
                                        $icon = 'fas fa-envelope';
                                        $color = 'text-red-400';
                                    } elseif (str_contains(strtolower($link), 'whatsapp.com') || str_contains(strtolower($link), 'wa.me')) {
                                        $icon = 'fab fa-whatsapp';
                                        $color = 'text-green-400';
                                    } elseif (str_contains(strtolower($link), 'github.com')) {
                                        $icon = 'fab fa-github';
                                        $color = 'text-gray-400';
                                    } elseif (str_contains(strtolower($link), 'youtube.com') || str_contains(strtolower($link), 'youtu.be')) {
                                        $icon = 'fab fa-youtube';
                                        $color = 'text-red-600';
                                    } elseif (str_contains(strtolower($link), 'twitter.com') || str_contains(strtolower($link), 'x.com')) {
                                        $icon = 'fab fa-twitter';
                                        $color = 'text-blue-400';
                                    } elseif (str_contains(strtolower($link), 'dribbble.com')) {
                                        $icon = 'fab fa-dribbble';
                                        $color = 'text-pink-400';
                                    } elseif (str_contains(strtolower($link), 'behance.net')) {
                                        $icon = 'fab fa-behance';
                                        $color = 'text-blue-500';
                                    }
                                @endphp
                                <a href="{{ $experience->link }}" target="_blank" class="{{ $color }} hover:text-gray-300 transition-colors">
                                    <i class="{{ $icon }} text-xl"></i>
                                </a>
                            @else
                                <a href="https://www.linkedin.com/in/rafipramanaputra" class="text-blue-400 hover:text-blue-300 transition-colors">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Organization Experiences Section -->
        @if($organizations->count() > 0)
        <div class="mt-12 sm:mt-20">
            <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-8 sm:mb-12 gradient-text" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">Organization Experiences</h3>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($organizations as $index => $organization)
                <!-- Organization Card -->
                <div class="glass rounded-2xl overflow-hidden project-card" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 150) }}">
                    <div class="h-40 sm:h-48 {{ $organization->gradient_class ? 'bg-gradient-to-r ' . $organization->gradient_class : '' }} flex items-center justify-center" @if($organization->gradient_style) style="{{ $organization->gradient_style }}" @endif>
                        <i class="{{ $organization->icon }} text-4xl sm:text-5xl md:text-6xl text-white project-icon"></i>
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-2">{{ $organization->title }}</h3>
                        <p class="text-gray-400 mb-4">{{ $organization->description }}</p>
                        @if($organization->duration)
                            <p class="text-sm text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt mr-1"></i>{{ $organization->duration }}
                            </p>
                        @endif
                        @if($organization->location)
                            <p class="text-sm text-gray-500 mb-4">
                                <i class="fas fa-map-marker-alt mr-1"></i>{{ $organization->location }}
                            </p>
                        @endif
                        @if($organization->tags)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($organization->tags as $tag)
                                    <span class="px-3 py-1 bg-purple-600 rounded-full text-sm">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex space-x-4">
                            @if($organization->link)
                                @php
                                    $link = $organization->link;
                                    $icon = 'fas fa-globe'; // Default website icon
                                    $color = 'text-blue-400';
                                    
                                    if (str_contains(strtolower($link), 'instagram.com')) {
                                        $icon = 'fab fa-instagram';
                                        $color = 'text-pink-400';
                                    } elseif (str_contains(strtolower($link), 'linkedin.com')) {
                                        $icon = 'fab fa-linkedin';
                                        $color = 'text-blue-400';
                                    } elseif (str_contains(strtolower($link), 'facebook.com')) {
                                        $icon = 'fab fa-facebook';
                                        $color = 'text-blue-600';
                                    } elseif (str_contains(strtolower($link), 'gmail.com') || str_contains(strtolower($link), 'mail.google.com')) {
                                        $icon = 'fas fa-envelope';
                                        $color = 'text-red-400';
                                    } elseif (str_contains(strtolower($link), 'whatsapp.com') || str_contains(strtolower($link), 'wa.me')) {
                                        $icon = 'fab fa-whatsapp';
                                        $color = 'text-green-400';
                                    } elseif (str_contains(strtolower($link), 'github.com')) {
                                        $icon = 'fab fa-github';
                                        $color = 'text-gray-400';
                                    } elseif (str_contains(strtolower($link), 'youtube.com') || str_contains(strtolower($link), 'youtu.be')) {
                                        $icon = 'fab fa-youtube';
                                        $color = 'text-red-600';
                                    } elseif (str_contains(strtolower($link), 'twitter.com') || str_contains(strtolower($link), 'x.com')) {
                                        $icon = 'fab fa-twitter';
                                        $color = 'text-blue-400';
                                    } elseif (str_contains(strtolower($link), 'dribbble.com')) {
                                        $icon = 'fab fa-dribbble';
                                        $color = 'text-pink-400';
                                    } elseif (str_contains(strtolower($link), 'behance.net')) {
                                        $icon = 'fab fa-behance';
                                        $color = 'text-blue-500';
                                    }
                                @endphp
                                <a href="{{ $organization->link }}" target="_blank" class="{{ $color }} hover:text-gray-300 transition-colors">
                                    <i class="{{ $icon }} text-xl"></i>
                                </a>
                            @else
                                <a href="https://www.linkedin.com/in/rafipramanaputra" class="text-blue-400 hover:text-blue-300 transition-colors">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<script>
    // Prevent multiple initializations
    if (!window.projectPageInitialized) {
        window.projectPageInitialized = true;

        // Initialize AOS with enhanced settings
        AOS.init({
            duration: 1200,
            once: true,
            offset: 120,
            easing: 'ease-out-cubic',
            delay: 0,
            mirror: false,
            anchorPlacement: 'top-bottom'
        });

        // Background Music Control
        const music = document.getElementById('backgroundMusic');
        const musicToggle = document.getElementById('musicToggle');
        const musicIcon = document.getElementById('musicIcon');
        let isPlaying = false;

        // Auto-play music (with user interaction fallback)
        document.addEventListener('click', function() {
            if (!isPlaying && music) {
                music.play().then(() => {
                    isPlaying = true;
                    if (musicIcon) musicIcon.className = 'fas fa-volume-up';
                }).catch(e => {
                    console.log('Auto-play prevented:', e);
                });
            }
        }, { once: true });

        if (musicToggle) {
            musicToggle.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent event bubbling
                if (isPlaying) {
                    music.pause();
                    musicIcon.className = 'fas fa-volume-mute';
                    isPlaying = false;
                } else {
                    music.play().then(() => {
                        musicIcon.className = 'fas fa-volume-up';
                        isPlaying = true;
                    }).catch(e => {
                        console.log('Play failed:', e);
                    });
                }
            });
        }

        // Navbar scroll effect with requestAnimationFrame
        let navbarTicking = false;
        function updateNavbar() {
            const navbar = document.getElementById('navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-gray-900', 'bg-opacity-95');
                } else {
                    navbar.classList.remove('bg-gray-900', 'bg-opacity-95');
                }
            }
            navbarTicking = false;
        }

        window.addEventListener('scroll', function() {
            if (!navbarTicking) {
                requestAnimationFrame(updateNavbar);
                navbarTicking = true;
            }
        });

        // Back to top button (if exists)
        const backToTop = document.getElementById('backToTop');
        if (backToTop) {
            let backToTopTicking = false;
            function updateBackToTop() {
                if (window.scrollY > 500) {
                    backToTop.classList.remove('opacity-0', 'pointer-events-none');
                    backToTop.classList.add('opacity-100');
                } else {
                    backToTop.classList.add('opacity-0', 'pointer-events-none');
                    backToTop.classList.remove('opacity-100');
                }
                backToTopTicking = false;
            }

            window.addEventListener('scroll', function() {
                if (!backToTopTicking) {
                    requestAnimationFrame(updateBackToTop);
                    backToTopTicking = true;
                }
            });

            backToTop.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Enhanced hover effects for project cards
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.08)';
                this.style.boxShadow = '0 25px 50px rgba(0,0,0,0.3), 0 0 30px rgba(102, 126, 234, 0.5)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '';
            });
        });
    }
</script>
@endsection
