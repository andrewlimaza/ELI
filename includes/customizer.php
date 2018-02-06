<?php
/**
 * Customizer code goes here.
 */

function eli_customizer_register( $wp_customize ) {


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

	$wp_customize->add_setting( 'eli_footer_copyright_facebook', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );

	$wp_customize->add_setting( 'eli_footer_copyright_twitter', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );

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
         'eli_footer_facebook', //Set a unique ID for the control
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
            'type'		 => 'url',
            'label'      => __( 'Twitter URL', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_footer_copyright_twitter', //Which setting to load and manipulate (serialized is okay)
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
         'eli_twitter', //Set a unique ID for the control
         array(
            'type'       => 'checkbox',
            'label'      => __( 'Sticky Header', 'mytheme' ), //Admin-visible name of the control
            'settings'   => 'eli_sticky_header', //Which setting to load and manipulate (serialized is okay)
            'section'    => 'eli_header_settings',
         ) 
    ) ); 

  

}
add_action( 'customize_register', 'eli_customizer_register' );

// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
// 	'label'      => __( 'Header Color', 'mytheme' ),
// 	'section'    => 'colors',
// 	'settings'   => 'header_color',
// ) ) );

// $wp_customize->add_setting( 'header_color' , array(
//     'default'     => '#000000',
//     'transport'   => 'refresh',
// ) );