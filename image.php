<?php 
    /* 
        Read an image file and send it to the web browser 
        Need to enable php_fileinfo.dll to use mime_content_type()
    */
    $file = $_GET['img'];

    // If the file exists and its one of our two mime types
    if( file_exists( $file ) && ( mime_content_type( $file ) == 'image/jpeg' || mime_content_type( $file ) == 'image/png' ) ) { 
        header('Content-Type:' .  mime_content_type( $file ));
        header('Content-Length:' .  filesize( $file ));
        echo file_get_contents( $file );
    }
    else {
        http_response_code(404);
    }
?>