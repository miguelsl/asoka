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
require_once('igep/include/IgepSmarty.php');

function smarty_block_CWContenedorPestanyas($params, $content, &$smarty) 
{	
	if(!isset($content)) // Si se abre la etiqueta {CWContenedorPestanyas}...
	{	
		$n_comp = "CWContenedorPestanyas";
		//A�adimos el componente al control de Instancias
		$num=$smarty->igepPlugin->registrarInstancia($n_comp);
	} 
	else 
	{
		$igepSmarty = new IgepSmarty();			
		if ($params['id'])
		{
			$nomPestanyero = $params['id'];
		}
		else 
		{ 
			$n_comp = "CWContenedorPestanyas";
			$num=$smarty->igepPlugin->getNumeroInstancia("CWContenedorPestanyas");
			$llamadas_js = "";	
			$nomPestanyero = $n_comp.$num; 
		}
	
		$script = '';	
		$script .= "var ".$nomPestanyero." = new oPestanyas(\"".$nomPestanyero."\");\n";
		$igepSmarty->addPreScript($script); 
		
		//Registramos el objeto JS
		$smarty->igepPlugin->registerJSObj($nomPestanyero);
	
		$ini_contenedor = "</td><td style='vertical-align: 100px;width:8%;'>\n";
		//$ini_contenedor .= "<table style='height: 100%;' cellspacing='0' cellpadding='0' border='0'>\n";
		
		//$ini_contenedor .= "<tr><td style='vertical-align:top';>";
		
		$ini_contenedor .= "<div id=\"containerTabs\">";
		$fin_contenedor = "</div>";
			
		//$fin_contenedor .= "</td></tr></table>\n";
	
		
		return $igepSmarty->getPreScript().$ini_contenedor.$content.$fin_contenedor;		
	}
}
?>