<header class="rbt-header rbt-header-10">
       
        <!-- Start Header Top  -->
        
        <!-- End Header Top  -->
        <div class="rbt-header-wrapper header-space-betwween header-sticky">
            <div class="container-fluid">
                <div class="mainbar-row rbt-navigation-center align-items-center">
                    <div class="header-left rbt-header-content">
                        <div class="header-info">
                            <div class="logo">
                                <a href="index">
                                    <img src="{{asset('assets/images/logo/logo.png')}}" alt="Education Logo Images">
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
                                    <a class="activa" href="{{url('/')}}">Home</a>    
                                </li>

                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">Courses
                                        <i class="feather-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li class="has-dropdown"><a href="#">Professional Courses</a>
                                            <ul class="submenu">
                                                <li><a href="{{url('/webdev')}}">FullStack WebApp Development</a></li>
                                                <li><a href="{{url('/datascience')}}">Data Science</a></li>
                                                <li><a href="{{url('/mern')}}">MERN Stack</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="#">IT and Other Courses</a>
                                            <ul class="submenu">
                                                <li><a href="{{url('/olevel')}}">O level</a></li>
                                                <li><a href="{{url('/ccc')}}">CCC</a></li>
                                                <li><a href="{{url('/adca')}}">ADCA & DCA</a></li>
                                                <li><a href="{{url('/tally')}}">Tally with GST</a></li>
                                                <li><a href="{{url('/advancexcel')}}">Advanced Excel</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="#">Programming Languages</a>
                                            <ul class="submenu">
                                                <li><a href="{{url('/java')}}">Java</a></li>
                                                <li><a href="{{url('/cplus')}}">C++</a></li>
                                                <li><a href="{{url('/python')}}">Python</a></li>  
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="{{url('/internship')}}">Internship</a>
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="{{url('/development')}}">Development</a>    
                                </li>

                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="{{url('/gallery')}}">Gallery</a>    
                                </li>

                                <!--<li class="with-megamenu has-menu-child-item position-static">-->
                                <!--    <a href="{{url('/status')}}">Student Status</a>    -->
                                <!--</li>-->
                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="{{url('/verify')}}">Verification</a>    
                                </li>
                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a href="{{route('viewFeeForm')}}">Fee Status</a>    
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
                            <a class="rbt-btn rbt-marquee-btn marquee-auto btn-border-gradient radius-round btn-sm hover-transform-none" href="course">
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
                                    <a href="webdev">
                                        <img src="assets/images/course/course_01.jpg" alt="Fullstack Web App Development">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title"><a href="webdev">Fullstack Web App Development</a>
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
                                    <a href="datascience">
                                        <img src="assets/images/course/course_02.jpg" alt="Data Science">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title"><a href="datascience">Data Science</a>
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
                                    <a href="mern">
                                        <img src="assets/images/course/course_03.jpg" alt="MERN Stack">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title"><a href="mern">MERN Stack</a>
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