<?php /* Template Name: Select Report */ ?>
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
                            echo '<a href="'.home_url().'/login"  class="user-action">Log In</a>';
                        }
                    ?>
                                  
                </div>
            </div>    
        </header>
        
        <section class="select-report">
            <div class="container">
                <?php 
                
                $reportIdentifier = $_GET['i']; 
                $user_id = $_GET['u'];
                $user_info = get_userdata($user_id);
                
                $email = $user_info->user_email;                
                $firstname = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_firstname', true);
                $lastname = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_lastname', true);
                $birthday = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_birthday', true);
                $gender = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_gender', true);
                
                $date = date_create($birthday);
                $birthday = date_format($date, 'M d, Y');
                
                $reportID = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_report', $single);
                
                
                echo "<h1>".$firstname." <span> ".$lastname."</span></h1>";
                echo "<p><b>".$birthday."</b></p>";
                echo "<p>".$gender."</p>";
                echo "<p>".$email."</p>";
                
                ?>
                <form class="select-reports form">
                    <input id="user" type="hidden" value="<?php echo $user_id; ?>">
                    <input id="identifier" type="hidden" value="<?php echo $reportIdentifier; ?>">
                    <select id="reports" class="inline">
                        <option disabled <?php if($reportID == '') echo "selected"; ?>>Select Report:</option>
                        <?php
                        $args = array(
                            'post_category'  => 'free-saturn-reports',
                            'posts_per_page'   => 100,);
                        $postslist = get_posts( $args );

                        foreach($postslist as $post){
                            $ifSelected = '';
                            $tags = wp_get_post_tags($post->ID);
                            if($tags[0]->name == $reportID)
                                $ifSelected = 'selected';
                            echo "<option value='".$tags[0]->name."' ".$ifSelected.">".$post->post_title."</option>";
                        }                    

                        ?>
                    </select>
                    <button class="primary-button cta inline">Submit</button>
                 </form>     
                
            </div>
        </section>
        
        
        <section class="popup free-report success">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/saturn.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/success.svg">Success: <span> Report was saved</span><span>!</span></h1>
                    <p>The Free Saturn Report was saved for <b><?php echo $firstname.' '.$lastname; ?>.</b></p>
                    <button class="primary-button cta close">Ok</button>
                </div>
            </div>
        </section>
        
        <section class="popup free-report error">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/saturn.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/error.svg">Error: <span class="error-name">Report was NOT saved</span><span>!</span></h1>
                    <p>Something went wrong and the Free Saturn Report was NOT saved.</p>
                    <button class="primary-button">Ok</button>
                </div>
            </div>
        </section>
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>        
        <script type="text/javascript">
            var theme_uri = "<?php echo get_bloginfo('template_directory'); ?>";
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/general.js"></script>
        
    </body>

</html>