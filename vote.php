<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$bannerDir = 'banners/';
$response = ['success' => false, 'message' => '', 'votes' => 0];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $banner = $_POST['banner'] ?? '';
    $voteType = $_POST['type'] ?? '';  // 'up' or 'down'
    
    if (empty($banner) || !in_array($voteType, ['up', 'down'])) {
        $response['message'] = 'Invalid request';
        echo json_encode($response);
        exit;
    }

    $jsonFile = $bannerDir . $banner . '.json';
    
    if (!file_exists($jsonFile)) {
        $response['message'] = 'Banner not found';
        echo json_encode($response);
        exit;
    }

    // Read current data
    $data = json_decode(file_get_contents($jsonFile), true);
    
    // Initialize votes if they don't exist
    if (!isset($data['votes'])) {
        $data['votes'] = 0;
    }

    // Update votes
    $data['votes'] += ($voteType === 'up') ? 1 : -1;
    
    // Save updated data
    if (file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT))) {
        $response['success'] = true;
        $response['votes'] = $data['votes'];
        $response['message'] = 'Vote recorded successfully';
    } else {
        $response['message'] = 'Failed to save vote';
    }
}

echo json_encode($response);
?>