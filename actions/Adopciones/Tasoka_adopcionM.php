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
*  www.gvhidra.org
*
*/

/**
* Clase Manejadora Tasoka_adopcionM
* 
* Creada con Genaro: generador de código de gvHIDRA
* 
* @autor genaro
* @version 1.0
* @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v.2
*/

class Tasoka_adopcionM extends gvHidraForm_DB
{
	public function __construct() 	{

		//Recogemos dsn de conexion
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('g_my');

		$nombreTablas= array('tasoka_animales');
		parent::__construct($g_dsn, $nombreTablas);


		/************************ QUERYs ************************/
		
		//Consulta del modo de trabajo EDI
		$str_select = "SELECT id as \"id\", tipo_animal as \"edi_tipo_animal\", foto as \"foto\", raza as \"edi_raza\", nombre as \"edi_nombre\", sexo as \"edi_sexo\", color as \"edi_color\", alto as \"edi_alto\", largo as \"edi_largo\", peso as \"edi_peso\", fecha_nacimiento as \"edi_fecha_nacimiento\", fecha_entrada as \"edi_fecha_entrada\", procedencia as \"edi_procedencia\", chip as \"edi_chip\", pasaporte as \"edi_pasaporte\", web as \"edi_web\", castrado as \"edi_castrado\", fecha_castracion as \"edi_fecha_castracion\", veterinario as \"edi_veterinario\", historia as \"edi_historia\", caracter as \"edi_caracter\" FROM tasoka_animales";
		$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo EDI
		//$str_where = "";
		//$this->setWhereForSearchQuery($str_where);

		//Order del modo de trabajo EDI
		$this->setOrderByForSearchQuery('nombre asc');
		
        $this->setLimit(50);
		/************************ END QUERYs ************************/
		


		/************************ MATCHINGs ************************/

		//Seccion de matching: asociacion campos TPL y campos BD

		//Modo de trabajo FIL		

		$this->addMatching("fil_tipo_animal","tipo_animal","tasoka_animales");
		$this->addMatching("fil_raza","raza","tasoka_animales");
		$this->addMatching("fil_nombre","nombre","tasoka_animales");
		$this->addMatching("fil_sexo","sexo","tasoka_animales");
		$this->addMatching("fil_color","color","tasoka_animales");
		$this->addMatching("fil_fecha_nacimiento","fecha_nacimiento","tasoka_animales");
		$this->addMatching("fil_fecha_entrada","fecha_entrada","tasoka_animales");
		$this->addMatching("fil_procedencia","procedencia","tasoka_animales");
		$this->addMatching("fil_chip","chip","tasoka_animales");
		$this->addMatching("fil_pasaporte","pasaporte","tasoka_animales");
		$this->addMatching("fil_web","web","tasoka_animales");
		$this->addMatching("fil_castrado","castrado","tasoka_animales");
	
		$this->addMatching("id","id","tasoka_animales");
		$this->addMatching("edi_tipo_animal","tipo_animal","tasoka_animales");
		$this->addMatching("edi_raza","raza","tasoka_animales");
		$this->addMatching("edi_nombre","nombre","tasoka_animales");
		$this->addMatching("edi_sexo","sexo","tasoka_animales");
		$this->addMatching("edi_color","color","tasoka_animales");
		$this->addMatching("edi_alto","alto","tasoka_animales");
		$this->addMatching("edi_largo","largo","tasoka_animales");
		$this->addMatching("edi_peso","peso","tasoka_animales");
		$this->addMatching("edi_fecha_nacimiento","fecha_nacimiento","tasoka_animales");
		$this->addMatching("edi_fecha_entrada","fecha_entrada","tasoka_animales");
		$this->addMatching("edi_procedencia","procedencia","tasoka_animales");
		$this->addMatching("edi_chip","chip","tasoka_animales");
		$this->addMatching("edi_pasaporte","pasaporte","tasoka_animales");
		$this->addMatching("edi_web","web","tasoka_animales");
		$this->addMatching("edi_castrado","castrado","tasoka_animales");
	//	$this->addMatching("edi_fecha_castracion","fecha_castracion","tasoka_animales");
	//	$this->addMatching("edi_lugar_castracion","lugar_castracion","tasoka_animales");
	//	$this->addMatching("edi_historia","historia","tasoka_animales");
	//	$this->addMatching("edi_caracter","caracter","tasoka_animales");

		/************************ END MATCHINGs ************************/


		/************************ TYPEs ************************/
		//Fechas: gvHidraDate type
        $fecha = new gvHidraDate(false);
    	$fecha->setCalendar(true);
    	$this->addFieldType('fil_fecha_nacimiento',$fecha);
    	$this->addFieldType('lis_fecha_nacimiento',$fecha);
		$fecha->setCalendar(true);
		$this->addFieldType('edi_fecha_nacimiento',$fecha);

		$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(true);
    	$this->addFieldType('fil_fecha_entrada',$fecha);
    	$this->addFieldType('lis_fecha_entrada',$fecha);
		$fecha->setCalendar(true);
		$this->addFieldType('edi_fecha_entrada',$fecha);
		
		//Strings: gvHidraString type
        $string = new gvHidraString(false, 50);
		$this->addFieldType('fil_raza',$string);
		//$this->addFieldType('lis_raza',$string);
		//$string = new gvHidraString(false, 50);
		$string->setRequired(true);
		$this->addFieldType('edi_raza',$string);
		
		$string = new gvHidraString(false, 20);
		$this->addFieldType('fil_color',$string);
		
		$string = new gvHidraString(false, 20);
		$string->setRequired(true);
		$this->addFieldType('edi_color',$string);
		
		$string = new gvHidraString(false, 100);
		$this->addFieldType('fil_procedencia',$string);
		
		$this->addFieldType('edi_procedencia',$string);
		
		
		//Integers: gvHidraInteger type
		$int = new gvHidraInteger(false, 4);	
		$this->addFieldType('edi_alto',$int);
        $this->addFieldType('edi_largo',$int);
		//Floats: gvHidraFloat type
		$float = new gvHidraFloat(false, 4);
		$float->setFloatLength(2);
		$this->addFieldType('edi_peso',$float);
		/************************ END TYPEs ************************/
		$lista_especie_fil = new gvHidraList('fil_tipo_animal','ESPECIES');    
		$lista_especie_fil ->addOption('','Cualquiera...');
		$lista_especie_fil ->setSelected('');
		$this->addList($lista_especie_fil );		
		
		/*
		$lista_raza_fil = new gvHidraList('fil_raza','RAZAS');    
		$lista_raza_fil ->addOption('','Cualquiera...');
		$lista_raza_fil ->setSelected('');
		$lista_raza_fil->setDependence(array('fil_tipo_animal'),array('tasoka_raza.tipo_animal'));
		$this->addList($lista_raza_fil );
		*/
		
		$lista_sexo_fil = new gvHidraList('fil_sexo');    
		$lista_sexo_fil ->addOption('','Cualquiera');
		$lista_sexo_fil ->addOption('Macho','Macho');
		$lista_sexo_fil ->addOption('Hembra','Hembra');
		$lista_sexo_fil ->setSelected('');
		$lista_sexo_fil->setRadio(true);
		$this->addList($lista_sexo_fil );
		
		$lista_web_fil = new gvHidraList('fil_web');    
		$lista_web_fil ->addOption('','Cualquiera');
		$lista_web_fil ->addOption('S','Si');
		$lista_web_fil ->addOption('N','No');
		$lista_web_fil ->setSelected('');
		$lista_web_fil->setRadio(true);
		$this->addList($lista_web_fil );
		
		$lista_chip_fil = new gvHidraList('fil_chip');    
		$lista_chip_fil ->addOption('','Cualquiera');
		$lista_chip_fil ->addOption('S','Si');
		$lista_chip_fil ->addOption('N','No');
		$lista_chip_fil ->setSelected('');
		$lista_chip_fil->setRadio(true);
		$this->addList($lista_chip_fil );

		$lista_pasaporte_fil = new gvHidraList('fil_pasaporte');    
		$lista_pasaporte_fil ->addOption('','Cualquiera');
		$lista_pasaporte_fil ->addOption('S','Si');
		$lista_pasaporte_fil ->addOption('N','No');
		$lista_pasaporte_fil ->setSelected('');
		$lista_pasaporte_fil->setRadio(true);
		$this->addList($lista_pasaporte_fil );		
		
		$lista_castrado_fil = new gvHidraList('fil_castrado');    
		$lista_castrado_fil ->addOption('','Cualquiera');
		$lista_castrado_fil ->addOption('S','Si');
		$lista_castrado_fil ->addOption('N','No');
		$lista_castrado_fil ->setSelected('');
		$lista_castrado_fil->setRadio(true);
		$this->addList($lista_castrado_fil );
		
		
		$lista_especie_edi = new gvHidraList('edi_tipo_animal','ESPECIES');    
		$this->addList($lista_especie_edi );		
		
		/*
		$lista_raza_edi = new gvHidraList('edi_raza','RAZAS');    
		$lista_raza_edi->setDependence(array('edi_tipo_animal'),array('tasoka_raza.tipo_animal'));
		$this->addList($lista_raza_edi );
		*/
		$lista_sexo_edi = new gvHidraList('edi_sexo');    
		$lista_sexo_edi ->addOption('Macho','Macho');
		$lista_sexo_edi ->addOption('Hembra','Hembra');
		$lista_sexo_edi->setRadio(true);
		$this->addList($lista_sexo_edi );
		
		$cb_web_edi=new gvHidraCheckBox('edi_web');
		$cb_web_edi->setValueChecked('S');
		$cb_web_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_web_edi);
		
