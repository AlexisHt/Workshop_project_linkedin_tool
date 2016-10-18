<?php /**
 * Show custom user profile fields
 * @param  obj $user The user object.
 * @return void
 */
add_action( 'show_user_profile', 'lkd_tool_profile_configuration' );
 
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


add_action( 'personal_options_update', 'lkd_tool_profile_configuration_update' );

function lkd_tool_profile_configuration_update( $user_id ) {
 
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
     update_usermeta( absint( $user_id ), 'lkd_tool_token', wp_kses_post( $_POST['ldk_tool_token_entry'] ) );
}


