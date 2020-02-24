<?php

    require_once 'connect.php';

    $title = $_REQUEST['titleText'];
    $rating = $_REQUEST['rating'];
    $artist = $_REQUEST['artistText'];
    $genre = $_REQUEST['genreText'];
    $year = $_REQUEST['yearText'];
    $origin = $_REQUEST['originText'];
    $price = $_REQUEST['priceText'];
   
    ///// New stuff starts
    $image = NULL; // Default value for the image in case file is not uploaded
    // $_FILES documentation here: https://www.php.net/manual/en/features.file-upload.post-method.php

    /* Some validation: ONly upload files <  1MiB */
    if ( $_FILES["imageFile"]["size"] < 1048576 ) {
        /* 
            File copy stuff
            Never save an uploaded file into the web tree, since a visitor could then potentially execute it
            Since the file wont be in the webs images folder, you'll need to use PHP to read the file when displaying it
            Will need a folder for this purpose. 
        */
        $uploadFolder = '/usbwebserver/uploads/'; // Should be read from the DB or a conf file instead of hard coded

        /* 
            Build the path and file name to save the uploaded file to
            Create a unique name with uniqid to avoid naiming collisions
        */        
        $fileTarget = $uploadFolder . uniqid( rand(), true );  

        if ( move_uploaded_file( $_FILES["imageFile"]["tmp_name"], $fileTarget ) ) { 
            // Save the path and filename into the DB so we can display it later
            $image = $fileTarget;
        }
    }

    /* 
        To insert NULL into DB, cant have quotes around the strings. 
        Might need to use a blank string instead of null or use formatted string as below  
        Formatted strings will reuire some data validation to ensure non-empty
        Something to consider -> the SQL success / error messages arent showing because of the page reload. 
        Might want to display the error page instead of refreshing 
    */
    $sql = "INSERT INTO song (Title, Image, Rating, ArtistID, Genre, Price) VALUES ('$title', '$image', '$rating', '$artist', '$genre', '$price');";


    if($conn->query($sql) === TRUE){
        echo "New record created successfully";
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //echo "<script>location.href='addMusic.php'</script>";
    header("Refresh:0; url=addMusic.php"); // php page refersher

?>