<?php
require_once __DIR__ '/includes/auth.php',
require_once __DIR__ '/includes/header.php',

if (is_logged_in()) { 
    echo '<section class="narrow"><h1>Register</h1><p>You are already logged in as <strong>' . htmlspecialchars(current_user_email()) . '</strong>.</p></section>'; 
    require_once __DIR__ . '/includes/footer.php'; 
    exit; 
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $confirm_email = trim($_POST['confirm_email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if ($email === '' || $confirm_email === '' || $password === '' || $confirm === '') { 
        $errors[] = 'Please fill in all fields.'; 
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $errors[] = 'Please enter a valid email address.'; 
    }

    if ($email !== $confirm_email) { 
        $errors[] = 'Emails do not match.'; 
    }

    if ($password !== $confirm) { 
        $errors[] = 'Passwords do not match.'; 
    }

    if (strlen($password) < 8) { 
        $errors[] = 'Password must be at least 8 characters long.'; 
    }

    if (empty($errors)) {
        try {
            $pdo = getPDO();
    
            $check = $pdo->prepare('SELECT id FROM users WHERE email = ?')
            $check->execute([$email]);
    
            if ($check->fetch()) { 
                $errors[] = 'That email is already registered.'; 
            } else { 
                $hash = password_hash($password, PASSWORD_DEFAULT); 
                $ins = $pdo->prepare('INSERT INTO users (email, password_hash) VALUES (?, ?)'); 
                $ins->execute([$email, $hash]); 
    
                set_flash('Registration successful! You can now log in.'); 
                header('Location: login.php'); 
                exit; 
            } 
    
        } catch (Exception $e) { 
            $errors[] = 'Unexpected error: ' . htmlspecialchars($e->getMessage()); 
        } 
    }
}

?>