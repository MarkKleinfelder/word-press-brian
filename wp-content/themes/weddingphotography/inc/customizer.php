<?php
/**
 * weddingphotography Theme Customizer
 *
 * @package weddingphotography
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function weddingphotography_customize_register( $wp_customize ) {
	$weddingphotography_cat_list = weddingphotography_Category_list();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	//Homepage Panel	
	$wp_customize->add_panel( 'homepage_panel', array(
	    'priority' => 60,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'weddingphotography' ),
	    'description' => __( 'This panel will add the settings of home page i.e. baner,teams,work,clients ,portfolio image and contact info etc.', 'weddingphotography' ),
	) );
	
	//Banner Settings Start	
	$wp_customize->add_section(
       	 'weddingphotography_banner_setting',
       		 array(
           		 'title'         => __('Banner Settings', 'weddingphotography'),
            		'priority'      => 10,
            		'panel'		=>'homepage_panel',
        	)
   	 );
   	 
   	 $wp_customize->add_setting(
       		 'banner_switch',
        	array(
            		'default' => 'off',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_switch',
       	 	)
    	);
    	
    	$wp_customize->add_control(
        	'banner_switch',
       		 array(
           		 'type'      => 'radio',
				  'priority' => 1,
            		'label'     => __('Banner Switch', 'weddingphotography'),
            		'section'   => 'weddingphotography_banner_setting',
	    		'description'   => __('On and Off settings for banner display Section.', 'weddingphotography'),      
             		'choices'   => array(
            		"on" => "On",
            		"off" => "Off",
            		
			),
        	)
    	); 
    	
    	//Banner Image   	
    	$wp_customize->add_setting(
       		 'banner_image',
       		 array(
           	 'default' => '',
	         'transport'=>'refresh',
            	'sanitize_callback' => 'esc_url_raw',
        	)
    	);
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_image', array(
        	'label'             => __('Banner Image', 'weddingphotography'),
        	'description'   => __('Add background image of your homepage banner section.', 'weddingphotography'),
			  'priority' => 2,
        	'section'           => 'weddingphotography_banner_setting',
        	'settings'          => 'banner_image',    
    	)));
		
    //banner category
     	$wp_customize->add_setting(
		'weddingphotography_slider_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'weddingphotography_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'weddingphotography_slider_cat',
		array(
        'label' => esc_html__('Banner Category','weddingphotography'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $weddingphotography_cat_list,
        'section' => 'weddingphotography_banner_setting'
		)
	);
	//banner title
	$wp_customize->add_setting(
		'weddingphotography_banner_title',
		array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
		)
		);
		$wp_customize->add_control(
		'weddingphotography_banner_title',
		array(
        'label' => esc_html__('Banner Section Title','weddingphotography'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'weddingphotography_banner_setting'
		)
		);
    	
    	//Our work(what we do) Section Settings Start    	
    	$wp_customize->add_section(
       	 'weddingphotography_work_settings',
       		 array(
           		 'title'         => __('Our Work Settings', 'weddingphotography'),
            		'priority'      => 20,
            		'panel'		=>'homepage_panel',
        	)
   	 );
   	     	
    	//Our Work Switch   	
   	 	$wp_customize->add_setting(
       		 'work_switch',
        	array(
            		'default' => 'off',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_switch',
       	 	)
    	);
    	
    		$wp_customize->add_control(
        	'work_switch',
       		 array(
           		 'type'      => 'radio',
				 'priority' => 1,
            		'label'     => __('Our Work Switch', 'weddingphotography'),
            		'section'   => 'weddingphotography_work_settings',
	    		'description'   => __('On and Off settings for our work section.', 'weddingphotography'),      
             		'choices'   => array(
            		"on" => "On",
            		"off" => "Off",           		
			),
        	)
    	); 
    	
    	//Work  Image   	
    	$wp_customize->add_setting(
       		 'work_image',
       		 array(
           	 'default' => '',
	         'transport'=>'refresh',
            	'sanitize_callback' => 'esc_url_raw',
        	)
    	);
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'work_image', array(
        	'label'             => __('Work Image', 'weddingphotography'),
        	'description'   => __('Add image to display in left side of work Section.', 'weddingphotography'),
			 'priority' => 2,
        	'section'           => 'weddingphotography_work_settings',
        	'settings'          => 'work_image',    
    	)));	
    	
    	 //work category
     	$wp_customize->add_setting(
		'weddingphotography_work_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'weddingphotography_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'weddingphotography_work_cat',
		array(
        'label' => esc_html__('Our Work Category','weddingphotography'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $weddingphotography_cat_list,
        'section' => 'weddingphotography_work_settings'
		)
	);
	//work title
	$wp_customize->add_setting(
		'weddingphotography_work_title',
		array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
		)
		);
		$wp_customize->add_control(
		'weddingphotography_work_title',
		array(
        'label' => esc_html__('Our Work Section Title','weddingphotography'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'weddingphotography_work_settings'
		)
		);
    	    	
    	//Team Section Settings Start    	
    	$wp_customize->add_section(
       	 'weddingphotography_team_settings',
       		 array(
           		 'title'         => __('Team Settings', 'weddingphotography'),
            		'priority'      => 30,
            		'panel'		=>'homepage_panel',
        	)
   	 );
   	 
   	 //Team Switch
   	 	$wp_customize->add_setting(
       		 'team_switch',
        	array(
            		'default' => 'off',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_switch',
       	 	)
    	);
    	
    		$wp_customize->add_control(
        	'team_switch',
       		 array(
           		 'type'      => 'radio',
				  'priority' => 1,
            		'label'     => __('Team Switch', 'weddingphotography'),
            		'section'   => 'weddingphotography_team_settings',
	    		'description'   => __('On and Off settings for team section.', 'weddingphotography'),      
             		'choices'   => array(
            		"on" => "On",
            		"off" => "Off",
            		
			),
        	)
    	); 	
    	   	
    	//Team Background Image   	
    	$wp_customize->add_setting(
       		 'team_bg_image',
       		 array(
           	 'default' => '',
	         'transport'=>'refresh',
            	'sanitize_callback' => 'esc_url_raw',
        	)
    	);
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'team_bg_image', array(
        	'label'             => __('Team Background Image', 'weddingphotography'),
        	'description'   => __('Add background image for your team section.', 'weddingphotography'),
			 'priority' => 2,
        	'section'           => 'weddingphotography_team_settings',
        	'settings'          => 'team_bg_image',    
    	)));
    	
    	 //team category
     	$wp_customize->add_setting(
		'weddingphotography_team_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'weddingphotography_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'weddingphotography_team_cat',
		array(
        'label' => esc_html__('Team Category','weddingphotography'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $weddingphotography_cat_list,
        'section' => 'weddingphotography_team_settings'
		)
	);
	//team title
	$wp_customize->add_setting(
		'weddingphotography_team_title',
		array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
		)
		);
		$wp_customize->add_control(
		'weddingphotography_team_title',
		array(
        'label' => esc_html__('Team Section Title','weddingphotography'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'weddingphotography_team_settings'
		)
		);
    	
    	//Package Section Settings Start   	
    	$wp_customize->add_section(
       	 'weddingphotography_package_settings',
       		 array(
           		 'title'         => __('Package Settings', 'weddingphotography'),
            		'priority'      => 40,
            		'panel'		=>'homepage_panel',
        	)
   	 );
   	 
   	 //Package Switch
   	 	$wp_customize->add_setting(
       		 'package_switch',
        	array(
            		'default' => 'off',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_switch',
       	 	)
    	);
    	
    		$wp_customize->add_control(
        	'package_switch',
       		 array(
           		 'type'      => 'radio',
				   'priority' => 1,
            		'label'     => __('Package Switch', 'weddingphotography'),
            		'section'   => 'weddingphotography_package_settings',
	    		'description'   => __('On and Off settings for package section.', 'weddingphotography'),      
             		'choices'   => array(
            		"on" => "On",
            		"off" => "Off",
            		
			),
        	)
    	); 	
    	
    	//Package Background Image   	
    	$wp_customize->add_setting(
       		 'package_bg_image',
       		 array(
           	 'default' => '',
	         'transport'=>'refresh',
            	'sanitize_callback' => 'esc_url_raw',
        	)
    	);
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'package_bg_image', array(
        	'label'             => __('Package Background Image', 'weddingphotography'),
        	'description'   => __('Add background image for your package section.', 'weddingphotography'),
			  'priority' => 2,
        	'section'           => 'weddingphotography_package_settings',
        	'settings'          => 'package_bg_image',    
    	)));
    	
    	 //package category
     	$wp_customize->add_setting(
		'weddingphotography_package_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'weddingphotography_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'weddingphotography_package_cat',
		array(
        'label' => esc_html__('Package Category','weddingphotography'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $weddingphotography_cat_list,
        'section' => 'weddingphotography_package_settings'
		)
	);
	//package title
	$wp_customize->add_setting(
		'weddingphotography_package_title',
		array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
		)
		);
		$wp_customize->add_control(
		'weddingphotography_package_title',
		array(
        'label' => esc_html__('Package Section Title','weddingphotography'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'weddingphotography_package_settings'
		)
		);
    	
    	//Portfolio Section Settings Start    	
    	$wp_customize->add_section(
       	 'weddingphotography_portfolio_settings',
       		 array(
           		 'title'         => __('Portfolio Images Settings', 'weddingphotography'),
            		'priority'      => 50,
            		'panel'		=>'homepage_panel',
        	)
   	 );
   	 
    	
    	//Portfolio Switch   	
   	 	$wp_customize->add_setting(
       		 'portifolio_switch',
        	array(
            		'default' => 'off',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_switch',
       	 	)
    	);
    	
    		$wp_customize->add_control(
        	'portifolio_switch',
       		 array(
           		 'type'      => 'radio',
				  'priority' => 1,
            		'label'     => __('Portifolio Images Switch', 'weddingphotography'),
            		'section'   => 'weddingphotography_portfolio_settings',
	    		'description'   => __('On and Off settings for portfolio images section.', 'weddingphotography'),     
             		'choices'   => array(
            		"on" => "On",
            		"off" => "Off",
            		
			),
        	)
    	); 
    	
    	 //portfolio category
     	$wp_customize->add_setting(
		'weddingphotography_portfolio_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'weddingphotography_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'weddingphotography_portfolio_cat',
		array(
        'label' => esc_html__('Portfolio Category','weddingphotography'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $weddingphotography_cat_list,
        'section' => 'weddingphotography_portfolio_settings'
		)
	);	
	//portfolio title
	$wp_customize->add_setting(
		'weddingphotography_portfolio_title',
		array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
		)
		);
		$wp_customize->add_control(
		'weddingphotography_portfolio_title',
		array(
        'label' => esc_html__('Portfolio Section Title','weddingphotography'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'weddingphotography_portfolio_settings'
		)
		);
    	
    	//Happy Client Section Settings Start  	
    	$wp_customize->add_section(
       	 'weddingphotography_happy_client_settings',
       		 array(
           		 'title'         => __('Our Happy Clients Settings', 'weddingphotography'),
            		'priority'      => 60,
            		'panel'		=>'homepage_panel',
        	)
   	 );
   	    	
    	//Happy Clients Switch  	
   	 	$wp_customize->add_setting(
       		 'happy_client_switch',
        	array(
            		'default' => 'off',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_switch',
       	 	)
    	);
    	
    		$wp_customize->add_control(
        	'happy_client_switch',
       		 array(
           		 'type'      => 'radio',
				   'priority' => 1,
            		'label'     => __('Our Happy Clients Switch', 'weddingphotography'),
            		'section'   => 'weddingphotography_happy_client_settings',
	    		'description'   => __('On and Off settings for happy clients section.', 'weddingphotography'),       
             		'choices'   => array(
            		"on" => "On",
            		"off" => "Off",        		
			),
        	)
    	); 
    	
    	//Happy Client Background Image	
    	$wp_customize->add_setting(
       		 'happy_client_bg_image',
       		 array(
           	 'default' => '',
	         'transport'=>'refresh',
            	'sanitize_callback' => 'esc_url_raw',
        	)
    	);
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'happy_client_bg_image', array(
        	'label'             => __('Background Image', 'weddingphotography'),
        	'description'   => __('Add background image for your happy client section.', 'weddingphotography'), 
			  'priority' => 2,
        	'section'           => 'weddingphotography_happy_client_settings',
        	'settings'          => 'happy_client_bg_image',    
    	)));	
    	
    	
    	 //happy client category
     	$wp_customize->add_setting(
		'weddingphotography_happy_client_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'weddingphotography_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'weddingphotography_happy_client_cat',
		array(
        'label' => esc_html__('Slider Category','weddingphotography'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $weddingphotography_cat_list,
        'section' => 'weddingphotography_happy_client_settings'
		)
	);
	//happy client title
	$wp_customize->add_setting(
		'weddingphotography_happy_client_title',
		array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
		)
		);
		$wp_customize->add_control(
		'weddingphotography_happy_client_title',
		array(
        'label' => esc_html__('Happy Client Section Title','weddingphotography'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'weddingphotography_happy_client_settings'
		)
		);
    	
    	// Client Section Settings Start   	
    	$wp_customize->add_section(
       	 'weddingphotography_client_settings',
       		 array(
           		 'title'         => __('Our Clients Settings', 'weddingphotography'),
            		'priority'      => 70,
            		'panel'		=>'homepage_panel',
        	)
   	 );
   	 
    	
    	// Clients Switch   	
  	 	$wp_customize->add_setting(
       		 'client_switch',
        	array(
            		'default' => 'off',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_switch',
       	 	)
    	);
    	
    		$wp_customize->add_control(
        	'client_switch',
       		 array(
           		 'type'      => 'radio',
				   'priority' => 1,
            		'label'     => __('Our Clients Switch', 'weddingphotography'),
            		'section'   => 'weddingphotography_client_settings',
	    		'description'   => __('On and Off settings of client section.', 'weddingphotography'),      
             		'choices'   => array(
            		"on" => "On",
            		"off" => "Off",
            		
			),
        	)
    	); 
    	
    	 //client category
     	$wp_customize->add_setting(
		'weddingphotography_client_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'weddingphotography_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'weddingphotography_client_cat',
		array(
        'label' => esc_html__('Client Category','weddingphotography'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $weddingphotography_cat_list,
        'section' => 'weddingphotography_client_settings'
		)
	);
	// client title
	$wp_customize->add_setting(
		'weddingphotography_client_title',
		array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
		)
		);
		$wp_customize->add_control(
		'weddingphotography_client_title',
		array(
        'label' => esc_html__('Client Section Title','weddingphotography'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'weddingphotography_client_settings'
		)
		);
    	
	//Sidebar Position Settings Start		
	$wp_customize->add_section(
       	 'weddingphotography_sidebar_position',
       		 array(
           		 'title'         => __('Sidebar Position Settings', 'weddingphotography'),
            		'priority'      => 50,
        	)
   	 );	
   	 
   	 	$wp_customize->add_setting(
       		 'theme_sidebar_position',
        	array(
            		'default' => 'right',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'weddingphotography_sanitize_layout',
       	 	)
    	);
    	
    	 	$wp_customize->add_control(
        	'theme_sidebar_position',
       		 array(
           		 'type'      => 'select',
            		'label'     => __('Theme Sidebar Position', 'weddingphotography'),
            		'section'   => 'weddingphotography_sidebar_position',
	    		'description'   => __('This option will work for blog page, blog single page, archive page and search page.', 'weddingphotography'),      
             		'choices'   => array(
            		"full" => "Full-Sidebar",
            		"left" => "Left-Sidebar",
            		"right" => "Right-Sidebar"
			),
        	)
    	); 
    
    		$wp_customize->add_setting(
        	'page_sidebar_position',
        	array(
            'default'           => 'right',
			'transport' 	=> 'refresh',
			'sanitize_callback' => 'weddingphotography_sanitize_layout',
        	)
    	);
    	
    		$wp_customize->add_control(
        	'page_sidebar_position',
        	array(
            		'type'      => 'select',
            		'label'     => __('Page Sidebar Position', 'weddingphotography'),
           		 'section'   => 'weddingphotography_sidebar_position',
			'description'   => __('This option will work for pages.', 'weddingphotography'), 
            		'choices'   => array(
            		"full"=>__("Full-Sidebar","weddingphotography"),
            		"left"=>__("Left-Sidebar","weddingphotography"),
            		"right"=>__("Right-Sidebar","weddingphotography")
			),
        	)
    	); 
		
	//Footer Section Settings Start
		
	 //Footer Contact Info
   	 $wp_customize->add_panel(
       	 'weddingphotography_footer',
       		 array(
           		 'title'         => __('Footer Contact Info Settings', 'weddingphotography'),
            		'priority'      => 80,           		
        	)
   	 );
	 
	 //Footer Contact Info
   	 $wp_customize->add_section(
       	 'weddingphotography_footer_address',
       		 array(
           		 'title'         => __('Footer Address', 'weddingphotography'),
            		'priority'      => 1, 
					'panel'		=>'weddingphotography_footer',				
        	)
   	 );
   	 
   	 	//Footer Address 
   		 $wp_customize->add_setting(
       		 'footer_address_image',
        	array(
            		'default' => '',
           		 'transport'=>'refresh',
           		 'sanitize_callback' => 'esc_url_raw',
       	 	)
    	);
    
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_address_image', array(
       			 'label'             => __('Address Icon', 'weddingphotography'),
       			 'description'   => __('Add icon of your address here', 'weddingphotography'),
        		'section'           => 'weddingphotography_footer_address',
        		'settings'          => 'footer_address_image',    
    		)));
    
		    $wp_customize->add_setting(
        		'footer_address_city',
       			 array(
           		 'default' => '',
            		'transport'=>'refresh',
           		 'sanitize_callback' => 'sanitize_text_field',
        		)
    		);
    
    		$wp_customize->add_control(
       		 'footer_address_city',
       		 array(
           	 'label'         => __( 'Address', 'weddingphotography' ),
           	 'description'   => __('Provide your full address here', 'weddingphotography'),
           	 'section'       => 'weddingphotography_footer_address',
            	'type'          => 'text',
            	'input_attrs' => array(    			
    			'placeholder' => __( 'Your Address', 'weddingphotography' ),    			
  			),    
       	 	)
    	);
    
	     $wp_customize->add_setting(
        	'footer_address_pin',
        	array(
           	 'default' => '',
            	'transport'=>'refresh',
            	'sanitize_callback' => 'sanitize_text_field',
       		 )
   	 );
    
    		$wp_customize->add_control(
      	  	'footer_address_pin',
	        array(
            	'label'         => __( 'Pincode', 'weddingphotography' ),
            	'description'   => __('Add pincode of your address here', 'weddingphotography'),
            	'section'       => 'weddingphotography_footer_address',
            	'type'          => 'text',  
            	'input_attrs' => array(    			
    			'placeholder' => __( 'Your Pincode', 'weddingphotography' ),    			
  			),      
        	)
    	);
    
    	//Footer Phone
   	 $wp_customize->add_section(
       	 'weddingphotography_footer_contact',
       		 array(
           		 'title'         => __('Footer Contact', 'weddingphotography'),
            		'priority'      => 2, 
					'panel'		=>'weddingphotography_footer',				
        	)
   	 );
		
    		$wp_customize->add_setting(
       		 'footer_phone_image',
       		 array(
           	 'default' => '',
	         'transport'=>'refresh',
            	'sanitize_callback' => 'esc_url_raw',
        	)
    	);
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_phone_image', array(
        	'label'             => __('Contact Icon', 'weddingphotography'),
        	'description'   => __('Add icon for your contact number.', 'weddingphotography'),
        	'section'           => 'weddingphotography_footer_contact',
        	'settings'          => 'footer_phone_image',    
    	)));
    
     		$wp_customize->add_setting(
        	'footer_phone',
       		 array(
           	 'default' => '',
           	 'transport'=>'refresh',
            	'sanitize_callback' => 'sanitize_text_field',
        	)
   	 );
    		$wp_customize->add_control(
       		 'footer_phone',
       		 array(
           	 'label'         => __( 'Contact Number.', 'weddingphotography' ),
           	 'description'   => __('Provide your contact number here.', 'weddingphotography'),
           	 'section'       => 'weddingphotography_footer_contact',
           	 'type'          => 'text',
           	 'input_attrs' => array(    			
    			'placeholder' => __( 'Your Contact No.', 'weddingphotography' ),    			
  			),      
        	)
    	);
    
    	//Footer Email
		$wp_customize->add_section(
       	 'weddingphotography_footer_email',
       		 array(
           		 'title'         => __('Footer Email', 'weddingphotography'),
            		'priority'      => 3, 
					'panel'		=>'weddingphotography_footer',				
        	)
   	 );
		
   		 $wp_customize->add_setting(
        	'footer_email_image',
        	array(
            	'default' => '',
            	'transport'=>'refresh',
           	 'sanitize_callback' => 'esc_url_raw',
        	)
    	);
    		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_email_image', array(
        	'label'             => __('Email Icon', 'weddingphotography'),
        	'description'   => __('Add icon of your email address here.', 'weddingphotography'),
        	'section'           => 'weddingphotography_footer_email',
        	'settings'          => 'footer_email_image',    
    	)));
    
    		$wp_customize->add_setting(
        	'footer_email',
        	array(
           	 'default' => '',
            	'transport'=>'refresh',
           	 'sanitize_callback' => 'sanitize_text_field',
        	)
    	);
    		$wp_customize->add_control(
        	'footer_email',
        	array(
            	'label'         => __( 'Email', 'weddingphotography' ),
            	'description'   => __('Provide your email address here.', 'weddingphotography'),  
            	'section'       => 'weddingphotography_footer_email',
            	'type'          => 'text',  
            	'input_attrs' => array(    			
    			'placeholder' => __( 'Your Email', 'weddingphotography' ),    			
  			),    
        	)
    	);	
        
	//Footer setting end
		
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'weddingphotography_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'weddingphotography_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'weddingphotography_customize_register' );

/**
 * Sanitize Functions
 */

/** Customizer Textarea Sanitize **/
function weddingphotography_sanitize_textarea($input){
    return wp_kses_post(force_balance_tags($input));
}

/** Customizer Category List Sanitize **/
function weddingphotography_sanitize_post_cat_list($input){
    $weddingphotography_cat_list = weddingphotography_Category_list();
    if(array_key_exists($input,$weddingphotography_cat_list)){
        return $input;
    }
    else{
        return '';
    }
}
/** Customizer layout  Sanitize **/
function weddingphotography_sanitize_layout( $value ) {  
    if ( ! in_array( $value, array( 'full', 'left', 'right' ) ) )
        $value = 'right';
 
    return $value;   
}
/** Customizer radio Sanitize **/
function weddingphotography_sanitize_switch( $value ) {  
    if ( ! in_array( $value, array( 'on', 'off') ) )
        $value = 'off';
 
    return $value;   
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function weddingphotography_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function weddingphotography_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function weddingphotography_customize_preview_js() {
	wp_enqueue_script( 'weddingphotography_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'weddingphotography_customize_preview_js' );	
?>