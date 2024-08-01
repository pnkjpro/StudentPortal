<?php
include 'admin/connection.php';
// $studentID='23A050411';
$studentID=$_POST["studentID"];
$query = "SELECT * FROM `candEnrolled` WHERE studentID='$studentID'";
$result = $conn->query($query);

$row = $result->fetch_assoc();

$fullname=$row['fullname'];
$mobile=$row['mobile'];
$course=$row['course'];
$disRec=$row['disReceived'];
$feeDue=$row['fdue']-0;
$feePaid=$row['fpaid'];
$totalFee=$row['totalFee'];
$totalfeeDue=$totalFee-$feePaid-$disRec;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Logic Era | IT Training, Development & Consultancy</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/plugins/sal.css">
    <link rel="stylesheet" href="assets/css/plugins/feather.css">
    <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/plugins/euclid-circulara.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper.css">
    <link rel="stylesheet" href="assets/css/plugins/magnify.css">
    <link rel="stylesheet" href="assets/css/plugins/odometer.css">
    <link rel="stylesheet" href="assets/css/plugins/animation.css">
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/plugins/magnigy-popup.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="rbt-header-sticky">

    <!-- Start Header Area -->
    <header class="rbt-header rbt-header-10">
       
        <!-- Start Header Top  -->
        
        <!-- End Header Top  -->
        <div class="rbt-header-wrapper header-space-betwween header-sticky">
            <div class="container-fluid">
                <div class="mainbar-row rbt-navigation-center align-items-center">
                    <div class="header-left rbt-header-content">
                        <div class="header-info">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/images/logo/logo.png" alt="Education Logo Images">
                                </a>
                            </div>
                        </div>
                        <div class="header-info">
                            
                        </div>
                    </div>

                    <div class="rbt-main-navigation d-none d-xl-block">
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu">
                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="index.html">Home</a>    
                                </li>

                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">Courses
                                        <i class="feather-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li class="has-dropdown"><a href="#">Professional Courses</a>
                                            <ul class="submenu">
                                                <li><a href="webdev.html">FullStack WebApp Development</a></li>
                                                <li><a href="datascience.html">Data Science</a></li>
                                                <li><a href="mern.html">MERN Stack</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="#">IT and Other Courses</a>
                                            <ul class="submenu">
                                                <li><a href="olevel.html">O level</a></li>
                                                <li><a href="ccc.html">CCC</a></li>
                                                <li><a href="adca.html">ADCA & DCA</a></li>
                                                <li><a href="tally.html">Tally with GST</a></li>
                                                <li><a href="advancexcel.html">Advanced Excel</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="#">Programming Languages</a>
                                            <ul class="submenu">
                                                <li><a href="java.html">Java</a></li>
                                                <li><a href="cplus.html">C++</a></li>
                                                <li><a href="python.html">Python</a></li>  
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="internship.html">Internship</a>
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="development.html">Development</a>    
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="gallery.html">Gallery</a>    
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="StudentStatus.php">Student Status</a>    
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="contact.html">Contact</a>    
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-right">

                        <!-- Navbar Icons -->
                        <ul class="quick-access">
                            <li class="access-icon">
                                <a class="search-trigger-active rbt-round-btn" href="#">
                                    <i class="feather-search"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="rbt-btn-wrapper d-none d-xl-block">
                            <a class="rbt-btn rbt-marquee-btn marquee-auto btn-border-gradient radius-round btn-sm hover-transform-none" href="course.html">
                                <span data-text="Enroll Now">Enroll Now</span>
                            </a>
                        </div>

                        <!-- Start Mobile-Menu-Bar -->
                        <div class="mobile-menu-bar d-block d-xl-none">
                            <div class="hamberger">
                                <button class="hamberger-button rbt-round-btn">
                                    <i class="feather-menu"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Start Mobile-Menu-Bar -->

                    </div>
                </div>
            </div>
            <!-- Start Search Dropdown  -->
            <div class="rbt-search-dropdown">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#">
                                <input type="text" placeholder="What are you looking for?">
                                <div class="submit-btn">
                                    <a class="rbt-btn btn-gradient btn-md" href="#">Search</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="rbt-separator-mid">
                        <hr class="rbt-separator m-0">
                    </div>

                    <div class="row g-4 pt--30 pb--60">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h5 class="rbt-title-style-2">Our Top Course</h5>
                            </div>
                        </div>

                        <!-- Start Single Card  -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="webdev.html">
                                        <img src="assets/images/course/course_01.jpg" alt="Fullstack Web App Development">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title"><a href="webdev.html">Fullstack Web App Development</a>
                                    </h5>
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 Reviews)</span>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                            <span class="current-price">INR 39000</span>
                                            <span class="off-price">INR 79000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="datascience.html">
                                        <img src="assets/images/course/course_02.jpg" alt="Data Science">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title"><a href="datascience.html">Data Science</a>
                                    </h5>
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 Reviews)</span>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                            <span class="current-price">INR 24999</span>
                                            <span class="off-price">INR 49000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="mern.html">
                                        <img src="assets/images/course/course_03.jpg" alt="MERN Stack">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title"><a href="mern.html">MERN Stack</a>
                                    </h5>
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 Reviews)</span>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <div class="rbt-price">
                                            <span class="current-price">INR 24999</span>
                                            <span class="off-price">INR 49999</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        
                        <!-- End Single Card  -->
                    </div>

                </div>
            </div>
            <!-- End Search Dropdown  -->
        </div>
        <!-- Start Side Vav -->
        
        <!-- End Side Vav -->
        <!-- <a class="rbt-close_side_menu" href="javascript:void(0);"></a> -->
    </header>
    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assets/images/logo/logo.png" alt="Education Logo Images">
                        </a>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">Our IT training institution provides industry-relevant courses to equip students with the skills needed to succeed in today's digital world. 
                    Our experienced instructors use a hands-on approach to teach programming languages, software development, cybersecurity, and more. 
                    Join us and jumpstart your career in IT.</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li>
                        <a href="mailto:info@logicera.in"><i class="feather-mail"></i>info@logicera.in</a>
                    </li>
                    <li>
                        <a href="tel:+919519186489"><i class="feather-phone"></i>+91 95191 86489, +91 84710 46210</a>
                    </li>
                </ul>
            </div>

            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li>
                        <a href="index.html">Home</a>
                    </li>

                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">Courses
                            <i class="feather-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            <li class="has-dropdown"><a href="#">Professional Courses</a>
                                <ul class="submenu">
                                    <li><a href="webdev.html">FullStack WebApp Development</a></li>
                                    <li><a href="datascience.html">Data Science</a></li>
                                    <li><a href="mern.html">MERN Stack</a></li>
                                    
                                </ul>
                            </li>
                            <li class="has-dropdown"><a href="#">IT and Other Courses</a>
                                <ul class="submenu">
                                    <li><a href="olevel">O level</a></li>
                                    <li><a href="ccc">CCC</a></li>
                                    <li><a href="adca.html">ADCA & DCA</a></li>
                                    <li><a href="tally.html">Tally with GST</a></li>
                                    <li><a href="advancexcel.html">Advanced Excel</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has-dropdown"><a href="#">Programming Languages</a>
                                <ul class="submenu">
                                    <li><a href="java.html">Java</a></li>
                                    <li><a href="cplus.html">C++</a></li>
                                    <li><a href="python.html">Python</a></li>      
                                </ul>
                            </li>


                        </ul>
                    </li>

                    <li>
                        <a href="internship.html">Internship</a>
                    </li>

                    <li>
                        <a href="development.html">Development</a>
                    </li>

                    <li>
                        <a href="gallery.html">Gallery</a>
                    </li>

                    <li>
                        <a href="about-us.html">About us</a>
                    </li>

                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="course.html">
                        <span>Enroll Now</span>
                    </a>
                </div>

                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">Find With Us</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                        <li><a href="https://www.facebook.com/logicera.in">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://www.twitter.com/logicera.in">
                                <i class="feather-twitter"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/logicera.in">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.linkdin.com/logicera.in">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Start Side Vav -->
    <!-- End Side Vav -->
    <!-- <a class="close_side_menu" href="javascript:void(0);"></a> -->

    <div class="rbt-conatct-area bg-gradient-11 rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb--60">
                        <span class="subtitle bg-secondary-opacity">Student Information</span>
                        
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                    <div class="rbt-address">
                         <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">Student ID: <?php echo $studentID; ?></span>
                        </div>
                        <div class="inner">
                            <h4 class="title"><?php echo $fullname; ?></h4>
                            <p>Fee Paid: <?php echo $feePaid; ?></p>
                            <!--<p>Total Fee Due: <?php echo $totalfeeDue; ?></p>-->
                             <p>Fee Due This Month: <?php echo $feeDue; ?></p>
                             <p>Course Enrolled: <?php echo $course; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                    <!-- it starts here -->
                        
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">Enter your Student ID</span>
                        </div>
                        <form method="POST" action="StudentStatus.php">
                                <label>Student ID</label>
                                <input name="studentID" type="text">
                                <input name="submit" type="submit" value="Get It Now">
                        </form>
                    </div>
                    <!-- It ends here -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                    <div class="rbt-address">
                         <div class="inner">
                            <h4 class="title">Contact us</h4>
                            <span>Phone:</span> <a href="#">+91 95191 86489</a><br>
                            <span>Phone:</span> <a href="#">+91 84710 46210</a><br>
                            <span>CONTACT US ON:</span> <a href="https://wa.me/+918795872877">WHATSAPP</a>
                            <span>FOLLOW US ON:</span> <a href="https://www.instagram.com/logicera.in">INSTAGRAM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




       <!-- Start Footer aera -->
       <footer class="rbt-footer footer-style-1">
        <div class="footer-top">
            <div class="container">
                <div class="row row--15 mt_dec--30">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/images/logo/logo.png" alt="Edu-cause">
                                </a>
                            </div>

                            <p class="description mt--20">We’re always in search for talented
                                and motivated people. Don’t be shy introduce yourself!
                            </p>

                            <div class="contact-btn mt--30">
                                <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="contact.html">
                                    <div class="icon-reverse-wrapper">
                                        <span class="btn-text">Contact With Us</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Useful Links</h5>
                            <ul class="ft-link">
                                <li>
                                    <a href="privacy-policy.html">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="terms-condition.html">Terms and condition</a>
                                </li>
                                <li>
                                    <a href="faqs.html">FAQs</a>
                                </li>
                                <li>
                                    <a href="course.html">Enroll Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Our Company</h5>
                            <ul class="ft-link">
                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li>
                                <li>
                                    <a href="career.html">Career</a>
                                </li>
                                <li>
                                    <a href="internship.html">Internship</a>
                                </li>
                                <li>
                                    <a href="development.html">Development</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Get Contact</h5>
                            <ul class="ft-link">
                                <li><span>Phone:</span> <a href="#">+91 95191 86489, +91 84710 46210</a></li>
                                <li><span>E-mail:</span> <a href="mailto:info@logicera.in">info@logicera.in</a></li>
                                <li><span>Location:</span> Noida Sector 16, UP</li>
                            </ul>
                            <ul class="social-icon social-default icon-naked justify-content-start mt--20">
                                <li><a href="https://www.facebook.com/logicera.in">
                                        <i class="feather-facebook"></i>
                                    </a>
                                </li>
                                <li><a href="https://www.twitter.com/logicera.in">
                                        <i class="feather-twitter"></i>
                                    </a>
                                </li>
                                <li><a href="https://www.instagram.com/logicera.in">
                                        <i class="feather-instagram"></i>
                                    </a>
                                </li>
                                <li><a href="https://www.linkdin.com/logicera.in">
                                        <i class="feather-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer aera -->
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright © 2023 <a href="#">Logic Era.</a> All Rights Reserved</p>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <ul class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                        <li><a href="terms-condition.html">Terms of service</a></li>
                        <li><a href="privacy-policy.html">Privacy policy</a></li>  
                        <li><a href="faqs.html">FAQs</a></li>  
                        <li><a href="course.html">Enroll Now</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->

