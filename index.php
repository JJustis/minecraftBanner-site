<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft Server Banners</title>
    <style>
        :root {
            --minecraft-dark: #1D1F21;
            --minecraft-green: #4AAB4E;
            --minecraft-accent: #5865F2;
            --minecraft-success: #43b581;
            --minecraft-error: #f04747;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
        }

        body {
            background: var(--minecraft-dark);
            color: white;
            line-height: 1.6;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            max-width: calc(100% - 350px);
            padding: 2rem;
        }

        .banner-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .banner-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: all 0.2s ease;
        }

        .banner-card:hover {
            transform: translateY(-5px);
            border-color: var(--minecraft-green);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .banner-image {
            width: 100%;
            height: 100px;
            object-fit: contain;
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .banner-info {
            padding: 1rem;
        }

        .server-name {
            font-size: 1.2rem;
            color: var(--minecraft-green);
            margin-bottom: 0.5rem;
        }

        .description {
            color: #a0a0a0;
            font-size: 0.9rem;
            margin: 0.5rem 0;
        }

        .server-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .stat {
            background: rgba(255, 255, 255, 0.05);
            padding: 0.5rem;
            border-radius: 4px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .button {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            margin-top: 1rem;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }

        .copy-ip {
            background: var(--minecraft-accent);
        }

        .copy-ip:hover {
            background: #4752c4;
        }

        .embed-code {
            background: rgba(0, 0, 0, 0.3);
            padding: 0.5rem;
            border-radius: 4px;
            font-family: monospace;
            font-size: 0.8rem;
            margin-top: 0.5rem;
            word-break: break-all;
            cursor: pointer;
        }

        .sidebar {
            width: 350px;
            background: rgba(255, 255, 255, 0.03);
            border-left: 2px solid rgba(255, 255, 255, 0.1);
            padding: 2rem;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-title {
            font-size: 1.5rem;
            color: var(--minecraft-green);
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            color: var(--minecraft-green);
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            color: white;
        }

        .submit-btn {
            background: var(--minecraft-green);
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background: #3a8a3e;
        }

        .file-upload {
            border: 2px dashed rgba(255, 255, 255, 0.2);
            padding: 2rem;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            margin: 1rem 0;
            transition: all 0.2s ease;
        }

        .file-upload:hover {
            border-color: var(--minecraft-green);
            background: rgba(74, 171, 78, 0.1);
        }

        #image-preview {
            max-width: 100%;
            display: none;
            margin-top: 1rem;
            border-radius: 4px;
        }

        .requirements {
            background: rgba(255, 255, 255, 0.05);
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .requirements ul {
            list-style-type: none;
            margin-top: 0.5rem;
        }

        .requirements li {
            margin: 0.5rem 0;
            color: #a0a0a0;
        }

        .requirements li::before {
            content: "•";
            color: var(--minecraft-green);
            margin-right: 0.5rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 0.3s ease;
        }
		.vote-buttons {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
}

.vote-btn {
    flex: 1;
    padding: 0.5rem;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.vote-up {
    background: var(--minecraft-green);
}

.vote-down {
    background: var(--minecraft-error);
}

.vote-count {
    background: rgba(255, 255, 255, 0.05);
    padding: 0.5rem;
    border-radius: 4px;
    text-align: center;
    min-width: 70px;
}

.vote-btn:hover {
    filter: brightness(1.1);
}

.vote-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="main-content">
            <div class="banner-grid">
                <?php
                $bannerDir = 'banners/';
                
                if (!file_exists($bannerDir)) {
                    mkdir($bannerDir, 0777, true);
                }

                $banners = glob($bannerDir . '*.{png,gif,jpg,jpeg}', GLOB_BRACE) ?: [];

                if (empty($banners)) {
                    echo '<div style="text-align: center; padding: 3rem; color: #a0a0a0;">No banners yet. Be the first to add one!</div>';
                } else {
                    foreach ($banners as $banner) {
                        $baseFileName = pathinfo($banner, PATHINFO_FILENAME);
                        $jsonFile = $bannerDir . $baseFileName . '.json';
                        
                        $defaultInfo = [
                            'name' => basename($banner),
                            'description' => 'No description available',
                            'ip' => 'Unknown IP',
                            'players' => '0',
                            'version' => 'Unknown'
                        ];

                        $serverInfo = $defaultInfo;
                        if (file_exists($jsonFile)) {
                            $jsonContent = file_get_contents($jsonFile);
                            if ($jsonContent !== false) {
                                $loadedInfo = json_decode($jsonContent, true);
                                if ($loadedInfo !== null) {
                                    $serverInfo = array_merge($defaultInfo, $loadedInfo);
                                }
                            }
                        }

                        $safeIp = htmlspecialchars($serverInfo['ip'], ENT_QUOTES);
                        ?>
                        <div class="banner-card">
                            <img src="<?php echo htmlspecialchars($banner); ?>" 
                                 alt="<?php echo htmlspecialchars($serverInfo['name']); ?>" 
                                 class="banner-image"
                                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 468 60\'%3E%3Crect width=\'100%25\' height=\'100%25\' fill=\'%23333\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' fill=\'%23666\' font-family=\'sans-serif\'%3EImage Not Found%3C/text%3E%3C/svg%3E'">
                            <div class="banner-info">
                                <h3 class="server-name"><?php echo htmlspecialchars($serverInfo['name']); ?></h3>
                                <p class="description"><?php echo htmlspecialchars($serverInfo['description']); ?></p>
                                <div class="server-stats">
                                    <div class="stat">👥 <?php echo htmlspecialchars($serverInfo['players']); ?> Players</div>
                                    <div class="stat">⚡ <?php echo htmlspecialchars($serverInfo['version']); ?></div>
                                </div>
								<div class="vote-buttons">
    <button class="vote-btn vote-up" data-banner="<?php echo $baseFileName; ?>" data-type="up">
        ⬆ Upvote
    </button>
    <div class="vote-count">
        <?php echo isset($serverInfo['votes']) ? $serverInfo['votes'] : '0'; ?> votes
    </div>
    <button class="vote-btn vote-down" data-banner="<?php echo $baseFileName; ?>" data-type="down">
        ⬇ Downvote
    </button>
</div>
                                <button class="button copy-ip" data-ip="<?php echo $safeIp; ?>">Copy IP Address</button>
                                <div class="embed-code" data-embed="&lt;img src=&quot;https://jcmc.serveminecraft.net/banners/<?php echo htmlspecialchars(basename($banner)); ?>&quot; alt=&quot;<?php echo htmlspecialchars($serverInfo['name']); ?>&quot;&gt;">Click to copy embed code</div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="sidebar">
            <h2 class="sidebar-title">Add Your Server</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="server-name">Server Name</label>
                    <input type="text" id="server-name" name="server-name" required maxlength="50" placeholder="My Awesome Server">
                </div>

                <div class="form-group">
                    <label for="server-ip">Server IP</label>
                    <input type="text" id="server-ip" name="server-ip" required maxlength="100" placeholder="play.myserver.com">
                </div>

                <div class="form-group">
                    <label for="server-version">Minecraft Version</label>
                    <input type="text" id="server-version" name="server-version" required maxlength="20" placeholder="1.20.2">
                </div>

                <div class="form-group">
                    <label for="description">Server Description</label>
                    <textarea id="description" name="description" rows="4" required maxlength="500" placeholder="Tell players what makes your server special..."></textarea>
                </div>

                <div class="file-upload">
                    <input type="file" id="banner-image" name="banner-image" accept="image/png,image/jpeg,image/gif" required>
                    <p>Drop your banner here or click to upload</p>
                </div>
                <img id="image-preview" alt="Banner preview">

                <div class="requirements">
                    <strong>Banner Requirements:</strong>
                    <ul>
                        <li>468x60 pixels recommended size</li>
                        <li>Max file size: 2MB</li>
                        <li>PNG, JPG, or GIF formats</li>
                        <li>Must be family-friendly</li>
                    </ul>
                </div>

                <button type="submit" class="button submit-btn">Add Server Banner</button>
            </form>
        </div>
    </div>

    <script>
        // Copy functionality
        document.querySelectorAll('.copy-ip').forEach(button => {
            button.addEventListener('click', function() {
                const ip = this.dataset.ip;
                copyToClipboard(ip, this, 'IP Copied!', 'Copy IP Address');
            });
        });

        document.querySelectorAll('.embed-code').forEach(element => {
            element.addEventListener('click', function() {
                const embedCode = this.dataset.embed;
                copyToClipboard(embedCode, this, 'Embed code copied!', 'Click to copy embed code');
            });
        });

        function copyToClipboard(text, element, successMessage, originalMessage) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';  // Avoid scrolling
            document.body.appendChild(textarea);
            textarea.select();
            
            try {
                document.execCommand('copy');
                element.textContent = successMessage;
                element.style.background = 'var(--minecraft-success)';
                setTimeout(() => {
                    element.textContent = originalMessage;
                    element.style.background = element.classList.contains('copy-ip') ? 
                        'var(--minecraft-accent)' : 'rgba(0, 0, 0, 0.3)';
                }, 1500);
            } catch (err) {
                element.textContent = 'Failed to copy';
                element.style.background = 'var(--minecraft-error)';
                setTimeout(() => {
                    element.textContent = originalMessage;
                    element.style.background = element.classList.contains('copy-ip') ? 
                        'var(--minecraft-accent)' : 'rgba(0, 0, 0, 0.3)';
                }, 1500);
            }
            
            document.body.removeChild(textarea);
        }

        // File upload preview
        const fileInput = document.getElementById('banner-image');
        const preview = document.getElementById('image-preview');
        const dropZone = document.querySelector('.file-upload');

        fileInput.addEventListener('change', handleFileSelect);

        function handleFileSelect(e) {
            const file = e.target.files[0];
            if (!file) return;

            if (file.size > 2 * 1024 * 1024) {
                alert('File is too large. Maximum size is 2MB.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';

                // Check dimensions
                const img = new Image();
                img.onload = function() {
                    if (this.width !== 468 || this.height !== 60) {
                        alert('Warning: Recommended banner size is 468x60 pixels. Your image may be resized.');
                    }
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        // Drag and drop handling
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
            dropZone.addEventListener(event, preventDefault);
        });

        function preventDefault(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        dropZone.addEventListener('dragenter', highlight);
        dropZone.addEventListener('dragover', highlight);
        dropZone.addEventListener('dragleave', unhighlight);
        dropZone.addEventListener('drop', handleDrop);

        function highlight(e) {
            dropZone.style.borderColor = 'var(--minecraft-green)';
            dropZone.style.background = 'rgba(74, 171, 78, 0.1)';
        }

        function unhighlight(e) {
            dropZone.style.borderColor = 'rgba(255, 255, 255, 0.2)';
            dropZone.style.background = 'transparent';
        }

        function handleDrop(e) {
            unhighlight(e);
            const dt = e.dataTransfer;
            const file = dt.files[0];
            
            if (file) {
                fileInput.files = dt.files;
                handleFileSelect({ target: { files: dt.files } });
            }
        }
		// Voting functionality
document.querySelectorAll('.vote-btn').forEach(button => {
    button.addEventListener('click', handleVote);
});

function handleVote(e) {
    const button = e.currentTarget;
    const banner = button.dataset.banner;
    const voteType = button.dataset.type;
    const voteCount = button.closest('.vote-buttons').querySelector('.vote-count');
    
    // Disable buttons during vote
    const buttons = button.closest('.vote-buttons').querySelectorAll('.vote-btn');
    buttons.forEach(btn => btn.disabled = true);

    // Send vote to server
    const formData = new FormData();
    formData.append('banner', banner);
    formData.append('type', voteType);

    fetch('vote.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            voteCount.textContent = `${data.votes} votes`;
            // Add animation
            voteCount.style.transform = 'scale(1.1)';
            setTimeout(() => {
                voteCount.style.transform = 'scale(1)';
            }, 200);
        } else {
            alert('Failed to vote: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to vote. Please try again.');
    })
    .finally(() => {
        // Re-enable buttons
        buttons.forEach(btn => btn.disabled = false);
    });
}
    </script>
</body>
</html>