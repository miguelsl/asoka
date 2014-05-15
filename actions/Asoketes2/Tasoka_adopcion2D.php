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
* Clase Manejadora Tasoka_adopcionD
* 
* Creada con Genaro: generador de c�digo de gvHIDRA
* 
* @autor genaro
* @version 1.0
* @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v.2
*/

class Tasoka_adopcion2D extends gvHidraForm_DB
{
	public function __construct() {

		//Recogemos dsn de conexion
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('g_my');

		$nombreTablas= array('tasoka_adopcion');
		parent::__construct($g_dsn, $nombreTablas);


		/************************ QUERYs ************************/
		
		//Consulta del modo de trabajo LIS
		$str_select = "SELECT id_adopcion as \"lis_id_adopcion\", id_animal as \"id_animal\", reservado as \"lis_reservado\", contacto as \"lis_contacto\", pais_destino as \"lis_pais_destino\", fecha_salida as \"lis_fecha_salida\", adoptado as \"lis_adoptado\", fecha_adopcion as \"lis_fecha_adopcion\", devuelto as \"lis_devuelto\", fecha_devolucion as \"lis_fecha_devolucion\", motivo_devolucion as \"lis_motivo_devolucion\" FROM tasoka_adopcion";
		$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo LIS
		//$str_where = "";
		//$this->setWhereForSearchQuery($str_where);

		//Order del modo de trabajo LIS
		$this->setOrderByForSearchQuery('id_adopcion desc');

		//Consulta del modo de trabajo EDI
		$str_select_editar = "SELECT id_adopcion as \"edi_id_adopcion\", id_animal as \"id_animal\", reservado as \"edi_reservado\", contacto as \"edi_contacto\", pais_destino as \"edi_pais_destino\", fecha_salida as \"edi_fecha_salida\", adoptado as \"edi_adoptado\", fecha_adopcion as \"edi_fecha_adopcion\", adoptante_nif as \"edi_adoptante_nif\", adoptante_nombre as \"edi_adoptante_nombre\", adoptante_telefono as \"edi_adoptante_telefono\", adoptante_mail as \"edi_adoptante_mail\", devuelto as \"edi_devuelto\", fecha_devolucion as \"edi_fecha_devolucion\", motivo_devolucion as \"edi_motivo_devolucion\" FROM tasoka_adopcion";
		$this->setSelectForEditQuery($str_select_editar);

		//Where del modo de trabajo EDI		 
		//$str_where_editar = "";
		//$this->setWhereForEditQuery($str_where_listar);

		//Order del modo de trabajo EDI
		$this->setOrderByForEditQuery('id_adopcion asc');

		/************************ END QUERYs ************************/
		


		/************************ MATCHINGs ************************/

		//Seccion de matching: asociacion campos TPL y campos BD
	
		$this->addMatching("lis_id_adopcion", "id_adopcion", "tasoka_adopcion");
		$this->addMatching("edi_id_adopcion", "id_adopcion", "tasoka_adopcion");
		$this->addMatching("id_animal", "id_animal", "tasoka_adopcion");
		$this->addMatching("id_animal", "id_animal", "tasoka_adopcion");
		$this->addMatching("lis_reservado", "reservado", "tasoka_adopcion");
		$this->addMatching("edi_reservado", "reservado", "tasoka_adopcion");
		$this->addMatching("lis_contacto", "contacto", "tasoka_adopcion");
		$this->addMatching("edi_contacto", "contacto", "tasoka_adopcion");
		$this->addMatching("lis_pais_destino", "pais_destino", "tasoka_adopcion");
		$this->addMatching("edi_pais_destino", "pais_destino", "tasoka_adopcion");
		$this->addMatching("lis_fecha_salida", "fecha_salida", "tasoka_adopcion");
		$this->addMatching("edi_fecha_salida", "fecha_salida", "tasoka_adopcion");
		$this->addMatching("lis_adoptado", "adoptado", "tasoka_adopcion");
		$this->addMatching("edi_adoptado", "adoptado", "tasoka_adopcion");
		$this->addMatching("lis_fecha_adopcion", "fecha_adopcion", "tasoka_adopcion");
		$this->addMatching("edi_fecha_adopcion", "fecha_adopcion", "tasoka_adopcion");
		$this->addMatching("lis_devuelto", "devuelto", "tasoka_adopcion");
		$this->addMatching("edi_devuelto", "devuelto", "tasoka_adopcion");
		$this->addMatching("lis_fecha_devolucion", "fecha_devolucion", "tasoka_adopcion");
		$this->addMatching("edi_fecha_devolucion", "fecha_devolucion", "tasoka_adopcion");
		$this->addMatching("lis_motivo_devolucion", "motivo_devolucion", "tasoka_adopcion");
		$this->addMatching("edi_motivo_devolucion", "motivo_devolucion", "tasoka_adopcion");

		$this->addMatching("edi_adoptante_nif", "adoptante_nif", "tasoka_adopcion");
		$this->addMatching("edi_adoptante_nombre", "adoptante_nombre", "tasoka_adopcion");
		$this->addMatching("edi_adoptante_telefono", "adoptante_telefono", "tasoka_adopcion");
		$this->addMatching("edi_adoptante_mail", "adoptante_mail", "tasoka_adopcion");
		/************************ END MATCHINGs ************************/


		/************************ TYPEs ************************/
	
		//Fechas: gvHidraDate type
		$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(false);
    	$this->addFieldType('lis_fecha_salida',$fecha);
		$fecha->setCalendar(true);
		$this->addFieldType('edi_fecha_salida',$fecha);

		$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(false);
    	$this->addFieldType('lis_fecha_adopcion',$fecha);
		$fecha->setCalendar(true);
		$this->addFieldType('edi_fecha_adopcion',$fecha);

		$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(false);
    	$this->addFieldType('lis_fecha_devolucion',$fecha);
		$fecha->setCalendar(true);
		$this->addFieldType('edi_fecha_devolucion',$fecha);


		//Strings: gvHidraString type
		
		$string_nif = new typeNIF(false,9);
		$string_nif->setNIF(true);
		$string_nif->setNIE(true);
		$this->addFieldType('edi_adoptante_nif',$string_nif);
		
		$string=new gvHidraString(false,9);
		$string->setInputMask('#########');
		$this->addFieldType('edi_adoptante_telefono',$string);
		
		$string = new gvHidraString(false, 100);
		$this->addFieldType('lis_contacto',$string);
		$this->addFieldType('edi_adoptante_nombre',$string);
		$this->addFieldType('edi_adoptante_mail',$string);
		$string = new gvHidraString(false, 50);
		$this->addFieldType('lis_pais_destino',$string);
		
		$string = new gvHidraString(false, 1000);
		$this->addFieldType('edi_motivo_devolucion',$string);

		//Integers: gvHidraInteger type
// 		$int = new gvHidraInteger(false, 1);
// 		$this->addFieldType('lis_id_adopcion',$int);		
// 		$this->addFieldType('edi_id_adopcion',$int);
		
// 		$int = new gvHidraInteger(false, 4);
// 		$this->addFieldType('lis_id_animal',$int);		
// 		$this->addFieldType('edi_id_animal',$int);
		

		//Floats: gvHidraFloat type

		
		$cb_reservado_lis=new gvHidraCheckBox('lis_reservado');
		$cb_reservado_lis->setValueChecked('S');
		$cb_reservado_lis->setValueUnchecked('N');
		$this->addCheckBox($cb_reservado_lis);
		
		$cb_adoptado_lis=new gvHidraCheckBox('lis_adoptado');
		$cb_adoptado_lis->setValueChecked('S');
		$cb_adoptado_lis->setValueUnchecked('N');
		$this->addCheckBox($cb_adoptado_lis);
		
		$cb_devuelto_lis=new gvHidraCheckBox('lis_devuelto');
		$cb_devuelto_lis->setValueChecked('S');
		$cb_devuelto_lis->setValueUnchecked('N');
		$this->addCheckBox($cb_devuelto_lis);
		
		
		$cb_reservado_edi=new gvHidraCheckBox('edi_reservado');
		$cb_reservado_edi->setValueChecked('S');
		$cb_reservado_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_reservado_edi);
		
