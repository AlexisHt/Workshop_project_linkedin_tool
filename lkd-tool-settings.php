<?php /**
 * Show custom user profile fields
 * @param  obj $user The user object.
 * @return void
 */

class lkd_tool_plugin_init
{
    
        function __construct()
        {
            add_action( 'show_user_profile', array( $this, 'lkd_tool_profile_configuration' ) );
            add_action( 'personal_options_update', array( $this, 'lkd_tool_profile_configuration_update' ) );

        }

     
    function lkd_tool_profile_configuration( $user ) { 

        $help_text = __('Your API Key goes here', 'lkd_tool_trad');

        ?>

        <table class="form-table">
     
            <tr>
                <th><label for="Linkedin Tool">LinkedIn Tool</label></th>
     
                <td>
                    <input type="text" name="ldk_tool_token_entry" id="ldk_tool_token_entry" value="<?php echo esc_attr( get_the_author_meta( 'lkd_tool_token', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?  echo $help_text  ?> </span>
                </td>
            </tr>
     
        </table>
    <?php }


    function lkd_tool_profile_configuration_update( $user_id ) {
     
        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;
         update_user_meta( absint( $user_id ), 'lkd_tool_token', wp_kses_post( $_POST['ldk_tool_token_entry'] ) );
    }

}
require_once( dirname(__FILE__) . '/lkd-tool-connection.php' ); // Plugin settings