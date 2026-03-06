<?php
session_start();



// If the user is not logged in, send them to login
if (!isset($_SESSION['islogged_in'])) {
    header("Location: login.php");
    exit;
}


// 1. GET USER DATA

$userData    = $_SESSION['user_data'];
$profilePath = "profiles/" . $userData['profile_image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Vibes</title>
    <link rel="stylesheet" href="css/styles.css">
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
            <div class="user-profile">
                <img src="<?php echo $profilePath; ?>" alt="Profile Photo">
                <div class="user-info">
                    <h3><?php echo $userData['fullname']; ?></h3>
                    <p><?php echo $userData['email']; ?></p>
                </div>
            </div>
            <a href="logout.php" class="cta">Logout</a>
        </div>
    </nav>

    <main class="dashboard-container">

        <!-- Stats Section -->
        <div class="stats-grid">
            <div class="stat-card">
                <h4>Total Completed Orders</h4>
                <div class="number">248</div>
                <div class="label">This month</div>
            </div>
            <div class="stat-card">
                <h4> Total Spent</h4>
                <div class="number">5,230ghs</div>
                <div class="label">This month</div>
            </div>
            <div class="stat-card">
                <h4>Vendors Bought from</h4>
                <div class="number">21</div>
                <div class="label">Vendors</div>
            </div>
            <div class="stat-card">
                <h4>Products In cart</h4>
                <div class="number">47</div>
                <div class="label">This month</div>
            </div>
        </div>

        <div class="dashboard-content">
            <!-- Top Products -->
            <div class="section-card">
                <h2>Top Products</h2>
                <div class="product-list">
                    <div class="product-item">
                        <span class="product-name">Wireless Headphones</span>
                        <span class="product-revenue">1,870ghs</span>
                    </div>
                    <div class="product-item">
                        <span class="product-name">USB-C Cable Pack</span>
                        <span class="product-revenue">2,150ghs</span>
                    </div>
                    <div class="product-item">
                        <span class="product-name">Phone Case Bundles</span>
                        <span class="product-revenue">890ghs</span>
                    </div>
                    <div class="product-item">
                        <span class="product-name">Screen Protectors</span>
                        <span class="product-revenue">320ghs</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="section-card">
                <h2>Quick Actions</h2>
                <div class="actions-list">
                    <a href="#" class="action-button">Edit Profile</a>
                    <a href="#" class="action-button action-secondary">View All Orders</a>
                    <a href="#" class="action-button action-secondary">Manage Customers</a>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Vibes. All rights reserved.</p>
    </footer>

</body>
</html>