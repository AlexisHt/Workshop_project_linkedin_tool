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
		/*$data->picture_url = 'https://lh3.googleusercontent.com/W45bk8cUYG4FOyFzzKdf_gDqH70k6a2M21utexHOaHNUtZX8ON0COH_qFdrjRJS_f5ZqFOaPmQ=w2400-h1350-no';*/

		?>

		<div class="linkedin-toolbox fixed ">

				<table id="lkd-profile-output" border="0">
				
				<?php


					echo "<tr>";
					echo "<td rowspan='2' id='lkd-picture' ><img src='" . $data->picture_url . "' width='80px'></td>";
					echo "<td>" . $data->firstName . "</td>";
					echo "<td>" . $data->industry . "</td>";

					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . $data->lastName . "</td>";
					echo "<td>" . $data->headline . "</td>";
					echo "</tr>";

				?>

				</table>
			
		<?php

	}



}
  ?>

