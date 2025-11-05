<?php
// VULNERABLE FILE UPLOAD SCRIPT
// This demonstrates what NOT to do in production

$upload_dir = 'uploads/';

// Create uploads directory if it doesn't exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $temp_name = $_FILES['file']['tmp_name'];
    $original_name = $_FILES['file']['name'];
    
    // VULNERABILITY: No file type validation!
    // VULNERABILITY: Using original filename (could contain path traversal)
    // VULNERABILITY: No size limits
    // VULNERABILITY: No virus scanning
    
    $target_path = $upload_dir . $original_name;
    
    if (move_uploaded_file($temp_name, $target_path)) {
        echo "<h2>File uploaded successfully!</h2>";
        echo "<p>File: $original_name</p>";
        echo "<p><a href='$target_path'>View uploaded file</a></p>";
        echo "<p><a href='index.html'>Upload another file</a></p>";
        
        // Log the upload (for educational purposes)
        $log = date('Y-m-d H:i:s') . " - Uploaded: $original_name" . PHP_EOL;
        file_put_contents('upload_log.txt', $log, FILE_APPEND);
    } else {
        echo "<h2>Error uploading file!</h2>";
    }
} else {
    echo "<h2>Upload error: " . $_FILES['file']['error'] . "</h2>";
}
?>