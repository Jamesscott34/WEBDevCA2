<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">
    <title>Movies - Home</title>
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="../images/logo/logo.png" alt="Logo">
        </div>
        <nav id="navLinks">
            <ul>
                <li><a href="movies.php" id="Movie List">Movie List</a></li>
                <li><a href="bookings.php" id="Booking">Booking</a></li>
                <?php
                    session_start();

                    // Start the session to access session variables

                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);

                    if (isset($_SESSION["username"])) {
                        $username = $_SESSION["username"];
                        if ($username === "admin") {
                            echo '<li><a href="admin.php" id="Profile">Profile</a></li>';
                        } else {
                            echo '<li><a href="users.php" id="Profile">Profile</a></li>';
                        }
                    } else {
                        echo "Session username not set. Redirecting to login page...";
                        header("location: login.php");
                        exit;
                    }
                ?>
            </ul>
        </nav>
    </header>
    <h1>Movies selector</h1>
    <div class="space-div"></div>

    <div class="About-page">
        
        <p>
        Welcome to our movie website, where your cinematic journey begins! Whether you're a fan of heart-pounding action, spine-tingling thrillers, heartwarming dramas,
        or side-splitting comedies, we have something for everyone. Dive into a world of endless entertainment as you explore our carefully curated selection of films from various genres,
        years, and cinemas.
        </p>
        <p>
            If you're in the mood for a specific genre, simply browse through our list and take your pick. From adrenaline-fueled blockbusters to thought-provoking indie flicks, 
            our diverse collection ensures there's always something to satisfy your cravings. Whether it's the latest releases or timeless classics, 
            you'll find them all here.
        </p>
        <p>
            Perhaps you're feeling nostalgic and want to revisit a beloved movie from a particular year. Whether it's reliving the magic of the '80s or 
            exploring the cinematic gems of the 21st century, our website makes it easy to travel back in time and rediscover old favorites.
        </p>
        <p>
            If you're looking for a specific movie but can't seem to find it, fear not! Our user-friendly interface allows you to easily navigate to the bookings page,
            where you can search for your desired movie and book tickets hassle-free. Alternatively, if you're in the mood for some exploration, head over to our movie list page, 
            where you can peruse through our entire catalog and discover hidden gems you never knew existed.
        </p>
        <p>
            So what are you waiting for? Embark on your cinematic adventure today and let the magic of movies sweep you away!
        </p>
    </div>
    
    <div class="search-container">
    <div class="logo-container1">
        <img src="../images/logo/logo.png" alt="Logo">
    </div>
    <div class="search-bar">
        <form id="searchForm" method="GET"> <!-- PHP form handling -->
            <div class="select-container">
                <select name="movie-name" id="movie-name">
                    <option value="" disabled selected>Movie Name</option>
                    <?php
                        // Read JSON file
                        $json = file_get_contents('../jsonfiles/moviedescription.json');
                        // Decode JSON to associative array
                        $movies = json_decode($json, true);
                        // Check if JSON decoding was successful
                        if ($movies !== null) {
                            // Extract movie names and populate dropdown
                            foreach ($movies as $movie) {
                                echo '<option value="' . $movie["Movie Name"] . '">' . $movie["Movie Name"] . '</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No movies available</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="select-container">
                <select name="genre-name" id="genre-name">
                    <option value="" disabled selected>Select genre</option>
                    <?php
                        // Create an array to store unique genres
                        $genres = array();
                        // Extract genres from movies and populate dropdown
                        foreach ($movies as $movie) {
                            $genreList = explode(', ', $movie['Genre']);
                            foreach ($genreList as $genre) {
                                if (!in_array($genre, $genres)) {
                                    echo '<option value="' . $genre . '">' . $genre . '</option>';
                                    $genres[] = $genre;
                                }
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="select-container">
                <select name="year" id="year">
                    <option value="" disabled selected>Select year</option>
                    <?php
                        // Create an array to store unique years
                        $years = array();
                        // Extract release years from movies and populate dropdown
                        foreach ($movies as $movie) {
                            $year = $movie['Release Year'];
                            if (!in_array($year, $years)) {
                                echo '<option value="' . $year . '">' . $year . '</option>';
                                $years[] = $year;
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="space-div"></div>
            <button type="button" id="search-button">Search</button>
        </form>
    </div>
</div>
        
    <footer>
        <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
        <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
    </footer>

    <script>
    // Function to handle form submission
    document.getElementById('search-button').addEventListener('click', function() {
        var selectedMovie = document.getElementById('movie-name').value;
        var selectedYear = document.getElementById('year').value;
        var selectedGenre = document.getElementById('genre-name').value;

        if (selectedMovie) {
            // Redirect to movie_description.php with selected movie name
            window.location.href = 'movies_description.php?movie=' + encodeURIComponent(selectedMovie);
        } else if (selectedYear && !selectedGenre) {
            // Redirect to movie_choice.php with selected year
            window.location.href = 'moviechoice.php?year=' + encodeURIComponent(selectedYear);
        } else if (selectedGenre && !selectedYear) {
            // Redirect to movie_choice.php with selected genre
            window.location.href = 'moviechoice.php?genre=' + encodeURIComponent(selectedGenre);
        } else {
            document.getElementById('searchForm').submit();
        }
    });
    </script>
</body>

</html>
