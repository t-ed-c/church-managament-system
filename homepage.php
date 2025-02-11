<!-- Church Management System - Full Homepage -->

<?php 
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($query);
$user_name = $user ? htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) : 'User';

// Fetch a random memory verse
$verse_query = mysqli_query($conn, "SELECT verse FROM memory_verses ORDER BY RAND() LIMIT 1");
$verse = mysqli_fetch_assoc($verse_query)['verse'] ?? "No memory verse available.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to Church Management System</h1>
    </header>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="offerings.php">Track Offerings & Tithes</a></li>
            <li><a href="schedule.php">Schedule Resources</a></li>
            <li><a href="reports.php">Financial Reports</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <div style="text-align:center; padding:15%;">
            <p style="font-size:50px; font-weight:bold;">Hello <?php echo $user_name; ?> :)</p>
            <p style="font-size:20px; font-style:italic;">Memory Verse: "<?php echo htmlspecialchars($verse); ?>"</p>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Church Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>