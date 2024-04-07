<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">
    
    <title>View Movies</title>
    
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
        table td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: white;
        }

        table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: black;
        }

        table th {
            background-color: #f2f2f2;
        }
        a {
            color: white; /* Set hyperlink color to white */
            text-decoration: none; /* Remove underline */
        }

        a:hover {
            color: lightgray; /* Change color on hover */
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
<header>
    <div class="logo-container">
        <img src="../images/logo/logo.png" alt="Logo">
    </div>
    <nav id="navLinks">
        <ul>
        <a href="admin.php">Admin</a>
        </ul>
    </nav>
</header>
<body>
    <h2>List of Movies</h2>
    <?php
// Include database connection configuration
include 'config.php';

// SQL query to retrieve movies
$sql = "SELECT id, movie_name, cinema, genre FROM movies";
$result = $link->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Output data of each row in a table
        echo '<table>';
        echo '<tr>';
        echo '<th>Movie Name</th>';
        echo '<th>Cinema</th>';
        echo '<th>Genre</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            // Check if keys exist before accessing them
            echo '<td><a href="database_movies.php?id=' . $row['id'] . '">' . (isset($row['movie_name']) ? $row['movie_name'] : '') . '</a></td>';
            echo '<td>' . (isset($row['cinema']) ? $row['cinema'] : '') . '</td>';
            echo '<td>' . (isset($row['genre']) ? $row['genre'] : '') . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '0 results';
    }
    // Free result set
    $result->free();
} else {
    echo "Error: " . $link->error;
}

// Close database connection
$link->close();
?>


    <button onclick="topFunction()" class="topBtn" id="myBtn" title="Go to top">Top</button>
    <footer>
            <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Linkden</a>
            <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
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
    </script>
</body>
</html>
