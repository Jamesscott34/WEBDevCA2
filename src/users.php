<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$Name = $_SESSION['username']; // Assuming the username is stored in session

// Function to remove user account
function removeAccount($username, $link) {
    $sql = "DELETE FROM users WHERE username = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove_account"])) {
    // Remove the user account
    if (removeAccount($Name, $link)) {
        // Account removed successfully, redirect to login page
        header("Location: login.php");
        exit();
    } else {
        // Handle error if account removal fails
        echo "Error: Unable to remove account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">

    <title>Users page</title>
    
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">
    <style>
        .vertical-buttons {
    margin-bottom: 10px; /* Add margin bottom for spacing between buttons */
}
        </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="../images/logo/logo.png" alt="Logo">
        </div>

        
    </header>

    <h1 class="welcome">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our movie site.</h1>
    

    <form method="POST" action="viewusermovies.php">
    <div class="vertical-buttons">
        <button type="submit" name="view_saved_movies">View Saved Movies</button>
    </div>
    <div class="vertical-buttons">
        <button type="button" onclick="moveToMenu()">Go to Menu</button>
    </div>
    <div class="vertical-buttons">
        <button type="submit" name="remove_account">Remove Account</button>
    </div>
</form>

    

    <p>
    <button onclick="window.location.href='reset-password.php'" class="btn btn-warning">Reset Your Password</button>
    <button onclick="window.location.href='logout.php'" class="btn btn-danger ml-3">Sign Out of Your Account</button>
</p>
    

    <script>
        function moveToMenu() {
            window.location.href = "menu.php";
        }
    </script>
</body>

</html>
