<?php 
	require_once '../../Controller/PublicationC.php';
    require_once '../../Controller/CommentaireC.php';

	$PublicationC = new PublicationC();
    $CommentaireC = new CommentaireC();
//----------------------------------------//
    $num_per_page = 4;
    $page_num = isset($_GET['page']) ? $_GET['page'] : 1;
    $start_index = ($page_num - 1) * $num_per_page;
    $publications = $PublicationC->getPublications($start_index, $num_per_page);
    $total_records = $PublicationC->getTotalRecords();
    $total_pages = ceil($total_records / $num_per_page);

//---------------------------------------//
   

    if (isset($_GET['label']) && !empty($_GET['label'])) {
        $list = $PublicationC->showPublication($_GET['label']);
    } else {
	    $list = $PublicationC->listPublication();
    }
    //------------------------//
    
    if (isset($_GET['label2']) && !empty($_GET['label2'])) {
        $list2 = $CommentaireC->showCommentaire($_GET['label2']);
    } else {
	    $list2 = $CommentaireC->listCommentaire2();
    }
    //------------------------//
    if (isset($_POST['all'])) 
    {
        $list = $PublicationC->listPublication();
    }
    if (isset($_POST['all2'])) 
    {
        $list2 = $CommentaireC->listCommentaire2();
    }
    //------------------------//
    if (isset($_POST['Delete'])) 
    {
        $Publication = new PublicationC();
        $Publication->deletePublication($_GET['id_pub']);
        header('location:table.php');
    }	
    if (isset($_POST['Delete2'])) 
    {
        $Commentaire = new CommentaireC();
        $Commentaire->deleteCommentaire($_GET['id']);
        header('location:table.php');
    }	
    //-------------------------------------//
    $pdo =config::getConnexion();

    // Nombre total de publications
    $sql = 'SELECT COUNT(*) AS total_publications FROM publication';
    $stmt = $pdo->query($sql);
    $total_publications = $stmt->fetch()['total_publications'];
    
    echo 'Nombre total de publications : ' . $total_publications . '<br>';
    
    // Nombre total de commentaires
    $sql = 'SELECT COUNT(*) AS total_commentaires FROM commentaire';
    $stmt = $pdo->query($sql);
    $total_commentaires = $stmt->fetch()['total_commentaires'];
    ///
    if ($total_publications > 0) {
        $sql = 'SELECT AVG(nb_commentaires) AS moyenne_commentaires FROM (SELECT COUNT(*) AS nb_commentaires FROM commentaire GROUP BY id_pub) AS subquery';
        $stmt = $pdo->query($sql);
        $moyenne_commentaires = round($stmt->fetch()['moyenne_commentaires'], 2);
    }
    ///
    $sql = 'SELECT MAX(date_pub) AS publication_la_plus_recente FROM publication';
    $stmt = $pdo->query($sql);
    $publication_la_plus_recente = $stmt->fetch()['publication_la_plus_recente'];
    ///
    $sql = 'SELECT MAX(date_com) AS commentaire_le_plus_recent FROM commentaire';
    $stmt = $pdo->query($sql);
    $commentaire_le_plus_recent = $stmt->fetch()['commentaire_le_plus_recent'];
    //-------------------------------------//
   

    
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style>
		canvas {
			max-width: 800px;
			margin: 0 auto;
		}
	</style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <img class="rounded-circle" src="admin2.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Cherif Chebbi</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="table.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Publications</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Donations</a>
                    <a href="form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Reclamations</a>
                    <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    
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
            <div class="container-fluid pt-4 px-4" id="menu">
                <div class="row g-4" style="margin-top: 25px;margin-bottom: 20px;">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                                <p class="mb-2">Recent Post:</p>
                                <h5 class="mb-0"> <?php echo  $publication_la_plus_recente ; ?></h5>    
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                                <p class="mb-2">Recent Comment:</p>
                                <h5 class="mb-0"><?php echo $commentaire_le_plus_recent  ; ?></h5>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-address-card fa-3x text-primary"></i> 
                                <table>
                                    <tr><p class="mb-2">Total Posts:</p></tr>
                                    <tr> <h5 class="mb-0"><?php echo  $total_publications ; ?></h5></tr>
                                    <tr><th rowspan="2"><a href="#tabpub" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a></th></tr>
                                </table>   
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-comments fa-3x text-primary"></i>
                                <table>
                                    <tr><p class="mb-2">Total Comments:</p></tr>
                                    <tr> <h5 class="mb-0"><?php echo  $total_commentaires ; ?></h5></tr>
                                    <tr> <th rowspan="2"><a href="#tabcom" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a></th></tr>
                                </table>    
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                                <table>
                                    <tr><p class="mb-2">Publications statistique:</p></tr>
                                    <tr> <th rowspan="2"><a href="#stat" class="block-anchor panel-footer">View statistique  <i class="fa fa-arrow-right"></i></a></th></tr>
                                </table>             
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <table>
                                <tr> <p class="mb-2">Comments per post:</p></tr>
                                <tr>  <h5 class="mb-0"><?php echo  $moyenne_commentaires ; ?></h5></tr>  
                            </table>             
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-bell fa-3x text-primary"></i>
                                <table>
                                    <tr><p class="mb-2">Notifications:</p></tr>
                                    <div class="stat-panel text-center">
                                        <?php 
                                        $dbh = config::getConnexion();
                                            $reciver = 'Admin';
                                            $sql12 ="SELECT id from notification where notireciver = (:reciver)";
                                            $query12 = $dbh -> prepare($sql12);;
                                            $query12-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
                                            $query12->execute();
                                            $results12=$query12->fetchAll(PDO::FETCH_OBJ);
                                            $regbd2=$query12->rowCount();
                                        ?>
                                    <div class="stat-panel-number h5 "><?php echo htmlentities($regbd2);?></div>
                                    
                                    <tr> <th rowspan="2"><a href="#notif" class="block-anchor panel-footer">View Notifications  <i class="fa fa-arrow-right"></i></a></th></tr>
                                </table>             
                        </div>
                    </div>
                    
                </div>
            </div>
            <br><br><br><br><br>
           <!------------------------------------------------NOTIFICATIONS----------------------------------------------------------->
            <div class="container-fluid pt-4 px-4" id="notif">
                <div class="bg-light text-center rounded p-4 "style="
                                margin-top: 150px;
                                margin-bottom: 200px;">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Notifications:</h6>
                        <a href="#menu">Return</a>
                    </div>
                    <div>
                    <?php 
                        $dbh = config::getConnexion();
                        $reciver = 'Admin';
                        $sql = "SELECT * from  notification where notireciver = (:reciver) order by time DESC";
                        $query = $dbh -> prepare($sql);
                        $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result){				
                        ?>	
                        <h6 style="background:#ededed;padding:20px;"><i class="fa fa-bell text-primary"></i>&nbsp;&nbsp;<b class="text-primary"><?php echo htmlentities($result->time);?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($result->notiuser);?> -----> <?php echo htmlentities($result->notitype);?></h5>
                        <?php $cnt=$cnt+1; }} ?>
                    </div>
                </div>
            </div>
       

        
                                


            <!--STATISTIQUES---------------------------------------------------------------------------------------------------------> 
        
            <div class="container-fluid pt-4 px-4" id="stat">
                    <div class="bg-light text-center rounded p-4" style="
                                margin-top: 110px;
                                margin-bottom: 150px;
                            ">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Statistiques des publications:</h6>
                            <a href="#menu">Return</a>
                        </div>
                        <div>
                    
                <canvas id="myChart"width="875" height="437" style="display: block; box-sizing: border-box; height: 350px; width: 700px;"></canvas>

                <?php
                $pdo =config::getConnexion();

                // Nombre de publications par mois
                $sql = 'SELECT MONTH(date_pub) AS mois, COUNT(*) AS nombre_publications FROM publication GROUP BY mois';
                $stmt = $pdo->query($sql);
                $data = array();
                while ($row = $stmt->fetch()) {
                    $data[$row['mois']] = $row['nombre_publications'];
                }
                ?>

                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                            datasets: [{
                                label: 'Nombre de publications',
                                data: [
                                    <?php echo isset($data[1]) ? $data[1] : 0; ?>,
                                    <?php echo isset($data[2]) ? $data[2] : 0; ?>,
                                    <?php echo isset($data[3]) ? $data[3] : 0; ?>,
                                    <?php echo isset($data[4]) ? $data[4] : 0; ?>,
                                    <?php echo isset($data[5]) ? $data[5] : 0; ?>,
                                    <?php echo isset($data[6]) ? $data[6] : 0; ?>,
                                    <?php echo isset($data[7]) ? $data[7] : 0; ?>,
                                    <?php echo isset($data[8]) ? $data[8] : 0; ?>,
                                    <?php echo isset($data[9]) ? $data[9] : 0; ?>,
                                    <?php echo isset($data[10]) ? $data[10] : 0; ?>,
                                    <?php echo isset($data[11]) ? $data[11] : 0; ?>,
                                    <?php echo isset($data[12]) ? $data[12] : 0; ?>
                                ],
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 2
                            }]
                        },
                        options:
                        {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                });
                </script>
                </div>
            </div>
        
       

            <!-- Table PUBLICATIONS -->
            
            
            <div class="container-fluid pt-4 px-4" id="tabpub">
                <div class="bg-light text-center rounded p-4" style="
                                        margin-top: 100px;
                                        margin-bottom: 100px;
                                    ">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Tableau des publications</h6>
                        <a href="#menu">Return</a>
                    </div>
                    <div class="d-flex mb-2">
                        <form action="" method="GET">
                            <table>
                                <tr>
                                    <td> <input class="form-control bg-transparent" type="date" name="label" id="label" placeholder="Entrer la date "></td>
                                    <td> <button type="submit" value="Search" class="btn btn-primary ms-2">Find</button></td>
                                    <td>
                                        <form action="table.php" method="post">
                                            <button type="submit" value="submit" name="all2" class="btn btn-primary ms-2">All</button></td>
                                        </form>   
                                    </td>
                                </tr>
                            </table>  
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#id_pub</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                 
                                    foreach($publications as $publication){
                                    ?>
                                        <tr>
                                            <td><?=$publication['id_pub'];?></td>
                                            <td><?=$publication['contenu'];?></td>
                                            <td><?=$publication['date_pub'];?></td>                                   
                                            <td>
                                                <form action="table.php?id_pub=<?=$publication['id_pub'];?> " method="post">
                                                <!----> 
                                                    <button  class="btn btn-sm btn-primary"  type="submit" name="Delete2">Delete</button>	
                                                </form>	 
                                            </td>
                                        </tr>
                                    <?php
                                   
                                    }
                                    ?>                
                                </tbody>
                        </table>
                        <div>
                        <nav aria-label="Page navigation" style="ext-align: end !important;">
                                        <ul class="pagination justify-content-end" style="padding-left: 770px;">
                                            <?php if ($page_num > 1) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $page_num - 1 ?>#tabpub" aria-label="Précédent">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                                <li class="page-item <?= $page_num == $i ? 'active' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $i ?>#tabpub"><?= $i ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <?php if ($page_num < $total_pages) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $page_num + 1 ?>#tabpub" aria-label="Suivant">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                    <style>
                                        .pagination {
                                            margin-top: 20px;
                                        }

                                        .page-item {
                                            display: inline-block;
                                            margin-right: 5px;
                                        }

                                        .page-item.active .page-link {
                                            background-color: #007bff;
                                        }

                                        .page-link {
                                            color: #007bff;
                                            background-color: #fff;
                                            border: none;
                                            border-radius: 0;
                                            font-size: 0.7rem;
                                            padding: 0.2rem 0.4rem;
                                        }

                                        .page-link:hover {
                                            color: #007bff;
                                            background-color: #e9ecef;
                                        }
                                    </style>
                                    </div>
                    </div>
                </div>
               
            </div>
            
            <!-- Table Commentaires --> 
            <div class="container-fluid pt-4 px-4"  id="tabcom">
                <div class="bg-light text-center rounded p-4"style="
                                        margin-top: 70px;
                                    ">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Tableau des Commentaires</h6>
                        <a href="#menu">Return</a>
                    </div>
                    <div class="d-flex mb-2">
                        <form action="" method="GET">
                            <table>
                                <tr>
                                    <td> <input class="form-control bg-transparent" type="date" name="label2" id="label" placeholder="Entrer la date "></td>
                                    <td> <button type="submit" value="Search" class="btn btn-primary ms-2">Find</button></td>
                                    <td>
                                        <form action="table.php" method="post">
                                            <button type="submit" value="submit" name="all" class="btn btn-primary ms-2">All</button></td>
                                        </form>   
                                    </td>
                                </tr>
                            </table>  
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#id</th>
                                        <th scope="col">#id_pub</th>
                                        <th scope="col">Contenu_com</th>
                                        <th scope="col">Date_com</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     
                                    foreach($list2 as $commentaire){
                                    ?>
                                        <tr>
                                            <td><?=$commentaire['id'];?></td>
                                            <td><?=$commentaire['id_pub'];?></td>
                                            <td><?=$commentaire['contenu_com'];?></td>
                                            <td><?=$commentaire['date_com'];?></td>                                   
                                            <td>
                                                <form action="table.php?id=<?=$commentaire['id'];?> " method="post">
                                                <!----> 
                                                    <button  class="btn btn-sm btn-primary"  type="submit" name="Delete2">Delete</button>	
                                                </form>	 
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    
                                    ?>       
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
        <!-----------------------------------------------------------------------------------------------------------> 
        <!------------------------------------------------------------------------------------------------------------->
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            
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

</html>