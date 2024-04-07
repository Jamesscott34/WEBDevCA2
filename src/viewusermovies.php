<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
require_once "config.php";

// Get the username from the session
$username = $_SESSION['username'];

// Function to retrieve viewed movies from the database
function getViewedMovies($link, $username) {
    $movies = array();

    $sql = "SELECT movie_name FROM moviesviewed WHERE username = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $movie_name);
        
        while (mysqli_stmt_fetch($stmt)) {
            $movies[] = $movie_name;
        }

        mysqli_stmt_close($stmt);
    }

    return $movies;
}

// Function to retrieve saved movies from the database
function getSavedMovies($link, $username) {
    $movies = array();

    $sql = "SELECT movie_name FROM moviessaved WHERE username = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $movie_name);
        
        while (mysqli_stmt_fetch($stmt)) {
            $movies[] = $movie_name;
        }

        mysqli_stmt_close($stmt);
    }

    return $movies;
}

// Retrieve viewed movies and saved movies
$viewedMovies = getViewedMovies($link, $username);
$savedMovies = getSavedMovies($link, $username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">
    <title>Movies Viewed</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <style>
        /* Style for tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Add margin bottom for spacing */
        }

        /* Style for table headers */
        th {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: black; /* Set text color to black */
        }

        /* Style for table cells */
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: white; /* Set text color to white */
        }

        /* Style for hyperlinks */
        a {
            color: white; /* Set text color to white */
            text-decoration: none; /* Remove underline */
        }

        /* Style for footer */
        footer {
            background-color: transparent; /* Set background color */
            color: white; /* Set text color to white */
            padding: 10px; /* Add padding */
            text-align: center; /* Center align text */
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
                <li><a href="users.php">Profile</a></li>
            </ul>
        </nav>
    </header>

    <h1>Viewed Movies</h1>
    <table>
        <thead>
            <tr>
                <th>Movie Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewedMovies as $movie) : ?>
                <tr>
                    <td><a href="movies_description.php?movie=<?php echo urlencode($movie); ?>"><?php echo $movie; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h1>Saved Movies</h1>
    <table>
        <thead>
            <tr>
                <th>Movie Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($savedMovies as $movie) : ?>
                <tr>
                    <td><a href="movies_description.php?movie=<?php echo urlencode($movie); ?>"><?php echo $movie; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <footer>
        <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
        <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
    </footer>
</body>
</html>
