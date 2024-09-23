<?php
session_start();
if (!isset($_SESSION['adminLoggedIn']) || $_SESSION['adminLoggedIn'] !== true) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports For Life</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.2/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.2.0/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.11.2/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>

                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include("aside.php");
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <style>
            /* Styling for modal */
            .modal-content {
                border-radius: 10px;
                /* Rounded corners */
                border: none;
                /* No border */
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                /* Soft shadow */
            }

            .modal-header {
                background-color: #007bff;
                /* Blue header */
                color: white;
                /* White text */
                border-bottom: none;
                /* No border at the bottom of header */
                border-radius: 10px 10px 0 0;
                /* Rounded corners only at the top */
            }

            .modal-body {
                padding: 20px;
                /* Padding for content */
            }

            .modal-footer {
                border-top: none;
                /* No border at the top of footer */
                border-radius: 0 0 10px 10px;
                /* Rounded corners only at the bottom */
            }

            /* Button styling */
            .btn-primary {
                background-color: #007bff;
                /* Blue button */
                border-color: #007bff;
                /* Blue border */
            }

            .btn-primary:hover {
                background-color: #0056b3;
                /* Darker blue on hover */
                border-color: #0056b3;
                /* Darker blue border on hover */
            }
            </style>


            <div id="SportsDeal" style="padding:20px 10px 0px 10px;">
                <h1>Sports Deals</h1>
                     <a href="sports_deals.php" class="btn btn-primary" style="margin-bottom: 10px;">
    Add Deal
</a>
                <div class="modal fade" id="addProModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content" style="background-color: #f0f0f0; border-radius: 10px;">
                            <!-- Modal content here -->
                            <div class="modal-header" style="border-bottom: none;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color:#f0f0f0;">Add Deal
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal body content here -->
                                <div class="container">

                                    <form method="POST" action="logic3.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="pro_name" required
                                                style="border-color: #007bff;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Select Merchant Code</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option value="">Select Merchant Code</option>
                                                <?php
                                                include("config.php");
                                                
                                                // Query to retrieve merchant codes from the database
                                                $sql = "SELECT merchant_code FROM sports_merchant";
                                                $result = mysqli_query($config, $sql);
                                                
                                                // Check if the query was successful
                                                if ($result) {
                                                    // Loop through the results and generate the options
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['merchant_code'] . "'>" . $row['merchant_code'] . "</option>";
                                                    }
                                                    // Free the result set
                                                    mysqli_free_result($result);
                                                } else {
                                                    // If the query failed, display an error message
                                                    echo "<option value=''>Error: Unable to fetch data</option>";
                                                }
                                                
                                                // Close the database connection
                                                mysqli_close($config);
                                                ?>
                                            </select>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="pro_price" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Discounted Price</label>
                                                    <input type="number" class="form-control" name="pro_discount"
                                                        required style="border-color: #007bff;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Description</label>
                                            <input type="text" class="form-control" name="pro_desc" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Image</label>
                                            <input type="file" class="form-control" name="pro_image" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <button name="addSportDeals" type="submit" class="btn btn-primary"
                                            style="background-color: #007bff; border-color: #007bff;">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="background-color: #6c757d; border-color: #6c757d;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                  <div class="container-fluid">
                    <div class="table-container" style="overflow-x: auto;">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Merchant code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discounted Price</th>
                                    <th>Image</th>
                                    <th>Deal Category</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                include("config.php");
                $result = mysqli_query($config, "SELECT * FROM sports_deal");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['pro_id']}</td>";
                        echo "<td>{$row['merchant_code']}</td>";
                        echo "<td>{$row['pro_name']}</td>";
                        echo "<td>{$row['pro_price']}</td>";
                        echo "<td>{$row['pro_discount']}</td>";
                        echo "<td><img src='{$row['pro_image']}' width='200' height='200' alt='Product Image'></td>";
                        echo "<td>{$row['sport_cate']}</td>";
                        echo "<td>{$row['pro_desc']}</td>";

                        echo "<td>
                            <div class='icon-container'>
                                <a href='#' class='editSportProduct' 
                                    data-spd_id='{$row['pro_id']}'
                                    data-name='{$row['pro_name']}'
                                    data-price='{$row['pro_price']}'
                                    data-discount='{$row['pro_discount']}'
                                    data-category='{$row['merchant_code']}'
                                      data-category='{$row['sport_cate']}'
                                    data-description='{$row['pro_desc']}'
                                    data-image='{$row['pro_image']}'
                                ><i class='fas fa-edit'></i></a>
                                <a style='color:red;' href='logic3.php?delete_sports={$row['pro_id']}'><i class='fas fa-trash'></i></a>
                            </div>
                          </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No products found</td></tr>";
                }
                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="editSportProductModal" tabindex="-1" role="dialog"
                    aria-labelledby="editMerchantModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header"
                                style="background-color: #007bff; color: #fff; border-bottom: none;">
                                <h5 class="modal-title" id="cateModalLabel">Edit Sports_Deals Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editSportProductForm" enctype="multipart/form-data">
                                    <input type="hidden" name="spd_id" id="editSportProductId">
                                    <div class="form-group">
                                        <label for="editSportProName">Name</label>
                                        <input type="text" class="form-control" id="editSportProName"
                                            name="editProName">
                                    </div>

                                    <div class="form-group">
                                        <label for="editSportProImage">Image</label>
                                        <input type="file" class="form-control" id="editSportProImage"
                                            name="editProImage">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editSportProPrice">Price</label>
                                                <input type="number" class="form-control" id="editSportProPrice"
                                                    name="editProPrice">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editSportProDiscount">Discounted Price</label>
                                                <input type="number" class="form-control" id="editSportProDiscount"
                                                    name="editProDiscount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="editSportProDesc">Description</label>
                                        <input type="text" class="form-control" id="editSportProDesc"
                                            name="editProDesc">
                                    </div>
                                         <!----mehwish-->
                                            
                                         <div class="form-group">
                                      
                                         <label for="editSportProName" class="form-label">Select Category</label>
                                         <select class="form-control" name="editsportcate" id="editSportProName" required >
                                         <option value="">Select Category</option>
                                                <?php
                                                include("config.php");
                                                // Query to retrieve sports category from the database
                                                $sql1 = " SELECT item FROM category WHERE category_type = 'sports' ";
                                                $result1= mysqli_query($config, $sql1);
                                                 // Check if the query was successful
                                                 if ($result1) {
                                                    // Loop through the results and generate the options
                                                    while ($rows = mysqli_fetch_assoc($result1)) {
                                                        echo "<option value='" . $rows['item'] . "'>" . $rows['item'] . "</option>";
                                                    }
                                                }
                                                    ?>
                                                    </select>
      
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="updateSportProduct" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div id="SaloonDeal" style="padding:20px 10px 0px 10px;">
                <h1>Saloon Deals</h1>
                    <a href="saloon_deals.php" class="btn btn-primary" style="margin-bottom: 10px;">
    Add Deal
