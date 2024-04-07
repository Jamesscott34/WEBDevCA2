<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Movies - Home. Browse through our selection of movies and enjoy the latest releases.">
    <meta name="keywords" content="movies, cinema, entertainment">
    <meta name="author" content="sba23056: James Scott">
    
    <title>Edit Movie</title>
    
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">
    <style>
    /* Style for labels */
    label {
        color: white; /* Set text color to white for labels */
        display: inline-block;
        width: 150px; /* Adjust width as needed */
    }

    /* Style for input fields */
    input[type="text"],
    input[type="number"],
    textarea {
        width: calc(100% - 160px); /* Adjust width to accommodate label width */
        padding: 8px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
    }

    /* Style for buttons */
    button[type="submit"],
    button[type="button"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    button[type="submit"]:hover,
    button[type="button"]:hover {
        background-color: #0056b3;
    }

    /* Adjustments for the form layout */
    form {
        margin-bottom: 20px;
    }

    /* Style for movie name and release year */
    table th:first-child,
    table td:first-child,
    table th:nth-child(2),
    table td:nth-child(2) {
        color: white; /* Set text color to white for movie name and release year */
    }

    /* Style for tables */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px; /* Add some space between tables */
    }

    th, td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
        color: black; /* Set text color to black for table cells */
    }

    th {
        background-color: #f2f2f2; /* Background color for table header */
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
                <a href="admin.php">Admin</a>
            </ul>
        </nav>
    </header>

    <div class="container">
    <?php
// Include database connection configuration
include 'config.php';

// Check if movie ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Check if the form is submitted for updating movie details
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        // Validate and sanitize input data
        $movie_name = $_POST['movie_name'];
        $release_year = $_POST['release_year'];
        $genre = $_POST['genre'];
        $actors = $_POST['actors'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $cinema = $_POST['cinema'];
        $image = $_POST['image'];
        $trailer = $_POST['trailer'];

        // Prepare and execute SQL statement to update movie details
        $sql = "UPDATE movies SET movie_name=?, release_year=?, genre=?, actors=?, duration=?, description=?, cinema=?, image=?, trailer=? WHERE id=?";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("sisssssssi", $movie_name, $release_year, $genre, $actors, $duration, $description, $cinema, $image, $trailer, $movie_id);
            if ($stmt->execute()) {
                // Movie details updated successfully in the database

                // Update movie details in the JSON file
                $jsonFilePath = '../jsonfiles/moviedescription.json';
                $json = file_get_contents($jsonFilePath);
                $movies = json_decode($json, true);
                foreach ($movies as &$movie) {
                    if ($movie["Movie Name"] === $movie_name) {
                        $movie["Release Year"] = $release_year;
                        $movie["Genre"] = $genre;
                        $movie["Actors"] = explode(", ", $actors);
                        $movie["Duration"] = $duration;
                        $movie["Description"] = $description;
                        $movie["Cinema"] = $cinema;
                        $movie["Image"] = $image;
                        $movie["Trailer"] = $trailer;
                        break;
                    }
                }
                file_put_contents($jsonFilePath, json_encode($movies, JSON_PRETTY_PRINT));

                echo "<p class  style ='color: white''success'>Movie details updated successfully.</p>";
            } else {
                echo "<p class='error style ='color: white''>Error updating movie details: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='error'>Error preparing SQL statement: " . $link->error . "</p>";
        }
    }

    // Retrieve movie details based on the provided movie ID
    $sql = "SELECT * FROM movies WHERE id = ?";
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("i", $movie_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                // Movie found, fetch details
                $row = $result->fetch_assoc();
                ?>
                <!-- Display the form for updating movie details -->
                <h2 style ='color: white'>Edit Movie</h2>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $movie_id; ?>">
                    <label for="movie_name">Movie Name:</label>
                    <input type="text" id="movie_name" name="movie_name" value="<?php echo $row['movie_name']; ?>" required><br>
                    <label for="release_year">Release Year:</label>
                    <input type="number" id="release_year" name="release_year" value="<?php echo $row['release_year']; ?>" required><br>
                    <label for="genre">Genre:</label>
                    <input type="text" id="genre" name="genre" value="<?php echo $row['genre']; ?>" required><br>
                    <label for="actors">Actors:</label>
                    <input type="text" id="actors" name="actors" value="<?php echo $row['actors']; ?>" required><br>
                    <label for="duration">Duration:</label>
                    <input type="text" id="duration" name="duration" value="<?php echo $row['duration']; ?>" required><br>
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" cols="50" required><?php echo $row['description']; ?></textarea><br>
                    <label for="cinema">Cinema:</label>
                    <input type="text" id="cinema" name="cinema" value="<?php echo $row['cinema']; ?>" required><br>
                    <label for="image">Image:</label>
                    <input type="text" id="image" name="image" value="<?php echo $row['image']; ?>" required><br>
                    <label for="trailer">Trailer:</label>
                    <input type="text" id="trailer" name="trailer" value="<?php echo $row['trailer']; ?>" required><br>
                    <button type="submit" name="update">Update Movie</button>
                    <a href="admin.php"><button type="button">Cancel</button></a>
                </form>
                <?php
            } else {
                echo "<p class='error'>Movie not found.</p>";
            }
        } else {
            echo "<p class='error'>Error executing SQL statement: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>Error preparing SQL statement: " . $link->error . "</p>";
    }
} else {
    echo "<p class='error'>No movie ID provided.</p>";
}

// Close database connection
$link->close();
?>
    </div>

    <footer>
        <a href="https://www.linkedin.com/in/james-scott-85b278156?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">LinkedIn</a>
        <a href="https://github.com/Jamesscott34" target="_blank" rel="noopener">GitHub</a>
    </footer>

</body>
</html>
