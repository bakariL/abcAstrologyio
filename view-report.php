<?php /* Template Name: View Report */ ?>
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
                            echo '<a href="'.home_url().'/account/"  class="user-action">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</a>';
                            echo '<a href="'.home_url().'/logout/"  class="user-action">Logout</a>';
                            
                            
                        } else {
                            echo '<a href="'.home_url().'/login/"  class="user-action">Log In</a>';
                        }
                    ?>
                    
                    
                </div>
            </div>    
        </header>
        
        <section class="view-report">
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
                $report = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_report', true);
                
                $date = date_create($birthday);
                $birthday = date_format($date, 'M d, Y');
                
                
                echo "<h1>".$firstname." <span> ".$lastname."</span></h1>";
                echo "<p><b>".$birthday."</b></p>";
                echo "<p>".$gender."</p>";
                echo "<p>".$email."</p>";
                
                ?>
                
                <?php
                
                if($report == '')
                    echo '<h2>The report was not created yet!</h2>';
                else{

                    $args = array('tag' => $report);
                    $postslist = get_posts( $args );

                    foreach($postslist as $post){
                        echo "<div class='reports'>";
                        echo "<h2>".$post->post_title."</h2>";
                        $content = apply_filters('the_content', $post->post_content);
                        echo "<p>".$content."</p>";
                        echo "</div>";
                    }
                }
                    
                ?>  
                
            </div>
        </section>
        
        <?php
        
            if ( !is_user_logged_in() ) {
                    
        
        ?>
        
        <section class="view-report-signup login-register">
            <div class="container">
                
                <h1>Sign up for free <span>to save all your reports!</span></h1>
                <form>
                    <input id="user" type="hidden" value="<?php echo $user_id; ?>">
                    <label>First Name:</label>
                    <input id="firstname" type="text" value="<?php echo $firstname; ?>">
                    <span class="input-error"></span>
                    <label>Last Name:</label>
                    <input id="lastname" type="text" value="<?php echo $lastname; ?>">
                    <span class="input-error"></span>
                    <label>E-mail address:</label>
                    <input id="email" type="email" value="<?php echo $email; ?>">
                    <span class="input-error"></span>
                    <label>Password:</label>
                    <input id="password" type="password">
                    <span class="input-error"></span>
                    <label>Password confirm:</label>
                    <input id="passwordConfirm" type="password">
                    <span class="input-error"></span>
                    <label>Phone Number:</label>
                    <input id="phone" type="tel">
                    <span class="input-error"></span>
                    <button class="primary-button cta">Sign up for free</button>                
                </form>
            
            </div>            
        </section>
        
        <?php
            
        }
        
        ?>
        
        
        <section class="popup free-report success">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/saturn.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/success.svg">Success: <span> Your Account has been created!</span><span>!</span></h1>
                    <p>Head over to our Login Page and sign into your account.</p>
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
            var login_uri = "<?php echo home_url().'/login/'; ?>";
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/general.js"></script>
        
    </body>

</html>