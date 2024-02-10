<?php 

session_start();

	require_once '../../Controller/PublicationC.php';

if (isset($_POST['Edit']))
{
    $db = config::getConnexion();
    $moncef = $db->prepare('SELECT * FROM publication WHERE id_pub=:num');
    $moncef->bindValue(':num',$_GET['id_pub'], PDO::PARAM_INT);
    $moncef->execute();
    $publication = $moncef->fetch();
}
	if(isset($_POST['Post']))
	{
		$id_pub= $_POST['id_pub'];
		$Contenu = $_POST['Contenu'];
		
		date_default_timezone_set('Africa/Tunisia');
		$date_pub = date('Y-m-d H:i:s');

		$publication = new publicationC();
		$publication->setid($id_pub);
		$publication->setContenu($Contenu);
		$publication->setdate($date_pub);
		

		$publicationc = new publicationC();
		$publicationc ->updatePublication($publication);
		header('Location:afficher.php');

	}

	$dbh = config::getConnexion();
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	

?>
<!------------------------------------------------------------------------------------>
  <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title> Our Network </title>
    
    <link rel="stylesheet" href="css/styleP.css">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>


<body class="section-with-bg wow fadeInUp"
		style="visibility: visible; animation-name: fadeInUp;
			padding-top: 30px;
			padding-bottom: 60px;">
<div><h2 style="margin-left: 20px; font-family: Courier New, monospace;color:#f82249;">Culture Vibes</h2></div>
<header  style="
				padding-top: 60px;
				padding-bottom: 60px;">
	<div class="container">
	<div class="section-header">
		<h1 style="width: 950px;
		padding-left: 400px;"> Members Space </h1>
		<p> "Dear user feel free to share and comment on all your ideas and opinions !! "</p>
	</div>
</div>  
</header>
<!--/////////////////// sidebar /////////////////// -->
<div class="col-lg-6">
<div class="central-meta" style="
				width: 120%;;
				margin-left: 250px;
				border: 2px solid #ffe7e7;
				background-color: #ffe7e7;
				border-radius: 17px;
				padding-left: 15px;
				padding-top: 15px;
				padding-bottom: 15px;
				padding-right: 15px;">
	<div class="new-postbox">
		<figure>
			<img src="images/resources/<?= $publication['user_img'] ;?>" alt="">
		</figure>
		<div class="newpst-input">

			<form action="updatePublication.php" method="post" >
				<!---->
				<input type="hidden" name="id_pub" value="<?= $publication['id_pub'] ;?>">
				<input class="w3-input w3-border-0" type="text"  rows="2" name="Contenu" value="<?=$publication['Contenu'];?>">
				<!---->
				<div class="attachments">
					<ul>
						<li>
							<i class="fa fa-image"></i>
							<label class="fileContainer">
								<input type="file" name="image">
							</label>
						</li>
						<li>
							<button type="submit" name="Post">Update</button>
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
</div>
<!--//////////////////////////////////////////////////////////////////// -->
</div>
</body>	

</html>