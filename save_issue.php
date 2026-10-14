<?php
header('Content-Type: application/json');

// Database configuration
$host = 'localhost';
$dbname = 'fqckxrbk_vishalbro';
$username = 'fqckxrbk_vishalbro';
$password = 'fqckxrbk_vishalbro';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents('php://input'), true);
    
    $stmt = $conn->prepare("INSERT INTO support_issues 
        (mobile, issue_type, title, details, status, created_at)
        VALUES (:mobile, :issue_type, :title, :details, 'pending', NOW())");
    
    $stmt->bindParam(':mobile', $data['mobile']);
    $stmt->bindParam(':issue_type', $data['type']);
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':details', $data['details']);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>