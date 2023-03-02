<?php
 
$time = $_POST['time'];
$token = $_POST['token'];
$data = $_POST['data'];
$compressed = gzdeflate($data);
  base64_to_webp(str_replace(" ","+",$data),"save1.webp");
  function base64_to_webp($base64_string, $output_file) {
    $ifp = fopen( $output_file, 'wb' ); 
    $data = explode( ',', $base64_string );
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );
    fclose( $ifp ); 
    return $output_file; 
}
  
?>