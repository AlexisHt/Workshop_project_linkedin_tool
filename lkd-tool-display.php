<?php

/**
* 
*/
class lkd_tool_constructor
{
	
	function __construct()
	{
		$author_id=$post->post_author;
	//	add_action( 'add_meta_boxes', array( $this, 'linkedin_card_constructor' ) );
	//	add_action( 'save_post','save_linkedin_card_constructor' );
		add_filter( 'the_content', array( $this, 'lkd_load_profile_data' ), 15 );
	}

	public function lkd_load_profile_data( $page ) {
	   
	    if ( is_main_query() ) {
	        global $authordata;
	        global $post;

	        // Use helper functions to get plugin settings
	        //$lkd_settings_display =lkd_tool_settings();

	        if ( is_singular() ) {

	            if ( !get_user_meta( $authordata->ID, 'lkd_user_hide', false ) && !get_post_meta( $post->ID, 'lkd_hide', false ) ) {

	                // Show your linkedin account data in all your publications
	                if ( is_singular( 'post' ) ) {

	                   // $show_in_posts = $lkd_settings_display['show_in_posts'];
	                   //if ( $show_in_posts ) {

	                        $page .= call_user_func( array( $this , 'lkd_tool_constructor'));
	                   // }

	               }
	            }
	        }
	    }

	    return $content;
	}

	public function lkd_tool_constructor (  )
	{

		$json = 'pour le moment y a que dalle';

		?>

		<div class="linkedin-toolbox fixed ">
			
				<ul id="lkd-profile-output">
					
				</ul>
		</div>
			
		<?php

	}



}
  ?>

