<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 25/11/2015
 * Time: 17:14
 */
/**
* 
*/
class AdminAction
{
    
        function __construct()
            {
                add_action( 'admin_menu', array( $this, 'lkd_tool_admin_actions' ) );
                add_action( 'show_user_profile', array( $this, 'lkd_tool_plugin_options' ) );
                add_action('edit_user_profile', array( $this, 'lkd_tool_plugin_options' ) );
            }

        function lkd_tool_admin_actions() {
            global $lkd_tool_admin_actions;

            $lkd_tool_admin_actions = add_options_page(
                'Linkedin tool',
                'Linkedin tool',
                'manage_options',
                __FILE__,
                array($this, 'lkd_tool_show_admin_actions')
            );
            }

            function lkd_tool_plugin_options() {
                    // If the theme options don't exist, create them.
                    if( false == get_option( 'lkd_tool_settings_display' ) ) {
                        add_option( 'lkd_tool_settings_display');
                    }


                    add_settings_field(  
                        'Checkbox Element',  
                        'Checkbox Element',  
                        'lkd_tool_show_admin_actions',  
                        'lkd_tool_settings_display'
                    );

                  register_setting(
                      'lkd_tool_settings_display'
                    );
                }

                /**
                 * Display admin settings page
                 */
                function lkd_tool_show_admin_actions() {

                $options = get_option( 'lkd_tool_settings_display' );

                ?>
                <div class="wrap">
                    <div id="icon-users" class="icon32"></div>
                    <h2>Linkedin Tool</h2>
                </div>

                <?php settings_errors(); ?>


                <div id="poststuff">
                    <div id="post-body" class="columns-2">
                        <div id="post-body-content">
                        <form method="post" action="option.php">
                <?php

                $html = '<input type="checkbox" id="user-visibility" name="lkd_admin_allows_users[user-visibility]" value="1"' . checked( 1, $options['user-visibility'], true ) . '/>';
                $html .= '<span for="checkbox_example">uncheck if you want to render the toolbox visible to the connected users only</span>';

                echo $html;

                submit_button();

                ?>
                            </form>
                        </div>


                    </div>
                </div>

                <?php

}


}





