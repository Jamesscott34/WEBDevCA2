<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Book your cinema tickets online and enjoy the latest movies in theaters.">
    <meta name="keywords" content="cinema, movie, booking, tickets, theater">
    <meta name="author" content="sba23056: James Scott">
    <title>Cinema Booking</title>
    <link rel="stylesheet" href="../styles/booking.css">
    <link rel="stylesheet" href="../styles/main.css">
    <!-- Favicon -->
    <link rel="icon" href="../images/logo/icon (2).png" type="image/x-icon">
    <!-- iOS specific meta tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Windows specific meta tags -->
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="msapplication-TileColor" content="#000">
</head>


<body>
    <header>
    <div class="logo-container">
        <img src="../images/logo/logo.png" alt="Logo">
    </div>

     <nav id="navLinks">
        <ul>
            <li><a href="menu.php" id="home">Home</a></li>
            <li><a href="movies.php" id="Movie List">Movie List</a></li>
            
        </ul>
    </nav>
    </header>

    <div class="header">
        <h1>Cinema Booking</h1>
    </div>

    <main>
        <form id="booking-form">
        <?php
// Start session
session_start();

// Include config file
require_once "config.php";

// Check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // Fetch email from the users table
    $sql = "SELECT email FROM users WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = $_SESSION["id"];
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Store result
            mysqli_stmt_store_result($stmt);
            
            // Check if email exists
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $email);
                
                if(mysqli_stmt_fetch($stmt)){
                    // Store email in session variable
                    $_SESSION["email"] = $email;
                }
            } else{
                echo "Email not found.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}
?>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>

        
        <label for="date ">Date:</label>
        <input type="date" id="date" name="date" required>
        

        <label for="ticket-amount">Ticket Amount:</label>
        <input type="number" id="ticket-amount" name="ticket-amount" min="1" required>

        <label for="movie-name">Movie Name</label>
<input type="text" id="movie-name" name="movie-name">

<label for="movie-selector">Movie selection</label>
<select id="movie-selector">
    <option value="" disabled selected>Select a movie</option>
    <?php
    // Include database connection
    require_once "config.php";

    // Fetch movies from the database
    $sql = "SELECT movie_name FROM movies";
    $result = mysqli_query($link, $sql);

    // Populate options in the dropdown
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['movie_name'] . '">' . $row['movie_name'] . '</option>';
    }
    ?>
</select>

            <label for="cinema-name">Cinema Name</label>
<select id="cinema-name">
    <option value="" disabled selected>Select a cinema</option>
    <?php
    // Include database connection
    require_once "config.php";

    // Fetch distinct cinemas from the database
    $sql = "SELECT DISTINCT cinema FROM movies";
    $result = mysqli_query($link, $sql);

    // Populate options in the dropdown
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['cinema'] . '">' . $row['cinema'] . '</option>';
    }
    ?>
    <!-- Options will be populated dynamically -->
</select>

        <label for="price-per-ticket">Price per Ticket:</label>
        <input type="text" id="price-per-ticket" name="price-per-ticket" value="15.00" readonly>

        <label for="total-price">Total Price:</label>
        <input type="text" id="total-price" name="total-price" readonly>

        <div id="captcha-section">
    <label for="captcha-input">Enter CAPTCHA:</label>
    <input type="text" id="captcha-input" name="captcha-input" required>
    <span id="captcha-code"></span>
    <button type="button" id="refresh-captcha-button">Refresh</button>
