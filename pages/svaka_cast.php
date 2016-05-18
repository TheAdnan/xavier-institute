<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Svaka čast - Xavier institute</TITLE>
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
	<!-- Zaglavlje -->
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
		
		<!-- Mainbody stranice -->
		<div class="mainbody">
			<h2>Svaka čast</h2>
		</div>
		<!--Mainbody stranice KRAJ-->

		</div>
	</BODY>
</html>