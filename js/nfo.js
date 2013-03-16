
var uploader;
$(document).ready(function(){

  $('#fg_color_select').ColorPicker({
		color: '#FFFFFF',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#fg_color_select div').css('backgroundColor', '#' + hex);
			$('#fg_color').val( hex );
			$('#preview_text').css('color', '#' + hex);
		}
	});

	$('#bg_color_select').ColorPicker({
		color: '#CC0000',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#bg_color_select div').css('backgroundColor', '#' + hex);
			$('#bg_color').val( hex );
			$('#preview_text').css('backgroundColor', '#' + hex);
		}
	});


	uploader = new AjaxUpload('upload_button', {
		  // Location of the server-side upload script
		  // NOTE: You are not allowed to upload files to another domain
		  action: 'generate_image.php',
		  // File upload name
		  name: 'user_file',
		  // Additional data to send
//		  data: {
//		    fg_color : $('#fg_color').val(),
//		    bg_color : $('#bg_color').val()
//		  },
		  // Submit file after selection
		  autoSubmit: true,
		  // The type of data that you're expecting back from the server.
		  // HTML (text) and XML are detected automatically.
		  // Useful when you are using JSON data as a response, set to "json" in that case.
		  // Also set server response type to text/html, otherwise it will not work in IE6
		  responseType: false,
		  // Fired after the file is selected
		  // Useful when autoSubmit is disabled
		  // You can return false to cancel upload
		  // @param file basename of uploaded file
		  // @param extension of that file
		  onChange: function(file, extension){
		  },
		  // Fired before the file is uploaded
		  // You can return false to cancel upload
		  // @param file basename of uploaded file
		  // @param extension of that file
		  onSubmit: function(file, extension) {
			  if (! (extension && /^(txt|nfo|diz)$/i.test(extension))){
                  // extension is not allowed

				  $('#uploaded_image_div').hide();
    			  $('#uploaded_image_div a').attr('href', '');
    			  $('#uploaded_image_div img').attr('src', '');
    			  
                  throwAlert('Files must be .txt, .nfo or .diz','Error');
                  // cancel upload
                  return false;
			  }

			  $('#uploaded_image_div').hide();
			  $('#loader_img').fadeIn();
			  this.setData( {
							  fg_color : $('#fg_color').val(),
							  bg_color : $('#bg_color').val()
						  })
		  },
		  // Fired when file upload is completed
		  // WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
		  // @param file basename of uploaded file
		  // @param response server response
		  onComplete: function(file, response) {
			  var validate = response.split('|');
			  if ( validate[0] != 1 )
			  {
				  throwAlert(validate[1]);
				  return;
			  }
			  $('#loader_img').hide();
			  $('#uploaded_image_div a').attr('href', 'get_image.php?f=' + validate[1]);
			  $('#uploaded_image_div img').attr('src', 'uploads/' + validate[1]);
			  $('#uploaded_image_div #title').html(validate[2]);
			  $('#uploaded_image_div #link').val('http://nfopic.com/get_image.php?f=' + validate[1]);
			  $('#uploaded_image_div').fadeIn(500);
		  }
		});
});

function throwAlert( content, title )
{
	if ( !title )
	{
		title = 'Alert';
	}

	$('#alert_div').attr('title',title).html(content).dialog({modal:true});
}
