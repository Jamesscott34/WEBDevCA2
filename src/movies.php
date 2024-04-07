<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore a wide range of movies available for rental. Find your favorite genres and release years.">
    <meta name="keywords" content="movie, rental, film, genre, year">
    <meta name="author" content="sba23056: James Scott">
    <title>Movie Rental Company - Movies List</title>
    <link rel="stylesheet" href="../styles/movies.css">
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
                <li><a href="menu.php" id="home">Home</a></li>
                <li><a href="bookings.php" id="Booking">Booking</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Movie List</h1>

        <div class="space-div" style="height: 50px;"></div>
        <div class="space-div" style="height: 50px;"></div>
        <div class="About-page">

            <p>
                Welcome to the movies list page, where the magic of cinema awaits your discovery! Here,
                you have the opportunity to scroll through our extensive catalog of films and unearth hidden cinematic
                treasures that cater to every taste and preference. Whether you're seeking an adrenaline rush, an emotional rollercoaster,
                or a good old-fashioned laugh, this is the perfect place to start your cinematic journey.
            </p>
            <p>
                Feel free to take your time as you scroll through our meticulously curated collection. From timeless classics to the latest releases,
                there's something here to satisfy every movie buff's appetite. Take a moment to peruse the titles, read the synopses, and let your imagination
                run wild as you envision the cinematic adventures that await.
            </p>
            <p>
                So sit back, relax, and indulge your love for movies as you explore our movies list page. Whether you're in the mood for a gripping thriller,
                a heartwarming drama, or a mind-bending sci-fi epic, you're sure to find something that catches your eye. So go ahead, start scrolling,
                and let the magic of cinema unfold before you!
            </p>
        </div>

        <div class="space-div" style="height: 50px;"></div>
    
        <h1>Movie List</h1>
        <div class="MovieList">
            <ul id="movieList">
                <!-- PHP code to dynamically generate movie items -->
                <?php
                // Fetch movie data from JSON file
                $json_data = file_get_contents("../jsonfiles/moviedescription.json");
                $movies = json_decode($json_data, true);

                // Loop through each movie and generate HTML for each
                foreach ($movies as $movie) {
                    $movieName = $movie["Movie Name"];
                    $image = $movie["Image"];

                    // Output movie item HTML with save and book buttons
                    echo '<li>' .
                        '<a href="movies_description.php?movie=' . urlencode($movieName) . '">' . // Hyperlink to movies_description.html with movie name as parameter
                        '<img src="' . $image . '" alt="' . $movieName . '">' . // Image wrapped in hyperlink
                        '<p>' . $movieName . '</p>' . // Movie name wrapped in hyperlink
                        '</a>' .
                        '<button onclick="saveMovie(\'' . $movieName . '\')">Save</button>' .
                        '<button onclick="bookTicket(\'' . $movieName . '\')">Book</button>' .
                        '</li>';
                }
                ?>
            </ul>
        </div>
    
    </main>
    <button onclick="topFunction()" id="backToTopBtn" title="Go to top">Top</button>


    <footer>
        <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
        <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
    </footer>

    <script>
        // JavaScript function to save movie
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

        // JavaScript function to book ticket
        function bookTicket(movieName) {
            // Redirect to bookings.php with movieName as parameter
            window.location.href = "bookings.php?movie=" + encodeURIComponent(movieName);
        }

        // JavaScript function to scroll to the top of the page
        function topFunction() {
            // Scroll for modern browsers (Chrome, Firefox, IE, Opera)
            document.documentElement.scrollTop = 0;
            // Scroll for Safari
            document.body.scrollTop = 0;
            // Scroll for Edge
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    </script>

    <?php
    // Function to scroll to the top of the page
    function topFunction()
    {
        // Scroll for modern browsers (Chrome, Firefox, IE, Opera)
        echo 'document.documentElement.scrollTop = 0;';
        // Scroll for Safari
        echo 'document.body.scrollTop = 0;';
        // Scroll for Edge
        echo 'window.scrollTo({ top: 0, behavior: "smooth" });';
    }
    ?>
</body>

</html>
