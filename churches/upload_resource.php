<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resource_name = mysqli_real_escape_string($conn, $_POST['resource_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $uploaded_by = mysqli_real_escape_string($conn, $_POST['uploaded_by']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']); // Store phone number

    // Handle image upload
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_path = $target_file;
    } else {
        $image_path = "uploads/default.jpg"; // Default image if upload fails
    }

    // Insert into database
    $query = "INSERT INTO resources (resource_name, description, uploaded_by, phone, image) 
              VALUES ('$resource_name', '$description', '$uploaded_by', '$phone', '$image_path')";
    if (mysqli_query($conn, $query)) {
        $success = "Resource uploaded successfully!";
    } else {
        $error = "Error uploading resource.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resource</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Upload a Resource</h1>

        <?php if (isset($success)) echo "<p class='text-green-600'>$success</p>"; ?>
        <?php if (isset($error)) echo "<p class='text-red-600'>$error</p>"; ?>

        <form method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-lg">
            <label class="block mb-2">Resource Name:</label>
            <input type="text" name="resource_name" required class="w-full p-2 border rounded">

            <label class="block mt-4 mb-2">Description:</label>
            <textarea name="description" required class="w-full p-2 border rounded"></textarea>

            <label class="block mt-4 mb-2">Uploaded By:</label>
            <input type="text" name="uploaded_by" required class="w-full p-2 border rounded">

            <label class="block mt-4 mb-2">Phone Number:</label>
            <input type="text" name="phone" required class="w-full p-2 border rounded" placeholder="Enter phone number">

            <label class="block mt-4 mb-2">Upload Image:</label>
            <input type="file" name="image" accept="image/*" required class="w-full p-2 border rounded">

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                Upload Resource
            </button>
        </form>
    </div>
</body>
</html>
