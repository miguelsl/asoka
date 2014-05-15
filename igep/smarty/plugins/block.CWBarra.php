<?php 
/* gvHIDRA. Herramienta Integral de Desarrollo R�pido de Aplicaciones de la Generalitat Valenciana
*
* Copyright (C) 2006 Generalitat Valenciana.
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
*
* For more information, contact:
*
*  Generalitat Valenciana
*  Conselleria d'Infraestructures i Transport
*  Av. Blasco Ib��ez, 50
*  46010 VALENCIA
*  SPAIN
*  +34 96386 24 83
*  gvhidra@gva.es
*  www.gvpontis.gva.es
*
*/
/**
* Pluggin CWBarra
*
* Componente barra
* @author  David Pascual <pascual_dav@gva.es>
* @author  Keka <bermejo_mjo@gva.es>
* @author  Toni F�lix <felix_ant@gva.es> 
* @author  Raquel Borjabad <borjabad_raq@gva.es>
* @author  Ver�nica Navarro <navarro_ver@gva.es>
* 
*/

function smarty_block_CWBarra($params, $content, &$smarty) {
	
	if(!isset($content)) // Si se abre la etiqueta {CWBarra}...
	{
		//NADA
	} 
	else 
	{
		$smarty->igepPlugin->registrarInclusionJS('reloj.js');
		$smarty->igepPlugin->registrarInclusionJS('pantallaInicio.js');
		
		// Par�metro que nos indicar� si es una ventana modal o no.
		/*************** MODAL ****************/
		$modal = false;
		if (($params['modal']) && ($params['modal'] == true) && ($params['modal'] == 'true'))
			$modal = true;
		/*************** FIN MODAL ****************/
			
		$alt = 'GVA';
		// textAlt par�metro que permitir� modificar el texto alternativo del logo
		if ($params['textAltLogo'])
			$alt = $params['textAltLogo'];

		if ($params['customTitle'])
    	{    		
    		if (trim($params['customTitle']))
    			$customTitle = trim($params['customTitle']);
    	}    
		
		$ini_barra .= "<div id='containerBar'>\n";
			$ini_barra .= "<div id='logoBar'>";
			$ini_barra .= "<img src='".IMG_PATH_CUSTOM."logos/logoMenu.gif' class='logoBar' alt='$alt' title='$alt' /></div>\n";
			$ini_barra .= "<div id='menuBar'>";
			
			$fin_barra .= "</div>";
			$fin_barra .= "<div id='titleBar'>".$params['codigo']."</div>\n";
			$fin_barra .= "<div id='userBar'>".$params['usuario']."</div>\n";
			$fin_barra .= "<div id='perfilBar'>".$customTitle."</div>\n";
			$fin_barra .= "<div id='timeBar'>00:00</div>\n";
	    	$fin_barra .= "<div id='dateBar'>--/--/----</div>\n";

		$fin_barra .= "<div id='toolBar'>";			
    	if ($modal == false)
		{
	    	$fin_barra .= "<form style='display:inline' name='cerrar' id='cerrar' target='oculto' method='get' action='phrame.php'>\n";
		   	$fin_barra .= "<input type='hidden' id='permitirCerrarAplicacion' name='permitirCerrarAplicacion' value='si' />\n";	   				
	
			if (!$params['volverInicio'])
			{
				$fin_barra .= "<a tabindex='-1' href='#'  ";
					$capa_js .= "onClick=\"javascript:{";
					$capa_js .= "if (document.getElementById('permitirCerrarAplicacion').value!='si') {";
					$capa_js .= "aviso.set('aviso','capaAviso',";
					$capa_js .= "'ALERTA', ";
					$capa_js .= "'IGEP IU', ";
					$capa_js .= "'Cambios pendientes',";
					$capa_js .= "'Existen datos pendientes de salvar. <br/>SALVE o CANCELE los mismos antes de salir.');";				
					$capa_js .= "aviso.mostrarAviso();";
					$capa_js .= "} else {";
					$capa_js .= "parent.location = '?view=igep/views/aplicacion.php';";
					$capa_js .= "}";
					$capa_js .= "}";
				$fin_barra.= $capa_js.'">';
				$fin_barra .= "<img src='".IMG_PATH_CUSTOM."botones/cerrarTr.gif' class='btnClose' title='Inicio' alt='Inicio' />";
				$fin_barra .="</a>\n";
			}
			$capa_js="";
			$fin_barra .= "<input type='hidden' id='action' name='action' value='cerrarAplicacion' />";
	
			$fin_barra .= "<a tabindex='-1' href='#' ";
				$capa_js .= "onClick=\"javascript:";
				$capa_js .= "cerrarAplicacion(document.forms['cerrar']);";
	   		$fin_barra.= $capa_js."\" >";
	   		$fin_barra .= "<img src='".IMG_PATH_CUSTOM."botones/28tr.gif' class='btnCloseApp' title='Cerrar la aplicaci�n' alt='&lt;-|' />";
	   		$fin_barra .="</a>&nbsp;\n";
	   		$fin_barra .= "</form>\n"; 
		}
		
		$fin_barra .= "</div>\n";
		$fin_barra .= "<div id='bottomBar'></div>\n";
		$fin_barra .= "\n<!-- ************* JAVASCRIPT *************** -->\n";		
		$fin_barra .= "<script type='text/javascript'>actualizaFechaHora();</script>\n";
		$fin_barra .= "<!-- **************************************** -->\n\n";
		
			$fin_barra .= "<div style='clear:both;'></div>";
		$fin_barra .= "</div>\n";
		if ($modal == false)
			return $ini_barra.$content.$fin_barra;
		else 
			return $ini_barra.$fin_barra;	
	}//FIN else isset
}//Fin funcion
?>