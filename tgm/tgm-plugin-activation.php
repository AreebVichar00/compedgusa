<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'tgmpa_register', 'erica_register_required_plugins' );

if(!function_exists('lasf_get_plugin_source')){
    function lasf_get_plugin_source( $new, $initial, $plugin_name, $type = 'source'){
        if(isset($new[$plugin_name], $new[$plugin_name][$type]) && version_compare($initial[$plugin_name]['version'], $new[$plugin_name]['version']) < 0 ){
            return $new[$plugin_name][$type];
        }
        else{
            return $initial[$plugin_name][$type];
        }
    }
}

add_filter('Lakit_Theme_Manager/required_plugins', function (){
    return [
        'lastudio-element-kit'      => 'lastudio-element-kit/lastudio-element-kit.php',
        'revslider'                 => 'revslider/revslider.php',
        'erica-demo-data'            => 'erica-demo-data/index.php',
        'lastudio-pagespeed'        => 'lastudio-pagespeed/lastudio-pagespeed.php',
        'lastudio-updater'          => 'lastudio-updater/lastudio-updater.php',
    ];
});

if(!function_exists('erica_register_required_plugins')){

	function erica_register_required_plugins() {

        $initial_required = array(
            'lastudio-element-kit' => array(
                'source'    => 'https://la-studioweb.com/shared/plugins/lastudio-element-kit_v1.3.4.zip',
                'version'   => '1.3.4'
            ),
            'revslider' => array(
                'source'    => 'https://la-studioweb.com/shared/plugins/revslider_v6.6.14.zip',
                'version'   => '6.6.14'
            ),
            'erica-demo-data' => array(
                'source'    => 'https://la-studioweb.com/shared/plugins/erica-demo-data_v1.0.0.zip',
                'version'   => '1.0.0'
            ),
            'lastudio-pagespeed' => array(
                'source'    => 'https://la-studioweb.com/shared/plugins/lastudio-pagespeed_v1.0.7.zip',
                'version'   => '1.0.7'
            ),
            'lastudio-updater' => array(
                'source'    => 'https://la-studioweb.com/shared/plugins/lastudio-updater_v1.0.0.zip',
                'version'   => '1.0.0'
            )
        );

        $from_option = get_option('erica_required_plugins_list', $initial_required);

		$plugins = array();

        $plugins[] = array(
            'name' 					=> esc_html_x('Elementor', 'admin-view', 'erica'),
            'slug' 					=> 'elementor',
            'required' 				=> true,
            'version'				=> '3.15.1'
        );

        $plugins[] = array(
            'name'     				=> esc_html_x('LA-Studio Element Kit for Elementor', 'admin-view', 'erica'),
            'slug'     				=> 'lastudio-element-kit',
            'source'				=> lasf_get_plugin_source($from_option, $initial_required, 'lastudio-element-kit'),
            'required'				=> true,
            'version'				=> lasf_get_plugin_source($from_option, $initial_required, 'lastudio-element-kit', 'version')
        );

		$plugins[] = array(
			'name'     				=> esc_html_x('WooCommerce', 'admin-view', 'erica'),
			'slug'     				=> 'woocommerce',
			'version'				=> '7.9.0',
			'required' 				=> false
		);
        
        $plugins[] = array(
			'name'     				=> esc_html_x('Erica Package Demo Data', 'admin-view', 'erica'),
			'slug'					=> 'erica-demo-data',
            'source'				=> lasf_get_plugin_source($from_option, $initial_required, 'erica-demo-data'),
            'required'				=> false,
            'version'				=> lasf_get_plugin_source($from_option, $initial_required, 'erica-demo-data', 'version')
		);

		$plugins[] = array(
			'name'     				=> esc_html_x('Envato Market', 'admin-view', 'erica'),
			'slug'     				=> 'envato-market',
			'source'   				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' 				=> false,
			'version' 				=> '2.0.10'
		);

		$plugins[] = array(
			'name' 					=> esc_html_x('Contact Form 7', 'admin-view', 'erica'),
			'slug' 					=> 'contact-form-7',
			'required' 				=> false
		);

		$plugins[] = array(
			'name'					=> esc_html_x('Slider Revolution', 'admin-view', 'erica'),
			'slug'					=> 'revslider',
            'source'				=> lasf_get_plugin_source($from_option, $initial_required, 'revslider'),
            'required'				=> false,
            'version'				=> lasf_get_plugin_source($from_option, $initial_required, 'revslider', 'version')
		);

		$plugins[] = array(
			'name'					=> esc_html_x('LA-Studio Pagespeed', 'admin-view', 'erica'),
			'slug'					=> 'lastudio-pagespeed',
            'source'				=> lasf_get_plugin_source($from_option, $initial_required, 'lastudio-pagespeed'),
            'required'				=> false,
            'version'				=> lasf_get_plugin_source($from_option, $initial_required, 'lastudio-pagespeed', 'version')
		);

		$plugins[] = array(
			'name'					=> esc_html_x('LA-Studio Updater', 'admin-view', 'erica'),
			'slug'					=> 'lastudio-updater',
            'source'				=> lasf_get_plugin_source($from_option, $initial_required, 'lastudio-updater'),
            'required'				=> false,
            'version'				=> lasf_get_plugin_source($from_option, $initial_required, 'lastudio-updater', 'version')
		);

		$config = array(
			'id'           				=> 'erica',
			'default_path' 				=> '',
			'menu'         				=> 'tgmpa-install-plugins',
			'has_notices'  				=> true,
			'dismissable'  				=> true,
			'dismiss_msg'  				=> '',
			'is_automatic' 				=> false,
			'message'      				=> ''
		);

		tgmpa( $plugins, $config );

	}

}
