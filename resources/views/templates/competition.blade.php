<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title>{{$project->category}}</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href={{asset("assets/css/bootstrap.min.css")}} rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href={{asset("assets/css/font-awesome.min.css")}} rel="stylesheet">
    <link href={{asset("assets/css/et-line.css")}} rel="stylesheet">
    <link href={{asset("assets/css/ionicons.min.css")}} rel="stylesheet">
    <!-- Carousel CSS -->
    <link href={{asset("assets/css/owl.carousel.min.css")}} rel="stylesheet">
    <link href={{asset("assets/css/owl.theme.default.min.css")}} rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href={{asset("assets/css/animate.min.css")}}>
    <!-- Custom styles for this template -->
    <link href={{asset("assets/css/main.css")}} rel="stylesheet">
</head>
<body>
<div  id="template">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>

    <!--header start here -->
    <header class="header navbar fixed-top navbar-expand-md">
        <div class="container">
            <a class="navbar-brand logo" href="#">
                <img src={{asset("images/Standard_Bank_Logo.png")}} alt="Stanbic"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-text-align-right"></span>
            </button>
            <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
                <ul class=" nav navbar-nav menu">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#contact">Contact</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </header>
    <!--header end here-->

   <!--cover section slider -->
    <section id="home" class="home-cover">
        <div class="cover_slider owl-carousel owl-theme">
            <div class="cover_item" style="background: url(../storage/{{$image=$project->ProjectsPhoto->first()->filename}});">
                 <div class="slider_content">
                    <div class="slider-content-inner">
                        <div class="container">
                            <div class="slider-content-center">
                               
                                <strong class="cover-xl-text">{{$project->event_name}}</strong>
                                <div class="cover-date">
                                    {{$project->start_date->format('d-m-Y')}}
                                </div>
                                <div class="cover-date">
                                    {{$project->venue}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--event info -->
    <section class="pt100 pb100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3 col-md-3"></div>  
                <div class="col-3 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-calendar-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                DATE
                            </h5>
                            <p>
                                {{$project->start_date->format('d-m-Y')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3"></div> 
                <div class="col-3 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-location-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                location
                            </h5>
                            <p>
                                {{$project->venue}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--event info end -->


    <!--event countdown -->
    <section class="bg-img pt70 pb70" style="background-image: url('/assets/img/bg/bg-img.png');">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <h4 class="mb30 text-center color-light">Counter until the big event</h4>
                    <div class="countdown"></div>
                </div>
            </div>
        </div>

    </section>
    <!--event count down end-->


    <!--about the event -->
    <section id="about" class="pt100 pb100">
        <div class="container">
            <div class="section_title">
                <h3 class="title">
                    About the event
                </h3>
            </div>
            <div class="row justify-content-center description">
                <div class="col-12 col-md-8">
                     {{$project->description}}
                </div>
            </div>
        </div>
    </section>
    <!--about the event end -->


    <!--contact section -->
    <section id="contact" class="pt100 pb100">
        <div class="container">
            <div class="row justify-content-center mt100">
                <div class="col-md-6 col-12">
                    <div class="contact_info">
                        <h5>
                            Stanbic Events
                        </h5>
                        <p>
                             <b>Contact Us</b>
                        </p>
                        <ul class="social_list">
                            <li>
                                <a href="https://www.youtube.com/user/StanbicBankGh" target="blank"><i class="ion-social-youtube"></i></a>
                            </li>
                            <li>
                                <a href="https://web.facebook.com/StanbicBankGhana/" target="blank"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/StanbicBankGH" target="blank"><i class="ion-social-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/stanbic-bank-ghana-part-of-standard-bank-group-/" target="blank"><i class="ion-social-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/stanbicbankgh/" target="blank"><i class="ion-social-instagram"></i></a>
                            </li>
                        </ul>

                        <ul class="icon_list pt50">
                            <li>
                                <i class="ion-location"></i>
                                <span>
                                       215 South Liberation Link, Stanbic Height<br>
                                            Airport City, Accra
                                       </br>
                                </span>
                            </li>
                            <li>
                                <i class="ion-ios-telephone"></i>
                                <span>
                                        +233 (0) 302 815 789
                                </span>
                            </li>
                            <li>
                                <i class="ion-email-unread"></i>
                                <span>
                                        incubator@stanbic.com.gh
                                </span>
                            </li>

                            <li>
                                <i class="ion-planet"></i>
                                <span>
                                        https://stanbicbank.com.gh
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="contact_form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" cols="4" rows="4" placeholder="message"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-rounded btn-primary">send message</button>
                        </div>
                    </div>
                </div>
                @if(!empty($project->longitude))
                <div class="col-12 mt70">
                    <!--map -->
                    <div id="map" data-lon='{{$project->longitude}}' data-lat='{{$project->latitude}}' class="map"></div>
                    <!--map end-->
                </div>
                @endif
            </div>

        </div>
    </section>
    <!--contact section end -->


    <!--footer start -->
    <footer>
        <div class="container">
            <div class="row ">

                <div class="col-md-4  col-12">
                    <div class="footer_box">
                        
                        <div class="footer_box_body">
                            <p>
                                Stanbic Bank Ghana Limited is a financial services provider licensed by Bank of Ghana and Securities and Exchange Commission of Ghana with company registration number CS659892

                            </p>
                            <ul class="footer_social">
                                <li>
                                   <a href="https://www.youtube.com/user/StanbicBankGh" target="blank"><i class="ion-social-youtube"></i></a>
                               </li>
                               <li>
                                   <a href="https://web.facebook.com/StanbicBankGhana/" target="blank"><i class="ion-social-facebook"></i></a>
                               </li>
                               <li>
                                   <a href="https://twitter.com/StanbicBankGH" target="blank"><i class="ion-social-twitter"></i></a>
                               </li>
                               <li>
                                   <a href="https://www.linkedin.com/company/stanbic-bank-ghana-part-of-standard-bank-group-/" target="blank"><i class="ion-social-linkedin"></i></a>
                               </li>
                               <li>
                                   <a href="https://www.instagram.com/stanbicbankgh/" target="blank"><i class="ion-social-instagram"></i></a>
                               </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>

               
            </div>
        </div>
    </footer>
    <div class="copyright_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Stanbic Events <br>
    All rights reserved 
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
                <div class="col-12 col-md-6 ">
                    <ul class="footer_menu">
                        <li>
                            <a href="#home">Home</a>
                        </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                            <a href=#contact>Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--footer end -->
</div>
    <script>var start_date = '{{$project->start_date->format('Y-m-d')}}'</script>
    <!-- jquery-->
    <script src={{asset("assets/js/jquery.min.js")}}></script>
    <script src={{asset("assets/js/vue.min.js")}}></script>
    <!-- vue js -->
    <!-- bootstrap -->
    <script src={{asset("assets/js/popper.js")}}></script>
    <script src={{asset("assets/js/bootstrap.min.js")}}></script>
    <script src={{asset("assets/js/waypoints.min.js")}}></script>
    <!--slick carousel -->
    <script src={{asset("assets/js/owl.carousel.min.js")}}></script>
    <!--parallax -->
    <script src={{asset("assets/js/parallax.min.js")}}></script>
    <!--Counter up -->
    <script src={{asset("assets/js/jquery.counterup.min.js")}}></script>
    <!--Counter down -->
    <script src={{asset("assets/js/jquery.countdown.min.js")}}></script>
    <!-- WOW JS -->
    <script src={{asset("assets/js/wow.min.js")}}></script>
    <!--map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuahgsm_qfH1F3iywCKzZNMdgsCfnjuUA"></script>
    <!-- Custom js -->
    <script src={{asset("assets/js/main.js")}}></script>
</body>
</html>