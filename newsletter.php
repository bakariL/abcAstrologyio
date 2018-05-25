<?php /* Template Name: Newsletter Subscription */ ?>
<!doctype html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#403c50">
        <meta name="msapplication-TileImage" content="<?php echo get_bloginfo('template_directory'); ?>/assets/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#403c50">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>ABC Astrology</title>
        
        <link rel="stylesheet" href="https://use.typekit.net/voh0idg.css">
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/responsive.css">
    </head>

    <body>
        
        <header class="short">
            <div class="container">
                <div class="top-navigation">
                    <a href="<?php echo home_url(); ?>"><div class="logo"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/logo.svg"></div></a>
                    
                    <?php
                        if ( is_user_logged_in() ) {
                            
                            $current_user = wp_get_current_user();
                            echo '<a href="'.home_url().'/account"  class="user-action">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</a>';
                            echo '<a href="'.home_url().'/logout"  class="user-action">Logout</a>';
                            
                            
                        } else {
                            echo '<a href="'.home_url().'/register"><button class="primary-button">Sign up for free</button></a>';
                            echo '<a href="'.home_url().'/login"  class="user-action">Log In</a>';
                        }
                    ?>
                                  
                </div>
            </div>    
        </header>
        
        <section>
            <div class="container">
                <h1>Newsletter Subscription</h1>
                
                <?php woocommerce_content(); ?>  
                
            </div>
        </section>
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/general.js"></script>
        
    </body>

</html>