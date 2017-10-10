<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Naslovna - Xavier institute</TITLE>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/stil.css">
	<link rel="stylesheet" href="css/logo.css">
	<script src="javascript/kod.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
		
	<BODY>
	
	<div class="tijelo">
	<!-- Zaglavlje -->
		<div class="zaglavlje">
			<div id="logo">
			<div id="xy">
			<div class="x">X</div>
			<div class="y">Y</div>
			</div>
			<div id="logoTekst">
				<p>Xavier's School for</p>
				<p>Gifted Youngsters</p>
			</div>
			
			</div>
			
			<?php
			session_start();
			if(isset($_POST['logout'])){
				unset($_SESSION['login']);
				session_destroy();
				echo '<script>alert("Niste vise logovani!");</script>';
			}
				if(!isset($_SESSION['login']))
				print "<div><form id='login-forma' action='pages/admin.php' method='POST'>
					<fieldset>
					
					<label for='username' >Korisničko ime:</label>
					<input type='text' name='username' id='username'  maxlength='20' />
					 
					<label for='password' >Lozinka:</label>
					<input type='password' name='password' id='password' maxlength='20' />
					 
					<input type='submit' name='posalji' value='Log in' />
					
					</fieldset>
			</form></div>";
			if(isset($_SESSION['login'])){
				print "<div><form id='logout-forma' action='pages/admin.php' method='POST'><input type='submit' name='logout' value='Log out' /></form></div>";
			
			}
			?>
			
			
		<div class="meni"> 
			
				<ul>
					<li><a href="index.php">Početna</a></li>
					<li><a href="pages/novosti.php">Novosti</a></li>
					<li><a href="pages/linkovi.php">Korisni linkovi</a></li>
					<li><a href="pages/o-nama.php">O nama</a></li>
					<li><a href="pages/kontakt.php">Kontakt</a></li>
					<?php
					if(isset($_SESSION['login'])){
					print "<li><a href='pages/admin.php'>Admin Panel</a></li>";
					}
					?>
				</ul>
	
			</div>
		</div>
		<!-- Zaglavlje KRAJ -->
		
		
		<!-- Mainbody -->
		<div class="mainbody">
				<br>
				<div id="vijestiLeft">
					<ul>
						<li>
							<h3>Film "Deadpool" pokorio američki box office</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-30T11:49:00"></time>.</p>
							<img src="images/vijest1.jpg" alt="Deadpool">
							<p>Film "Deadpool" je na svom debiju pokorio američki box office zaradivši 135 miliona dolara. Zahvaljujući odličnom debiju u kinima, film "Deadpool" je postao najuspješniji od svih koji nose oznaku R, što znači da je zabranjen za osobe mlađe od 17 godina...</p>
						</li>
						<li>
							<h3>Prvi X-Men Apocalypse trailer</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-10T23:45:00"></time>.</p>
							<img src="images/vijest2.jpg" alt="Apocalypse">
							<p>Ako ste gledajući X-Men: Days of Future Past odsjedili iza završnice, imali ste priliku vidjeti kraći teaser za idući nastavak koji nosi naziv X-Men: Apocalypse. Špekulacije su od tada potvrđene pa znamo da će se X-Men ekipa u novom filmu boriti protiv Apocalypsea i njegova četiri jahača...</p>
						</li>
						<li>
							<h3>Prvi X-Men Apocalypse trailer</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-10T23:45:00"></time>.</p>
							<img src="images/vijest2.jpg" alt="Apocalypse">
							<p>Ako ste gledajući X-Men: Days of Future Past odsjedili iza završnice, imali ste priliku vidjeti kraći teaser za idući nastavak koji nosi naziv X-Men: Apocalypse. Špekulacije su od tada potvrđene pa znamo da će se X-Men ekipa u novom filmu boriti protiv Apocalypsea i njegova četiri jahača...</p>
						</li>
					</ul>
				</div>
				<div id="vijestiRight">
					<ul>
						<li>
							<h3>Prijemni ispit na Xavier's School for Gifted Youngsters</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-05-17T11:44:00"></time>.</p>
							<img src="images/vijest3.jpg" alt="Deadpool and Negasonic">
							<p>Na osnovu člana 125. Zakona o visokom obrazovanju ("Službene novine Kantona Sarajevo", br. 42/13 - prečišćeni tekst i 13/15), člana 95. Statuta Xavier Instituta u New Yorku i tačke III Odluke Vlade o davanju...</p>
						</li>
						<li>
							<h3>Biografija: Profesor Charles Francis Xavier</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-27T13:04:20"></time>.</p>
							<img src="images/vijest4.jpg" alt="Charles Xavier">
							<p>Charles Francis Xavier rođen je u New Yorku, oca Brian Xavier i majke, cijenjene naučnice u oblasti nuklearne fizike, Sharon Xavier. Nakon što je izgubio oca u saobraćajnoj nesreći, njegov prijatelj Kurt Marko stupa u brak s Sharon...</p>
						</li>
						<li>
							<h3>Biografija: Profesor Charles Francis Xavier</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-27T13:04:20"></time>.</p>
							<img src="images/vijest4.jpg" alt="Charles Xavier">
							<p>Charles Francis Xavier rođen je u New Yorku, oca Brian Xavier i majke, cijenjene naučnice u oblasti nuklearne fizike, Sharon Xavier. Nakon što je izgubio oca u saobraćajnoj nesreći, njegov prijatelj Kurt Marko stupa u brak s Sharon...</p>
						</li>
					</ul>
				</div>
		</div>
		
		<!-- Mainbody KRAJ -->

		</div>
	</BODY>
</html>

<script>
	$(".objavljeno").on('click', function(){
		$(this).parent().remove();
	});
</script>
