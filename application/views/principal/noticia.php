<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="description" content="Insert Your Site Description" />

    <!-- Mobile Specifics -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>

    <!-- Mobile Internet Explorer ClearType Technology -->
    <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

    <!-- Bootstrap -->


    <!-- Main Style -->
    <link href="<?php echo __GALERIA__;?>css/main.css" rel="stylesheet">

    <!-- Supersized -->


    <!-- FancyBox -->
    <link href="<?php echo __GALERIA__;?>css/fancybox/jquery.fancybox.css" rel="stylesheet">

    <!-- Font Icons -->
    <link href="<?php echo __GALERIA__;?>css/fonts.css" rel="stylesheet">

    <!-- Responsive -->
    <link href="<?php echo __GALERIA__;?>css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo __GALERIA__;?>css/responsive.css" rel="stylesheet">


    <!-- Modernizr -->


</head>

<body>

<!-- Our Work Section -->
    <div id="work" class="" style="padding-top: 50px;">
        <div class="container">
            <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title"><?php echo $tb;?></h2>
                    </div>
                </div>
            </div>
            <!-- End Title Page -->

            <div class="span12">
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs">
                            <?php
                            if($lst != 0){
                                foreach($lst as $ls){
                                    echo '
                                    <li class="item-thumbs span3 dise">
                                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="'.$ls -> tit.'" href="' . __IMG__ . 'noticia/' . $ls->imagen . '">
                                            <span class="overlay-img"><center><h4>'.$ls->tit.'</h4></center></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                    <!-- Thumb Image and Description -->
                                        <img src="' . __IMG__ . 'noticia/medio/' . $ls->imagen . '" alt="'.$ls->des.'">
                                    </li>
                                    ';
                                }
                            }

                            ?>

                            <!-- End Item Project -->
                        </ul>
                    </section>

                </div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
    </div>
    </div>
    <!-- End Our Work Section -->
    <footer id="footer">
        <div class="wrapper5">
            <div class="width-wrapper width-wrapper__inset1 width-wrapper__inset3">
                <div class="container">
                    <div class="row">
                        <div class="grid_12">
                            <div class="privacy-block wow fadeIn" data-wow-duration="1s"
                                 data-wow-delay="0.1s">
                                <a href="#">MAMONSOFT</a> &copy; <span id="copyright-year"></span>|<a class="login" href="<?php echo site_url("panel") ?>">Intranet</a>
                                </a>
                                <div class="soc_icons" style="float: right;;">
                                    <ul class="list-unstyled">
                                        <li><a class="icon1" href="#" target="_blank"></a></li>
                                        <li><a class="icon2" href="#" target="_blank"></a></li>
                                        <li><a class="icon3" href="#" target="_blank"></a></li>
                                        <li><a class="icon4" href="#" target="_blank"></a></li>
                                        <div class="clearfix"></div>
                                    </ul>
                                </div>




                                <!--{%FOOTER_LINK} -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <link rel="stylesheet" href="<?php echo __CSS__;?>combo.css">
    <link href="<?php echo __PANEL__;?>css/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/animate.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/fonts.googleapis.com/css%3Ffamily=Lato:400.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/fonts.googleapis.com/css%3Ffamily=Lato:100.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/fonts.googleapis.com/css%3Ffamily=Lato:300.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/fonts.googleapis.com/css%3Ffamily=Lato:700.css">

    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/grid.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/search.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/contact-form.css">
    <!--<link rel='stylesheet' id='camera-css'  href='<?php echo __CSS__;?>cm/camera.css' type='text/css' media='all'>!-->
    <link rel="stylesheet" href="<?php echo __MAQ__;?>booking/css/booking.css">
    <link rel="stylesheet" href="<?php echo __MAQ__;?>css/style.css">
    <script	src="<?php echo __MAQ__;?>js/jquery.js"></script>
    <script src="<?php echo __JSVIEW__;?>general/Global.js"></script>
    <script	src="<?php echo __JSVIEW__;?>maqueta/<?php echo $js;?>.js"></script>
    <script src="<?php echo __GALERIA__;?>js/modernizr.js"></script>

    <!-- Js -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->
    <!--<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
    <script src="<?php echo __GALERIA__;?>js/supersized.3.2.7.min.js"></script> <!-- Slider -->
    <script src="<?php echo __GALERIA__;?>js/waypoints.js"></script> <!-- WayPoints -->
    <script src="<?php echo __GALERIA__;?>js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
    <script src="<?php echo __GALERIA__;?>js/jquery.isotope.js"></script> <!-- Isotope Filter -->
    <script src="<?php echo __GALERIA__;?>js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
    <script src="<?php echo __GALERIA__;?>js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
    <!--<script src="_include/js/jquery.tweet.js"></script> <!-- Tweet -->
    <script src="<?php echo __GALERIA__;?>js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
    <script src="<?php echo __GALERIA__;?>js/main.js"></script> <!-- Default JS -->
    <!-- End Js -->

    </body>
</html>