<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $data['title']; ?></title>

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url("public/templates/"); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2980b9;">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("dashboard/index.php") ?>">
				<div class="sidebar-brand-text mx-3">Kedai<sup>2</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?= ($data['page'] === "Dashboard") ? "active" : '' ?>">
				<a class="nav-link" href="<?= base_url("dashboard/index.php") ?>">
					<i class="fa fa-desktop" aria-hidden="true"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Administrator
			</div>

			<!-- Nav Item - Profile Collapse Menu -->
			<li class="nav-item <?= ($data['page'] === "Profile") ? "active" : '' ?>">
				<a class="nav-link" href="<?= base_url("administrator/profile.php") ?>">
					<i class="fas fa-fw fa-user-alt"></i>
					<span>Profile</span></a>
			</li>

			<!-- Nav Item - Settings Collapse Menu -->
			<li class="nav-item <?= ($data['page'] === "Settings") ? "active" : '' ?>">
				<a class="nav-link" href="<?= base_url("administrator/settings.php") ?>">
					<i class="fa fa-cog" aria-hidden="true"></i>
					<span>Settings</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Menu
			</div>

			<!-- Nav Item - Supplier Collapse Menu -->
			<li class="nav-item <?= ($data['page'] === "Supplier") ? "active" : '' ?>">
				<a class="nav-link" href="<?= base_url("supplier/index.php") ?>">
					<i class="fa fa-truck" aria-hidden="true"></i>
					<span>Supplier</span></a>
			</li>

			<!-- Nav Item - Product Collapse Menu -->
			<li class="nav-item <?= ($data['page'] === "Product") ? "active" : '' ?>">
				<a class="nav-link <?= ($data['page'] === "Product") ? "" : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#Product" aria-expanded="<?= ($data['page'] === "Product") ? "true" : "false"; ?>" aria-controls="Product">
					<i class="fa fa-cube" aria-hidden="true"></i>
					<span>Product</span>
				</a>
				<div id="Product" class="collapse <?= ($data['page'] === "Product") ? "show" : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">

						<a class="collapse-item <?php if (isset($data['sub-page'])) {
													echo ($data['sub-page'] === "Categories") ? "active" : '';
												} ?>" href="<?= base_url("categories/index.php"); ?>">Categories</a>

						<a class="collapse-item <?php if (isset($data['sub-page'])) {
													echo ($data['sub-page'] === "Units") ? "active" : '';
												} ?>" href="<?= base_url("units/index.php") ?>">Units</a>

						<a class="collapse-item <?php if (isset($data['sub-page'])) {
													echo ($data['sub-page'] === "Items") ? "active" : '';
												} ?>" href="<?= base_url("items/index.php") ?>">Items</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Stock Collapse Menu -->
			<li class="nav-item <?= ($data['page'] === "Stock") ? "active" : '' ?>">
				<a class="nav-link <?= ($data['page'] === "Stock") ? "" : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#Stock" aria-expanded="<?= ($data['page'] === "Stock") ? "true" : "false"; ?>" aria-controls="Stock">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<span>Stock</span>
				</a>
				<div id="Stock" class="collapse <?= ($data['page'] === "Stock") ? "show" : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">

						<a class="collapse-item <?php if (isset($data['sub-page'])) {
													echo ($data['sub-page'] === "Stock-in") ? "active" : '';
												} ?>" href="<?= base_url("stock/stock-in.php"); ?>">Stock-in</a>

						<a class="collapse-item <?php if (isset($data['sub-page'])) {
													echo ($data['sub-page'] === "Stock-out") ? "active" : '';
												} ?>" href="<?= base_url("stock/stock-out.php") ?>">Stock-out</a>
					</div>
				</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - Logout -->
			<li class="nav-item">
				<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span></a>
			</li>


			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url("public/"); ?>img/img_user/<?= $auth->getDataByUsername($_SESSION['username'])->img_user ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url("administrator/profile.php"); ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="<?= base_url("administrator/settings.php"); ?>">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Settings
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800"><?= $data["heading"]; ?></h1>
					
					<div class="card">
    					<div class="card-body">