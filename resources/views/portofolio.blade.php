@extends('layouts.app')


@section('content')
@include('components.alert-system')

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center relative parallax" style="background-image: url('{{ asset('images/lofi_background.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="text-center z-10 relative custom-intro-fade-up px-4 sm:px-6" data-aos="fade-up" data-aos-duration="2000">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-4 text-shadow typing custom-intro-hero-title custom-delay-300" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1500">Rafi Pramana Putra</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-8 text-gray-300 custom-intro-hero-subtitle custom-delay-600" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1200">Law Student & Community Leader</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 sm:space-x-4 custom-intro-hero-buttons custom-delay-900" data-aos="fade-up" data-aos-delay="900" data-aos-duration="1200">
                <a href="#about" class="group relative glass px-6 sm:px-8 py-3 rounded-full hover:glow transition-all duration-300 card-hover custom-intro-slide-right custom-delay-1200 hover-popup-btn text-sm sm:text-base" data-aos="slide-right" data-aos-delay="1200" data-aos-duration="800">
                    <span class="relative z-10">Explore My Work</span>
                    <div class="popup-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-2 rounded-lg text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300 scale-75 group-hover:scale-100 pointer-events-none">
                        <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></div>
                        Discover my journey & achievements
                    </div>
                </a>
                <a href="{{ asset('cv/CV_RAFI_PRAMANA_PUTRA.pdf') }}" target="_blank" class="group relative border-2 border-blue-500 px-6 sm:px-8 py-3 rounded-full hover:bg-blue-500 transition-all duration-300 card-hover custom-intro-slide-left custom-delay-1200 hover-popup-btn text-sm sm:text-base" data-aos="slide-left" data-aos-delay="1200" data-aos-duration="800">
                    <span class="relative z-10">Download CV</span>
                    <div class="popup-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-2 rounded-lg text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300 scale-75 group-hover:scale-100 pointer-events-none">
                        <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></div>
                        Get my complete CV in PDF
                    </div>
                </a>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="hidden sm:block absolute top-20 left-10 text-4xl opacity-20 floating custom-intro-floating custom-delay-1500" style="animation-delay: 0.5s;" data-aos="fade-right" data-aos-delay="1500" data-aos-duration="1000">
            <i class="fas fa-balance-scale"></i>
        </div>
        <div class="hidden sm:block absolute top-40 right-20 text-3xl opacity-20 floating custom-intro-floating custom-delay-1700" style="animation-delay: 1s;" data-aos="fade-left" data-aos-delay="1700" data-aos-duration="1000">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="hidden sm:block absolute bottom-20 left-20 text-3xl opacity-20 floating custom-intro-floating custom-delay-1900" style="animation-delay: 1.5s;" data-aos="fade-right" data-aos-delay="1900" data-aos-duration="1000">
            <i class="fas fa-globe"></i>
        </div>
        <div class="hidden sm:block absolute bottom-40 right-10 text-4xl opacity-20 floating custom-intro-floating custom-delay-2000" style="animation-delay: 2s;" data-aos="fade-left" data-aos-delay="2100" data-aos-duration="1000">
            <i class="fas fa-users"></i>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="pt-20 sm:pt-32 pb-16 sm:pb-20 bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-12 sm:mb-16 gradient-text custom-intro-fade-up custom-delay-100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">About Me</h2>
            <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 items-center">
                <div data-aos="fade-right" data-aos-duration="800" data-aos-delay="200" class="custom-intro-slide-right custom-delay-200">
                    <div class="glass rounded-2xl p-6 sm:p-8 card-hover">
                        <h3 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6 text-blue-400 custom-intro-zoom-in custom-delay-300" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="600">Professional Profile</h3>
                        <p class="text-base sm:text-lg leading-relaxed mb-4 sm:mb-6">
                            A committed law student and community leader dedicated to driving societal progress.
                            Skilled in public speaking and research, actively supports educational innovation by
                            promoting inclusivity and legal awareness.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-center custom-intro-slide-right custom-delay-400" data-aos="slide-right" data-aos-delay="400" data-aos-duration="500">
                                <i class="fas fa-graduation-cap text-blue-400 text-xl mr-4"></i>
                                <span>Law Student at University of Brawijaya</span>
                            </div>
                            <div class="flex items-center custom-intro-slide-right custom-delay-500" data-aos="slide-right" data-aos-delay="500" data-aos-duration="500">
                                <i class="fas fa-briefcase text-blue-400 text-xl mr-4"></i>
                                <span>International Volunteer & Community Leader</span>
                            </div>
                            <div class="flex items-center custom-intro-slide-right custom-delay-600" data-aos="slide-right" data-aos-delay="600" data-aos-duration="500">
                                <i class="fas fa-map-marker-alt text-blue-400 text-xl mr-4"></i>
                                <span>Malang, Indonesia</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200" class="custom-intro-slide-left custom-delay-200 mt-8 lg:mt-0">
                    <div class="relative">
                        <div class="circle-animation absolute inset-0 rounded-full border-4 border-blue-500 opacity-30 custom-intro-zoom-in custom-delay-400" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="600"></div>
                        <div class="glass rounded-2xl p-6 sm:p-8 text-center card-hover">
                            <div class="text-4xl sm:text-5xl md:text-6xl mb-4 custom-intro-flip custom-delay-300" data-aos="flip-up" data-aos-delay="300" data-aos-duration="600">
                                <i class="fas fa-balance-scale gradient-text"></i>
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold mb-4 custom-intro-fade-up custom-delay-500" data-aos="fade-up" data-aos-delay="500" data-aos-duration="500">Mission Statement</h3>
                            <p class="text-sm sm:text-base text-gray-300 custom-intro-fade-up custom-delay-600" data-aos="fade-up" data-aos-delay="600" data-aos-duration="600">
                                "Fostering empathy through technology and community engagement, with passion for
                                international law, environmental sustainability, SDGs, and volunteering."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- Skills Section -->
    <section id="skills" class="py-16 sm:py-20 bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6">
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-12 sm:mb-16 gradient-text custom-intro-fade-up custom-delay-200" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">Core Skills & Expertise</h2>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12 sm:mb-16">
    <!-- Leadership & Communication -->
    <div class="glass rounded-2xl p-6 sm:p-8 card-hover custom-intro-card custom-delay-300" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
    <div class="text-center mb-6">
    <i class="fas fa-users text-4xl sm:text-5xl text-blue-400 mb-4"></i>
    <h3 class="text-xl sm:text-2xl font-bold">Leadership & Communication</h3>
    </div>
    <div class="space-y-4">
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Public Speaking</span>
    <span class="skill-level expert">Expert</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Award-winning speaker with international presentation experience</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Leadership</span>
    <span class="skill-level advanced">Advanced</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Community leader, organization president, and team coordinator</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Teamwork</span>
    <span class="skill-level advanced">Advanced</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Collaborative approach in academic and volunteer projects</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Interpersonal Skills</span>
    <span class="skill-level advanced">Advanced</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Strong communication and relationship-building abilities</p>
    </div>
    </div>
    </div>
    </div>

    <!-- Academic & Research -->
    <div class="glass rounded-2xl p-6 sm:p-8 card-hover custom-intro-card custom-delay-500" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
    <div class="text-center mb-6">
    <i class="fas fa-graduation-cap text-4xl sm:text-5xl text-green-400 mb-4"></i>
    <h3 class="text-xl sm:text-2xl font-bold">Academic & Research</h3>
    </div>
    <div class="space-y-4">
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Research</span>
    <span class="skill-level advanced">Advanced</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Published researcher with international conference presentations</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Writing</span>
    <span class="skill-level proficient">Proficient</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Academic writing, policy papers, and research documentation</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Teaching</span>
    <span class="skill-level advanced">Advanced</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Mentoring experience in English, law, and civic education</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Project Management</span>
    <span class="skill-level proficient">Proficient</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Successfully managed educational initiatives and community projects</p>
    </div>
    </div>
    </div>
    </div>

    <!-- Languages & Tools -->
    <div class="glass rounded-2xl p-6 sm:p-8 card-hover" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000">
    <div class="text-center mb-6">
    <i class="fas fa-globe text-4xl sm:text-5xl text-purple-400 mb-4"></i>
    <h3 class="text-xl sm:text-2xl font-bold">Languages & Tools</h3>
    </div>
    <div class="space-y-4">
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Bahasa Indonesia</span>
    <span class="skill-level native">Native</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Native speaker with excellent command of formal and informal language</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>English</span>
    <span class="skill-level fluent">Fluent</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">International presentations, academic writing, and professional communication</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Microsoft Office</span>
    <span class="skill-level advanced">Advanced</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">Word processing, presentations, and data analysis for academic projects</p>
    </div>
    </div>
    <div class="skill-item">
    <div class="flex justify-between items-center mb-2">
    <span>Intercultural Awareness</span>
    <span class="skill-level expert">Expert</span>
    </div>
    <div class="skill-description">
    <p class="text-sm text-gray-400">International volunteer experience and cross-cultural communication</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

    <div class="section-divider"></div>

    <!-- Projects Section -->
    <section id="projects" class="py-16 sm:py-20 bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-12 sm:mb-16 gradient-text" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">Key Experiences & Projects</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Project 1 -->
                <div class="glass rounded-2xl overflow-hidden card-hover project-card" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="800">
                <div class="h-40 sm:h-48 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                <i class="fas fa-graduation-cap text-4xl sm:text-5xl md:text-6xl text-white project-icon"></i>
                </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Akademi Juara Community</h3>
                        <p class="text-gray-400 mb-4">Founder & CEO - Educational community offering skill development courses</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-blue-600 rounded-full text-sm">Leadership</span>
                            <span class="px-3 py-1 bg-green-600 rounded-full text-sm">Education</span>
                            <span class="px-3 py-1 bg-purple-600 rounded-full text-sm">Management</span>
                        </div>
                        <div class="flex space-x-4">
                            <a href="https://www.linkedin.com/in/rafipramanaputra" class="text-blue-400 hover:text-blue-300 transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="glass rounded-2xl overflow-hidden card-hover project-card" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="800">
                <div class="h-40 sm:h-48 bg-gradient-to-r from-green-500 to-teal-600 flex items-center justify-center">
                <i class="fas fa-search text-4xl sm:text-5xl md:text-6xl text-white project-icon"></i>
                </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-2">SpLD Research Project</h3>
                        <p class="text-gray-400 mb-4">Research on rights of people with special learning disabilities for FLC</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-orange-600 rounded-full text-sm">Research</span>
                            <span class="px-3 py-1 bg-yellow-600 rounded-full text-sm">Inclusivity</span>
                            <span class="px-3 py-1 bg-green-600 rounded-full text-sm">Analysis</span>
                        </div>
                        <div class="flex space-x-4">
                            <a href="https://www.linkedin.com/in/rafipramanaputra" class="text-blue-400 hover:text-blue-300 transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="glass rounded-2xl overflow-hidden card-hover project-card" data-aos="zoom-in" data-aos-delay="700" data-aos-duration="800">
                <div class="h-40 sm:h-48 bg-gradient-to-r from-purple-500 to-pink-600 flex items-center justify-center">
                <i class="fas fa-gamepad text-4xl sm:text-5xl md:text-6xl text-white project-icon"></i>
                </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Aquatic Educational Game</h3>
                        <p class="text-gray-400 mb-4">Game prototype for learning drug regulations with Kejaksaan Tinggi Kaltim</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-red-600 rounded-full text-sm">Game Design</span>
                            <span class="px-3 py-1 bg-blue-600 rounded-full text-sm">Legal Education</span>
                            <span class="px-3 py-1 bg-purple-600 rounded-full text-sm">Innovation</span>
                        </div>
                        <div class="flex space-x-4">
                            <a href="https://www.linkedin.com/in/rafipramanaputra" class="text-blue-400 hover:text-blue-300 transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Button -->
            <div class="flex justify-end mt-12" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('project.index') }}" class="group relative inline-flex items-center px-8 py-4 glass rounded-full hover:scale-105 transition-all duration-300 border border-blue-500/30 hover:border-blue-400/50">
                    <span class="text-lg font-semibold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent mr-3">
                        View More Projects
                    </span>
                    <i class="fas fa-arrow-right text-blue-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                    <div class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-500/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- Honors and Awards Section -->
    <section id="awards" class="py-16 sm:py-20 bg-gray-850 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="hidden sm:block absolute inset-0 overflow-hidden">
            <div class="absolute top-10 left-10 w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full opacity-20 floating"></div>
            <div class="absolute top-32 right-16 w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full opacity-20 floating" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full opacity-20 floating" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-32 right-10 w-18 h-18 bg-gradient-to-r from-green-500 to-teal-500 rounded-full opacity-20 floating" style="animation-delay: 0.5s;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-12 sm:mb-16 gradient-text" data-aos="fade-up">Honors & Awards</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Best Paper Award -->
                <div class="glass rounded-2xl overflow-hidden project-card award-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="h-48 bg-gradient-to-r from-yellow-500 to-amber-600 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-trophy text-6xl text-white project-icon trophy-icon relative z-10"></i>
                        <div class="absolute top-4 right-4 w-8 h-8 bg-yellow-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-yellow-800 text-sm"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-yellow-400">Best Paper Award</h3>
                        <p class="text-gray-400 mb-3 text-sm">Policy Forum on Education 2024</p>
                        <p class="text-gray-500 mb-4 text-xs">Tanoto Foundation & Pemimpin.id - November 2024</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-yellow-600 rounded-full text-xs">Best Paper</span>
                            <span class="px-3 py-1 bg-amber-600 rounded-full text-xs">Education</span>
                            <span class="px-3 py-1 bg-orange-600 rounded-full text-xs">Policy</span>
                        </div>
                    </div>
                </div>

                <!-- Best Presenter Award -->
                <div class="glass rounded-2xl overflow-hidden project-card award-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="h-48 bg-gradient-to-r from-purple-500 to-pink-600 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-medal text-6xl text-white project-icon medal-icon relative z-10"></i>
                        <div class="absolute top-4 right-4 w-8 h-8 bg-pink-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-pink-800 text-sm"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-purple-400">Best Presenter</h3>
                        <p class="text-gray-400 mb-3 text-sm">International Conference Youth.Id</p>
                        <p class="text-gray-500 mb-4 text-xs">Kuala Lumpur, Malaysia - November 2024</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-purple-600 rounded-full text-xs">Best Presenter</span>
                            <span class="px-3 py-1 bg-pink-600 rounded-full text-xs">International</span>
                            <span class="px-3 py-1 bg-violet-600 rounded-full text-xs">Conference</span>
                        </div>
                    </div>
                </div>

                <!-- FLC Presenter -->
                <div class="glass rounded-2xl overflow-hidden project-card award-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="h-48 bg-gradient-to-r from-blue-500 to-cyan-600 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-microphone text-6xl text-white project-icon mic-icon relative z-10"></i>
                        <div class="absolute top-4 right-4 w-8 h-8 bg-cyan-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-cyan-800 text-sm"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-blue-400">Conference Presenter</h3>
                        <p class="text-gray-400 mb-3 text-sm">15th International Free Linguistic Conference</p>
                        <p class="text-gray-500 mb-4 text-xs">Labuan Bajo, Indonesia - October 2024</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-blue-600 rounded-full text-xs">Presenter</span>
                            <span class="px-3 py-1 bg-cyan-600 rounded-full text-xs">Linguistic</span>
                            <span class="px-3 py-1 bg-teal-600 rounded-full text-xs">Research</span>
                        </div>
                    </div>
                </div>

                <!-- Scholarship Award -->
                <div class="glass rounded-2xl overflow-hidden project-card award-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="h-48 bg-gradient-to-r from-emerald-500 to-teal-600 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-graduation-cap text-6xl text-white project-icon graduate-icon relative z-10"></i>
                        <div class="absolute top-4 right-4 w-8 h-8 bg-teal-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-teal-800 text-sm"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-emerald-400">Scholarship Awardee</h3>
                        <p class="text-gray-400 mb-3 text-sm">New Zealand - Indonesia Youth Program</p>
                        <p class="text-gray-500 mb-4 text-xs">Sampoerna University & Education New Zealand - 2024</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-600 rounded-full text-xs">Scholarship</span>
                            <span class="px-3 py-1 bg-teal-600 rounded-full text-xs">Intercultural</span>
                            <span class="px-3 py-1 bg-green-600 rounded-full text-xs">International</span>
                        </div>
                    </div>
                </div>

                <!-- Outstanding Student -->
                <div class="glass rounded-2xl overflow-hidden project-card award-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="h-48 bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-star text-6xl text-white project-icon star-icon relative z-10"></i>
                        <div class="absolute top-4 right-4 w-8 h-8 bg-purple-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-crown text-purple-800 text-sm"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-indigo-400">Outstanding Student</h3>
                        <p class="text-gray-400 mb-3 text-sm">East Kalimantan Education Department</p>
                        <p class="text-gray-500 mb-4 text-xs">Regional Recognition - 2022-2023</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-indigo-600 rounded-full text-xs">Outstanding</span>
                            <span class="px-3 py-1 bg-purple-600 rounded-full text-xs">Student</span>
                            <span class="px-3 py-1 bg-violet-600 rounded-full text-xs">Regional</span>
                        </div>
                    </div>
                </div>

                <!-- Best Speaker Award -->
                <div class="glass rounded-2xl overflow-hidden project-card award-card" data-aos="zoom-in" data-aos-delay="600">
                    <div class="h-48 bg-gradient-to-r from-red-500 to-pink-600 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-bullhorn text-6xl text-white project-icon speaker-icon relative z-10"></i>
                        <div class="absolute top-4 right-4 w-8 h-8 bg-pink-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-award text-pink-800 text-sm"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-red-400">1st Winner & Best Speaker</h3>
                        <p class="text-gray-400 mb-3 text-sm">Duta Pelajar Sadar Hukum</p>
                        <p class="text-gray-500 mb-4 text-xs">Law Student Ambassador - October 2023</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-red-600 rounded-full text-xs">1st Winner</span>
                            <span class="px-3 py-1 bg-pink-600 rounded-full text-xs">Best Speaker</span>
                            <span class="px-3 py-1 bg-rose-600 rounded-full text-xs">Legal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- Contact Section -->
    <section id="contact" class="py-16 sm:py-20 bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-12 sm:mb-16 gradient-text" data-aos="fade-up">Get In Touch</h2>

            <div class="grid lg:grid-cols-2 gap-8 sm:gap-12">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <div class="glass rounded-2xl p-6 sm:p-8">
                        <h3 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6 text-blue-400">Let's Work Together</h3>
                        <p class="text-base sm:text-lg mb-6 sm:mb-8 text-gray-300">
                            I'm always interested in new opportunities and exciting projects.
                            Let's discuss how we can bring your ideas to life.
                        </p>

                        <div class="space-y-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">Email</p>
                                    <p class="text-gray-400">rafipramanaputra05@gmail.com</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                                    <i class="fab fa-whatsapp text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">WhatsApp</p>
                                    <p class="text-gray-400">+62-822-2763-2685</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-700 rounded-full flex items-center justify-center mr-4">
                                    <i class="fab fa-linkedin text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">LinkedIn</p>
                                    <p class="text-gray-400">linkedin.com/in/rafipramanaputra</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-4 mt-8">
                            <div class="relative">
                                <a href="mailto:rafipramanaputra05@gmail.com?subject=Project%20Discussion&body=Hi%20Rafi,%0D%0A%0D%0AI%20would%20like%20to%20discuss%20a%20project%20with%20you.%0D%0A%0D%0ABest%20regards" class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors card-hover" title="Send Email" onclick="handleEmailClick(event)">
                                    <i class="fas fa-envelope text-white"></i>
                                </a>
                            </div>
                            <a href="https://www.linkedin.com/in/rafipramanaputra" target="_blank" class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors card-hover" title="LinkedIn Profile">
                                <i class="fab fa-linkedin text-white"></i>
                            </a>
                            <a href="https://wa.me/6282227632685?text=Hi%20Rafi,%20I%20would%20like%20to%20discuss%20a%20project%20with%20you." target="_blank" class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors card-hover" title="WhatsApp">
                                <i class="fab fa-whatsapp text-white"></i>
                            </a>
                            <a href="{{ asset('cv/CV_RAFI_PRAMANA_PUTRA.pdf') }}" target="_blank" class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center hover:bg-purple-600 transition-colors card-hover" title="Download CV">
                                <i class="fas fa-file-pdf text-white"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-duration="1000" class="mt-8 lg:mt-0">
                    <div class="glass rounded-2xl p-6 sm:p-8">
                        <form id="contactForm" class="space-y-4 sm:space-y-6">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium mb-2">Name</label>
                                <input type="text" name="name" id="name" class="w-full px-4 py-3 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Your Name" required>
                                <div class="error-message text-red-400 text-sm mt-1 hidden"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" name="email" id="email" class="w-full px-4 py-3 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="your.email@example.com" required>
                                <div class="error-message text-red-400 text-sm mt-1 hidden"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Subject</label>
                                <input type="text" name="subject" id="subject" class="w-full px-4 py-3 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Project Discussion" required>
                                <div class="error-message text-red-400 text-sm mt-1 hidden"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Message</label>
                                <textarea rows="4" name="message" id="message" class="w-full px-4 py-3 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Tell me about your project..." required></textarea>
                                <div class="error-message text-red-400 text-sm mt-1 hidden"></div>
                            </div>
                            <button type="submit" id="submitBtn" class="w-full py-3 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg font-semibold hover:glow transition-all duration-300 card-hover">
                                <span class="submit-text">Send Message</span>
                                <span class="loading-text hidden">
                                    <i class="fas fa-spinner fa-spin mr-2"></i>
                                    Sending...
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center hover:glow transition-all duration-300 opacity-0 pointer-events-none">
        <i class="fas fa-arrow-up text-white"></i>
    </button>

    <style>
        /* Pop-up tooltip animations for hero buttons */
        .hover-popup-btn {
            overflow: visible;
            transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .hover-popup-btn:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.3);
        }

        .popup-tooltip {
            z-index: 1000;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            opacity: 0;
            transform: translateX(-50%) translateY(8px) scale(0.9);
            transition: all 0.15s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            pointer-events: none;
        }

        .popup-tooltip::before {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid transparent;
            border-top-color: #1f2937;
            margin-top: -1px;
        }

        /* Smooth hover effects */
        .hover-popup-btn:hover .popup-tooltip {
            opacity: 1;
            transform: translateX(-50%) translateY(0) scale(1);
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Instant show on hover */
        .hover-popup-btn .popup-tooltip {
            transition-delay: 0s;
        }

        .hover-popup-btn:hover .popup-tooltip {
            transition-delay: 0.05s;
        }

        /* Subtle glow effect on hover */
        .hover-popup-btn::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4);
            border-radius: inherit;
            z-index: -1;
            opacity: 0;
            filter: blur(6px);
            transition: opacity 0.2s ease;
        }

        .hover-popup-btn:hover::before {
            opacity: 0.4;
        }

        /* Skill Level Styling */
        .skill-level {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 80px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .skill-level.native {
            background: linear-gradient(135deg, #059669, #047857);
            color: white;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.3);
        }

        .skill-level.expert {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
        }

        .skill-level.fluent {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
        }

        .skill-level.advanced {
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            color: white;
            box-shadow: 0 2px 8px rgba(124, 58, 237, 0.3);
        }

        .skill-level.proficient {
            background: linear-gradient(135deg, #ea580c, #dc2626);
            color: white;
            box-shadow: 0 2px 8px rgba(234, 88, 12, 0.3);
        }

        .skill-level.intermediate {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
        }

        .skill-level.basic {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            box-shadow: 0 2px 8px rgba(107, 114, 128, 0.3);
        }

        .skill-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .skill-item:hover .skill-level {
            transform: scale(1.05);
        }

        .skill-description {
            margin-top: 8px;
            padding-top: 8px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <script>
        console.log('Script loading...');

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing...');

            // Initialize AOS with enhanced settings
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1200,
                    once: true,
                    offset: 120,
                    easing: 'ease-out-cubic',
                    delay: 0,
                    mirror: false,
                    anchorPlacement: 'top-bottom'
                });
                console.log('AOS initialized with enhanced settings');
            }

            // Custom intro animations as fallback and enhancement
            function initCustomIntroAnimations() {
                const observerOptions = {
                    threshold: 0.2,
                    rootMargin: '0px 0px -100px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('custom-intro-visible');

                            // Special handling for About section to ensure all elements animate quickly
                            if (entry.target.closest('#about')) {
                                const aboutElements = entry.target.closest('#about').querySelectorAll(
                                    '.custom-intro-slide-right, .custom-intro-slide-left, .custom-intro-zoom-in, .custom-intro-fade-up, .custom-intro-flip'
                                );
                                aboutElements.forEach((el, index) => {
                                    setTimeout(() => {
                                        el.classList.add('custom-intro-visible');
                                    }, index * 100);
                                });
                            }

                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                // Observe all intro elements
                const introElements = document.querySelectorAll(
                    '.custom-intro-hidden, .custom-intro-slide-right, .custom-intro-slide-left, ' +
                    '.custom-intro-zoom-in, .custom-intro-fade-up, .custom-intro-fade-down, ' +
                    '.custom-intro-hero-title, .custom-intro-hero-subtitle, .custom-intro-hero-buttons, ' +
                    '.custom-intro-floating, .custom-intro-flip, .custom-intro-card'
                );

                introElements.forEach(el => {
                    observer.observe(el);
                });

                // Hero section immediate animation
                setTimeout(() => {
                    const heroElements = document.querySelectorAll('.custom-intro-hero-title, .custom-intro-hero-subtitle, .custom-intro-hero-buttons');
                    heroElements.forEach((el, index) => {
                        setTimeout(() => {
                            el.classList.add('custom-intro-visible');
                        }, index * 100);
                    });
                }, 300);

                // Individual button animations
                setTimeout(() => {
                    const buttonElements = document.querySelectorAll('.custom-intro-slide-right, .custom-intro-slide-left');
                    buttonElements.forEach((el, index) => {
                        if (el.closest('#home')) { // Only for hero buttons
                            setTimeout(() => {
                                el.classList.add('custom-intro-visible');
                            }, index * 100);
                        }
                    });
                }, 800);

                // Floating icons staggered animation
                setTimeout(() => {
                    const floatingElements = document.querySelectorAll('.custom-intro-floating');
                    floatingElements.forEach((el, index) => {
                        setTimeout(() => {
                            el.classList.add('custom-intro-visible');
                        }, index * 200);
                    });
                }, 1200);
            }

            // Initialize custom animations
            initCustomIntroAnimations();
            console.log('Custom intro animations initialized');

            // Auto-scroll to section if hash is present
            const hash = window.location.hash;
            if (hash) {
                setTimeout(() => {
                    const targetElement = document.querySelector(hash);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }, 1000);
            }

            // Background Music Control
            const music = document.getElementById('backgroundMusic');
            const musicToggle = document.getElementById('musicToggle');
            const musicIcon = document.getElementById('musicIcon');
            let isPlaying = false;

            if (music) {
                music.volume = 0.3;
                music.loop = true;
                console.log('Music configured');
            }

            // Music toggle click handler
            if (musicToggle) {
                musicToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (!music) return;

                    if (isPlaying) {
                        music.pause();
                        musicIcon.className = 'fas fa-volume-mute';
                        isPlaying = false;
                        console.log('Music paused');
                    } else {
                        music.play().then(() => {
                            musicIcon.className = 'fas fa-volume-up';
                            isPlaying = true;
                            console.log('Music playing');
                        }).catch(e => console.log('Play failed:', e));
                    }
                });
            }

            // Auto-play on first click
            document.addEventListener('click', function() {
                if (!isPlaying && music) {
                    music.play().then(() => {
                        isPlaying = true;
                        if (musicIcon) musicIcon.className = 'fas fa-volume-up';
                        console.log('Auto-play started');
                    }).catch(e => console.log('Auto-play prevented:', e));
                }
            }, { once: true });

            // Navbar scroll effect (throttled)
            let scrollTimeout;
            const handleScroll = function() {
                if (scrollTimeout) return;

                scrollTimeout = setTimeout(() => {
                    const navbar = document.getElementById('navbar');
                    if (navbar) {
                        if (window.scrollY > 50) {
                            navbar.classList.add('bg-gray-900', 'bg-opacity-95');
                        } else {
                            navbar.classList.remove('bg-gray-900', 'bg-opacity-95');
                        }
                    }
                    scrollTimeout = null;
                }, 10);
            };

            window.addEventListener('scroll', handleScroll, { passive: true });

            // Smooth scrolling for navigation links (excluding nav-link class to avoid conflicts)
            document.querySelectorAll('a[href^="#"]:not(.nav-link)').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Skill cards animation
            const skillItems = document.querySelectorAll('.skill-item');
            console.log('Found skill items:', skillItems.length);

            const animateSkillItems = () => {
                console.log('Animating skill items...');
                skillItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                        item.style.transition = 'all 0.6s ease-out';
                    }, index * 100);
                });
            };

            // Initialize skill items
            skillItems.forEach(item => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
            });

            // Intersection Observer for skill items
            const skillsSection = document.getElementById('skills');
            if (skillsSection) {
                const skillsObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            console.log('Skills section visible');
                            setTimeout(animateSkillItems, 500);
                            skillsObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.2 });

                skillsObserver.observe(skillsSection);
            }

            // Back to top button
            const backToTop = document.getElementById('backToTop');
            if (backToTop) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 500) {
                        backToTop.classList.remove('opacity-0', 'pointer-events-none');
                        backToTop.classList.add('opacity-100');
                    } else {
                        backToTop.classList.add('opacity-0', 'pointer-events-none');
                        backToTop.classList.remove('opacity-100');
                    }
                });

                backToTop.addEventListener('click', function() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            // Floating icons interaction
            document.querySelectorAll('.floating').forEach(icon => {
                icon.addEventListener('click', function() {
                    console.log('Floating icon clicked');
                    this.style.transform = 'scale(1.5) rotate(360deg)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 500);
                });
            });

            // Card hover effects
            document.querySelectorAll('.card-hover').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Parallax effect
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelector('.parallax');
                if (parallax) {
                    const speed = scrolled * 0.5;
                    parallax.style.transform = `translateY(${speed}px)`;
                }
            });



            // Typing animation restart
            setInterval(() => {
                const typingElement = document.querySelector('.typing');
                if (typingElement) {
                    typingElement.style.animation = 'none';
                    setTimeout(() => {
                        typingElement.style.animation = 'typing 3.5s steps(40, end), blink-caret .75s step-end infinite';
                    }, 100);
                }
            }, 10000);

            // Awards section glitter effects
            const awardCards = document.querySelectorAll('.award-card');

            awardCards.forEach(card => {
                let glitterInterval;

                card.addEventListener('mouseenter', function() {
                    console.log('Award card hovered');

                    // Start glitter effect
                    glitterInterval = setInterval(() => {
                        createGlitterParticle(this);
                    }, 150);
                });

                card.addEventListener('mouseleave', function() {
                    // Stop glitter effect
                    if (glitterInterval) {
                        clearInterval(glitterInterval);
                        glitterInterval = null;
                    }
                });
            });

            function createGlitterParticle(cardElement) {
                const rect = cardElement.getBoundingClientRect();
                const glitter = document.createElement('div');

                // Random type: regular dot or star
                const isStarShape = Math.random() > 0.6;
                glitter.className = isStarShape ? 'glitter star-shape' : 'glitter';

                // Random position within the card
                const x = Math.random() * rect.width;
                const y = Math.random() * rect.height;

                glitter.style.left = x + 'px';
                glitter.style.top = y + 'px';

                // Random size variation
                const size = 3 + Math.random() * 4;
                glitter.style.width = size + 'px';
                glitter.style.height = size + 'px';

                // Random color tint based on card theme
                const colors = [
                    'rgba(255,215,0,0.9)',   // Gold
                    'rgba(255,255,255,0.9)', // White
                    'rgba(255,192,203,0.9)', // Pink
                    'rgba(0,255,255,0.9)',   // Cyan
                    'rgba(255,20,147,0.9)'   // Deep pink
                ];
                glitter.style.background = colors[Math.floor(Math.random() * colors.length)];

                cardElement.appendChild(glitter);

                // Remove glitter after animation
                setTimeout(() => {
                    if (glitter.parentNode) {
                        glitter.parentNode.removeChild(glitter);
                    }
                }, 2000);
            }

            // Smooth popup effects for hero buttons
            document.querySelectorAll('.hover-popup-btn').forEach(btn => {
                // Add click ripple effect only
                btn.addEventListener('click', function(e) {
                    const ripple = document.createElement('div');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        left: ${x}px;
                        top: ${y}px;
                        width: ${size}px;
                        height: ${size}px;
                        background: rgba(255, 255, 255, 0.2);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple-effect 0.4s ease-out;
                        pointer-events: none;
                        z-index: 1;
                    `;

                    this.appendChild(ripple);

                    setTimeout(() => {
                        if (ripple.parentNode) {
                            ripple.parentNode.removeChild(ripple);
                        }
                    }, 400);
                });
            });

            console.log('All features initialized');

            // Email click handler
            window.handleEmailClick = function(event) {
                event.preventDefault();
                
                const email = 'rafipramanaputra05@gmail.com';
                const subject = 'Project Discussion';
                const body = 'Hi Rafi,\n\nI would like to discuss a project with you.\n\nBest regards';
                
                // Gmail URL
                const gmailUrl = `https://mail.google.com/mail/?view=cm&to=${encodeURIComponent(email)}&su=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
                
                // Directly open Gmail
                window.open(gmailUrl, '_blank');
            };

            // Contact Form Submission
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = submitBtn.querySelector('.submit-text');
            const loadingText = submitBtn.querySelector('.loading-text');

            if (contactForm) {
                // Check if event listener already exists to prevent duplicates
                if (contactForm.hasAttribute('data-listener-attached')) {
                    console.log('Event listener already attached, skipping...');
                    return;
                }
                contactForm.setAttribute('data-listener-attached', 'true');
                
                contactForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    console.log('Form submission triggered');
                    
                    // Clear previous errors
                    document.querySelectorAll('.error-message').forEach(error => {
                        error.classList.add('hidden');
                        error.textContent = '';
                    });
                    
                    // Show loading state
                    submitBtn.disabled = true;
                    submitText.classList.add('hidden');
                    loadingText.classList.remove('hidden');
                    
                    try {
                        const formData = new FormData(contactForm);
                        const response = await fetch('{{ route("contact.store") }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            }
                        });
                        
                        const result = await response.json();
                        
                        if (result.success) {
                            // Show success message
                            showToast(result.message, 'success');
                            contactForm.reset();
                        } else {
                            // Show validation errors
                            if (result.errors) {
                                Object.keys(result.errors).forEach(field => {
                                    const errorDiv = document.querySelector(`#${field}`).nextElementSibling;
                                    if (errorDiv) {
                                        errorDiv.textContent = result.errors[field][0];
                                        errorDiv.classList.remove('hidden');
                                    }
                                });
                            }
                            showToast(result.message || 'Please check your input and try again.', 'error');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showToast('Sorry, there was an error sending your message. Please try again.', 'error');
                    } finally {
                        // Reset button state
                        submitBtn.disabled = false;
                        submitText.classList.remove('hidden');
                        loadingText.classList.add('hidden');
                    }
                });
            }


        }); // End of DOMContentLoaded

        // Additional CSS animations via JavaScript
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple-effect {
                to {
                    transform: scale(1.8);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

    </script>
@endsection
