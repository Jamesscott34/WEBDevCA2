<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
$adminName = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../images/logo/logo.png" alt="Logo">
    </div>
    <nav id="navLinks">
        <ul>
            <a href="menu.php">Menu</a>
        </ul>
    </nav>
</header>
<h1 class="welcome">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your movie site.</h1>

<!-- Buttons for performing actions -->
<button onclick="viewUsers()">View Users</button>
<button onclick="addMovies()">Add Movie</button>
<button onclick="viewMovies()">View All Movies</button> <!-- New button for viewing all movies -->

<!-- Buttons for resetting password and logging out -->
<p>
    <button onclick="window.location.href='reset-password.php'" class="btn btn-warning">Reset Your Password</button>
    <button onclick="window.location.href='logout.php'" class="btn btn-danger ml-3">Sign Out of Your Account</button>
</p>

<footer>
    <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
    <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
</footer>

<!-- JavaScript for handling button actions -->
<script>
    function viewUsers() {
        // Redirect to view users page
        window.location.href = "view_users.php";
    }

    function addMovies() {
        // Redirect to add movie page
        window.location.href = "add_movies.php";
    }

    function viewMovies() {
        // Redirect to view all movies page
        window.location.href = "view_movies.php";
    }
</script>
</body>
</html>
