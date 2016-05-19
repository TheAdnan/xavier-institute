<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Novosti - Xavier institute</TITLE>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stil.css">
	<link rel="stylesheet" href="../css/logo.css">
	<script src="../javascript/kod.js"></script>
	<script src="../javascript/filtriranje.js"></script>
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
				print "<div><form id='login-forma' action='admin.php' method='POST'>
					<fieldset>
					
					<label for='username' >Korisničko ime:</label>
					<input type='text' name='username' id='username'  maxlength='20' />
					 
					<label for='password' >Lozinka:</label>
					<input type='password' name='password' id='password' maxlength='20' />
					 
					<input type='submit' name='posalji' value='Log in' />
					
					</fieldset>
			</form></div>";
			if(isset($_SESSION['login'])){
				print "<div><form id='logout-forma' action='admin.php' method='POST'><input type='submit' name='logout' value='Log out' /></form></div>";
			
			}
			?>
			
		<div class="meni"> 
			
				<ul>
					<li><a href="../index.php">Početna</a></li>
					<li><a href="novosti.php">Novosti</a></li>
					<li><a href="linkovi.php">Korisni linkovi</a></li>
					<li><a href="o-nama.php">O nama</a></li>
					<li><a href="kontakt.php">Kontakt</a></li>
					<?php
					if(isset($_SESSION['login'])){
					print "<li><a href='admin.php'>Admin Panel</a></li>";
					}
					?>
				</ul>
	
			</div>
		</div>
		<!-- Zaglavlje KRAJ -->
		
		
		<!-- Mainbody -->
		<div class="mainbody">
		 <select id="filter" onchange="sortuj(this.value);">
			<option value="dan" id="danas">Današnje novosti</option>
			<option value="sedmica" id="ove-sedmice">Novosti ove sedmice</option>
			<option value="mjesec" id="ovog-mjeseca">Novosti ovog mjeseca</option>
			<option value="sve" id="sve" selected="selected">Sve novosti</option>
		</select> 
		
		<input type='submit' name='sortiraj' id='sortiraj' value='Sortiraj po abecedi' />
				<br>
				<br>
				<br>
						<div class="nowost">
							<h3>Film "Deadpool" pokorio američki box office</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-05-19T09:09:00"></time>.</p>
							<img src="../images/vijest1.jpg" alt="Deadpool">
							<p>Film "Deadpool" je na svom debiju pokorio američki box office zaradivši 135 miliona dolara. Zahvaljujući odličnom debiju u kinima, film "Deadpool" je postao najuspješniji od svih koji nose oznaku R, što znači da je zabranjen za osobe mlađe od 17 godina...</p>
						</div>
						<div class="nowost">
							<h3>Prvi X-Men Apocalypse trailer</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-05-19T00:45:00"></time>.</p>
							<img src="../images/vijest2.jpg" alt="Apocalypse">
							<p>Ako ste gledajući X-Men: Days of Future Past odsjedili iza završnice, imali ste priliku vidjeti kraći teaser za idući nastavak koji nosi naziv X-Men: Apocalypse. Špekulacije su od tada potvrđene pa znamo da će se X-Men ekipa u novom filmu boriti protiv Apocalypsea i njegova četiri jahača...</p>
						</div>
						<div class="nowost">
							<h3>Apocalypse Sneak Peek</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-05-18T20:00:00"></time>.</p>
							<img src="../images/apocalypse.jpg" alt="apocalypse-1">
							<p>Film "Deadpool" je na svom debiju pokorio američki box office zaradivši 135 miliona dolara. Zahvaljujući odličnom debiju u kinima, film "Deadpool" je postao najuspješniji od svih koji nose oznaku R, što znači da je zabranjen za osobe mlađe od 17 godina...</p>
						</div>
						<div class="nowost">
							<h3>Apocalypse poster #1</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-20T13:45:00"></time>.</p>
							<img src="../images/apocalypse-1.jpg" alt="Apocalypse">
							<p>Ako ste gledajući X-Men: Days of Future Past odsjedili iza završnice, imali ste priliku vidjeti kraći teaser za idući nastavak koji nosi naziv X-Men: Apocalypse. Špekulacije su od tada potvrđene pa znamo da će se X-Men ekipa u novom filmu boriti protiv Apocalypsea i njegova četiri jahača...</p>
						</div>
						<div class="nowost">
							<h3>Behind the scenes slike</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-27T20:10:00"></time>.</p>
							<img src="../images/behind-the-scenes.jpg" alt="Deadpool">
							<p>Film "Deadpool" je na svom debiju pokorio američki box office zaradivši 135 miliona dolara. Zahvaljujući odličnom debiju u kinima, film "Deadpool" je postao najuspješniji od svih koji nose oznaku R, što znači da je zabranjen za osobe mlađe od 17 godina...</p>
						</div>
						<div class="nowost">
							<h3>Charles and Eric poster</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-30T23:45:00"></time>.</p>
							<img src="../images/eric-xavier.jpg" alt="Apocalypse">
							<p>Ako ste gledajući X-Men: Days of Future Past odsjedili iza završnice, imali ste priliku vidjeti kraći teaser za idući nastavak koji nosi naziv X-Men: Apocalypse. Špekulacije su od tada potvrđene pa znamo da će se X-Men ekipa u novom filmu boriti protiv Apocalypsea i njegova četiri jahača...</p>
						</div>
					<div class="nowost">
							<h3>Prijemni ispit na Xavier's School for Gifted Youngsters</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-30T00:11:00"></time>.</p>
							<img src="../images/vijest3.jpg" alt="Deadpool and Negasonic">
							<p>Na osnovu člana 125. Zakona o visokom obrazovanju ("Službene novine Kantona Sarajevo", br. 42/13 - prečišćeni tekst i 13/15), člana 95. Statuta Xavier Instituta u New Yorku i tačke III Odluke Vlade o davanju...</p>
						</div>
					<div class="nowost">
							<h3>Biografija: Profesor Charles Francis Xavier</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-16T13:04:00"></time>.</p>
							<img src="../images/vijest4.jpg" alt="Charles Xavier">
							<p>Charles Francis Xavier rođen je u New Yorku, oca Brian Xavier i majke, cijenjene naučnice u oblasti nuklearne fizike, Sharon Xavier. Nakon što je izgubio oca u saobraćajnoj nesreći, njegov prijatelj Kurt Marko stupa u brak s Sharon...</p>
						</div>
					<div class="nowost">
							<h3>Trumpocalypse</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2012-03-30T00:11:00"></time>.</p>
							<img src="../images/trumpocalypse.jpg" alt="Deadpool and Negasonic">
							<p>Na osnovu člana 125. Zakona o visokom obrazovanju ("Službene novine Kantona Sarajevo", br. 42/13 - prečišćeni tekst i 13/15), člana 95. Statuta Xavier Instituta u New Yorku i tačke III Odluke Vlade o davanju...</p>
						</div>
					<div class="nowost">
							<h3>Biografija: Wolverine</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-29T13:14:00"></time>.</p>
							<img src="../images/wolverine.jpg" alt="Charles Xavier">
							<p>Charles Francis Xavier rođen je u New Yorku, oca Brian Xavier i majke, cijenjene naučnice u oblasti nuklearne fizike, Sharon Xavier. Nakon što je izgubio oca u saobraćajnoj nesreći, njegov prijatelj Kurt Marko stupa u brak s Sharon...</p>
						</div>
					<div class="nowost">
							<h3>X-Men Posteri - Drugi dio</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-03-30T00:11:00"></time>.</p>
							<img src="../images/x-men-poster.jpg" alt="Deadpool and Negasonic">
							<p>Na osnovu člana 125. Zakona o visokom obrazovanju ("Službene novine Kantona Sarajevo", br. 42/13 - prečišćeni tekst i 13/15), člana 95. Statuta Xavier Instituta u New Yorku i tačke III Odluke Vlade o davanju...</p>
						</div>
					<div class="nowost">
							<h3>X-Men Posteri - Prvi dio</h3>
							<p class="objavljeno">Objavljeno<time class="vrijemeObjave" datetime="2016-04-01T13:04:00"></time>.</p>
							<img src="../images/x-men-poster-2.jpg" alt="Charles Xavier">
							<p>Charles Francis Xavier rođen je u New Yorku, oca Brian Xavier i majke, cijenjene naučnice u oblasti nuklearne fizike, Sharon Xavier. Nakon što je izgubio oca u saobraćajnoj nesreći, njegov prijatelj Kurt Marko stupa u brak s Sharon...</p>
						</div>
		</div>
		
		<!-- Mainbody KRAJ -->

		</div>
	</BODY>
</html>