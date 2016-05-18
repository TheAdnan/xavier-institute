<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
	<head>
		<META http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>logo</title>
		<link rel="stylesheet" type="text/css" href="logo.css">
	</head>
<?php
			session_start();
			$poruka = '';
			$uredu = false;

			if (isset($_POST['loginSubmit']) && !empty($_POST['username']) && !empty($_POST['password'])) 
			{
				$usernameT = $_POST['username'];
				$passwordT = $_POST['password'];
				
				$podaci=file('../loginPodaci.csv');

				foreach($podaci as $korisnik) {
					$podatak=explode(',',$korisnik);
					if($podatak[0] == $usernameT && $podatak[1]==md5($passwordT)) {
						$_SESSION['login'] = true;
						$poruka="";
						$uredu = true;
						break;
					}
				}
				if(! $uredu) {	
					$poruka = 'Pogrešan username ili password';
				}
			}

			if($uredu) {
				header("Location: admin.php");
			}
			?>	
</HTML>