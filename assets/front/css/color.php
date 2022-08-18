<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here
$color2 = "#746EF1"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}
function checkhexcolor2($color2) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}


if( isset( $_GET[ 'color2' ] ) AND $_GET[ 'color2' ] != '' ) {
    $color2 = "#".$_GET[ 'color2' ];
}

if( !$color OR !checkhexcolor2( $color2 ) ) {
    $color2 = "#746EF1";
}


function hex2rgba( $color, $opacity) {

    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
    if (strlen($color) == 6) {
        list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity.')';

    return $rgb;
}

function hex2rgba2( $color2, $opacity2) {

    if ($color2[0] == '#') {
        $color2 = substr($color2, 1);
    }
    if (strlen($color2) == 6) {
        list($r, $g, $b) = array($color2[0] . $color2[1], $color2[2] . $color2[3], $color2[4] . $color2[5]);
    } elseif (strlen($color2) == 3) {
        list($r, $g, $b) = array($color2[0] . $color2[0], $color2[1] . $color2[1], $color2[2] . $color2[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity2.')';

    return $rgb;
}


?>
    .section-title h2,
    .banner,
    .banner .banner-content .part-text a,
    .banner .banner-content .part-text a:before,
    .header .header-bottom .mainmenu .navbar .navbar-nav .nav-item.dropdown .dropdown-menu .dropdown-item:after,
    .counter .single-counter .part-icon:after,
    .counter .single-counter .part-text h3,
    .about .single-about .heading .part-icon i,
    .about .single-about a:after,
    .about .single-about a,
    .we-think-global,
    .we-think-global .part-left a,
    .we-think-global .part-right,
    .we-think-global .part-left a:before,
    .price .nav-tabs .nav-item .nav-link,
    .price .nav-tabs .nav-item .nav-link:hover, .price .nav-tabs .nav-item .nav-link.active,
    .price .single-price .part-top h3,
    .price .single-price .part-top h4,
    .price .single-price.special .part-top,
    .price .single-price .part-bottom a,.btn-primary,
    #investors .box .social_icon ul li a i,
    #investors .box .social_icon ul li a:hover,
    .newsletter-form,
    .newsletter .newsletter-form button,
    .newsletter:after,
    .blog-post .single-blog .part-text a.read-more:after,
    .page-title,
    .tsk-contact-info .icon-bar i,
    .blog-post .single-blog .part-text:after,
    .contact .contact-form .btn-contact,
    .transaction .transaction-area .tab-content .table,
    .price .single-price .part-bottom a, .btn-primary,
    .btn-success,
    .header .header-top .support-bar ul li select option{
        background-image: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
     }

    .loader--dot:first-child,
    .header .header-bottom.nav-fixed,
    .choosing-reason .single-reason .part-text a:hover,

    .blog-post .widget .widgettitle:after,
    .page-item.active .page-link,
    .scroll-to-top {
        background-color: <?php echo $color ?>;
    }

    .loader--dot:nth-child(2) {
        background-color: <?php echo $color2 ?>;
    }

    .loader--dot:nth-child(3) {
        background-color: <?php echo $color ?>;
    }

    .loader--dot:nth-child(4) {
        background-color: <?php echo $color2 ?>;
    }

    .loader--dot:nth-child(5) {
        background-color: <?php echo $color ?>;
    }

    .loader--dot:nth-child(6) {
        background-color: <?php echo $color2 ?>;
    }

    .loader--text,
    .counter .single-counter .part-icon,
    .we-think-global .part-right a:hover,
    .choosing-reason .single-reason .part-text a,
    .price .nav-tabs .nav-item .nav-link,
    .price .single-price .part-top,
    .blog-post .single-blog .part-text h3 a:hover,
    .blog-post .single-blog .part-text a.read-more,
    .blog-post .widget.widget-popular-post .single-post .part-text h4 a:hover,
    .contact .contact-form .form-group label .requred,
    a:hover,
    .page-link,
    .page-item.disabled .page-link
    {
        color: <?php echo $color ?>;
    }

    .choosing-reason .single-reason .part-text a,
    .price .single-price .part-top,
    .blog-post .single-blog .part-text a.read-more,
    .faq .accordion .card .card-header h5 button:after,
    .blog-post .single-blog,
    .btn-success,
    .btn-success:hover,
    .contact .contact-form [type="checkbox"]:not(:checked) + label:before, .contact .contact-form [type="checkbox"]:checked + label:before,
    .page-item.active .page-link,
    .price .nav-tabs .nav-item .nav-link{
        border: 1px solid <?php echo $color ?>;
    }

    .price .single-price .part-bottom a:hover,
    .newsletter .newsletter-form:after,
    .blog-post .single-blog .part-text:after,
    .contact .contact-form .btn-contact:hover,
    .btn-success:hover,
    .price .single-price .part-bottom a, .btn-primary,
    .contact .contact-form [type="checkbox"]:not(:checked) + label:after, .contact .contact-form [type="checkbox"]:checked + label:after,
    .swal-button,
    .newsletter .newsletter-form button:hover{
        background: -webkit-linear-gradient(-30deg, <?php echo $color2 ?> 0%, <?php echo $color ?> 100%);
    }

@media only screen and (max-width: 479px) and (min-width: 320px){
    .blog-post {
        background: transparent;
    }
    .transaction-area .table {
        width: 1000px;
    }
}

@media only screen and (min-width: 320px) {
    .blog-post {
        background: transparent;
    }
}

    .tsk-contact-info .contact-info-item,
    .contact .contact-form{
        box-shadow: 0px 0px 30px <?php echo hex2rgba($color, 0.15) ?>;
    }

    .contact .contact-form .form-group input.form-control,
    .contact .contact-form select,
    .contact .contact-form .form-group textarea{
        border: 1px solid <?php echo hex2rgba($color, 0.15) ?>;
        background: none;
        box-shadow: none;
    }

    .btn-secondary {
        color: #fff;
        background-color: #ec264a;
        border-color: #ec264a;
    }

    .btn-secondary:hover {
        color: #fff;
        background-color: #ff0000;
        border-color: #ff0000;
    }

    .blog-post .widget_search input{
        border:solid 1px <?php echo $color2 ?>;
    }
    .faq .accordion .card .card-header h5 button[aria-expanded="true"]:after {
    content: '\f068';
    color: #fff;
    background-image: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
}