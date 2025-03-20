<?php
include_once 'connect.php';

// Fetch members from the database
$query = "SELECT id, CONCAT(firstName, ' ', lastName) AS name, email, created_at FROM users ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

$members = [];
while ($row = mysqli_fetch_assoc($result)) {
    $members[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Members</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="members.css">
</head>
<body>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar w-64 border-r border-gray-200 p-4 bg-gray-900 text-white">
            <h2 class="text-xl font-semibold">Grace Church</h2>
            <nav class="mt-4">
                <ul class="space-y-2">
                    <li><a href="dashboard.php" class="block p-2 rounded hover:bg-gray-700">Dashboard</a></li>
                    <li><a href="members.php" class="block p-2 rounded bg-gray-700">Members</a></li>
                    <li><a href="donations.php" class="block p-2 rounded hover:bg-gray-700">Donations</a></li>
                    <li><a href="contact.php" class="block p-2 rounded hover:bg-gray-700">Contact</a></li>
                    <li><a href="logout.php" class="block p-2 rounded hover:bg-gray-700">Logout</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Church Members</h1>

            <table class="w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($members)): ?>
                        <?php foreach ($members as $member): ?>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-2 px-4"><?php echo $member['id']; ?></td>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($member['name']); ?></td>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($member['email']); ?></td>
                                <td class="py-2 px-4"><?php echo date('F j, Y', strtotime($member['created_at'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="py-3 text-center">No members found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
