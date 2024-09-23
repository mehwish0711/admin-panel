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
            <!-- <a href="https://maps.app.goo.gl/UtvUZThFJegqZM8S7">asd</a> -->


            <div id="sports" style="padding:20px 10px 0px 10px;">
                <h1>Sports Merchants</h1>
                <button style="margin-bottom:10px;" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#addSportsMerchantModal">
                    Add Merchant

                </button>
                <div class="modal fade" id="addSportsMerchantModal" tabindex="-1" role="dialog"
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

                                    <form method="POST" action="logic2.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Business Name</label>
                                            <input type="text" class="form-control" name="busi_name" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Logo</label>
                                            <input type="file" class="form-control" name="logo" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Location Map URL</label>
                                            <input type="url" class="form-control" name="loca_map" required
                                                style="border-color: #007bff;">
                                        </div>


                                        <div class="mb-3">
                                            <label for="name" class="form-label">User Name (For Login)</label>
                                            <input type="text" class="form-control" name="email" required
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
                                            <select class="form-control" id="city" name="city">
                                                <option value="0111">Karachi</option>
                                                <option value="0222">Lahore</option>
                                                <option value="0333">Multan</option>
                                                <!-- Aur isi tarah aur options add kar sakte ho -->
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Discount Percentage</label>
                                            <input type="text" class="form-control" name="discount_percent" required
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

                                        <button name="addSportsMerchant" type="submit" class="btn btn-primary"
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
                                    <th>Discount Percent</th>
                                    <th>User Name (For Login)</th>
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
                include("config.php");

                $result = mysqli_query($config, "SELECT * FROM sports_merchant ");

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
                                <a href='#' class='editSportMerchant' 
                                    data-sp_id='{$row['id']}'
                                    data-busi_name='{$row['busi_name']}'
                                    data-email='{$row['email']}'
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
                                    data-confpass='{$row['confpass']}'
                                ><i class='fas fa-edit'></i></a>
                                <a style='color:red;' href='logic2.php?delete_sports={$row['id']}'><i class='fas fa-trash'></i></a>
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
                                    <input type="hidden" name="sp_id" id="editMerchantId">
                                    <div class="form-group">
                                        <label for="editBusiName">Business Name</label>
                                        <input type="text" class="form-control" id="editBusiName" name="editBusiName">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Logo</label>
                                        <input type="file" class="form-control" name="editLogo" id="editLogo" required
                                            style="border-color: #007bff;">
                                    </div>

                                    <div class="form-group">
                                        <label for="editEmail">Email</label>
                                        <input type="email" class="form-control" id="editEmail" name="editEmail">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Location Map URL</label>
                                        <input type="url" class="form-control" name="editMap" id="editMap"
                                            style="border-color: #007bff;">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editFname">First Name</label>
                                                <input type="text" class="form-control" id="editFname" name="editFname">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editLname">Last Name</label>
                                                <input type="text" class="form-control" id="editLname" name="editLname">
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
                                                    name="editPassword">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editConfPassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="editConfPassword"
                                                    name="editConfPassword">
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



            <!-- saloon -->

            <div id="saloon" style="padding:20px 10px 0px 10px;">
                <h1>Saloon Merchants</h1>
                <button style="margin-bottom:10px;" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#addSaloonMerchantModal">
                    Add Merchants

                </button>
                <div class="modal fade" id="addSaloonMerchantModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content" style="background-color: #f0f0f0; border-radius: 10px;">
                            <!-- Modal content here -->
                            <div class="modal-header" style="border-bottom: none;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color:#f0f0f0;">Add Merchants
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: #fff;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal body content here -->
                                <div class="container">

                                    <form method="POST" action="logic2.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Business Name</label>
                                            <input type="text" class="form-control" name="busi_name" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Logo</label>
                                            <input type="file" class="form-control" name="logo" required
                                                style="border-color: #007bff;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Location Map URL</label>
                                            <input type="url" class="form-control" name="loca_map" required
                                                style="border-color: #007bff;">
                                        </div>


                                        <div class="mb-3">
                                            <label for="name" class="form-label">User Name (For Login)</label>
                                            <input type="text" class="form-control" name="email" required
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
                                            <select class="form-control" id="city" name="city">
                                                <option value="0111">Karachi</option>
                                                <option value="0222">Lahore</option>
                                                <option value="0333">Multan</option>
                                                <!-- Aur isi tarah aur options add kar sakte ho -->
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Discount Percentage</label>
                                            <input type="text" class="form-control" name="discount_percent" required
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
                <input type="password" class="form-control" name="pass" id="password" required style="border-color: #007bff;">
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
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <div class="input-group">
                <input type="password" class="form-control" name="confpass" id="confirmPassword" required style="border-color: #007bff;">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>



                                        <button name="addSaloonMerchant" type="submit" class="btn btn-primary"
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
                        <table id="example4" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Business Name</th>
                                    <th>Business Logo</th>
                                    <th>Business Location</th>
                                    <th>Business Address</th>
                                    <th>Merchant Code</th>
                                    <th>Discount Percent</th>
                                    <th>User Name (For Login)</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>City Code</th>
                                    <th>Number</th>
                                    <th>WhatsApp Number</th>
                                    <th>Cnic</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Password</th>
                                    <th>Confirm Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                include("config.php");

                $result = mysqli_query($config, "SELECT * FROM saloon_merchant ");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['busi_name']}</td>";
                        echo "<td><img src='{$row['logo']}' width='200' height='200' alt='Product Image'></td>";
                        echo "<td>{$row['loca_map']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['merchant_code']}</td>";
                        echo "<td>{$row['discount_percent']}</td>";
                        echo "<td>{$row['user_name']}</td>";
                        echo "<td>{$row['fname']}</td>";
                        echo "<td>{$row['lname']}</td>";
                        echo "<td>{$row['city']}</td>";
                        echo "<td>{$row['number']}</td>";
                        echo "<td>{$row['whats_num']}</td>";
                        echo "<td>{$row['cnic']}</td>";
                        echo "<td>{$row['latitude']}</td>";
                        echo "<td>{$row['longitude']}</td>";
                        echo "<td>{$row['pass']}</td>";
                        echo "<td>{$row['confpass']}</td>";
                        echo "<td>
                            <div class='icon-container'>
                                <a href='#' class='editSaloonMerchant' 
                                    data-sm_id='{$row['id']}'
                                    data-busi_name='{$row['busi_name']}'
                                    data-email='{$row['email']}'
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
                                    data-confpass='{$row['confpass']}'
                                ><i class='fas fa-edit'></i></a>
                                <a style='color:red;' href='logic2.php?delete_saloon={$row['id']}'><i class='fas fa-trash'></i></a>
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


                <div class="modal fade" id="editSaloonMerchantModal" tabindex="-1" role="dialog"
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
                                <form id="editSaloonMerchantForm" enctype="multipart/form-data">
                                    <input type="hidden" name="sm_id" id="editSaloonMerchantId">
                                    <div class="form-group">
                                        <label for="editBusiName">Business Name</label>
                                        <input type="text" class="form-control" id="editSaloonBusiName"
                                            name="editSaloonBusiName">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Logo</label>
                                        <input type="file" class="form-control" name="editSaloonLogo"
                                            id="editSaloonLogo" required style="border-color: #007bff;">
                                    </div>

                                    <div class="form-group">
                                        <label for="editEmail">Email</label>
                                        <input type="email" class="form-control" id="editSaloonEmail"
                                            name="editSaloonEmail">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Location Map URL</label>
                                        <input type="url" class="form-control" name="editSaloonMap" id="editSaloonMap"
                                            style="border-color: #007bff;">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editFname">First Name</label>
                                                <input type="text" class="form-control" id="editSaloonFname"
                                                    name="editSaloonFname">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editLname">Last Name</label>
                                                <input type="text" class="form-control" id="editSaloonLname"
                                                    name="editSaloonLname">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Latitude</label>
                                                <input type="text" class="form-control" name="editSaloonLati"
                                                    id="editSaloonLati" style="border-color: #007bff;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Longitude</label>
                                                <input type="text" class="form-control" name="editSaloonLongi"
                                                    id="editSaloonLongi" style="border-color: #007bff;">
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
                                                <input type="number" class="form-control" id="editSaloonNumber"
                                                    name="editSaloonNumber" style="border-color: #007bff;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">WhatsApp Number</label>
                                                <input type="number" class="form-control" id="editSaloonWhatsNum"
                                                    name="editSaloonWhatsNum" style="border-color: #007bff;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Cnic</label>
                                        <input type="text" placeholder="XXXXX-XXXXXXX-X" class="form-control"
                                            name="editSaloonCnic" id="editSaloonCnic" style="border-color: #007bff;">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editPassword">Password</label>
                                                <input type="password" class="form-control" id="editSaloonPassword"
                                                    name="editSaloonPassword">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="editConfPassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="editSaloonConfPassword"
                                                    name="editSaloonConfPassword">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="updateSaloonMerchant" class="btn btn-primary">Save
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
        sectionParam = sectionParam || "sports";

        // Show/hide sections based on the sectionParam
        var sections = ['sports', 'saloon'];
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
    // saloon //
    $(document).ready(function() {
        $('.editSaloonMerchant').on('click', function() {
            var M_Id = $(this).data('sm_id');
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

            // Populate modal fields
            $('#editSaloonMerchantId').val(M_Id);
            $('#editSaloonMap').val(M_map);
            $('#editSaloonLati').val(M_lati);
            $('#editSaloonLongi').val(M_longi);
            $('#editSaloonCnic').val(M_cnic);
            $('#editSaloonWhatsNum').val(M_whats);
            $('#editSaloonBusiName').val(M_busi);
            $('#editSaloonEmail').val(M_email);
            $('#editSaloonFname').val(M_fname);
            $('#editSaloonLname').val(M_lname);
            // $('#editCity').val(M_city);
            $('#editSaloonNumber').val(M_number);
            $('#editSaloonPassword').val(M_pass);
            $('#editSaloonConfPassword').val(M_confpass);

            $('#editSaloonMerchantModal').modal('show');
        });

        $('#updateSaloonMerchant').on('click', function() {
            var formData = new FormData($('#editSaloonMerchantForm')[0]);

            $.ajax({
                type: 'POST',
                url: 'logic2.php',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#editSaloonMerchantModal').modal('hide');
                        window.location.href = 'section2.php?section=saloon';
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
    // saloon //




    // sports //
    $(document).ready(function() {
        $('.editSportMerchant').on('click', function() {
            var M_Id = $(this).data('sp_id');
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

            // Populate modal fields
            $('#editMerchantId').val(M_Id);
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

        $('#updateMerchant').on('click', function() {
            var formData = new FormData($('#editMerchantForm')[0]);

            $.ajax({
                type: 'POST',
                url: 'logic2.php',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#editMerchantModal').modal('hide');
                        window.location.href = 'section2.php?section=sports';
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



document.getElementById("togglePassword").addEventListener("click", function() {
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

document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
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

    $(document).ready(function() {
        $('#example1').DataTable();
        $('#example2').DataTable();
        $('#example3').DataTable();
        $('#example4').DataTable();
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