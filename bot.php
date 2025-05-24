<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Code Obfuscator PRO</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary-color: #6c5ce7;
        --primary-dark: #5649c0;
        --secondary-color: #a29bfe;
        --dark-color: #2d3436;
        --light-color: #f5f6fa;
        --success-color: #00b894;
        --danger-color: #d63031;
        --warning-color: #fdcb6e;
        --info-color: #0984e3;
        --border-radius: 12px;
        --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        color: var(--dark-color);
        min-height: 100vh;
    }
    
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 30px auto;
        padding: 30px;
        background-color: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        position: relative;
        overflow: hidden;
    }
    
    .container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 8px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }
    
    h2 {
        text-align: center;
        color: var(--primary-color);
        margin-bottom: 15px;
        font-size: 2.5em;
        font-weight: 800;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }
    
    .tagline {
        text-align: center;
        color: var(--dark-color);
        margin-bottom: 30px;
        font-size: 1.1em;
        position: relative;
    }
    
    .tagline::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        margin: 15px auto;
        border-radius: 3px;
    }
    
    form {
        margin-bottom: 30px;
    }
    
    .input-methods {
        display: flex;
        justify-content: center;
        margin-bottom: 25px;
        background: #f8f9fa;
        border-radius: var(--border-radius);
        padding: 5px;
        position: relative;
    }
    
    .input-method {
        text-align: center;
        padding: 12px 25px;
        border-radius: 8px;
        cursor: pointer;
        transition: var(--transition);
        font-weight: 600;
        color: #555;
        margin: 0 5px;
        flex: 1;
        max-width: 200px;
        position: relative;
        z-index: 1;
    }
    
    .input-method.active {
        color: white;
        background: var(--primary-color);
        box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
    }
    
    .input-method i {
        margin-right: 8px;
    }
    
    .input-container {
        margin-bottom: 20px;
        position: relative;
    }
    
    .tab-content {
        display: none;
        animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .tab-content.active {
        display: block;
    }
    
    textarea {
        width: 100%;
        height: 300px;
        padding: 20px;
        border: 2px solid #e0e0e0;
        border-radius: var(--border-radius);
        resize: none;
        box-sizing: border-box;
        font-family: 'Fira Code', 'Consolas', monospace;
        font-size: 14px;
        transition: var(--transition);
        background: #f8f9fa;
        line-height: 1.6;
        overflow-x: auto;
        white-space: nowrap;
    }
    
    textarea:focus {
        border-color: var(--primary-color);
        outline: none;
        background: white;
        box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
    }
    
    .file-input {
        display: none;
    }
    
    .file-label {
        display: block;
        padding: 40px 20px;
        background-color: #f8f9fa;
        border: 2px dashed #ced4da;
        border-radius: var(--border-radius);
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
    }
    
    .file-label:hover {
        background-color: #e9ecef;
        border-color: var(--primary-color);
    }
    
    .file-label i {
        font-size: 2.5em;
        color: var(--primary-color);
        margin-bottom: 15px;
        display: block;
    }
    
    .file-name {
        margin-top: 15px;
        font-size: 0.95em;
        color: var(--primary-dark);
        font-weight: 600;
    }
    
    .button-group {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 12px 30px;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-size: 1em;
        font-weight: 600;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .btn:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
    }
    
    .btn-clear {
        background-color: var(--danger-color);
    }
    
    .btn-clear:hover {
        background-color: #c0392b;
        box-shadow: 0 5px 15px rgba(214, 48, 49, 0.4);
    }
    
    .btn-telegram {
        background-color: #0088cc;
    }
    
    .btn-telegram:hover {
        background-color: #0077b5;
        box-shadow: 0 5px 15px rgba(0, 136, 204, 0.4);
    }
    
    .btn-whatsapp {
        background-color: #25D366;
    }
    
    .btn-whatsapp:hover {
        background-color: #1da851;
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
    }
    
    .output {
        margin-top: 30px;
        background: #f8f9fa;
        border-radius: var(--border-radius);
        padding: 20px;
        box-shadow: inset 0 0 10px rgba(0,0,0,0.05);
    }
    
    .output-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .output h3 {
        color: var(--primary-color);
        margin: 0;
        font-size: 1.4em;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .output h3 i {
        font-size: 1.2em;
    }
    
    .copy-btn {
        padding: 10px 20px;
        background-color: var(--success-color);
        color: white;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        transition: var(--transition);
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .copy-btn:hover {
        background-color: #00a884;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 184, 148, 0.4);
    }
    
    .copy-btn.copied {
        background-color: var(--success-color);
        animation: pulse 0.5s;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .social-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }
    
    .footer {
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #eee;
        color: #777;
        font-size: 0.9em;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .footer-links {
        display: flex;
        gap: 20px;
        margin-bottom: 10px;
    }
    
    .footer a {
        color: var(--primary-color);
        text-decoration: none;
        transition: var(--transition);
    }
    
    .footer a:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        .container {
            width: 95%;
            padding: 20px;
        }
        
        .input-methods {
            flex-direction: column;
            align-items: stretch;
        }
        
        .input-method {
            margin-bottom: 5px;
            max-width: 100%;
        }
        
        textarea {
            height: 250px;
        }
        
        .button-group {
            flex-direction: column;
            align-items: stretch;
        }
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-dark);
    }
    
    /* Tooltip */
    .tooltip {
        position: relative;
        display: inline-block;
    }
    
    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        transition: opacity 0.3s;
        font-size: 12px;
    }
    
    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }
