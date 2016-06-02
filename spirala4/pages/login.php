<?php
			// $greska = '';
			// $tojeto = false;

			// if (isset($_POST['posalji']) && !empty($_POST['username']) && !empty($_POST['password'])) 
			// {
				// $user = $_POST['username'];
				// $pass = $_POST['password'];
				
				// $login=file('../files/login.txt');

				// foreach($login as $korisnik) {
					// $podaci=explode(',',$korisnik);
					// if($podaci[0] == $user && $podaci[1]==md5($pass)) {
						// $_SESSION['login'] = true;
						// $greska="";
						// $tojeto = true;
						// break;
					// }
				// }
				// if(! $tojeto) {	
					// $greska = 'Pogrešan username ili password';
					// echo '<script>alert("'.$greska.'");</script>';
				// }
			// }

			// if($tojeto) {
				// header("Location: admin.php");
			// }
			
			
			
			$veza = new PDO("mysql:dbname=xavier;host=localhost;charset=utf8", "root", "");
			$veza->exec("set names utf8");
			$greska = '';
			$tojeto = false;

			if (isset($_POST['posalji']) && !empty($_POST['username']) && !empty($_POST['password'])) 
			{
				$user = $_POST['username'];
				$pass = $_POST['password'];
				
				$login = $veza->query("select username, password from korisnik;");
				
				
				foreach($login as $korisnik) {
					
					if($korisnik['username'] == $user && $korisnik['password']==md5($pass)) {
						$_SESSION['login'] = true;
						$_SESSION['username'] = $user;
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
			
			
			 //$idAdmina = $veza->query("select id from korisnik where username = '".$_SESSION['username']."';");
						 //$unosVijesti = $veza->exec("INSERT INTO vijest (id, naslov, tekst, slika, datum, komentar, autor) VALUES (NULL, ".$naslov.", ".$tekst.", ".$slika.", ".$datum.", '1', ".$idAdmina.");");
?>