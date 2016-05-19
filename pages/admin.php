<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Naslovna - Xavier institute</TITLE>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stil.css">
	<link rel="stylesheet" href="../css/logo.css">
	<script src="../javascript/kod.js"></script>
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
				if(!isset($_SESSION['login'])){
				print "<div><form id='login-forma' action='admin.php' method='POST'>
					<fieldset>
					
					<label for='username' >Korisničko ime:</label>
					<input type='text' name='username' id='username'  maxlength='20' />
					 
					<label for='password' >Lozinka:</label>
					<input type='password' name='password' id='password' maxlength='20' />
					 
					<input type='submit' name='posalji' value='Log in' />
					
					</fieldset>
			</form></div>";
				header("Location: ../index.php");
				}
			if(isset($_SESSION['login'])){
				print "<div><form id='logout-forma' action='admin.php' method='POST'><input type='submit' name='logout' value='Log out' /></form></div>";
			
			}
		
				 if(isset($_POST['vijes'])){
					 $naslov=htmlspecialchars($_REQUEST['naslov']);
					 $tekst=htmlspecialchars($_POST['tekst']);
					 $slika=htmlspecialchars($_REQUEST['slika']);
					 $datum1 = date("Y-m-d");
					 $datum2 = date("H:i:s");					 
					 if(!empty($_POST['naslov']) && !empty($_POST['tekst']) && !empty($_POST['slika'])){
						$naslov=$_POST['naslov'];
						 $naslov=str_replace(",",";.?",$naslov);
						 $tekst=str_replace(",",";.?",$tekst);
						 $tekst=str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$tekst);
						 
						file_put_contents("../files/novosti.csv",$naslov.','.$slika.','.$tekst.','.$datum1.','.$datum2."\n",FILE_APPEND);

						 
					 }
					 else{
						 $greska="Niste popunili sva polja!";
					}
					
						
					// print "<h3>".$naslov."</h3><p class='objavljeno'>objavljeno<time class='vrijemeObjave' datetime='".$datum1."T".$datum2."'></time>.</p><p>".$tekst."</p>";
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
			
			$greska = '';
			$tojeto = false;

			if (isset($_POST['posalji']) && !empty($_POST['username']) && !empty($_POST['password'])) 
			{
				$user = $_POST['username'];
				$pass = $_POST['password'];
				
				$login=file('../files/login.txt');

				foreach($login as $korisnik) {
					$podaci=explode(',',$korisnik);
					if($podaci[0] == $user && $podaci[1]==md5($pass)) {
						$_SESSION['login'] = true;
						$greska="";
						$tojeto = true;
						break;
					}
				}
				if(! $tojeto) {	
					$greska = 'Pogrešan username ili password';
					echo '<script>alert("'.$greska.'");</script>';
				}
			}

			if($tojeto) {
				header("Location: admin.php");
			}
			
			
			?>	
		
		<div class="mainbody">
			<br>
			<form id="dodaj-novost" action='admin.php' method='POST'>
				<label>Naslov vijesti</label>
				<br>
				<input type='text' name='naslov' />
				<br>
				
				<label>Tekst vijesti</label>
				<br>
				<textarea name='tekst' id='tekstvijesti' placeholder="Unesite tekst vijesti"></textarea>
				<br>
				<label>URL slike</label>
				<br>
				<input type='text' name='slika' />
				<br>
				<input type='submit' id='dodajVijestBtn' name='vijes' value="Dodaj vijest"/>
				</form>
				
				
			
			
		</div>
		</div>
	</body>
</html>