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
*  www.gvhidra.org
*
*/

/**
* Clase Manejadora <<$classname|capitalize>>
* 
* Creada con Genaro: generador de c�digo de gvHIDRA
* 
* @autor genaro
* @version 2.0
* @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v.2
*/

class <<$classname|capitalize>> extends gvHidraForm_DB
{
	public function __construct() {

		//Recogemos dsn de conexion
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('<<$dsn>>');

		$nombreTablas= array('<<$tablename>>');
		parent::__construct($g_dsn, $nombreTablas);

		/************************ QUERYs ************************/
		
		//Consulta del modo de trabajo LIS
		$str_select = "SELECT <<section name=select loop=$fields>><<$fields[select]>> as \"lis_<<$fields[select]>>\"<<if $smarty.section.select.last>><<else>>, <</if>><</section>> FROM <<$tablename>>";
		$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo LIS
		//$str_where = "";
		//$this->setWhereForSearchQuery($str_where);

		//Order del modo de trabajo LIS
		$this->setOrderByForSearchQuery('1');


		//Consulta del modo de trabajo EDI
		$str_select_editar = "SELECT <<section name=select loop=$fields>><<$fields[select]>> as \"edi_<<$fields[select]>>\"<<if $smarty.section.select.last>><<else>>, <</if>><</section>> FROM <<$tablename>>";		 
		$this->setSelectForEditQuery($str_select_editar);

		//Where del modo de trabajo EDI		 
		//$str_where_editar = "";
		//$this->setWhereForEditQuery($str_where_editar);

		//Order del modo de trabajo EDI
		$this->setOrderByForEditQuery('1');

		/************************ END QUERYs ************************/


		/************************ MATCHINGs ************************/

		//Seccion de matching: asociacion campos TPL y campos BD

		//Modo de trabajo FIL
<<section name=fil loop=$fields>>
		$this->addMatching("fil_<<$fields[fil]>>","<<$fields[fil]>>","<<$tablename>>");
<</section>>

		//Modo de trabajo LIS
<<section name=lis loop=$fields>>
		$this->addMatching("lis_<<$fields[lis]>>","<<$fields[lis]>>","<<$tablename>>");
<</section>>

		//Modo de trabajo EDI
<<section name=edi loop=$fields>>
		$this->addMatching("edi_<<$fields[edi]>>","<<$fields[edi]>>","<<$tablename>>");
<</section>>

		/************************ END MATCHINGs ************************/


		/************************ TYPEs ************************/
	
		//Fechas: gvHidraDate type
<<section name=fecha loop=$fields>>
<<assign var='campo' value=$fields[fecha]>>
<<assign var='reqVal' value=$customFields.$campo.reqVal>>
<<assign var='calVal_fil' value=$customFields.$campo.calVal>>
<<assign var='calVal_lis' value=$customFields.$campo.calVal>>
<<assign var='calVal_edi' value=$customFields.$campo.calVal>>
<<if $types[fecha] eq "gvHidraDate">>
		$fecha = new gvHidraDate(false);
<<if $calVal_fil eq 1>>
    	$fecha->setCalendar(true);
<<else>>
    	$fecha->setCalendar(false);
<</if>>
    	$this->addFieldType('fil_<<$fields[fecha]>>',$fecha);
    	$this->addFieldType('lis_<<$fields[fecha]>>',$fecha);
<<if $notnulls[fecha] eq 'true'>>
		$fecha = new gvHidraDate(false);
<</if>>
<<if $calVal_edi eq 1>>
		$fecha->setCalendar(true);
<<else>>
		$fecha->setCalendar(false);
<</if>>
<<if $reqVal eq 1>>
		$fecha->setRequired(true);
<</if>>
		$this->addFieldType('edi_<<$fields[fecha]>>',$fecha);

<</if>>
<<if $types[fecha] eq "gvHidraDatetime">>
		$fecha = new gvHidraDatetime(false);
<<if $calVal_fil eq 1>>
		$fecha->setCalendar(true);
<<else>>
		$fecha->setCalendar(false);
<</if>>
		$this->addFieldType('fil_<<$fields[fecha]>>',$fecha);
		$this->addFieldType('lis_<<$fields[fecha]>>',$fecha);
<<if $notnulls[fecha] eq 'true'>>
		$fecha = new gvHidraDatetime(true);
<</if>>
<<if $calVal_edi eq 1>>
		$fecha->setCalendar(true);
<<else>>
		$fecha->setCalendar(false);
<</if>>
<<if $reqVal eq 1>>
		$fecha->setRequired(true);
<</if>>
		$this->addFieldType('edi_<<$fields[fecha]>>',$fecha);

<</if>>
<</section>>

		//Strings: gvHidraString type
<<section name=string loop=$fields>>
<<assign var='campo' value=$fields[string]>>
<<assign var='mascara' value=$customFields.$campo.maskVal>>
<<assign var='reqVal' value=$customFields.$campo.reqVal>>
<<if $types[string] eq "gvHidraString">>
<<if $lengths[string] eq "">>
<<assign var='length' value='200'>>
<<else>>
<<assign var='length' value=$lengths[string]>>
<</if>>
		$string = new gvHidraString(false, <<$length>>);
<<if $mascara neq ''>>
		$string -> setInputMask('<<$mascara>>');
<</if>>
		$this->addFieldType('fil_<<$fields[string]>>',$string);
		$this->addFieldType('lis_<<$fields[string]>>',$string);
<<if $notnulls[string] eq 'true'>>
		$string = new gvHidraString(false, <<$length>>);
<<if $mascara neq ''>>
		$string->setInputMask('<<$mascara>>');
<</if>>
<<if $reqVal eq 1>>
		$string->setRequired(true);
<</if>>
<</if>>
		$this->addFieldType('edi_<<$fields[string]>>',$string);
		
<</if>>
<</section>>

		//Integers: gvHidraInteger type
<<section name=int loop=$fields>>
<<assign var='campo' value=$fields[int]>>
<<assign var='reqVal' value=$customFields.$campo.reqVal>>
<<if $types[int] eq "gvHidraInteger">>
		$int = new gvHidraInteger(false, <<$lengths[int]>>);
		$this->addFieldType('fil_<<$fields[int]>>',$int);
		$this->addFieldType('lis_<<$fields[int]>>',$int);		
<<if $notnulls[int] eq 'true'>>
		$int = new gvHidraInteger(true, <<$lengths[int]>>);
<</if>>
<<if $reqVal eq 1>>
		$int->setRequired(true);
<</if>>
		$this->addFieldType('edi_<<$fields[int]>>',$int);
		
<</if>>
<</section>>

		//Floats: gvHidraFloat type
<<section name=float loop=$fields>>
<<assign var='campo' value=$fields[float]>>
<<assign var='reqVal' value=$customFields.$campo.reqVal>>
<<if $types[float] eq "gvHidraFloat">>
<<assign var='partes' value=','|explode:$lengths[float]>>
		$float = new gvHidraFloat(false, <<$partes[0]>>);
		$float->setFloatLength(<<$partes[1]>>);
		$this->addFieldType('fil_<<$fields[float]>>',$float);
		$this->addFieldType('lis_<<$fields[float]>>',$float);		
<<if $notnulls[float] eq 'true'>>
		$float = new gvHidraFloat(true, <<$partes[0]>>);
		$float->setFloatLength(<<$partes[1]>>);
<</if>>
<<if $reqVal eq 1>>
		$float->setRequired(true);
<</if>>
		$this->addFieldType('edi_<<$fields[float]>>',$float);
		
<</if>>
<</section>>

		/************************ END TYPEs ************************/
				
		/************************ COMPONENTS ************************/
		
		//Declaracion de Listas y WindowSelection
		//La definici�n debe estar en el AppMainWindow.php

<<section name=components loop=$fields>>
<<assign var='campo' value=$fields[components]>>
<<assign var='componente' value=$customFields.$campo.componente>>
<<if $componente eq 2>>
<<*CheckBox*>>
		$check_fil = new gvHidraCheckBox('fil_<<$fields[components]>>');
		$check_fil->setChecked(true);
		$check_fil->setValueChecked('');
		$check_fil->setValueUnchecked('');
		$this->addCheckBox($check_fil);

		$check_lis = new gvHidraCheckBox('lis_<<$fields[components]>>');
		$check_lis->setChecked(false);
		$check_lis->setValueChecked('');
		$check_lis->setValueUnchecked('');
		$this->addCheckBox($check_lis);
		
		$check_edi = new gvHidraCheckBox('edi_<<$fields[components]>>');
		$check_edi->setChecked(false);
		$check_edi->setValueChecked('');
		$check_edi->setValueUnchecked('');
		$this->addCheckBox($check_lis);
		
<</if>>
<<if $componente eq 3>>
<<*RadioButton*>>
		$radio_fil = new gvHidraList('fil_<<$fields[components]>>');
		$radio_fil->setRadio(true);
		$radio_fil->addOption('','Default 1');
		$radio_fil->addOption('','Default 2');
		$radio_fil->setSelected('');
		$this->addList($radio_fil);

		$radio_lis = new gvHidraList('lis_<<$fields[components]>>');
		$radio_lis->setRadio(true);
		$radio_lis->addOption('','Default 1');
		$radio_lis->addOption('','Default 2');
		$radio_lis->setSelected('');
		$this->addList($radio_lis);
		
		$radio_edi = new gvHidraList('edi_<<$fields[components]>>');
		$radio_edi->setRadio(true);
		$radio_edi->addOption('','Default 1');
		$radio_edi->addOption('','Default 2');
		$radio_edi->setSelected('');
		$this->addList($radio_edi);
		
<</if>>
<<if $componente eq 4>>
<<*Lista*>>
		$lista_fil = new gvHidraList('fil_<<$fields[components]>>');
		$lista_fil->addOption('','Default 1');
		$lista_fil->addOption('','Default 2');
		$lista_fil->setSelected('');
		$this->addList($lista_fil);
		
		$lista_lis = new gvHidraList('edi_<<$fields[components]>>');
		$lista_lis->addOption('','Default 1');
		$lista_lis->addOption('','Default 2');
		$lista_lis->setSelected('');
		$this->addList($lista_lis);
		
<</if>>
<</section>>

		/************************ END COMPONENTS ************************/						

		
		//Mantener los valores del modo de trabajo FIL tras la busqueda
		$this->keepFilterValuesAfterSearch(true);

	}//End construct

