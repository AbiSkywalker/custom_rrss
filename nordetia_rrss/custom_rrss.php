<?php
/**
*	Plugin Name: Custom RRSS
*	Description: Datos de redes sociales
*	Version: 1.0
*	Text Domain:  custom-rrss
**/

	function custom_rrss_add_settings_page() {
	    add_options_page( 'Custom RRSS', 'Custom RRSS', 'manage_options', 'custom-rrss-settings', 'custom_rrss_settings_page' );
	}
	add_action( 'admin_menu', 'custom_rrss_add_settings_page' );



	function custom_rrss_settings_page(){
		?>
		    <h2>Custom RRSS</h2>
		    <form action="options.php" method="post">
		        <?php 
		        settings_fields( 'custom_rrss_settings_options' );
		        do_settings_sections( 'custom_rrss_settings' ); ?>
		        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
		    </form>
	    <?php
	}

	function custom_rrss_settings() {
	    register_setting( 'custom_rrss_settings_options', 'custom_rrss_settings_options', 'custom_rrss_settings_options_validate' );
	    add_settings_section( 'custom_rrss', 'Custom RRSS Settings', 'custom_rrss_settings_section_text', 'custom_rrss_settings' );

	    add_settings_field( 'custom_rrss_setting_fb_url', 'Facebook URL', 'custom_rrss_setting_fb_url', 'custom_rrss_settings', 'custom_rrss' );
	    add_settings_field( 'custom_rrss_setting_ig_url', 'Instagram URL', 'custom_rrss_setting_ig_url', 'custom_rrss_settings', 'custom_rrss' );
	    add_settings_field( 'custom_rrss_setting_in_url', 'LinkedIn URL', 'custom_rrss_setting_in_url', 'custom_rrss_settings', 'custom_rrss' );
	    add_settings_field( 'custom_rrss_setting_tw_url', 'Twitter URL', 'custom_rrss_setting_tw_url', 'custom_rrss_settings', 'custom_rrss' );
	}
	add_action( 'admin_init', 'custom_rrss_settings' );


	function custom_rrss_settings_options_validate( $input ){
	
		return $input;
	}

	function custom_rrss_settings_section_text(){
		echo __("<p>Fill your social media links</p>");
	}

	function custom_rrss_setting_fb_url(){
		$options = get_option('custom_rrss_settings_options');
		echo "<input id='custom_rrss_setting_fb_url' name='custom_rrss_settings_options[fb_url]' 
				type='text' value='" . esc_attr( $options['fb_url'] ) . "' />";
	}

	function custom_rrss_setting_ig_url(){
		$options = get_option('custom_rrss_settings_options');
		echo "<input id='custom_rrss_setting_ig_url' name='custom_rrss_settings_options[ig_url]' 
				type='text' value='" . esc_attr( $options['ig_url'] ) . "' />";
	}

	function custom_rrss_setting_in_url(){
		$options = get_option('custom_rrss_settings_options');
		echo "<input id='custom_rrss_setting_in_url' name='custom_rrss_settings_options[in_url]' 
				type='text' value='" . esc_attr( $options['in_url'] ) . "' />";
	}

	function custom_rrss_setting_tw_url(){
		$options = get_option('custom_rrss_settings_options');
		echo "<input id='custom_rrss_setting_tw_url' name='custom_rrss_settings_options[tw_url]' 
				type='text' value='" . esc_attr( $options['tw_url'] ) . "' />";
	}



	function print_rrss_header_links(){
		$options = get_option('custom_rrss_settings_options');
		echo '<div class="redes">
			<div class="rss_link"><a href="'. esc_attr( $options['fb_url'] ) . '" target="_blank" title="Facebook"><span class="fb_img"></a></div>
			<div class="rss_link"><a href="'. esc_attr( $options['tw_url'] ) . '" target="_blank" title="Twitter"><span class="tw_img"></a></div>
			<div class="rss_link"><a href="'. esc_attr( $options['ig_url'] ) . '" target="_blank" title="Instagram"><span class="ig_img"></a></div>
			<div class="rss_link"><a href="'. esc_attr( $options['in_url'] ) . '" target="_blank" title="Linkedin"><span class="in_img"></a></div>
		</div>';
	}
	add_action('rrss_cabecera', 'print_rrss_header_links');

?>
