<?php
// Include database connection configuration
include 'config.php';

// Process adding movies
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if movie data is provided
    if (!empty($_POST['movieName']) && !empty($_POST['releaseYear']) && !empty($_POST['genre']) && !empty($_POST['actors']) && !empty($_POST['duration']) && !empty($_POST['description']) && !empty($_POST['cinema']) && !empty($_POST['image']) && !empty($_POST['trailer'])) {

        // Prepare movie data
        $movieName = mysqli_real_escape_string($link, $_POST['movieName']);
        $releaseYear = $_POST['releaseYear'];
        $genre = mysqli_real_escape_string($link, $_POST['genre']);
        $actors = explode(',', $_POST['actors']); // Convert actors string to array
        $duration = $_POST['duration'];
        $description = mysqli_real_escape_string($link, $_POST['description']);
        $cinema = mysqli_real_escape_string($link, $_POST['cinema']);
        $image = $_POST['image'];
        $trailer = $_POST['trailer'];

        // Prepare movie data array
        $movieData = array(
            "Movie Name" => $movieName,
            "Release Year" => $releaseYear,
            "Genre" => $genre,
            "Actors" => $actors,
            "Duration" => $duration,
            "Description" => $description,
            "Cinema" => $cinema,
            "Image" => $image,
            "Trailer" => $trailer
        );

        // Insert data into MySQL database table
        $sql = "INSERT INTO movies (movie_name, release_year, genre, actors, duration, description, cinema, image, trailer)
        VALUES ('$movieName', '$releaseYear', '$genre', '$actors', '$duration', '$description', '$cinema', '$image', '$trailer')";

        if (mysqli_query($link, $sql)) {
            echo "Movie added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        // Close database connection
        mysqli_close($link);

        // Update moviedescription.json
        $jsonFile = '../jsonfiles/moviedescription.json';
        $movies = json_decode(file_get_contents($jsonFile), true);
        $movies[] = $movieData;
        file_put_contents($jsonFile, json_encode($movies, JSON_PRETTY_PRINT));

        // Redirect to admin.php after adding the movie
        header("Location: admin.php");
        exit;
    } else {
        // Error message if all fields are not provided
        echo 'Error: All fields are required.';
    }
} else {
    // Error message for invalid request method
    echo 'Error: Invalid request method.';
}
?>
