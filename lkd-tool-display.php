<?php

/**
* 
*/
class lkd_tool_constructor extends APIConnection
{

	
	function __construct()
	{

		$author_id=$post->post_author;
	//	add_action( 'add_meta_boxes', array( $this, 'linkedin_card_constructor' ) );
	//	add_action( 'save_post','save_linkedin_card_constructor' );
		add_filter( 'the_content', array( $this, 'lkd_load_profile_data' ), 15 );
	}

	public function lkd_load_profile_data( $page ) {
		$data = $this->lkd_tool_data_request();
		$data = $this->json;

		if ( $data !== false && $data !== null ) {

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

	                        $page .= call_user_func( array( $this , 'lkd_tool_html'));
	                   // }

	               }
	            }
	        }
	    }
		}

	  

	    return $content;
	}

	public function lkd_tool_html (  )
	{

		$data = $this->lkd_tool_data_request();
		$data = $this->json;
		
		$arrow_left = plugins_url( 'assets/img/ic_keyboard_arrow_left_black_24dp_2x.png', __FILE__ );
		$arrow_right = plugins_url( 'assets/img/ic_keyboard_arrow_right_black_24dp_2x.png', __FILE__ );

		?>


		<div class="linkedin-toolbox fixed ">
				
				<?php

					echo "<div id='arrow-left'><img src='"  . $arrow_left . "'></div>";

					/***************/
					echo "<div id='lkd-profile-output'>";
					echo "<div id='lkd-picture'><img src='" . $data->picture_url . "' width='80px'></div>";
					echo "<div class='lkd-tool-element'>" . $data->firstName ." ". $data->lastName . "<br/>" .  $data->headline . "</div>";
					
					foreach ( $data->educations->values as $value ) {
					 echo "<div class='lkd-tool-element'>" . $value->schoolName . "</br>" . $value->startDate->year . "-" . $value->endDate->year . "</div>"; 
					} 
					
					echo "</div>";
					/***************/

					/***************/
					echo "<div id='lkd-skills-output'>";
					echo "<ul>";
					foreach ( $data->skills->values as $value)
					{
					echo "<li>" . $value->skill->name . "</li>";

					}
					echo "</ul>";
					echo "</div>";
					/***************/

					echo "<div id='arrow-right'><img src='"  . $arrow_right . "'></div>";


					?>

					<script>

					jQuery(document).ready( function() {

					jQuery( "#arrow-right" ).click(function() {
					  	jQuery( "#lkd-profile-output" ).css( "display", "none" );
					  	jQuery( "#lkd-skills-output" ).css( "display", "inline-block" );

					});

					jQuery( "#arrow-left" ).click(function() {
				  	jQuery( "#lkd-profile-output" ).css( "display", "inline" );
				  	jQuery( "#lkd-skills-output" ).css( "display", "none" );

						});
					});
					</script>

					<?php
	
	}



}
  ?>