</style>
</head>
<body>
<div class="container">
    <h2>PHP Code Obfuscator PRO</h2>
    <p class="tagline">Advanced Protection for Your PHP Source Code</p>
    
    <form method="post" action="" enctype="multipart/form-data" id="obfuscator-form">
        <div class="input-methods">
            <div class="input-method active" onclick="switchTab('code-tab')">
                <i class="fas fa-code"></i> Paste Code
            </div>
            <div class="input-method" onclick="switchTab('file-tab')">
                <i class="fas fa-file-upload"></i> Upload File
            </div>
        </div>
        
        <div class="input-container">
            <div id="code-tab" class="tab-content active">
                <textarea name="php_code" id="php_code" placeholder="Enter your PHP code here..." required><?php echo '<?php echo "Hello, world!"; ?>'; ?></textarea>
            </div>
            
            <div id="file-tab" class="tab-content">
                <input type="file" name="php_file" id="php_file" class="file-input" accept=".php">
                <label for="php_file" class="file-label" id="file-label">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span>Choose a PHP file or drag it here</span>
                </label>
                <div id="file-name" class="file-name"></div>
            </div>
        </div>
        
        <div class="button-group">
            <button type="submit" name="obfuscate" class="btn">
                <i class="fas fa-lock"></i> Obfuscate
            </button>
            <button type="button" class="btn btn-clear" onclick="clearCode()">
                <i class="fas fa-trash-alt"></i> Clear
            </button>
        </div>
    </form>
    
    <div class="output">
        <div class="output-header">
            <h3><i class="fas fa-shield-alt"></i> Obfuscated Code</h3>
            <button class="copy-btn" id="copy-btn" onclick="copyToClipboard()">
                <i class="fas fa-copy"></i> Copy Code
            </button>
        </div>
        <textarea id="obfuscated-code" readonly><?php
            /* Obfuscator By SKIBIDIXXX */
            
            function generateRandomInteger($length = 20) {
                $min = (int)pow(10, $length-1);
                $max = (int)pow(10, $length)-1;
                $random_integer = rand($min, $max);
                return abs($random_integer);
            }

            if(isset($_POST['obfuscate'])) {
                $code = '';
                
                // Handle file upload
                if(isset($_FILES['php_file']) && $_FILES['php_file']['error'] == UPLOAD_ERR_OK) {
                    $code = file_get_contents($_FILES['php_file']['tmp_name']);
                } else {
                    $code = $_POST['php_code'];
                }
                
                // Split input code into PHP and HTML sections
                preg_match_all('/(?:<\?php)(.*?)(?:\?>|<\?php|$)/s', $code, $matches);
                $php_sections = $matches[1];
                $html_sections = preg_split('/(?:<\?php)(.*?)(?:\?>|<\?php|$)/s', $code);
                $html_sections = array_map('htmlspecialchars', $html_sections);
                
                // Obfuscate PHP sections
                $obfuscated_php_sections = array();
                foreach ($php_sections as $php_section) {
                    $base64_encoded = base64_encode($php_section);
                    $encryption_key = generateRandomInteger();
                    $encrypted_code = openssl_encrypt($base64_encoded, 'aes-256-cbc', strval($encryption_key), 0, str_repeat(chr(0), 16));
                    $obfuscated_php_sections[] = '<?php /* Obfuscated By SKIBIDIXXX */ $encryption_key = ' . $encryption_key . '; $encrypted_code = "' . $encrypted_code . '"; $decrypted_code = openssl_decrypt($encrypted_code, "aes-256-cbc", strval($encryption_key), 0, str_repeat(chr(0), 16)); eval(base64_decode($decrypted_code)); ?>';
                }
                
                // Combine obfuscated PHP sections with HTML sections
                $output_sections = array();
                for ($i = 0; $i < count($html_sections) + count($obfuscated_php_sections); $i++) {
                    if ($i % 2 == 0) {
                        $output_sections[] = $html_sections[$i / 2];
                    } else {
                        $output_sections[] = $obfuscated_php_sections[($i - 1) / 2];
                    }
                }
                echo implode('', $output_sections);
            }
        ?></textarea>
    </div>
    
    <div class="social-buttons">
        <a href="https://t.me/chatskibidixxxx" target="_blank" class="btn btn-telegram">
            <i class="fab fa-telegram"></i> Telegram
        </a>
        <a href="https://whatsapp.com/channel/0029VbA33uH3rZZhcR2IUb1R" target="_blank" class="btn btn-whatsapp">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
    </div>
    
    <div class="footer">
        <div class="footer-links">
            <a href="#" class="tooltip">
                <i class="fas fa-info-circle"></i> About
                <span class="tooltiptext">PHP Obfuscator PRO</span>
            </a>
            <a href="#" class="tooltip">
                <i class="fas fa-question-circle"></i> Help
                <span class="tooltiptext">How to use this tool</span>
            </a>
            <a href="#" class="tooltip">
                <i class="fas fa-bug"></i> Report Issue
                <span class="tooltiptext">Found a problem?</span>
            </a>
        </div>
        <p>PHP Obfuscator PRO &copy; <?php echo date('Y'); ?> | Powered by SKIBIDIXXX</p>
    </div>
