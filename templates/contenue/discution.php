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
	<script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>

    <style>
      


.chathistory{
	min-height:400px;
	width:600px;
	margin:10px auto;
	padding:10px;
	background:#f1f1f1;
	text-align:left;
}


.txtarea{
	min-height:100px;
	width:600px;
	margin:10px auto;
	padding:10px;
}

.siglemessage{
	font-size:12px;
	padding:5px;
	border-bottom:1px solid #b3b3b3;
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
									<a href="accueil.html" class="logo"><strong><h2 style= "color:Tomato;"> Discution </h2></strong></a>
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
								

							
                            <!-- Section -->
                            <div class="centeralised">
	
	<div class="chathistory"></div>

	<div class="chatbox">
		
		<form action="" method="POSTS">

			<textarea class="txtarea" id="message" name="message" placeholder="veuillez saisir votre message ..."></textarea>

		</form>

	</div>

	</div>
							<!-- Section -->
					

						<!-- Section -->
								

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

$(document).ready(function(){
			loadChat();
		});


		
		$('#message').keyup(function(e){


			var message = $(this).val();

			if( e.which == 13 ){

				$.post('ajax.php?action=SendMessage&message='+message, function(response){
					
					loadChat();
					$('#message').val('');

				});

			}

		});

		function loadChat()
		{
			$.post('ajax.php?action=getChat', function(response){
				
				$('.chathistory').html(response);

			});
		}


		setInterval(function(){
			loadChat();
		}, 2000);

	</script>
	</body>
</html>