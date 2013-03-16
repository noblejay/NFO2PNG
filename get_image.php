<?php
require_once 'include/db.php';
$file_name = $_GET['f'];
if ( empty( $file_name ) || !file_exists( 'uploads/' . $file_name ))
{
  die( 'File not found...' );
}

$sql = "SELECT original_file_name FROM nfo_images WHERE file_name = '" . $file_name . "'";
$rs = mysql_query( $sql );
$file = mysql_fetch_assoc( $rs );

$original_file_name = explode( '.', $file['original_file_name'] );
//just get rid of the last, then put back together
array_pop( $original_file_name );
$original_file_name = implode( '.', $original_file_name );

header("Content-Type: image/png");
header("Content-Disposition: attachment; filename=\"" . $original_file_name . ".png\"");

echo file_get_contents( 'uploads/' . $file_name );
