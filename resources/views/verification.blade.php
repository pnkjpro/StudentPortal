<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Logic Era | IT Training, Development & Consultancy</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.css')
</head>

<body class="rbt-header-sticky">

    <!-- Start Header Area -->
    @include('layouts.header')
    <!-- Mobile Menu Section -->
    @include('layouts.popup-mobile-menu')
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
                        <div class="inner">
                              <div class="rbt-avatar">
                                <img src="assets/images/brand/niti-aayog.png" alt="bharat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                    <!-- it starts here -->
                        
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">Enter your Certificate Number</span>
                        </div>
                        <form method="POST" action="{{route('verifyCert')}}">
                            @csrf
                                <label>Certificate Number</label>
                                <input name="certNumber" type="text">
                                <input name="submit" type="submit" value="Download Certificate">
                        </form>
                        <p class="text-danger pt-5 fw-bold">@if (isset($error))
                            {{$error}}
                            @endif</p>
                    </div>
                    <!-- It ends here -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                    <div class="rbt-address">
                         <div class="inner">
                            <!--<h4 class="title">Contact us</h4>-->
                            <p><strong>ISO Certified</strong></p>
                            <p><strong>Govt.Reg:</strong>U85300JH2021NQL016677</p>
                            <p><strong>MSME:</strong>UP-30-0020675</p>
                            <p><strong>NITI Aayog:</strong>NITI500275890345</p>
                            <div class="rbt-avatar">
                                <img src="assets/images/brand/bharat.png" alt="bharat">
                            </div>
                            
                            
                            
                            
                            <!--<span>Phone:</span> <a href="#">+91 95191 86489</a><br>-->
                            <!--<span>Phone:</span> <a href="#">+91 84710 46210</a><br>-->
                            <!--<span>CONTACT US ON:</span> <a href="https://wa.me/+918795872877">WHATSAPP</a>-->
                            <!--<span>FOLLOW US ON:</span> <a href="https://www.instagram.com/logicera.in">INSTAGRAM</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




       <!-- Start Footer aera -->
       @include('layouts.footer')
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

@include('layouts.js')
</body>

</html>