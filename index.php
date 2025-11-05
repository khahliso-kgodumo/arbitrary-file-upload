<!DOCTYPE html>
<html>
<head>
    <title>Image Upload - Vulnerable Demo</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .container { background: #f5f5f5; padding: 20px; border-radius: 8px; }
        .warning { background: #ffe6e6; border: 1px solid #ffcccc; padding: 10px; margin: 10px 0; }
        .upload-form { margin: 20px 0; }
        .file-list { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Image Upload Demo</h1>
        
        <div class="warning">
            <strong>Educational Purpose Only:</strong> This demonstrates an arbitrary file upload vulnerability.
            In production, you should always validate file types and restrict uploads.
        </div>

        <div class="upload-form">
            <h3>Upload an Image</h3>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" required>
                <br><br>
                <input type="submit" value="Upload File">
            </form>
        </div>

        <div class="file-list">
            <h3>Uploaded Files</h3>
            <?php
            // List uploaded files
            $upload_dir = 'uploads/';
            if (is_dir($upload_dir)) {
                $files = scandir($upload_dir);
                foreach ($files as $file) {
                    if ($file !== '.' && $file !== '..') {
                        echo "<p><a href='$upload_dir$file' target='_blank'>$file</a></p>";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>