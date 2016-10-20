<?php

/**
* 
*/
class APIConnection
{
	
	function __construct()
	{
	add_action( 'wp_ajax_api_connection', 'lkd_tool_get_data' );
	add_action( 'wp_ajax_nopriv_api_connection', 'lkd_tool_get_data' );	}
	}



	function lkd_tool_get_data() {

	die('coucou');

	$options = '(id,first-name,last-name,headline,picture-url,industry,summary,specialties,positions:(id,title,summary,start-date,end-date,is-current,company:(id,name,type,size,industry,ticker)),educations:(id,school-name,field-of-study,start-date,end-date,degree,activities,notes),associations,interests,num-recommenders,date-of-birth,publications:(id,title,publisher:(name),authors:(id,name),date,url,summary),patents:(id,title,summary,number,status:(id,name),office:(name),inventors:(id,name),date,url),languages:(id,language:(name),proficiency:(level,name)),skills:(id,skill:(name)),certifications:(id,name,authority:(name),number,start-date,end-date),courses:(id,name,number),recommendations-received:(id,recommendation-type,recommendation-text,recommender),honors-awards,three-current-positions,three-past-positions,volunteer)';

	$api_url = 'https://api.linkedin.com/v1/people/~:';
	$auth = '?oauth2_access_token=';

	$token = $user->lkd_tool_token;

	$url = $api_url . $options . $auth . $token;


	$param = $url;


	die();

}