	/************************ CRUD METHODs ************************/

	/**
	* metodo preBuscar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la busqueda. Por ejemplo:
	* - Incluir condiciones de filtrado.
	* - Cancelar la accion de buscar. 
	*/	
	public function preBuscar($objDatos) {
		
		return 0;
	}

	/**
	* metodo postBuscar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos obtenidos. Por ejemplo:
	* - Completar la informacion obtenida.
	* - Cambiar el color de las filas dependiendo de su valor
	*/	
	public function postBuscar($objDatos) {
		
		return 0;
	}

	/**
	* metodo preEditar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la edicion. Por ejemplo:
	* - Incluir condiciones de filtrado.
	* - Cancelar la accion. 
	*/	
	public function preEditar($objDatos) {
		
		return 0;
	}

	/**
	* metodo postEditar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos obtenidos. Por ejemplo:
	* - Completar la informacion obtenida.
	*/	
	public function postEditar($objDatos) {
		
		return 0;
	}

	/**
	* metodo preInsertar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos a insertar. Por ejemplo:
	* - Calcular el valor de una secuencia.
	* - Cancelar la acci?n de insercion.
	*/		
	public function preInsertar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo postInsertar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para completar la operacion de insercion. Por ejemplo:
	* - Insertar en una segunda tabla.
	*/		
	public function postInsertar($objDatos) {
		
		return 0;
	}

