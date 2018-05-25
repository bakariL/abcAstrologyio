<?php /* Template Name: Horoscope */ ?>
<!doctype html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#403c50">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>ABC Astrology</title>
        
        <link rel="stylesheet" href="https://use.typekit.net/voh0idg.css">
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/responsive.css">
    </head>

    <body>
        
        <section>
            <div class="container">
                Horoscope:<br><br>
                <?php 
                    $id=30;
                    $post = get_post($id); 
                    $content = apply_filters('the_content', $post->post_content); 
                    echo $content;  
                ?>
            </div>
        </section>
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/general.js"></script>
        
    </body>

</html>