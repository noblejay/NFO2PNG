<?php

function buildNFO($nfotext, $footer = "", $fg = "000000", $bg = "FFFFFF", $file_name = 'new_image', $path = 'uploads/' )
{
//  header("Content-Type: image/png");
//	header("Content-Disposition: inline; filename=\"" . $file_name . ".png\"");

	$nfotext = ( empty( $nfotext ) ? "Empty String submitted." : $nfotext );

	$nfo = explode("\n", $nfotext);

	// Load the Bitmap-Font
	$fnt = imageloadfont("nfo2pngfont");

	$nxo = array();
	$xmax = 0;

	$bigger_than_footer = false;
	// Reformat each line
	foreach( $nfo as $line )
	{
		$line = chop($line);
		if ( empty( $line ) )
		{
			array_push($nxo,$line);
			continue;
		}

		if ( strlen( $line ) > strlen( $footer ) )
		{
			$bigger_than_footer = true;
		}

		$fill = '';
		//add white space to each line until we have one bigger than the footer
		if ( !$bigger_than_footer )
		{
			$fill = str_repeat(" ", ( strlen( $footer ) - strlen( $line ) ) );
		}

		if($xmax < strlen($line.$fill)) $xmax = strlen($line.$fill);

		array_push($nxo,$line.$fill);
	}

	// Show footer
	if(strlen($footer))
	{
		array_push($nxo,"");
		$repeat_count = $xmax - strlen($footer)>>1;
		$repeat_count = ( $repeat_count >= 0 ? $repeat_count : 0 );

		//add whitespace to footer to push out to the middle

		//this line overrides the centering and only pushed it two from the left
		//remove this line to have it go back to the center
		$repeat_count = 2;

		$fill = str_repeat(" ", $repeat_count );
		array_push($nxo,$fill.$footer);
	}

	// Linecount
	$ymax = count($nxo);

	// Set foreground color
	$color = array(0, 0, 0);
	if(strlen($fg) == 6)
	{
		$color[0] = intval(substr($fg,0,2), 16);
		$color[1] = intval(substr($fg,2,2), 16);
		$color[2] = intval(substr($fg,4,2), 16);
	}

	$bg_color = array(0, 0, 0);
	if(strlen($bg) == 6)
	{
		$bg_color[0] = intval(substr($bg,0,2), 16);
		$bg_color[1] = intval(substr($bg,2,2), 16);
		$bg_color[2] = intval(substr($bg,4,2), 16);
	}

	// Render NFO
	$im = ImageCreate($xmax*8,$ymax*16);
	ImageInterlace($im,1);
//	$background_color = ImageColorTransparent($im, ImageColorAllocate ($im, 254, 254, 126));
	$background_color = ImageColorAllocate ($im, $bg_color[0], $bg_color[1], $bg_color[2]);
	$text_color = ImageColorAllocate ($im, $color[0], $color[1], $color[2]);

	foreach($nxo as $y=>$line)
	{
		//shrink the last line
		if ( $y == count($nxo) - 1 )
		{
			$fnt = 2; //to use preloaded fonts, 1 - 5 only. 1 is tiny, 2 is decent, 3-5 are bolder/worse
		}

		ImageString($im, $fnt, 0, $y*16, $line, $text_color);
	}
	ImagePNG( $im, $path . $file_name . '.png' );
}
?>
