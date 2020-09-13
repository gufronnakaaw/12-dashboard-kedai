<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title><?= $data["title"]; ?></title>

    <link href="<?= base_url("public/templates/"); ?>css/app.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand text-center" href="<?= base_url("dashboard/") ?>">
                    <span data-feather="shopping-cart"></span><span class="ml-2 align-middle">Kedai</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item <?= ($data['page'] == "Dashboard") ? "active" : ''; ?>">
                        <a class="sidebar-link" href="<?= base_url("dashboard/"); ?>">
                            <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Administator
                    </li>


                    <li class="sidebar-item <?= ($data['page'] === "Profile") ? "active" : ''; ?>">
                        <a class="sidebar-link" href="<?= base_url("administrator/profile.php"); ?>">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-item <?= ($data['page'] === "Settings") ? "active" : ''; ?>">
                        <a class="sidebar-link" href="<?= base_url("administrator/settings.php"); ?>">
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Menu
                    </li>

                    <li class="sidebar-item <?= ($data['page'] === "Supplier") ? "active" : ''; ?>">
                        <a class="sidebar-link" href="<?= base_url("supplier/"); ?>">
                            <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Supplier</span>
                        </a>
                    </li>

                    <li class="sidebar-item <?= ($data['page'] === "Product") ? "active" : '' ?>">
                        <a href="#product" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="<?= ($data['page'] === "Product") ? "true" : 'false' ?>">
                            <i class="align-middle" data-feather="package"></i> <span class="align-middle">Product</span>
                        </a>

                        <ul id="product" class="sidebar-dropdown list-unstyled collapse <?= ($data['page'] === "Product") ? "show" : ''; ?>" data-parent="#sidebar">
                            <li class="sidebar-item <?php if (isset($data['sub-page'])) {
                                                        echo ($data['sub-page'] === "Categories") ? "active" : '';
                                                    } ?>">
                                <a class="sidebar-link" href="<?= base_url("product/categories.php"); ?>">Categories</a>
                            </li>
                            <li class="sidebar-item <?php if (isset($data['sub-page'])) {
                                                        echo ($data['sub-page'] === "Units") ? "active" : '';
                                                    } ?>">
                                <a class="sidebar-link" href="<?= base_url("product/units.php"); ?>">Units</a>
                            </li>
                            <li class="sidebar-item <?php if (isset($data['sub-page'])) {
                                                        echo ($data['sub-page'] === "Items") ? "active" : '';
                                                    } ?>">
                                <a class="sidebar-link" href="<?= base_url("product/items.php"); ?>">Items</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item <?= ($data['page'] === "Stock") ? "active" : '' ?>">
                        <a href="#Stock" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="<?= ($data['page'] === "Stock") ? "true" : "false" ?>">
                            <i class="align-middle" data-feather="box"></i> <span class="align-middle">Stock</span>
                        </a>

                        <ul id="Stock" class="sidebar-dropdown list-unstyled collapse <?= ($data['page'] === "Stock") ? "show" : ''; ?>" data-parent="#sidebar">
                            <li class="sidebar-item <?php if (isset($data['sub-page'])) {
                                                        echo ($data['sub-page'] === "Stock-in") ? "active" : '';
                                                    } ?>">
                                <a class="sidebar-link" href="<?= base_url("stock/stock-in.php"); ?>">Stock In</a>
                            </li>
                            <li class="sidebar-item <?php if (isset($data['sub-page'])) {
                                                        echo ($data['sub-page'] === "Stock-out") ? "active" : '';
                                                    } ?>">
                                <a class="sidebar-link" href="<?= base_url("stock/stock-out.php"); ?>">Stock Out</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-header">
                        Plugins & Addons
                    </li>

                    <!-- <li class="sidebar-item">
						<a class="sidebar-link" href="">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
							<i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
						</a>
					</li> -->

                    <!-- <li class="sidebar-header"></li> -->

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                <img src="<?= base_url("public/"); ?>img/img_user/<?= $auth->getImgByUsername($_SESSION['username'])->img_user ?>" class="avatar img-fluid rounded mr-1" alt="<?= $_SESSION["username"]; ?>" /> <span class="text-dark"><?= $_SESSION["username"]; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= base_url("administrator/profile.php"); ?>"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="<?= base_url("administrator/settings.php"); ?>#"><i class="align-middle mr-1" data-feather="settings"></i> Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- modal logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModal">Ready to Leave?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="<?= base_url("auth/logout.php"); ?>" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><?= $data["heading"]; ?></h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- content here -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-center">
                            <p>&copy; 2020 KedaiGufron</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="<?= base_url("public/templates/"); ?>js/app.js"></script>
    <script src="<?= base_url("public/templates/"); ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url("public/templates/"); ?>js/script.js"></script>

</body>

</html>