		$cb_adoptado_edi=new gvHidraCheckBox('edi_adoptado');
		$cb_adoptado_edi->setValueChecked('S');
		$cb_adoptado_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_adoptado_edi);
		
		$cb_devuelto_edi=new gvHidraCheckBox('edi_devuelto');
		$cb_devuelto_edi->setValueChecked('S');
		$cb_devuelto_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_devuelto_edi);
		
		
		/************************ END TYPEs ************************/
				
		/************************ COMPONENTS ************************/
		
		//Declaracion de Listas y WindowSelection
		//La definici�n debe estar en el AppMainWindow.php

		$this->addTriggerEvent('edi_reservado','activaReserva');
		$this->addTriggerEvent('edi_adoptado','activaAdopcion');
		$this->addTriggerEvent('edi_devuelto','activaDevolucion');
		/************************ END COMPONENTS ************************/						
		
		//Asociamos con la clase maestro
		$this->addMaster("Tasoka_animales2");
		
	}//End construct

	
	function activaReserva($objDatos) {
		//$campo=$objDatos->getTriggerField();
		//$panel=$objDatos->getActiveMode();
		//IgepDebug::setDebug(DEBUG_USER,"El valor es: <pre>".$panel." y ".$campo."</pre>");
		if($objDatos->getValue('edi_reservado')=='S'){
			$objDatos->setEnable('edi_contacto',true);
			$objDatos->setEnable('edi_pais_destino',true);
			$objDatos->setEnable('edi_fecha_salida',true);
		}
		else {
			$objDatos->setValue("edi_contacto",'');
			$objDatos->setValue("edi_fecha_salida",'');
			$objDatos->setValue("edi_pais_destino",'');
			$objDatos->setEnable('edi_contacto',false);
			$objDatos->setEnable('edi_fecha_salida',false);
			$objDatos->setEnable('edi_pais_destino',false);
		}
		return 0;
	}
	
	function activaAdopcion($objDatos) {
		//$campo=$objDatos->getTriggerField();
		//$panel=$objDatos->getActiveMode();
		//IgepDebug::setDebug(DEBUG_USER,"El valor es: <pre>".$panel." y ".$campo."</pre>");
		if($objDatos->getValue('edi_adoptado')=='S'){
			$objDatos->setEnable('edi_fecha_adopcion',true);
		    $objDatos->setEnable('edi_adoptante_nif',true);
	    	$objDatos->setEnable('edi_adoptante_nombre',true);
	    	$objDatos->setEnable('edi_adoptante_telefono',true);
	    	$objDatos->setEnable('edi_adoptante_mail',true);
		}
		else {
		    if($objDatos->getValue('edi_devuelto')=='S'){
		        
		        $this->showMessage('APL-2');
		       $objDatos->setEnable('edi_fecha_adopcion',false);
			    $objDatos->setEnable("edi_adoptante_nif",false);
			    $objDatos->setEnable("edi_adoptante_nombre",false);
			    $objDatos->setEnable("edi_adoptante_telefono",false);
			    $objDatos->setEnable("edi_adoptante_mail",false);
		    }
		    else{
			    $objDatos->setValue("edi_fecha_adopcion",'');
			    $objDatos->setValue("edi_adoptante_nif",'');
			    $objDatos->setValue("edi_adoptante_nombre",'');
			    $objDatos->setValue("edi_adoptante_telefono",'');
			    $objDatos->setValue("edi_adoptante_mail",'');
			    $objDatos->setEnable('edi_fecha_adopcion',false);
			    $objDatos->setEnable("edi_adoptante_nif",false);
			    $objDatos->setEnable("edi_adoptante_nombre",false);
			    $objDatos->setEnable("edi_adoptante_telefono",false);
			    $objDatos->setEnable("edi_adoptante_mail",false);
		    }
		}
		return 0;
	}
	
	function activaDevolucion($objDatos) {
		//$campo=$objDatos->getTriggerField();
		//$panel=$objDatos->getActiveMode();
		//IgepDebug::setDebug(DEBUG_USER,"El valor es: <pre>".$panel." y ".$campo."</pre>");
	    if($objDatos->getValue('edi_adoptado')=='S'){
		if($objDatos->getValue('edi_devuelto')=='S'){
			$objDatos->setEnable('edi_fecha_devolucion',true);
			$objDatos->setEnable('edi_motivo_devolucion',true);
		}
		else {
			$objDatos->setValue("edi_fecha_devolucion",'');
			$objDatos->setValue("edi_motivo_devolucion",'');
			$objDatos->setEnable('edi_fecha_devolucion',false);
			$objDatos->setEnable('edi_motivo_devolucion',false);
		}
	    }
	    else {
	       // $objDatos->setValue('edi_devuelto','N');
	       $objDatos->setChecked('edi_devuelto',false);
	    }
		return 0;
	}
	
	/************************ CRUD METHODs ************************/

	/**
	* metodo preRecargar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la carga del detalle. Por ejemplo:
	* - Incluir condiciones.
	* - Cancelar la accion. 
	*/	
	public function preBuscar($objDatos) {
		
		return 0;
	}

	/**
	* metodo postRecargar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos obtenidos. Por ejemplo:
	* - Completar la informacion obtenida.
	* - Cambiar el color de las filas dependiendo de su valor
	*/	
	public function postRecargar($objDatos) {
	   
		return 0;
	}

	
	public function postEditar($objDatos) {
	 
		$m_datos=$objDatos->getAllTuplas();
		foreach ($m_datos as $key=>$linea) {
		    
		    if($m_datos[$key]['edi_reservado']==='S'){
		        $m_datos[$key]['reserva_activa']="true";  
		    }
		    else  {
		        $m_datos[$key]['reserva_activa']="false";
		       
		    }
		    if($m_datos[$key]['edi_adoptado']==='S')
		        $m_datos[$key]['adopcion_activa']="true";
		    else 
		        $m_datos[$key]['adopcion_activa']="false";  
		          
		    if($m_datos[$key]['edi_devuelto']==='S')
		        $m_datos[$key]['devolucion_activa']="true";   
		    else     
		        $m_datos[$key]['devolucion_activa']="false";           
		}
		$objDatos->setAllTuplas($m_datos);
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
	* - Cancelar la acci�n de insercion.
	*/		
	public function preInsertar($objDatos) {
		$id_animal=$objDatos->getValue('id_animal');
		$id_adop=$this->calcularSecuencia('tasoka_adopcion','id_adopcion',array('id_animal'),1);
		$objDatos->setValue('edi_id_adopcion',$id_adop);
		$objDatos->setValue('edi_adoptante_nombre',mb_strtoupper($objDatos->getValue('edi_adoptante_nombre')));
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
		$this->refreshMaster();
		
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
	* - Cancelar la acci�n de actualizacion.
	*/
	public function preModificar($objDatos) {
		$objDatos->setValue('edi_adoptante_nombre',mb_strtoupper($objDatos->getValue('edi_adoptante_nombre')));
	    
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
		$this->refreshMaster();
		
		return 0;
	}
	
	/**
	* metodo preBorrar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la operacion de borrado. Por ejemplo:
	* - Cancelar la acci�n de borrado.
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
		$this->refreshMaster();
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
		//$id=IgepSession::dameCampoTuplaSeleccionada("Tasoka_adopcionM","id");
    	//$numero=IgepSession::dameCampoTuplaSeleccionada("TddmDenegacionM","numero");
    	
    //	$this->addDefaultData('id_animal',$id);
//    	$this->addDefaultData('numero',$numero);  
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
	
}//End 

?>
