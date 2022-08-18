<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
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


?>
.header-wrapper .navbar-default .navbar-collapse.collapse .navbar-nav li.menu-active a
{
   color: <?php echo  $color ?>;
}


.app-header,
.btn-primary,
.app-menu__item.active, .app-menu__item:hover, .app-menu__item:focus,
.treeview.is-expanded [data-toggle='treeview'],
.treeview-item.active, .treeview-item:hover, .treeview-item:focus,
.btn-primary:hover,
.app-sidebar__toggle:focus, .app-sidebar__toggle:hover,
.page-item.active .page-link,
button.dt-button,
.swal-button
{
   background: <?php echo  $color ?> !important;
}

.app-title
{
    color:<?php echo  $color ?>;;
}

.btn-primary,
.page-item.active .page-link
{
    border-color: <?php echo  $color ?>;
}

.header-wrapper .navbar-default .navbar-collapse.collapse .navbar-nav li.menu-active a,
.treeview.is-expanded [data-toggle='treeview'],
.app-menu__item.active, .app-menu__item:hover, .app-menu__item:focus
{
    border-left-color: <?php echo  $color ?>;
}

.app-header__logo
{
    background-color: <?php echo hex2rgba($color, 0.7);?>
}
