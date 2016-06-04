function validirajUnose(){
	var naslovE = document.getElementById("naslovvijesti");
	var tekstE = document.getElementById("tekstvijesti");
	var slikaE = document.getElementById("slikavijesti");
	var naslov = document.getElementById("naslovvijesti").value;
	var tekst = document.getElementById("tekstvijesti").value;
	var slika = document.getElementById("slikavijesti").value;
	var validno = false;
	var reg = /(.+)/igm;
	if(!(reg.test(naslov))){
		naslovE.style.backgroundColor = "tomato"; validno=false;
	}
	else{
		naslovE.style.removeProperty('background-color');
		validno=true;
	}
	if(!((/(.+)/).test(tekst))){
		tekstE.style.backgroundColor = "tomato";
		validno=false;
	}
	else{
		tekstE.style.removeProperty('background-color');
		validno=true;
	}
	if(!((/(.+)/).test(slika))){
		slikaE.style.backgroundColor = "tomato";
		validno=false;
	}
	else{
		slikaE.style.removeProperty('background-color');
		validno=true;
	}
	if(!document.getElementById("kod").value.match(/\S/) || !document.getElementById("tel").valuematch(/\S/)) validno = false;
	
	return validno;
	
	
		
}


function ValidirajKod(){
	var kod = document.getElementById("kod").value;
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		var x= document.getElementById("tel");
		if (ajax.readyState == 4 && ajax.status == 200){
			var br=JSON.parse(ajax.response);
			if(br[0]!=null){
				x.value="+"+br[0]["callingCodes"];
			}else{
				x.value="";
			}
		}
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("kod").innerHTML = "Ne postoji kod";
	}
	ajax.open("GET", "https://restcountries.eu/rest/v1/alpha?codes="+kod, true);
	ajax.send();
}

function ValidirajBrojTelefona(){
	var tel = document.getElementById("tel").value;
	tel = tel.substr(1);
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200){
			var br=JSON.parse(ajax.response);
			if(br[0]!=null){
				document.getElementById("kod").value="";
				document.getElementById("kod").value= br[0]["alpha2Code"].toUpperCase();
			}else{
				document.getElementById("kod").value="";
			}
		}
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("tel").innerHTML = "Nije ispravan pozivni";
	}
	ajax.open("GET", "https://restcountries.eu/rest/v1/callingcode/"+tel, true);
	ajax.send();	
}