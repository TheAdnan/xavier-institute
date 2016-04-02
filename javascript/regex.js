function BrojTelefona(brTel){
	var x = document.forms["kontakt-forma"]["telefon"];
	var broj = document.getElementById(brTel).value;
	var reg = /^[0]{1}[6]{1}[1|2]{1}[-]{1}[0-9]{3}[-]{1}[0-9]{3}$/igm;
	if(!(reg.test(broj))){
		alert("Unos broja nije ispravan!\nBroj mora biti u obliku 061-xxx-xxx ili 062-xxx-xxx.");
		x.focus();
		return false;
	}
	return true;
}

function MultipleValidacija(){
	var drzava = document.getElementById("drzavaSelect").value;
	var grad = document.getElementById("gradSelect").value;
	if(drzava=="bih" && grad=="sarajevo"){
			return true;	
	}
	else if(drzava=="bih" && grad=="sana"){
			return true;	
	}
	else if(drzava=="bih" && grad=="mostar"){
			return true;	
	}
	else if(drzava=="usa" && grad=="chattanooga"){
			return true;
	}
	else if(drzava=="usa" && grad=="nevada"){
			return true;
	}
	else if(drzava=="tandt" && grad=="guayaguayare"){
			
			return true;
	}
	else if(drzava=="tandt" && grad=="tunapuna"){
		return true;
	}

	else if(drzava=="nijedna" && grad=="nijedan"){
			return true;
	}
	else{
		alert("Nije odabran ispravan grad ili drzava!");
		return false;
	}
}


function ValidirajOnInput(ajdi){
	var x = document.forms["kontakt-forma"]["telefon"];
	var elemenat = document.getElementById(ajdi);
	var podatak = document.getElementById(ajdi).value;
	var reg = /^[0]{1}[6]{1}[1|2]{1}[-]{1}[0-9]{3}[-]{1}[0-9]{3}$/igm;
	if(!(reg.test(podatak))){
		elemenat.style.backgroundColor = "tomato";
	}
	else elemenat.style.removeProperty('background-color');
}

function ValidirajOnInput2(ajdi){
	var elemenat = document.getElementById(ajdi);
	var podatak = document.getElementById(ajdi).value;
	var reg = /(.*)+@(.*)[.]{1}(.*)/igm;
	if(!(reg.test(podatak))){
		elemenat.style.backgroundColor = "tomato";
	}
	else elemenat.style.removeProperty('background-color');
}

function ValidirajOnInput3(ajdi){
	var elemenat = document.getElementById(ajdi);
	var podatak = document.getElementById(ajdi).value;
	var reg = /([a-z]*)\s([a-z]*)/igm;
	if(!(reg.test(podatak))){
		elemenat.style.backgroundColor = "tomato";
	}
	else elemenat.style.removeProperty('background-color');
}



function Validiraj(brTel){
	if(!(MultipleValidacija()) || !(BrojTelefona(brTel))){
		return false;
	}
	return true;
}