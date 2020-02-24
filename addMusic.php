<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="insertMusic.js" defer></script> 
    <title>Digital Media. Intermediate Websites</title>
</head>

<body>

    <header>
        <figure><img src="images/lc.jpg" width="200"></figure>
        <h1>Digital Media. Intermediate Websites</h1>
    </header>

    <nav>
        
        <label for= "navCheck"><i class="fas fa-bars"></i></label>
        <input type="checkbox" id="navCheck">
            
        <div id="menuItems">
            <p><a href="index.php">Home</a></p>
            <p><a href="music.php">Music</a></p>
            <p><a href="addMusic.php">Add Music</a></p>
        </div>

    </nav>

    <div id="content">
<!-- insert two forms one for new entry one for new genre -->
       
        <div class="submit">
        
        <form class="addMusic" method="post" name="insert" action="insertMusic.php" enctype="multipart/form-data">
        <!-- Need enctype attribute to upload a file -->
                <fieldset id="fields">
                    <legend>New Song</legend>
                    <label for="titleText">Title</label>
                    <input name="titleText" id="titleText" type="text"></input>
                    <label for="imageFile">Image</label>
                    <input type="file" id="imageFile" name="imageFile" accept="image/png, image/jpeg">
                    <!-- Accept limits the file mimetypes -->
                    <input type="button" id="clearImageFile" value="Clear Image">

                    <label>Rating</label>
                    
                    <div class="rating"> <!-- should use <fieldset>, but chrome is bugged with fieldset flexboxes -->
                        <!-- havent seen title attribute yet -->
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                    </div>

                    <label>Artist</label>
                    <select name='artistText' id="artistText">
                    <?php
                        require_once 'connect.php';

                        $sql = "SELECT * from artist";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo'<option value="1">' . $row["Artist_Name"] . '</option>';
                            }
                        }


                    ?>
                    </select>
                    <label>Genre</label>
                    <input name="genreText" id="genreText" type="text"></input>
                    <label>Year Formed</label>
                    <input name="yearText" id="yearText" type="number"></input>
                    <label>Origin</label>
                    <input name="originText" id="originText" type="text"></input>
                    <label>Price</label>
                    <input name="priceText" id="priceText" type="number"></input>
                    
                    
                </fieldset>
                <fieldset>
                    <input type="submit" value="Submit Song" class="button">
                    <input type="reset" value="Reset" class="button">
                </fieldset>
            </form>

        </div>

    </div>

    <footer>
        <p class="centre">© 2019 LearnCoach.</p>
    </footer>

</body>

</html>