<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Kontakt - Xavier institute</TITLE>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stil.css">
	<link rel="stylesheet" href="../css/logo.css">
	<script src="../javascript/regex.js"></script>
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
			<form id="kontakt-forma" action="svaka_cast.php" method="post" onsubmit="return(Validiraj('brojTelefona'));">
				<label>Ime i Prezime</label><br>
				<input type="text" name="ime" id="nejm" oninput="ValidirajOnInput3('nejm');" required><br>
				<label>E-Mail</label><br>
				<input type="email" name="email" id="email" oninput="ValidirajOnInput2('email');" required><br>
				<label>Broj telefona</label><br>
				<input type="tel" id="brojTelefona" name="telefon" oninput="ValidirajOnInput('brojTelefona');" required><br>
				<label>Država</label><br>
				<select id="drzavaSelect" name="drzava">
					<option value="nijedna" selected="selected">Nijedna od ponuđenih</option>
					<option value="bih">Bosna i Hercegovina</option>
					<option value="usa">SAD</option>
					<option value="tandt">Trinidad i Tobago</option>
				</select>
				<br>
				<label>Grad</label><br>
				<select id="gradSelect" name="grad" onchange="MultipleValidacija();">
					<option value="nijedan" selected="selected">Nijedan od ponuđenih</option>
					<option value="sarajevo">Sarajevo</option>
					<option value="sana">Sanski Most</option>
					<option value="mostar">Mostar</option>
					<option value="nevada">Nevada</option>
					<option value="chattanooga">Chattanooga</option>
					<option value="tunapuna">Tunapuna</option>
					<option value="guayaguayare">Guayaguayare</option>
				</select>
				<br>
				<label>Stepen mutacije</label><br>
				<input type="range" name="range" value="0" min="0" max="2"><br>
				<table id="vmutacije"><tr>
				<td>Bez mutacije</td>
				<td>Primarna</td>
				<td>Sekundarna</td>
				</tr></table>
				<div id="posalji"><button type="submit">Pošalji!</button></div> <br>
			</form>
		</div>

		</div>
	</BODY>
</html>