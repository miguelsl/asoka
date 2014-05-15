/***************** CONSTRUCTOR oAviso **********************/
function oAviso(rutaImg) 
{
	this.nomVariable = 'aviso';
	this.idCapa = 'capaAviso';
	this.tipo = 'error';
	this.codError = 'codError';
	this.descBreve = 'descBreve';
	this.descLarga = 'descLarga';
    this.textoBtnAceptar = 'Aceptar';
	this.accionBtnAceptar = '';
	this.formulario = null;
    this.textoBtnCancelar = null;
	this.imgFondo = rutaImg+'pestanyas/pix_trans.gif';
	this.rutaImg = rutaImg;
	this.rutaImgAvisos = rutaImg+'avisos/';
	this.zIndice =  200; //ZIndex a partir del cual se trabaja
	this.ancho = 200; //Ancho de la capa de aviso
	this.alto = 200;//Alto de la capa de aviso
	
	//Tamaño en pixels del espacio donde se visualiza la página.
	ie = (document.all)? true:false; //Cambia de IE al resto
	if(ie) 
	{
		this.anchoPagina = document.body.clientWidth;
		this.altoPagina = document.body.clientHeight;
	}
	else 
	{
		this.anchoPagina = innerWidth;
		this.altoPagina = innerHeight;
	}

	/*  Métodos */
	this.mostrarAviso = f_oAviso_mostrarAviso;
	this.mostrarAbout = f_oAviso_mostrarAbout;
	this.mostrarMensajeCargando = f_oAviso_mostrarMensajeCargando;
	this.set =f_oAviso_set;
	this.cerrarCapa = f_oAviso_cerrarCapa;
	this.capaBloqueo = f_oAviso_capaBloqueo;
	this.capaError = f_oAviso_capaError;
	this.enviaForm =	f_oAviso_enviaForm;
}

/******************* SET ***********************************************/
function f_oAviso_set(nombre, idCapa, tipo, codError, descBreve, descLarga, textoBtnCancelar, textoBtnAceptar, nombreForm, accionBtnAceptar)
{
	this.nomVariable = nombre;
	this.idCapa = idCapa;
	this.tipo = tipo.toUpperCase();
	this.codError = codError;
	this.descBreve = descBreve;
	this.descLarga = descLarga;
	this.textoBtnCancelar = textoBtnCancelar;
	if (textoBtnAceptar) this.textoBtnAceptar = textoBtnAceptar;	
	if ((nombreForm) && (nombreForm!='')) 
	{
		this.formulario = eval('document.forms["'+nombreForm+'"]');
	}
	else
	{
		this.formulario = document.forms[1];
	}
	if (accionBtnAceptar) this.accionBtnAceptar = accionBtnAceptar;
}

function f_oAviso_enviaForm() 
{	
	if(this.accionBtnAceptar!='')
	{
		this.formulario.action = this.accionBtnAceptar;
	}	
	//this.formulario.target = '_self'; // No sé pq estaba, necesitamos ejecutar el formulario x el oculto (09/03/2010)	
	this.formulario.submit();
	this.cerrarCapa();
}


/******************* CERRAR CAPA *************************************/
function f_oAviso_cerrarCapa(idObjGen) 
{	
	var capaAviso = null;
	capaAviso = eval('document.getElementById("'+this.idCapa+'")');
	capaAviso.style.display = "none";
	
	var capaBloqueo = document.getElementById("capaBloqueo");
  	document.body.removeChild(capaBloqueo);
  	
	if ((idObjGen!=null) && (idObjGen!=''))
	{				
		document.getElementById(idObjGen).focus();
	}	
}

