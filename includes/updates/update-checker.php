<?php

class YT_License_Manager {
	/**
 * The API endpoint. Configured through the class's constructor.
 *
 * @var String  The API endpoint.
 */
private $api_endpoint;
 
/**
 * The product id (slug) used for this product on the License Manager site.
 * Configured through the class's constructor.
 *
 * @var int     The product id of the related product in the license manager.
 */
private $product_id;
 
/**
 * The name of the product using this class. Configured in the class's constructor.
 *
 * @var int     The name of the product (plugin / theme) using this class.
 */
private $product_name;
 
/**
 * The type of the installation in which this class is being used.
 *
 * @var string  'theme' or 'plugin'.
 */
private $type;
 
/**
 * The text domain of the plugin or theme using this class.
 * Populated in the class's constructor.
 *
 * @var String  The text domain of the plugin / theme.
 */
private $text_domain;
 
/**
 * @var string  The absolute path to the plugin's main file. Only applicable when using the
 *              class with a plugin.
 */
private $plugin_file;

/**
 * Initializes the license manager client.
 *
 * @param $product_id   string  The text id (slug) of the product on the license manager site
 * @param $product_name string  The name of the product, used for menus
 * @param $text_domain  string  Theme / plugin text domain, used for localizing the settings screens.
 * @param $api_url      string  The URL to the license manager API (your license server)
 * @param $type         string  The type of project this class is being used in ('theme' or 'plugin')
 * @param $plugin_file  string  The full path to the plugin's main file (only for plugins)
 */
public function __construct( $product_id, $product_name, $text_domain, $api_url,
                             $type = 'theme', $plugin_file = '' ) {
        // Store setup data
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->text_domain = $text_domain;
        $this->api_endpoint = $api_url;
        $this->type = $type;
        $this->plugin_file = $plugin_file;
    }
}

} // end of class.