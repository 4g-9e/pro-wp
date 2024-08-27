<?php
/**
 * Customizer section options.
 *
 * @package business_model
 *
 */

function business_model_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'designexo_footer_copright_text',
			array(
				'sanitize_callback' =>  'business_model_sanitize_text',
				'default' => __('Copyright &copy; 2024 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Business Model theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'business-model'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('designexo_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','business-model'),
				'section' => 'designexo_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'business_model_customizer_theme_settings' );

function business_model_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}