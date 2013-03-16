<?php
require_once 'include/db.php';

if ( !is_local() )
{
  $sql = "SELECT count(1) AS count FROM nfo_images";
	$rs = mysql_query( $sql );
	$data = mysql_fetch_assoc( $rs );
	$total = $data['count'];
}
else {
	$total = rand(1, 9999);
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<title>NFOPic.com | Convert NFO TXT DIZ to PNG IMAGE FILES with our DOCUMENT to IMAGE Generator</title>

	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="nfo, diz, ascii, nfo to image generator, img nfo generator, creator, generate, text file, txt, png file, png image, img, scene nfo, p2p info, the scene, uploaders, upload, document, doc to img, file 2 image">
        <meta name="description" content="Create an Image File from an NFO, TEXT TXT, DOCUMENT or DIZ file. We Generate a PNG Image File out of your Document and you can change the colors of your text or image img within the Generator. Perfect for P2P Scene Files and NFO Uploaders">
        <meta name="author" content="WebBuilders.net.au">
        <meta name="robots" content="INDEX,FOLLOW">

	<link href="css/style.css?<?php echo filemtime( 'css/style.css'); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" media="screen" type="text/css" href="css/jquery-ui-1.8.1.custom.css" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
        <link rel="shortcut icon" href="http://nfopic.com/favicon_nfopic.ico" />

	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.custom.min.js"></script>
	<script type="text/javascript" src="js/ajaxupload.js"></script>
	<script type="text/javascript" src="js/colorpicker.js"></script>
	<script type="text/javascript" src="js/nfo.js?<?php echo filemtime( 'js/nfo.js'); ?>"></script>

      
		<!--[if !IE 7]>
	<style type="text/css">
		#upload_container {display:table;height:100%}
	</style>
        <![endif]-->
</head>
<body>



     <center><img src="http://nfopic.com/images/nfopic-logo.png" alt="NFOPic - NFO , TXT , DIZ to PNG IMAGE GENERATOR">
                       <br><br>
             <script type="text/javascript"><!--
google_ad_client = "ca-pub-3731356095052540";
/* NFOPic Below Loaded PNG */
google_ad_slot = "6943279863";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	           </center>
                <br> <br>
	<div id="upload_container" align="center" style="font-weight: bold;">
		Select a Text Color, Background Color, and then click 'Browse Upload' to select a .txt, .nfo or .diz file.
		<hr color="#099dea" />

		<div style="clear:both;width:150px">
			<table width="100%">
				<tr>
					<td width="50%" align="center">
						<div id="fg_color_select"><div style="background-color: #000000"> </div></div>
					</td>

					<td width="50%" align="center">
						<div id="bg_color_select"><div style="background-color: #ffffff"> </div></div>
					</td>
				</tr>
			</table>
		</div>

		<input type="button" id="upload_button" class="button" value="Browse Upload" />

		<input type="hidden" id="fg_color" autocomplete="off" value="000000" />
		<input type="hidden" id="bg_color" autocomplete="off" value="FFFFFF" />

		<br />
		<br />
		There have been <?php echo $total; ?> Files Converted on NFOPic so far.
     <br />
		<hr />

		 <center>	 <script type="text/javascript"><!--
		google_ad_client = "ca-pub-3731356095052540";
		/* NFOPic Below Loaded PNG */
		google_ad_slot = "6943279863";
		google_ad_width = 728;
		google_ad_height = 90;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>    </center>


		<div id="uploaded_image_div" align="center">
			<b>Left Click on the Below Image to Save it to your PC...</b><br /><br />
			<div id="title" style="font-weight:bold;"></div>
      <br />
			<a href="" target="_blank"><img border="0" src="" /></a>
            <br />


           <!-- <div>
            	<textarea id="link" style="width:400px;" readonly onfocus="$(this).select()"></textarea>
            </div>  -->
            
             

            <br />
            <br />
	       	<script type="text/javascript"><!--
			google_ad_client = "ca-pub-3731356095052540";
			/* NFOPic Below Loaded PNG */
			google_ad_slot = "6943279863";
			google_ad_width = 728;
			google_ad_height = 90;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>


		</div>
		<div id="loader_img" align="center">
			<img src="images/loader.gif" />
		</div>
	</div>
<div id="alert_div"></div>




<br><br><br>
<div class="footer" align="center">
 <font size=1>Copyright&copy; 2012-2013 NFOPic.com (ALPHA v1.5.0) | All Rights Reserved&reg;</font>
</div>

</body>
</html>





