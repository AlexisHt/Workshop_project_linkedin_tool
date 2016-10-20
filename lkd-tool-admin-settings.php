<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 25/11/2015
 * Time: 17:14
 */
function lkd_tool_admin_actions() {
    global $lkd_tool_admin_actions;

    $lkd_tool_admin_actions = add_options_page(
        'Linkedin tool',
        'Linkedin tool',
        'manage_options',
        __FILE__,
        'lkd_tool_show_admin_actions'
    );
    add_action( 'lkd_tool_admin_actions', 'lkd_tool_admin_scripts' );
}
add_action( 'admin_menu', 'lkd_tool_admin_actions' );

/**
 * plugin settings.
 */

function lkd_tool_plugin_options() {
    // If the theme options don't exist, create them.
    if( false == get_option( 'lkd_tool_settings_display' ) ) {
        add_option( 'lkd_tool_settings_display' );
    }


    // Add Display Settings section
   add_settings_section(
        'lkd_tool_colors_settings',
        __( 'Parameters', 'lkd_tool_trad' ),
        'lkd_tool_color_settings_callback',
        'lkd_tool_settings_display'
    );


    add_settings_field(
        'show_in_posts',
        __( 'Token Entry', 'lkd_tool_trad' ),
        'lkd_tool_token_callback',
        'lkd_tool_settings_display',
        'lkd_tool_token_settings',
        array(
            'profile_current',
            array(
                '_token'	=> __( 'Token', 'lkd_tool_trad' ),
            )
        )
    );

  register_setting(
      'lkd_tool_settings_display',
      'lkd_tool_settings_display'
    );
}
add_action( 'show_user_profile', 'lkd_tool_plugin_options' );
add_action('edit_user_profile', 'lkd_tool_plugin_options');

/**
 * Display admin settings page
 */
function lkd_tool_show_admin_actions() { ?>
    <div class="wrap">
        <div id="icon-users" class="icon32"></div>
        <h2>Your Signature</h2>
    </div>

    <?php settings_errors(); ?>


    <div id="poststuff">
        <div id="post-body" class="columns-2">
            <div id="post-body-content">
                <form method="post" action="options.php">
                    <?php
                    settings_fields( 'lkd_tool_settings_display' );
                    do_settings_sections( 'lkd_tool_settings_display' );
                    submit_button();
                    ?>
                </form>
            </div>


        </div>
    </div>
<?php }