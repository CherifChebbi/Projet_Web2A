
<?php
require_once '../../Controller/CommentaireC.php';



    $Commentaire = new CommentaireC();
    $Commentaire->deleteCommentaire($_GET['id']);
    header('location:afficher.php');
   

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title> Our Network </title>
    
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>

<!--/////////////////// sidebar /////////////////// -->
<div class="col-lg-6">
<div class="central-meta">
	<div class="new-postbox">
		<figure>
			<img src="images/resources/admin2.jpg" alt="">
		</figure>
		<div class="newpst-input">

			<form action="addPublication.php" method="post" >
				<textarea rows="2" placeholder="write something" name="Contenu" minlength="5" maxlength="300" required></textarea>
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
<!--//////////////////////////////////////////////////////////////////// -->
<!------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------>  
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
<?php
foreach($list as $publication){
 ?>
    <div class="central-meta item"style="border-radius: 17px;
											left: 250px;">
	<div class="user-post">
		<div class="friend-info">
			<figure>
				<img src="images/resources/admin2.jpg" alt="">
			</figure>
			<div class="friend-name">
				<ins><a href="profil.html" title="">Cherif Chebbi</a></ins>
				
                <span>Publiee:<?=$publication['date_pub'];?></span>
            </div>

			<!--<div class="newpst-input">-->
				
					<div class="attachments" style="border: -4px solid #ffffff;">
						<ul>
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
						</ul>
					</div>
				</form>
			<!--</div>-->
					
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
								<ins>0</ins>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
<!------------------------------- COMMENT AREA --------------------------------->
<div class="coment-area">
	<ul class="we-comet">
		<li>
			<a href="#" title="" class="showmore underline">more comments</a>
		</li>
		<li class="post-comment">
			<div class="comet-avatar">
				<img src="images/resources/admin2.jpg" alt="">
			</div>
			<div class="post-comt-box">
				
				<form action="addCommentaire.php" method="post" >
					<textarea placeholder="Post your comment"name="Contenu_com"  minlength="5" maxlength="100" required></textarea>
					<div class="add-smiles">
						<span class="em em-expressionless" title="add icon"></span>
					</div>
					
					<button type="submit"  name="Post_com">ok</button>
				</form>	
			</div>
		</li>
	</ul>
</div>
	</div>
</div>                   
                    
<!-------------------------------------------------------------->             
                

<?php
}
?>    
<!------------------------------------------------------------------------------>

<!-- POST1 EXEMPLE -->
<div class="loadMore">

	<div class="central-meta item">
	<div class="user-post">
		<div class="friend-info">
			<figure>
				<img src="images/resources/friend-avatar10.jpg" alt="">
			</figure>
			<div class="friend-name">
				<ins><a href="time-line.html" title="">Hedi Zaiem</a></ins>
				<span>Publiee:Avril,5 7:PM</span>
			</div>
			<div class="post-meta">
				<img src="images/resources/fallouja.jpg" alt="">
				<div class="we-video-info">
					<ul>
						<li>
							<span class="like" data-toggle="tooltip" title="like">
								<i class="ti-heart"></i>
								<ins>2.2k</ins>
							</span>
						</li>
						<li>
							<span class="comment" data-toggle="tooltip" title="Comments">
								<i class="fa fa-comments-o"></i>
								<ins>52</ins>
							</span>
						</li>
					</ul>
				</div>
				<div class="description">
					
					<p>
						En réalisant des chiffres record en termes d’audimat, la série! <b><u>Fallujah</u></b> met en scène un groupe d’adolescents avec des troubles sociaux et mentaux: consommation d’alcool, violence, un milieu scolaire anormal, une relation toxique avec  l’administration du lycée… Cette description de la jeunesse tunsienne été largement critiquées sur les réseaux sociaux !!!
					</p>
				</div>
			</div>
		</div>
		<div class="coment-area">
			<ul class="we-comet">
				<li>
					<div class="comet-avatar">
						<img src="images/resources/comet-1.jpg" alt="">
					</div>
					<div class="we-comment">
						<div class="coment-head">
							<h5><a href="time-line.html" title="">Mourad rouge</a></h5>
							<span>Publiee:Avril,5 8:PM</span>
							<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
						</div>
						<p><b>Merci pour l'equipe du site </b>ala el moussalsel mezyen barcha w fih barcha naked lel wekaa je le recommande!</p>
					</div>
					<ul>
						<li>
							<div class="comet-avatar">
								<img src="images/resources/fedi.jpg" alt="">
							</div>
							<div class="we-comment">
								<div class="coment-head">
									<h5><a href="time-line.html" title="">Fedi Zorai</a></h5>
									<span>Publiee:Avril,5 9:PM</span>
									<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
								</div>
								<p>Louled li andou insta maram yabeeth bellehi!</p>
							</div>
						</li>
						<li>
							<div class="comet-avatar">
								<img src="images/resources/comet-1.jpg" alt="">
							</div>
							<div class="we-comment">
								<div class="coment-head">
									<h5><a href="time-line.html" title="">Mourad Rouge</a></h5>
									<span>Avril,5 10:PM</span>
									<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
								</div>
								<p>AHHAHAHAHHAHAHAHHAHAHAHAHHAHAHA</p>
							</div>
						</li>
					</ul>
				</li>
				<li>
					<div class="comet-avatar">
						<img src="images/resources/1.jpg" alt="">
					</div>
					<div class="we-comment">
						<div class="coment-head">
							<h5><a href="time-line.html" title="">Rabie Bouden</a></h5>
							<span>Avril,6 6:PM</span>
							<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
						</div>
						<p>Wiouuuuuu !!!!!
							<i class="em em-smiley"></i>
						</p>
					</div>
				</li>
				<li>
					<a href="#" title="" class="showmore underline">more comments</a>
				</li>
				<li class="post-comment">
					<div class="comet-avatar">
						<img src="images/resources/admin2.jpg" alt="">
					</div>
					<div class="post-comt-box">
						<form method="post">
							<textarea placeholder="Post your comment"></textarea>
							<div class="add-smiles">
								<span class="em em-expressionless" title="add icon"></span>
							</div>
							<div class="smiles-bunch">
								<i class="em em---1"></i>
								<i class="em em-smiley"></i>
								<i class="em em-anguished"></i>
								<i class="em em-laughing"></i>
								<i class="em em-angry"></i>
								<i class="em em-astonished"></i>
								<i class="em em-blush"></i>
								<i class="em em-disappointed"></i>
								<i class="em em-worried"></i>
								<i class="em em-kissing_heart"></i>
								<i class="em em-rage"></i>
								<i class="em em-stuck_out_tongue"></i>
							</div>
							<button type="submit"></button>
						</form>	
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>

