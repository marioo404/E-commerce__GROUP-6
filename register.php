<?php
session_start();
//if person is already logged in ridirect to dashboard
if (isset($_SESSION['islogged_in'])) {
    header("Location: dashboard.php");
    exit;
}
// we store errors here
$errors = [];

// Only run codes in this block when the form is submitted since we are doing the php in same file as html
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    // 1. COLLECT FORM DATA HERE
    
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirmpassword'];
    $profile  = $_FILES['profile'];

    
    // 2. VALIDATE TEXT FIELDS (if / elseif)
    
    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        $errors[] = "All fields are required.";
    } elseif (strlen($fname) < 2 || strlen($lname) < 2) {
        $errors[] = "First and last name must be at least 2 characters.";
    } elseif ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    } elseif (isset($_SESSION['users'][$email])) {
        $errors[] = "That email is already registered.";
    }

    
    // 3. VALIDATE PROFILE IMAGE TYPE AND SIZE <= 2MB
    
    $allowedImages = ['image/jpeg', 'image/png', 'image/jpg'];

    if ($profile['error'] !== 0) {
        $errors[] = "Please upload a profile picture.";
    } elseif (!in_array($profile['type'], $allowedImages)) {
        $errors[] = "Only JPG and PNG images are allowed.";
    } elseif ($profile['size'] > 2000000) {
        $errors[] = "Profile picture must be under 2MB.";
    }

    
    // 4. UPLOAD PROFILE IMAGE (if no errors in the errors array)
    
    if (empty($errors)) {
        $profileFilename = time() . "_" . $profile['name'];
        $profilePath     = "profiles/" . $profileFilename;

        move_uploaded_file($profile['tmp_name'], $profilePath);



        
        // 5. SAVE USER TO SESSION
        //each user's data is stored as multidimentional array.
        $_SESSION['users'][$email] = [
            'first_name'    => $fname,
            'last_name'     => $lname,
            'fullname'      => $fname . ' ' . $lname,
            'email'         => $email,
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'profile_image' => $profileFilename,
        ];

        // Redirect to login page with success parameter
        header('Location: login.php?success=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Vibes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <nav>
        <a href="index.html" id="logo">Vibes.</a>
        <div class="nav-links">
            <a href="shop.php">Shop</a>
            <a href="about.php">About Us</a>
            <a href="index.html#contact">Contact</a>
        </div>
    </nav>

    <main class="bodyContainer">
        <div class="mainDiv">
            <div class="insideDiv">
                <div class="leftSide"></div>
                <div class="rightSide">
                    <h1>Join Us</h1>
                 <!-- display first error in errors array if not empty -->
                    <?php if (!empty($errors)): ?>
                        <div class="error-message"><?php echo $errors[0]; ?></div>
                    <?php endif; ?>

                    <form action="register.php" method="POST" enctype="multipart/form-data" class="register-form">
                        <div>
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" required>
                        </div>
                        <div>
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" required>
                        </div>
                        <div class="full-width">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div>
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" name="confirmpassword" id="confirmpassword" required>
                        </div>
                        <div class="full-width">
                            <label for="profile">Profile Picture (JPG,PNG or JPEG)</label>
                            <input type="file" name="profile" id="profile" required>
                        </div>
                        <div class="full-width">
                            <input type="submit" value="Create Account">
                        </div>
                        <a href="login.php" class="form-link">Already a member? Login</a>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Vibes. All rights reserved.</p>
    </footer>

</body>
</html>
