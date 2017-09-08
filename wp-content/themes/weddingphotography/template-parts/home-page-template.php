<?php
/** 
*  Template Name: Home Page Template
*/
get_header(); 

$header_image = $no_image = $title_image =$package_bg_image=$banner_image= '';
$header_image=get_template_directory_uri().'/assets/images/border.png';
$no_image=get_template_directory_uri().'/assets/images/no_image.jpg';
$title_image=get_template_directory_uri().'/assets/images/border1.png';
$banner_image=get_theme_mod("banner_image");
if(isset($banner_image)):
	$banner_image=esc_url(get_theme_mod("banner_image"));
endif;
if(isset($package_bg_image)):
	$package_bg_image=esc_url(get_theme_mod("package_bg_image"));
endif;

?>
 <?php if(get_theme_mod("banner_switch") != '' && get_theme_mod("banner_switch") == 'on'): 
 /**
 * Banner Section
 */
 $weddingphotography_banner_title = get_theme_mod('weddingphotography_banner_title');
 ?>
     <section class="editable wp_banner_wrapper" style="background-image: url(<?php echo esc_url($banner_image);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
				<?php if($weddingphotography_banner_title){ ?>
                    <div class="ed_element_wrapper">
                        <h3 class="ed_subheading"><?php echo esc_html($weddingphotography_banner_title); ?></h3>
                    </div>
				<?php } ?>				
					<?php if($header_image!=''):?>
                    <div class="ed_element_wrapper">
                        <img src="<?php echo esc_url($header_image); ?>" alt="" width="170" height="17" class="ed_image" />
                    </div>
					<?php endif;?>
					
					
			<?php
			$weddingphotography_slider_cat = get_theme_mod('weddingphotography_slider_cat');
			if($weddingphotography_slider_cat){
				wp_reset_postdata();
				$weddingphotography_slider_args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category_name' => $weddingphotography_slider_cat
				);
				$weddingphotography_slider_query = new WP_Query($weddingphotography_slider_args);
				if($weddingphotography_slider_query->have_posts()):
				
				while($weddingphotography_slider_query->have_posts()): $weddingphotography_slider_query->the_post();						
							if(get_the_title() || get_the_content()){
				?>
				 <?php if(get_the_content()){ ?>
                    <div class="ed_element_wrapper">
                        <h1 class="ed_heading"><?php the_content(); ?></h1>
                    </div>
				 <?php } ?>
					
					 <?php 
					} 					
                endwhile;
				endif;
			} ?>
					
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>
<?php if(get_theme_mod("work_switch") != '' && get_theme_mod("work_switch") == 'on'): 
/**
 * Work Section
 */
 $weddingphotography_work_title = get_theme_mod('weddingphotography_work_title');