</main>

<!-- End Page Wrapper Area -->
<div class="rbt-progress-parent">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="assets/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="assets/js/vendor/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.min.js"></script>
<!-- sal.js -->
<script src="assets/js/vendor/sal.js"></script>
<script src="assets/js/vendor/swiper.js"></script>
<script src="assets/js/vendor/magnify.min.js"></script>
<script src="assets/js/vendor/jquery-appear.js"></script>
<script src="assets/js/vendor/odometer.js"></script>
<script src="assets/js/vendor/backtotop.js"></script>
<script src="assets/js/vendor/isotop.js"></script>
<script src="assets/js/vendor/imageloaded.js"></script>

<script src="assets/js/vendor/wow.js"></script>
<script src="assets/js/vendor/waypoint.min.js"></script>
<script src="assets/js/vendor/easypie.js"></script>
<script src="assets/js/vendor/text-type.js"></script>
<script src="assets/js/vendor/jquery-one-page-nav.js"></script>
<script src="assets/js/vendor/bootstrap-select.min.js"></script>
<script src="assets/js/vendor/jquery-ui.js"></script>
<script src="assets/js/vendor/magnify-popup.min.js"></script>
<script src="assets/js/vendor/paralax-scroll.js"></script>
<script src="assets/js/vendor/paralax.min.js"></script>
<script src="assets/js/vendor/countdown.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>
</body>

</html>