<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Maintenance Mode | 56LOTTERY</title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    :root {
      --primary: #e63946;
      --primary-dark: #d90429;
      --secondary: #3a86ff;
      --secondary-dark: #2667cc;
      --light: #f8f9fa;
      --dark: #212529;
      --success: #2a9d8f;
      --warning: #f4a261;
      --danger: #e63946;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Barlow', sans-serif;
      background-color: var(--light);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: var(--dark);
      overflow-x: hidden;
      width: 100%;
      max-width: 420px;
      margin: 0 auto;
      padding: 1rem;
    }

    .brand-header {
      position: absolute;
      top: 1.5rem;
      left: 0;
      width: 100%;
      text-align: center;
      z-index: 10;
    }

    .brand-name {
      font-size: 1.8rem;
      font-weight: 700;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: 1px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .maintenance-container {
      width: 100%;
      padding: 2rem 1rem;
      animation: fadeIn 0.8s ease-out;
      margin-top: 3rem;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animation-container { display: none;
      width: 220px;
      height: 220px;
      margin: 0 auto 1.5rem;
    }

    .status-container {
      display: none;
      flex-direction: column;
      gap: 0.75rem;
      margin-bottom: 1.5rem;
      width: 100%;
    }

    .status-badge {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0.75rem 1.25rem;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.9rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .status-maintenance {
      background-color: rgba(230, 57, 70, 0.1);
      color: var(--primary);
      border: 2px solid var(--primary);
      animation: pulse 2s infinite;
    }

    .status-maintenance.inactive {
      background-color: rgba(42, 157, 143, 0.1);
      color: var(--success);
      border: 2px solid var(--success);
      animation: none;
    }

    .status-db { display: none;
      background-color: rgba(58, 134, 255, 0.1);
      color: var(--secondary);
      border: 2px solid var(--secondary);
    }

    .status-db.error {
      background-color: rgba(230, 57, 70, 0.1);
      color: var(--danger);
      border: 2px solid var(--danger);
      animation: pulse 1.5s infinite;
    }

    h1 {
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 1.25rem;
      color: var(--dark);
      line-height: 1.3;
    }

    .admin-message-section {
      background-color: white;
      border-radius: 12px;
      padding: 2rem 1.5rem 1.5rem;
      margin: 2rem 0;
      text-align: center;
      position: relative;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
      animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .section-header {
      position: absolute;
      top: -16px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      color: white;
      padding: 0.5rem 1.5rem;
      border-radius: 8px;
      font-size: 0.85rem;
      font-weight: 600;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      gap: 0.5rem;
      letter-spacing: 0.5px;
    }

    .section-header i {
      font-size: 0.9rem;
    }

    .message-content {
      font-size: 1rem;
      line-height: 1.6;
      color: var(--dark);
      text-align: center;
      padding: 0.5rem 0;
    }

    .support-btn {
      display: inline-flex;
      align-items: center;
      padding: 0.8rem 2rem;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      margin-top: 1.5rem;
      transition: all 0.3s;
      box-shadow: 0 4px 12px rgba(58, 134, 255, 0.25);
      font-size: 1rem;
      letter-spacing: 0.5px;
      border: none;
      cursor: pointer;
    }

    .support-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(58, 134, 255, 0.35);
    }

    .support-btn i {
      margin-right: 0.75rem;
      font-size: 1rem;
    }

    .contact-info {
      margin-top: 2rem;
      font-size: 0.9rem;
      color: #6c757d;
      line-height: 1.5;
    }

    .contact-info strong {
      color: var(--dark);
      font-weight: 600;
    }

    .floating-support {
      position: fixed;
      bottom: 1.5rem;
      right: 1.5rem;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      z-index: 100;
      transition: all 0.3s;
      animation: pulse 2s infinite;
      font-size: 1.5rem;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.4);
      }
      70% {
        transform: scale(1.05);
        box-shadow: 0 0 0 12px rgba(230, 57, 70, 0);
      }
      100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(230, 57, 70, 0);
      }
    }

    .floating-support:hover {
      transform: scale(1.1) translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .status-icon {
      margin-right: 0.75rem;
      font-size: 1rem;
    }

    .progress-container {
      width: 100%;
      background-color: #e9ecef;
      border-radius: 8px;
      margin: 1.5rem 0;
      height: 12px;
      overflow: hidden;
    }

    .progress-bar {
      height: 100%;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      border-radius: 8px;
      width: 65%;
      animation: progressAnimation 2s ease-in-out infinite;
    }

    @keyframes progressAnimation {
      0% {
        width: 65%;
      }
      50% {
        width: 70%;
      }
      100% {
        width: 65%;
      }
    }

    .time-estimate {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-top: 0.5rem;
      font-size: 0.85rem;
      color: #6c757d;
    }
  </style>
</head>
<body>
<?php
$conn = mysqli_connect('localhost', 'fqckxrbk_vishalbro', 'fqckxrbk_vishalbro', 'fqckxrbk_vishalbro');
$dbStatus = 'connected';
if (!$conn) {
    $dbStatus = 'error';
    $dbError = "Database connection failed: " . mysqli_connect_error();
}
date_default_timezone_set("Asia/Kolkata");
$maintenanceStatus = 'active'; // Forced to active for demo
$maintenanceMessage = 'We are currently performing an extended system upgrade to enhance your gaming experience. This maintenance is expected to last several hours as we implement new features and improve server performance. All game data will be preserved. Thank you for your patience and understanding.';
$telegramLink = '#';

if ($conn) {
    $maintenanceQuery = "SELECT status, message FROM maintenance WHERE id = 1";
    $maintenanceResult = mysqli_query($conn, $maintenanceQuery);
    if ($maintenanceResult && mysqli_num_rows($maintenanceResult) > 0) {
        $maintenanceData = mysqli_fetch_assoc($maintenanceResult);
        $maintenanceStatus = $maintenanceData['status'];
        $maintenanceMessage = $maintenanceData['message'] ?? $maintenanceMessage;
    }

    $telegramQuery = "SELECT value FROM telegramme WHERE status = 1 LIMIT 1";
    $telegramResult = mysqli_query($conn, $telegramQuery);
    if ($telegramResult && mysqli_num_rows($telegramResult) > 0) {
        $telegramLink = mysqli_fetch_assoc($telegramResult)['value'];
    }
}

//For demo purposes, we'll override to show maintenance page
 if ($maintenanceStatus !== 'active') {
  header("Location: https://56lottery.site");
   exit();
 }

// Calculate extended maintenance times
$startTime = time();
$endTime = $startTime + (6 * 3600); // 6 hours from now
$currentProgress = min(100, max(5, ((time() - $startTime) / ($endTime - $startTime)) * 100));
?>

  <div class="brand-header">
    <div class="brand-name">56LOTTERY</div>
  </div>

  <div class="maintenance-container maintenance-active">
   <div class="animation-container"> 
   


<lottie-player
  src="https://assets4.lottiefiles.com/private_files/lf30_pCprzRYjOo.json"
  background="transparent"
  speed="1"
  loop
  autoplay>
</lottie-player> 
 
       </div>

    <div class="status-container">
      <div class="status-badge status-maintenance <?php echo $maintenanceStatus === 'active' ? '' : 'inactive'; ?>">
        <i class="fas fa-tools status-icon"></i>
        <?php echo $maintenanceStatus === 'active' ? 'EXTENDED MAINTENANCE' : 'MAINTENANCE INACTIVE'; ?>
      </div>
      <div class="status-badge status-db <?php echo $dbStatus === 'connected' ? '' : 'error'; ?>">
        <i class="fas fa-database status-icon"></i>
        <?php echo $dbStatus === 'connected' ? 'DATABASE CONNECTED' : 'DATABASE ERROR'; ?>
      </div>
    </div>

    <h1>System Upgrade in Progress</h1>

    <div class="progress-container">
      <div class="progress-bar" style="width: <?php echo $currentProgress; ?>%"></div>
    </div>

    <div class="time-estimate">
      <span><?php echo date('h:i A', $startTime); ?></span>
      <span>Estimated Completion: <?php echo date('h:i A', $endTime); ?></span>
    </div>

    <div class="admin-message-section">
      <div class="section-header">
        <i class="fas fa-bullhorn"></i>
        IMPORTANT NOTICE
      </div>
      <div class="message-content">
        <?php echo nl2br(htmlspecialchars($maintenanceMessage)); ?>
      </div>
    </div>

    <p style="font-size: 1rem; color: #495057;">We're working hard to bring you an improved gaming experience. Thank you for your patience.</p>

    <a href="<?php echo $telegramLink; ?>" class="support-btn" target="_blank">
      <i class="fab fa-telegram-plane"></i> GET SUPPORT
    </a>

    <div class="contact-info">
      <strong>Need immediate assistance?</strong><br>
      Contact our support team via Telegram for updates.
    </div>
  </div>

  <a href="<?php echo $telegramLink; ?>" class="floating-support" target="_blank" title="24/7 Telegram Support">
    <i class="fab fa-telegram-plane"></i>
  </a>

  <script>
    // Check maintenance status every 10 seconds
    setInterval(() => {
      fetch(window.location.href)
        .then(response => response.text())
        .then(html => {
          if (!html.includes('maintenance-active')) {
            window.location.href = 'index.php';
          }
        })
        .catch(() => {
          console.log('Status check failed');
        });
    }, 10000);

    // Animate progress bar
    const progressBar = document.querySelector('.progress-bar');
    let progress = <?php echo $currentProgress; ?>;
    const animateProgress = () => {
      progress += 0.1;
      if (progress > 100) progress = 5;
      progressBar.style.width = `${progress}%`;
      requestAnimationFrame(animateProgress);
    };
    // animateProgress();
  </script>
</body>
</html>