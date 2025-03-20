<?php
include_once 'connect.php';

// Handle search input
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch resources with search and pagination
$query = "SELECT * FROM resources WHERE resource_name LIKE '%$search%' OR uploaded_by LIKE '%$search%' ORDER BY upload_date DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

$resources = [];
while ($row = mysqli_fetch_assoc($result)) {
    $resources[] = $row;
}

// Get total resources for pagination
$total_query = "SELECT COUNT(*) as total FROM resources";
$total_result = mysqli_query($conn, $total_query);
$total = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Resources</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Available Church Resources</h1>

        <a href="upload_resource.php" class="px-4 py-2 bg-green-600 text-white rounded mb-4 inline-block">Upload New Resource</a>

        <!-- Search Form -->
        <form method="GET" class="mb-4 flex justify-center">
            <input type="text" name="search" placeholder="Search resources..." class="p-2 border rounded w-1/3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Search</button>
        </form>

        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-4">Image</th>
                    <th class="py-3 px-4">Resource</th>
                    <th class="py-3 px-4">Description</th>
                    <th class="py-3 px-4">Uploaded By</th>
                    <th class="py-3 px-4">Phone</th>
                    <th class="py-3 px-4">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($resources)): ?>
                    <?php foreach ($resources as $resource): ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-2 px-4">
                                <img src="<?php echo htmlspecialchars($resource['image']); ?>" alt="Resource Image" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($resource['resource_name']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($resource['description']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($resource['uploaded_by']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($resource['phone']); ?></td>
                            <td class="py-2 px-4"><?php echo date('F j, Y', strtotime($resource['upload_date'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-3 text-center">No resources available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
