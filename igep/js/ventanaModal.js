function openModal(url, paramsSource, width, height, resizable, scroll)
{
	// cálculo de la posición de la ventana
	heightPosition = screen.height*0.6;
	widthPosition = screen.width*0.9;
	LeftPosition = (screen.width) ? (screen.width-widthPosition)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-heightPosition)/2 : 0;
	
	if ((resizable == undefined) || (resizable == null))
		resizable = 'no';
	if ((scroll == undefined) || (scroll == null))
		scroll = 'no';		

	settings = 'dialogHeight:'+height+'px; dialogLeft:'+LeftPosition+'px; dialogWidth:'+width+'px; dialogTop:'+TopPosition+'px; resizable:'+resizable+'; scroll:'+scroll;			
	returnValue = showModalDialog(url, paramsSource, settings);
	
	// Se ejecuta en la pantalla origen cuando ya se ha cerrado la modal
	formulario = paramsSource.formulario;
	action = paramsSource.returnPath;
	parent.document.forms[formulario].action = action;
	parent.document.forms[formulario].target = 'oculto';
	parent.document.forms[formulario].submit();
}

function returnModal(accion)
{	
	// Se ejecuta en la modal    
	switch(accion)
	{
		case 'submit':
				window.returnValue = 'He guardado en la ventana Modal';		
			break;
		case 'cancel':
				window.returnValue = 'He cancelado la ventana Modal';		
			break;		
		case 'accion':
				window.returnValue = 'ACCION';    		
			break;		
	}
	
	window.close();
}