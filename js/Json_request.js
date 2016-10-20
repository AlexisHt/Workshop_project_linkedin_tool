jQuery(document).ready( function($) {

	var $data = $('#lkd-profile-output')

	jQuery.ajax({
		type: "GET",
  		contentType: "application/json",
  		dataType: 'jsonp',
		url: "https://api.linkedin.com/v1/people/~:(id,first-name,last-name,headline,picture-url,industry,summary,specialties)",
		data: "oauth2_access_token=AQXH8HvwSBQNSunl5yCfoW6mctPsD8AyU0fpqmeR2TDFe74lpe_gH7xxwLMybzxEz8kRxdAnvPmpQi9JQS62A3IYr21Cy4u4t0zsN328jTOUzDTfIXLYPfOxASk9zoq6lvRsdndya5DZKeGMYB4A8cTLbtOzxc-7TwDJZ2WyQUfpgXnaBDY",
		success: function( data ){
					$.each(data, function(i, order) {
						$data.append("<li>name:"+ $data.name + "</li>");
					});
		}

	})

});



