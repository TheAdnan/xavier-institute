function feelter(vr){
		var listaVijesti = document.getElementsByTagName("time");
		var listaV = document.getElementsByClassName("nowost");
		var sad = new Date();
		if(document.getElementById("danas").value==vr){
		for (var j = 0; j < listaVijesti.length; j++){
			if(listaV[j].style.display == "none"){
				listaV[j].style.removeProperty('display');
			}
		}
		for (var i = 0; i < listaVijesti.length; i++) {
			var datumV = listaVijesti[i].getAttribute("datetime");
			var datum = new Date(datumV);
			if(sad.getDate()==datum.getDate() && sad.getMonth()==datum.getMonth() && sad.getFullYear()==datum.getFullYear()){
				listaV[i].style.removeProperty('display');
				}
			else {
				listaV[i].style.display = "none";
				}
		}
    }
	else if(document.getElementById("ove-sedmice").value==vr){
		for (var j = 0; j < listaVijesti.length; j++){
			if(listaV[j].style.display == "none"){
				listaV[j].style.removeProperty('display');
			}
		}
		for (var i = 0; i < listaVijesti.length; i++) {
			var datumV = listaVijesti[i].getAttribute("datetime");
			var datum = new Date(datumV);
			if(sad.getMonth()==datum.getMonth() && sad.getFullYear()==datum.getFullYear() && (sad.getDate()-datum.getDate())<sad.getDay())
				listaV[i].style.removeProperty('display');
			else {
				listaV[i].style.display = "none";
				}
		}
    }
	else if(document.getElementById("ovog-mjeseca").value==vr){
		for (var j = 0; j < listaVijesti.length; j++){
			if(listaV[j].style.display == "none"){
				listaV[j].style.removeProperty('display');
			}
		}
		for (var i = 0; i < listaVijesti.length; i++) {
			var datumV = listaVijesti[i].getAttribute("datetime");
			var datum = new Date(datumV);
			if(sad.getMonth()==datum.getMonth() && sad.getFullYear()==datum.getFullYear() &&(sad.getDate()-datum.getDate())<30)	
				listaV[i].style.display = "show";
			else {
				listaV[i].style.display = "none";
				}
			}

    }
	else if(document.getElementById("sve").value==vr){
		for (var j = 0; j < listaVijesti.length; j++){
			if(listaV[j].style.display == "none"){
				listaV[j].style.removeProperty('display');
			}
		}
		for (var i = 0; i < listaV.length; i++) {
			listaV[i].style.removeProperty('display');
		}
    }

}


