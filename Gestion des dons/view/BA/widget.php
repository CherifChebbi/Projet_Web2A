<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Culture Vibes</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="ena.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Fedi Zorai</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Publications</a>
                    <a href="widget.html" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Payement</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->



        

        <!-- Content Start -->
        <div class="content">
             <!-- Recent Sales Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Liste des paiements</h6>
                        
                    </div>
                    <div class="table-responsive">
                    <table style="border-collapse: collapse; border: 1px solid black;" align="center" width="70%">
  <tr>
    <th style="border: 1px solid black; padding: 10px; background-color: lightgray;">id</th>
    <th style="border: 1px solid black; padding: 10px; background-color: lightgray;">Societe</th>
    <th style="border: 1px solid black; padding: 10px; background-color: lightgray;">Montant</th>
    <th style="border: 1px solid black; padding: 10px; background-color: lightgray;">Payement</th>
    <th style="border: 1px solid black; padding: 10px; background-color: lightgray;">Wallet</th>
    <th style="border: 1px solid black; padding: 10px; background-color: lightgray;">Date</th>
  </tr>
  <?php
    $conn = mysqli_connect("localhost", "root", "", "projet");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM payement";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["id"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["nomsociete"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["montant"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["methode_payment"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["wallet_id"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["datee"] . "</td>
 
                    </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No Results</td></tr>";
    }
    mysqli_close($conn);
 
  ?>
  
</table>


                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Liste des factures</h6>
                        
                    </div>
                    <div class="table-responsive">

                    <table style="border-collapse: collapse; border: 1px solid black;" align="center" width="70%">
  <tr style="background-color: lightgray;">
    <th style="border: 1px solid black; padding: 10px;">facture_id</th>
    <th style="border: 1px solid black; padding: 10px;">Namee</th>
    <th style="border: 1px solid black; padding: 10px;">Montant</th>
    <th style="border: 1px solid black; padding: 10px;">Payement_id</th>
  </tr>
  <?php
    $conn = mysqli_connect("localhost", "root", "", "projet");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM facture";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["facture_id"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["namee"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["montant"] . "</td>
                    <td style='border: 1px solid black; padding: 10px;'>" . $row["payement_id"] . "</td>
                    
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No Results</td></tr>";
    }
    mysqli_close($conn);
  ?>

  
</table>


                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            


            <!-- Footer Start -->
            
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>