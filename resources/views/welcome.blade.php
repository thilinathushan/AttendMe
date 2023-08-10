@extends('layouts.Welcome_nav_layout')

@section('body-content')

<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out">
                    <h3>Discover a New Era of Attendance Tracking with <span>AttendMe!</span> </h3>
                    <h4>AttendMe revolutionizes attendance management with QR codes, transforming education by making tracking effortless, accurate, and environmentally friendly.</h4>
                    <div class="text-center text-lg-start">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">

                <img src="resources/home/Untitled-1.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section><!-- End Hero -->



<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="sec1">
            <div class="container">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
                        <a href="https://m.facebook.com/story.php?story_fbid=pfbid026kiLsmpx56P2VPttUzydZNMVtDKW18mWQrixS1uQoZDgCDeGq8fLwJsvuZRB4Qrul&id=100007746259010&mibextid=l2pjGR" class="glightbox play-btn mb-4"></a>
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
                        <h1> AttendMe !</h1>
                        <p>AttendMe is the brainchild of a dedicated team passionate about revolutionizing the education sector. Our goal is to bring innovative solutions that make learning and teaching more efficient, engaging, and enjoyable. With a deep understanding of technology's potential in education, we're committed to making a positive impact on how institutions handle attendance.</p>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-qr-code"></i></i></div>
                            <h4 class="title"><a href="">Generate</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-qr-code-scan"></i></div>
                            <h4 class="title"><a href="">Scan</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bi bi-check2-square"></i></i></div>
                            <h4 class="title"><a href="">Atendence</a></h4>
                            <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="laka">
            <div class="row container ">
                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">


                    <div>
                        <h1 class="pb-5">Meet the Team Behind AttendMe.</h1>

                        <p>Behind AttendMe's success story is a diverse and talented team of individuals driven by a common vision:
                            to simplify and elevate education processes. With expertise ranging from web development to user experience design, our team has poured their passion into creating a tool that empowers both educators and students.
                            Get to know the faces behind the innovation. Each member brings a unique perspective and skill set that has shaped AttendMe into what it is today</p>
                    </div>

                </div>
                <div class="col-xl-5 col-lg-6 icon-boxesn d-flex justify-content-center align-items-stretch">
                    <img id="imag_1" src="resources/home/thilina.jpeg" class=" rounded-circle img-fluid animated " alt="thilina">
                    <img id="imag_2" src="resources/home/laka.jpeg" class="rounded-circle img-fluid animated" alt="lakshan">
                </div>
            </div>
        </div>



    </section><!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">

                <h2>CONTACT US</h2>
            </div>

            <div class="row">

                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <a href="https://goo.gl/maps/a7wC6zmmSvDRS9eaA">
                                <p>University of Sri Jayewardenepura</p>
                            </a>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+94 112 801 025</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

                    <form action="#" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="Subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<!-- Remove the container if you want to extend the Footer to full width. -->
<div class=" my-5">
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #010479">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <section class="mt-5">
                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5">
                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="{{ route('welcome') }}" class="text-white">Home</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#about" class="text-white">About us</a>
                        </h6>
                    </div>
                    <!-- Grid column -->
                    @if (Route::has('login'))
                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            @auth
                            <a href="{{ url('/login') }}" class="text-white">Home</a>
                            @else
                            <a href="{{ route('login') }}" class="text-white">Login</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white">Register</a>
                            @endif
                            @endauth
                        </h6>
                    </div>
                    <!-- Grid column -->
                    @endif
                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#contact" class="text-white">Contact</a>
                        </h6>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-5" />

            <!-- Section: Text -->
            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>Welcome to AttendMe, your gateway to modern and hassle-free attendance management. Embrace the power of QR codes and bid farewell to the days of manual record-keeping. With AttendMe, attendance tracking becomes effortless, accurate, and environmentally friendly. Join us on this journey to transform the way education operates. </p>
                    </div>
                </div>
            </section>
            <!-- Section: Text -->

            <!-- Section: Social -->
            <section class="text-center mb-5">
                <a href="" class="text-white me-4">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="bi bi-google"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="bi bi-github"></i>
                </a>
            </section>
            <!-- Section: Social -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>
<!-- End of .container -->



@endsection