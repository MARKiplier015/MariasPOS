<?php
session_start();
require 'includes/dbh.inc.php';

// Assuming the user's ID is stored in the session
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$firstName = 'Guest';
$lastName = '';

if ($userId) {
    $stmt = $pdo->prepare("SELECT firstname, lastname FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        $firstName = $user['firstname'];
        $lastName = $user['lastname'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/pos style.css">
	<link rel="icon" style="border-radius: 50%;" type="image/x=icon" href="assets/images/webicon.png">
    <title>Maria's | Products</title>
</head>
<body class="body-fixed" onload="myFunction()">
	<div id="loading"></div>



	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxl-magento bx-burst' style='color: var(--dark)' ></i>
			<span class="text">MARIA's POS</span>
		</a>
		<ul class="side-menu top">
			<li class="#">
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="sales.php">
					<i class='bx bx-shopping-bag'></i>
					<span class="text">Sales</span>
				</a>
			</li>
			<li class="active">
				<a href="products.php">
					<i class='bx bxs-doughnut-chart bx-spin' style='color:orange' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li>
				<a href="Sales Reports.php">
					<i class='bx bxs-report' ></i>
					<span class="text">Sales Reports</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="settings.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="admin.login.php" class="logout" onclick="logout()">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<h1>Welcome, <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?>!</h1>
				<div style="font-size: smaller;" class="user-info">
					<span style="border-style: solid; border-top: 10px; border-bottom: 10px; border-color: orange; padding: 6px;"  id="date-time"></span>
				  </div>
        </nav>
		
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Product Management</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="products.php">Products</a>
						</li>
					</ul>
				</div>
			</div>
        <!-- CONTENT -->
		<div class="container">
			<div class="total-products">Total Products: <span id="totalProducts">0</span></div>
			<input type="text" id="searchInput" onkeyup="searchProduct()" placeholder="Search for product name...">
			<table id="productsTable" class="responsive-table">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Description</th>
						<th>Original Price</th>
						<th>Selling Price</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<button id="showAddProductFormButton">Add More Products <i id="arrowIcon" class="bx-down-arrow"></i></button>
			<div id="addProductForm">
			<!-- Your form fields for product name, description, selling price, original price -->
			<input type="text" name=name id="productName" placeholder="Product Name">
			<input type="text" name=description id="productDescription" placeholder="Product Description">
			<input type="number" name=ogprice id="productOgprice" placeholder="Original Price">
			<input type="number" name=price id="productPrice" placeholder="Selling Price">
			<button id="addButton" onclick="addProduct()">Save Changes</button>
			</div>

		</main>
	</section>

</div>


    <script src="assets/js/add products.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>