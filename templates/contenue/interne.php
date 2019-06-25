<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<title>AESDT</title>
    <link rel="icon" href="../../img/aesdt.jpg" >
    <style>
            img {
      /* border-radius: 50%; */
      margin-top: 20px;
    }
    * {
      box-sizing: border-box;
    }
    
    p{
    }
    
    .column {
      float: left;
      width: 33.33%;
      padding: 5px;
    }
    
    /* Clearfix (clear floats) */
    .row::after {
      content: "";
      clear: both;
      display: table;
    }
    </style>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="accueil.html" class="logo"><strong><h2 style= "color:Tomato;">Les Internes</h2></strong></a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="https://www.facebook.com/groups/110679775623615/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<!-- <li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									 -->
									</ul>
								</header>


								<!-- Php -->

		
							<!-- Banner -->
							
							<div class="row">
							<?php
                $connect = new PDO('mysql:host=localhost;dbname=projet', 'root', '');  
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
               
                $query = "SELECT * FROM personnes WHERE type_personne=1";

                try {
                   $pdo_select = $connect->prepare($query);
                   
                   $pdo_select->execute();

                   $NbreData = $pdo_select->rowCount();

                   $rowAll = $pdo_select->fetchAll(); // pour recupere les donne qui se trouve dans la basse de donne et on stocke dans fetchall
             } 
             catch (PDOException $e)
             { 
                     echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
           }
         
           if ($NbreData != 0) 
           {
               ?>

   <?php
// pour chaque ligne (chaque enregistrement)
foreach ( $rowAll as $row ) 
{
   // DONNEES A AFFICHER dans chaque cellule de la ligne
?>
  <div class="column">
		<img src="<?php 
		if(!$row['photo']=='')
		{
			echo $row['photo'];
		} else 
		{
			echo '../../img/smiley.jpg';
		}
		
		
		?>"  style="width:200px"> 
		<p><strong>Nom :</strong><?php echo $row['nom']; ?><br>       
                <strong>Prenom :</strong> <?php echo $row['prenom']; ?> <br>       
                <strong>Adresse :</strong> <?php echo $row['adresse']; ?><br>
                <strong>Hopital :</strong> <?php echo $row['etablissement']; ?><br>
                <strong>Filiere :</strong> <?php echo $row['filiere']; ?></p>
	</div>
	<!-- <div class="column">
    <img src="../../img/cover.jpg" alt="Snow" style="width:200px"> <p><strong>President (Wais omar)</strong></p>
	</div> -->

	<?php
} // fin foreach
?>

<?php
} else { ?>
<!-- pas de données à afficher -->
<?php
}
?>
</div>

							
							<!-- Section -->
							<!-- Section -->
						

							<!-- php -->
                            <!-- <h4>Left &amp; Right</h4>
                            <p><span class="image left"><img src="../../img/cover.jpg" alt="" /></span>Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
                            <p><span class="image right"><img src="images/pic02.jpg" alt="" /></span>Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
                           <br><br>
                            <p><span class="image left"><img src="../../img/cover.jpg" alt="" /></span>Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
 -->

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="accueil.html">Accueil</a></li>
										<li><a href="etudiant.php">Etudiants</a></li>
										<li><a href="interne.php">Medecins</a></li>
										<li><a href="membre.html">Membres du Bureau </a></li>
										<li><a href="discution.php">Discution</a></li>
										<li><a href="photo.html">Photo</a></li>
										<!-- <li><a href="generic.html">Vote</a></li> -->
										<li><a href="profil.php">Profil</a></li>
										<li><a href="../login/logout.php">Se Deconnecte</a></li>
										
								</nav>

							

							<!-- Section -->
								<section>
									<header class="major">
										<h2>contact</h2>
									</header>
									<!-- <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p> -->
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
										<li class="fa-phone">(000) 000-0000</li>
										<li class="fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Souhaib.R <a href="https://www.facebook.com/baba.lilli">ici</a>.
								</footer>

						</div>
					</div>

			</div>

		
	</body>
</html>