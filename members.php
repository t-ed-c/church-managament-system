<?php
include_once 'connect.php';

// Get members data
try {
    $response = file_get_contents('http://localhost/church-dashboard/api/members.php');
    $members = json_decode($response, true);
} catch (Exception $e) {
    // Fallback data if API request fails
    $members = [
        "total" => 256,
        "new_this_month" => 12,
        "members" => [
            [ "id" => 1, "name" => "John Smith", "email" => "john@example.com", "joined" => "2023-01-15", "status" => "active" ],
            [ "id" => 2, "name" => "Sarah Johnson", "email" => "sarah@example.com", "joined" => "2023-02-10", "status" => "active" ],
            [ "id" => 3, "name" => "Michael Brown", "email" => "michael@example.com", "joined" => "2023-03-05", "status" => "active" ],
            [ "id" => 4, "name" => "Emily Davis", "email" => "emily@example.com", "joined" => "2023-04-20", "status" => "inactive" ],
            [ "id" => 5, "name" => "Robert Wilson", "email" => "robert@example.com", "joined" => "2023-05-12", "status" => "active" ],
            [ "id" => 6, "name" => "Jennifer Lee", "email" => "jennifer@example.com", "joined" => "2023-06-08", "status" => "active" ],
            [ "id" => 7, "name" => "David Clark", "email" => "david@example.com", "joined" => "2023-07-19", "status" => "inactive" ],
            [ "id" => 8, "name" => "Lisa Martinez", "email" => "lisa@example.com", "joined" => "2023-08-23", "status" => "active" ],
            [ "id" => 9, "name" => "James Taylor", "email" => "james@example.com", "joined" => "2023-09-14", "status" => "active" ],
            [ "id" => 10, "name" => "Patricia White", "email" => "patricia@example.com", "joined" => "2023-10-05", "status" => "inactive" ],
            [ "id" => 11, "name" => "Thomas Harris", "email" => "thomas@example.com", "joined" => "2023-11-17", "status" => "active" ],
            [ "id" => 12, "name" => "Rebecca Martin", "email" => "rebecca@example.com", "joined" => "2023-12-22", "status" => "active" ],
        ]
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Members</title>
    <!-- Tailwind CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="members.css">
    <script src="members.js" defer></script>
</head>
<body>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar w-64 border-r border-gray-200">
            <div class="p-4 flex items-center justify-between border-b border-gray-700">
                <div class="font-semibold text-lg">Grace Church</div>
                <button id="toggleSidebar" class="text-white focus:outline-none">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
            <nav class="px-2 py-4">
                <ul class="space-y-1">
                    <li>
                        <a href="dashboard.php" class="flex items-center p-2 rounded hover:bg-sidebar-accent">
                            <i class="fas fa-th-large"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="members_page.php" class="flex items-center p-2 rounded sidebar-active">
                            <i class="fas fa-users"></i>
                            <span class="ml-3">Members</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded hover:bg-sidebar-accent">
                            <i class="fas fa-calendar"></i>
                            <span class="ml-3">Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded hover:bg-sidebar-accent">
                            <i class="fas fa-money-bill-alt"></i>
                            <span class="ml-3">Donations</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded hover:bg-sidebar-accent">
                            <i class="fas fa-comments"></i>
                            <span class="ml-3">Communications</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded hover:bg-sidebar-accent">
                            <i class="fas fa-book-open"></i>
                            <span class="ml-3">Resources</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-gray-700 mt-auto">
                <a href="#" class="flex items-center p-2 rounded hover:bg-sidebar-accent">
                    <i class="fas fa-cog"></i>
                    <span class="ml-3">Settings</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="border-b bg-white p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Members</h1>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <i class="fas fa-user"></i>
                    </button>
                </div>
            </header>

            <!-- Main Dashboard Content -->
            <main class="p-6">
                <!-- Member Statistics -->
                <div class="mb-8">
                    <div class="card p-4">
                        <div class="mb-3">
                            <h3 class="text-lg font-medium">Member Statistics</h3>
                            <p class="text-sm text-gray-500">Overview of church membership</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <h3 class="text-lg font-medium">Total Members</h3>
                                <p class="text-3xl font-bold"><?php echo $members['total'] ?? 0; ?></p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <h3 class="text-lg font-medium">New This Month</h3>
                                <p class="text-3xl font-bold"><?php echo $members['new_this_month'] ?? 0; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Members List -->
                <div class="mb-8">
                    <div class="card p-4">
                        <div class="mb-3">
                            <h3 class="text-lg font-medium">New Members</h3>
                            <p class="text-sm text-gray-500">Members who joined recently</p>
                        </div>
                        <div class="rounded-md border">
                            <div class="grid grid-cols-12 p-4 border-b bg-gray-100 font-medium">
                                <div class="col-span-1">#</div>
                                <div class="col-span-4">Name</div>
                                <div class="col-span-4">Email</div>
                                <div class="col-span-2">Joined</div>
                                <div class="col-span-1">Status</div>
                            </div>
                            
                            <?php if (isset($members['members']) && is_array($members['members'])): ?>
                                <?php foreach ($members['members'] as $member): ?>
                                    <div class="grid grid-cols-12 p-4 border-b last:border-0 hover:bg-gray-50">
                                        <div class="col-span-1"><?php echo $member['id']; ?></div>
                                        <div class="col-span-4"><?php echo $member['name']; ?></div>
                                        <div class="col-span-4"><?php echo $member['email']; ?></div>
                                        <div class="col-span-2"><?php echo $member['joined']; ?></div>
                                        <div class="col-span-1">
                                            <span class="inline-block px-2 py-1 rounded-full text-xs <?php echo $member['status'] === 'active' ? 'status-active' : 'status-inactive'; ?>">
                                                <?php echo $member['status']; ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="p-4 text-center text-gray-500">No member data available</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Member Actions -->
                <div>
                    <div class="card p-4">
                        <div class="mb-3">
                            <h3 class="text-lg font-medium">Member Actions</h3>
                            <p class="text-sm text-gray-500">Manage church members</p>
                        </div>
                        <div class="flex gap-4">
                            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded transition-colors">
                                Add New Member
                            </button>
                            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded transition-colors">
                                Export Member List
                            </button>
                            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded transition-colors">
                                Send Group Email
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
