function sortuj(){
		
		var listaVijesti = document.getElementsByClassName("nowost");
		var nasloviLista = [];
		nasloviLista.length = listaVijesti.length;
		var datumLista = [];
		datumLista.length = listaVijesti.length;
		var slikeLista = [];
		slikeLista.length = listaVijesti.length;
		var tekstLista = [];
		tekstLista.length = listaVijesti.length;
		for(var i=0; i<listaVijesti.length-1; i++){
		 nasloviLista[i] = listaVijesti[i].children[0];
		 datumLista[i] = listaVijesti[i].children[1];
		 slikeLista[i] = listaVijesti[i].children[2];
		 tekstLista[i] = listaVijesti[i].children[3];
		}
	for(var i=0; i<nasloviLista.length-1;i++) sortirajDjecu(nasloviLista, datumLista, slikeLista, tekstLista);
		for(var i=0; i<nasloviLista.length;i++){
			document.getElementsByClassName("nowost")[i].replaceChild(nasloviLista[i], document.getElementsByClassName("nowost")[i].children[0]);
			document.getElementsByClassName("nowost")[i].replaceChild(datumLista[i], document.getElementsByClassName("nowost")[i].children[1]);
			document.getElementsByClassName("nowost")[i].replaceChild(slikeLista[i], document.getElementsByClassName("nowost")[i].children[2]);
			document.getElementsByClassName("nowost")[i].replaceChild(tekstLista[i], document.getElementsByClassName("nowost")[i].children[3]);
			
		}
}


function sortirajDjecu(lista1, lista2, lista3, lista4){
	var k = 1;
	while(k!=0){
	for(var i=0; i<(lista1.length-1); i++){
		k = 0;
		if(lista1[i].innerText >lista1[i+1].innerText){
			var temp1 = lista1[i+1].innerHTML;
			lista1[i+1].innerHTML=lista1[i].innerHTML;
			lista1[i].innerHTML=temp1;
			
			var temp2 = lista2[i+1].innerHTML;
			lista2[i+1].innerHTML=lista2[i].innerHTML;
			lista2[i].innerHTML=temp2;
			
			var temp3 = lista3[i+1].src;
			lista3[i+1].src=lista3[i].src;
			lista3[i].src=temp3;
			
			var temp4 = lista4[i+1].textContent ;
			lista4[i+1].textContent =lista4[i].textContent ;
			lista4[i].textContent =temp4;
			k++;
		}
		
	}
	}
}


