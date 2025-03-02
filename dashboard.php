<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Dashboard</title>
    <!-- Tailwind CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom CSS for the dashboard */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            background-color: #1e293b;
            color: #f8fafc;
            height: 100vh;
            transition: width 0.3s ease;
            overflow-y: auto;
        }

        .sidebar a {
            color: #cbd5e1;
            transition: all 0.2s ease;
        }

        .sidebar a:hover {
            background-color: #334155;
            color: #f8fafc;
        }

        .sidebar-active {
            background-color: #334155;
            color: #f8fafc;
        }

        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        .card:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }

        .stats-card {
            min-height: 120px;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
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
                        <a href="#" class="flex items-center p-2 rounded sidebar-active">
                            <i class="fas fa-th-large"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded hover:bg-sidebar-accent">
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
                <h1 class="text-xl font-bold">Dashboard</h1>
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
                <!-- Stats Cards -->
                <div id="stats-container" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 mb-6">
                    <!-- Members Stats -->
                    <div class="card stats-card p-4">
                        <div class="flex flex-row items-center justify-between pb-2">
                            <h3 class="text-sm font-medium text-gray-500">Total Members</h3>
                            <i class="fas fa-users text-gray-400 text-sm"></i>
                        </div>
                        <div class="text-2xl font-bold"><?php echo $members['total'] ?? '256'; ?></div>
                        <p class="text-xs text-gray-500 mt-1">
                            <?php echo ($members['new_this_month'] ?? '12') . ' new this month'; ?>
                        </p>
                    </div>

                    <!-- Events Stats -->
                    <div class="card stats-card p-4">
                        <div class="flex flex-row items-center justify-between pb-2">
                            <h3 class="text-sm font-medium text-gray-500">Upcoming Events</h3>
                            <i class="fas fa-calendar text-gray-400 text-sm"></i>
                        </div>
                        <div class="text-2xl font-bold"><?php echo $events['total_upcoming'] ?? '8'; ?></div>
                        <p class="text-xs text-gray-500 mt-1">
                            Next: <?php echo $events['upcoming'][0]['name'] ?? 'Sunday Service'; ?>
                        </p>
                    </div>

                    <!-- Donations Stats -->
                    <div class="card stats-card p-4">
                        <div class="flex flex-row items-center justify-between pb-2">
                            <h3 class="text-sm font-medium text-gray-500">Donations</h3>
                            <i class="fas fa-money-bill-alt text-gray-400 text-sm"></i>
                        </div>
                        <div class="text-2xl font-bold">$<?php echo number_format($donations['current_month'] ?? 12580); ?></div>
                        <p class="text-xs text-gray-500 mt-1">
                            Last month: $<?php echo number_format($donations['last_month'] ?? 10890); ?>
                        </p>
                    </div>

                    <!-- Prayer Requests Stats -->
                    <div class="card stats-card p-4">
                        <div class="flex flex-row items-center justify-between pb-2">
                            <h3 class="text-sm font-medium text-gray-500">Prayer Requests</h3>
                            <i class="fas fa-praying-hands text-gray-400 text-sm"></i>
                        </div>
                        <div class="text-2xl font-bold"><?php echo $prayerRequests['total'] ?? '34'; ?></div>
                        <p class="text-xs text-gray-500 mt-1">
                            <?php echo ($prayerRequests['new_this_week'] ?? '6') . ' new this week'; ?>
                        </p>
                    </div>
                </div>

                <!-- Events and Memory Verse -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 mb-6">
                    <!-- Recent Events -->
                    <div class="card p-4">
                        <div class="mb-3">
                            <h3 class="text-lg font-medium">Recent Events</h3>
                            <p class="text-sm text-gray-500">View attendance and details</p>
                        </div>
                        <div class="space-y-4">
                            <?php if (isset($events['recent']) && is_array($events['recent'])): ?>
                                <?php foreach ($events['recent'] as $event): ?>
                                    <div class="flex items-center justify-between border-b pb-3 last:border-0 last:pb-0">
                                        <div>
                                            <p class="font-medium"><?php echo $event['name']; ?></p>
                                            <p class="text-sm text-gray-500"><?php echo $event['date']; ?></p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm"><?php echo $event['attendees']; ?> attendees</span>
                                            <i class="fas fa-users text-gray-400 text-sm"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="flex items-center justify-between border-b pb-3">
                                    <div>
                                        <p class="font-medium">Sunday Service</p>
                                        <p class="text-sm text-gray-500">Dec 10, 9:00 AM</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm">178 attendees</span>
                                        <i class="fas fa-users text-gray-400 text-sm"></i>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between border-b pb-3">
                                    <div>
                                        <p class="font-medium">Bible Study</p>
                                        <p class="text-sm text-gray-500">Dec 7, 7:00 PM</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm">45 attendees</span>
                                        <i class="fas fa-users text-gray-400 text-sm"></i>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between border-b pb-3">
                                    <div>
                                        <p class="font-medium">Youth Group</p>
                                        <p class="text-sm text-gray-500">Dec 5, 6:30 PM</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm">38 attendees</span>
                                        <i class="fas fa-users text-gray-400 text-sm"></i>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium">Choir Practice</p>
                                        <p class="text-sm text-gray-500">Dec 4, 7:30 PM</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm">22 attendees</span>
                                        <i class="fas fa-users text-gray-400 text-sm"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="card p-4">
                        <div class="mb-3">
                            <h3 class="text-lg font-medium">Upcoming Events</h3>
                            <p class="text-sm text-gray-500">Events in the next 2 weeks</p>
                        </div>
                        <div class="space-y-4">
                            <?php if (isset($events['upcoming']) && is_array($events['upcoming'])): ?>
                                <?php foreach ($events['upcoming'] as $event): ?>
                                    <div class="flex items-center justify-between border-b pb-3 last:border-0 last:pb-0">
                                        <div>
                                            <p class="font-medium"><?php echo $event['name']; ?></p>
                                            <p class="text-sm text-gray-500"><?php echo $event['date']; ?></p>
                                        </div>
                                        <div class="text-sm text-right">
                                            <p><?php echo $event['location']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="flex items-center justify-between border-b pb-3">
                                    <div>
                                        <p class="font-medium">Sunday Service</p>
                                        <p class="text-sm text-gray-500">Dec 17, 9:00 AM</p>
                                    </div>
                                    <div class="text-sm text-right">
                                        <p>Main Sanctuary</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between border-b pb-3">
                                    <div>
                                        <p class="font-medium">Christmas Choir</p>
                                        <p class="text-sm text-gray-500">Dec 18, 6:00 PM</p>
                                    </div>
                                    <div class="text-sm text-right">
                                        <p>Choir Room</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between border-b pb-3">
                                    <div>
                                        <p class="font-medium">Volunteer Meeting</p>
                                        <p class="text-sm text-gray-500">Dec 20, 7:00 PM</p>
                                    </div>
                                    <div class="text-sm text-right">
                                        <p>Fellowship Hall</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium">Christmas Eve Service</p>
                                        <p class="text-sm text-gray-500">Dec 24, 10:00 PM</p>
                                    </div>
                                    <div class="text-sm text-right">
                                        <p>Main Sanctuary</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <button class="w-full py-2 px-4 bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-medium flex items-center justify-center">
                                <i class="fas fa-calendar mr-2"></i>
                                View Full Calendar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Memory Verse Section -->
                <div class="card p-4 mb-6">
                    <div class="mb-3">
                        <h3 class="text-lg font-medium">Memory Verse of the Day</h3>
                    </div>
                    <div class="p-4 bg-gray-100 rounded-lg italic text-center">
                        "<?php echo $verseInfo['verse'] ?? 'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life. - John 3:16'; ?>"
                    </div>
                </div>

                <!-- Weekly Overview Chart Section -->
                <div class="card p-4">
                    <div class="mb-3">
                        <h3 class="text-lg font-medium">Weekly Overview</h3>
                        <p class="text-sm text-gray-500">Activity summary for the past week</p>
                    </div>
                    <div class="h-[200px] flex items-center justify-center border rounded-md bg-gray-100">
                        <p class="text-gray-500">Chart data will be displayed here</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between">
                        <button class="py-2 px-4 bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-medium">
                            Previous Week
                        </button>
                        <button class="py-2 px-4 bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-medium">
                            Next Week
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript for interactive features -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar functionality
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            let sidebarOpen = true;

            toggleSidebar.addEventListener('click', function() {
                if (sidebarOpen) {
                    sidebar.classList.remove('w-64');
                    sidebar.classList.add('w-20');
                    
                    // Hide text in sidebar links
                    const sidebarText = document.querySelectorAll('#sidebar span');
                    sidebarText.forEach(span => {
                        span.style.display = 'none';
                    });
                    
                    // Change icon
                    toggleSidebar.innerHTML = '<i class="fas fa-chevron-right"></i>';
                } else {
                    sidebar.classList.remove('w-20');
                    sidebar.classList.add('w-64');
                    
                    // Show text in sidebar links
                    const sidebarText = document.querySelectorAll('#sidebar span');
                    sidebarText.forEach(span => {
                        span.style.display = 'inline';
                    });
                    
                    // Change icon
                    toggleSidebar.innerHTML = '<i class="fas fa-chevron-left"></i>';
                }
                
                sidebarOpen = !sidebarOpen;
            });
        });
    </script>
</body>
</html>