<?php
session_start();  
if(isset($_SESSION["id_auto"]))
{
       $s =$_SESSION["id_auto"];
}

try {
        $connect = new PDO('mysql:host=localhost;dbname=projet', 'root', '');  
         $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    
         try {
    
            $statement = $connect->prepare("SELECT * FROM personnes INNER JOIN type_personne WHERE id_authentification = ? and personnes.type_personne= id_type_personne"); 
            // var_dump($statement);
        //    var_dump($statement) ;
           $statement->execute(
                array(  
                        $s
                )     
           ); 
           
           $count = $statement->rowCount();  
           if($count > 0)  
           {  
               $userinfo = $statement->fetch();
                $_SESSION["id_personne"] =  $userinfo["id_personne"]; 
                $_SESSION["nom"] = $userinfo["nom"]; 
                $_SESSION["prenom"] = $userinfo["prenom"]; 
                $_SESSION["telephone"] = $userinfo["telephone"]; 
                $_SESSION["email"] = $userinfo["email"]; 
                $_SESSION["adresse"] = $userinfo["adresse"]; 
                $_SESSION["etablissement"] = $userinfo["etablissement"]; 
                $_SESSION["filiere"] = $userinfo["filiere"]; 
                $_SESSION["an_univ"] = $userinfo["an_univ"];
                $_SESSION["photo"] = $userinfo["photo"];
                $_SESSION["type_personne"] = $userinfo["type_personne"]; 
                // $_SESSION["naissance"] = $userinfo["naissance"]; 
                 
        }
        // var_dump($userinfo["filiere"]) ;
        
        } catch (\Throwable $th) {
            
        }
    } catch (\Throwable $th) {
       
    }


    $_SESSION["id_personne"] =  $userinfo["id_personne"]; 
    $_SESSION["nom"] = $userinfo["nom"]; 
    $_SESSION["prenom"] = $userinfo["prenom"]; 
?>


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
        <link rel="stylesheet" href="../../css/profil.css" />
		<title>AESDT</title>
		<link rel="icon" href="../../img/aesdt.jpg" >
		<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../../js/lightbox.js"></script>
        <link rel="stylesheet" href="../../css/lightbox.css" />
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="accueil.html" class="logo"><strong><h2 style= "color:Tomato;">Votre Profil</h2></strong></a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="https://www.facebook.com/groups/110679775623615/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<!-- <li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									 -->
									</ul>
								</header>

							<!-- Banner -->
							<!-- <div id="aniimated-thumbnials">
									<a href="#" class="image"><img src="../../img/cover1.jpg" alt="" /></a>
									<a href="#" class="image"><img src="../../img/cover1.jpg" alt="" /></a>
									...
								</div> -->
						

								<section>
                                        
                                        <div class="container emp-profile">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="profile-img">
                                                                <!-- ici pour le photo -->
                                                                <img src="<?php 
                                                                if(!$userinfo["photo"]=="")
                                                                {
                                                                     echo $userinfo["photo"]; 
                                                                }else 
                                                                {
                                                                    echo '../../img/smiley.jpg';
                                                                }
                                                               
                                                                
                                                                ?>" alt=""/>
                                                                <div class="file btn btn-lg btn-primary">
                                                                    Change Photo
                                                                    <!-- <input type="file" name="file"/> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="profile-head">
                                                                        <h5>
                                                                        <?php echo  $userinfo["nom"].' '.$userinfo["prenom"] ?>
                                                                        </h5>
                                                                        <h6>
                                                                        <?php echo  $userinfo["type_personne"]?>
                                                                        </h6>
                                                                        <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                                                                <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                                                    </li>
                                                                </ul> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="profile-work">
                                                            <!-- <label>telephone :<p> <?php echo  $userinfo["naissance"]; ?> </p>  </label><br> -->
                                                             <label>telephone :<p> <?php echo  $userinfo["telephone"]; ?> </p>  </label><br>
                                                             <label>Email :<p> <?php echo  $userinfo["email"]; ?> </p>  </label><br>
                                                             <label>Adresse :<p> <?php echo  $userinfo["adresse"]; ?> </p>  </label><br>
                                                             <label>Etablissement :<p> <?php echo  $userinfo["etablissement"] ?> </p>  </label><br>
                                                             <label>Filiere :<p> <?php echo  $userinfo["filiere"] ?> </p>  </label><br>
                                                             <label>Niveau :<p> <?php echo  $userinfo["an_univ"] ?> </p>  </label><br>
                                                            
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </form>           
                                            </div>
									
									</section>
	
						
						


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
<script>
$('#aniimated-thumbnials').lightGallery({
    thumbnail:true,
    animateThumb: false,
    showThumbByDefault: false
});

</script>
		
	</body>
</html>