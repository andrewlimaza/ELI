<?php
/**
 * Customizer code goes here.
 *
 * @package eli
 */

/**
 * This registers kak.
 *
 * @param object $wp_customize The customize object.
 */
function eli_customizer_register( $wp_customize ) {

    /**
     *
     * Custom scripts.
     *
     */
     $wp_customize->add_section( 'eli_theme_scripts',
         array(
            'title'       => __( 'Additional Scripts', 'eli' ), //Visible title of section
            'priority'    => 1000, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            //'description' => __( 'General Settings For Footer.' , 'eli' ), //Descriptive tooltip
         )
    );

    $wp_customize->add_setting( 'eli_header_script', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
    );

    $wp_customize->add_setting( 'eli_body_script', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
    );

    $wp_customize->add_setting( 'eli_footer_script', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
    );

    $wp_customize->add_control( new WP_Customize_Control ( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_header_script', //Set a unique ID for the control
         array(
            'type'       => 'textarea',
            'label'      => __( 'Header Scripts', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_header_script', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_theme_scripts',
            'description' => __( 'You are able to add in JavaScript scripts such as <strong>Google Tracking code</strong> to the header of your site. <strong>Please include &lt;script&gt; tags</strong>.', 'eli' ),
         )
    ) );

    $wp_customize->add_control( new WP_Customize_Control ( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_body_script', //Set a unique ID for the control
         array(
            'type'       => 'textarea',
            'label'      => __( 'Body Scripts', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_body_script', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_theme_scripts',
            'description' => __( 'You are able to add in JavaScript scripts right before the closing body tag (&lt;/body&gt;). <strong>Please include &lt;script&gt; tags</strong>.', 'eli' ),
         )
    ) );


    $wp_customize->add_control( new WP_Customize_Control ( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_footer_script', //Set a unique ID for the control
         array(
            'type'       => 'textarea',
            'label'      => __( 'Footer Scripts', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_script', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_theme_scripts',
            'description' => __( 'You are able to add in JavaScript scripts to the footer of your site. <strong>Please include &lt;script&gt; tags</strong>.', 'eli' ),
         )
    ) );

    /**
     *
     * START OF FOOTER SECTION
     *
     */
    $wp_customize->add_section( 'eli_footer',
         array(
            'title'       => __( 'Footer Options', 'eli' ), //Visible title of section
            'priority'    => 31, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            'description' => __( 'General Settings For Footer.' , 'eli' ), //Descriptive tooltip
         )
    );

    $wp_customize->add_setting( 'eli_show_social_media_footer', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => false, //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );

	$wp_customize->add_setting( 'eli_footer_copyright_text', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '&copy; ' . date("Y") . ' ' . get_bloginfo('name'), //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
    );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_show_social_media', //Set a unique ID for the control
         array(
            'type'       => 'checkbox',
            'label'      => __( 'Show Social Icons', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_show_social_media_footer', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer',
         )
    ) );

	// Control for text itself.
   	$wp_customize->add_control( new WP_Customize_Control ( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_footer_copyright_data', //Set a unique ID for the control
         array(
            'type'		 => 'text',
            'label'      => __( 'Copyright Text', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_text', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer',
         )
    ) );

    /**
     * END OF FOOTER SECTION
     */

    /**
     * Social Media Settings
     */

    $wp_customize->add_section( 'eli_social_media',
        array(
            'title'       => __( 'Social Media', 'eli' ), //Visible title of section
            'priority'    => 30, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            'description' => __( "Add your social media URL's. Be sure to check relevant theme options to display social icons (i.e. 'Footer Options').", 'eli'), //Descriptive tooltip
        )
    );

    $eli_social_elements = array(
        'facebook' => 'facebook',
        'twitter' => 'twitter',
        'instagram' => 'instagram',
        'google_plus' => 'google-plus',
        'linkedin' => 'linkedin',
        'dribbble' => 'dribbble',
        'github' => 'github',
        'email' => 'envelope',
    );

    // Let's be smart about this.
    foreach( $eli_social_elements as $setting => $fa ) {

            $wp_customize->add_setting( 'eli_social_'.$setting, //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
            array(
                'default'    => '', //Default setting/value to save
                'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            )
        );
    }

        $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_facebook', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Facebook URL', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_facebook', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_twitter', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Twitter URL', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_twitter', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );


    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_instagram', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Instagram URL', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_instagram', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_google_plus', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Google Plus URL', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_google_plus', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_linked_in', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Linkedin URL', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_linkedin', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_dribbble', //Set a unique ID for the control
         array(
            'type'  => 'url',
            'label' => __( 'Dribbble URL', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_dribbble', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_github', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'GitHub URL', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_github', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_email', //Set a unique ID for the control
         array(
            'type'       => 'text',
            'label'      => __( 'Contact Email', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_social_email', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_social_media',
         )
    ) );

    /**
     * End of social Media Settings.
     */


    $wp_customize->add_section( 'eli_header_settings',
         array(
            'title'       => __( 'Header Options', 'eli' ), //Visible title of section
            'priority'    => 30, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            'description' => __( 'General Settings For Header.', 'eli' ), //Descriptive tooltip
         )
      );

    $wp_customize->add_setting( 'eli_sticky_header', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => false, //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_sticky_header', //Set a unique ID for the control
         array(
            'type'       => 'checkbox',
            'label'      => __( 'Sticky Header', 'eli' ), //Admin-visible name of the control
            'settings'   => 'eli_sticky_header', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_header_settings',
         )
    ) );


    /**
     * Start of Custom Color Control Area
     */
    $wp_customize->add_section( 'eli_site_colors',
        array(
            'title'       => __( 'Site Colors', 'eli' ),
            'priority'    => 30,
            'capability'  => 'edit_theme_options',
        )
    );

    /* Setup the settings, and sanitizers */
    $wp_customize->add_setting( 'eli_nav_bg_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_setting( 'eli_nav_a_link_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_setting( 'eli_nav_hover_a_link_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting( 'eli_nav_active_a_link_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_setting( 'eli_a_link_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_setting( 'eli_hover_a_link_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting( 'eli_body_bg_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_setting( 'eli_footer_bg_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_setting( 'eli_footer_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'  => 'postMessage',
        )
    );

    /* Setup the controls */
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_nav_bg_color',
        array(
            'label'      => __( 'Navigation Background', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_nav_bg_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_nav_a_link_color',
        array(
            'label'      => __( 'Navigation Link Color', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_nav_a_link_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_nav_hover_a_link_color',
        array(
            'label'      => __( 'Navigation Link Hover Color', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_nav_hover_a_link_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_nav_active_a_link_color',
        array(
            'label'      => __( 'Navigation Active Link Color', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_nav_active_a_link_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_a_link_color',
        array(
            'label'      => __( 'Site Link Color', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_a_link_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_hover_a_link_color',
        array(
            'label'      => __( 'Site Link Hover Color', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_hover_a_link_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_body_bg_color',
        array(
            'label'      => __( 'Body Background', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_body_bg_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_footer_bg_color',
        array(
            'label'      => __( 'Footer Background', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_footer_bg_color',
        ) )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'eli_footer_color',
        array(
            'label'      => __( 'Footer Text Color', 'eli' ),
            'section'    => 'eli_site_colors',
            'settings'   => 'eli_footer_color',
        ) )
    );

     /**
     *
     * START OF FLOATING BUTTONS
     *
     */
    $wp_customize->add_section( 'eli_floating_buttons',
         array(
            'title'       => __( 'Floating Buttons', 'eli' ), //Visible title of section
            'priority'    => 31, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            'description' => __( 'Show floating buttons.' , 'eli' ), //Descriptive tooltip
         )
    );

    $wp_customize->add_setting( 'eli_back_to_top', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    =>  false, //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage' //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );

    $wp_customize->add_control( 'eli_back_to_top', 
        array(
            'type' => 'checkbox',
            'label' => 'Show Back to Top Link', 
            'section' => 'eli_floating_buttons',
            'settings' => 'eli_back_to_top',
            'priority' => '130'
        )
    );


}
add_action( 'customize_register', 'eli_customizer_register' );