/******************* Mostrar Acerca de *************************************/
function f_oAviso_mostrarAbout(objetoGenerador)
{
	var capaAviso = null;
	var contenido = '';
	var imgBk = '';
	var cerrar = '';
	var idObjGenerador ='';

	if (objetoGenerador !== undefined)
	{		
		idObjGenerador = objetoGenerador.id;
	}
	else
	{
		idObjGenerador='';
	}
		
	//Creamos la capa de bloqueo
	this.capaBloqueo();
	
	//Creamos la capa de Error
	this.capaError();
		
	contenido += '<div id="about" class="about">';
		contenido += '<div id="superior" class="toolbarAbout">';
			contenido += '<div id="logoLateral" class="logoAbout">';		
				contenido += '<img class="logoAbout" style="margin-bottom: 10px;" src="igep/images/logo.jpg" border="0">';
				contenido += '<br><br>';
				contenido += '<a href="http://www.gvhidra.org" target="_blank" style="color:black;text-decoration: none;cursor: pointer;">www.gvhidra.org</a>';
			contenido += '</div>';
			contenido += '<div id="texto" class="titleAbout">';
				contenido += '<span class="text1">'+this.tipo+'</span><br/>';
				contenido += '<span class="text2">'+this.codError+'</span><br/>';
				contenido += '<span class="text3">gvHidra '+this.descBreve+'</span>';
			contenido += '</div>';
		contenido += '</div>';
		contenido += '<div id="inferior" class="logoBottomAbout">';
			contenido += '<img src="'+this.rutaImg+'logos/logo.gif" border="0"><br/>';
		contenido += '</div>';
	
		contenido += '<div id="inferior" class="toolbarBottomAbout">';
			contenido += '<button type="button" id="btnAceptar" name="btnAceptar" class="text button" style="cursor:pointer" onmouseover="this.className=\'text button_on\';" onmouseout="this.className=\'text button\';" onClick="'+this.nomVariable+'.cerrarCapa(\''+idObjGenerador+'\');">';
			contenido += '<img style="border-style: none;" id="aceptar" src="'+this.rutaImg+'acciones/41.gif"> Aceptar</button>';
		contenido += '</div>';
	contenido += '</div>';
	
	capaAbout = eval('document.getElementById("'+this.idCapa+'")');
	capaAbout.innerHTML = contenido;
	capaAbout.style.display = 'block';
	document.getElementById('btnAceptar').focus();  
}

