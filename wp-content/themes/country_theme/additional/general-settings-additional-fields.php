<?php
add_action('admin_init', 'my_general_section' , 'wp_enqueue_media');
function my_general_section() {
    add_settings_section(
        'my_settings_section', // Section ID
        'Country Specific Information', // Country Specific Information
        'snf_subsididary_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );
    add_settings_field( // Option 1
        'linkedin_url', // Option ID | Linkedin URL
        'LinkedIn URL', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'linkedin_url' // Should match Option ID
        )
    );
    add_settings_field( // Option 1
        'facebook_url', // Option ID | Facebook URL
        'Facebook URL', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'facebook_url' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'country_name', // Option ID | Country URL
        'Country Name', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'country_name' // Should match Option ID
        )
    );
    add_settings_field( // Option 3
        'subsidiary_name', // Option ID | Country URL
        'Subsidiary Name', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'subsidiary_name' // Should match Option ID
        )
    );
    add_settings_field( // Option 3
        'corporate_tag_line', // Option ID | Country URL
        'Corporate Tag Line', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'corporate_tag_line' // Should match Option ID
        )
    );
    add_settings_field( // Option 3
        'default_contact_email_address', // Option ID | Country URL
        'Default Contact Email Address ', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'default_contact_email_address' // Should match Option ID
        )
    );
    add_settings_field( // Option 1
        'country_abbreviation', // Option ID | Logo URL
        'Country Abbreviation', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'country_abbreviation' // Should match Option ID
        )
    );
    register_setting('general', 'default_contact_email_address', 'esc_attr');
    register_setting('general', 'corporate_tag_line', 'esc_attr');
    register_setting('general', 'linkedin_url', 'esc_attr');
    register_setting('general', 'facebook_url', 'esc_attr');
    register_setting('general', 'country_name', 'esc_attr');
    register_setting('general', 'subsidiary_name', 'esc_attr');
    register_setting('general', 'country_abbreviation', 'esc_attr');
}
function snf_subsididary_callback() { // Section Callback
    echo '<p>Include your Subsidiary Information:</p>';
}
function my_textbox_callback($args) {  // LinkedIn Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}