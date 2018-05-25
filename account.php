<?php /* Template Name: User Account */ ?>
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
        <?php
                     echo do_shortcode( '[nav type="pills"]
					 		[nav-item link="'.home_url().'//"] Home [/nav-item]
					 		[nav-item link="'.home_url().'/about/"] About [/nav-item]
					 		[nav-item link="'.home_url().'/cart/"] Cart [/nav-item]
					 		[/nav]' );
                     ?> 
        <header class="short">
            <div class="container">
                <div class="top-navigation">
                    <a href="<?php echo home_url(); ?>"><div class="logo"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/logo.svg"></div></a>
                    
                    <?php
                        if ( is_user_logged_in() ) {
                            
                            $current_user = wp_get_current_user();
                            
                            if(current_user_can('administrator')){
                                echo '<a href="'.home_url().'/wp-admin/"><button class="secondary-button">Admin Panel</button></a>';
                            } else{
                                echo '<a href="'.home_url().'/account"  class="user-action">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</a>';
                            }                            
                            
                            
                            echo '<a href="'.home_url().'/logout"  class="user-action">Logout</a>';
                            
                            
                        } else {
                            echo '<a href="'.home_url().'/register"><button class="primary-button">Sign up for free</button></a>';
                            echo '<a href="'.home_url().'/login"  class="user-action">Log In</a>';
                        }
                    ?>
                                  
                </div>
            </div>    
        </header>
        
        <section class="account-reports">
            
            
            <?php
            
            
                if(current_user_can('administrator')){
                    
                    $checkedUsers = array();
                    $openReportUsers = get_users('meta_key=abc_report_identifier' ); 
                                        
                    foreach ( $openReportUsers as $user ) {
                                                
                        if(in_array($user->ID, $checkedUsers))
                            continue;
                        
                        array_push($checkedUsers, $user->ID);  
                        $identifiers = get_user_meta($user->ID, 'abc_report_identifier');
                        
                        foreach ($identifiers as $reportIdentifier)
                            if(get_user_meta($user->ID, 'abc_report_'.$reportIdentifier.'_report', $single) == ''){     
                                
                                    
                                //------------------------------------------------------
                                
                                $user_info = get_userdata($user->ID);

                                $email = $user_info->user_email;                
                                $firstname = get_user_meta($user->ID, 'abc_report_'.$reportIdentifier.'_firstname', true);
                                $lastname = get_user_meta($user->ID, 'abc_report_'.$reportIdentifier.'_lastname', true);
                                $birthday = get_user_meta($user->ID, 'abc_report_'.$reportIdentifier.'_birthday', true);
                                $gender = get_user_meta($user->ID, 'abc_report_'.$reportIdentifier.'_gender', true);

                                $date = date_create($birthday);
                                $birthday = date_format($date, 'M d, Y');
                                
                                echo '<div class="container">';
                                echo "<h1>".$firstname." <span> ".$lastname."</span></h1>";
                                echo "<p><b>".$birthday."</b></p>";
                                echo "<p>".$gender."</p>";
                                echo "<p>".$email."</p>";

            ?>
            
                                <form class="select-reports form">
                                    <input id="user" type="hidden" value="<?php echo $user->ID; ?>">
                                    <input id="identifier" type="hidden" value="<?php echo $reportIdentifier; ?>">
                                    <select id="reports" class="inline">
                                        <option disabled selected>Select Report:</option>
                                        <?php
                                        $args = array(
                                            'post_category'  => 'free-saturn-reports',
                                            'posts_per_page'   => 100,);
                                        $postslist = get_posts( $args );

                                        foreach($postslist as $post){
                                            $tags = wp_get_post_tags($post->ID);
                                            echo "<option value='".$tags[0]->name."'>".$post->post_title."</option>";
                                        }                    

                                        ?>
                                    </select>
                                    <button class="primary-button cta inline">Submit</button>
                                 </form> 
            
            <?php

                            echo '</div>';
                                
                                
                                //-----------------------------------------------
                                
                                
                                
                           } //end foreach report
                        
                        
                    }// end foreach users


                }// endif administrator
            
            
            ?>
            
            
            
            
            
            
            
            
            
            
            
            
                
            
                      
                <?php 
                
                $user_id = $current_user->id;
                $user_info = get_userdata($user_id);
                
                $user_reports = get_user_meta($user_id, 'abc_report_identifier');
            
                if(!$user_reports && !current_user_can('administrator')){
                    echo "<div class='container'>";
                    echo "<h1>Get your Free Saturn Report<br><span> from our <a href='".home_url()."'>homepage!</a></span></h1>";
                } else {
                                
                    foreach(array_reverse($user_reports) as $reportIdentifier){
                    
                    
                        $firstname = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_firstname', true);
                        $lastname = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_lastname', true);
                        $birthday = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_birthday', true);
                        $gender = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_gender', true);
                        $report = get_user_meta($user_id, 'abc_report_'.$reportIdentifier.'_report', true);

                        $date = date_create($birthday);
                        $birthday = date_format($date, 'M d, Y');

                        echo "<div class='container'>";

                        echo "<h1>".$firstname." <span> ".$lastname."</span></h1>";
                        echo "<p><b>".$birthday."</b></p>";
                        echo "<p>".$gender."</p>";

                        if(!$report){                        
                            echo '<h2>The report was not created yet!</h2>';
                        } else {

                            $args = array('tag' => $report);
                            $postslist = get_posts( $args );

                            foreach($postslist as $post){
                                echo "<h2>".$post->post_title."</h2>";
                                $content = apply_filters('the_content', $post->post_content);
                                echo "<p>".$content."</p>";
                            } 

                        }

                        echo "</div>";


                    }//end foreach
                } //end if else
                
                ?> 
                
        </section>        
        
        <section class="popup free-report success">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/saturn.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/success.svg">Success: <span> Report was saved</span><span>!</span></h1>
                    <p>The Free Saturn Report was saved for <b class="name"><?php echo $firstname.' '.$lastname; ?>.</b></p>
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