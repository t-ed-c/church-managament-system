<!-- Church Management System - Contact Page -->

<?php 
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $query = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($conn, $query)) {
        $success = "Thank you for your feedback!";
    } else {
        $error = "Error submitting feedback. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="offerings.php">Track Offerings & Tithes</a></li>
            <li><a href="schedule.php">Schedule Resources</a></li>
            <li><a href="reports.php">Financial Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <div style="text-align:center; padding:15%;">
            <h2>We'd love to hear from you!</h2>
            <?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Church Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
