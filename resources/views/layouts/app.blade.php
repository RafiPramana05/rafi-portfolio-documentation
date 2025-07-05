<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rafi Pramana Putra - Portfolio</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @yield('header')
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            z-index: 10;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .floating:hover {
            transform: scale(1.2) rotate(10deg) translateY(-10px);
            color: #667eea;
            text-shadow: 0 0 20px rgba(102, 126, 234, 0.8);
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .glow {
            box-shadow: 0 0 30px rgba(102, 126, 234, 0.3);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .typing {
            overflow: hidden;
            border-right: .15em solid orange;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: orange; }
        }

        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .skill-bar {
            width: 0%;
            transition: width 2s ease-in-out;
            position: relative;
            overflow: hidden;
        }



        .skill-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .skill-bar-90-100 {
            background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%) !important;
        }

        .skill-bar-80-89 {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 50%, #1d4ed8 100%) !important;
        }

        .skill-bar-70-79 {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%) !important;
        }

        .skill-bar-60-69 {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%) !important;
        }

        .skill-bar-below-60 {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 50%, #b91c1c 100%) !important;
        }

        .skill-bar.animate-progress {
            animation: progressGrow 2s ease-out, pulse 2s infinite 2s;
        }

        @keyframes progressGrow {
            0% {
                width: 0%;
                transform: scaleY(1);
            }
            80% {
                transform: scaleY(1.1);
            }
            100% {
                transform: scaleY(1);
            }
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
                transform: scale(1);
            }
            50% {
                box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
                transform: scaleY(1.05);
            }
        }

        .navbar-blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .circle-animation {
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .pulse-border {
            animation: pulse-border 2s infinite;
        }

        @keyframes pulse-border {
            0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(102, 126, 234, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            margin: 50px 0;
        }

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

    /* Cursor Sparkle Effects */
    .cursor-sparkle {
        position: fixed;
        width: 6px;
        height: 6px;
        pointer-events: none;
        z-index: 9999;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,255,255,0.9) 20%, rgba(255,255,255,0.4) 50%, transparent 80%);
        box-shadow: 0 0 8px rgba(255,255,255,0.9), 0 0 16px rgba(255,255,255,0.6), 0 0 24px rgba(255,255,255,0.3);
        animation: sparkleFloat 1.2s ease-out forwards;
    }

    .cursor-sparkle.star {
        background: none;
        width: 12px;
        height: 12px;
    }

    .cursor-sparkle.star::before {
        content: '✦';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: rgba(255,255,255,0.95);
        font-size: 10px;
        text-shadow: 0 0 8px rgba(255,255,255,0.9), 0 0 16px rgba(255,255,255,0.6);
        animation: starTwinkle 1.2s ease-in-out infinite alternate;
    }

    @keyframes starTwinkle {
        0% { opacity: 0.7; transform: translate(-50%, -50%) scale(0.9); }
        50% { opacity: 1; transform: translate(-50%, -50%) scale(1.1); }
        100% { opacity: 0.7; transform: translate(-50%, -50%) scale(0.9); }
    }

    .cursor-trail {
        position: fixed;
        width: 4px;
        height: 4px;
        pointer-events: none;
        z-index: 9998;
        border-radius: 50%;
        background: rgba(255,255,255,0.6);
        box-shadow: 0 0 4px rgba(255,255,255,0.4);
        animation: trailFade 0.8s ease-out forwards;
    }

    @keyframes sparkleFloat {
        0% {
            opacity: 1;
            transform: scale(0) translateY(0px);
        }
        10% {
            opacity: 1;
            transform: scale(1) translateY(-2px);
        }
        100% {
            opacity: 0;
            transform: scale(0.3) translateY(-30px);
        }
    }

    @keyframes sparkleFall {
        0% {
            opacity: 1;
            transform: scale(0);
        }
        10% {
            opacity: 1;
            transform: scale(1);
        }
        100% {
            opacity: 0;
            transform: scale(0.2);
        }
    }

    @keyframes trailFade {
        0% {
            opacity: 0.8;
            transform: scale(1);
        }
        100% {
            opacity: 0;
            transform: scale(0.3);
        }
    }

    @keyframes shootingStar {
        0% {
            opacity: 1;
            transform: scale(0) translate(0, 0);
        }
        15% {
            opacity: 1;
            transform: scale(1) translate(5px, -5px);
        }
        100% {
            opacity: 0;
            transform: scale(0.1) translate(60px, -60px);
        }
    }

    .shooting-star {
        animation: shootingStar 2s ease-out forwards;
    }

    /* Honors & Awards Interactive Animations */
    .award-card {
        position: relative;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
    }

    .award-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(45deg) translate(-100%, -100%);
        transition: all 0.6s ease;
        opacity: 0;
        z-index: 1;
    }

    .award-card:hover::before {
        opacity: 1;
        transform: rotate(45deg) translate(100%, 100%);
    }

    .award-card:hover {
        transform: translateY(-20px) scale(1.05) !important;
        box-shadow: 0 30px 60px rgba(0,0,0,0.4), 0 0 40px rgba(255,255,255,0.2) !important;
    }

    /* Icon Animations */
    .trophy-icon, .medal-icon, .mic-icon, .graduate-icon, .star-icon, .speaker-icon {
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        transform-origin: center;
    }

    .award-card:hover .trophy-icon {
        animation: trophyBounce 0.8s ease-in-out;
        transform: scale(1.3) rotate(15deg);
    }

    .award-card:hover .medal-icon {
        animation: medalSpin 1s ease-in-out;
        transform: scale(1.3) rotateY(360deg);
    }

    .award-card:hover .mic-icon {
        animation: micPulse 0.6s ease-in-out infinite alternate;
        transform: scale(1.3);
    }

    .award-card:hover .graduate-icon {
        animation: capFloat 1s ease-in-out infinite;
        transform: scale(1.3);
    }

    .award-card:hover .star-icon {
        animation: starTwirl 1.2s ease-in-out infinite;
        transform: scale(1.3);
    }

    .award-card:hover .speaker-icon {
        animation: speakerShake 0.5s ease-in-out infinite;
        transform: scale(1.3);
    }

    /* Individual Icon Animations */
    @keyframes trophyBounce {
        0%, 20%, 60%, 100% { transform: scale(1.3) rotate(15deg) translateY(0); }
        40% { transform: scale(1.3) rotate(15deg) translateY(-20px); }
        80% { transform: scale(1.3) rotate(15deg) translateY(-10px); }
    }

    @keyframes medalSpin {
        0% { transform: scale(1.3) rotateY(0deg); }
        50% { transform: scale(1.4) rotateY(180deg); }
        100% { transform: scale(1.3) rotateY(360deg); }
    }

    @keyframes micPulse {
        0% { transform: scale(1.3); filter: brightness(1); }
        100% { transform: scale(1.4); filter: brightness(1.2); }
    }

    @keyframes capFloat {
        0%, 100% { transform: scale(1.3) translateY(0px) rotate(0deg); }
        25% { transform: scale(1.3) translateY(-10px) rotate(5deg); }
        75% { transform: scale(1.3) translateY(-5px) rotate(-5deg); }
    }

    @keyframes starTwirl {
        0% { transform: scale(1.3) rotate(0deg); }
        25% { transform: scale(1.4) rotate(90deg); }
        50% { transform: scale(1.3) rotate(180deg); }
        75% { transform: scale(1.4) rotate(270deg); }
        100% { transform: scale(1.3) rotate(360deg); }
    }

    @keyframes speakerShake {
        0%, 100% { transform: scale(1.3) translateX(0); }
        25% { transform: scale(1.3) translateX(-3px); }
        75% { transform: scale(1.3) translateX(3px); }
    }

    /* Shimmer/Glitter Effect */
    .award-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255,255,255,0.4), 
            rgba(255,255,255,0.6), 
            rgba(255,255,255,0.4), 
            transparent
        );
        transition: all 0.8s ease;
        z-index: 2;
        pointer-events: none;
    }

    .award-card:hover::after {
        left: 100%;
    }

    /* Glitter Particles */
    .glitter {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255,255,255,0.9);
        border-radius: 50%;
        pointer-events: none;
        z-index: 3;
        animation: glitterFloat 2s ease-out forwards;
    }

    .glitter.star-shape::before {
        content: '✨';
        position: absolute;
        top: -6px;
        left: -6px;
        font-size: 12px;
        color: rgba(255,255,255,0.8);
    }

    @keyframes glitterFloat {
        0% {
            opacity: 1;
            transform: translateY(0) scale(0);
        }
        20% {
            opacity: 1;
            transform: translateY(-20px) scale(1) rotate(180deg);
        }
        100% {
            opacity: 0;
            transform: translateY(-60px) scale(0) rotate(360deg);
        }
    }

    /* Award Badge Glow */
    .award-card:hover .bg-yellow-300,
    .award-card:hover .bg-pink-300,
    .award-card:hover .bg-cyan-300,
    .award-card:hover .bg-teal-300,
    .award-card:hover .bg-purple-300 {
        box-shadow: 0 0 20px currentColor;
        animation: badgeGlow 1.5s ease-in-out infinite alternate;
    }

    @keyframes badgeGlow {
        0% { box-shadow: 0 0 20px currentColor; }
        100% { box-shadow: 0 0 30px currentColor, 0 0 40px currentColor; }
    }

    /* Enhanced Custom Intro Animations */
    .custom-intro-hidden {
        opacity: 0;
        transform: translateY(50px);
        transition: all 1s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .custom-intro-slide-right {
        opacity: 0;
        transform: translateX(-80px);
        transition: all 1.2s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-slide-right.custom-intro-visible {
        opacity: 1;
        transform: translateX(0);
    }
    
    .custom-intro-slide-left {
        opacity: 0;
        transform: translateX(80px);
        transition: all 1.2s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-slide-left.custom-intro-visible {
        opacity: 1;
        transform: translateX(0);
    }
    
    .custom-intro-zoom-in {
        opacity: 0;
        transform: scale(0.7) rotate(10deg);
        transition: all 1.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-zoom-in.custom-intro-visible {
        opacity: 1;
        transform: scale(1) rotate(0deg);
    }
    
    .custom-intro-fade-up {
        opacity: 0;
        transform: translateY(60px);
        transition: all 1.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-fade-up.custom-intro-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .custom-intro-fade-down {
        opacity: 0;
        transform: translateY(-60px);
        transition: all 1.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-fade-down.custom-intro-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .custom-intro-hero-title {
        opacity: 0;
        transform: translateY(-50px) scale(0.8);
        transition: all 1.8s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-hero-title.custom-intro-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    .custom-intro-hero-subtitle {
        opacity: 0;
        transform: translateY(30px);
        transition: all 1.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-hero-subtitle.custom-intro-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .custom-intro-hero-buttons {
        opacity: 0;
        transform: translateY(40px) scale(0.9);
        transition: all 1.2s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-hero-buttons.custom-intro-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    .custom-intro-floating {
        opacity: 0;
        transform: scale(0) rotate(360deg);
        transition: all 1.6s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-floating.custom-intro-visible {
        opacity: 0.2;
        transform: scale(1) rotate(0deg);
    }
    
    .custom-intro-flip {
        opacity: 0;
        transform: rotateY(90deg) scale(0.8);
        transition: all 1.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-flip.custom-intro-visible {
        opacity: 1;
        transform: rotateY(0deg) scale(1);
    }
    
    .custom-intro-card {
        opacity: 0;
        transform: translateY(80px) rotateX(15deg);
        transition: all 1.2s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .custom-intro-card.custom-intro-visible {
        opacity: 1;
        transform: translateY(0) rotateX(0deg);
    }

    /* Delay classes for staggered animations */
    .custom-delay-100 { transition-delay: 0.1s; }
    .custom-delay-200 { transition-delay: 0.2s; }
    .custom-delay-300 { transition-delay: 0.3s; }
    .custom-delay-400 { transition-delay: 0.4s; }
    .custom-delay-500 { transition-delay: 0.5s; }
    .custom-delay-600 { transition-delay: 0.6s; }
    .custom-delay-700 { transition-delay: 0.7s; }
    .custom-delay-800 { transition-delay: 0.8s; }
    .custom-delay-900 { transition-delay: 0.9s; }
    .custom-delay-1000 { transition-delay: 1s; }
    .custom-delay-1200 { transition-delay: 1.2s; }
    .custom-delay-1500 { transition-delay: 1.5s; }
    .custom-delay-1800 { transition-delay: 1.8s; }
    .custom-delay-2000 { transition-delay: 2s; }
    </style>
</head>
<body class="bg-gray-900 text-white">
     <audio id="backgroundMusic" loop>
        <source src="{{ asset('music/Ben_Howard_Promise.mp3') }}" type="audio/mpeg">
    </audio>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <script>
        // Cursor Sparkle Effect
        let lastMousePosition = { x: 0, y: 0 };
        let sparkleInterval;
        let trailInterval;
        let isMouseMoving = false;
        let mouseStopTimeout;

        // Throttled mouse move for performance
        let mouseThrottle = false;
        
        function createSparkle(x, y, type = 'normal', directionX = 0, directionY = 0) {
            const sparkle = document.createElement('div');
            sparkle.className = type === 'star' ? 'cursor-sparkle star' : 'cursor-sparkle';
            
            // Add slight random offset for natural look
            const offsetX = (Math.random() - 0.5) * 10;
            const offsetY = (Math.random() - 0.5) * 10;
            
            sparkle.style.left = (x + offsetX) + 'px';
            sparkle.style.top = (y + offsetY) + 'px';
            
            // Create dynamic animation based on cursor direction
            const fallDistance = 40;
            const fallX = directionX * fallDistance * 0.3;
            const fallY = directionY * fallDistance * 0.3 + fallDistance; // Always fall down
            
            // Create custom keyframes for this sparkle
            const animationName = 'sparkle-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
            const keyframes = `
                @keyframes ${animationName} {
                    0% {
                        opacity: 1;
                        transform: scale(0) translate(0, 0);
                    }
                    10% {
                        opacity: 1;
                        transform: scale(1) translate(${fallX * 0.1}px, ${fallY * 0.1}px);
                    }
                    100% {
                        opacity: 0;
                        transform: scale(0.2) translate(${fallX}px, ${fallY}px);
                    }
                }
            `;
            
            // Add keyframes to document
            const style = document.createElement('style');
            style.textContent = keyframes;
            document.head.appendChild(style);
            
            // Apply animation
            sparkle.style.animation = `${animationName} 1.2s ease-out forwards`;
            
            document.body.appendChild(sparkle);
            
            // Remove sparkle and keyframes after animation
            setTimeout(() => {
                if (sparkle.parentNode) {
                    sparkle.parentNode.removeChild(sparkle);
                }
                if (style.parentNode) {
                    style.parentNode.removeChild(style);
                }
            }, 1200);
        }

        function createTrail(x, y) {
            const trail = document.createElement('div');
            trail.className = 'cursor-trail';
            
            // Slight random offset
            const offsetX = (Math.random() - 0.5) * 8;
            const offsetY = (Math.random() - 0.5) * 8;
            
            trail.style.left = (x + offsetX) + 'px';
            trail.style.top = (y + offsetY) + 'px';
            
            document.body.appendChild(trail);
            
            // Remove trail after animation
            setTimeout(() => {
                if (trail.parentNode) {
                    trail.parentNode.removeChild(trail);
                }
            }, 800);
        }

        function createShootingStar(x, y, directionX = 0, directionY = 0) {
            const star = document.createElement('div');
            star.className = 'cursor-sparkle star';
            
            star.style.left = x + 'px';
            star.style.top = y + 'px';
            
            // Create shooting star path based on cursor direction
            const shootDistance = 80;
            const shootX = directionX * shootDistance;
            const shootY = directionY * shootDistance * 0.5 + shootDistance * 0.7; // Mostly downward
            
            const animationName = 'shoot-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
            const keyframes = `
                @keyframes ${animationName} {
                    0% {
                        opacity: 1;
                        transform: scale(0) translate(0, 0);
                    }
                    15% {
                        opacity: 1;
                        transform: scale(1) translate(${shootX * 0.15}px, ${shootY * 0.15}px);
                    }
                    100% {
                        opacity: 0;
                        transform: scale(0.1) translate(${shootX}px, ${shootY}px);
                    }
                }
            `;
            
            const style = document.createElement('style');
            style.textContent = keyframes;
            document.head.appendChild(style);
            
            star.style.animation = `${animationName} 1.8s ease-out forwards`;
            
            document.body.appendChild(star);
            
            setTimeout(() => {
                if (star.parentNode) {
                    star.parentNode.removeChild(star);
                }
                if (style.parentNode) {
                    style.parentNode.removeChild(style);
                }
            }, 1800);
        }

        function handleMouseMove(e) {
            if (mouseThrottle) return;
            mouseThrottle = true;
            
            requestAnimationFrame(() => {
                mouseThrottle = false;
            });

            const currentX = e.clientX;
            const currentY = e.clientY;
            
            // Calculate movement distance and direction
            const deltaX = currentX - lastMousePosition.x;
            const deltaY = currentY - lastMousePosition.y;
            const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
            
            // Normalize direction
            const directionX = distance > 0 ? deltaX / distance : 0;
            const directionY = distance > 0 ? deltaY / distance : 0;

            if (distance > 3) {
                isMouseMoving = true;
                
                // Create sparkles based on movement speed with smoother distribution
                if (distance > 25) {
                    // Fast movement - create star sparkles
                    if (Math.random() > 0.3) {
                        createSparkle(currentX, currentY, 'star', directionX, directionY);
                    }
                    if (Math.random() > 0.5) {
                        createTrail(lastMousePosition.x, lastMousePosition.y);
                    }
                } else if (distance > 12) {
                    // Medium movement - regular sparkles
                    if (Math.random() > 0.6) {
                        createSparkle(currentX, currentY, 'normal', directionX, directionY);
                    }
                    if (Math.random() > 0.8) {
                        createTrail(lastMousePosition.x, lastMousePosition.y);
                    }
                } else if (distance > 6) {
                    // Slow movement - occasional sparkles
                    if (Math.random() > 0.85) {
                        createSparkle(currentX, currentY, 'normal', directionX, directionY);
                    }
                }

                // Random shooting star on very fast movement
                if (distance > 40 && Math.random() > 0.95) {
                    createShootingStar(currentX, currentY, directionX, directionY);
                }
            }

            lastMousePosition = { x: currentX, y: currentY };

            // Reset mouse stop timeout
            clearTimeout(mouseStopTimeout);
            mouseStopTimeout = setTimeout(() => {
                isMouseMoving = false;
            }, 150);
        }

        // Click sparkle burst
        function handleClick(e) {
            const x = e.clientX;
            const y = e.clientY;
            
            // Create burst of sparkles on click with random directions
            for (let i = 0; i < 5; i++) {
                setTimeout(() => {
                    const angle = (Math.PI * 2 * i) / 5; // Distribute evenly in circle
                    const dirX = Math.cos(angle) * 0.5;
                    const dirY = Math.sin(angle) * 0.5;
                    createSparkle(x, y, Math.random() > 0.5 ? 'star' : 'normal', dirX, dirY);
                }, i * 50);
            }
            
            // Create shooting star downward
            createShootingStar(x, y, 0, 1);
        }

        // Initialize cursor effects
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Cursor sparkle effects initialized');
            
            document.addEventListener('mousemove', handleMouseMove);
            document.addEventListener('click', handleClick);
            
            // Clean up any orphaned sparkles periodically
            setInterval(() => {
                const sparkles = document.querySelectorAll('.cursor-sparkle, .cursor-trail');
                sparkles.forEach(sparkle => {
                    if (parseFloat(getComputedStyle(sparkle).opacity) <= 0.1) {
                        if (sparkle.parentNode) {
                            sparkle.parentNode.removeChild(sparkle);
                        }
                    }
                });
            }, 5000);
            
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
                        navbar.style.background = 'rgba(17, 24, 39, 0.95)';
                        navbar.style.backdropFilter = 'blur(20px)';
                    } else {
                        navbar.style.background = 'rgba(255, 255, 255, 0.1)';
                        navbar.style.backdropFilter = 'blur(10px)';
                    }
                }
                navbarTicking = false;
            }

            function requestNavbarTick() {
                if (!navbarTicking) {
                    requestAnimationFrame(updateNavbar);
                    navbarTicking = true;
                }
            }

            window.addEventListener('scroll', requestNavbarTick);
        });
    </script>

</body>
</html>
