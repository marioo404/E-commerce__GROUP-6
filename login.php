<?php
session_start();
//if person is already logged in ridirect to dashboard

if (isset($_SESSION['islogged_in'])) {
    header("Location: dashboard.php");
    exit;
}

$errors = [];

// Only run codes in this block when the form is submitted since we are doing the php in same file as html
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    // 1. COLLECT FORM DATA
    
    $email    = $_POST['email'];
    $password = $_POST['password'];

    
    // 2. VALIDATE (if / else)
    
    if (empty($email) || empty($password)) {
        $errors[] = "Please fill in all fields.";
    } else {
        // Check if a user with that email exists
        if (isset($_SESSION['users'][$email])) {

            $user = $_SESSION['users'][$email];

            // Check if the password is correct
            if (password_verify($password, $user['password'])) {

                
                // 3. LOG USER IN AND SAVE TO SESSION
                
                $_SESSION['islogged_in'] = true;
                $_SESSION['user_data'] = $user;

                header('Location: dashboard.php');
                exit;

            } else {
                $errors[] = "Wrong password. Please try again.";
            }

        } else {
            $errors[] = "No account found with that email.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vibes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- navbar (not dynamic) -->
    <nav>
        <a href="index.html" id="logo">Vibes.</a>
        <div class="nav-links">
            <a href="shop.php">Shop</a>
            <a href="about.php">About</a>
            <a href="index.html#contact">Contact</a>
        </div>
    </nav>
    <!-- main section that contains the form -->
    <main class="bodyContainer">
        <div class="mainDiv">
            <div class="insideDiv">
                <div class="leftSide"></div>
                <div class="rightSide">
                    <h1>Welcome Back</h1>
                    <!-- checks if the success parameter exists in the URL -->
                    <?php if (isset($_GET['success'])): ?>
                        <div class="success-msg">Account created! Please log in.</div>
                    <?php endif; ?>
                    <!-- display first error in errors array if not empty -->
                    <?php if (!empty($errors)): ?>
                        <div class="error-message"><?php echo $errors[0]; ?></div>
                    <?php endif; ?>

                    <form action="login.php" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>

                        <input type="submit" value="Enter Shop">
                    </form>

                    <a href="register.php" class="form-link">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Vibes. All rights reserved.</p>
    </footer>

</body>
</html>