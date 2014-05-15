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
* Clase Manejadora Tasoka_salud_biopsia2D
* 
* Creada con Genaro: generador de c�digo de gvHIDRA
* 
* @autor genaro
* @version 1.0
* @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v.2
*/
class Tasoka_salud_biopsia2D extends gvHidraForm_DB
{
	public function __construct() {

		//Recogemos dsn de conexion
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('g_my');

		$nombreTablas= array('tasoka_historial_biopsia');
		parent::__construct($g_dsn, $nombreTablas);

		/************************ QUERYs ************************/
		//Consulta del modo de trabajo LIS
		//$str_select = "SELECT id_animal as \"id_animal\", id_bacteria as \"lis_id_bacteria\", fecha as \"lis_fecha\", resultado as \"lis_resultado\" FROM tasoka_analitica";
		//$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo LIS
		//$str_where = "";
		//$this->setWhereForSearchQuery($str_where);

		//Order del modo de trabajo LIS
		//$this->setOrderByForSearchQuery('1');


		//Consulta del modo de trabajo EDI
		$str_select = "SELECT id_animal as \"id_animal\", fecha as \"edi_fecha\",descripcion as \"edi_descripcion\",nombre_fichero as \"edi_nombre_fichero\"  FROM tasoka_historial_biopsia";		 
		$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo EDI		 
		//$str_where_editar = "";
		//$this->setWhereForEditQuery($str_where_editar);

		//Order del modo de trabajo EDI
		$this->setOrderByForSearchQuery('2 desc');

		/************************ END QUERYs ************************/


		/************************ MATCHINGs ************************/

		//Seccion de matching: asociacion campos TPL y campos BD
		
		//Modo de trabajo LIS
		$this->addMatching("id_animal","id_animal","tasoka_historial_biopsia");
		//$this->addMatching("edi_animal","","tasoka_analitica");
		//$this->addMatching("lis_id_bacteria","id_bacteria","tasoka_analitica");
		//$this->addMatching("edi_id_bacteria","","tasoka_analitica");
		//$this->addMatching("lis_fecha","fecha","tasoka_analitica");
		$this->addMatching("edi_fecha","fecha","tasoka_historial_biopsia");
		$this->addMatching("edi_descripcion","descripcion","tasoka_historial_biopsia");
	//	$this->addMatching("lis_resultado","resultado","tasoka_analitica");
		//$this->addMatching("edi_resultado","","tasoka_analitica");

		/************************ END MATCHINGs ************************/


		/************************ TYPEs ************************/
	
		//Fechas: gvHidraDate type
		$fecha = new gvHidraDate(false);
    //	$fecha->setCalendar(false);
    //	$this->addFieldType('lis_fecha',$fecha);
		$fecha->setCalendar(true);
		$this->addFieldType('edi_fecha',$fecha);


		//Strings: gvHidraString type
		$string = new gvHidraString(false, 5000);
	//	$this->addFieldType('lis_resultado',$string);
		$this->addFieldType('edi_descripcion',$string);
		

		//Integers: gvHidraInteger type
		$int = new gvHidraInteger(false, 10);
	//	$this->addFieldType('lis_id_animal',$int);		
		$this->addFieldType('id_animal',$int);
		
		

		//Floats: gvHidraFloat type

		/************************ END TYPEs ************************/
				
		/************************ COMPONENTS ************************/
		
		//Declaracion de Listas y WindowSelection
		//La definici�n debe estar en el AppMainWindow.php
       
	
		/************************ END COMPONENTS ************************/						
		
		//Asociamos con la clase maestro	
		$this->addMaster("Tasoka_animales2");
		
	}//End construct

	/************************ CRUD METHODs ************************/

