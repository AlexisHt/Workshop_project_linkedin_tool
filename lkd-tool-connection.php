<?php

/**
* 
*/
class APIConnection
{

	public $json;
	
	function __construct()
	{

	add_action( 'the_author', array( $this,'lkd_tool_data_request') );	
	add_action( 'wp_ajax_api_connection', array( $this, 'lkd_tool_data_request' ) );
	add_action( 'wp_ajax_nopriv_api_connection', array( $this, 'lkd_tool_data_request' ) );
	}



	function lkd_tool_data_request() {


    $user_id = get_the_author_meta( 'ID' );
    $user_token = esc_attr( get_the_author_meta( 'lkd_tool_token', $user_id ) ); 

    

		if ($user_token) {

			if (!is_array($params)) $params = array();
				$api_url = 'https://api.linkedin.com/v1/people/~';

				/******Request all possible api data***********/
				$param = ':(id,first-name,last-name,headline,picture-url,industry,summary,specialties,positions:(id,title,summary,start-date,end-date,is-current,company:(id,name,type,size,industry,ticker)),educations:(id,school-name,field-of-study,start-date,end-date,degree,activities,notes),associations,interests,num-recommenders,date-of-birth,publications:(id,title,publisher:(name),authors:(id,name),date,url,summary),patents:(id,title,summary,number,status:(id,name),office:(name),inventors:(id,name),date,url),languages:(id,language:(name),proficiency:(level,name)),skills:(id,skill:(name)),certifications:(id,name,authority:(name),number,start-date,end-date),courses:(id,name,number),recommendations-received:(id,recommendation-type,recommendation-text,recommender),honors-awards,three-current-positions,three-past-positions,volunteer)';

				/******************************/
				$auth = 'oauth2_access_token=' . $user_token;
				$url = $api_url . $param;
				$format = '&format=json';


				if (false !== ($test_token = file_get_contents( $api_url . "?" . $auth))) {
					$json_parsed = file_get_contents( $url . "?" . $auth . $format);
				} 
				else {
				//var_dump('invalid token');	
				}			

				$this->json = json_decode($json_parsed);

				/*********/

		}

	}
}