</a>
                <div class="modal fade" id="addSaloonModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content" style="background-color: #f0f0f0; border-radius: 10px;">
                            <!-- Modal content here -->
                            <div class="modal-header" style="border-bottom: none;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color:#f0f0f0;">Add Deal
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal body content here -->
                                <div class="container">

                                    <form method="POST" action="logic3.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="pro_name" required
                                                style="border-color: #007bff;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Select Merchant Code</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option value="">Select Merchant Code</option>
                                                <?php
                                                include("config.php");
                                                
                                                // Query to retrieve merchant codes from the database
                                                $sql = "SELECT merchant_code FROM saloon_merchant";
                                                $result = mysqli_query($config, $sql);
                                                
                                                // Check if the query was successful
                                                if ($result) {
                                                    // Loop through the results and generate the options
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['merchant_code'] . "'>" . $row['merchant_code'] . "</option>";
                                                    }
                                                    // Free the result set
                                                    mysqli_free_result($result);
                                                } else {
                                                    // If the query failed, display an error message
                                                    echo "<option value=''>Error: Unable to fetch data</option>";
                                                }
                                                
                                                // Close the database connection
                                                mysqli_close($config);
                                                ?>
                                            </select>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="pro_price" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Discounted Price</label>
                                                    <input type="number" class="form-control" name="pro_discount"
                                                        required style="border-color: #007bff;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Description</label>
                                            <input type="text" class="form-control" name="pro_desc" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Image</label>
                                            <input type="file" class="form-control" name="pro_image" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <button name="addSaloonDeals" type="submit" class="btn btn-primary"
                                            style="background-color: #007bff; border-color: #007bff;">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="background-color: #6c757d; border-color: #6c757d;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                  <div class="container-fluid">
                    <div class="table-container" style="overflow-x: auto;">
                        <table id="saloonExamp" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Merchant code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discounted Price</th>
                                    <th>Image</th>
                                 <th>Deal category</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            include("config.php");

                            // Connect to your database (assuming $config is your database connection)
                            $result = mysqli_query($config, "SELECT * FROM saloon_deal");

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$row['pro_id']}</td>";
                                    echo "<td>{$row['merchant_code']}</td>";
                                    echo "<td>{$row['pro_name']}</td>";
                                    echo "<td>{$row['pro_price']}</td>";
                                    echo "<td>{$row['pro_discount']}</td>";
                                    echo "<td><img src='{$row['pro_image']}' width='200' height='200' alt='Product Image'></td>";
                                    echo "<td>{$row['saloon_cate']}</td>";//mehwish
                                    echo "<td>{$row['pro_desc']}</td>";
                                    echo "<td>
                                    <div class='icon-container'>
                                        <a href='#' class='editSaloonProduct' 
                                            data-sld_id='{$row['pro_id']}'
                                            data-name='{$row['pro_name']}'
                                            data-price='{$row['pro_price']}'
                                            data-discount='{$row['pro_discount']}'
                                            data-category='{$row['merchant_code']}'
                                            data-cate='{$row['saloon_cate']}'   
                                            data-description='{$row['pro_desc']}'
                                            data-image='{$row['pro_image']}'
                                        ><i class='fas fa-edit'></i></a>
                                        <a style='color:red;' href='logic3.php?delete_saloon={$row['pro_id']}'><i class='fas fa-trash'></i></a>
                                    </div>
                                  </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No Deals found</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="editSaloonProductModal" tabindex="-1" role="dialog"
                    aria-labelledby="editMerchantModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header"
                                style="background-color: #007bff; color: #fff; border-bottom: none;">
                                <h5 class="modal-title" id="cateModalLabel">Edit Product Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editSaloonProductForm" enctype="multipart/form-data">
                                    <input type="hidden" name="sld_id" id="editSaloonProductId">
                                    <div class="form-group">
                                        <label for="editSaloonProName">Name</label>
                                        <input type="text" class="form-control" id="editSaloonProName"
                                            name="editSaloonProName">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSaloonProImage">Image</label>
                                        <input type="file" class="form-control" id="editSaloonProImage"
                                            name="editSaloonProImage">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editSaloonProPrice">Price</label>
                                                <input type="number" class="form-control" id="editSaloonProPrice"
                                                    name="editSaloonProPrice">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editSaloonProDiscount">Discounted Price</label>
                                                <input type="number" class="form-control" id="editSaloonProDiscount"
                                                    name="editSaloonProDiscount">
                                            </div>
                                        </div>


                                    </div>
                        <!--mehwish-->
                        <div class="form-group">
                                      
                                      <label for="editSaloonName" class="form-label">Select Category</label>
                                      <select class="form-control" name="editSaloonName" id="editSaloonName" required>
                                      <option value="">Select Category</option>
                                             <?php
                                             include("config.php");
                                             // Query to retrieve sports category from the database
                                             $sql2 = " SELECT item FROM category WHERE category_type = 'saloon' ";
                                             $result2= mysqli_query($config, $sql2);
                                              // Check if the query was successful
                                              if ($result2) {
                                                 // Loop through the results and generate the options
                                                 while ($record = mysqli_fetch_assoc($result2)) {
                                                     echo "<option value='" . $record['item'] . "'>" . $record['item'] . "</option>";
                                                 }
                                             }
                                                 ?>
                                                 </select>
   
                                 </div>

                                    <div class="form-group">
                                        <label for="editSaloonProDesc">Description</label>
                                        <input type="text" class="form-control" id="editSaloonProDesc"
                                            name="editSaloonProDesc">
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="updateSaloonProduct" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021-2024 <a href="">Sports For Life</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->



    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to get URL parameters by name
        function getParameterByName(name) {
            var url = new URL(window.location.href);
            return url.searchParams.get(name);
        }

        // Get the section parameter from the URL
        var sectionParam = getParameterByName("section");

        // Default to "product" section if no parameter is provided
        sectionParam = sectionParam || "SportsDeal";

        // Show/hide sections based on the sectionParam
        var sections = ['SportsDeal', 'SaloonDeal'];
        for (var i = 0; i < sections.length; i++) {
            var section = document.getElementById(sections[i]);
            if (sections[i] === sectionParam) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        }
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- jQuery UI 1.12.1 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    // saloon deal //

    $(document).ready(function() {
        // Use event delegation for dynamically added elements
        $(document).on('click', '.editSaloonProduct', function() {
            var SL_Id = $(this).data('sld_id');
            var S_Name = $(this).data('name');
            var S_Image = $(this).data('image');
            var S_Price = $(this).data('price');
            var S_Discount = $(this).data('discount');
            var C_Name = $(this).data('cate');//mehwish
            var S_Description = $(this).data('description');

            // Populate modal fields
            $('#editSaloonProductId').val(SL_Id);
            $('#editSaloonProName').val(S_Name);
            $('#editSaloonProPrice').val(S_Price);
            $('#editSaloonProDiscount').val(S_Discount);
            $('#editSaloonName').val(C_Name);//mehwish
            $('#editSaloonProDesc').val(S_Description);

            $('#editSaloonProductModal').modal('show');
        });

        $('#updateSaloonProduct').on('click', function() {
            var formData = new FormData();
            formData.append('sld_id', $('#editSaloonProductId').val());
            formData.append('editSaloonProName', $('#editSaloonProName').val());
            formData.append('editSaloonProPrice', $('#editSaloonProPrice').val());
            formData.append('editSaloonProDiscount', $('#editSaloonProDiscount').val());
            formData.append('editSaloonName', $('#editSaloonName').val());//mehwish
            formData.append('editSaloonProDesc', $('#editSaloonProDesc').val());

            var fileInput = $('#editSaloonProImage')[0];
            if (fileInput.files.length > 0) {
                formData.append('editSaloonProImage', fileInput.files[0]);
            }

            // Log form data for debugging
            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            $.ajax({
                type: 'POST',
                url: 'logic2.php', // Adjust URL if needed
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#editSaloonProductModal').modal('hide'); // Close the modal
                        // Redirect to a suitable page
                        window.location.href = 'section3.php?section=SaloonDeal';
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });



    // saloon deal // 

    // sports deal //

    $(document).ready(function() {
        // Use event delegation for dynamically added elements
        $(document).on('click', '.editSportProduct', function() {
            var SP_Id = $(this).data('spd_id');
            var P_Name = $(this).data('name');
            var S_Name = $(this).data('category');//mehwish
            var P_Image = $(this).data('image');
            var P_Price = $(this).data('price');
            var P_Discount = $(this).data('discount');
            var P_Description = $(this).data('description');

            // Populate modal fields
            $('#editSportProductId').val(SP_Id);
            $('#editSportProName').val(P_Name);
            $('#editSportProPrice').val(P_Price);
            $('#editSportProName').val(S_Name);//mehwish c
            $('#editSportProDiscount').val(P_Discount);
            $('#editSportProDesc').val(P_Description);

            // Display the image filename (if available)
            // $('#editProImageInfo').text(P_Image !== '' ? P_Image : 'No image selected');

            $('#editSportProductModal').modal('show');
        });


        $('#updateSportProduct').on('click', function() {
            var formData = new FormData($('#editSportProductForm')[0]);

            $.ajax({
                type: 'POST',
                url: 'logic3.php', // Adjust URL if needed
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',

                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#editSportProductModal').modal('hide'); // Close the modal
                        // Redirect to a suitable page
                        window.location.href = 'section3.php?section=SportsDeal';
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });



    // sports deal //





    $(document).ready(function() {
        $('#example1').DataTable();
        $('#example2').DataTable();
        $('#example3').DataTable();

        $('#saloonExamp').DataTable();

    });
    </script>

    </script>

    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js 3.7.0 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <!-- jQuery Sparklines 2.1.2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <!-- JQVMap 1.5.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob 1.2.11 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.11/jquery.knob.min.js"></script>
    <!-- Moment.js 2.29.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- DateRangePicker 3.1.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1.3/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.2.0/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote 0.8.18 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <!-- OverlayScrollbars 1.11.2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.11.2/js/jquery.overlayScrollbars.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard.js"></script>
    <!-- Bootstrap JS CDN, Popper.js CDN, and jQuery CDN -->


</body>

</html>