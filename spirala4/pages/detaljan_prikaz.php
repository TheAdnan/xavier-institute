<?php
	$veza = new PDO("mysql:dbname=xavier;host=localhost;charset=utf8", "root", "");
	$veza->exec("set names utf8");
	$cv = $veza->query("select naslov, slika, tekst, datum from vijest where id='".$_GET[vijest]."';");
	print "<div class='nowost'><h3>".$cv['naslov']."</h3><p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p><img src='".$cv['slika']."' alt='".$cv['slika']."'><p>".$cv['tekst']."</p></div>";
?>