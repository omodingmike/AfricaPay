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

.header-top-right ul li a:hover,
.slide-item .btn-base .btn1:hover,
.slide-item .btn-base .btn2,
.single-how-we-build-2 .icon,
.single-service-box-2 .icon,
.why-choose-area .subtitle,
.section-heading .subtitle,
.footer-nav li a:hover,
.post-title > a:hover, .post-meta > span a:hover,
.post-content > a:hover,
.recent-post-item .content .title a:hover,
.single-how-we-build-3 .icon,
.we-build-area .single-how-we-build .thumb .icon,
.we-build-area .single-how-we-build:hover .content .title{
color: <?php echo $color ?>;
}

.slide-item .btn-base .btn1,

.search-widget.widget .form-element .submit-btn,
.slide-item .btn-base .btn2{
border: 2px solid <?php echo $color ?>;
}

.pranto-border{
border: 1px solid <?php echo $color ?>;
}


.btn-base a,
.bg-main-color,
.contact-frm-btn a,
.team-member-social ul li a:hover,
.footer .footer-top h3:after,
.footer-social li a:hover,
.contact-frm-btn button,
.click-top a,
.we-build-area .single-how-we-build:hover .thumb .icon,
.search-widget.widget .form-element .submit-btn,
.blog-pagination .pagination li a:hover,
.btn-primary,
.btn-success,
.slide-item .btn-base .btn2:hover,
.panel-primary > .panel-heading,
.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus,
.site-preloader{
background-color: <?php echo $color ?>;
}

.colored-text{
color: <?php echo $color ?>;
}

.newsletter-form button {
    background: <?php echo $color ?>;
}


.call-to-action .btn-base .boxed-btn,
.click-top a:hover,

.contact-frm-btn button:hover, .contact-frm-btn a:hover{
background-color: <?php echo $color2 ?>;
}

.call-to-action .btn-base a:hover{
background-color: <?php echo hex2rgba2($color2, 0.80) ?>;
}

.footer-social li a:hover,
.blog-pagination .pagination li a:hover,
.btn-primary,
.panel-primary,
.slide-item .btn-base .btn2:hover,
.btn-success,
.panel-primary > .panel-heading,
.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus,
.form-control:focus{
border-color: <?php echo $color ?>;
}

nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .content ul.menu-col li a:hover, .side .widget ul.link li a:hover, .side .widget ul.link li a:focus, .check-list li:before, ul.cart-list > li > h6 > a, .attr-nav > ul > li > a:hover, .attr-nav > ul > li > a:focus, nav.navbar-sidebar ul.nav li.dropdown.on > a, nav.navbar-sidebar .dropdown .megamenu-content .col-menu.on .title, nav.navbar-sidebar ul.nav li.dropdown ul.dropdown-menu li a:hover, nav.navbar ul.nav li.dropdown.on > a, nav.navbar.navbar-inverse ul.nav li.dropdown.on > a, nav.navbar-sidebar ul.nav li.dropdown.on ul.dropdown-menu li.dropdown.on > a, nav.navbar .dropdown .megamenu-content .col-menu.on .title, nav.navbar ul.nav > li > a:hover, nav.navbar ul.nav > li.active > a:hover, nav.navbar ul.nav li.active > a, nav.navbar li.dropdown ul.dropdown-menu > li a:hover,
nav.navbar.navbar-transparent ul.nav > li > a:hover, nav.navbar.no-background ul.nav > li > a:hover, nav.navbar ul.nav li.scroll.active > a, nav.navbar.navbar-dark ul.nav li.dropdown ul.dropdown-menu > li > a:hover, nav.navbar ul.nav li.dropdown.on > a, nav.navbar-dark ul.nav li.dropdown.on > a{
color: <?php echo $color ?> ;
}

.click-top a:hover,
nav.navbar.navbar-transparent ul.nav > li > a:hover,
nav.navbar.no-background ul.nav > li > a:hover,
nav.navbar ul.nav li.scroll.active > a,
nav.navbar.navbar-dark ul.nav li.dropdown ul.dropdown-menu > li > a:hover,
nav.navbar ul.nav li.dropdown.on > a,
nav.navbar-dark ul.nav li.dropdown.on > a{
color: <?php echo $color ?> !important;
}

nav.navbar.bootsnav li.dropdown ul.dropdown-menu{
border-top: solid 4px <?php echo $color ?>!important;
}