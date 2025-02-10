<?php
session_start();
include("connect.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: homepage.php");
    exit();
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($query);
$user_name = $user ? $user['firstName'] . ' ' . $user['lastName'] : 'User';

// Fetch a random memory verse
$verse_query = mysqli_query($conn, "SELECT verse FROM memory_verses ORDER BY RAND() LIMIT 1");
$verse = mysqli_fetch_assoc($verse_query)['verse'] ?? "No memory verse available.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to Church Management System</h1>
    <div style="text-align:center; padding:15%;">
      <p style="font-size:50px; font-weight:bold;">Hello <?php echo $user_name; ?> :)</p>
      <p style="font-size:20px; font-style:italic;">Memory Verse: "<?php echo $verse; ?>"</p>
    </div>
    <nav>
        <a href="offerings.php">Track Offerings & Tithes</a>
        <a href="schedule.php">Schedule Resources</a>
        <a href="reports.php">Financial Reports</a>
        <a href="contact.php">Contact Us</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>