?>
<section class="editable wp_work_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
				<?php if($weddingphotography_work_title){ ?>
                    <div class="wp_heading">
                        <div class="ed_element_wrapper">
                            <h1 class="ed_heading"><?php echo esc_html($weddingphotography_work_title); ?></h1>
                        </div>
						<?php if($title_image!=''):?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($title_image);?>" alt="" width="172" height="17" class="ed_image" />
                        </div>
						<?php endif;?>
                    </div>
					<?php } ?>	
                </div>
            </div>			
            <div class="row ed_element_sorting" style="margin-top:50px;">                
				<div class="col-lg-6 col-md-6">
				<?php if(get_theme_mod("work_image")!=''):?>
                    <div class="wp_work_img ed_element_wrapper">
                        <img src="<?php echo esc_url(get_theme_mod("work_image"));?>" alt="" width="570" height="535" class="img-responsive ed_image" />
                    </div>
                    <?php else:?>
					<div class="wp_work_img ed_element_wrapper">
                        <img src="<?php echo esc_url($no_image) ;?>" alt="" width="570" height="535" class="img-responsive ed_image" />
                    </div>
					<?php endif;?>
                </div>				
			<?php
			$weddingphotography_work_cat = get_theme_mod('weddingphotography_work_cat');
			if($weddingphotography_work_cat){
				wp_reset_postdata();
				$weddingphotography_work_args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category_name' => $weddingphotography_work_cat
				);
				$weddingphotography_work_query = new WP_Query($weddingphotography_work_args);
				if($weddingphotography_work_query->have_posts()):
				?>
                <div class="col-lg-6 col-md-6 ed_element_sorting" style="margin-top:30px;">
				
					<?php while($weddingphotography_work_query->have_posts()): $weddingphotography_work_query->the_post();
							$weddingphotography_work_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'weddingphotography-work-image');
							$weddingphotography_work_image_url = $weddingphotography_work_image_src[0];
								if(get_the_title() || get_the_content() || $weddingphotography_work_image_url){ ?>
								<div class="wp_work_content">								
								<?php if (has_post_thumbnail()){ ?>
									<div class="wp_work_icon">
										<div class="ed_element_wrapper">
											<img src="<?php echo esc_url($weddingphotography_work_image_url); ?>" alt="" width="41" height="41" class="ed_image" />
										</div>
									</div>
									<?php } ?>
									<?php if(get_the_title() || get_the_content()){ ?>
									<div class="wp_work_data">
									<?php if(get_the_title()){?>
										<div class="ed_element_wrapper">
											<h2 class="ed_subheading"><?php the_title();?></h2>
										</div>
										<?php } ?>
										<?php if(get_the_content()){?>
										<div class="ed_element_wrapper">
											<p class="ed_paragraph"><?php the_excerpt();?></p>
										</div>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								
								<?php } ?>						
								<?php endwhile; ?>
                </div>
				 <?php 
        endif;
        } ?>
            </div>
        </div>
    </section>
<?php endif;?>     
<?php if(get_theme_mod("team_switch") != '' && get_theme_mod("team_switch") == 'on'): 
/**
 * Team Section
 */
 $weddingphotography_team_title = get_theme_mod('weddingphotography_team_title');
?>
    <section class="editable wp_team_wrapper" style="background-image: url(<?php echo esc_url(get_theme_mod("team_bg_image"));?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
				<?php if($weddingphotography_team_title){ ?>
                    <div class="wp_heading">
                        <div class="ed_element_wrapper">
                            <h1 class="ed_heading"><?php echo esc_html($weddingphotography_team_title); ?></h1>
                        </div>
                        <?php if($title_image!=''):?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($title_image);?>" alt="" width="172" height="17" class="ed_image" />
                        </div>
                        <?php endif;?>
                    </div>
					<?php } ?>	
                </div>
            </div>
			<?php
			$weddingphotography_team_cat = get_theme_mod('weddingphotography_team_cat');
			if($weddingphotography_team_cat){
				wp_reset_postdata();
				$weddingphotography_team_args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category_name' => $weddingphotography_team_cat
				);
				$weddingphotography_team_query = new WP_Query($weddingphotography_team_args);
				if($weddingphotography_team_query->have_posts()):
				?>
            <div class="row ed_element_sorting" style="margin-top:50px;">
                <?php 
				while($weddingphotography_team_query->have_posts()): $weddingphotography_team_query->the_post();
				$weddingphotography_team_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'weddingphotography-team-image');
				$weddingphotography_team_image_url = $weddingphotography_team_image_src[0];
				if(get_the_title() || get_the_content() || $weddingphotography_team_image_url){ ?>
				<div class="col-lg-4 col-md-4 ed_element_wrapper_box">
                    <div class="wp_team_box ed_box ed_element_sorting">
						<?php if (has_post_thumbnail()){ ?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($weddingphotography_team_image_url); ?>" alt="" width="360" height="446" class="ed_image img-responsive">
                        </div>
                        <?php } else{?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($no_image);?>" alt="" width="360" height="446" class="ed_image img-responsive">
                        </div>
						<?php } ?>
						<?php if(get_the_title()){?>
                        <div class="ed_element_wrapper">
                            <h2 class="ed_subheading"><?php the_title();?></h2>
                        </div>
						<?php } ?>
						<?php if(get_the_content()){?>
                        <div class="ed_element_wrapper">
                            <p class="ed_paragraph"><?php the_excerpt();?></p>
                        </div>
						<?php } ?>
                    </div>
                </div>
                <?php } ?>						
				<?php endwhile; ?>               
            </div>
			<?php 
        endif;
        } ?>
        </div>
    </section>
    <?php endif;?>
   <?php if(get_theme_mod("package_switch") != '' && get_theme_mod("package_switch") == 'on'): 
/**
 * Packages Section
 */
 $weddingphotography_package_title = get_theme_mod('weddingphotography_package_title');
