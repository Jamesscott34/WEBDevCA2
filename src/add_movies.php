<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">
    <title>Add Movies</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">

    <!-- Meta tags for mobile -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">

    <style>
        body {
            text-align: center; /* Center align the body content */
            color: white; /* Set text color to white */
        }

        header {
            margin-bottom: 20px; /* Add margin to create space between header and form */
        }

        form {
            width: 50%; /* Set form width */
            margin: 0 auto; /* Center align the form horizontally */
            padding: 20px; /* Add padding to create space inside the form */
            border: 2px solid #ccc; /* Add border around the form */
            border-radius: 10px; /* Add border-radius for rounded corners */
        }

        form label {
            display: block; /* Make labels block-level elements */
            margin-bottom: 10px; /* Add margin bottom to create space between labels */
        }

        form input[type="text"],
        form input[type="number"],
        form textarea {
            width: 100%; /* Set input and textarea width to 100% */
            padding: 10px; /* Add padding to input and textarea */
            margin-bottom: 15px; /* Add margin bottom to create space between inputs */
            border: 1px solid #ccc; /* Add border to inputs */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }

        form input[type="submit"],
        form input[type="reset"] {
            padding: 10px 20px; /* Add padding to buttons */
            margin-top: 10px; /* Add margin top to create space between buttons */
            border: none; /* Remove border from buttons */
            border-radius: 5px; /* Add border-radius for rounded corners */
            background-color: #007bff; /* Set background color for buttons */
            color: white; /* Set text color to white for buttons */
            cursor: pointer; /* Change cursor to pointer on hover */
        }

        form input[type="submit"]:hover,
        form input[type="reset"]:hover {
            background-color: #0056b3; /* Change background color on hover */
        }
        .topBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            display: none; /* Hide button by default */
        }

        .topBtn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<!-- Header Section -->
<header>
    <div class="logo-container">
        <img src="../images/logo/logo.png" alt="Logo">
    </div>
    <nav id="navLinks">
        <ul>
            <!-- Admin link -->
            <a href="admin.php">Admin</a>
        </ul>
    </nav>
</header>

<!-- Main Content Section -->
<h2>Add New Movie</h2>
<form action="add_movie_handler.php" method="POST">
    <!-- Form to add movie details -->
    <label for="movieName">Movie Name:</label><br>
    <input type="text" id="movieName" name="movieName" required><br>

    <!-- Release Year -->
    <label for="releaseYear">Release Year:</label><br>
    <input type="number" id="releaseYear" name="releaseYear" required><br>

    <!-- Genre -->
    <label for="genre">Genre:</label><br>
    <input type="text" id="genre" name="genre" required><br>

    <!-- Actors -->
    <label for="actors">Actors:</label><br>
    <input type="text" id="actors" name="actors" required><br>

    <!-- Duration -->
    <label for="duration">Duration:</label><br>
    <input type="text" id="duration" name="duration" required><br>

    <!-- Description -->
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br>

    <!-- Cinema -->
    <label for="cinema">Cinema:</label><br>
    <input type="text" id="cinema" name="cinema" required><br>

    <!-- Image Location -->
    <label for="image">Image Location:</label><br>
    <input type="text" id="image" name="image" required><br>

    <!-- Trailer Link -->
    <label for="trailer">Trailer Link:</label><br>
    <input type="text" id="trailer" name="trailer" required><br>

    <!-- Form Submission Buttons -->
    <input type="submit" value="Add Movie">
    <input type="reset" value="Reset">
</form>

<!-- Scroll to Top Button -->
<button onclick="topFunction()" class="topBtn" id="myBtn" title="Go to top">Top</button>

<!-- Footer Section -->
<footer>
    <!-- Social Media Links -->
    <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
    <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
</footer>

     <!-- JavaScript for Scroll to Top Button -->
<script>
    // Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
</body>
</html>