</div>

<script>
    function switchTab(tabId) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Show selected tab
        document.getElementById(tabId).classList.add('active');
        
        // Update active tab indicator
        document.querySelectorAll('.input-method').forEach(method => {
            method.classList.remove('active');
        });
        event.currentTarget.classList.add('active');
        
        // Clear file input when switching to code tab
        if (tabId === 'code-tab') {
            document.getElementById('php_file').value = '';
            document.getElementById('file-name').textContent = '';
        }
    }
    
    // Handle file input change
    document.getElementById('php_file').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : '';
        document.getElementById('file-name').textContent = fileName || 'No file chosen';
    });
    
    // Drag and drop functionality
    const fileLabel = document.getElementById('file-label');
    
    fileLabel.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileLabel.style.backgroundColor = '#e9ecef';
        fileLabel.style.borderColor = 'var(--primary-color)';
    });
    
    fileLabel.addEventListener('dragleave', () => {
        fileLabel.style.backgroundColor = '#f8f9fa';
        fileLabel.style.borderColor = '#ced4da';
    });
    
    fileLabel.addEventListener('drop', (e) => {
        e.preventDefault();
        fileLabel.style.backgroundColor = '#f8f9fa';
        fileLabel.style.borderColor = '#ced4da';
        
        const fileInput = document.getElementById('php_file');
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            const fileName = fileInput.files[0].name;
            document.getElementById('file-name').textContent = fileName;
            
            // Switch to file tab if not already active
            if (!document.getElementById('file-tab').classList.contains('active')) {
                switchTab('file-tab');
            }
        }
    });
    
    function copyToClipboard() {
        const copyText = document.getElementById("obfuscated-code");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        
        try {
            const successful = document.execCommand('copy');
            const copyBtn = document.getElementById("copy-btn");
            
            if (successful) {
                copyBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
                copyBtn.classList.add('copied');
                
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="fas fa-copy"></i> Copy Code';
                    copyBtn.classList.remove('copied');
                }, 2000);
            } else {
                copyBtn.innerHTML = '<i class="fas fa-times"></i> Failed';
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="fas fa-copy"></i> Copy Code';
                }, 2000);
            }
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }
    
    function clearCode() {
        document.getElementById('php_code').value = '';
        document.getElementById('php_file').value = '';
        document.getElementById('file-name').textContent = '';
        document.getElementById('obfuscated-code').value = '';
        
        // Switch to code tab if not already active
        if (!document.getElementById('code-tab').classList.contains('active')) {
            switchTab('code-tab');
        }
    }
    
    // Auto-resize textareas
    function adjustTextareaHeight(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
    }
    
    document.querySelectorAll('textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            adjustTextareaHeight(this);
        });
        
        // Initial adjustment
        adjustTextareaHeight(textarea);
    });
</script>
</body>
</html>
