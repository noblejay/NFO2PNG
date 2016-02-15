<?php

if ( !is_local() )
{
  $dbc = mysql_connect( 'localhost', 'nfopic_user', 'password' );
	mysql_select_db( 'nfopic_db', $dbc );
}

function is_local()
{
	return strstr( $_SERVER['HTTP_HOST'], 'local.' );
}
