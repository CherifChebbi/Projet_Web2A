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
                    <a href="widget.html" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Donations</a>
                    <a href="form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Reclamations</a>
                    <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>User</a>
                
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
try {
    $dsn = "mysql:host=localhost;dbname=projet_web";
    $username = "root";
    $password = "";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM payement";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
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
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
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
$dsn = "mysql:host=localhost;dbname=projet_web";
$username = "root";
$password = "";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM facture";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
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
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
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