function mostrarOpciones(idCapa)
{
	prefijo = idCapa.substring(0,1);
	var capas = document.getElementsByTagName('div');
	for(i=0;i<capas.length;i++) {
		prefCapa = capas[i].id.substring(0,1);
		if (prefijo == prefCapa) {			
			capa = eval('document.getElementById("'+capas[i].id+'")');
			capa.style.display = "none";
		}
	}
	capa = eval('document.getElementById("'+idCapa+'")');
	capa.style.display = "block";
}

function cerrarAplicacion(formulario)
{
	aviso = eval('aviso');
	if (document.getElementById('permitirCerrarAplicacion').value!='si') 
	{
		aviso.set('aviso','capaAviso','ALERTA','IGEP-909','Cambios pendientes','Existen datos pendientes de salvar. <br/>SALVE o CANCELE los mismos antes de salir.');
		aviso.mostrarAviso();
	}
	else
	{
		formulario.submit();
	}	
}