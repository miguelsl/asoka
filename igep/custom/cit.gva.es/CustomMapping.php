<?php
/* gvHIDRA. Herramienta Integral de Desarrollo Rápido de Aplicaciones de la Generalitat Valenciana
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
*  Av. Blasco Ibáñez, 50
*  46010 VALENCIA
*  SPAIN
*  +34 96386 24 83
*  gvhidra@gva.es
*  www.gvpontis.gva.es
*
*/
/**
* Mapeador particular de CIT
* @version	$Id: CustomMapping.php,v 1.4 2008-01-07 15:04:42 afelixf Exp $
* @author David: <pascual_dav@gva.es> 
* @author Vero: <navarro_ver@gva.es>
* @author Toni: <felix_ant@gva.es> 
* @package cit
*/
class CustomMapping extends MappingManager {
    /**
    * constructor function
    * @return void
    */
    function CustomMapping () {
	                 
	    /* Peticiones de CIT*/
	    $this->_AddMapping('IgepPeticiones__iniciarVentana', 'IgepPeticiones');
	    $this->_AddForward('IgepPeticiones__iniciarVentana', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_peticiones.php');
	    				
	    $this->_AddMapping('IgepPeticiones__buscar', 'IgepPeticiones');
	    $this->_AddForward('IgepPeticiones__buscar', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_peticiones.php&panel=listar');
	    $this->_AddForward('IgepPeticiones__buscar', 'gvHidraError', 'index.php?view=igep/custom/cit.gva.es/views/igep_peticiones.php');
	    
	    $this->_AddMapping('IgepPeticiones__recargar', 'IgepPeticiones');
	    $this->_AddForward('IgepPeticiones__recargar', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_peticiones.php&panel=listar');
	    $this->_AddForward('IgepPeticiones__recargar', 'gvHidraError', 'index.php?view=igep/custom/cit.gva.es/views/igep_peticiones.php');

	    $this->_AddMapping('IgepPeticiones__cancelarTodo', 'IgepPeticiones');
	    $this->_AddForward('IgepPeticiones__cancelarTodo', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_peticiones.php');
	    
	    /*Novedades de la Versión de CIT*/
	    $this->_AddMapping('IgepNovedades__iniciarVentana', 'IgepNovedades');
	    $this->_AddForward('IgepNovedades__iniciarVentana', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php');
	    
	    $this->_AddMapping('IgepNovedades__buscar', 'IgepNovedades');
	    $this->_AddForward('IgepNovedades__buscar', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php&panel=listar');
		$this->_AddForward('IgepNovedades__buscar', 'gvHidraNoData', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php&panel=buscar');
	    $this->_AddForward('IgepNovedades__buscar', 'gvHidraError', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php');
	    
	    $this->_AddMapping('IgepNovedades__cancelarTodo', 'IgepNovedades');
	    $this->_AddForward('IgepNovedades__cancelarTodo', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php');
	    
	    $this->_AddMapping('IgepNovedades__editar', 'IgepNovedades');
	    $this->_AddForward('IgepNovedades__editar', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php&panel=editar');
	    $this->_AddForward('IgepNovedades__editar', 'gvHidraError', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php&panel=listar');
	    
	    $this->_AddMapping('IgepNovedades__cancelarEdicion', 'IgepNovedades');
	    $this->_AddForward('IgepNovedades__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=igep/custom/cit.gva.es/views/igep_novedadesVersion.php&panel=listar');

	    $this->_AddMapping('abrirAplicacion', 'CustomMainWindow');
	    $this->_AddForward('abrirAplicacion', 'gvHidraOpenApp', 'index.php?view=igep/views/aplicacion.php');
	    $this->_AddForward('abrirAplicacion', 'gvHidraCloseApp', 'index.php?view=igep/views/gvHidraCloseApp.php');
    }
}//FIN clase CustomMapping 
?>
