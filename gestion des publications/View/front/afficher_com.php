<?php 
session_start();
	require_once '../../Controller/PublicationC.php';
	require_once '../../Controller/CommentaireC.php';
	
	$_SESSION['id_pub'] = $_GET['id_pub'];
	$id_pub = $_SESSION['id_pub'];

    $PublicationC = new PublicationC();
	$list = $PublicationC->listPublication_id($_SESSION['id_pub']);

    $PublicationC = new PublicationC();
	//$list2 = $PublicationC->listPublication2($_SESSION['id_pub']);

	$CommentaireC = new CommentaireC();
	$list_com = $CommentaireC->listCommentaire($_GET['id_pub']);
	//----------------------------------------//
    $num_per_page = 4;
    $page_num = isset($_GET['page']) ? $_GET['page'] : 1;
    $start_index = ($page_num - 1) * $num_per_page;
    $publications = $PublicationC->getPublications($start_index, $num_per_page);
    $total_records = $PublicationC->getTotalRecords();
    $total_pages = ceil($total_records / $num_per_page);

	
	//----------------------------------------------//
	$dbh = config::getConnexion();
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
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
<!------------------------------------------------------------------------------>
<!------------------------------------ sidebar ---------------------------------- -->
<div class="col-lg-6" style="left: 150px;">
<div class="central-meta" style="border: 2px solid #f82249;
								border-radius: 17px;
								padding: 13px;">
	<div class="new-postbox">
		<figure>
			<img src="images/resources/<?php echo htmlentities($result->image);?>" alt="">
		</figure>
		<div class="newpst-input">
			<form action="addPublication.php" method="post" >
			<input type="hidden" name="user_id" value="<?php echo htmlentities($result->id); ?>">
			<input type="hidden" name="user" value="<?php echo htmlentities($result->name); ?>">
			<input type="hidden" name="user_img" value="<?php echo htmlentities($result->image); ?>">
				<textarea rows="2" placeholder="write something" name="Contenu"  minlength="5" maxlength="300" required></textarea>
				<div class="attachments">
					<ul>
						<li>
							<i class="fa fa-image"></i>
							<label class="fileContainer">
								<input type="file" name="image">
							</label>
						</li>
						<li>
							<button type="submit" name="Post">Post</button>
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
</div>
<!------------------------------------------------------------------------------>
<!-----------------------AFFICHAGE DES PUBLICATIONS ----------------------------->  
<section style="
				width=100%;
				border: 2px solid #ffe7e7;
				background-color: #ffe7e7;
				border-radius: 17px;
				padding-left: 15px;
				padding-top: 15px;
				padding-bottom: 15px;
				padding-right: 15px;
				margin-left: 250px;
				margin-right: -250px;">	
	
	<!-- Affichage des publications existantes--->
	
