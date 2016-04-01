onload = function Datum(){
	var klasa = "vrijemeObjave";
	var X = ["par sekundi", "Minuta", "Sat", "Dan", "Sedmica"];
	var Dani = ["dan", "dana"];
	var Minuta = ["minute", "minuta"];
	var Sati = ["sat", "sata", "sati"];
	var Sedmica = ["sedmice", "sedmica"];

	var trenutnoVrijeme = new Date();
	var dan = trenutnoVrijeme.getDate();
	var mjesec = trenutnoVrijeme.getMonth() + 1; 
	var godina = trenutnoVrijeme.getFullYear();
	var sat = trenutnoVrijeme.getHours();
	var min = trenutnoVrijeme.getMinutes();
	var sekunde = trenutnoVrijeme.getSeconds();
	
	
	var ispis = document.getElementsByClassName(klasa);
	for(var i=0; i<ispis.length; i++){
		var s = ispis[i].getAttribute("datetime");
		var datoom = new Date(s);
		// document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(2, Dan[1]);
		
		if(godina == datoom.getFullYear()){
			if(mjesec == (datoom.getMonth()+1)){
				if(dan == datoom.getDate())
				{
					if(sat == datoom.getHours()){
					if(min == datoom.getMinutes())
					{
						document.getElementsByClassName(klasa)[i].innerHTML = " par sekundi";
					}
					else if(min > datoom.getMinutes() && (min - datoom.getMinutes())<5 ) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput((min - datoom.getMinutes()), Minuta[0]);
					else if(min > datoom.getMinutes()) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput((min - datoom.getMinutes()), Minuta[1]);
					}
					else{
						var SatX = min + sat*60;
						var SatY = datoom.getMinutes() + datoom.getHours()*60;
						var razlika = SatX - SatY;
						if(razlika < 5) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Minuta[0]);
						else if(razlika >5 && razlika<60) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Minuta[1]);
						else if(razlika>60 && razlika<120) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[0]);
						else if(razlika>120 && razlika<(60*5)) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[1]);
						else if(razlika>(60*21) && razlika<(60*22)) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[0]);
						else if(razlika>(60*22) && razlika<(60*25)) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[1]);
						else document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[2]);
					}
					//Ako nije isti dan
				}
				else{
					var DanX = min + sat*60 + dan*60*24;
					var DanY = datoom.getMinutes() + datoom.getHours()*60 + datoom.getDate()*60*24;
					var razlika = DanX - DanY;
					if(razlika < 5) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Minuta[0]);
					else if(razlika >5 && razlika<60) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Minuta[1]);
					else if(razlika>60 && razlika<120) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[0]);
					else if(razlika>120 && razlika<240) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[1]);
					else{
						razlika = parseInt(razlika/60);
						if(razlika < 21) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Sati[2]);
						else if(razlika == 21) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Sati[0]);
						else if(razlika < 24) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Sati[1]);
						else if(parseInt(razlika/24)==1) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/24), Dani[0]);
						else if(parseInt(razlika/24)<7)document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/24), Dani[1]);
						else if(parseInt(razlika/24)>7)document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt((razlika/24)/7), Sedmica[0]);
					}
				}
			}
			else{
				var MjesecX = min + sat*60 + dan*60*24 + mjesec*60*24*30;
				var MjesecY = datoom.getMinutes() + datoom.getHours()*60 + datoom.getDate()*60*24 + (datoom.getMonth()+1)*60*24*30;
				var razlika = MjesecX-MjesecY;
				if(razlika < 5) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Minuta[0]);
					else if(razlika>5 && razlika<60) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Minuta[1]);
					else if(razlika>60 && razlika<120) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[0]);
					else if(razlika>120 && razlika<240) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/60), Sati[1]);
					else{
						razlika = parseInt(razlika/60);
						if(razlika < 24) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(razlika, Sati[2]);
						else if(parseInt(razlika/24)==1) document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/24), Dani[0]);
						else if(parseInt(razlika/24)<7)document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt(razlika/24), Dani[1]);
						else if(parseInt(razlika/24)>7 && parseInt(razlika/24)<4*7)document.getElementsByClassName(klasa)[i].innerHTML = DatumOutput(parseInt((razlika/24)/7), Sedmica[0]);
						else document.getElementsByClassName("objavljeno")[i].innerHTML = DatumOutputFull(datoom.getDate(), datoom.getMonth()+1, datoom.getFullYear());
					}
			}
		}
		
	}
}

function DatumOutput(broj, str){
	return " " + broj + " " + str;
}
	
	
function DatumOutputFull(dan, mjesec, godina){
	return "Objavljeno " + dan + "-" + mjesec + "-" + godina + " g.<time></time>";
}