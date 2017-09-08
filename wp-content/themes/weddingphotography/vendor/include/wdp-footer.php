<?php 
$footer_address_image=$footer_address_image_url=$footer_address_city=$footer_address_pin=$footer_phone_image_url=$footer_phone=$footer_phone_image=$footer_email_image=$footer_email_image_url=$footer_email=' ';
$footer_address_image = get_theme_mod('footer_address_image');
if(isset($footer_address_image) && !empty($footer_address_image)){
	$footer_address_image_url = esc_url($footer_address_image);
}else{
	$footer_address_image_url = get_template_directory_uri().'/assets/images/con_icon1.png';
}
$footer_address_city = get_theme_mod('footer_address_city');
if(isset($footer_address_city) && !empty($footer_address_city)){
	$footer_address_city = get_theme_mod('footer_address_city');
}else{
	$footer_address_city = 'Your Address';
}
$footer_address_pin = get_theme_mod('footer_address_pin');
if(isset($footer_address_pin) && !empty($footer_address_pin)){
	$footer_address_pin = get_theme_mod('footer_address_pin');
}else{
	$footer_address_pin = 'Your Pincode';
}
$footer_phone_image = get_theme_mod('footer_phone_image');
if(isset($footer_phone_image) && !empty($footer_phone_image)){
	$footer_phone_image_url = esc_url($footer_phone_image);
}else{
	$footer_phone_image_url = get_template_directory_uri().'/assets/images/con_icon2.png';
}
$footer_phone = get_theme_mod('footer_phone');
if(isset($footer_phone) && !empty($footer_phone)){
	$footer_phone = get_theme_mod('footer_phone');
}else{
	$footer_phone = 'Your Phone No.';
}
$footer_email_image = get_theme_mod('footer_email_image');
if(isset($footer_email_image) && !empty($footer_email_image)){
	$footer_email_image_url = esc_url($footer_email_image);
}else{
	$footer_email_image_url= get_template_directory_uri().'/assets/images/con_icon3.png';
}
$footer_email = get_theme_mod('footer_email');
if(isset($footer_email) && !empty($footer_email)){
	$footer_email = get_theme_mod('footer_email');
}else{
	$footer_email = 'Your Email';
}
?>
<section class="editable wp_con_info_wrapper">
	<div class="container">
		<div class="row ed_element_sorting inner_sorting_disable">
			<div class="col-lg-4 col-md-4 col-sm-4 ed_element_wrapper_box">
				<div class="wp_con_box ed_box">
					<div class="ed_element_wrapper">
						<img src="<?php echo esc_url($footer_address_image_url); ?>" alt="" width="36" height="51" class="ed_image">
					</div>
					<div class="ed_element_wrapper">
						<h3 class="ed_heading"><?php esc_html_e('Address','weddingphotography');?></h3>
					</div>
					<div class="ed_element_wrapper">
						<p class="ed_paragraph"><?php echo esc_html($footer_address_city); ?> </p>
					</div>
					<div class="ed_element_wrapper">
						<p class="ed_paragraph"><?php echo esc_html($footer_address_pin); ?></p>
					</div>
				</div>
			</div>
		   <div class="col-lg-4 col-md-4 col-sm-4 ed_element_wrapper_box">
				<div class="wp_con_box ed_box">
					<div class="ed_element_wrapper">
						<img src="<?php echo esc_url($footer_phone_image_url); ?>" alt="" width="51" height="51" class="ed_image">
					</div>
					<div class="ed_element_wrapper">
						<h3 class="ed_heading"><?php esc_html_e('Phone','weddingphotography');?></h3>
					</div>
					<div class="ed_element_wrapper">
						<p class="ed_paragraph"><?php echo esc_html($footer_phone); ?></p>
					</div>
					<div class="ed_element_wrapper">
						<p class="ed_paragraph"><?php echo esc_html($footer_phone); ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 ed_element_wrapper_box">
				<div class="wp_con_box ed_box">
					<div class="ed_element_wrapper">
						<img src="<?php echo esc_url($footer_email_image_url); ?>" alt="" width="51" height="51" class="ed_image">
					</div>
					<div class="ed_element_wrapper">
						<h3 class="ed_heading"><?php esc_html_e('Email','weddingphotography');?></h3>
					</div>
					<div class="ed_element_wrapper">
						<p class="ed_paragraph"><?php echo esc_html($footer_email); ?></p>
					</div>
					<div class="ed_element_wrapper">
						<p class="ed_paragraph"><?php echo esc_html($footer_email); ?></p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<section class="editable wp_footer_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="ed_element_wrapper">
					<?php do_action( 'weddingphotography_footer_copyright_text' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>