		$cb_chip_edi=new gvHidraCheckBox('edi_chip');
		$cb_chip_edi->setValueChecked('S');
		$cb_chip_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_chip_edi);
		
		$cb_pasaporte_edi=new gvHidraCheckBox('edi_pasaporte');
		$cb_pasaporte_edi->setValueChecked('S');
		$cb_pasaporte_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_pasaporte_edi);
		
		$cb_castrado_edi=new gvHidraCheckBox('edi_castrado');
		$cb_castrado_edi->setValueChecked('S');
		$cb_castrado_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_castrado_edi);
		/************************ COMPONENTS ************************/
		
		//Declaracion de Listas y WindowSelection
		//La definición debe estar en el AppMainWindow.php

		
		
		/************************ END COMPONENTS ************************/

		//Relacionamos con las clases detalle
		$this->addSlave('Tasoka_adopcionD', array('id'), array('id_animal'));

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
      $m_datos = $objDatos->getAllTuplas();
      foreach($m_datos as $indice=>$tupla){
        if($m_datos[$indice]['foto']!=null)
          $m_datos[$indice]['foto']="include/image.php?id=".$tupla['id'];
       }

   	  $objDatos->setAllTuplas($m_datos);
		
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
	* metodo preInsertar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos a insertar. Por ejemplo:
	* - Calcular el valor de una secuencia.
	* - Cancelar la acción de insercion.
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
	* - Cancelar la acción de actualizacion.
	*/
	public function preModificar($objDatos) {
		
	    $m_datos=$objDatos->getAllTuplas();
		foreach($m_datos as $index=>$registro){
		    
		//    $m_datos[$index]['edi_nombre']=strtoupper(trim($m_datos[$index]['edi_nombre']));
		    $m_datos[$index]['edi_raza']=strtoupper(trim($m_datos[$index]['edi_raza']));
		    $m_datos[$index]['edi_color']=strtoupper(trim($m_datos[$index]['edi_color']));
		    $m_datos[$index]['edi_procedencia']=strtoupper(trim($m_datos[$index]['edi_procedencia']));
		}
		$objDatos->setAllTuplas($m_datos);
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
	* - Cancelar la acción de borrado.
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
        
		throw new Exception('Se ha intentado ejecutar la acción '.$str_accion.' y no está programada.');        
    }
	
}//End 

?>