/******************* Mostrar Aviso *************************************/
function f_oAviso_mostrarAviso(objetoGenerador)
{
	var capaAviso = null;
	var contenido = '';
	var imgBk = '';
	var cerrar = '';
	var idObjGenerador ='';

	if (objetoGenerador !== undefined)
	{		
		idObjGenerador = objetoGenerador.id;
	}
	else
	{
		idObjGenerador='';
	}
		
	//Creamos la capa de bloqueo
	this.capaBloqueo();
	
	//Creamos la capa de Error
	this.capaError();
	
	switch(this.tipo) //Según el tipo de aviso...
	{
		case 'ERROR':
		case 'error':
			imgBk = this.rutaImgAvisos+'aviso-rojo.gif';
			cerrar = this.rutaImgAvisos+'cerrar-rojo.gif';
		break;
		
		case 'AVISO':
		case 'aviso':
			imgBk = this.rutaImgAvisos+'aviso-azul.gif';
			cerrar = this.rutaImgAvisos+'cerrar-azul.gif';
		break;
		
		case 'SUGERENCIA':
		case 'sugerencia':
			 imgBk = this.rutaImgAvisos+'aviso-verde.gif';
			 cerrar = this.rutaImgAvisos+'cerrar-verde.gif';
		break;
		
		case 'ALERTA':
		case 'alerta':
			imgBk = this.rutaImgAvisos+'aviso-amarillo.gif';
			cerrar = this.rutaImgAvisos+'cerrar-amarillo.gif';
		break;
		
		case 'CONFIRM':
		case 'confirm':
			imgBk = this.rutaImgAvisos+'aviso-verde.gif';
			cerrar = this.rutaImgAvisos+'cerrar-verde.gif';
		break;
	};
	
 	// Dibuja la ventana y fija el contenido de la capa
	//Formulario y campos ocultos para el manejo de mensajes
	contenido += '<table style="width: 350px; height: 250px; text-align:left; border: 2px solid grey; border-collapse: collapse;" cellpadding="0" cellspacing="0">';
	 	contenido += '<tr>';
			contenido += '<td>';
				contenido += '<table style="border-style: none; width:100%; height:100%; border-collapse: collapse;" cellpadding="0" cellspacing="0">';
					contenido += '<tr>';
						contenido += '<td style="border-style: none; width:100%; height:109px; border-collapse: collapse;" background='+imgBk+'>';
							contenido += '<table style="border-style: none; height:100%; border-collapse: collapse;"  cellpadding="0" cellspacing="0">';
								contenido += '<tr>';
									contenido += '<td style="border-style: none; width:20px;">&nbsp;</td>';
									contenido += '<td style="border-style: none; width:320px; vertical-align: top;" class="errorCode" >&nbsp;'+this.codError+'</td>';
									contenido += '<td style="width: 15px; text-align:right; vertical-align: top;"><img src='+cerrar+' style="width: 11px; height:14px; border-style: none; " onClick="';
										contenido += this.nomVariable+'.cerrarCapa()" />&nbsp;';
									contenido +='</td>';
								contenido += '</tr>';
								contenido += '<tr>';
									contenido += '<td style="width: 15px;">&nbsp;</td>';
									contenido += '<td colspan="3" style="width: 15px; vertical-align: bottom;" class="shortNotice" >'+this.descBreve+'</td>';
								contenido += '</tr>';
							contenido += '</table>';
						contenido += '</td>';
					contenido += '</tr>';
					contenido += '<tr>';
						contenido +='<td style="width: 2%;" class="backgroundGray"></td>';
					contenido +='</tr>';
					contenido += '<tr>';
						contenido += '<td style="width: 100%; background-color: #ffffff;">';
						contenido += '<table style="background-color: #ffffff; border-style: none; height: 100%; width:100%; border-collapse: collapse;" cellpadding="0" cellspacing="0" >';
								contenido += '<tr>';
									contenido += '<td width="15">&nbsp;</td>';
									contenido += '<td class="longNotice">'+this.descLarga+'</td>';
								contenido += '</tr>';
							contenido += '</table>';	
						contenido += '</td>';
					contenido += '</tr>';
					contenido += '<tr class="backgroundGray">';
						contenido += '<td style="height: 8%; text-align: right; " >';
							contenido += '<table style="border-style: none; text-align: right;" cellspacing="1" cellpadding="1" align="right">';
								contenido += '<tr>';
									contenido += '<td>';
		
									if ((this.textoBtnCancelar != null) || ((this.tipo == 'CONFIRM') || (this.tipo == 'confirm')))
									{
										contenido += '<button type="button" id="btnAceptar" name="btnAceptar" class="text button" style="cursor:pointer" onmouseover="this.className=\'text button_on\';" onmouseout="this.className=\'text button\';" onClick="'+this.nomVariable+'.enviaForm();">';
											contenido += '<img style="border-style: none; " id="aceptar" src="'+this.rutaImg+'acciones/41.gif" />'+this.textoBtnAceptar;	
										contenido +='</button>';										
										
										contenido += '&nbsp;<button type="button" id="btnCancelar" name="btnCancelar" class="text button" style="cursor:pointer" onmouseover="this.className=\'text button_on\';" onmouseout="this.className=\'text button\';" onClick="'+this.nomVariable+'.cerrarCapa();">';
											contenido += '<img style="border-style: none; " id="cancelar" src="'+this.rutaImg+'acciones/42.gif" />'+this.textoBtnCancelar;
										contenido +='</button>';
									}
									else 
									{
										contenido += '<button type="button" id="btnAceptar" name="btnAceptar" class="text button" style="cursor:pointer" onmouseover="this.className=\'text button_on\';" onmouseout="this.className=\'text button\';" onClick="'+this.nomVariable+'.cerrarCapa(\''+idObjGenerador+'\');">';
											contenido += '<img style="border-style: none; " id="aceptar" src="'+this.rutaImg+'acciones/41.gif" />'+this.textoBtnAceptar;	
										contenido +='</button>';										
									}
									contenido += '</td>';
								contenido += '</tr>';
							contenido += '</table>';
						contenido += '</td>';
					contenido += '</tr>';
				contenido += '</table>';
			contenido += '</td>';
		contenido += '</tr>';
	contenido += '</table>';
	//Cierre Formulario
	//contenido +='<form>'
	capaAviso = eval('document.getElementById("'+this.idCapa+'")');
	capaAviso.innerHTML = contenido;
	capaAviso.style.display = 'block';
	document.getElementById('btnAceptar').focus();  
}

