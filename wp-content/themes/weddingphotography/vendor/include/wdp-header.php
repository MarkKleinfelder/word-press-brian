<section class="editable wp_menu_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="wp_logo ed_element_wrapper">
				<?php if((has_custom_logo())): 
							the_custom_logo();
								else:
					 if ( is_front_page() && is_home() ) : ?>
					
							<div class="site-title"><h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></div>
						<?php else : ?>
							<p class="site-title"><h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></p>
						<?php endif; 

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html($description) ; ?></p>
						<?php endif;
						endif; ?>

						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				   <span class="sr-only"><?php esc_html_e('Toggle navigation','weddingphotography');?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12">
				<nav class="navbar">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-right:0px;">
						<div class="wp_menu">
						   <?php wp_nav_menu( array( 'theme_location'  => 'menu-1','depth' => 4 ,'menu_class' => 'nav navbar-nav','container' => false,'fallback_cb'=>'weddingphotography_menu_editor')); ?>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
	
