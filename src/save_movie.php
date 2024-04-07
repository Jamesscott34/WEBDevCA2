<?php
session_start(); // Start the session

// Include config file
require_once "config.php";

// Check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // Get username from session
    $username = $_SESSION["username"];

    // Get movie name from form submission
    $movie_name = $_POST['movie_name'];

    // Prepare SQL statement to insert data into moviessaved table
    $sql = "INSERT INTO moviessaved (username, movie_name) VALUES (?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_movie_name);
        
        // Set parameters
        $param_username = $username;
        $param_movie_name = $movie_name;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Insert successful
            echo "Movie saved to profile!";
        } else{
            // Insert failed
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // User not logged in
    echo "User not logged in.";
}
?>
