<?php
session_start();

// Check if someone is logged in
$isLoggedIn = isset($_SESSION['islogged_in']);
$userData   = $isLoggedIn ? $_SESSION['user_data'] : null;
$profilePath = $userData ? "profiles/" . $userData['profile_image'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Vibes</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .page-container {
            padding: 40px 5%;
            background: var(--white);
            margin: 0px 14px 10px;
            border-radius: 20px;
            min-height: auto;
        }
        .page-container h1 {
            color: var(--accent);
            font-size: 46px;
            margin-bottom: 20px;
        }
        .page-container p {
            font-size: 20px;
            margin-bottom: 15px;
            max-width: 800px;
            line-height: 1.6;
            font-family: var(--font-main);
        }

    </style>
</head>
<body>

    <nav>
        <a href="index.html" id="logo">Vibes.</a>
        <div class="nav-links">
            <a href="shop.php">Shop</a>
            <a href="about.php">About</a>
            <a href="index.html#contact">Contact</a>
            <span class="separator"></span>
            <?php if ($isLoggedIn): ?>
                <div class="user-profile">
                    <img src="<?php echo $profilePath; ?>" alt="Profile Photo">
                    <div class="user-info">
                        <h3><?php echo $userData['fullname']; ?></h3>
                        <p><?php echo $userData['email']; ?></p>
                    </div>
                </div>
                <a href="logout.php" class="cta">Logout</a>
            <?php else: ?>
                <a href="login.php" class="cta">Login</a>
                <a href="register.php" class="cta">Join the club</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="page-container">
        <h1>About Us</h1>
        <p>Welcome to Vibes. We are a dedicated team providing solid goods for solid people. Our marketplace is curated to ensure that every product you find is of the highest quality and matches your aesthetic.</p>
        <p>Our journey began with a simple idea: a marketplace that doesn't feel like a spreadsheet. We wanted to create a space that focuses on curated vibes only, bringing together unique and premium products for our customers.</p>
        <p>Feel free to browse our shop and discover the amazing selection we have to offer.</p>
    </main>

    <!-- Members / About Section -->
    <section id="members" class="about-section">
        <div class="about-header">
            <div class="about-label">The Members (Group 6)</div>
            <h2 class="about-title">Meet the <br><em>Crew.</em></h2>
        </div>
        <div class="members">
            <div class="member-item">
                <span class="member-num">01</span>
                <div class="member-info">
                    <div class="member-name">Anthony Sulley</div>
                    <div class="member-role">Lead Coder</div>
                </div>
            </div>
            <div class="member-item">
                <span class="member-num">02</span>
                <div class="member-info">
                    <div class="member-name">Herbert Adjei</div>
                    <div class="member-role">Tester for Feedbacks</div>
                </div>
            </div>
            <div class="member-item accent-row">
                <span class="member-num">03</span>
                <div class="member-info">
                    <div class="member-name">Osei Tuffour</div>
                    <div class="member-role">Html Developer</div>
                </div>
            </div>
            <div class="member-item">
                <span class="member-num">04</span>
                <div class="member-info">
                    <div class="member-name">Mohammed Rayan</div>
                    <div class="member-role">Website UI Designer</div>
                </div>
            </div>
            <div class="member-item accent-row">
                <span class="member-num">05</span>
                <div class="member-info">
                    <div class="member-name">Abdul Aziz Yusif</div>
                    <div class="member-role">Content Fill ins</div>
                </div>
            </div>
            <div class="member-item">
                <span class="member-num">06</span>
                <div class="member-info">
                    <div class="member-name">Asiedu Forkuo Joseph</div>
                    <div class="member-role">Tester</div>
                </div>
            </div>
            <div class="member-item accent-row">
                <span class="member-num">07</span>
                <div class="member-info">
                    <div class="member-name">Nsiah Gyamerah Daniel</div>
                    <div class="member-role">Content Fill ins</div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Vibes. All rights reserved.</p>
    </footer>

</body>
</html>