	/**
	* metodo preRecargar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la recarga. Por ejemplo:
	* - Incluir condiciones.
	* - Cancelar la accion. 
	*/	
	public function preRecargar($objDatos) {
		
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

	    $m_datos=$objDatos->getAllTuplas();
	    
	    foreach ($m_datos as $key=>$linea) {
	    if($m_datos[$key]['edi_nombre_fichero']!=null) {
	    //    IgepDebug::setDebug(DEBUG_USER,"HAY FICHERO");
	        $m_datos[$key]['mostrar_informe']="true";
	    }
	    else {
	      //  IgepDebug::setDebug(DEBUG_USER,"NO HAY FICHERO");
	        
	        $m_datos[$key]['mostrar_informe']="false";
		
	    }
	    }
	     $objDatos->setAllTuplas($m_datos);
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
	    
	    
	  //  $m_datos=$objDatos->getAllTuplas();
	    
	
		
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
		//IgepDebug::setDebug(DEBUG_USER,"El codigo es: <pre>".print_r($objDatos,true)."</pre>");
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
	    
		 do{
            $id_animal=$objDatos->getValue('id_animal');
	        $fecha=$objDatos->getValue('edi_fecha');
	        $fecha_ok=$this->getConnection()->prepararFecha($fecha);
            $datosFileE = $objDatos->getFileInfo('ficheroUploadInforme');
		    $trozos = explode(".", $datosFileE['name']); 
            $extension =strtolower(end($trozos));
            
            if(is_array($datosFileE) and ($datosFileE['tmp_name']!='')) {
              //  $fichero = pg_escape_bytea(file_get_contents($datosFileE['tmp_name']));
               // ini_set('memory_limit', '-1');
            	if($extension!=="pdf" && $extension!=="doc" && $extension!=="docx" && $extension!=="odt") {
                	$this->showMessage('APL-11');
                	return -1;
            	}
                $fp = fopen ( $datosFileE ['tmp_name'], 'r' );
                $content = fread ( $fp, filesize ( $datosFileE ['tmp_name'] ) );
                $content = mysql_real_escape_string ( $content );
                fclose ( $fp );
                
                $res = $this->operar ( "UPDATE tasoka_historial_biopsia SET informe='" . $content . "', nombre_fichero='" . $datosFileE ['name'] . "' where id_animal='" . $id_animal . "' and fecha='" . $fecha_ok . "'" );
				
                
                if($res==-1){
                    $this->showMessage('APL-46');
                    return -1;
                }

            }
         
		
        
        } while($objDatos->nextTupla());
        
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
	    
	    $id_animal=$objDatos->getValue('id_animal');
	    $fecha=$objDatos->getValue('edi_fecha');
	    $fecha_ok=$this->getConnection()->prepararFecha($fecha);
	   
		//Actualiza el informe
	   /* $datosFileE = $objDatos->getFileInfo('ficheroUploadInforme');
        if(is_array($datosFileE) and ($datosFileE['tmp_name']!='')) {
            $fichero = pg_escape_bytea(file_get_contents($datosFileE['tmp_name']));
            //   ini_set('memory_limit', '-1');
            $res = $this->operar("UPDATE tasoka_historial_analitica SET informe='{$fichero}', nombre_fichero='{$datosFileE['name']}' where id_animal='".$id_animal."' and fecha=".$fecha_ok);
            if($res==-1){
                $this->showMessage('APL-46');
                return -1;
            }

        }
        */
	    $datosFileE = $objDatos->getFileInfo('ficheroUploadInforme');
	    if(is_array($datosFileE) and ($datosFileE['tmp_name']!='')) {
	        $trozos = explode(".", $datosFileE['name']); 
            $extension =strtolower(end($trozos));
            if($extension!=="pdf" && $extension!=="doc" && $extension!=="docx" && $extension!=="odt") {
                $this->showMessage('APL-11');
                return -1;
            }
	    	$fp      = fopen($datosFileE['tmp_name'], 'r');
	    	$content = fread($fp, filesize($datosFileE['tmp_name']));
	    	$content = mysql_real_escape_string($content);
	    	fclose($fp);
	    
	    	$res = $this->operar("UPDATE tasoka_historial_biopsia SET informe='".$content."', nombre_fichero='".$datosFileE['name']."' where id_animal='".$id_animal."' and fecha='".$fecha_ok."'");
	    
	    	if($res==-1){
	    		$this->showMessage('APL-46');
	    		return -1;
	    	}
	    }
       
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
        
		//throw new Exception('Se ha intentado ejecutar la acci�n '.$str_accion.' y no est� programada.');      

		//IgepDebug::setDebug(DEBUG_USER,"El valor es: <pre>".$str_accion."</pre>");
        //$num=IgepSession::dameCampoTuplaSeleccionada('TcomintComunicaciones','edi_numorden');
        //$anyo=IgepSession::dameCampoTuplaSeleccionada('TcomintComunicaciones','edi_anyo');
        $id_animal=$objDatos->getValue('id_animal');
        $fecha=$objDatos->getValue('edi_fecha');
        switch ($str_accion) {
         case 'verInformeAnalisis':
                        //Bucle para crear un listado para cada peticion seleccionada:
               // $objDatos->setOperation("seleccionar");
                //$m_datosSeleccionados = $objDatos->currentTupla();
                $res = $this->consultar("SELECT nombre_fichero,informe from tasoka_historial_biopsia
                WHERE id_animal ='".$id_animal."' and fecha='".$this->getConnection()->prepararFecha( $fecha)."'");
                if(is_array($res)&&$res[0]['informe']!=''){                    
                    $trozos = explode(".", $res[0]['nombre_fichero']); 
                    $extension =strtolower(end($trozos));
                    if($extension==="pdf")         
                        header('Content-Type: application/pdf');
                    elseif($extension==="doc" || $extension==="docx")
                         header("Content-type: application/msword");
                    elseif($extension==="odt")     
                        header("Content-type: application/vnd.oasis.opendocument.text");
                    else {
                        $this->showMessage('APL-44');
                    $actionForward = new ActionForward('gvHidraValidationError');
                    $actionForward->put('IGEPclaseManejadora','Tasoka_salud_analitica2D');
                   break;
                    }
                    header('Content-Disposition: attachment; filename="'.$res[0]['nombre_fichero'].'"');
                    //print(pg_unescape_bytea($res[0]['doc_entrada']));
					print($res[0]['informe']);
                    ob_end_flush ();
                  //Para que no continue la ejecuci\F3n de la p\E1gina
                    die;         
                }  
                else {
                    $this->showMessage('APL-44');
                    $actionForward = new ActionForward('gvHidraValidationError');
                    $actionForward->put('IGEPclaseManejadora','Tasoka_salud_biopsia2D');
                   
                } 
                     
                break;
                
             case 'borrarInformeAnalisis':    
                // $objDatos->setOperation("actualizar");
                 if($objDatos->getValue('edi_nombre_fichero','actualizar')!='') {
                         
                         if(!empty($id_animal) && !empty($fecha)) {
                             
                             $sql="update tasoka_historial_biopsia set informe=null , nombre_fichero=null where id_animal=$id_animal and fecha='".$this->getConnection()->prepararFecha($fecha)."' ";
                             $error=$this->operar($sql);
                             if($error==0) {
                                 $this->showMessage('APL-49',array('ENTRADA'));
                                 $actionForward = $objDatos->getForward('gvHidraSuccess');
                                 $this->refreshSearch(false);
                             }
                             else {
                                  $this->showMessage('APL-48',array('ENTRADA'));
                                 $actionForward = $objDatos->getForward('gvHidraError');
                             }
                         }
                         //IgepDebug::setDebug(DEBUG_USER,"El codigo es: <pre>".print_r($objDatos->getValue('edi_doc_entrada_nombre'),true)."</pre>");
                         //$objDatos->setValue('edi_asunto','');
                         //die;
                 }   
                 else   {
                    $this->showMessage('APL-52',array('ENTRADA'));
                    $actionForward = new ActionForward('gvHidraValidationError');
                    $actionForward->put('IGEPclaseManejadora','Tasoka_salud_biopsia2D');
                 }
                 break;
        }
        	
    }
	
}//End 

?>