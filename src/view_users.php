<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">
    <title>View Users</title>
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

    /* Style for hyperlinks */
    a {
        color: white; /* Set hyperlink color to white */
        text-decoration: none; /* Remove underline from hyperlinks */
    }

    /* Style for hyperlinks on hover */
    a:hover {
        color: lightgray; /* Change color when hovered */
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
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </nav>
    </header>

    <h2>List of Users</h2>
    <?php
    // Include config file
    require_once 'config.php';

    // SQL query to retrieve users and their viewed movies
    $sql = "SELECT u.id, u.username, GROUP_CONCAT(mv.movie_name SEPARATOR ', ') AS viewed_movies
            FROM users u
            LEFT JOIN moviesviewed mv ON u.username = mv.username
            WHERE u.username <> 'admin'
            GROUP BY u.id";

    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo '<tr><th>Username</th><th>Viewed Movies</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td><a href="userinfo.php?username=' . $row['username'] . '">' . $row['username'] . '</a></td>';
                echo '<td>' . ($row['viewed_movies'] ? $row['viewed_movies'] : 'No movies viewed') . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            mysqli_free_result($result);
        } else {
            echo 'No users found.';
        }
    } else {
        echo 'Error: ' . mysqli_error($link);
    }

    mysqli_close($link);
    ?>

    <button onclick="topFunction()" class="topBtn" id="myBtn" title="Go to top">Top</button>

    <footer>
        <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">LinkedIn</a>
        <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
        <button onclick="removeAccount()">Remove Account</button>
    </footer>

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

        function removeAccount() {
            // Perform account removal operation here
            alert("Account removed successfully!");
        }
    </script>
</body>
</html>