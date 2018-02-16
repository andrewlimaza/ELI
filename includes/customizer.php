<?php
/**
 * Customizer code goes here.
 */

function eli_customizer_register( $wp_customize ) {
    // add in a filter for this! 
    // associative array for setting ID and FontAwesome Icon.
    // make this global somewhere?
    $eli_footer_social_elements = array(
        'facebook' => 'facebook',
        'twitter' => 'twitter',
        'instagram' => 'instagram',
        'google_plus' => 'google-plus',     
        'linkedin' => 'linkedin',
        'dribbble' => 'dribbble',
        'github' => 'github',
        'email' => 'envelope',
    );

	/**
	 *
	 * START OF FOOTER SECTION
	 *
	 */
	$wp_customize->add_section( 'eli_footer_copyright', 
         array(
            'title'       => __( 'Footer Options', 'mytheme' ), //Visible title of section
            'priority'    => 31, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            'description' => __('Allows you to customize some example settings for MyTheme.', 'mytheme'), //Descriptive tooltip
         ) 
    );

	$wp_customize->add_setting( 'eli_footer_copyright_text', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '&copy; 2018 ' . get_bloginfo('name'), //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
    );

    // Let's be smart about this.
    foreach( $eli_footer_social_elements as $setting => $fa ) {

            $wp_customize->add_setting( 'eli_footer_copyright_'.$setting, //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
            array(
                'default'    => '', //Default setting/value to save
                'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            ) 
    );

    }

	// Control for text itself.
   	$wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_footer_copyright_data', //Set a unique ID for the control
         array(
            'type'		 => 'text',
            'label'      => __( 'Copyright Text', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_text', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_facebook', //Set a unique ID for the control
         array(
            'type'		 => 'url',
            'label'      => __( 'Facebook URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_facebook', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) ); 

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_twitter', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Twitter URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_twitter', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) );


    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_instagram', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Instagram URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_instagram', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) );  

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_google_plus', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Google Plus URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_google_plus', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_linked_in', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Linkedin URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_linkedin', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) ); 

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_dribbble', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'Dribbble URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_dribbble', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) );

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_github', //Set a unique ID for the control
         array(
            'type'       => 'url',
            'label'      => __( 'GitHub URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_github', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) ); 

    $wp_customize->add_control( new WP_Customize_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'eli_email', //Set a unique ID for the control
         array(
            'type'       => 'text',
            'label'      => __( 'Contact Email', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_email', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_footer_copyright',
         ) 
    ) );
 
    /**
     * END OF FOOTER SECTION
     */    

    $wp_customize->add_section( 'eli_header_settings', 
         array(
            'title'       => __( 'Header Settings', 'mytheme' ), //Visible title of section
            'priority'    => 30, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            'description' => __('Allows you to customize some example settings for MyTheme.', 'mytheme'), //Descriptive tooltip
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
            'label'      => __( 'Sticky Header', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_sticky_header', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_header_settings',
         ) 
    ) ); 

}
add_action( 'customize_register', 'eli_customizer_register' );