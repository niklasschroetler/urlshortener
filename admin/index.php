<!--

=========================================================
* Argon Dashboard - v1.1.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>URL Shortener Admin</title>
    
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    
    <!-- TODO: Install Google Fonts locally -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet"/>
    <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet"/>
    <link href="./assets/css/argon-dashboard.css?v=1.1.1" rel="stylesheet"/>
</head>

<body class="">
    <?php
		include '../db.php';
	
		if($debug) {
			ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
		}
	
		$db = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
		if (!$db) {
			header("Location: ".$CONNECTION_UNSUCCESSFUL_TARGET);
			die;
		}
	
//        if ($urldata = mysqli_query($db, "SELECT * FROM `".$DB_PREFIX."urls` WHERE `slug` LIKE '".$slug."' LIMIT 1")) {
//            if($urldata -> num_rows == 0) {
//                header("Location: ".$LOOKUP_UNSUCCESSFUL_TARGET);
//                die;
//            } else {
//                $res = ($urldata -> fetch_row());
//
//                $status = $res[2];
//                $url = $res[3];
//
//                echo PHP_EOL."Status: ".$status.", Target: ".$url;
//
//                switch ($status) {
//                    case "active":
//                        header("Location: ".$url);
//                        break;
//                    case "tempdisabled":
////                        header("Location: ".$TEMPDISABLED_TARGET);
//                        break;
//                    case "removed":
////                        header("Location: ".$REMOVED_TARGET);
//                        break;
//                    default:
////                        header("Location: ".$LOOKUP_UNSUCCESSFUL_TARGET);
//                        break;
//                }
//            }
//        }
//        else {
//            header("Location: ".$INTERNAL_ERROR_TARGET);
//        }
	
		mysqli_close($db);
        
        
        $email = "accounts@schroetlerdev.de";
        $username = "niklasschroetler";
        
        $totalURLCount = 132;
        $activeURLCount = 112;
        $tempdisabledURLCount = 9;
        $disabledURLCount = 5;
		$lastShortened = [
			["slug" => "abc",
				"url" => "http://nschroetler.de",
				"status" => "active"]
		];
        
		$avamd = trim($email);
		$avamd = strtolower( $avamd );
		$avamd = md5( $avamd );
		$avaurl = "https://www.gravatar.com/avatar/".$avamd;
    ?>


    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="./index.php">
                <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="<?php echo $avaurl ?>">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Your Profile</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                <img src="./assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active" href="./index.php">
                            <i class="ni ni-tv-2 text-primary"></i> Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/profile.html">
                            <i class="ni ni-single-02 text-orange"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/tables.html">
                            <i class="ni ni-bullet-list-67 text-yellow"></i> All URLs
                        </a>
                    </li>
                </ul>
                
                <!-- Divider -->
                <hr class="my-3">
                
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Help</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/niklasschroetler/urlshortener">
                            <i class="ni ni-spaceship"></i> View on GitHub
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/niklasschroetler/urlshortener/blob/master/README.md">
                            <i class="ni ni-book-bookmark"></i> Documentation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/niklasschroetler/urlshortener/issues">
                            <i class="ni ni-support-16"></i> Submit ideas and bugs
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Overview</a>
                
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="<?php echo $avaurl ?>">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $username ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Your Profile</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total URLs</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $totalURLCount ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Active URLs</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $activeURLCount ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Temporarily disabled URLs</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $tempdisabledURLCount ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Disabled URLs</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $disabledURLCount ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-trash"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Quick URL creation</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="URL">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Slug (optional)">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="col-md-12 btn btn-primary" type="button">Generate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-12">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Last shortened</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">
                                                    Slug
                                                </th>
                                                <th scope="col">
                                                    URL
                                                </th>
                                                <th scope="col">
                                                    Status
                                                </th>
                                                <th scope="col">User</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                                foreach ($lastShortened as $item) {
                                                    echo '<tr>';
                                                        echo '<th scope="row" class="name">';
                                                            echo '<div class="media align-items-center">';
                                                                echo '<div class="media-body">';
                                                                    echo '<span class="mb-0 text-sm">'.$item["slug"].'</span>';
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</th>';
                                                        echo '<td class="budget">';
                                                            echo $item["url"];
                                                        echo '</td>';
                                                        echo '<td class="status">';
                                                            echo '<span class="badge badge-dot mr-4">';
                                                                echo '<i class="bg-success"></i> '.$item["status"];
                                                            echo '</span>';
                                                        echo '</td>';
                                                        echo '<td class="status">';
                                                            echo '<span class="badge badge-dot mr-4">';
                                                                echo 'nschroetler';
                                                            echo '</span>';
                                                        echo '</td>';
                                                        echo '<td class="text-right">';
                                                            echo '<div class="dropdown">';
                                                                echo '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                                                    echo '<i class="fas fa-ellipsis-v"></i>';
                                                                echo '</a>';
                                                                echo '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">';
                                                                    echo '<a class="dropdown-item" href="#">Mark as temporarily disabled</a>';
                                                                    echo '<a class="dropdown-item" href="#">Mark as disabled</a>';
                                                                    echo '<a class="dropdown-item text-danger" href="#">Delete permanently</a>';
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Footer -->
            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; 2019 Coded by <a href="https://schroetlerdev.de" class="font-weight-bold ml-1" target="_blank">Niklas Schrötler Development</a>,&nbsp;&nbsp;&nbsp;Theme by <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">License</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">Theme License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    
    <!--   Core   -->
    <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Argon JS   -->
    <script src="./assets/js/argon-dashboard.min.js?v=1.1.1"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</body>
</html>