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

function smarty_block_CWMarcoPanel($params, $content, &$smarty) 
{
	if(!isset($content)) // Si se abre la etiqueta {CWMarcoPanel}...
	{	
		$n_comp = "CWMarcoPanel";	
		// Necesitamos saber cu�ntas instancias de este componente existen ya / para poner el codigo o no
		$num=$smarty->igepPlugin->registrarInstancia($n_comp);
	} 
	else 
	{
		
		$llamadas_js = '';
		if ($params['conPestanyas']) 
		{
			$smarty->igepPlugin->registrarInclusionJS('pestanyas.js');
		}
			
		// Tabla exterior que engloba todo el contenido (pesta�as y contenido)
		$ini_tabla = "<!-- INI: CWMarcoPanel -->\n";
		$ini_tabla .= "<br/>\n";
		$ini_tabla .= "<table style='width: 100%; border-style:none;' align='center' cellspacing='0' cellpadding='0'>\n";
		$ini_tabla .= "<tr>\n";
		//$ini_tabla .= "\t<td style='width:97%;vertical-align:top;'>\n";
		$ini_tabla .= "\t<td class='frame'>\n";
		
		$fin_tabla = "\t</td>\n";
		$fin_tabla .= "</tr>\n";
		$fin_tabla .= "</table>\n";
		$fin_tabla .= "<!-- FIN: CWMarcoPanel -->\n";
				
		return $llamadas_js.$ini_tabla.$content.$fin_tabla."\n";
	}
}
?>