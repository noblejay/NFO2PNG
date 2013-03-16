<?php

if ( !is_local() )
{
  $dbc = mysql_connect( 'localhost', 'nfopic_piccy', '8UIKiT' );
	mysql_select_db( 'nfopic_datas', $dbc );
}

function is_local()
{
	return strstr( $_SERVER['HTTP_HOST'], 'local.' );
}