<!------------------------------------------------------------------------------>
<?php
	foreach($publications as $publication){
        if($publication['id_pub'] == $_GET['id_pub']){

                    foreach($list as $publication){
                    ?>
                    <div class="central-meta item"style="border-radius: 17px;">
                        <div class="user-post">
                            <div class="friend-info">
                                <figure>
                                    <img src="images/resources/<?=$publication['user_img'];?>" alt="">
                                </figure>
                                <div class="friend-name">
                                    <ins><a href="profil.html" title=""><?=$publication['user'];?></a></ins>
                                    
                                    <span>Publiee:<?=$publication['date_pub'];?></span>
                                </div>
                                        <div class="attachments" style="border: -4px solid #ffffff;">
                                            <ul>
											<?php 
											if($publication['user_id'] == $result->id) {
											?>
                                                <li>
                                                    <form action="updatePublication.php?id_pub=<?=$publication['id_pub'];?>" method="post">
                                                        <!---->
                                                        <button type="submit" name="Edit">Edit</button>
                                                    </form>	  
                                                </li>
                                                <li>
                                                    <form action="deletePublication.php?id_pub=<?=$publication['id_pub'];?> " method="post">
                                                        <!----> 
                                                        <button type="submit" name="Delete">Delete</button>	
                                                    </form>	  	
                                                </li>
											<?php
											}
											?>
                                            </ul>
                                        </div>
                                <!------------- contenu_pub---------------->		
                                <div class="post-meta">
                                    <!---->
                                    <div class="description">
                                        <p>
                                            <!----> <?=$publication['Contenu'];?>
                                        </p>
                                    </div>
                                    <div class="we-video-info">
                                        <ul>
                                            <li>
                                                <span class="like" data-toggle="tooltip" title="like">
                                                    <i class="ti-heart"></i>
                                                    <ins>0</ins>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="comment" data-toggle="tooltip" title="Comments">
                                                    <i class="fa fa-comments-o"></i>
                                                    <ins></ins>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p style="text-align: center"><a href="afficher_com.php?id_pub=<?php echo htmlspecialchars($publication['id_pub']); ?>">View comments</a></p>

                            <!-- Affichage des commentaires associés à cette publication-->
                            <?php
                            foreach ($list_com as $commentaire) {
                            ?>
                                <div>	
                                    <ul class="we-comet" >
                                        <li>
                                            <div class="comet-avatar">
                                                <img src="images/resources/<?=$commentaire['user_img'];?>" alt="">
                                            </div>
                                            <div class="we-comment">
                                                <div class="coment-head">
                                                    <h5><a href="time-line.html" title=""><?=$commentaire['user'];?></a></h5>
                                                    <span><?=$commentaire['date_com'];?></span><!------------------------------------>
                                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                </div>
                                                <p><?=$commentaire['contenu_com'];?><!----------------------------------->
                                                    <i class="em em-smiley"></i>
                                                </p>
												<div class="attachments" style="border: -4px solid #ffffff;">
													<ul style="margin-left: 55px;margin-top: -59px;padding-left: 0;">
													<?php 
													if($commentaire['user_id'] == $result->id) {
													?>
														<li>
															<form action="updateCommentaire.php?id=<?=$commentaire['id'];?>" method="post">
																<!---->
																<button type="submit" name="Edit">U</button>
															</form>	  
														</li>
														<li>
															<p><a href="deleteCommentaire.php?id=<?php echo htmlspecialchars($commentaire['id']); ?>">X</a></p>
														</li>
													<?php
													}
													?>	
													</ul>
                                        		</div>
                                            </div>
											
                                        </li>
                                    </ul>
                                </div>
								
                            <?php	
                            }
                            ?>	
                            <div class="coment-area">
                                <!-------------------------- ADD COMMENT ----------------------------------->	
                                <ul class="we-comet">
                                    
                                    <li class="post-comment">
                                        <div class="comet-avatar">
                                            <img src="images/resources/<?php echo htmlentities($result->image);?>" alt="">
                                        </div>
                                        <div class="post-comt-box">
                                            <form action="addCommentaire.php" method="post">
												<input type="hidden" name="user_id" value="<?php echo htmlentities($result->id); ?>">
												<input type="hidden" name="user" value="<?php echo htmlentities($result->name); ?>">
												<input type="hidden" name="user_img" value="<?php echo htmlentities($result->image); ?>">
                                                <textarea placeholder="Post your comment" name="contenu_com"></textarea><!---------------->
                                                
                                                    <input type="hidden" name="id_pub" value="<?=$publication['id_pub'];?>">
                                                    <button type="submit" class="btn btn-outline-primary mb-2" name="Post">ok</button>    
                                            </form>	
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                   
                <?php
                }
                continue; // passe à la prochaine itération si l'id à exclure est trouvé
                ?>    
				<?php
				}
				?>
			

	<div class="central-meta item"style="border-radius: 17px;">
		<div class="user-post">
			<div class="friend-info">
				<figure>
					<img src="images/resources/<?=$publication['user_img'];?>" alt="">
				</figure>
				<div class="friend-name">
					<ins><a href="profil.html" title=""><?=$publication['user'];?></a></ins>
					
					<span>Publiee:<?=$publication['date_pub'];?></span>
				</div>
						<div class="attachments" style="border: -4px solid #ffffff;">
							<ul>
							<?php 
							if($publication['user_id'] == $result->id) {
							?>
								<li>
									<form action="updatePublication.php?id_pub=<?=$publication['id_pub'];?>" method="post">
										<!---->
										<button type="submit" name="Edit">Edit</button>
									</form>	  
								</li>
								<li>
									<form action="deletePublication.php?id_pub=<?=$publication['id_pub'];?> " method="post">
										<!----> 
										<button type="submit" name="Delete">Delete</button>	
									</form>	  	
								</li>
							<?php
							}
							?>	
							</ul>
						</div>
				<!------------- contenu_pub---------------->		
				<div class="post-meta">
					<!---->
					<div class="description">
						<p>
							<!----> <?=$publication['contenu'];?>
						</p>
					</div>
					<div class="we-video-info">
						<ul>
							<li>
								<span class="like" data-toggle="tooltip" title="like">
									<i class="ti-heart"></i>
									<ins>0</ins>
								</span>
							</li>
							<li>
								<span class="comment" data-toggle="tooltip" title="Comments">
									<i class="fa fa-comments-o"></i>
									<ins><?=$publication['nb_commentaires'];?></ins>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<p style="text-align: center"><a href="afficher_com.php?id_pub=<?php echo htmlspecialchars($publication['id_pub']); ?>">View comments</a></p>

			
			<div class="coment-area">
				<!-------------------------- ADD COMMENT ----------------------------------->	
				<ul class="we-comet">
					
					<li class="post-comment">
						<div class="comet-avatar">
							<img src="images/resources/<?php echo htmlentities($result->image);?>" alt="">
						</div>
						<div class="post-comt-box">
							<form action="addCommentaire.php" method="post">
								<input type="hidden" name="user_id" value="<?php echo htmlentities($result->id); ?>">
								<input type="hidden" name="user" value="<?php echo htmlentities($result->name); ?>">
								<input type="hidden" name="user_img" value="<?php echo htmlentities($result->image); ?>">
								<textarea placeholder="Post your comment" name="contenu_com"></textarea><!---------------->
								
									<input type="hidden" name="id_pub" value="<?=$publication['id_pub'];?>">
									<button type="submit" class="btn btn-outline-primary mb-2" name="Post">ok</button>
							</form>	
						</div>
					</li>
				</ul>
				<!-------------------------------------------------------------------------->
			</div>
		</div>
	</div>                   
	<?php
	}
	?>    

<!------------------------------------------------------------------------------>
</div>
</section>
<hr>
<nav aria-label="Page navigation" style="ext-align: end !important;">
	<ul class="pagination justify-content-end" style="padding-left: 770px;">
		<?php if ($page_num > 1) : ?>
			<li class="page-item">
				<a class="page-link" href="?page=<?= $page_num - 1 ?><?php if (!empty($id_pub)) { echo "&id_pub=$id_pub"; } ?>" aria-label="Précédent">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
		<?php endif; ?>
		<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
			<li class="page-item <?= $page_num == $i ? 'active' : '' ?>">
				<a class="page-link" href="?page=<?= $i ?><?php if (!empty($id_pub)) { echo "&id_pub=$id_pub"; } ?>"><?= $i ?></a>
			</li>
		<?php endfor; ?>
		<?php if ($page_num < $total_pages) : ?>
			<li class="page-item">
				<a class="page-link" href="?page=<?= $page_num + 1 ?><?php if (!empty($id_pub)) { echo "&id_pub=$id_pub"; } ?>" aria-label="Suivant">
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
 
</body>	

</html>