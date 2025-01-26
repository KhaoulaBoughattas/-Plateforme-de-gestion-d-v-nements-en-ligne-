<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <title>Gestion d'Événements</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Une plateforme pour organiser et gérer des événements.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
    <style>
        .slider-area {
            background-image: url('assets/img/backgrounf.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt="Gestion d'Événements"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                            <li><a href="#services">Services</a></li>
                                            <li><a href="user_dashboard.php">Dashboard</a></li>
                                            <li><a href="#feature" >features</a></li>
                                    </ul>
                                </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="logout.php" class="btn">Se déconnecter</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<main>
    <!-- Hero Section -->
    <div class="container-fluid bg-primary py-5 text-center text-white">
    <h1>Bienvenue, <?= htmlspecialchars($_SESSION['user_name']); ?>!</h1>
    <p class="lead">Explore our premium image classification services tailored just for you.</p>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
      <!-- Services Section Start -->
<div class="container my-5" id="service">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
        <h4 class="mb-1 text-primary">Our Service</h4>
        <h1 class="display-5 mb-4">What We Can Do For You</h1>
        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, illo.</p>
    </div>
    <!-- Row for service items -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item text-center rounded p-4">
                <div class="service-icon d-inline-block bg-light rounded p-4 mb-4">
                    <i class="fas fa-image fa-5x text-secondary"></i>
                </div>
                <div class="service-content">
                    <h4>Créer un événement</h4>
                    <p>Créez et publiez un événement avec des détails complets : date, lieu, description, et plus.</p>
                    <a href="create_event.html" class="btn btn-primary">Créer un événement</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item text-center rounded p-4">
                <div class="service-icon d-inline-block bg-light rounded p-4 mb-4">
                    <i class="fas fa-cogs fa-5x text-secondary"></i>
                </div>
                <div class="service-content">
                    <h4 class="mb-4">Modifier tes événements. </h4>
                    <p class="mb-4">Lorem ipsum dolor sit amet.</p>
                    <a href="edit_event.php" class="btn btn-primary">Modifier</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item text-center rounded p-4">
                <div class="service-icon d-inline-block bg-light rounded p-4 mb-4">
                    <i class="fas fa-cogs fa-5x text-secondary"></i>
                </div>
                <div class="service-content">
                    <h4 class="mb-4">Supprimer tes événements. </h4>
                    <p class="mb-4">Lorem ipsum dolor sit amet.</p>
                    <a href="delete_event.php" class="btn btn-primary">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services Section End -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!--? Events Area Start -->

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-8">
        <div class="section-tittle text-center mb-50">
            <h2>Upcoming Events</h2>
            <p>Discover a variety of upcoming events tailored to inspire, connect, and educate.</p>
            <a href="listes_events.php" class="btn btn-primary mt-30">See All Events</a>
        </div>
    </div>
</div>

<section class="event-area pt-180 pb-100 section-bg" style="background-image:url('assets/img/gallery/section_bg02.png'); background-size: cover;">
    <div class="container">
        <!-- Event Cards -->
        <div class="row">
            <!-- Event Card 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="assets/img/img4.jpeg" class="card-img-top img-fixed" alt="Event1">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Annual Tech Conference</h5>
                        <p class="card-text">An inspiring day with top tech talks and networking opportunities.</p>
                        <p><strong>Date:</strong> December 12, 2024</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="assets/img/hero/h1_hero.png" class="card-img-top img-fixed" alt="Event2">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Workshop: Data Science Essentials</h5>
                        <p class="card-text">Hands-on workshop covering the foundations of data science.</p>
                        <p><strong>Date:</strong> January 5, 2025</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="assets/img/imgage.jpeg" class="card-img-top img-fixed" alt="Event3">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">AI & Machine Learning Summit</h5>
                        <p class="card-text">Join industry leaders in exploring the latest in AI and machine learning.</p>
                        <p><strong>Date:</strong> February 15, 2025</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 4 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="assets/img/img1.jpeg" class="card-img-top img-fixed" alt="Event4">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Cybersecurity Workshop</h5>
                        <p class="card-text">Master the fundamentals of cybersecurity in this in-depth workshop.</p>
                        <p><strong>Date:</strong> March 10, 2025</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 5 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="assets/img/img2.jpeg" class="card-img-top img-fixed" alt="Event5">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Blockchain and Cryptocurrency Forum</h5>
                        <p class="card-text">A deep dive into the world of blockchain and cryptocurrency.</p>
                        <p><strong>Date:</strong> April 8, 2025</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 6 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="assets/img/img3.jpeg" class="card-img-top img-fixed" alt="Event6">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Cloud Computing Workshop</h5>
                        <p class="card-text">Learn about cloud computing and its practical applications.</p>
                        <p><strong>Date:</strong> May 22, 2025</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Events Area End -->

<style>
    .img-fixed {
        width: 100%; /* Set width to 100% for responsive behavior */
        height: 200px; /* Set a fixed height */
        object-fit: cover; /* Crop images to fit without distortion */
    }
</style>


    
        
    <!--? gallery Products Start -->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Products End -->
    <!--? Brand Area Start-->
    <section class="work-company section-padding30" style="background: #2e0e8c;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-8">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-50">
                        <h2>Our Top Genaral Sponsors.</h2>
                        <p>There arge many variations ohf passages of sorem gp ilable, but the majority have ssorem gp iluffe.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="logo-area">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-logo mb-30">
                                    <img src="assets/img/gallery/cisco_brand.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-logo mb-30">
                                    <img src="assets/img/gallery/cisco_brand2.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-logo mb-30">
                                    <img src="assets/img/gallery/cisco_brand3.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-logo mb-30">
                                    <img src="assets/img/gallery/cisco_brand4.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-logo mb-30">
                                    <img src="assets/img/gallery/cisco_brand5.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-logo mb-30">
                                    <img src="assets/img/gallery/cisco_brand6.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Area End-->
    
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                 <h4>About Us</h4>
                                 <div class="footer-pera">
                                     <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so behold.</p>
                                </div>
                             </div>
                         </div>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address :Your address goes here, your demo address.</p>
                                    </li>
                                    <li><a href="#">Phone : +8880 44338899</a></li>
                                    <li><a href="#">Email : info@colorlib.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="#"> View Project</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Testimonial</a></li>
                                    <li><a href="#">Proparties</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                 <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                             </div>
                             <!-- Form -->
                             <div class="footer-form" >
                                 <div id="mc_embed_signup">
                                     <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                     method="get" class="subscribe_form relative mail_part">
                                         <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                         class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                         onblur="this.placeholder = ' Email Address '">
                                         <div class="form-icon">
                                             <button type="submit" name="submit" id="newsletter-submit"
                                             class="email_icon newsletter-submit button-contactForm"><img src="assets/img/gallery/form.png" alt=""></button>
                                         </div>
                                         <div class="mt-10 info"></div>
                                     </form>
                                 </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  -->
               <div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>5000+</span>
                        <p>Talented Hunter</p>
                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <!-- Footer Bottom Tittle -->
                        <div class="footer-tittle-bottom">
                            <span>568</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-8 ">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4">
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
    </body>
</html>