?>
    <section class="editable wp_package_wrapper" style="background-image: url(<?php echo esc_url($package_bg_image);?>);">
        <div class="container">
           <div class="row">
                <div class="col-lg-12 col-md-12">
				<?php if($weddingphotography_package_title){ ?>
                    <div class="wp_heading">
                        <div class="ed_element_wrapper">
                            <h1 class="ed_heading"><?php echo esc_html($weddingphotography_package_title); ?></h1>
                        </div>
						<?php if($header_image!=''):?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($header_image); ?>" alt="" width="172" height="17" class="ed_image" />
                        </div>
						<?php endif;?>
                    </div>
					<?php } ?>	
                </div>
            </div>
			<?php
			$weddingphotography_package_cat = get_theme_mod('weddingphotography_package_cat');
			if($weddingphotography_package_cat){
				wp_reset_postdata();
				$weddingphotography_package_args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category_name' => $weddingphotography_package_cat
				);
				$weddingphotography_package_query = new WP_Query($weddingphotography_package_args);
				if($weddingphotography_package_query->have_posts()):
				?>
            <div class="row ed_element_sorting" style="margin-top:50px;">
			 <?php 
				while($weddingphotography_package_query->have_posts()): $weddingphotography_package_query->the_post();
				$weddingphotography_package_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'weddingphotography-package-image');
				$weddingphotography_package_image_url = $weddingphotography_package_image_src[0];
				if(get_the_title() || get_the_content() || $weddingphotography_package_image_url){ ?>
                <div class="col-lg-4 col-md-4 ed_element_wrapper_box">
                    <div class="wp_package_box ed_box">
						<?php if (has_post_thumbnail()){ ?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($weddingphotography_package_image_url); ?>" alt="" width="360" height="234" class="ed_image img-responsive" />
                        </div>
						<?php } ?>
						<?php if(get_the_title() || get_the_content() ) { ?>
                        <div class="ed_element_wrapper_box">
                            <div class="wp_package_data ed_box">
								<?php if(get_the_title()) {?>
                                <div class="ed_element_wrapper">
                                    <h2 class="ed_subheading"><?php the_title();?></h2>
                                </div>
								<?php } ?>
								<?php if(get_the_content()) {?>
                                <div class="ed_element_wrapper">
                                   <?php the_content();?>
                                </div>
								<?php } ?>
                            </div>
                        </div>
						<?php } ?>
                    </div>
                </div>
				 <?php } ?>						
				<?php endwhile; ?>   
                </div>
               <?php 
        endif;
        } ?>
        </div>		
</section>
<?php endif;?>
<?php if(get_theme_mod("portifolio_switch") != '' && get_theme_mod("portifolio_switch") == 'on'): 
/**
 * Portfolio Section
 */
 $weddingphotography_portfolio_title = get_theme_mod('weddingphotography_portfolio_title');
?>
 <section class="editable wp_port_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
				<?php if($weddingphotography_portfolio_title){ ?>
                    <div class="wp_heading">
                        <div class="ed_element_wrapper">
                            <h1 class="ed_heading"><?php echo esc_html($weddingphotography_portfolio_title); ?></h1>
                        </div>
						<?php if($title_image!=''):?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($title_image);?>" alt="" width="172" height="17" class="ed_image" />
                        </div>
						<?php endif;?>
                    </div>
					<?php } ?>	
                </div>
            </div>
			<?php
			$weddingphotography_portfolio_cat = get_theme_mod('weddingphotography_portfolio_cat');
			if($weddingphotography_portfolio_cat){
				wp_reset_postdata();
				$weddingphotography_portfolio_args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category_name' => $weddingphotography_portfolio_cat
				);
				$weddingphotography_portfolio_query = new WP_Query($weddingphotography_portfolio_args);
				if($weddingphotography_portfolio_query->have_posts()):
				?>
            <div class="row ed_element_sorting" style="margin-top:50px;">
                <?php 
				while($weddingphotography_portfolio_query->have_posts()): $weddingphotography_portfolio_query->the_post();
				$weddingphotography_portfolio_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'weddingphotography-portfolio-image');
				$weddingphotography_portfolio_image_url = $weddingphotography_portfolio_image_src[0];
				if(get_the_title() || $weddingphotography_portfolio_image_url){ ?>
				<div class="col-lg-4 col-md-4 ed_element_sorting">		
                   <?php if (has_post_thumbnail()){ ?>
                    <div class="wp_port_img">
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($weddingphotography_portfolio_image_url); ?>" alt="" width="370" height="285" class="ed_image img-responsive" />
                        </div>
                    </div>
					<?php } ?>										
                </div>	
				<?php } ?>						
				<?php endwhile; ?>                  						
            </div>
			 <?php 
        endif;
        } ?>
        </div>
    </section>
    <?php endif;?>
