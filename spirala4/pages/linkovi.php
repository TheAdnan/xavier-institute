<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Korisni linkovi - Xavier institute</TITLE>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stil.css">
	<link rel="stylesheet" href="../css/logo.css">
</head>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
	<BODY>
	
	<div class="tijelo">
		<div class="zaglavlje">
			<div id="logo">
			<div class="x">X</div>
			<div class="y">Y</div>
			
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
		
		<div class="mainbody">
			<br>
			<br>
			<div id="linkovi">
			<ul>
				<li><a href="http://marvel.wikia.com/wiki/Xavier's_School_for_Gifted_Youngsters" target=_blank>Xavier's School for Gifted Youngsters - Wiki</a></li>
				<li><a href="https://academyx.wikispaces.com/Xavier's+School+for+Gifted+Youngsters" target=_blank>Xavier Mansion</a></li>
				<li><a href="http://io9.gizmodo.com/5837961/10-reasons-why-xaviers-school-for-gifted-youngsters-would-be-a-horrible-place-to-be-educated" target=_blank>10 reasons why you wouldn't like Xavier's Institute</a></li>
				<li><a href="http://marvel.com/comics/characters/1009268/deadpool" target=_blank>Deadpool Comics</a></li>
				<li><a href="http://xmenmovies.wikia.com/wiki/X-Men:_Apocalypse" target=_blank>X-Men Apocalypse</a></li>
			</ul>
			</div>
		</div>

		</div>
	</BODY>
</html>