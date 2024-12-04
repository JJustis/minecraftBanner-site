<?php
header('Content-Type: application/json');

$uploadDir = 'banners/';
$maxFileSize = 2 * 1024 * 1024; // 2MB

// Create upload directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

try {
    // Validate file
    if (!isset($_FILES['banner-image'])) {
        throw new Exception('No file uploaded');
    }

    $file = $_FILES['banner-image'];
    
    // Check file size
    if ($file['size'] > $maxFileSize) {
        throw new Exception('File too large (max 2MB)');
    }

    // Check file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        throw new Exception('Invalid file type');
    }

    // Generate safe filename
    $filename = preg_replace('/[^a-z0-9-_]/i', '', $_POST['server-name']);
    $filename = strtolower($filename);
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $imagePath = $uploadDir . $filename . '.' . $ext;
    
    // Save image
    if (!move_uploaded_file($file['tmp_name'], $imagePath)) {
        throw new Exception('Failed to save file');
    }

    // Create server info JSON
    $serverInfo = [
        'name' => $_POST['server-name'],
        'ip' => $_POST['server-ip'],
        'version' => $_POST['server-version'],
        'description' => $_POST['description'],
        'players' => '0', // Default value
        'added' => date('Y-m-d H:i:s')
    ];

    $jsonPath = $uploadDir . $filename . '.json';
    if (!file_put_contents($jsonPath, json_encode($serverInfo, JSON_PRETTY_PRINT))) {
        throw new Exception('Failed to save server info');
    }

    echo json_encode([
        'success' => true,
        'message' => 'Server banner added successfully!'
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
