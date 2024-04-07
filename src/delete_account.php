<?php
// Include config file
require_once 'config.php';

// Check if username is provided
if(isset($_POST['username'])) {
    $username = $_POST['username'];

    // Delete user from users table
    $sql_delete_user = "DELETE FROM users WHERE username = '$username'";
    $result_delete_user = mysqli_query($link, $sql_delete_user);

    // Delete viewed movies of the user from moviesviewed table
    $sql_delete_viewed = "DELETE FROM moviesviewed WHERE username = '$username'";
    $result_delete_viewed = mysqli_query($link, $sql_delete_viewed);

    // Delete saved movies of the user from moviessaved table
    $sql_delete_saved = "DELETE FROM moviessaved WHERE username = '$username'";
    $result_delete_saved = mysqli_query($link, $sql_delete_saved);

    // Check if all deletions were successful
    if($result_delete_user && $result_delete_viewed && $result_delete_saved) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}

// Close database connection
mysqli_close($link);
?>
