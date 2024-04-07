<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User Information">
    <meta name="author" content="sba23056: James Scott">
    <title>User Information</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">
    
    <style>
        body {
            color: white; /* Set text color to white */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white; /* Set text color to white for table */
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            color: black;
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
    <header>
        <div class="logo-container">
            <img src="../images/logo/logo.png" alt="Logo">
        </div>
        <nav id="navLinks">
            <ul>
                <li><a href="view_users.php">Admin</a></li>
            </ul>
        </nav>
    </header>

    <h2>User Information</h2>

    <?php
// Include config file
require_once 'config.php';

// Check if username is provided in the URL
if(isset($_GET['username'])) {
    $username = $_GET['username'];
    
    // Retrieve user information from the database
    $sql_user = "SELECT * FROM users WHERE username = '$username'";
    $result_user = mysqli_query($link, $sql_user);

    if(mysqli_num_rows($result_user) == 1) {
        $row_user = mysqli_fetch_assoc($result_user);
        echo '<table>';
        echo '<tr><th>Username</th><td>' . $row_user['username'] . '</td></tr>';
        echo '<tr><th>Email</th><td>' . $row_user['email'] . '</td></tr>';
        echo '<tr><th>Password</th><td>' . $row_user['password'] . '</td></tr>';
        echo '</table>';
    } else {
        echo '<p>User not found.</p>';
    }

    mysqli_free_result($result_user);

    // Retrieve viewed movies information from the database
    $sql_viewed = "SELECT movie_name FROM moviesviewed WHERE username = '$username'";
    $result_viewed = mysqli_query($link, $sql_viewed);

    if(mysqli_num_rows($result_viewed) > 0) {
        echo '<h3>Viewed Movies</h3>';
        echo '<table>';
        while($row_viewed = mysqli_fetch_assoc($result_viewed)) {
            echo '<tr><td>' . $row_viewed['movie_name'] . '</td></tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No movies viewed.</p>';
    }

    mysqli_free_result($result_viewed);

    // Retrieve saved movies information from the database
    $sql_saved = "SELECT movie_name FROM moviessaved WHERE username = '$username'";
    $result_saved = mysqli_query($link, $sql_saved);

    if(mysqli_num_rows($result_saved) > 0) {
        echo '<h3>Saved Movies</h3>';
        echo '<table>';
        while($row_saved = mysqli_fetch_assoc($result_saved)) {
            echo '<tr><td>' . $row_saved['movie_name'] . '</td></tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No movies saved.</p>';
    }

    mysqli_free_result($result_saved);
} else {
    echo '<p>Username not provided.</p>';
}

mysqli_close($link);
?>

    <button onclick="removeAccount()">Remove Account</button>
    <footer>
            <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
            <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
        </footer>

    <script>
    function removeAccount() {
        // Confirm with the user before proceeding
        if (confirm("Are you sure you want to remove this account?")) {
            // Get the username from the URL parameter
            var urlParams = new URLSearchParams(window.location.search);
            var username = urlParams.get('username');
            
            // Send an AJAX request to delete the account and associated data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_account.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === "success") {
                        // Redirect the user to another page or display a success message
                        alert("Account removed successfully!");
                        window.location.href = "admin.php"; // Redirect to admin page
                    } else {
                        alert("Failed to remove account. Please try again later.");
                    }
                }
            };
            xhr.send("username=" + username);
        }
    }
    </script>
</body>
</html>
