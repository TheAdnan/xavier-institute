<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>Novosti - Xavier institute</TITLE>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stil.css">
	<link rel="stylesheet" href="../css/logo.css">
	<script src="../javascript/kod.js"></script>
	<script src="../javascript/filtriranje.js"></script>
	<script src="../javascript/sortirajalfabetikalno.js"></script>
	<script src="../javascript/sortirajdatumicno.js"></script>
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
		date_default_timezone_set("Europe/Sarajevo");
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
		 <select id="filter" onchange="feelter(this.value);">
			<option value="dan" id="danas">Današnje novosti</option>
			<option value="sedmica" id="ove-sedmice">Novosti ove sedmice</option>
			<option value="mjesec" id="ovog-mjeseca">Novosti ovog mjeseca</option>
			<option value="sve" id="sve" selected="selected">Sve novosti</option>
		</select> 
		<form action='novosti.php' method="POST">
		<input type='submit' name='sortiraj' class='sortiraj' value='Sortiraj po abecedi' />
		<input type='submit' name='sortirajDate' class='sortiraj' value='Sortiraj po datumu' /></form>
				<br>
				<br>
				<br>
						
						
						
						<?php
						print "<script>Datum();</script>";
						
						function sortirajPoDatumu($a, $b) {	
							return strtotime($a['datum']) < strtotime($b['datum']);
						}
						
						function sortirajPoAbecedi($a, $b){
							$a = strtoupper($a);
							$b = strtoupper($b);
							return $a['naslov'] > $b['naslov'];
						}
						
						if(!isset($_GET['vijest'])){
							$veza = new PDO("mysql:dbname=xavier;host=localhost;charset=utf8", "root", "");
							$veza->exec("set names utf8");
							$cv1 = $veza->query("select id, naslov, slika, tekst, datum from vijest");
							$upit2 = $veza->query("select count(*) as broj from vijest;");
							$broj_novosti = $upit2->fetch(PDO::FETCH_ASSOC);
						
						if(isset($_POST['sortiraj'])){
							$cv1 = $veza->query("select id, naslov, slika, tekst, datum from vijest ORDER BY naslov ASC");
							foreach($cv1 as $cv) {
								print "<div class='nowost'><h3>".$cv['naslov']."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p><img src='".$cv['slika']."' alt='".$cv['slika']."'><p>".$cv['tekst']."</p><a href='novosti.php?vijest=".(string)$cv['id']."'><small>Detaljno...</small></a></div>";
							}
						}
						elseif(isset($_POST['sortirajDate'])){

							$cv1 = $veza->query("select id, naslov, slika, tekst, datum from vijest ORDER BY datum DESC");
							foreach($cv1 as $cv) {
								print "<div class='nowost'><h3>".$cv['naslov']."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p><img src='".$cv['slika']."' alt='".$cv['slika']."'><p>".$cv['tekst']."</p><a href='novosti.php?vijest=".(string)$cv['id']."'><small>Detaljno...</small></a></div>";
							}
						}
						else{
							
							
							foreach($cv1 as $cv) {
							print "<div class='nowost'><h3>".$cv['naslov']."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p><img src='".$cv['slika']."' alt='".$cv['slika']."'><p>".$cv['tekst']."</p><a href='novosti.php?vijest=".(string)$cv['id']."'><small>Detaljno...</small></a></div>";
						}
					}
				}
				elseif(isset($_GET['vijest'])){
						$var = (string)$_GET['vijest'];
						
						$v = new PDO("mysql:dbname=xavier;host=localhost;charset=utf8", "root", "");
								$v->exec("set names utf8");
						$cv1 = $v->query("SELECT naslov, slika, tekst, datum FROM vijest WHERE id='".$var."'");
								foreach($cv1 as $cv){
									print "<div class='nowostDetaljno'><h3>".$cv['naslov']."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p><img src='".$cv['slika']."' alt='".$cv['slika']."'><p>".$cv['tekst']."</p></div>";
									
								}
						
						$temp='1';
							$imalKomentara = $v->query("SELECT komentar FROM vijest WHERE id='".$var."'");
							foreach($imalKomentara as $cv){
								$temp = $cv['komentar'];
							}
							if($temp == '1'){
								//prikaz forme za unos
								
								print "	<form id='dodaj-komentar' action='novosti.php?vijest=".$var."' method='POST'> 
											<textarea name='comment' id='comment' placeholder='Napiši komentar'></textarea>
											<input type='submit' id='dodajKomentarBtn' name='dodajKomentarBtn'  value='Postavi'/>
											</form>
									";
								print "<div id='komentari'>";
							//prikaz komentara
								$cv2 = $v->query("SELECT tekst FROM komentar WHERE vijest='".$var."'");
									foreach($cv2 as $cv){
										print "<div class='komentarParent'><p>".$cv['tekst']."</p></div>";
								}
								
								//ako je pritisnut button dodajKomentarBtn
								if(isset($_POST['dodajKomentarBtn']) && !empty($_POST['comment'])){
									$kom = $_POST['comment'];
									
									$cv3 = $v->query("INSERT INTO komentar SET tekst = '".(string)$kom."', odgovor = '0', vijest = '".(string)$var."';");
									
								}
								
								print "</div>";
							}
							
					}
				
			?>
		</div>
		
		<!-- Mainbody KRAJ -->

		</div>
	</BODY>
</html>