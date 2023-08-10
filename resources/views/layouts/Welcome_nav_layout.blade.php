<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('libraries.styles')

    <style>
        /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
        body {
            font-family: "Open Sans", sans-serif;
            color: #444444;
        }

        a {
            color: #1acc8d;
            text-decoration: none;
        }

        a:hover {
            color: #34e5a6;
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif;
        }


        /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
        #header {
            height: 80px;
            transition: all 0.5s;
            z-index: 997;
            transition: all 0.5s;
            background: rgba(1, 4, 136, 0.9);
        }

        #header.header-transparent {
            background: transparent;
        }

        #header.header-scrolled {
            background: rgba(1, 4, 136, 0.9);
            height: 60px;
        }

        #header .logo h1 {
            font-size: 28px;
            margin: 0;
            padding: 0;
            line-height: 1;
            font-weight: 700;
        }

        #header .logo h1 a,
        #header .logo h1 a:hover {
            color: #fff;
            text-decoration: none;
        }

        #header .logo img {
            padding: 0;
            margin: 0;
            max-height: 40px;
        }

        /*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
        /**
* Desktop Navigation 
*/
        .navbar {
            padding: 0;
        }

        .navbar ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }

        .navbar li {
            position: relative;
        }

        .navbar a,
        .navbar a:focus {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0 10px 30px;
            font-size: 15px;
            font-weight: 500;
            font-family: "Poppins", sans-serif;
            color: rgba(255, 255, 255, 0.7);
            white-space: nowrap;
            transition: 0.3s;
        }

        .navbar a i,
        .navbar a:focus i {
            font-size: 12px;
            line-height: 0;
            margin-left: 5px;
        }

        .navbar>ul>li>a:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 3px;
            left: 30px;
            background-color: #1acc8d;
            visibility: hidden;
            width: 0px;
            transition: all 0.3s ease-in-out 0s;
        }

        .navbar a:hover:before,
        .navbar li:hover>a:before,
        .navbar .active:before {
            visibility: visible;
            width: 25px;
        }

        .navbar a:hover,
        .navbar .active,
        .navbar .active:focus,
        .navbar li:hover>a {
            color: #fff;
        }


        /**
* Mobile Navigation 
*/
        .mobile-nav-toggle {
            color: #fff;
            font-size: 28px;
            cursor: pointer;
            display: none;
            line-height: 0;
            transition: 0.5s;
        }

        @media (max-width: 991px) {
            .mobile-nav-toggle {
                display: block;
            }

            .navbar ul {
                display: none;
            }
        }

        .navbar-mobile {
            position: fixed;
            overflow: hidden;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: rgba(1, 3, 91, 0.9);
            transition: 0.3s;
            z-index: 999;
        }

        .navbar-mobile .mobile-nav-toggle {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .navbar-mobile ul {
            display: block;
            position: absolute;
            top: 55px;
            right: 15px;
            bottom: 15px;
            left: 15px;
            padding: 10px 0;
            border-radius: 8px;
            background-color: #fff;
            overflow-y: auto;
            transition: 0.3s;
        }

        .navbar-mobile>ul>li>a:before {
            left: 20px;
        }

        .navbar-mobile a,
        .navbar-mobile a:focus {
            padding: 10px 20px;
            font-size: 15px;
            color: #0205a1;
        }

        .navbar-mobile a:hover,
        .navbar-mobile .active,
        .navbar-mobile li:hover>a {
            color: #3f43fd;
        }

        .navbar-mobile .getstarted,
        .navbar-mobile .getstarted:focus {
            margin: 15px;
        }

        /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
        #hero {
            width: 100%;
            background-color: rgba(2, 5, 161, 0.91);
            position: relative;
            padding: 120px 0 0 0;
        }


        #hero h3 {
            margin: 0 0 20px 0;
            font-size: 40px;
            font-weight: 700;
            line-height: 56px;
            color: rgba(255, 255, 255, 0.8);
        }

        #hero h3 span {
            color: #fff;
            font-size: 48px;
            border-bottom: 4px solid #1acc8d;
        }

        #hero h4 {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            font-size: 24px;
        }

        #hero .btn-get-started {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 10px 30px;
            border-radius: 50px;
            transition: 0.5s;
            color: #fff;
            background: #1acc8d;
        }

        #hero .btn-get-started:hover {
            background: #17b57d;
        }

        #hero .animated {
            animation: up-down 2s ease-in-out infinite alternate-reverse both;
        }

        @media (min-width: 1024px) {
            #hero {
                background-attachment: fixed;
            }
        }

        @media (max-width: 991px) {
            #hero {
                padding-top: 80px;
            }

            #hero .animated {
                animation: none;
            }

            #hero .hero-img {
                text-align: center;

            }

            #hero .hero-img img {
                max-width: 50%;
            }

            #hero h1 {
                font-size: 28px;
                line-height: 32px;
                margin-bottom: 10px;
            }

            #hero h2 {
                font-size: 18px;
                line-height: 24px;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 575px) {
            #hero .hero-img img {
                width: 80%;
            }
        }

        @keyframes up-down {
            0% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        .hero-waves {
            display: block;
            margin-top: 60px;
            width: 100%;
            height: 60px;
            z-index: 5;
            position: relative;
        }

        .wave1 use {
            animation: move-forever1 10s linear infinite;
            animation-delay: -2s;
        }

        .wave2 use {
            animation: move-forever2 8s linear infinite;
            animation-delay: -2s;
        }

        .wave3 use {
            animation: move-forever3 6s linear infinite;
            animation-delay: -2s;
        }

        @keyframes move-forever1 {
            0% {
                transform: translate(85px, 0%);
            }

            100% {
                transform: translate(-90px, 0%);
            }
        }

        @keyframes move-forever2 {
            0% {
                transform: translate(-90px, 0%);
            }

            100% {
                transform: translate(85px, 0%);
            }
        }

        @keyframes move-forever3 {
            0% {
                transform: translate(-90px, 0%);
            }

            100% {
                transform: translate(85px, 0%);
            }
        }

        /*--------------------------------------------------------------
# About
--------------------------------------------------------------*/
        .about {
            padding: 40px 0 0 0;
        }

        .about .icon-boxes h1 {

            font-weight: 600;
            color: #010483;
            margin-bottom: 15px;
        }

        .about .icon-boxesn img {
            padding-top: 3vh;
            padding-right: 1%;
            padding-left: 10%;
        }

        /* .sec1{
  background-color: #d8d9fe;
} */
        .laka {
            background-color: #ebecfe;
        }

        #imag_1 {
            width: 80%;
            height: 80%;

        }

        #imag_2 {
            width: 80%;
            height: 80%;
        }

        .about .icon-boxesn img :hover #imag_1 {

            right: 30px;
            top: 20px;

        }

        .about .icon-boxesn img :hover #imag_2 {
            left: -30px;
            bottom: 20px;
        }

        .about .icon-box {
            margin-top: 40px;
        }

        .about .icon-box .icon {
            float: left;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            border: 2px solid #7ceec6;
            border-radius: 50px;
            transition: 0.5s;
        }

        .about .icon-box .icon i {
            color: #1acc8d;
            font-size: 32px;
        }

        .about .icon-box:hover .icon {
            background: #1acc8d;
            border-color: #1acc8d;
        }

        .about .icon-box:hover .icon i {
            color: #fff;
        }

        .about .icon-box .title {
            margin-left: 85px;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .about .icon-box .title a {
            color: #343a40;
            transition: 0.3s;
        }

        .about .icon-box .title a:hover {
            color: #1acc8d;
        }

        .about .icon-box .description {
            margin-left: 85px;
            line-height: 24px;
            font-size: 14px;
        }

        .about .video-box {
            background: url("resources/home/images (3).jpg") center center no-repeat;
            background-size: contain;
            min-height: 300px;
        }

        .about .play-btn {
            width: 94px;
            height: 94px;
            background: radial-gradient(#3f43fd 50%, rgba(63, 67, 253, 0.4) 52%);
            border-radius: 50%;
            display: block;
            position: absolute;
            left: calc(50% - 47px);
            top: calc(50% - 47px);
            overflow: hidden;
        }

        .about .play-btn::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-40%) translateY(-50%);
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 15px solid #fff;
            z-index: 100;
            transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

        .about .play-btn::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            animation-delay: 0s;
            animation: pulsate-btn 2s;
            animation-direction: forwards;
            animation-iteration-count: infinite;
            animation-timing-function: steps;
            opacity: 1;
            border-radius: 50%;
            border: 5px solid rgba(63, 67, 253, 0.7);
            top: -15%;
            left: -15%;
            background: rgba(198, 16, 0, 0);
        }

        .about .play-btn:hover::after {
            border-left: 15px solid #3f43fd;
            transform: scale(20);
        }

        .about .play-btn:hover::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-40%) translateY(-50%);
            width: 0;
            height: 0;
            border: none;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 15px solid #fff;
            z-index: 200;
            animation: none;
            border-radius: 0;
        }

        @keyframes pulsate-btn {
            0% {
                transform: scale(0.6, 0.6);
                opacity: 1;
            }

            100% {
                transform: scale(1, 1);
                opacity: 0;
            }
        }

        /*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
        #contact {
            padding-top: 20px;

        }

        .contact .info {
            width: 100%;
            background: #fff;
        }

        .contact .section-title h2 {
            color: #191a65;
            padding-bottom: 15px;
            font-size: 40px;
            font-weight: 700;
        }

        .contact .info i {
            font-size: 20px;
            color: #3f43fd;
            float: left;
            width: 44px;
            height: 44px;
            background: #f0f0ff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }

        .contact .info h4 {
            padding: 0 0 0 60px;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #010483;
        }

        .contact .info p {
            padding: 0 0 0 60px;
            margin-bottom: 0;
            font-size: 14px;
            color: #0205a1;
        }

        .contact .info .email,
        .contact .info .phone {
            margin-top: 40px;
        }

        .contact .info .email:hover i,
        .contact .info .address:hover i,
        .contact .info .phone:hover i {
            background: #1acc8d;
            color: #fff;
        }

        .contact .php-email-form {
            width: 100%;
            background: #fff;
        }

        .contact .php-email-form .form-group {
            padding-bottom: 8px;
        }

        .contact .php-email-form .error-message {
            display: none;
            color: #fff;
            background: #ed3c0d;
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        .contact .php-email-form .error-message br+br {
            margin-top: 25px;
        }

        .contact .php-email-form .sent-message {
            display: none;
            color: #fff;
            background: #18d26e;
            text-align: center;
            padding: 15px;
            font-weight: 600;
        }

        .contact .php-email-form .loading {
            display: none;
            background: #fff;
            text-align: center;
            padding: 15px;
        }

        .contact .php-email-form .loading:before {
            content: "";
            display: inline-block;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            margin: 0 10px -6px 0;
            border: 3px solid #18d26e;
            border-top-color: #eee;
            animation: animate-loading 1s linear infinite;
        }

        .contact .php-email-form input,
        .contact .php-email-form textarea {
            border-radius: 0;
            box-shadow: none;
            font-size: 14px;
        }

        .contact .php-email-form input {
            height: 44px;
        }

        .contact .php-email-form textarea {
            padding: 10px 12px;
        }

        .contact .php-email-form button[type=submit] {
            background: #1acc8d;
            border: 0;
            padding: 10px 30px;
            color: #fff;
            transition: 0.4s;
            border-radius: 50px;
        }

        .contact .php-email-form button[type=submit]:hover {
            background: #34e5a6;
        }

        @keyframes animate-loading {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <header id="header" class="fixed-top d-flex align-items-center header-transparent header-scrolled ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html"><span>AttendMe </span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class="nav-item">
                        <a class="nav-link scrollto active" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item  scrollto ">
                        <a class="nav-link scrollto " href="#about">About</a>
                    </li>

                    @if (Route::has('login'))
                    <li class="nav-item">
                        @auth
                        <a class="nav-link scrollto " href="{{ url('/login') }}">Home</a>
                        @else
                        <a class="nav-link scrollto " href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a class="nav-link scrollto " href="{{ route('register') }}">Register</a>
                        @endif
                        @endauth
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#contact">Contact</a>
                    </li>




                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <script>
        (function() {
            "use strict";

            /**
             * Easy selector helper function
             */
            const select = (el, all = false) => {
                el = el.trim()
                if (all) {
                    return [...document.querySelectorAll(el)]
                } else {
                    return document.querySelector(el)
                }
            }

            /**
             * Easy event listener function
             */
            const on = (type, el, listener, all = false) => {
                let selectEl = select(el, all)
                if (selectEl) {
                    if (all) {
                        selectEl.forEach(e => e.addEventListener(type, listener))
                    } else {
                        selectEl.addEventListener(type, listener)
                    }
                }
            }

            /**
             * Easy on scroll event listener 
             */
            const onscroll = (el, listener) => {
                el.addEventListener('scroll', listener)
            }

            /**
             * Navbar links active state on scroll
             */
            let navbarlinks = select('#navbar .scrollto', true)
            const navbarlinksActive = () => {
                let position = window.scrollY + 200
                navbarlinks.forEach(navbarlink => {
                    if (!navbarlink.hash) return
                    let section = select(navbarlink.hash)
                    if (!section) return
                    if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                        navbarlink.classList.add('active')
                    } else {
                        navbarlink.classList.remove('active')
                    }
                })
            }
            window.addEventListener('load', navbarlinksActive)
            onscroll(document, navbarlinksActive)

            /**
             * Scrolls to an element with header offset
             */
            const scrollto = (el) => {
                let header = select('#header')
                let offset = header.offsetHeight

                if (!header.classList.contains('header-scrolled')) {
                    offset -= 20
                }

                let elementPos = select(el).offsetTop
                window.scrollTo({
                    top: elementPos - offset,
                    behavior: 'smooth'
                })
            }

            /**
             * Toggle .header-scrolled class to #header when page is scrolled
             */
            let selectHeader = select('#header')
            if (selectHeader) {
                const headerScrolled = () => {
                    if (window.scrollY > 100) {
                        selectHeader.classList.add('header-scrolled')
                    } else {
                        selectHeader.classList.remove('header-scrolled')
                    }
                }
                window.addEventListener('load', headerScrolled)
                onscroll(document, headerScrolled)
            }



            /**
             * Mobile nav toggle
             */
            on('click', '.mobile-nav-toggle', function(e) {
                select('#navbar').classList.toggle('navbar-mobile')
                this.classList.toggle('bi-list')
                this.classList.toggle('bi-x')
            })



            /**
             * Scrool with ofset on links with a class name .scrollto
             */
            on('click', '.scrollto', function(e) {
                if (select(this.hash)) {
                    e.preventDefault()

                    let navbar = select('#navbar')
                    if (navbar.classList.contains('navbar-mobile')) {
                        navbar.classList.remove('navbar-mobile')
                        let navbarToggle = select('.mobile-nav-toggle')
                        navbarToggle.classList.toggle('bi-list')
                        navbarToggle.classList.toggle('bi-x')
                    }
                    scrollto(this.hash)
                }
            }, true)

            /**
             * Scroll with ofset on page load with hash links in the url
             */
            window.addEventListener('load', () => {
                if (window.location.hash) {
                    if (select(window.location.hash)) {
                        scrollto(window.location.hash)
                    }
                }
            });



            /**
             * Initiate glightbox
             */
            const glightbox = GLightbox({
                selector: '.glightbox'
            });

            /**
             * Initiate gallery lightbox 
             */
            const galleryLightbox = GLightbox({
                selector: '.gallery-lightbox'
            });

            /**
             * Testimonials slider
             */
            new Swiper('.testimonials-slider', {
                speed: 600,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                slidesPerView: 'auto',
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true
                }
            });

            /**
             * Animation on scroll
             */
            window.addEventListener('load', () => {
                AOS.init({
                    duration: 1000,
                    easing: 'ease-in-out',
                    once: true,
                    mirror: false
                })
            });

            /**
             * Initiate Pure Counter 
             */
            new PureCounter();

        })()
    </script>
    @yield('body-content')
    @include('libraries.script')

</body>

</html>