/*$(documents).ready(function(){

	$.ajax({
	    url: "https://api.linkedin.com/v1/people/~:(id,first-name,last-name,headline,picture-url,industry,summary,specialties,positions:(id,title,summary,start-date,end-date,is-current,company:(id,name,type,size,industry,ticker)),educations:(id,school-name,field-of-study,start-date,end-date,degree,activities,notes),associations,interests,num-recommenders,date-of-birth,publications:(id,title,publisher:(name),authors:(id,name),date,url,summary),patents:(id,title,summary,number,status:(id,name),office:(name),inventors:(id,name),date,url),languages:(id,language:(name),proficiency:(level,name)),skills:(id,skill:(name)),certifications:(id,name,authority:(name),number,start-date,end-date),courses:(id,name,number),recommendations-received:(id,recommendation-type,recommendation-text,recommender),honors-awards,three-current-positions,three-past-positions,volunteer)",
	    data: "oauth2_access_token=AQXH8HvwSBQNSunl5yCfoW6mctPsD8AyU0fpqmeR2TDFe74lpe_gH7xxwLMybzxEz8kRxdAnvPmpQi9JQS62A3IYr21Cy4u4t0zsN328jTOUzDTfIXLYPfOxASk9zoq6lvRsdndya5DZKeGMYB4A8cTLbtOzxc-7TwDJZ2WyQUfpgXnaBDY", 
	    type: 'GET',
	    contentType: "text/json",
	    dataType: "json",
	    success : parse,
	    error : function (xhr, ajaxOptions, thrownError){  
	        console.log(xhr.status);          
	        console.log(thrownError);
	    } 
	}); 


});

 ?>





https://api.linkedin.com/v1/people/~:(id,first-name,last-name,headline,picture-url,industry,summary,specialties,positions:(id,title,summary,start-date,end-date,is-current,company:(id,name,type,size,industry,ticker)),educations:(id,school-name,field-of-study,start-date,end-date,degree,activities,notes),associations,interests,num-recommenders,date-of-birth,publications:(id,title,publisher:(name),authors:(id,name),date,url,summary),patents:(id,title,summary,number,status:(id,name),office:(name),inventors:(id,name),date,url),languages:(id,language:(name),proficiency:(level,name)),skills:(id,skill:(name)),certifications:(id,name,authority:(name),number,start-date,end-date),courses:(id,name,number),recommendations-received:(id,recommendation-type,recommendation-text,recommender),honors-awards,three-current-positions,three-past-positions,volunteer)?oauth2_access_token=PUT_YOUR_TOKEN_HERE



AQVfQkx4W4c6BZd4PSbtpEdOnhfFeKNMGYUPKTkLJFFf4i-EgIKLJrZc8y38DrD_EdZYIR2HUd6CazGDyibZtrFhjCr4Mh3Bjfedf61L8AMmFKkOKK896m0z0txFjPEXlyo8aNeiUtViDGUIECUtzFX7axbd-Gl48M1KsElNiH0xL6MrHlA

{
  "educations": {
    "_total":,
    "values"[{
      "endDate"{"year"},
      "id",
      "schoolName",
      "startDate" {"year": 2014}
    }]
  },
  "firstName",
  "headline",
  "id",
  "industry",
  "lastName",
  "numRecommenders",
  "positions": {
    "_total",
    "values": [
      {
        "company": {
          "id": 140649,
          "industry": "Technologies et services de l\u2019information",
          "name": "Berger Levrault",
          "size": "1001-5000",
          "type": "Partnership"
        },
        "endDate": {
          "month": 8,
          "year": 2015
        },
        "id": 773602109,
        "isCurrent": false,
        "startDate": {
          "month": 7,
          "year": 2015
        },
        "summary": "Réalisation du site http://www.lacitedessmartcities.com.\nbenchmarking solution d'emailing.",
        "title": "Développeur web"
      },
      {
        "company": {"name": "Etude notariale François Carré"},
        "endDate": {
          "month": 7,
          "year": 2012
        },
        "id": 652668720,
        "isCurrent": false,
        "startDate": {
          "month": 6,
          "year": 2012
        },
        "summary": "Rédaction de documents juridiques avec le logiciel GenApi.\nOuverture de dossiers de succession.",
        "title": "Stagiaire"
      }
    ]
  },
  "recommendationsReceived": {"_total": 0},
  "skills": {
    "_total": 17,
    "values": [
      {
        "id": 1,
        "skill": {"name": "Photoshop"}
      },
      {
        "id": 2,
        "skill": {"name": "Illustrator"}
      },
      {
        "id": 3,
        "skill": {"name": "HTML"}
      },
      {
        "id": 4,
        "skill": {"name": "CSS"}
      },
      {
        "id": 5,
        "skill": {"name": "HTML5"}
      },
      {
        "id": 6,
        "skill": {"name": "JavaScript"}
      },
      {
        "id": 7,
        "skill": {"name": "PhpMyAdmin"}
      },
      {
        "id": 8,
        "skill": {"name": "PHP"}
      },
      {
        "id": 9,
        "skill": {"name": "AJAX"}
      },
      {
        "id": 10,
        "skill": {"name": "jQuery"}
      },
      {
        "id": 11,
        "skill": {"name": "Dreamweaver"}
      },
      {
        "id": 12,
        "skill": {"name": "Marketing"}
      },
      {
        "id": 13,
        "skill": {"name": "Marketing digital"}
      },
      {
        "id": 14,
        "skill": {"name": "Marketing en ligne"}
      },
      {
        "id": 15,
        "skill": {"name": "Anglais professionnel"}
      },
      {
        "id": 31,
        "skill": {"name": "Droit pénal"}
      },
      {
        "id": 32,
        "skill": {"name": "Droit des contrats"}
      }
    ]
  },
  "threeCurrentPositions": {"_total": 0},
  "threePastPositions": {
    "_total": 2,
    "values": [
      {
        "company": {
          "id": 140649,
          "industry": "Technologies et services de l\u2019information",
          "name": "Berger Levrault",
          "size": "1001-5000",
          "type": "Partnership"
        },
        "endDate": {
          "month": 8,
          "year": 2015
        },
        "id": 773602109,
        "isCurrent": false,
        "location": {"name": "892 Rue Yves Kermen, 92100 Boulogne Billancourt"},
        "startDate": {
          "month": 7,
          "year": 2015
        },
        "summary": "Réalisation du site http://www.lacitedessmartcities.com.\nbenchmarking solution d'emailing.",
        "title": "Développeur web"
      },
      {
        "company": {"name": "Etude notariale François Carré"},
        "endDate": {
          "month": 7,
          "year": 2012
        },
        "id": 652668720,
        "isCurrent": false,
        "location": {"name": "34 bis rue de l\u2019Université  75007 Paris"},
        "startDate": {
          "month": 6,
          "year": 2012
        },
        "summary": "Rédaction de documents juridiques avec le logiciel GenApi.\nOuverture de dossiers de succession.",
        "title": "Stagiaire"
      }
    ]
  },
  "volunteer": {}
}