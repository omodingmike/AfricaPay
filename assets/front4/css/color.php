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



.header .header-top,
.footer,
.contact .part-address .single-adress:hover,
.page-item.active .page-link,
.banner:after,
.circle,
.transaction .single-transaction.second .table-title,
.inventor .single-inventor .part-text .team-member-social ul li a,
.about:after,
.counter:after,
.plan .single-plan .part-button button, .plan .single-plan .part-button a,
.plan .single-plan:hover .part-parcent, .plan .single-plan.active .part-parcent,
.feature .single-feature:hover,
.how-it-works .single-works:hover,
.banner .banner-content .content-button a:hover,
.header .header-bottom .mainmenu .navbar .navbar-nav .nav-item.dropdown .dropdown-menu .dropdown-item:hover{
background: <?php echo $color ?>;
}

.plan .single-plan .part-button button, .plan .single-plan .part-button a,
.page-item.active .page-link,
.inventor .single-inventor .part-text .team-member-social ul li a{
border: 1px solid <?php echo $color ?>;
}

.plan .single-plan:hover h3, .plan .single-plan.active h3{
border-top: 2px solid <?php echo $color ?>;
}


.newsletter-form button {
    background: <?php echo $color ?>;
}


.section-title h2,
.page-link,
.plan .single-plan:hover .part-button button, .plan .single-plan.active .part-button button:hover{
color: <?php echo $color ?>;
}

.header .header-top .support-bar-left ul li span, .header .header-top .support-bar-right ul li span,
.banner .banner-content .content-button a,
.footer .footer-bottom .social a,
.how-it-works .single-works .part-icon,
.about .about-content .play-video a:hover,
.feature .single-feature .part-icon,
.login .part-form form button:hover,
.testimonial .single-testimonial .testimonial-top .part-icon,
.counter .single-counter .part-text span.count-name,
.plan .single-plan .part-button button:hover, .plan .single-plan .part-button a:hover,
.faq .accordion .card .card-header h5 button:after,
.footer .footer-top .useful-link ul li a span,
.contact .get-in-touch .part-form form button:hover,
.banner .banner-content .content-button a:last-child:hover,
.contact .part-address .single-adress .part-icon,
.header .header-bottom .mainmenu .navbar .navbar-nav .nav-item .nav-link:hover{
color: <?php echo $color2 ?>;
}

.banner .banner-content .content-button a,
.footer .footer-bottom .social a,
.login .part-form form button,
.contact .get-in-touch .part-form form textarea,
.contact .get-in-touch .part-form form input,
.contact .get-in-touch .part-form form button,
.contact .part-address .single-adress .part-icon,
.login .part-form form input, .login .part-form form .pranto-select,
.plan .single-plan:hover .part-button button, .plan .single-plan.active .part-button button,
.referral .left-side .single-level, .referral .right-side .pranto-level{
border: 1px solid <?php echo $color2 ?>;
}

.about .about-content:after,
.referral .left-side .single-level .part-parcent, .referral .right-side .single-level .pranto-parcent,
.about .about-content .play-video:after,
.plan .single-plan .part-parcent,
.testimonial-slider .owl-controls .owl-dots .owl-dot,
.transaction .single-transaction .table-title,
.inventor .single-inventor:hover .part-text,
.footer .footer-top .useful-link h3:after,
.login .part-form form button,
.banner .banner-content .content-button a:last-child,
.contact .get-in-touch .part-form form button,
.plan .single-plan:hover .part-button button, .plan .single-plan.active .part-button button,
.footer .footer-top .secure-area h3:after,
.about .about-content .play-video a{
background: <?php echo $color2 ?>;
}

.plan .single-plan h3{
border-top: 2px solid <?php echo $color2 ?>;
}

.counter .single-counter .part-icon{
border: 3px solid <?php echo $color2 ?>;
}

.transaction .single-transaction .parent-table .table tbody, .transaction .single-transaction .parent-table .table thead{
border-left: 1px solid <?php echo $color2 ?>;
border-right: 1px solid <?php echo $color2 ?>;
border-bottom: 1px solid <?php echo $color2 ?>;
}

.footer .footer-bottom{
border-top: 1px solid <?php echo $color2 ?>;
}