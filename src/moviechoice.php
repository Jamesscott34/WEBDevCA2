<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Choose your favorite movies based on genre, year, and actor.">
    <meta name="keywords" content="movie, film, choice, genre, year, actor">
    <meta name="author" content="sba23056: James Scott">
    <title>Movie Choice</title>
    <link rel="stylesheet" href="../styles/moviechoice.css">
    <link rel="stylesheet" href="../styles/main.css">
    <!-- Favicon -->
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <!-- iOS specific meta tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Windows specific meta tags -->
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
                <li><a href="menu.php" id="Home">Home</a></li>
                <li><a href="bookings.php" id="Booking">Booking</a></li>
            </ul>
        </nav>
    </header>

    <h1>Movie Choice</h1>

    <div class="About-page">
        <p>
            Welcome movie lovers! Are you ready to embark on an exhilarating journey through the world of cinema?
            We invite you to immerse yourself in the magic of movies by selecting a film that piques your interest.
            With our vast collection spanning various genres, years, and cinemas, the possibilities are endless.
        </p>
        <p>Take a moment to explore our selection and choose the movie that resonates with you. Whether you're in the mood
            for an action-packed adventure, a heartwarming romance, a gripping thriller, or a laugh-out-loud comedy,
            we have something for everyone. Once you've made your selection, why not indulge your curiosity further by watching the trailer?
            Let the tantalizing glimpses of cinematic brilliance entice you, leaving you eager to experience the full movie on the big screen.
        </p>
        <p>
            So go ahead, dive into our collection, and let your imagination run wild.
            Whether you're a cinephile searching for your next favorite film or simply looking for a fun night out at the movies,
            we've got you covered. Select your movie, watch the trailer, and get ready for an unforgettable cinematic experience!
        </p>
    </div>

    <div class="MovieList">
        <ul id="movieList">
        <?php
session_start(); // Start the session

// Fetch selected parameters from URL
$genre = isset($_GET['genre']) ? $_GET['genre'] : null;
$year = isset($_GET['year']) ? $_GET['year'] : null;

// Read JSON file
$json = file_get_contents('../jsonfiles/moviedescription.json');
// Decode JSON to associative array
$movies = json_decode($json, true);

// Filter movies based on selected parameters
$filteredMovies = array_filter($movies, function($movie) use ($genre, $year) {
    return 
        (!$genre || in_array($genre, explode(', ', $movie['Genre']))) &&
        (!$year || $movie['Release Year'] == $year);
});

foreach ($filteredMovies as $movie) {
    echo '<li>';
    echo '<a href="movies_description.php?movie=' . urlencode($movie['Movie Name']) . '">';
    echo '<img src="' . $movie['Image'] . '" alt="' . $movie['Movie Name'] . '">';
    echo '<span>' . $movie['Movie Name'] . ' (' . $movie['Release Year'] . ') - ' . $movie['Genre'] . '</span>';
    echo '</a>';
    echo '<div class="buttons">';
    // Book button
    echo '<form action="bookings.php" method="post" style="display: inline;">';
    echo '<button type="submit">Book</button>';
    echo '</form>';
    // Save button with onclick event to show popup
    echo '<form action="save_movie.php" method="post" style="display: inline;">';
    echo '<input type="hidden" name="username" value="' . htmlspecialchars($_SESSION["username"]) . '">';
    echo '<input type="hidden" name="movie_name" value="' . htmlspecialchars($movie['Movie Name']) . '">';
    echo '<button type="button" onclick="saveMovie(\'';
    echo htmlspecialchars($_SESSION["username"]) . '\', \'' . htmlspecialchars($movie['Movie Name']) . '\')">Save</button>';
    echo '</form>';
    echo '</div>';
    echo '</li>';
}

?>



        </ul>
    </div>

    <footer>
        <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
        <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
    </footer>

    <script>
    document.getElementById('movie-name').value = "<?php echo isset($_POST['movie']) ? htmlspecialchars($_POST['movie']) : ''; ?>";

    function showSavedMessage() {
        alert('Movie saved to profile!');
    }
     // JavaScript function to send AJAX request to save_movie.php
     function saveMovie(username, movieName) {
        // Create a FormData object to send data to the server
        const formData = new FormData();
        formData.append('username', username); // Add username to FormData
        formData.append('movieName', movieName); // Add movieName to FormData

        // Send a POST request to save_movie.php
        fetch('save_movie.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Show success message
                showSavedMessage();
            } else {
                // Show error message
                alert('Failed to save movie.');
            }
        })
        .catch(error => {
            // Show error message
            console.error('Error:', error);
            alert('Failed to save movie.');
        });
    }

    // Function to show saved message
    function showSavedMessage() {
        alert('Movie saved to profile!');
    }
</script>

    
</body>

</html>