/******************** CREAR CAPA Bloqueo *********************************/
function f_oAviso_capaBloqueo() 
{
	//Si la capa de bloqueo no existe la crea.      
	if(document.getElementById("capaBloqueo")==null)
	{
		// crear la capa de bloqueo para explorer y para mozilla
		var nuevo = document.createElement("div");
		nuevo.id="capaBloqueo";
		nuevo.style.position="absolute";
		nuevo.style.zIndex=this.zIndice;
		nuevo.style.left=0;
		nuevo.style.top=0;
		nuevo.style.backgroundImage="url('"+this.imgFondo+"')";
		nuevo.style.width=this.anchoPagina;
		nuevo.style.height=this.altoPagina;
		document.body.appendChild(nuevo);		
	}
}

/******************** CREAR CAPA ERROR *********************************/

function f_oAviso_capaError() 
{
	var capa = this.idCapa;	
	var msgTop, msgLeft;

	// calcular posicion de la capa de ventana de error
	LeftPosition = (this.anchoPagina) ? (this.anchoPagina-this.ancho)/2 : 0;
	TopPosition = (this.altoPagina) ? (this.altoPagina-this.alto)/2 : 0;
	
	Z = parseInt(this.zIndice+2, 10);
	obj_capaError = eval('document.getElementById("'+this.idCapa+'")');
	obj_capaError.style.zIndex = Z;
	obj_capaError.style.width = this.ancho;
	obj_capaError.style.height = this.alto;	
	obj_capaError.style.left = LeftPosition;
	obj_capaError.style.top = TopPosition;	
	obj_capaError.style.display = "block";
}

/************************* CONTENIDO CAPA ERROR **************************/


/******************* Mostrar Aviso *************************************/
function f_oAviso_mostrarMensajeCargando(mensaje)
{
	var capaAviso = null;
	var contenido = '';
	var imgBk = '';
	var cerrar = '';

	//Creamos la capa de bloqueo
	this.capaBloqueo();
	
	//Creamos la capa de Error
	this.capaError();
	
	imgBk = this.rutaImgAvisos+'gvhidra.gif';	
		
	contenido += '<div id="loading">';
	contenido += '<ul class="bokeh">';
	contenido += '<li></li><li></li><li></li><li></li><li></li><li></li>';
	contenido += '</ul>';
	contenido += '</div>';
	capaAviso = eval('document.getElementById("'+this.idCapa+'")');
	capaAviso.innerHTML = contenido;
	capaAviso.style.display = 'block';
}

/** FUNCTION QUE MUESTRA EL DIV EN LA POSICIÓN DEL RATÓN **/
function showdiv(event,id)
{
	//determina un margen de pixels del div al raton
	margin=5;
	//La variable IE determina si estamos utilizando IE
	var IE = document.all?true:false;

	var tempX = 0;
	var tempY = 0;

	if(IE)
	{ //para IE
		tempX = event.x
		tempY = event.y
		if(window.pageYOffset){
			tempY=(tempY+window.pageYOffset);
			tempX=(tempX+window.pageXOffset);
		}else{
			tempY=(tempY+Math.max(document.body.scrollTop,document.documentElement.scrollTop));
			tempX=(tempX+Math.max(document.body.scrollLeft,document.documentElement.scrollLeft));
		}
	}else{ //para netscape
		document.captureEvents(Event.MOUSEMOVE);
		tempX = event.pageX;
		tempY = event.pageY;
	}

	if (tempX < 0){tempX = 0;} else {tempX = tempX - 15;}
	if (tempY < 0){tempY = 0;} 

	id.style.top = (tempY+margin)+"px";
	id.style.left = (tempX+margin)+"px";
	id.style.display='block';
	/*document.getElementById(capaInf).style.top = (tempY+margin)+"px";
	document.getElementById(capaInf).style.left = (tempX+margin)+"px";
	document.getElementById(capaInf).style.display='block';*/
	return;
}