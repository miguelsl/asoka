<?php 
/* Block: CWInfoContenedor
*
* Copyright (C) 2011 Enlaza Soluciones Informáticas Valencia S.L.
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
*  Enlaza Soluciones Informáticas Valencia
*  C. República Guinea Ecuatorial Nº8, Bajo Izquierda
*  46022 VALENCIA
*  SPAIN
*  +34 96372 41 33
*  enlazasiv@enlazasiv.com
*  www.enlazasiv.com
*
*/
require_once('igep/include/IgepSmarty.php');

function smarty_block_CWInfoContenedor($params, $content, &$smarty) 
{
	if(!isset($content)) // Si se abre la etiqueta {CWInfoContenedor}...
	{	
		$n_comp = "CWInfoContenedor";	
		// Necesitamos saber cuántas instancias de este componente existen ya / para poner el codigo o no
		$num = $smarty->igepPlugin->registrarInstancia($n_comp);
	} 
	else 
	{	
		$ini_contenedor = "<!-- INI: CWInfoContenedor -->\n"
						. '<table width="100%" align="center" class="text" cellspacing="2" cellpadding="2">'
						. '  <td valign="top">'
						. '    <div class="help">'
						. '      <table><tr>'
						. '        <td valign="top"><img src="'.IMG_PATH_CUSTOM.'ayuda.gif"></td>'
						. '        <td class="helpText"><p>';

		$fin_contenedor = '        </p></td>'
						. '      </tr></table>'
						. '    </div>'
						. '  </td>'
						. '</table>'
						. "<!-- FIN: CWInfoContenedor -->\n";

		return $ini_contenedor . $content . $fin_contenedor;
	}
}
?>