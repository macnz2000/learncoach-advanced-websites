<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
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

        <?php

            require_once 'connect.php';

            if(isset($_REQUEST['sort'])){
                $Sort = $_REQUEST['sort'];
            } else{
                $Sort = 0;
            }

            if($Sort == "1"){
                $sql = "SELECT song.*, artist.*, price * 1.15 as 'gstPrice' FROM song, artist WHERE song.ArtistId = artist.ID ORDER BY Rating";
            } elseif($Sort == "2"){
                $sql = "SELECT song.*, artist.*, price * 1.15 as 'gstPrice' FROM song, artist WHERE song.ArtistId = artist.ID ORDER BY Title";
            } elseif($Sort == "3"){
                $sql = "SELECT song.*, artist.*, price * 1.15 as 'gstPrice' FROM song, artist WHERE song.ArtistId = artist.ID ORDER BY Artist_Name";
            } elseif($Sort == "4"){
                $sql = "SELECT song.*, artist.*, price * 1.15 as 'gstPrice' FROM song, artist WHERE song.ArtistId = artist.ID ORDER BY Title";
            } else{
                $sql = "SELECT song.*, artist.*, price * 1.15 as 'gstPrice' FROM song, artist WHERE song.ArtistId = artist.ID";
            }

            $result = $conn->query($sql);

            
                
                echo '<h1 class="musicHeading">Music List</h1>';

                echo '<form id="sort" action="music.php" method="post">';
                    echo '<select name="sort" id="sort">';
                        echo '<option value="1">Rating</option>';
                        echo '<option value="2">Name</option>';
                        echo '<option value="3">Artist</option>';
                        echo '<option value="4">Genre</option>';
                    echo'</select>';
                echo '<label for="sort"><button type="submit">Sort</button></label>';
                echo '</form>';

                echo '<section id="musicList">';

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<article>';

                            echo '<h2>' . $row["Title"] . '</h2>';
                            // Image stuff  
                            echo '<figure>';
                            // Check if the image path exists in the DB
                            if ( $row["Image"] != NULL && $row["Image"] != '' )  {
                                echo '<img src="image.php?img=' . $row["Image"] . '">';
                            }
                            else {
                                echo '<img src="https://via.placeholder.com/150">';
                            }
                            echo '</figure>';

                            echo '<p><span id="title">Artist: </span><span>' . $row["Artist_Name"] . '</span></p>';
                            echo '<p><span id="title">Genre: </span><span>' . $row["Genre"] . '</span></p>';
                            echo '<p><span id="title">Rating: </span><span>' . $row["Rating"] . '</span></p>';
                            echo '<p><span id="title">Year Formed: </span><span>' . $row["year_formed"] . '</span></p>';
                            echo '<p><span id="title">Origin: </span><span>' . $row["origin_country"] . '</span></p>';
                            echo '<p><span id="title">Price: </span><span>$' . number_format((float)$row["gstPrice"], 2, '.', '') . '</span></p>';

                        echo '</article>';
                    }
                }

            echo '</section>';

        ?>

    </div>

    <footer>
        <p class="centre">© 2019 LearnCoach.</p>
    </footer>

</body>

</html>