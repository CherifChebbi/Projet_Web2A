<?php
include '../../Controller/personne.php';

$error = "";

$user = null;

$userP = new UserP();
if (
    isset($_POST['Iduser']) &&
    isset($_POST['Name']) &&
    isset($_POST['Surname']) &&
    isset($_POST['Age']) &&
    isset($_POST['Gender']) &&
    isset($_POST['Semail']) &&
    isset($_POST['Spassword'])&&
    isset($_POST['Img'])

) {

    if (
        !empty($_POST["Iduser"]) &&
        !empty($_POST["Name"]) &&
        !empty($_POST["Surname"]) &&
        !empty($_POST["Age"]) &&
        !empty($_POST["Gender"]) &&
        !empty($_POST["Semail"]) &&
        !empty($_POST["Spassword"])&&
        !empty($_POST["Img"])
        
    ) {

        $existingUser = $userP->getUserByEmail($_POST["Semail"]);
        if ($existingUser != null) {
            // The email already exists
            $error = "This email is already registered.";
        } else {
            $file = $_FILES['Img']['name'];
            $file_loc = $_FILES['Img']['tmp_name'];
            $folder="images/"; 
            $new_file_name = strtolower($file);
            $final_file=str_replace(' ','-',$new_file_name);
    
            if(move_uploaded_file($file_loc,$folder.$final_file))
            {
                $User->setImg($final_file);
            }
            else
            {
                echo "error";
            }
        $user = new User(
            $_POST["Iduser"],
            $_POST["Name"],
            $_POST["Surname"],
            $_POST["Age"],
            $_POST["Gender"],
            $_POST["Semail"],
            $_POST["Spassword"],
            $_POST["Img"]
            
        );
       



        // Create a new UserP object and call the addUser method to insert the user into the database
        $userP->addUser($user);
        
        // Redirect to the user list page
        header('Location:../Event1/index.html');
    }
    } else
        $error = "Missing information";
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
  <center>  <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p></center>
    <hr>

    <div class="container-fluid">

  
         <div class="container-fluid pt-4 px-4" CEN>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            
                            <form action="" method="POST">
                            <div class="mb-3">
                                    <label  class="form-label">ID </label>
                                    <input type="text" name="Iduser" class="form-control" id="Iduser">
                                </div> 
                            <div class="mb-3">
                                
                                    <label  class="form-label">FirstName</label>
                                    <input type="text" name="Name" class="form-control" id="Name">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Last Name</label>
                                    <input type="text" name="Surname" class="form-control" id="Surname">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Age</label>
                                    <input type="text" name="Age" class="form-control" id="Age">
                                </div> 
                                <div class="mb-3">
                                <label class="form-label">Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Gender" id="genderMale" value="male">
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Gender" id="genderFemale" value="female">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                            </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control"  id="Semail" name="Semail"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="Spassword" id="Spassword">
                                </div>

                                <div class="mb-3">
                                <label for="formFile" class="form-label">insert img</label>
                                <input class="form-control" type="file" name="Img" id="Img">
                                </div>
                                
                                <button type="submit" class="btn btn-primary" name="button">signup</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            
                    </center>
</body>
<!-- Custom JavaScript File -->
<script src="../back/js/form-validation.js"></script>
</html>