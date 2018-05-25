<?php 
$blog_with_sidebar = "";
if ( (isset($mr_tailor_theme_options['sidebar_blog_listing'])) && ($mr_tailor_theme_options['sidebar_blog_listing'] == "1" ) ) $blog_with_sidebar = "yes";
if (isset($_GET["blog_with_sidebar"])) $blog_with_sidebar = $_GET["blog_with_sidebar"];    
?>

<?php get_header(); ?>

<!--
	<div>
		<nav>
			<ul>
				<a href="abcastrology.io"><li>Home</li></a>
				<a href="abcastrology.io/about"><li>About</li></a>
				<a href="abcastrology.io/shop"><li>Shop</li></a>
			</ul>
		</nav>
	</div>
-->

    <div id="primary" class="content-area">                    

		<?php if ( $blog_with_sidebar == "yes" ) : ?>
            <div class="row"><div class="large-8 columns with-sidebar">
        <?php endif; ?>
                
                <div id="content" class="site-content" role="main">
	                <header>
            <video autoplay muted loop>
              <source src="<?php echo get_bloginfo('template_directory'); ?>/assets/saturn-rising.mp4" type="video/mp4">
            </video>
<!--             <div class="overlay"></div> -->
            <div class="container">
                <div class="top-navigation">
                    <div class="logo"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/logo.svg"></div>
                    
             <?php
                        if ( is_user_logged_in() ) {
                            
                            $current_user = wp_get_current_user();
                            echo '<a href="'.home_url().'/account/"  class="user-action">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</a>';
                            echo '<a href="'.wp_logout_url(home_url()).'"  class="user-action">Logout</a>';
                            
                            
                        } else {
                            echo '<a href="'.home_url().'/register/"><button class="primary-button">Sign up for free</button></a>';
                            echo '<a href="'.home_url().'/login/"  class="user-action">Log In</a>';
                        }
                    ?>   
                    
                    
                </div>
               <div class="motto">Character is<br>Destiny</div>
            </div>    
        </header>

	                
		<section class="free-report">
            <div class="container">
                <div class="form-container">
                    <h3 id="ffhead">Free Saturn Report</h3>
                    <form>
                        <div class="component row">
                            <p id="nlabel">Name:</p>
                            <input class="fn" id="report-firstname" type="text" placeholder="First name..." class="half" >
                            <input class="ln" id="report-lastname"type="text" placeholder="Last name..." class="half">
                        </div>
                        <div class="component row">
                            <p id="elabel">E-mail:</p>
                            <input class="Eml" id="report-email" type="text" size="55" placeholder="E-mail address..." value="<?php echo $current_user->user_email; ?>">
                        </div>
                        <div class="component row">
                            <p id="flabel">Birthday:</p>
                            <select id="report-birthday" class="day one-third dd">
                                <option disabled selected>Day..</option>
                                <?php
                                    
                                    for($i = 1; $i<=31; $i++){
                                        $day = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        echo '<option value="'.$day.'">'.$day.'</option>';
                                    }
                                
                                ?>
                            </select>
                            <select id="report-birthmonth" class="month one-third mm" >
                                <option disabled selected>Month..</option>                                
                                <?php
                                    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                    for($i = 0; $i<count($months); $i++){
                                        $month = str_pad($i+1, 2, "0", STR_PAD_LEFT);
                                        echo '<option value="'.$month.'">'.$months[$i].'</option>';
                                    }
                                
                                ?>
                            </select>
                            <select id="report-birthyear" class="year one-third yy">
                                <option disabled selected>Year..</option>
                                <?php
                                    $currentYear = intval(date('Y'));
                                    for($i = $currentYear; $i>$currentYear-100; $i--){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                
                                ?>
                            </select>
                        
                        <div class="component two-third">   
                            <p id="flabel">Gender:</p>
                            <select id="report-gender" width="25px">
                                <option disabled selected>Select..</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        </div>
                        <div class="component one-third">
                            <button class="primary-button cta yeah">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
            <section class="learning-center">
            
            <div class="container">
                
                <h1>Learning Center</h1>
                
                <div class="characters">    
                    <div class="fire">                    
                        <video autoplay muted loop class="vid">
                          <source src="<?php echo get_bloginfo('template_directory'); ?>/assets/learning-center-fire.mp4" type="video/mp4">
                        </video>
                        <video autoplay muted loop class="vid">
                          <source src="<?php echo get_bloginfo('template_directory'); ?>/assets/learning-center-earth.mp4" type="video/mp4">
                        </video>
                        <video autoplay muted loop class="vid">
                          <source src="<?php echo get_bloginfo('template_directory'); ?>/assets/learning-center-air.mp4" type="video/mp4">
                        </video>
                        <video autoplay muted loop class="vid">
                          <source src="<?php echo get_bloginfo('template_directory'); ?>/assets/learning-center-water.mp4" type="video/mp4">
                        </video>
					</div>  
						<div class="shedr">                    
					        <h5 id="signsHEAder">Fire</h5>
							<h5 id="signsHEAder">Earth</h5>
                        	<h5 id="signsHEAder">Air</h5>
							<h5 id="signsHEAder">Water</h5>
						</div>	

					<div class="signsLC">	
                        <ul id="symb">
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/aries.svg">Aries</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/leo.svg">Leo</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/sagitarius.svg">Sagittarius</li>
                        </ul>
                        
                        <ul id="symb">
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/taurus.svg">Taurus</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/virgo.svg">Virgo</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/capricorn.svg">Capricorn</li>
                        </ul>
                         <ul id="symb">
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/gemini.svg">Gemini</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/libra.svg">Libra</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/aquarius.svg">Aquarius</li>
                        </ul>
                         <ul id="symb">
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/cancer.svg">Cancer</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/scorpio.svg">Scorpio</li>
                            <li><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/pisces.svg">Pisces</li>
                        </ul>
					</div>
					</div>
					<div class="descElements">
						<p>Fire is energy. It is always in motion. Always restless energy. High levels of activity, needs plenty of room to 
							roam and opportunities to assert self; sports, staying active.
						</p>
						<p>Earth stands still. It is steady, solid and stable. Introspective, cautious about new circumstances or situations, 
							touch is important, physical evidence, hands-on learning.
						</p>
						<p>
							Air is what's between people. It's a connector. It’s communication where you have a give and take. Important to make
							 mental connections, friends, social situations are a powerful feature this child’s life.
						</p>
						<p>
							Water takes the shape of whatever container it is in. Sensitive, uncomfortable around new people or different 
							environments, (sensitive to vibrations), encourage child to trust intuition, encourage artistic or creative 
							expression in fun and play.
						</p>
					</div>
                                          
                    
                </div>
        
        </section>

            <section class="newsletter">
            <div class="container">
                <h2 id="nwsltrhd">      
	                sign up for weekly news, updates, and more          
<!--
                    <?php 
                        $id=155; //Newsletter Post in WP ADMIN
                        $post = get_post($id); 
                        $content = apply_filters('the_content', $post->post_title); 
                        echo $content;  
                    ?>
-->
                </h2>
                <form class="frmnws">
                    <input class="ee" id="email" type="email" placeholder="E-mail address:" value="<?php echo $current_user->user_email; ?>">
                    <button class="primary-button cta nws">Join our Newsletter!</button>
                </form>
                <p>
<!--
                    <?php 
                        $content = apply_filters('the_content', $post->post_content); 
                        echo $content;  
                    ?>
-->
                </p>
            </div>
        </section>
        
			<h3 id="satReportHead">Why Saturn report?</h3>
            <section class="why-saturn">
            <div class="container">
            
                <div class="saturn"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/saturn.svg"></div>
                <div class="text">
                    <h2>
                            <?php 
                                $id=60; //Why Saturn Post in WP ADMIN
                                $post = get_post($id); 
                                $content = apply_filters('the_content', $post->post_title); 
                                echo $content;  
                            ?>
                    </h2>
                    
                         
                            <?php 
                                $content = apply_filters('the_content', $post->post_content); 
                                echo $content;  
                            ?>
                    
                    <p>But do you know where Saturn was on the day you were born and WHY this is important? Saturn is our teacher of discipline, structure, form, and responsibility. These qualities are essential to character. <br><br>In the child’s chart, we can see Saturn operating as the force of discipline, responsibility, and structure. Saturn acquaints us with the realities of existence on the physical plane.</p>
                    <p class="more"></p>
                   
                    <a href="javascript:;" class="read-more">Read More</a>
                    <a href="javascript:;" class="show-less">Show Less</a>
                </div>
                
                
            </div>
        </section>

 <section class="how-it-works">
            <div class="container">
                <h1>How does it work?</h1>
                <div class="offers">
                   
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-report.svg">                       
                        
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-sample.svg">
                                         
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-monthly.svg">
                                           
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-horoscope.svg">
                       
                    </div>
                    <div class ="text-howItWorks">
	                     <p >Order the<br> Free Saturn Report</p>
	                     <p>Order the<br> Free sample newsletter</p>
	                     <p>Sign up for the <br> monthly newsletter</p>
	                     <p>Order a<br> horoscope reading</p>


                    </div>
                </div>
                  
			<div class ="row priceList">
                <div class="subscription">
                    <h2>Newsletter Subscriptions</h2>                    
                   
	                     <div class="card">
                        
                            <div class="label SUB"><h3 id="hdsub">2 year subscription</h3></div>
<!--                             <span class="value">$45.00</span> -->
                               <div class="buyNow">        <?php
                     echo do_shortcode( '[add_to_cart id="298"]' );
                     ?> </div>
                        
	                     </div>
                         <div class="card">
                      
                            <div class="label SUB"><h3 id="hdsub">1 year subscription</h3></div>
<!--                             <span class="value">$24.00</span> -->
                                   <div class="buyNow">        <?php
                     echo do_shortcode( '[add_to_cart id="214"]' );
                     ?> </div>
                       
                         </div>
                         <div class="card">
                     
                            <div class="label SUB"><h3 id="hdsub">6 month subscription</h3></div>
<!--                             <span class="value">$12.50</span> -->
                                   <div class="buyNow">        <?php
                     echo do_shortcode( '[add_to_cart id="296"]' );
                     ?> </div>
                       
                         </div>
                    
                    <a href="" class="cta">Subscribe Today!</a>
                </div>
                <div class="reading">
                    <h2>Horoscope chart readings</h2>  
              
<!-- 					  <?php echo do_shortcode('[gallery id="value141"]'); ?> -->
            <div class="card">
                    <ul class="price-list">
                        
                            <div class="label SUB"><h3 id="hdsub">Adult Reading</h3></div>
<!--                             <span class="value">$290.00</span> -->
                            <span class="description">60-75 min</span>
                  <div class="buyNow">
                    <?php
                     echo do_shortcode( '[add_to_cart id="300"]' );
                     ?> 
                     </div>
                        
                    </div>   
                <div class="card">
       
                        
                            <div class="label SUB"><h3 id="hdsub">Child reading</h3></div>
<!--                             <span class="value">$230.00</span> -->
                            <span class="description">45-60 min</span>
                          <div class="buyNow">
                    <?php
                     echo do_shortcode( '[add_to_cart id="299"]' );
                     ?> 
                     </div>                  </div>
                 <div class="card">
                        
                            <div class="label SUB"><h3 id="hdsub">Mini Reading</h3></div>
<!--                             <span class="value">$50.00</span> -->
                            <span class="description">15-20 min</span>
                            <div class="buyNow">
                    <?php
                     echo do_shortcode( '[add_to_cart id="166"]' );
                     ?> 
                     </div>                        
                    </ul>
                 </div>
                </div>
			</div>
<!--
                    <div class="info">
                      <p>  by video chat, over the phone, or audio recording</p>
                    </div>
          
-->

<!--                     <a href="/shop/" class="cta">Get a reading!</a> -->
          
<!--
                     <a href="'.home_url().'/shop/"><button class="cta primary-button">Get a reading!</button></a>
                  
                    <p>   
-->          <!--

                    <?php 
                        $id=157; //Chart readings Post in WP ADMIN
                        $post = get_post($id); 
                        $content = apply_filters('the_content', $post->post_content); 
                        echo $content;  
                    ?>

                    </p>
                    -->
				
        </section>
           
             
          

					<?php if ( have_posts() ) : ?>
									
						<!--masonry style-->
						<?php if ( (isset($mr_tailor_theme_options['sidebar_blog_listing'])) && ($mr_tailor_theme_options['sidebar_blog_listing'] == "2" ) ) : ?>
						
							<!--isotope listing-->
							<div class="blog-isotop-master-wrapper">
							
								<div class="row">
								<div class="large-12 columns">
								
									<div class="blog-isotop-container">
							
										<div id="filters" class="button-group">
											<button class="filter-item is-checked" data-filter="*">show all</button>
										</div>
							
										<div class="blog-isotope">
											<div class="grid-sizer"></div>
								
											<?php /* Start the Loop */ ?>
											<?php while ( have_posts() ) : the_post(); ?>
									
												<div class="blog-post hidden <?php echo get_post_format(); ?>">
													<div class="blog-post-inner">
													
														<h2 class="entry-title-archive">
															<a href="<?php the_permalink(); ?>" class="thumbnail_archive">
																<span class="thumbnail_archive_container">
																	<?php the_post_thumbnail('large'); ?>
																</span>
																<span class="entry-title-archive-text"><?php the_title(); ?></span>
															</a>
														</h2>
																 
														<div class="post_meta_archive"><?php mr_tailor_post_header_entry_date(); ?></div>
																
														<div class="entry-content-archive">
															
															<?php
											                if( ($post->post_excerpt) && (!is_single()) ) {
											                    the_excerpt();
											                    ?>
											                    <a href="<?php the_permalink(); ?>" class="more-link"><?php _e('Continue reading &rarr;', 'mr_tailor'); ?></a>
											                <?php
											                } else {
											                    the_content( __( 'Continue reading &rarr;', 'mr_tailor' ) );
											                }
											                ?>
															
														</div>
															   
													</div><!--blog-post-inner-->
												</div><!-- .blog-post-->
								
											<?php endwhile; ?>
								
										</div><!-- .blog-isotope -->
										
									</div><!-- .blog-isotop-container-->
									
								</div><!--.large-12-->
								</div><!--.row-->
								
								<?php mr_tailor_content_nav( 'nav-below' ); ?>
							
							</div><!--blog-isotop-master-wrapper-->
							
						<!--default style-->	
						<?php else : ?>
							
							<?php while ( have_posts() ) : the_post(); ?>
								
									<?php get_template_part( 'content', get_post_format() ); ?>
									
									<hr class="content_hr" />
									
							<?php endwhile; ?>
				
							<?php mr_tailor_content_nav( 'nav-below' ); ?>
							
						<?php endif; ?>
					
					<!--no posts found-->
                    <?php else : ?>
            
                        <?php get_template_part( 'no-results', 'index' ); ?>
            
                    <?php endif; ?>
                
                </div><!-- #content -->                            
            
            <?php if ( $blog_with_sidebar == "yes" ) : ?>
        		</div><!-- .columns -->
            <?php endif; ?>
    
			<?php if ( $blog_with_sidebar == "yes" ) : ?>
				<div class="large-4 columns">        					
					<?php get_sidebar(); ?>			           
                </div><!-- .columns -->
            <?php endif; ?>
            
        <?php if ( $blog_with_sidebar == "yes" ) : ?>
        	</div><!-- .row -->
        <?php endif; ?>
                 
    </div><!-- #primary -->
            <section class="about">
            <div class="container">
<!--
                <div class="photo">
	                                <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/logo-symbol.svg" class="logo">

                </div>
-->
                <div class="text">
					<h3>Our Mission</h3>
						<p>
							Parenting is both an honor and a blessing, and often very challenging. Our mission is to help you understand your child 							through astrology so that you can develop your child’s potential to become who they really are. We can identify your 								child’s emotional needs, learning style, talents, and gifts. Abc astrology provides a customized blueprint unique to your 							child.
						</p>
                </div>
            </div>
        </section>
        
        <footer>
            <div class="container">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/logo-symbol.svg" class="logo">
                <nav>
                    <a href="">Legal Terms</a>
                    <a href="">Terms &amp; Conditions</a>
                    <a href="" class="contactUsLink">Contact Us</a>
                </nav>
                <small>&copy; ABC Astrology, 2018</small>
            </div>
        </footer>
        
        
        <section class="popup free-report success">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/saturn.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/success.svg">Thank you, <span class="first-name"><?php echo $current_user->user_firstname; ?></span><span>!</span></h1>
                    <p>We have received your details and will contact you within <b>24h</b> with your personalized report.</p>
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
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/error.svg">Error: <span class="error-name">Request was NOT sent</span><span>!</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                    <button class="primary-button">Ok</button>
                </div>
            </div>
        </section>
        
        <section class="popup join-newsletter form">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-sample.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1>Subscribe to our Monthly Newsletter</h1>
                    <p>We'll contact you within <b>24h</b> with further details.</p>
                    <form>
                        <input id="email" type="email" placeholder="E-mail Address:" value="<?php echo $current_user->user_email; ?>">
                        <button class="primary-button cta">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
        
        <section class="popup join-newsletter success">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-sample.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/success.svg">Thank you for joining!</h1>
                    <p>We'll contact you within <b>24h</b> with further details.</p>
                    <p class="email"><b></b></p>
                    <button class="primary-button cta close">Ok</button>
                </div>
            </div>
        </section>
        
        <section class="popup join-newsletter error">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-sample.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/error.svg">Error: <span class="error-name">E-mail was NOT sent</span><span>!</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                    <button class="primary-button">Ok</button>
                </div>
            </div>
        </section>
                
        <section class="popup reading form">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-horoscope.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1>Get your Horoscope Reading</h1>
                    <p>We'll contact you within <b>24h</b> with further details.</p>
                    
                <div class="form-container">
                    <form>
                        <div class="component">
                            <label>Name:</label>
                            <input id="reading-firstname" type="text" placeholder="First name:" class="half">
                            <input id="reading-lastname" type="text" placeholder="Last name:" class="half">
                        </div>
                        <div class="component">
                            <label>Birthday:</label>
                            <select class="day one-third" id="reading-birthday">
                                <option disabled selected value="">Day:</option>
                                <?php
                                    
                                    for($i = 1; $i<=31; $i++){
                                        $day = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        echo '<option value="'.$day.'">'.$day.'</option>';
                                    }
                                
                                ?>
                            </select>
                            <select class="month one-third" id="reading-birthmonth">
                                <option disabled selected selected value="">Month..</option>                             
                                <?php
                                    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                    for($i = 0; $i<count($months); $i++){
                                        $month = str_pad($i+1, 2, "0", STR_PAD_LEFT);
                                        echo '<option value="'.$month.'">'.$months[$i].'</option>';
                                    }
                                
                                ?>
                            </select>
                            <select class="year one-third" id="reading-birthyear">
                                <option disabled selected selected value="">Year..</option>
                                <?php
                                    $currentYear = intval(date('Y'));
                                    for($i = $currentYear; $i>$currentYear-100; $i--){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                
                                ?>
                            </select>
                        </div> 
                        <div class="component one-third">   
                            <label>Gender:</label>
                            <select id="reading-gender">
                                <option disabled selected>Select:</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="component two-third">
                            <label>Time of Birth:</label>
                            <select class="half" id="reading-birthhour">
                                <option disabled selected>Hour:</option>
                                <option value="00">12 Midnight</option>
                                <option value="01">01 AM</option>
                                <option value="02">02 AM</option>
                                <option value="03">03 AM</option>
                                <option value="04">04 AM</option>
                                <option value="05">05 AM</option>
                                <option value="06">06 AM</option>
                                <option value="07">07 AM</option>
                                <option value="08">08 AM</option>
                                <option value="09">09 AM</option>
                                <option value="10">10 AM</option>
                                <option value="11">11 AM</option>
                                <option value="12">12 Noon</option>
                                <option value="13">01 PM</option>
                                <option value="14">02 PM</option>
                                <option value="15">03 PM</option>
                                <option value="16">04 PM</option>
                                <option value="17">05 PM</option>
                                <option value="18">06 PM</option>
                                <option value="19">07 PM</option>
                                <option value="20">08 PM</option>
                                <option value="21">09 PM</option>
                                <option value="22">10 PM</option>
                                <option value="23">11 PM</option>
                            </select>
                            <select class="half" id="reading-birthminute">
                                <option disabled selected>Minute:</option>
                                <?php
                                    for($i = 0; $i<60; $i++){
                                        $minute = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        echo '<option value="'.$minute.'">'.$minute.'</option>';
                                    }                                
                                ?>
                            </select>
                        </div>
                        <div class="component"> 
                            <label>Place of Birth:</label>
                            <input  id="reading-city" class="one-third" type="text" placeholder="City...">
                            <select id="reading-state" class="one-third">
                                <option disabled selected>State:</option>
                                <option value="other">Other</option>
                                <?php
                                $states = array(
                                        'AL'=>'Alabama',
                                        'AK'=>'Alaska',
                                        'AZ'=>'Arizona',
                                        'AR'=>'Arkansas',
                                        'CA'=>'California',
                                        'CO'=>'Colorado',
                                        'CT'=>'Connecticut',
                                        'DE'=>'Delaware',
                                        'DC'=>'District of Columbia',
                                        'FL'=>'Florida',
                                        'GA'=>'Georgia',
                                        'HI'=>'Hawaii',
                                        'ID'=>'Idaho',
                                        'IL'=>'Illinois',
                                        'IN'=>'Indiana',
                                        'IA'=>'Iowa',
                                        'KS'=>'Kansas',
                                        'KY'=>'Kentucky',
                                        'LA'=>'Louisiana',
                                        'ME'=>'Maine',
                                        'MD'=>'Maryland',
                                        'MA'=>'Massachusetts',
                                        'MI'=>'Michigan',
                                        'MN'=>'Minnesota',
                                        'MS'=>'Mississippi',
                                        'MO'=>'Missouri',
                                        'MT'=>'Montana',
                                        'NE'=>'Nebraska',
                                        'NV'=>'Nevada',
                                        'NH'=>'New Hampshire',
                                        'NJ'=>'New Jersey',
                                        'NM'=>'New Mexico',
                                        'NY'=>'New York',
                                        'NC'=>'North Carolina',
                                        'ND'=>'North Dakota',
                                        'OH'=>'Ohio',
                                        'OK'=>'Oklahoma',
                                        'OR'=>'Oregon',
                                        'PA'=>'Pennsylvania',
                                        'RI'=>'Rhode Island',
                                        'SC'=>'South Carolina',
                                        'SD'=>'South Dakota',
                                        'TN'=>'Tennessee',
                                        'TX'=>'Texas',
                                        'UT'=>'Utah',
                                        'VT'=>'Vermont',
                                        'VA'=>'Virginia',
                                        'WA'=>'Washington',
                                        'WV'=>'West Virginia',
                                        'WI'=>'Wisconsin',
                                        'WY'=>'Wyoming',
                                    );
                                
                                $states = array_values($states);
                                
                                 for($i = 0; $i<count($states); $i++){
                                        echo '<option value="'.$states[$i].'">'.$states[$i].'</option>';
                                    }
                                
                                
                                ?>
                            </select>
                            <select id="reading-country" class="one-third">
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia, Plurinational State of</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US" selected>USA</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="component full">                        
                            <input id="reading-email" type="email" placeholder="E-mail Address:" value="<?php echo $current_user->user_email; ?>">
                            <button class="primary-button cta"> Submit</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </section>
        
        <section class="popup reading success">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-horoscope.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/success.svg">Thank you, <span class="first-name"></span><span>!</span></h1>
                    <p>We'll contact you within <b>24h</b> with further details.</p>
                    <button class="primary-button cta close" >Ok</button>
                </div>
            </div>
        </section>
        
        <section class="popup reading error">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-horoscope.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/error.svg">Error: <span class="error-name">Request was NOT sent</span><span>!</span></h1>
                    <p>please make sure the form is filled out correctly. try again. or contact us. </p>
                    <button class="primary-button cta close">Ok</button>
                </div>
            </div>
        </section>
        
        <section class="popup contact form">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-sample.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1>Contact us</h1>
                    <form>
                        <input id="contact-name" type="text" placeholder="Name:" <?php if(is_user_logged_in()) echo 'value="'.$current_user->user_firstname." ".$current_user->user_lastname.'"'; ?>>
                        <input id="contact-email" type="email" placeholder="E-mail Address:" value="<?php echo $current_user->user_email; ?>">
                        <textarea id="contact-message" placeholder="Your message:"></textarea>
                        <button class="primary-button cta">Send</button>
                    </form>
                </div>
            </div>
        </section>
        
        <section class="popup contact success">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-sample.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/success.svg">Thank you, <span class="name"></span></h1>
                    <p>We'll contact you within <b>24h</b> with further details.</p>
                    <button class="primary-button cta close">Ok</button>
                </div>
            </div>
        </section>
        
        <section class="popup contact error">
            <div class="container">
                <div class="top">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/how-it-works-sample.svg" class="cover">
                    <div class="close"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/close.svg"></div>
                </div>
                <div class="bottom">
                    <h1><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/error.svg">Error: <span class="error-name">The message was NOT sent</span><span>!</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
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
        

            
<?php get_footer(); ?>