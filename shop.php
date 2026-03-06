<?php
session_start();

// Check if user is logged in
$isLoggedIn = isset($_SESSION['islogged_in']);
$userData   = $isLoggedIn ? $_SESSION['user_data'] : null;
$profilePath = $userData ? "profiles/" . $userData['profile_image'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Vibes</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .shop-container {
            padding: 40px 5%;
            background: var(--white);
            margin: 0px 14px 10px;
            border-radius: 20px;
            min-height: 86vh;
        }
        .shop-container h1 {
            color: var(--accent);
            font-size: 36px;
            margin-bottom: 30px;
            text-align: center;
        }
        .shop-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: var(--greyish);
            border: 2px solid var(--border);
            padding: 20px;
            box-shadow: var(--shadow-small);
            text-align: center;
            display: flex;
            flex-direction: column;
        }
        .product-image {
            width: 100%;
            height: 200px;
            background: #ccc;
            border: 2px solid var(--border);
            margin-bottom: 15px;
            object-fit: cover;
        }
        .product-title {
            font-size: 18px;
            font-weight: 900;
            margin-bottom: 10px;
            color: var(--accent);
        }
        .product-price {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
            flex-grow: 1;
        }
        .buy-btn{
            display: inline-block;
            padding: 10px 20px;
            background: var(--accent);
            color: var(--bg);
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            border: 2px solid var(--border);
            box-shadow: var(--shadow-smaller);
            font-size: 12px;
            cursor: pointer;
            transition: 0.1s;
        }
        
        .out-of-stock {
            background: #999;
            color: #e0e0e0;
            border-color: #888;
            box-shadow: none;
            cursor: not-allowed;
        }
        .out-of-stock:active {
            transform: none !important;
        }
    </style>
</head>
<body>
    <!-- dynamic navbar -->
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

    <main class="shop-container">
        <h1>Our Products</h1>
        <div class="shop-grid">
            <div class="product-card">
                <img src="assets/images/headphone.jpg" alt="Headphones" class="product-image">
                <div class="product-title">Wireless Headphones</div>
                <div class="product-price">200ghs</div>
                <a href="#" class=" buy-btn out-of-stock" >Out of Stock</a>
            </div>
            <div class="product-card">
                <img src="assets/images/cable.jpg" alt="Cable" class="product-image">
                <div class="product-title">USB-C Cable Pack</div>
                <div class="product-price">250ghs</div>
                <a href="#" class=" buy-btn out-of-stock" >Out of Stock</a>
            </div>
            <div class="product-card">
                <img src="assets/images/cases.jpg" alt="Case" class="product-image">
                <div class="product-title">Phone Case Bundles</div>
                <div class="product-price">1400ghs</div>
                <a href="#" class="buy-btn out-of-stock" >Out of Stock</a>
            </div>
            <div class="product-card">
                <img src="assets/images/protector.jpg" alt="Perfume" class="product-image">
                <div class="product-title">Screen Protectors</div>
                <div class="product-price">1000ghs</div>
                <a href="#" class="buy-btn out-of-stock" >Out of Stock</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Vibes. All rights reserved.</p>
    </footer>

</body>
</html>