<!--//////////////////////////////////////////////////////////////////// -->
<!-- POST2 EXEMPLE -->
<div class="central-meta item">
	<div class="user-post">
		<div class="friend-info">
			<figure>
				<img src="images/resources/admin2.jpg" alt="">
			</figure>
			<div class="friend-name">
				<ins><a href="time-line.html" title="">Cherif Chebbi</a></ins>
				<span>Publiee:Mars,5 9:PM</span>
			</div>

			<div class="newpst-input">
				<form method="post">
					<div class="attachments">
						<ul>
						<li>
							<form action="updatePublication.php" method="post">
								<button type="submit">Edit</button>
							</form>	  
						</li>
						<li>
							<form action="deletePublication.php" method="post">
								<button type="submit">Delete</button>
							</form>	  	
						</li>
						</ul>
					</div>
				</form>
			</div>
					
			<div class="post-meta">
				<img src="images/resources/john.jpg" alt="">
				
				<div class="we-video-info">
					<ul>
						<li>
							<span class="like" data-toggle="tooltip" title="like">
								<i class="ti-heart"></i>
								<ins>2.2k</ins>
							</span>
						</li>
						<li>
							<span class="comment" data-toggle="tooltip" title="Comments">
								<i class="fa fa-comments-o"></i>
								<ins>52</ins>
							</span>
						</li>
					</ul>
				</div>
				<div class="description">
					
					<p>
						Le fameux film d'action américain <b><u>JOHN WICK</u></b> est disponible maintenant sur les sites les amiss un tres bon film go watch!!!!!!
					</p>
				</div>
			</div>
		</div>
		<div class="coment-area">
			<ul class="we-comet">
				<li>
					<div class="comet-avatar">
						<img src="images/resources/comet-1.jpg" alt="">
					</div>
					<div class="we-comment">
						<div class="coment-head">
							<h5><a href="time-line.html" title="">Mourad Rouge</a></h5>
							<span>Publiee:Mars,5 11:PM</span>
							<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
						</div>
						<p>le meuilleur site pour le divertissement culturel ,Vraiment une experience d'utilisation tres speciale !!! </p>
					</div>

				</li>
				
				<li>
					<a href="#" title="" class="showmore underline">more comments</a>
				</li>
				<li class="post-comment">
					<div class="comet-avatar">
						<img src="images/resources/admin2.jpg" alt="">
					</div>
					<div class="post-comt-box">
						<form method="post">
							<textarea placeholder="Post your comment"></textarea>
							<div class="add-smiles">
								<span class="em em-expressionless" title="add icon"></span>
							</div>
							<div class="smiles-bunch">
								<i class="em em---1"></i>
								<i class="em em-smiley"></i>
								<i class="em em-anguished"></i>
								<i class="em em-laughing"></i>
								<i class="em em-angry"></i>
								<i class="em em-astonished"></i>
								<i class="em em-blush"></i>
								<i class="em em-disappointed"></i>
								<i class="em em-worried"></i>
								<i class="em em-kissing_heart"></i>
								<i class="em em-rage"></i>
								<i class="em em-stuck_out_tongue"></i>
							</div>
							<button type="submit"></button>
						</form>	
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>


</div>
</body>	

</html>