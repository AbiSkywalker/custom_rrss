<?php
/**
*	Plugin Name: Nordetia RRSS
*	Description: Datos de redes sociales Nordetia
*	Version: 1.0
*	Text Domain:  nordetia-rrss
**/

	function nordetia_rrss_add_settings_page() {
	    add_options_page( 'Nordetia RRSS', 'Nordetia RRSS', 'manage_options', 'nordetia-rrss-settings', 'nordetia_rrss_settings_page' );
	}
	add_action( 'admin_menu', 'nordetia_rrss_add_settings_page' );



	function nordetia_rrss_settings_page(){
		?>
		    <h2>Nordetia RRSS</h2>
		    <form action="options.php" method="post">
		        <?php 
		        settings_fields( 'nordetia_rrss_settings_options' );
		        do_settings_sections( 'nordetia_rrss_settings' ); ?>
		        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
		    </form>
	    <?php
	}

	function nordetia_rrss_settings() {
	    register_setting( 'nordetia_rrss_settings_options', 'nordetia_rrss_settings_options', 'nordetia_rrss_settings_options_validate' );
	    add_settings_section( 'nordetia_rrss', 'Nordetia RRSS Settings', 'nordetia_rrss_settings_section_text', 'nordetia_rrss_settings' );

	    add_settings_field( 'nordetia_rrss_setting_fb_url', 'Facebook URL', 'nordetia_rrss_setting_fb_url', 'nordetia_rrss_settings', 'nordetia_rrss' );
	    add_settings_field( 'nordetia_rrss_setting_ig_url', 'Instagram URL', 'nordetia_rrss_setting_ig_url', 'nordetia_rrss_settings', 'nordetia_rrss' );
	    add_settings_field( 'nordetia_rrss_setting_in_url', 'LinkedIn URL', 'nordetia_rrss_setting_in_url', 'nordetia_rrss_settings', 'nordetia_rrss' );
	    add_settings_field( 'nordetia_rrss_setting_tw_url', 'Twitter URL', 'nordetia_rrss_setting_tw_url', 'nordetia_rrss_settings', 'nordetia_rrss' );
	}
	add_action( 'admin_init', 'nordetia_rrss_settings' );


	function nordetia_rrss_settings_options_validate( $input ){
	
		return $input;
	}

	function nordetia_rrss_settings_section_text(){
		echo __("<p>Fill your social media links</p>");
	}

	function nordetia_rrss_setting_fb_url(){
		$options = get_option('nordetia_rrss_settings_options');
		echo "<input id='nordetia_rrss_setting_fb_url' name='nordetia_rrss_settings_options[fb_url]' 
				type='text' value='" . esc_attr( $options['fb_url'] ) . "' />";
	}

	function nordetia_rrss_setting_ig_url(){
		$options = get_option('nordetia_rrss_settings_options');
		echo "<input id='nordetia_rrss_setting_ig_url' name='nordetia_rrss_settings_options[ig_url]' 
				type='text' value='" . esc_attr( $options['ig_url'] ) . "' />";
	}

	function nordetia_rrss_setting_in_url(){
		$options = get_option('nordetia_rrss_settings_options');
		echo "<input id='nordetia_rrss_setting_in_url' name='nordetia_rrss_settings_options[in_url]' 
				type='text' value='" . esc_attr( $options['in_url'] ) . "' />";
	}

	function nordetia_rrss_setting_tw_url(){
		$options = get_option('nordetia_rrss_settings_options');
		echo "<input id='nordetia_rrss_setting_tw_url' name='nordetia_rrss_settings_options[tw_url]' 
				type='text' value='" . esc_attr( $options['tw_url'] ) . "' />";
	}



	function print_rrss_header_links(){
		$options = get_option('nordetia_rrss_settings_options');
		echo '<div class="redes">
			<div class="rss_link"><a href="'. esc_attr( $options['fb_url'] ) . '" target="_blank" title="Facebook"><span class="fb_img"></a></div>
			<div class="rss_link"><a href="'. esc_attr( $options['tw_url'] ) . '" target="_blank" title="Twitter"><span class="tw_img"></a></div>
			<div class="rss_link"><a href="'. esc_attr( $options['ig_url'] ) . '" target="_blank" title="Instagram"><span class="ig_img"></a></div>
			<div class="rss_link"><a href="'. esc_attr( $options['in_url'] ) . '" target="_blank" title="Linkedin"><span class="in_img"></a></div>
		</div>';
	}
	add_action('rrss_cabecera', 'print_rrss_header_links');

?>