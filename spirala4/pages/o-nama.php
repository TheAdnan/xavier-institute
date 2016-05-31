<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>O nama - Xavier institute</TITLE>
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
		
		<!-- Mainbody stranice -->
		<div class="mainbody">
		<br>
			<div id="intro">
				<p>Xavier's School for Gifted Youngsters je specijalna institucija osnovana od strane Profesora Charles Xavier za obuku mladih mutanta u kontrolisanju njihovih nadljudskih moći i održavanju prijateljskog mutant-čovjek odnosa sa ostatkom svijeta.</p>
			</div>
			<div class="nastava-tabela">
				<table id="tejbl">
					<tr id="naslovi">
						<th>Predmet</th>
						<th>Profesor</th>
						<th>Termin predavanja</th>
						<th>Studenti sa primarnom mutacijom</th>
						<th>Studenti sa sekundarnom mutacijom</th>
					</tr>
					<tr class="neparni">
						<td>Etika</td>
						<td>Charles Xavier</td>
						<td>10:00h</td>
						<td>20</td>
						<td>30</td>
					</tr>
					<tr class="parni">
						<td>Tjelesni i zdravsteni odgoj</td>
						<td>Erik Lehnsherr (Magneto)</td>
						<td>18:30h</td>
						<td>15</td>
						<td>25</td>
					</tr>
					<tr class="neparni">
						<td>Fizika</td>
						<td>Ororo Monroe (Storm)</td>
						<td>09:00h</td>
						<td>5</td>
						<td>35</td>
					</tr>
					<tr class="parni">
						<td>Matematika</td>
						<td>Jean Grey</td>
						<td>12:00h</td>
						<td>10</td>
						<td>20</td>
					</tr>
				</table>
			</div>
		</div>
		<!--Mainbody stranice KRAJ-->

		</div>
	</BODY>
</html>