</div>

            <button type="button" id="submit-captcha-button">Submit CAPTCHA</button>
            <!-- End of CAPTCHA Section -->

        <button type="button" id="pay-now-button">Pay Now</button>
        <button type="submit" id="book-ticket-button">Book Ticket</button>
    </form>


    <form id="payment-form" style="display: none;">
        <h2>Payment Details</h2>
    
        <!-- Display field for the price of the tickets -->
        <div id="ticket-price-display"></div>
    
        <label for="card-name">Name on Card:</label>
        <input type="text" id="card-name" name="card-name" required>
    
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" required>
    
        <label for="expiry-date">Expiration Date (MM/YYYY):</label>
        <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YYYY" required>
    
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>
    
        <button type="button" id="confirm-payment-button">Pay Now</button>
        <button type="button" id="cancel-payment-button">Cancel</button>
    </form>

    <script>
 document.addEventListener('DOMContentLoaded', function () {
    const bookTicketButton = document.getElementById('book-ticket-button');
    const payNowButton = document.getElementById('pay-now-button');
    const cancelButton = document.getElementById('cancel-payment-button');
    const confirmPaymentButton = document.getElementById('confirm-payment-button');
    const paymentForm = document.getElementById('payment-form');
    const bookingForm = document.getElementById('booking-form');
    const bookTicketForm = document.getElementById('book-ticket-form');
    const movieNameInput = document.getElementById('movie-name');
    const ticketAmountInput = document.getElementById('ticket-amount');
    const totalPriceInput = document.getElementById('total-price');
    const totalPriceDisplay = document.getElementById('ticket-price-display');
    const movieSelector = document.getElementById('movie-selector');
    const refreshCaptchaButton = document.getElementById('refresh-captcha-button');
    const submitCaptchaButton = document.getElementById('submit-captcha-button');

    const pricePerTicket = parseFloat(document.getElementById('price-per-ticket').value);
    const pricePerTicketFixed = 15.00; // Fixed price per ticket

    // Function to check if the required fields are filled out
    function areFieldsValid() {
        const name = document.getElementById('name').value;
        const movieName = movieNameInput.value;
        const cinemaName = document.getElementById('cinema-name').value;
        const ticketAmount = ticketAmountInput.value;

        // Check if any of the required fields are empty
        return name.trim() !== '' && movieName.trim() !== '' && cinemaName.trim() !== '' && ticketAmount.trim() !== '' && parseInt(ticketAmount) > 0;
    }

    // Function to calculate and update the total price
    function updateTotalPrice() {
        const ticketAmount = parseFloat(ticketAmountInput.value);
        const totalPrice = ticketAmount * pricePerTicket;

        // Display the total price in the input field
        totalPriceInput.value = totalPrice.toFixed(2); // Display two decimal places
        totalPriceDisplay.textContent = `Total Price: €${totalPrice.toFixed(2)}`; // Update total price display
    }
    

    // Function to generate random CAPTCHA code
    function generateCaptcha() {
        const captchaCode = Math.floor(10000 + Math.random() * 90000); // Generate 5-digit random number
        document.getElementById('captcha-code').textContent = captchaCode; // Display the CAPTCHA code
        return captchaCode; // Return the generated CAPTCHA code
    }

    // Function to check if CAPTCHA input is correct
    function checkCaptcha() {
        const captchaInput = document.getElementById('captcha-input').value; // Get user input
        const captchaCode = document.getElementById('captcha-code').textContent; // Get generated CAPTCHA code
        return captchaInput === captchaCode; // Return true if input matches CAPTCHA code, false otherwise
    }

    function handleBookingOrPayment() {
    if (!areFieldsValid()) {
        alert('Please fill out all required fields and ensure ticket amount is greater than 0.');
        return;
    }

    // Check if CAPTCHA is correct before proceeding
    if (!checkCaptcha()) {
        alert('Please complete the CAPTCHA.');
        return; // Stop execution if CAPTCHA is not correct
    }

    // Hide the booking form, show the book ticket form, and hide the payment form
    bookingForm.style.display = 'none';
    bookTicketForm.style.display = 'block';
    paymentForm.style.display = 'none';
}

// Event listener for booking ticket
bookTicketButton.addEventListener('click', handleBookingOrPayment);

// Event listener for pay now button
payNowButton.addEventListener('click', handleBookingOrPayment);
// Event listener for pay now button
payNowButton.addEventListener('click', function () {
    // Check if all booking form fields are filled out
    if (!areFieldsValid()) {
        alert('Please fill out all required fields and ensure the ticket amount is greater than 0.');
        return;
    }

    // Check if CAPTCHA is correct before proceeding
    if (!checkCaptcha()) {
        alert('Please complete the CAPTCHA.');
        return; // Stop execution if CAPTCHA is not correct
    }

    // Hide the booking form and show the payment form
    bookingForm.style.display = 'none';
    paymentForm.style.display = 'block';
});



    // Event listener for canceling payment
cancelButton.addEventListener('click', function () {
    // Hide the payment form and show the booking form
    paymentForm.style.display = 'none';
    bookingForm.style.display = 'block';

    // Redirect to bookings.php to refresh the page
    window.location.href = 'bookings.php';
});

    // Event listener for confirming payment
confirmPaymentButton.addEventListener('click', function () {
    // Check if all payment form fields are filled out
    if (!arePaymentFieldsValid()) {
        alert('Please fill out all payment details.'); // Display an alert if fields are not valid
        return; // Stop execution if fields are not valid
    }

    // Hide the payment form, show success message, and redirect
    paymentForm.style.display = 'none';
    alert('Payment Successful!');
    window.location.href = 'menu.php';
});

    // Event listener for changes in the ticket amount input
    ticketAmountInput.addEventListener('input', updateTotalPrice);

    // Event listener for changes in the movie selector dropdown
    movieSelector.addEventListener('change', function () {
        const selectedOption = movieSelector.options[movieSelector.selectedIndex];
        movieNameInput.value = selectedOption.text;
    });

    // Event listener for refreshing CAPTCHA
    refreshCaptchaButton.addEventListener('click', function () {
        generateCaptcha(); // Generate new CAPTCHA code
        payNowButton.disabled = true; // Disable Pay Now button
    });

    // Event listener for submitting CAPTCHA
submitCaptchaButton.addEventListener('click', function () {
    if (checkCaptcha()) {
        alert('CAPTCHA is correct!');
        document.getElementById('captcha-section').style.display = 'none';
        document.getElementById('captcha-input').style.display = 'none';
        document.getElementById('submit-captcha-button').style.display = 'none';
        payNowButton.disabled = false; // Enable Pay Now button
        bookTicketButton.disabled = false; // Enable Book Ticket button
    } else {
        alert('CAPTCHA is incorrect! Please try again.');
        generateCaptcha(); // Generate new CAPTCHA code
        document.getElementById('captcha-input').value = ''; // Clear CAPTCHA input field
        payNowButton.disabled = true; // Disable Pay Now button
        bookTicketButton.disabled = true; // Disable Book Ticket button
    }
});

    // Autofill the name field with the username when the page is opened
    document.getElementById('name').value = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>";

    // Populate the "Movie Name" input field with the movie name from the URL
    movieNameInput.value = getQueryParam('movie');

    // Initial calculation of total price and generation of CAPTCHA code
    updateTotalPrice();
    generateCaptcha();
});

