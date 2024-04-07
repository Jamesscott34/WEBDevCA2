<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Find detailed information about your favorite movies.">
    <meta name="keywords" content="movie, film, description, details">
    <meta name="author" content="sba23056: James Scott">
    <title>Movie Description</title>
    <link rel="stylesheet" href="../styles/movie_description.css">
    <link rel="stylesheet" href="../styles/main.css">
    <!-- Favicon -->
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <!-- iOS specific meta tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Windows specific meta tags -->
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Style for the Save button */
        #save-button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px; /* Adjust margin as needed */
        }

        #save-button:hover {
            background-color: #0056b3;
        }
    </style>
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
    <h1 class="centered">Movie Description</h1>
    <div class="movie-description centered">
        <?php
        // Function to fetch and display movie description
        function fetchMovieDescription($jsonFilePath, $movieName) {
            // Read JSON file
            $json = file_get_contents($jsonFilePath);
            // Decode JSON to associative array
            $movies = json_decode($json, true);

            // Find the selected movie in the list
            foreach ($movies as $movie) {
                if ($movie["Movie Name"] === $movieName) {
                    // Display movie details
                    echo '
                        <div style="text-align: center;">
                            <img src="' . $movie["Image"] . '" alt="' . $movie["Movie Name"] . '" class="movie-image">
                            <h2 style="color:white;">' . $movie["Movie Name"] . ' (' . $movie["Release Year"] . ')</h2>
                            <p style="color:white;"><strong>Genre:</strong> ' . $movie["Genre"] . '</p>
                            <p style="color:white;"><strong>Actors:</strong> ' . implode(", ", $movie["Actors"]) . '</p>
                            <p style="color:white;"><strong>Duration:</strong> ' . $movie["Duration"] . '</p>
                            <p style="color:white;"><strong>Description:</strong> ' . $movie["Description"] . '</p>
                            <p style="color:white;"><strong>Cinema:</strong> ' . $movie["Cinema"] . '</p>
                            <video controls style="display: block; margin: 20px auto;">
                                <source src="' . $movie["Trailer"] . '" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    ';
                    return; // Stop looping once the movie is found
                }
            }

            // If movie is not found, display an error message
            echo '<p style="color: red;">Movie \'' . $movieName . '\' not found.</p>';
        }

        // Fetch movie description if movie name is provided in the URL parameter
        if (isset($_GET['movie'])) {
            // Get the movie name from the URL parameter
            $movieName = $_GET['movie'];
            // Call the function to fetch and display the movie description
            fetchMovieDescription('../jsonfiles/moviedescription.json', $movieName);
        } else {
            // If movie name is not provided in the URL, display a message
            echo '<p style="color: red;">Movie name not provided.</p>';
        }
        ?>
    </div>
    <a href="bookings.php" class="button" id="book-ticket-button">Book Ticket</a>
    <button id="save-button">Save</button>
    <footer>
        <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">LinkedIn</a>
        <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
    </footer>
    <script>
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

        // Event listener for save button click
        document.getElementById('save-button').addEventListener('click', function() {
            var movieName = "<?php echo isset($_GET['movie']) ? $_GET['movie'] : ''; ?>";
            var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
            saveMovie(username, movieName);
        });
    </script>
</body>
</html>
