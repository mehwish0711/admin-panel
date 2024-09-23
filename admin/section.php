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
        include ("aside.php");
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
            <!-- <a href="https://maps.app.goo.gl/UtvUZThFJegqZM8S7">asd</a> -->


            <div id="merchant" style="padding:20px 10px 0px 10px;">
                <h1>Restaurant Merchants</h1>
                <button style="margin-bottom:10px;" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#addMerchantModal">
                    Add Merchant
                </button>
                <div class="modal fade" id="addMerchantModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content" style="background-color: #f0f0f0; border-radius: 10px;">
                            <!-- Modal content here -->
                            <div class="modal-header" style="border-bottom: none;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color:#f0f0f0;">Add Merchant
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal body content here -->
                                <div class="container">

                                    <form method="POST" action="logic.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Business Name</label>
                                            <input type="text" class="form-control" name="busi_name" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Logo</label>
                                            <input type="file" class="form-control" name="m_logo" required
                                                style="border-color: #007bff;">
                                        </div>


                                        <div class="mb-3">
                                            <label for="name" class="form-label">Offers</label>
                                            <input type="text" class="form-control" name="offer" required
                                                style="border-color: #007bff;">
                                        </div>
                                        

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Location Map URL</label>
                                            <input type="url" class="form-control" name="loca_map" required
                                                style="border-color: #007bff;">
                                        </div>


                                        <div class="mb-3">
                                            <label for="name" class="form-label">User Name (for login)</label>
                                            <input type="text" class="form-control" name="user_name" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="membership" class="form-label">Membership</label>
                                            <input type="text" class="form-control" name="member_user_name" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="fname" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="lname" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <select style="border-color: #007bff;" class="form-control" id="city"
                                                name="city">
                                                <option value="0111">Karachi</option>
                                                <option value="0222">Lahore</option>
                                                <option value="0333">Multan</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Discount Percentage</label>
                                            <input type="text" class="form-control" name="discout_percent" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Branch Address</label>
                                            <input type="text" class="form-control" name="address" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Mobile Number</label>
                                                    <input type="number" class="form-control" name="number" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">WhatsApp Number</label>
                                                    <input type="number" class="form-control" name="w_number" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Cnic</label>
                                            <input type="text" placeholder="XXXXX-XXXXXXX-X" class="form-control"
                                                name="cnic" required style="border-color: #007bff;">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Latitude</label>
                                                    <input type="text" class="form-control" name="latitude" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Longitude</label>
                                                    <input type="text" class="form-control" name="longitude" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="pass"
                                                            id="password" required style="border-color: #007bff;">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-eye" id="togglePassword"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="confirmPassword" class="form-label">Confirm
                                                        Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="confpass"
                                                            id="confirmPassword" required
                                                            style="border-color: #007bff;">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button name="addMerchant" type="submit" class="btn btn-primary"
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Business Name</th>
                                    <th>Business Logo</th>
                                    <th>Business Location</th>
                                    <th>Business Address</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Merchant Code</th>
                                    <th>Discount Percentage</th>
                                    <th>Offers</th>
                                    <th>User Name (for login)</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>City Code</th>
                                    <th>Number</th>
                                    <th>WhatsApp Number</th>
                                    <th>Cnic</th>
                                    <th>Password</th>
                                    <th>Confirm Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ("config.php");

                                $result = mysqli_query($config, "SELECT * FROM merchant");

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$row['id']}</td>";
                                        echo "<td>{$row['busi_name']}</td>";
                                        echo "<td><img src='{$row['logo']}' width='200' height='200' alt='Product Image'></td>";
                                        echo "<td>{$row['loca_map']}</td>";
                                        echo "<td>{$row['address']}</td>";
                                        echo "<td>{$row['latitude']}</td>";
                                        echo "<td>{$row['longitude']}</td>";
                                        echo "<td>{$row['merchant_code']}</td>";
                                        echo "<td>{$row['discount_percent']}</td>";
                                        echo "<td>{$row['offer']}</td>";
                                        echo "<td>{$row['user_name']}</td>";
                                        echo "<td>{$row['fname']}</td>";
                                        echo "<td>{$row['lname']}</td>";
                                        echo "<td>{$row['city']}</td>";
                                        echo "<td>{$row['number']}</td>";
                                        echo "<td>{$row['whats_num']}</td>";
                                        echo "<td>{$row['cnic']}</td>";
                                        echo "<td>{$row['pass']}</td>";
                                        echo "<td>{$row['confpass']}</td>";
                                        echo "<td>
                            <div class='icon-container'>
                                <a href='#' class='edit-merchant' 
                                    data-m_id='{$row['id']}'
                                    data-busi_name='{$row['busi_name']}'
                                    data-email='{$row['user_name']}'
                                    data-map='{$row['loca_map']}'
                                    data-fname='{$row['fname']}'
                                    data-lname='{$row['lname']}'
                                    data-city='{$row['city']}'
                                    data-number='{$row['number']}'
                                    data-w_number='{$row['whats_num']}'
                                    data-lati='{$row['latitude']}'
                                    data-longi='{$row['longitude']}'
                                    data-cnic='{$row['cnic']}'
                                    data-pass='{$row['pass']}'
                                    data-discount_percent='{$row['discount_percent']}'
                                    data-offer='{$row['offer']}'
                                    data-confpass='{$row['confpass']}';
                                ><i class='fas fa-edit'></i></a>
                                <a style='color:red;' href='logic.php?delete_merchant={$row['id']}'><i class='fas fa-trash'></i></a>
                            </div>
                        </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No Merchants found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>




                <!-- Modal for Editing Categories -->
                <div class="modal fade" id="editMerchantModal" tabindex="-1" role="dialog"
                    aria-labelledby="editMerchantModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header"
                                style="background-color: #007bff; color: #fff; border-bottom: none;">
                                <h5 class="modal-title" id="cateModalLabel">Edit Merchant Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editMerchantForm" enctype="multipart/form-data">
                                    <input type="hidden" name="m_id" id="editCategoryId">
                                    <div class="form-group">
                                        <label for="editBusiName">Business Name</label>
                                        <input style="border-color: #007bff;" type="text" class="form-control"
                                            id="editBusiName" name="editBusiName">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Logo</label>
                                        <input type="file" class="form-control" name="editLogo" id="editLogo" required
                                            style="border-color: #007bff;">
                                    </div>

                                    <div class="form-group">
                                        <label for="editEmail">User Name (for login)</label>
                                        <input type="email" class="form-control" id="editEmail" name="editEmail"
                                            style="border-color: #007bff;">
                                    </div>

                                    <div class="form-group">
                                        <label for="editOffer">Offer</label>
                                        <input type="text" class="form-control" id="editOffer" name="editOffer"
                                            style="border-color: #007bff;">
                                    </div>

                                    <div class="form-group">
                                        <label for="editDiscount">Discounted Price</label>
                                        <input type="text" class="form-control" id="editDiscount" name="editDiscount"
                                            style="border-color: #007bff;">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="editDiscount">Offer</label>
                                        <input type="text" class="form-control" id="editOffer" name="editOffer"
                                            style="border-color: #007bff;">
                                    </div> -->

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Location Map URL</label>
                                        <input type="url" class="form-control" name="editMap" id="editMap"
                                            style="border-color: #007bff;">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editFname">First Name</label>
                                                <input type="text" class="form-control" id="editFname" name="editFname"
                                                    style="border-color: #007bff;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editLname">Last Name</label>
                                                <input type="text" class="form-control" id="editLname" name="editLname"
                                                    style="border-color: #007bff;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="editCity">City</label>
                                        <input type="text" class="form-control" id="editCity" name="editCity">
                                    </div> -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Mobile Number</label>
                                                <input type="number" class="form-control" id="editNumber"
                                                    name="editNumber" style="border-color: #007bff;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">WhatsApp Number</label>
                                                <input type="number" class="form-control" id="editWhatsNum"
                                                    name="editWhatsNum" style="border-color: #007bff;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Latitude</label>
                                                <input type="text" class="form-control" name="editLati" id="editLati"
                                                    style="border-color: #007bff;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Longitude</label>
                                                <input type="text" class="form-control" name="editLongi" id="editLongi"
                                                    style="border-color: #007bff;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Cnic</label>
                                        <input type="text" placeholder="XXXXX-XXXXXXX-X" class="form-control"
                                            name="editCnic" id="editCnic" style="border-color: #007bff;">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editPassword">Password</label>
                                                <input type="password" class="form-control" id="editPassword"
                                                    name="editPassword" style="border-color: #007bff;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editConfPassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="editConfPassword"
                                                    name="editConfPassword" style="border-color: #007bff;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="updateMerchant" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <!-- user -->
            <div id="users" style="padding:20px 10px 0px 10px;">
                <h1>Users</h1>
                <button style="margin-bottom:10px;" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#addUserModal">
                    Add User
                </button>
                <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content" style="background-color: #f0f0f0; border-radius: 10px;">
                            <!-- Modal content here -->
                            <div class="modal-header" style="border-bottom: none;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color:#f0f0f0;">Add User
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal body content here -->
                                <div class="container">

                                    <form method="POST" action="logic.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="u_name" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">User Name (for login)</label>
                                            <input type="text" class="form-control" name="u_user_name" required  
                                                style="border-color: #007bff;">
                                        </div>

                                             <!-- dev mehwish  -->

                                             <div class="mb-3">
                                            <label for="membership" class="form-label">Membership</label>
                                            <input type="text" class="form-control" name="member_user_name" required
                                                style="border-color: #007bff;">
                                        </div>



                                        <div class="mb-3">
                                            <label for="name" class="form-label">City</label>
                                            <input type="text" class="form-control" name="u_city" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Mobile Number</label>
                                            <input type="number" class="form-control" name="u_number" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="u_dob" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="sports" class="form-label">Favourite Sports</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="favorite_sports[]"
                                                    value="Football">
                                                <label class="form-check-label" for="sports1">
                                                    Football
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" na
                                                    name="favorite_sports[]" value="Basketball">
                                                <label class="form-check-label" for="sports2">
                                                    Basketball
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="favorite_sports[]"
                                                    value="Tennis">
                                                <label class="form-check-label" for="sports3">
                                                    Tennis
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="favorite_sports[]"
                                                    value="Tug of War">
                                                <label class="form-check-label" for="sports3">
                                                    Tug of War
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="favorite_sports[]"
                                                    value="Swimming">
                                                <label class="form-check-label" for="sports3">
                                                    Swimming
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" n
                                                    name="favorite_sports[]" value="Badminton">
                                                <label class="form-check-label" for="sports3">
                                                    Badminton
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="favorite_sports[]"
                                                    value="Archery">
                                                <label class="form-check-label" for="sports3">
                                                    Archery
                                                </label>
                                            </div>

                                            <!-- Add more checkboxes for other sports as needed -->
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">User Image</label>
                                            <input type="file" class="form-control" name="u_image" required
                                                style="border-color: #007bff;">
                                        </div>




                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="pass" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confpass" required
                                                        style="border-color: #007bff;">
                                                </div>
                                            </div>
                                        </div>

                                        <button name="addUser" type="submit" class="btn btn-primary"
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
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>User Name (for login)</th>
                                    <th>Membership</th>
                                    <th>Number</th>
                                    <th>City</th>
                                    <th>Favourite Sports</th>
                                    <th>Date of birth</th>
                                    <th>Image</th>
                                    <th>Password</th>
                                    <th>Confirm Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ("config.php");

                                $result = mysqli_query($config, "SELECT * FROM users");

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$row['u_id']}</td>";
                                        echo "<td>{$row['u_name']}</td>";
                                        echo "<td>{$row['u_user_name']}</td>";
                                        echo "<td>{$row['membership']}</td>";
                                        echo "<td>{$row['u_number']}</td>";
                                        echo "<td>{$row['u_city']}</td>";
                                        echo "<td>{$row['favorite_sports']}</td>";
                                        echo "<td>{$row['dob']}</td>";
                                        echo "<td><img src='{$row['u_image']}' width='200' height='200' alt='Product Image'></td>";
                                        echo "<td>{$row['pass']}</td>";
                                        echo "<td>{$row['confpass']}</td>";
                                        echo "<td>
                                <div class='icon-container'>
                                    <a href='#' class='edit-user' 
                                        data-u_id='{$row['u_id']}'
                                        data-u_name='{$row['u_name']}'
                                        data-u_member='{$row['membership']}'
                                        data-u_email='{$row['u_user_name']}'
                                        data-u_number='{$row['u_number']}'
                                        data-dob='{$row['dob']}'
                                        data-u_pass='{$row['pass']}'
                                        data-u_conf='{$row['confpass']}'
                                        data-pass='{$row['pass']}'
                                        data-u_sports='{$row['favorite_sports']}'
                                    ><i class='fas fa-edit'></i></a>
                                    <a style='color:red;' href='logic.php?delete_user={$row['u_id']}'><i class='fas fa-trash'></i></a>
                                </div>
                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No Users found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                include ("config.php");

                // Check if user ID is provided in the URL
                if (isset($_GET['u_id'])) {
                    $user_id = $_GET['u_id'];

                    // Function to check if a sport is favorite for a user
                    function isFavoriteSport($user_id, $sport, $config)
                    {
                        $query = "SELECT favorite_sports FROM users WHERE u_id = '$user_id'";
                        $result = mysqli_query($config, $query);
                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $favoriteSports = explode(',', $row['favorite_sports']);
                            return in_array($sport, $favoriteSports);
                        } else {
                            return false;
                        }
                    }

                    // Query to fetch existing sports for the specific user
                    $query = "SELECT favorite_sports FROM users WHERE u_id = '$user_id'";
                    $result = mysqli_query($config, $query);

                    // Store the existing sports for the user in an array
                    $existingSports = array();
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $existingSports = explode(',', $row['favorite_sports']);
                    }
                }

                // Define all sports
                $sports = array("Football", "Basketball", "Tennis", "Tug of War", "Swimming", "Badminton", "Archery");

                ?>


                <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog"
                    aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header"
                                style="background-color: #007bff; color: #fff; border-bottom: none;">
                                <h5 class="modal-title" id="editUserModalLabel">Edit User Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editUserForm" enctype="multipart/form-data">
                                    <input type="hidden" name="u_id" id="editUserId">
                                    <div class="form-group">
                                        <label for="editUserName">Name</label>
                                        <input type="text" class="form-control" id="editUserName" name="editUserName">
                                    </div>
                                    <div class="form-group">
                                        <label for="editUserEmail">User Name (for login)</label>
                                        <input type="text" class="form-control" id="editUserEmail" name="editUserEmail">
                                    </div>
                                     <!--mehwish-->
                                     <div class="form-group">
                                        <label for="editUsermember">membership</label>
                                        <input type="text" class="form-control" id="editUsermember" name="editUsermember">
                                    </div>
                                    <div class="form-group">
                                        <label for="editUserNumber">Mobile Number</label>
                                        <input type="text" class="form-control" id="editUserNumber"
                                            name="editUserNumber">
                                    </div>
                                    <div class="form-group">
                                        <label for="editUserDOB">Date of Birth</label>
                                        <input type="date" class="form-control" id="editUserDOB" name="editUserDOB">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sports" class="form-label">Favourite Sports</label>
                                        <!-- Checkbox rendering -->
                                        <?php foreach ($sports as $sport) { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="my_sports[]"
                                                    value="<?php echo $sport; ?>" <?php if (isset($existingSports) && in_array($sport, $existingSports))
                                                           echo "checked"; ?>>
                                                <label class="form-check-label"
                                                    for="sports<?php echo $sport; ?>"><?php echo $sport; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="editUserPassword">Password</label>
                                        <input type="password" class="form-control" id="editUserPassword"
                                            name="editUserPassword">
                                    </div>
                                    <div class="form-group">
                                        <label for="editUserConfPassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="editUserConfPassword"
                                            name="editUserConfPassword">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="updateUser" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div id="products" style="padding:20px 10px 0px 10px;">
                <h1>Restaurant Deals</h1>
                <a href="restaurant_deals.php" class="btn btn-primary" style="margin-bottom: 10px;">
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

                                    <form method="POST" action="logic.php" enctype="multipart/form-data">
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
                                                include ("config.php");

                                                // Query to retrieve merchant codes from the database
                                                $sql = "SELECT merchant_code FROM merchant";
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


                               
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Price</label>
                                            <input type="text" class="form-control" name="pro_price" required
                                                style="border-color: #007bff;">
                                        </div>
                          
                        


                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="dinein" name="dinein">
                                    <label class="form-check-label" for="dinein">
                                        Dine-in
                                    </label>
                                </div>

                                <!-- Checkbox for Takeaway -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="takeaway"
                                        name="takeaway">
                                    <label class="form-check-label" for="takeaway">
                                        Takeaway
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="pro_desc" required
                                        style="border-color: #007bff;">
                                </div>

                                    <div class="mb-3">
                                    <label for="deal_cate" class="form-label">Select Deal Category</label>
                                    <label for="category" class="form-label">Select Merchant Code</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option value="">Select Merchant Code</option>
                                                <?php
                                                include("config.php");
                                                
                                                // Query to retrieve merchant codes from the database
                                                $sql = "SELECT item FROM category";
                                                $result = mysqli_query($config, $sql);
                                                
                                                // Check if the query was successful
                                                if ($result) {
                                                    // Loop through the results and generate the options
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['item'] . "'>" . $row['item'] . "</option>";
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
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="pro_image" required
                                        style="border-color: #007bff;">
                                </div>

                                <button name="addProduct" type="submit" class="btn btn-primary"
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
                                <!-- <th>Discounted Price</th> -->
                                <th>Take Away</th>
                                <th>Dine-in</th>
                                <th>Image</th>
                                <th>Deal Category</th>
                                <th>Descrition</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ("config.php");

                            // Connect to your database (assuming $config is your database connection)
                            $result = mysqli_query($config, "SELECT * FROM products");

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$row['pro_id']}</td>";
                                    echo "<td>{$row['merchant_code']}</td>";
                                    echo "<td>{$row['pro_name']}</td>";
                                    echo "<td>{$row['pro_price']}</td>";
                                    echo "<td>{$row['discount_amt']}</td>";

                                    // echo "<td>{$row['pro_discount']}</td>";
                                    echo "<td>{$row['takeaway']}</td>";
                                    echo "<td>{$row['dinein']}</td>";
                                    // echo "<td>{$row['offer']}</td>";
                                    echo "<td><img src='{$row['pro_image']}' width='200' height='200' alt='Product Image'></td>";
                                    echo "<td>{$row['deal_cate']}</td>";
                                    echo "<td>{$row['pro_desc']}</td>";
                                    // Modify the data attributes in the edit-product anchor tag to include all necessary fields
                                    echo "<td>
                                    <div class='icon-container'>
                                        <a href='#' class='edit-product' 
                                            data-p_id='{$row['pro_id']}'
                                            data-name='{$row['pro_name']}'
                                            data-category='{$row['deal_cate']}'
                                            data-image='{$row['pro_image']}'
                                            data-price='{$row['pro_price']}'
                                            data-description='{$row['pro_desc']}'
                                            data-takeaway='{$row['takeaway']}'
                                            data-dinein='{$row['dinein']}'
                                        ><i class='fas fa-edit'></i></a>
                                        <a style='color:red;' href='logic.php?delete_product={$row['pro_id']}'><i class='fas fa-trash'></i></a>
                                    </div>
                                    </td>";

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No products found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog"
                aria-labelledby="editMerchantModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #007bff; color: #fff; border-bottom: none;">
                            <h5 class="modal-title" id="cateModalLabel">Edit Product Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="color: #fff;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editProductForm" enctype="multipart/form-data">
                                <input type="hidden" name="p_id" id="editProductId">
                                <div class="form-group">
                                    <label for="editBusiName">Name</label>
                                    <input type="text" class="form-control" id="editProName" name="editProName">
                                </div>

                                <div class="mb-3">
                                    <label for="deal_cate" class="form-label">Select Deal Category</label>
                                    <select class="form-control" name="edit_deal_cate" id="edit_deal_cate" required>
                                        <option value="">Deal Categories</option>
                                        <option value="Fast Food">Fast Food</option>
                                        <option value="">Deal Categories</option>
                                        <option value="Fast Food">Fast Food</option>
                                        <option value="BBQ">BBQ</option>
                                        <option value="Beverages">Beverages</option>
                                        <option value="Pizzas">Pizzas</option>
                                        <option value="Platter">Platter</option>
                                        <option value="Desi Food">Desi Food</option>
                                        <option value="Roll">Roll</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Desert">Desert</option>
                                        <option value="Sea Food">Sea Food</option>
                                        <option value="Shakes">Shakes</option>
                                        <option value="Juices">Juices</option>
                                        <option value="Starters">Starters</option>
                                        <option value="Fries">Fries</option>
                                        <option value="Sandwich">Sandwich</option>
                                        <option value="Smoothies">Smoothies</option>
                                        <option value="Mocktails">Mocktails</option>
                                        <option value="Coffee">Coffee</option>
                                        <option value="Extras">Tea</option>
                                        <option value="Drinks">Drinks</option>
                                        
                                        <option value="Momos/DUMPLINGS">Momos/DUMPLINGS</option>
                                        <option value="Icecream">Icecream</option>
                                        <option value="Shawarma">Shawarma</option>
                                        <option value="Wraps">Momos/DUMPLINGS</option>
                                        <option value="Extras">Extras</option>
                                        <option value="Deals">Deals</option>
                                        <option value="Waffles">Waffles</option>


                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="editEmail">Image</label>
                                    <input type="file" class="form-control" id="editProImage" name="editProImage">
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="edit-dinein"
                                        name="edit-dinein">
                                    <label class="form-check-label" for="dinein">
                                        Dine-in
                                    </label>
                                </div>

                                <!-- Checkbox for Takeaway -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="edit-takeaway"
                                        name="edit-takeaway">
                                    <label class="form-check-label" for="takeaway">
                                        Takeaway
                                    </label>
                                </div>


                                <div class="form-group">
                                    <label for="editFname">Price</label>
                                    <input type="number" class="form-control" id="editProPrice" name="editProPrice">
                                </div>

                        <div class="form-group">
                            <label for="editCity">Description</label>
                            <input type="text" class="form-control" id="editProDesc" name="editProDesc">
                        </div>

                        </form>
                    </div>

                    <div class="modal-footer" style="border-top: none;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="updateProduct" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- banner -->

    <div id="banner" style="padding:20px 10px 0px 10px;">
        <h1>Banners</h1>

        <?php
        include ("config.php");

        // Connect to your database and fetch the count of banners
        $result = mysqli_query($config, "SELECT COUNT(*) as count FROM banner");
        $row = mysqli_fetch_assoc($result);
        $banner_count = $row['count'];

        // Conditionally render the Add Banner button
        if ($banner_count < 5) {
            echo '<button style="margin-bottom:10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBannerModal">
                Add Banner
              </button>';
        } else {
            echo '<button style="margin-bottom:10px;" type="button" class="btn btn-primary" disabled>
                Add Banner
              </button>';
        }
        ?>
        <div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="background-color: #f0f0f0; border-radius: 10px;">
                    <!-- Modal content here -->
                    <div class="modal-header" style="border-bottom: none;">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:#f0f0f0;">Add Banner
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="color: #fff;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal body content here -->
                        <div class="container">

                            <form method="POST" action="logic.php" enctype="multipart/form-data">


                                <div class="mb-3">
                                    <label for="name" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="banner_image" required
                                        style="border-color: #007bff;">
                                </div>

                                <button name="addBannner" type="submit" class="btn btn-primary"
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
                <table id="bannerExample" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Banner Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ("config.php");

                        // Connect to your database (assuming $config is your database connection)
                        $result = mysqli_query($config, "SELECT * FROM banner");

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['ban_id']}</td>";
                                echo "<td><img src='{$row['ban_image']}' width='200' height='200' alt='Product Image'></td>";
                                echo "<td>
                                    <div class='icon-container'>
                                        <a href='#' class='edit-banner' 
                                            data-ban_id='{$row['ban_id']}'
                                            data-ban_image='{$row['ban_image']}'
                                        ><i class='fas fa-edit'></i></a>
                                        <a style='color:red;' href='logic.php?delete_banner={$row['ban_id']}'><i class='fas fa-trash'></i></a>
                                    </div>
                                  </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No banners found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="editBannerModal" tabindex="-1" role="dialog" aria-labelledby="editBannerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #007bff; color: #fff; border-bottom: none;">
                        <h5 class="modal-title" id="cateModalLabel">Edit Banner Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="color: #fff;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editBannerForm" enctype="multipart/form-data">
                            <input type="hidden" name="ban_id" id="editBannerId">

                            <div class="form-group">
                                <label for="editEmail">Image</label>
                                <input type="file" class="form-control" id="editBanImage" name="editBanImage">
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer" style="border-top: none;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="updateBanner" class="btn btn-primary">Save changes</button>
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
        document.addEventListener("DOMContentLoaded", function () {
            // Function to get URL parameters by name
            function getParameterByName(name) {
                var url = new URL(window.location.href);
                return url.searchParams.get(name);
            }

            // Get the section parameter from the URL
            var sectionParam = getParameterByName("section");

            // Default to "product" section if no parameter is provided
            sectionParam = sectionParam || "merchant";

            // Show/hide sections based on the sectionParam
            var sections = ['merchant', 'users', 'products', 'banner'];
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
        ///banner//

        $(document).ready(function () {
            // Use event delegation for dynamically added elements
            $(document).on('click', '.edit-banner', function () {
                var B_Id = $(this).data('ban_id');
                var B_Image = $(this).data('ban_image');


                // Populate modal fields
                $('#editBannerId').val(B_Id);

                // Display the image filename (if available)
                // $('#editProImageInfo').text(P_Image !== '' ? P_Image : 'No image selected');

                $('#editBannerModal').modal('show');
            });

            $('#updateBanner').on('click', function () {
                var formData = new FormData($('#editBannerForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: 'logic.php', // Adjust URL if needed
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.status === 'success') {
                            alert(response.message);
                            $('#editBannerModal').modal('hide');
                            // Redirect to a suitable page
                            window.location.href = 'section.php?section=banner';
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        ///banner///


        // product//

        $(document).ready(function () {
            // Use event delegation for dynamically added elements
            $(document).on('click', '.edit-product', function () {
                var P_Id = $(this).data('p_id');
                var P_Name = $(this).data('name');
                var P_Category = $(this).data('category');
                var P_Image = $(this).data('image');
                var P_Price = $(this).data('price');
                var P_Takeaway = $(this).data('takeaway');
                var P_Dinein = $(this).data('dinein');
                var P_Description = $(this).data('description');

                // Populate modal fields
                $('#editProductId').val(P_Id);
                $('#editProName').val(P_Name);
                $('#edit_deal_cate').val(P_Category); // Set the category dropdown
                $('#editProPrice').val(P_Price);
                $('#editProDesc').val(P_Description);

                $('#edit-dinein').prop('checked', P_Dinein === 1);
                $('#edit-takeaway').prop('checked', P_Takeaway === 1);

                // Display the image filename (if available)

                $('#editProductModal').modal('show');
            });

            $('#updateProduct').on('click', function () {
                var formData = new FormData($('#editProductForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: 'logic.php', // Adjust URL if needed
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.status === 'success') {
                            alert(response.message);
                            $('#editProductModal').modal('hide');
                            // Redirect to a suitable page
                            window.location.href = 'section.php?section=products';
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });



        // producty //




        // user //

        $(document).ready(function () {
            $('.edit-user').on('click', function () {
                // Get data from the table row
                var u_id = $(this).data('u_id');
                var u_name = $(this).data('u_name');
                var u_member = $(this).data('u_member');//mehwish
                var u_email = $(this).data('u_email');
                var u_number = $(this).data('u_number');
                var dob = $(this).data('dob');
                var u_pass = $(this).data('u_pass');
                var u_conf = $(this).data('u_conf');
                var u_sports = $(this).data('u_sports');

                // Populate modal fields with data from the table row
                $('#editUserId').val(u_id);
                $('#editUserName').val(u_name);
                $('#editUsermember').val(u_member); //mehwish
                $('#editUserEmail').val(u_email);
                $('#editUserNumber').val(u_number);
                $('#editUserDOB').val(dob);
                $('#editUserPassword').val(u_pass);
                $('#editUserConfPassword').val(u_conf);

                // Check or uncheck checkboxes based on existing sports
                $('input[name="my_sports[]"]').each(function () {
                    if (u_sports.includes($(this).val())) {
                        $(this).prop('checked', true);
                    } else {
                        $(this).prop('checked', false);
                    }
                });

                $('#editUserModal').modal('show');
            });

            $('#updateUser').on('click', function () {
                var formData = new FormData($('#editUserForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: 'logic.php', // Update the URL with the correct path
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.status === 'success') {
                            alert(response.message);
                            $('#editUserModal').modal('hide');
                            window.location.href = 'section.php?section=users';
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });



        $(document).ready(function () {
            $('.edit-merchant').on('click', function () {
                var M_Id = $(this).data('m_id');
                var M_busi = $(this).data('busi_name');
                var M_email = $(this).data('email');
                var M_fname = $(this).data('fname');
                var M_lname = $(this).data('lname');
                // var M_city = $(this).data('city');
                var M_number = $(this).data('number');
                var M_map = $(this).data('map');
                var M_lati = $(this).data('lati');
                var M_longi = $(this).data('longi');
                var M_whats = $(this).data('w_number');
                var M_cnic = $(this).data('cnic');
                var M_pass = $(this).data('pass');
                var M_confpass = $(this).data('confpass');
                var M_discount = $(this).data('discount_percent');
                var M_offer = $(this).data('offer');

                // Populate modal fields
                $('#editCategoryId').val(M_Id);
                $('#editDiscount').val(M_discount);

                $('#editOffer').val(M_offer);
                
                $('#editMap').val(M_map);
                $('#editLati').val(M_lati);
                $('#editLongi').val(M_longi);
                $('#editCnic').val(M_cnic);
                $('#editWhatsNum').val(M_whats);
                $('#editBusiName').val(M_busi);
                $('#editEmail').val(M_email);
                $('#editFname').val(M_fname);
                $('#editLname').val(M_lname);
                // $('#editCity').val(M_city);
                $('#editNumber').val(M_number);
                $('#editPassword').val(M_pass);
                $('#editConfPassword').val(M_confpass);

                $('#editMerchantModal').modal('show');
            });

            $('#updateMerchant').on('click', function () {
                var formData = new FormData($('#editMerchantForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: 'logic.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.status === 'success') {
                            alert(response.message);
                            $('#editMerchantModal').modal('hide');
                            window.location.href = 'section.php?section=merchant';
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        document.getElementById("togglePassword").addEventListener("click", function () {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });

        document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
            var confirmPasswordInput = document.getElementById("confirmPassword");
            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                confirmPasswordInput.type = "password";
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });



        $(document).ready(function () {
            $('#example1').DataTable();
            $('#example2').DataTable();
            $('#example3').DataTable();
            $('#bannerExample').DataTable();

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