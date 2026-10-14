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
        // Demo mode response with sample data
        echo json_encode([
            'success' => true,
            'issues' => [
                [
                    'id' => 'ISSUE-2023-001',
                    'title' => 'Withdrawal Issue',
                    'type' => 'withdrawal',
                    'date' => date('Y-m-d'),
                    'status' => 'pending',
                    'details' => 'Withdrawal of ₹5000 not processed',
                    'response' => 'Being reviewed by finance team'
                ]
            ]
        ]);
        exit;
    }

    // Live mode - get issues from database (you'll need to create this table)
    $stmt = $conn->prepare("SELECT * FROM support_issues WHERE mobile = :mobile ORDER BY created_at DESC");
    $stmt->bindParam(':mobile', $mobile);
    $stmt->execute();

    $issues = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($issues) > 0) {
        echo json_encode([
            'success' => true,
            'issues' => $issues
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No issues found for this number'
        ]);
    }
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>