<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Naslovna - Xavier institute</TITLE>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stil.css">
	<link rel="stylesheet" href="../css/logo.css">
	<script src="../javascript/kod.js"></script>
	<script src="../javascript/validacija.js"></script>
</head>
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
			date_default_timezone_set("Europe/Sarajevo");
			session_start();
			if(isset($_POST['logout'])){
				unset($_SESSION['login']);
				session_destroy();
				echo '<script>alert("Niste vise logovani!");</script>';
			}
				if(!isset($_SESSION['login'])){
				print "<div><form id='login-forma' action='admin.php' method='POST'>
					<fieldset>
					
					<label for='username' >Korisničko ime:</label>
					<input type='text' name='username' id='username'  maxlength='20' />
					 
					<label for='password' >Lozinka:</label>
					<input type='password' name='password' id='password' maxlength='20' />
					 
					<input type='submit' name='posalji' value='Log in' />
					
					</fieldset>
			</form></div>
			<script>Alert('Logovan si bruda')";
				header("Location: ../index.php");
				}
			if(isset($_SESSION['login'])){
				print "<div><form id='logout-forma' action='admin.php' method='POST'><input type='submit' name='logout' value='Log out' /></form></div>";
			
			}
				
				 if(isset($_POST['vijes'])){
					 $naslov=htmlspecialchars($_REQUEST['naslov']);
					 $tekst=htmlspecialchars($_POST['tekst']);
					 $slika=htmlspecialchars($_REQUEST['slika']);
					$tel = htmlspecialchars($_REQUEST['tel']);
					 $datum1 = date("Y-m-d");
					 $datum2 = date("H:i:s");	
					$datum = $datum1."T".$datum2;
					$komentar = '0';
					if(isset($_POST['imaKomentare'])) $komentar = "1";
					
					 if(!empty($_POST['naslov']) && !empty($_POST['tekst']) && !empty($_POST['slika']) && !empty($_POST['tel'])){
						$naslov=$_POST['naslov'];
						$veza = new PDO("mysql:dbname=xavier;host=localhost;charset=utf8", "root", "");
						$veza->exec("set names utf8");
					     $idAdmina = $veza->query("select id from korisnik where username = '".(string)$_SESSION['username']."';");
						$ajdi = $idAdmina->fetch(PDO::FETCH_ASSOC);
						 $unosVijesti = $veza->query("INSERT INTO vijest SET naslov = '".(string)$naslov."', tekst = '".(string)$tekst."', slika = '".(string)$slika."', datum = '".(string)$datum."', komentar = '".(string)$komentar."';");
						
						
						 if(!$unosVijesti){
							echo 'greska';
							echo $veza->errorInfo()[2];
							}
						 $idAdmina = null;
						 $unosVijesti = null;
						 $veza=null;

						 
					 }
					 else{
						 print "<script>Alert('Niste popunili sva polja!')</script>";
					}
					
						
					
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
		<?php
			
			require_once('login.php');
			
			?>	
		
		<div class="mainbody">
			<br>
			<form id="dodaj-novost" action='admin.php' method='POST' onsubmit="return(validirajUnose());">
				<label>Naslov vijesti</label>
				<br>
				<input type='text' id='naslovvijesti' oninput='validirajUnose();' name='naslov' />
				<br>
				
				<label>Tekst vijesti</label>
				<br>
				<textarea name='tekst' id='tekstvijesti' oninput='validirajUnose();' placeholder="Unesite tekst vijesti"></textarea>
				<br>
				<label>URL slike</label>
				<br>
				<input type='text' name='slika' id='slikavijesti' oninput='validirajUnose();' />
				<br>
				<label><small>Kod države</small></label><input type='text' name='kod' id='kod' oninput='ValidirajKod();'/><label><small>Broj telefona</small></label><input type='text' name='tel' id='tel' oninput='ValidirajBrojTelefona();'/>
				<br>
				<label><small>Omogući komentare?</small></label>
				<br>
				<input type="checkbox" name="imaKomentare" value="Da">Da<br>
				<input type='submit' id='dodajVijestBtn' name='vijes'  value="Dodaj vijest"/>
				</form>
				
				
			
			
		</div>
		</div>
	</body>
</html>