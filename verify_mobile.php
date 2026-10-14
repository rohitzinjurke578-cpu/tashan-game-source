<?php
header('Content-Type: application/json');

// Database configuration
$host = 'localhost';
$dbname = 'fqckxrbk_vishalbro';
$username = 'fqckxrbk_vishalbro';
$password = 'fqckxrbk_vishalbro';

// Set to true for production
$mode = 'live'; // 'demo' or 'live'

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mobile = $_POST['mobile'] ?? '';

    if ($mode === 'demo') {
        // Demo mode response
        echo json_encode([
            'success' => true,
            'name' => 'Demo User',
            'mobile' => $mobile
        ]);
        exit;
    }

    // Live mode - check in database
    $stmt = $conn->prepare("SELECT codechorkamukala FROM shonu_subjects WHERE mobile = :mobile LIMIT 1");
    $stmt->bindParam(':mobile', $mobile);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode([
            'success' => true,
            'name' => $user['codechorkamukala'],
            'mobile' => $mobile
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Mobile number not registered'
        ]);
    }
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>