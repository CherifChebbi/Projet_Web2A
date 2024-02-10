<?php
include 'Gestion de user/Controller/personne.php';
$UserP= new UserP();
$list = $UserP->listusers();
$count = $UserP->countUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="back/img/" rel="icon">

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
                        <img class="rounded-circle" src="admin2.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Cherif Chebbi</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    
                    <a href="userslist.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>User list</a>
                    <a href="crud.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>crud</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
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
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="admin2.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Cherif Chebbi</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
          

    <center>
        <h1>List of users</h1>
        <h2>
            <a href="addaccount.php">Add user</a>
        </h2>
    </center>
    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total users</p>
                                <h6 class="mb-0"><?php echo ($count); ?></h6>
                            </div>
                        </div>
                    </div>
    <input class="form-control border-0" type="search" placeholder="Search" id="search_text">

<div class="table-responsive" id="table-data">
    <table border="1" align="center" width="70%" class="table text-start align-middle table-bordered table-hover mb-0" id="users-table">
        <tr>
            <th>Id user</th>
            <th>First Name</th>
            <th>surname</th>
            <th>Age</th>
            <th>Gender</th>
            <th>email</th>
            <th>password</th>
            <th>Image</th>
            <th>Update</th>
            <th>Delete</th>
            <th>View</th>
        </tr>
        <?php
        foreach ($list as $user) {
        ?>
            <tr>
                <td><?= $user['Iduser']; ?></td>
                <td><?= $user['Name']; ?></td>
                <td><?= $user['Surname']; ?></td>
                <td><?= $user['Age']; ?></td>
                <td><?=$user['Gender']; ?></td>
                <td><?= $user['Semail']; ?></td>
                <td><?= $user['Spassword']; ?></td>

                <td><img src="images/<?= $user['Img'] ?>" alt="User image"></td>

                <td align="center">
                    <form method="POST" action="updateuser.php">
                        <input type="submit" name="update" value="Update" class="btn btn-secondary m-2">
                        <input type="hidden" value="<?php echo $user['Iduser']; ?>" name="Iduser">
                    </form>
                </td>
                <td align="center">
                    <a href="deleteuser.php?Iduser=<?php echo $user['Iduser']; ?>" class="text-danger">Delete</a>
                </td>

                <td align="center">
                    <a href="viewuser.php?Iduser=<?php echo $user['Iduser']; ?>" class="text-info">View</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    <form method="post" action="stat.php">
        <button type="submit"  class="btn btn-primary m-2">statistics</button>
    </form>
    
    <form method="post" action="alluserpdf.php">
        <button type="submit" class="btn btn-warning m-2">Generate PDF</button>
    </form>
    </div>
    </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
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

<script>
    // Get the table and table rows
    var table = document.querySelector("table");
    var rows = table.querySelectorAll("tr");

    // Attach click event listeners to each column header
    var idHeader = table.querySelector("th:nth-child(1)");
    idHeader.addEventListener("click", function() {
        // Get the table rows again, except for the header row
        rows = Array.from(table.querySelectorAll("tr:not(:first-child)"));

        // Sort the rows based on the ID column as an integer
        rows.sort(function(a, b) {
            var idA = parseInt(a.querySelector("td:nth-child(1)").textContent);
            var idB = parseInt(b.querySelector("td:nth-child(1)").textContent);
            return idA - idB;
        });

        // Clear the table body and add the sorted rows back
        var tbody = table.querySelector("tbody");
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

    var nameHeader = table.querySelector("th:nth-child(2)");
    nameHeader.addEventListener("click", function() {
        // Get the table rows again, except for the header row
        rows = Array.from(table.querySelectorAll("tr:not(:first-child)"));

        // Sort the rows based on the Name column text
        rows.sort(function(a, b) {
            var nameA = a.querySelector("td:nth-child(2)").textContent.toUpperCase();
            var nameB = b.querySelector("td:nth-child(2)").textContent.toUpperCase();
            if (nameA < nameB) return -1;
            if (nameA > nameB) return 1;
            return 0;
        });

        // Clear the table body and add the sorted rows back
        var tbody = table.querySelector("tbody");
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

    var surnameHeader = table.querySelector("th:nth-child(3)");
    surnameHeader.addEventListener("click", function() {
        // Get the table rows again, except for the header row
        rows = Array.from(table.querySelectorAll("tr:not(:first-child)"));

        // Sort the rows based on the Surname column text
        rows.sort(function(a, b) {
            var surnameA = a.querySelector("td:nth-child(3)").textContent.toUpperCase();
            var surnameB = b.querySelector("td:nth-child(3)").textContent.toUpperCase();
            if (surnameA < surnameB) return -1;
            if (surnameA > surnameB) return 1;
            return 0;
        });

        // Clear the table body and add the sorted rows back
        var tbody = table.querySelector("tbody");
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

    var ageHeader = table.querySelector("th:nth-child(4)");
    ageHeader.addEventListener("click", function() {
        // Get the table rows again, except for the header row
        rows = Array.from(table.querySelectorAll("tr:not(:first-child)"));

        // Sort the rows based on the Age column as an integer
        rows.sort(function(a, b) {
            var ageA = parseInt(a.querySelector("td:nth-child(4)").textContent);
            var ageB = parseInt(b.querySelector("td:nth-child(4)").textContent);
            return ageA - ageB;
        });

        // Clear the table body and add the sorted rows back
        var tbody = table.querySelector("tbody");
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

    var genderHeader=table.querySelector("th:nth-child(5)");
    genderHeader.addEventListener("click", function() {
    rows = Array.from(table.querySelectorAll("tr:not(:first-child)"));
    rows.sort(function(a, b) {
        var genderA = a.querySelector("td:nth-child(5)").textContent.toUpperCase();
            var genderB = b.querySelector("td:nth-child(5)").textContent.toUpperCase();
            if (genderA < genderB) return -1;
            if (genderA > genderB) return 1;
            return 0;
    });
            var tbody = table.querySelector("tbody");
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

    var emailHeader = table.querySelector("th:nth-child(6)");
    emailHeader.addEventListener("click", function() {
        // Get the table rows again, except for the header row
        rows = Array.from(table.querySelectorAll("tr:not(:first-child)"));

        // Sort the rows based on the Email column text
        rows.sort(function(a, b) {
            var emailA = a.querySelector("td:nth-child(6)").textContent.toUpperCase();
            var emailB = b.querySelector("td:nth-child(6)").textContent.toUpperCase();
            if (emailA < emailB) return -1;
            if (emailA > emailB) return 1;
            return 0;
        });

        // Clear the table body and add the sorted rows back
        var tbody = table.querySelector("tbody");
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

    var passwordHeader = table.querySelector("th:nth-child(7)");
    passwordHeader.addEventListener("click", function() {
        // Get the table rows again, except for the header row
        rows = Array.from(table.querySelectorAll("tr:not(:first-child)"));

        // Sort the rows based on the Password column text
        rows.sort(function(a, b) {
            var passwordA = a.querySelector("td:nth-child(7)").textContent.toUpperCase();
            var passwordB = b.querySelector("td:nth-child(7)").textContent.toUpperCase();
            if (passwordA < passwordB) return -1;
            if (passwordA > passwordB) return 1;
            return 0;
        });

        // Clear the table body and add the sorted rows back
        var tbody = table.querySelector("tbody");
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

        
        

    </script>

    <script type="text/javascript">


        $(document).ready(function() {
            $("#search_text").keyup(function() {
                var search = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'post',
                    data: {
                        query: search
                    },
                    success: function(response) {
                        $("#table-data").html(response);
                    }
                });
            });
        })


    </script>



</html>