<?php if(get_theme_mod("happy_client_switch") != '' && get_theme_mod("happy_client_switch") == 'on'):
/**
 * Happy Client Section
 */
 $weddingphotography_happy_client_title = get_theme_mod('weddingphotography_happy_client_title');
 ?>
 <section class="editable wp_testi_wrapper" style="background-image: url(<?php echo esc_url(get_theme_mod("happy_client_bg_image"));?>);">
        <div class="container">		
            <div class="row">
                <div class="col-lg-12 col-md-12">
				<?php if($weddingphotography_happy_client_title){ ?>
                    <div class="wp_heading">
                        <div class="ed_element_wrapper">
                            <h1 class="ed_heading"><?php echo esc_html($weddingphotography_happy_client_title); ?></h1>
                        </div>
						<?php if($title_image!=''):?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($title_image);?>" alt="" width="172" height="17" class="ed_image" />
                        </div>
						<?php endif;?>
                    </div>
					<?php } ?>	
                </div>
            </div>
			<?php
			$weddingphotography_happy_client_cat = get_theme_mod('weddingphotography_happy_client_cat');
			if($weddingphotography_happy_client_cat){
				wp_reset_postdata();
				$weddingphotography_happy_client_args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category_name' => $weddingphotography_happy_client_cat
				);
				$weddingphotography_happy_client_query = new WP_Query($weddingphotography_happy_client_args);
				if($weddingphotography_happy_client_query->have_posts()):
				?>
            <div class="row" style="padding-top:50px;">
                <div class="col-lg-12 col-md-12">
                    <div class="wp_feedback_slider ed_element_wrapper_slider">
                        <div class="owl-carousel owl-theme ed_slider" id="wp_feedback_slider" data_number_of_item="2" data_responsive_item="1,1,2" data_slides_margin="30">
                           <?php 
							while($weddingphotography_happy_client_query->have_posts()): $weddingphotography_happy_client_query->the_post();
							$weddingphotography_happy_client_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'weddingphotography-happy_client-image');
							$weddingphotography_happy_client_image_url = $weddingphotography_happy_client_image_src[0];
							if(get_the_title() || $weddingphotography_happy_client_image_url){ ?>
						   <div class="item">
                                <div class="ed_element_wrapper_box">
                                    <div class="wp_feedback_box ed_box">
									<?php if (has_post_thumbnail()){ ?>
                                        <div class="ed_element_wrapper feedback_img">
                                            <img src="<?php echo esc_url($weddingphotography_happy_client_image_url); ?>" alt="" width="136" height="136" class="ed_image">
                                        </div>
									<?php } ?>					
									<?php if(get_the_content()) {?>
                                        <div class="feedback_para">
                                            <div class="ed_paragraph ed_element_wrapper">
                                                <p class="ed_paragraph"><?php the_content();?></p>
                                            </div>
                                        </div>
										<?php } ?>
									<?php if(get_the_title()) {?>
                                        <div class="ed_element_wrapper_box">
                                            <div class="feedback_footer ed_box">
                                                <div class="ed_element_wrapper">
                                                    <h4 class="ed_heading"><?php the_title();?></h4>
                                                </div>
                                            </div>
                                        </div>
									<?php } ?>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>						
							<?php endwhile; ?>                          
                        </div>
                    </div>
                </div>
            </div>
			 <?php 
        endif;
        } ?>
        </div>
    </section>
  <?php endif;?> 
   <?php if(get_theme_mod("client_switch") != '' && get_theme_mod("client_switch") == 'on'):
/**
 *  Client Section
 */
 $weddingphotography_client_title = get_theme_mod('weddingphotography_client_title');
 ?>
    <section class="editable wp_client_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
				<?php if($weddingphotography_client_title){ ?>
                    <div class="wp_heading">
                        <div class="ed_element_wrapper">
                            <h1 class="ed_heading"><?php echo esc_html($weddingphotography_client_title); ?></h1>
                        </div>
						<?php if($header_image!=''):?>
                        <div class="ed_element_wrapper">
                            <img src="<?php echo esc_url($header_image);?>" alt="" width="170" height="17" class="ed_image" />
                        </div>
						<?php endif;?>
                    </div>
					<?php } ?>	
                </div>
            </div>
			<?php
			$weddingphotography_client_cat = get_theme_mod('weddingphotography_client_cat');
			if($weddingphotography_client_cat){
				wp_reset_postdata();
				$weddingphotography_client_args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category_name' => $weddingphotography_client_cat
				);
				$weddingphotography_client_query = new WP_Query($weddingphotography_client_args);
				if($weddingphotography_client_query->have_posts()):
				?>
            <div class="row" style="padding-top:50px;">
                <div class="col-lg-12 col-md-12">
                    <div class="wp_client_slider ed_element_wrapper_slider">
                        <div class="owl-carousel owl-theme ed_slider" id="wp_partnet_slider" data_number_of_item="5" data_responsive_item="1,2,3" data_slides_margin="80">
                            <?php 
							while($weddingphotography_client_query->have_posts()): $weddingphotography_client_query->the_post();
							$weddingphotography_client_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'weddingphotography-client-image');
							$weddingphotography_client_image_url = $weddingphotography_client_image_src[0];
							if(get_the_title() || $weddingphotography_client_image_url){ ?>						   							
							<div class="item">
							<?php if (has_post_thumbnail()){ ?>
                                <div class="ed_element_wrapper client_img">
                                    <img src="<?php echo esc_url($weddingphotography_client_image_url); ?>" alt="" width="116" height="89" class="ed_image">
                                </div>
							 <?php } ?>	
                            </div>
							 <?php } ?>						
							<?php endwhile; ?>  							
						</div>							 
                    </div>
                </div>
            </div>
			 <?php 
        endif;
        } ?>
        </div>
    </section>
	<?php endif;?>
<?php get_footer(); ?>