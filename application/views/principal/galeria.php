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
    <link href="<?php echo __GALERIA__;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="<?php echo __GALERIA__;?>css/main.css" rel="stylesheet">

    <!-- Supersized -->
    <link href="<?php echo __GALERIA__;?>css/supersized.css" rel="stylesheet">
    <link href="<?php echo __GALERIA__;?>css/supersized.shutter.css" rel="stylesheet">

    <!-- FancyBox -->
    <link href="<?php echo __GALERIA__;?>css/fancybox/jquery.fancybox.css" rel="stylesheet">

    <!-- Font Icons -->
    <link href="<?php echo __GALERIA__;?>css/fonts.css" rel="stylesheet">

    <!-- Responsive -->
    <link href="<?php echo __GALERIA__;?>css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo __GALERIA__;?>css/responsive.css" rel="stylesheet">


    <!-- Modernizr -->
<!--    <script src="<?php echo __GALERIA__;?>js/modernizr.js"></script>

</head>

<body>

<!-- Our Work Section -->
<div id="work" class="" style="padding-top: 50px;">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title"><?php echo $lst[0]->nombre;?></h2>
                    <h3 class="title-description"><?php echo $lst[0]->descrip;?></h3>
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
                                if($ls->enlace == ''){
                                    echo '
                                        <li class="item-thumbs span3 dise">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="'.$ls -> titulo.'" href="' . __IMG__ . 'galeria/' . $ls->imagen . '">
                                                <span class="overlay-img"></span>
                                                <span class="overlay-img-thumb font-icon-plus"></span>
                                            </a>
                                        <!-- Thumb Image and Description -->
                                            <img src="' . __IMG__ . 'galeria/medio/' . $ls->imagen . '" alt="'.$ls->detalle.'">
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li class="item-thumbs span3 dise">
                                        <!-- Fancybox Media - Gallery Enabled - Title - Link to Video -->
                                            <a class="hover-wrap fancybox-media" data-fancybox-group="gallery" title="'.$ls -> titulo.'" href="'.$ls->enlace.'">
                                                <span class="overlay-img"></span>
                                                <span class="overlay-img-thumb font-icon-plus"></span>
                                            </a>
                                            <!-- Thumb Image and Description -->
                                            <img src="' . __IMG__ . 'galeria/medio/' . $ls->imagen . '" alt="'.$ls->detalle.'">
                                        </li>

                                    ';
                                }
                            }
                        }

                        ?>

                        <!-- End Item Project -->
                    </ul>
                </section>
            </div>
            <div class="button-wrapper1 rigth">
                <a class="btn-big-green wow fadeIn " data-wow-duration="1s"
                   data-wow-delay="0.1s"
                   href="#" onclick="muestra('<?php echo $lst[0]->oidser;?>','0');"> <span><?php if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i')echo'All';
                        else echo 'Ver Todas Las Tecnicas';
                        ?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Portfolio Projects -->
</div>
</div>
<!-- End Our Work Section -->

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

<?php
/**
 * Created by PhpStorm.
 * User: judprog
 * Date: 28/04/15
 * Time: 12:00 PM
 */