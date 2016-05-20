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
							$ax = explode(",",$a);
							$bx = explode(",",$b);
							// $datum1 = substr($a, strlen($a)-22, -12);
							// $datum2 = substr($b, strlen($b)-22, -12);
							// $datum3 = substr($a, strlen($a)-11, -2);
							// $datum4 = substr($b, strlen($b)-11, -2);
							$datum1 = $ax[3].$ax[4];
							$datum2 = $bx[3].$bx[4];
							// $dat1 = $datum1.$datum3;
							// $dat2 = $datum2.$datum4;
							
						
							
							return strtotime($datum1) < strtotime($datum2);
							
						}
						
						function sortirajPoAbecedi($a, $b){
							return $a[0] > $b[0];
						}
						
						$vijesti = file("../files/novosti.csv");
						$broj_novosti = count($vijesti);
						
						if(isset($_POST['sortiraj'])){
							usort($vijesti, "sortirajPoAbecedi");
							$i=0;
							for($i=0; $i < $broj_novosti; $i++) {
							$cv =explode(',',$vijesti[$i]);
							//$cv = fgetcsv($vijesti[$i], 2024);
							$cv[0]=str_replace(";.?",",",$cv[0]);
							$cv[2]=str_replace(";.?",",",$cv[2]);
							
							print "<div class='nowost'><h3>".$cv[0]."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv[3]."T".$cv[4]."'></time>.</p><img src='".$cv[1]."' alt='".$cv[1]."'><p>".$cv[2]."</p></div>";
						}
						}
						elseif(isset($_POST['sortirajDate'])){
							
							usort($vijesti, "sortirajPoDatumu");
							
							for($i=0; $i < $broj_novosti; $i++) {
								$cv =explode(',',$vijesti[$i]);
								//$cv = fgetcsv($vijesti[$i], 2024);
								$cv[0]=str_replace(";.?",",",$cv[0]);
								$cv[2]=str_replace(";.?",",",$cv[2]);
							
								print "<div class='nowost'><h3>".$cv[0]."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv[3]."T".$cv[4]."'></time>.</p><img src='".$cv[1]."' alt='".$cv[1]."'><p>".$cv[2]."</p></div>";
							}
						}
						else{
							
							$i=0;
							for($i=0; $i < $broj_novosti; $i++) {
							$cv =explode(',',$vijesti[$i]);
							//$cv = fgetcsv($vijesti[$i], 2024);
							$cv[0]=str_replace(";.?",",",$cv[0]);
							$cv[2]=str_replace(";.?",",",$cv[2]);
							
							print "<div class='nowost'><h3>".$cv[0]."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv[3]."T".$cv[4]."'></time>.</p><img src='".$cv[1]."' alt='".$cv[1]."'><p>".$cv[2]."</p></div>";
						}
						}
						?>
		</div>
		
		<!-- Mainbody KRAJ -->

		</div>
	</BODY>
</html>