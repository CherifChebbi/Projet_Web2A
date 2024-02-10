<?php
include '../../Controller/personne.php';

$error = "";

$user = null;

$userP = new UserP();

if (isset($_POST['Semail']) && isset($_POST['Spassword'])) {
    if (!empty($_POST['Semail']) && !empty($_POST['Spassword'])) {
        $user = $userP->getUserByEmailAndPassword($_POST['Semail'], $_POST['Spassword']);
        if ($user != null) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location:../Event1/index.html');
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Missing information";
    }
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

<div id="error">
        <?php echo $error; ?>
    </div>
  
         <div class="container-fluid pt-4 px-4" CEN>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            
                            <form action="" method="POST">
                           
    

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control"  id="Semail" name="Semail"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="Spassword" id="Spassword">
                                </div>

                                <button type="submit" class="btn btn-primary" name="button">login</button>
                            </form>
                        </div>
                    </div>

</body>
</html>