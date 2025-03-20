<?php

$admin_username = "admin";
$admin_password_hash = "0e215962017";
$flag_message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $input_password_hash = md5($input_password);

    if ($input_username == $admin_username && $input_password_hash == $admin_password_hash) {
        $flag_message = "<p class='flag'>Flag: FLAG{php_juggle_master}</p>";
    } else {
        $flag_message = "<h2>Nope!</h2><p>Give me the admin password to get the flag.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CyberAdmin Portal</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #FF7E5F, #FEB47B);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(82, 82, 255, 0.2);
            width: 90%;
            max-width: 450px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        h1 {
            color: #2a2a4a;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            letter-spacing: -0.5px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        label {
            text-align: left;
            color: #4a5568;
            font-weight: 600;
            font-size: 0.95rem;
        }
        input[type="text"] {
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        input[type="text"]:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        input[type="submit"] {
            padding: 1rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        input[type="submit"]:hover {
            background: #5a67d8;
            transform: translateY(-1px);
        }
        .flag {
            display: inline-block;
            margin-top: 2rem;
            padding: 1rem 2rem;
            background: #48BB78;
            border: 2px solid #2F855A;
            border-radius: 8px;
            color: white;
            font-family: 'Courier New', monospace;
            font-size: 1.4rem;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.5);
            animation: glow 1.5s ease-in-out infinite alternate;
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(0, 255, 0, 0.7);
            }
            100% {
                box-shadow: 0 0 30px rgba(0, 255, 0, 1);
            }
        }

        h2 {
            color: #c53030;
            margin: 1.5rem 0;
            font-size: 1.1rem;
        }
        p {
            color: #718096;
            line-height: 1.5;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>🔒 Admin Portal</h1>
        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="text" name="password" required>
            <input type="submit" value="Login">
        </form>

<!-- PHP compares things strangely sometimes. Loose vs. strict? -->
        <?php echo $flag_message; ?>
    </div>
</body>
</html>
