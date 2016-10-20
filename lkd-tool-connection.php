<?php

/**
* 
*/
class APIConnection
{
	
	function __construct()
	{

	add_action( 'the_author', array( $this,'lkd_tool_data_request') );	
	add_action( 'wp_ajax_api_connection', array( $this, 'lkd_tool_data_request' ) );
	add_action( 'wp_ajax_nopriv_api_connection', array( $this, 'lkd_tool_data_request' ) );
	}



	function lkd_tool_data_request() {


    $user_id = get_the_author_meta( 'ID' );
    $user_token = esc_attr( get_the_author_meta( 'lkd_tool_token', $user_id ) ); 

    	/*if( $user_token){

    		echo "<input id='user_access_token' type='hidden' value='" . $user_token . "'/>";
    	}*/

		if ($user_token) {

				if (!is_array($params)) $params = array();
				$api_url = 'https://api.linkedin.com/v1/people/~:';
				$param = '(id,first-name,last-name,headline,picture-url,industry,summary,specialties)';
				$data = 'oauth2_access_token=' . $user_token;
				$headers = array(
						'Content-Type' => 'application/json',
						'DataType' => 'jsonp');
				$url = $api_url . $param;

		/*********/

		?>

		<script>

				jQuery(document).ready( function() {

					var api_url = "<?php echo $url; ?>"
					var user_data = "<?php echo $data; ?>"

			jQuery.ajax({
				type: "GET",
		  		contentType: "application/json",
		  		dataType: "jsonp",
				url: api_url,
				data: user_data,
				success: function( data ){
							console.log(data);
						}
			})
		});

		</script>

		<?php

		/*******/

		}

	}
}