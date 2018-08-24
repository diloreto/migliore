<!--
MMMMMMMM               MMMMMMMMIIIIIIIIII      GGGGGGGGGGGGGLLLLLLLLLLL             IIIIIIIIII     OOOOOOOOO     RRRRRRRRRRRRRRRRR   EEEEEEEEEEEEEEEEEEEEEE
M:::::::M             M:::::::MI::::::::I   GGG::::::::::::GL:::::::::L             I::::::::I   OO:::::::::OO   R::::::::::::::::R  E::::::::::::::::::::E
M::::::::M           M::::::::MI::::::::I GG:::::::::::::::GL:::::::::L             I::::::::I OO:::::::::::::OO R::::::RRRRRR:::::R E::::::::::::::::::::E
M:::::::::M         M:::::::::MII::::::IIG:::::GGGGGGGG::::GLL:::::::LL             II::::::IIO:::::::OOO:::::::ORR:::::R     R:::::REE::::::EEEEEEEEE::::E
M::::::::::M       M::::::::::M  I::::I G:::::G       GGGGGG  L:::::L                 I::::I  O::::::O   O::::::O  R::::R     R:::::R  E:::::E       EEEEEE
M:::::::::::M     M:::::::::::M  I::::IG:::::G                L:::::L                 I::::I  O:::::O     O:::::O  R::::R     R:::::R  E:::::E             
M:::::::M::::M   M::::M:::::::M  I::::IG:::::G                L:::::L                 I::::I  O:::::O     O:::::O  R::::RRRRRR:::::R   E::::::EEEEEEEEEE   
M::::::M M::::M M::::M M::::::M  I::::IG:::::G    GGGGGGGGGG  L:::::L                 I::::I  O:::::O     O:::::O  R:::::::::::::RR    E:::::::::::::::E   
M::::::M  M::::M::::M  M::::::M  I::::IG:::::G    G::::::::G  L:::::L                 I::::I  O:::::O     O:::::O  R::::RRRRRR:::::R   E:::::::::::::::E   
M::::::M   M:::::::M   M::::::M  I::::IG:::::G    GGGGG::::G  L:::::L                 I::::I  O:::::O     O:::::O  R::::R     R:::::R  E::::::EEEEEEEEEE   
M::::::M    M:::::M    M::::::M  I::::IG:::::G        G::::G  L:::::L                 I::::I  O:::::O     O:::::O  R::::R     R:::::R  E:::::E             
M::::::M     MMMMM     M::::::M  I::::I G:::::G       G::::G  L:::::L         LLLLLL  I::::I  O::::::O   O::::::O  R::::R     R:::::R  E:::::E       EEEEEE
M::::::M               M::::::MII::::::IIG:::::GGGGGGGG::::GLL:::::::LLLLLLLLL:::::LII::::::IIO:::::::OOO:::::::ORR:::::R     R:::::REE::::::EEEEEEEE:::::E
M::::::M               M::::::MI::::::::I GG:::::::::::::::GL::::::::::::::::::::::LI::::::::I OO:::::::::::::OO R::::::R     R:::::RE::::::::::::::::::::E
M::::::M               M::::::MI::::::::I   GGG::::::GGG:::GL::::::::::::::::::::::LI::::::::I   OO:::::::::OO   R::::::R     R:::::RE::::::::::::::::::::E
MMMMMMMM               MMMMMMMMIIIIIIIIII      GGGGGG   GGGGLLLLLLLLLLLLLLLLLLLLLLLLIIIIIIIIII     OOOOOOOOO     RRRRRRRR     RRRRRRREEEEEEEEEEEEEEEEEEEEEE

NGINX

-->
<?php
pixflow_decodeSetting();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-2252654-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

    gtag('config', 'UA-2252654-3');
  </script>
  

  <?php
    pixflow_metaPageType();
    ?>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">



    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- Theme Hook -->
    <?php
        wp_head();
    ?>
    <!-- Custom CSS -->

</head>

<body <?php body_class();?> >
    <?php do_action('pixflow_body_start'); ?>
    <div id="pageLoadingOverlay" class="<?php echo (pixflow_get_theme_mod('loading_type',PIXFLOW_LOADING_TYPE) == 'dark')? "dark-loading-overlay":"light-loading-overlay";?>">
        <h6 class='loading-text'>
            <img src=''><br>
            <div class="preloader-text"><?php echo nl2br(esc_textarea(pixflow_get_theme_mod('loading_text',PIXFLOW_LOADING_TEXT)));?></div>
        </h6>
    </div>
<?php
    //notification center
    if(pixflow_get_theme_mod('notification_enable',PIXFLOW_NOTIFICATION_ENABLE)||pixflow_get_theme_mod('search_enable',PIXFLOW_SEARCH_ENABLE)||pixflow_get_theme_mod('shop_cart_enable',PIXFLOW_SHOP_CART_ENABLE)){
        get_template_part('templates/notification');
    }
?>
<div class="layout-container" id="layoutcontainer">
        <div class="color-overlay color-type"></div>
        <div class="color-overlay texture-type"></div>
        <div class="color-overlay image-type"></div>
        <div class="texture-overlay"></div>
        <div class="bg-image"></div>
    <?php


    if( pixflow_get_theme_mod('header_theme',PIXFLOW_HEADER_THEME) == 'gather') {
        get_template_part('templates/header-gather-overlay');
    }
    ?>

    <div class="layout">
        <?php
        do_action('pixflow_before_header');
        ?>
        <!--End Header-->