	/**
	* metodo preModificar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la operacion de actualizacion. Por ejemplo:
	* - Calcular valores derivados.
	* - Cancelar la acci?n de actualizacion.
	*/
	public function preModificar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo postModificar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para completar la operacion de actulizacion. Por ejemplo:
	* - Actualizar en una segunda tabla
	*/	
	public function postModificar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo preBorrar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la operacion de borrado. Por ejemplo:
	* - Cancelar la acci?n de borrado.
	*/	
	public function preBorrar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo postBorrar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para completar la operacion de borrado. Por ejemplo:
	* - Borrar en una segunda tabla
	*/	
	public function postBorrar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo preNuevo
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui los valores por defecto antes de insertar.
	*/	
	public function preNuevo($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo preIniciarVentana
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica a ejecutar cuando entra en la ventana. Por ejemplo:
	* - Puede comprobar que el usuario tiene los permisos necesarios.
	*/	
	public function preIniciarVentana($objDatos) {
		
		return 0;
	}
	
	/************************ END CRUD METHODs ************************/
	
	/**
	* metodo accionesParticulares
	* 
	* @access public
	* @param string $str_accion
	* @param object $objDatos
	* 
	* Incorpore aqui la logica de sus acciones particulares. 
	* -En el parametro $str_accion aparece el id de la accion.
	* -En el parametro $objDatos esta la informacion de la peticion. Recuerde que debe fijar la operacion
	* con el metodo setOperacion.
	*/	
	public function accionesParticulares($str_accion, $objDatos) {
        
		throw new Exception('Se ha intentado ejecutar la acci�n '.$str_accion.' y no est� programada.');        
    }
	
}//End  <<$classname|capitalize>>