// Function to check if either movie name or movie selector is filled
function isMovieFieldFilled() {
    const movieName = document.getElementById('movie-name').value;
    const movieSelector = document.getElementById('movie-selector').value;
    return movieName.trim() !== '' || movieSelector.trim() !== '';
}

// Function to check if the required fields are filled out
function areFieldsValid() {
    const name = document.getElementById('name').value;
    const cinemaName = document.getElementById('cinema-name').value;
    const ticketAmount = document.getElementById('ticket-amount').value;

    // Check if any of the required fields are empty
    if (name.trim() === '' || cinemaName.trim() === '' || ticketAmount.trim() === '' || ticketAmount <= 0) {
        return false; // Fields are not valid
    }
    return true; // Fields are valid
}

// Event listener for form submission
document.getElementById('booking-form').addEventListener('submit', function (event) {
    // Check if required fields are filled out and either movie name or movie selector is filled
    if (!areFieldsValid() || !isMovieFieldFilled()) {
        event.preventDefault(); // Prevent the form from being submitted
        
        // Display a helpful message
        alert('Please fill out all required fields, ensure ticket amount is greater than 0, and fill in either "Movie Name" or "Movie Selector".');

        // Optionally, you can focus on the field that needs to be corrected
        const movieName = document.getElementById('movie-name').value;
        const movieSelector = document.getElementById('movie-selector').value;
        if (movieName.trim() === '' && movieSelector.trim() === '') {
            document.getElementById('movie-name').focus();
        }
    } else {
        // If all fields are valid, proceed with form submission
        // You can use AJAX to submit the form data to send_email.php
        const formData = new FormData(this);

        // Send form data using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'send_email.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // If email sent successfully, display a message
                alert('Email sent.');
                // Redirect to menu.php
                window.location.href = 'menu.php';
            } else {
                // If there was an error, display an error message
                alert('Error sending email. Please try again later.');
            }
        };
        xhr.send(formData);

        // Prevent the default form submission
        event.preventDefault();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const movieSelector = document.getElementById('movie-selector');
    const movieNameInput = document.getElementById('movie-name');

    // Event listener for changes in the movie selector dropdown
    movieSelector.addEventListener('change', function () {
        const selectedOption = movieSelector.options[movieSelector.selectedIndex];
        movieNameInput.value = selectedOption.text;
    });
});

// Function to check if the payment form fields are valid
function arePaymentFieldsValid() {
    const cardName = document.getElementById('card-name').value;
    const cardNumber = document.getElementById('card-number').value;
    const expiryDate = document.getElementById('expiry-date').value;
    const cvv = document.getElementById('cvv').value;

    // Check if any of the required fields are empty
    if (cardName.trim() === '' || cardNumber.trim() === '' || expiryDate.trim() === '' || cvv.trim() === '') {
        return false; // Fields are not valid
    }
    return true; // Fields are valid
}

// Function to enable/disable the pay now button based on field validity
function togglePayNowButton() {
    payNowButton.disabled = !arePaymentFieldsValid();
}

// Event listener for changes in payment form fields
paymentForm.addEventListener('input', togglePayNowButton);

// Event listener for confirming payment
confirmPaymentButton.addEventListener('click', function () {
    // Check if all payment fields are filled out
    if (!arePaymentFieldsValid()) {
        alert('Please fill out all payment details.'); // Display an alert if fields are not valid
        return; // Stop execution if fields are not valid
    }

    // Send email with payment details
    const cardNumber = document.getElementById('card-number').value;
    const lastFourDigits = cardNumber.substr(cardNumber.length - 4); // Extract last 4 digits of card number
    const paymentDetails = `Payment successful. You paid the price. Last 4 digits of card number: ${lastFourDigits}`;
    
    // Assuming you have a function sendEmail defined elsewhere
    // Replace 'sendEmail' with your actual function to send emails
    sendEmail(paymentDetails); // Send email with payment details

    // Display success message
    alert('Payment Successful!');

    // Redirect to menu.php
    window.location.href = 'menu.php';
});

// Initially disable the pay now button
togglePayNowButton();
</script>
</body>



</html>
