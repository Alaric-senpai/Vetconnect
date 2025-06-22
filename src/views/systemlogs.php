<?php
require_once __DIR__ . '/../../config/config.php';

// Get basic host and PHP info
$hostname = gethostname();
$server_ip = $_SERVER['SERVER_ADDR'] ?? gethostbyname($hostname);
$php_version = phpversion();
$os = php_uname();
$loaded_extensions = implode(', ', get_loaded_extensions());
$memory_usage = round(memory_get_usage(true) / 1024 / 1024, 2);
$peak_memory = round(memory_get_peak_usage(true) / 1024 / 1024, 2);
$uptime = @file_get_contents('/proc/uptime');
$uptime_seconds = $uptime ? floor((float)explode(" ", $uptime)[0]) : 0;
$uptime_string = gmdate("H:i:s", $uptime_seconds);

// Database check
$db_status = 'unknown';
$db_active_connections = 'N/A';
try {
    global $db;
    $stmt = $db->query("SELECT 1");
    $db_status = $stmt ? 'connected' : 'not connected';

    $connResult = $db->query("SHOW STATUS WHERE `variable_name` = 'Threads_connected'");
    $row = $connResult->fetch_assoc();
    $db_active_connections = $row['Value'] ?? 'N/A';
} catch (Exception $e) {
    $db_status = 'error';
    $db_active_connections = 'N/A';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>System Info - VetConnect</title>
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <?php require_once __DIR__ . '/../shared/miniheader.php'; ?>

  <div class="max-w-5xl mx-auto bg-white p-8 shadow rounded-xl border border-gray-300">
    <h2 class="text-3xl font-bold text-blue-800 mb-6">System Information</h2>

    <div class="grid md:grid-cols-2 gap-6 text-sm text-gray-700">
      <div>
        <h3 class="text-xl font-semibold text-blue-600 mb-2">Server Details</h3>
        <ul class="space-y-1">
          <li><strong>Hostname:</strong> <?= htmlspecialchars($hostname) ?></li>
          <li><strong>Server IP:</strong> <?= htmlspecialchars($server_ip) ?></li>
          <li><strong>Operating System:</strong> <?= htmlspecialchars($os) ?></li>
          <li><strong>PHP Version:</strong> <?= htmlspecialchars($php_version) ?></li>
          <li><strong>Loaded Extensions:</strong> <?= $loaded_extensions ?></li>
        </ul>
      </div>

      <div>
        <h3 class="text-xl font-semibold text-blue-600 mb-2">Performance</h3>
        <ul class="space-y-1">
          <li><strong>Memory Usage:</strong> <?= $memory_usage ?> MB</li>
          <li><strong>Peak Memory Usage:</strong> <?= $peak_memory ?> MB</li>
          <li><strong>Uptime:</strong> <?= $uptime_string ?></li>
        </ul>
      </div>

      <div>
        <h3 class="text-xl font-semibold text-blue-600 mb-2">Database Status</h3>
        <ul class="space-y-1">
          <li><strong>Connection Status:</strong> <span class="<?= $db_status === 'connected' ? 'text-green-600' : 'text-red-600' ?>"><?= $db_status ?></span></li>
          <li><strong>Active Connections:</strong> <?= $db_active_connections ?></li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>
