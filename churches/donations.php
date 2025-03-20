<?php
include_once 'connect.php';

// Fetch last 6 months' donations
$query = "SELECT 
            DATE_FORMAT(donation_date, '%Y-%m') AS month,
            SUM(donation_amount) AS total_donation
          FROM donations 
          GROUP BY month 
          ORDER BY month DESC 
          LIMIT 6";
$result = mysqli_query($conn, $query);

$donations = [];
$labels = [];
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['month']; // Month Labels
    $donations[] = $row['total_donation']; // Donation Amounts
}

// Reverse order for correct timeline display
$labels = array_reverse($labels);
$donations = array_reverse($donations);

// Calculate Increase or Decrease
$last_month = isset($donations[count($donations) - 2]) ? $donations[count($donations) - 2] : 0;
$current_month = isset($donations[count($donations) - 1]) ? $donations[count($donations) - 1] : 0;
$change = $last_month ? round((($current_month - $last_month) / $last_month) * 100, 2) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Donations</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for Graph -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Monthly Donation Summary</h1>

        <!-- Donations Graph -->
        <div class="bg-white p-6 shadow-md rounded-lg">
            <canvas id="donationChart"></canvas>
        </div>

        <!-- Donation Summary Table -->
        <div class="mt-6 bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-lg font-bold mb-4">Donation Summary</h2>
            <table class="w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-3 px-4">Month</th>
                        <th class="py-3 px-4">Donation Amount (KSH)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_reverse($donations) as $index => $amount): ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-2 px-4"><?php echo htmlspecialchars($labels[$index]); ?></td>
                            <td class="py-2 px-4"><?php echo number_format($amount); ?> KSH</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Increase or Decrease Indicator -->
            <p class="mt-4 text-center font-bold 
                <?php echo ($change >= 0) ? 'text-green-600' : 'text-red-600'; ?>">
                <?php echo ($change >= 0) ? "↑ Increase" : "↓ Decrease"; ?> of <?php echo abs($change); ?>% compared to last month.
            </p>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        const ctx = document.getElementById('donationChart').getContext('2d');
        const donationChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Monthly Donations (KSH)',
                    data: <?php echo json_encode($donations); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
