<?php
/* gvHIDRA. Herramienta Integral de Desarrollo Rï¿½pido de Aplicaciones de la Generalitat Valenciana
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
*  Av. Blasco Ibï¿½ï¿½ez, 50
*  46010 VALENCIA
*  SPAIN
*  +34 96386 24 83
*  gvhidra@gva.es
*  www.gvhidra.org
*
*/

/**
* Clase Manejadora Tasoka_animales2
* 
* Creada con Genaro: generador de cï¿½digo de gvHIDRA
* 
* @autor genaro
* @version 2.0
* @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v.2
*/
//include_once '../mifile.php';


//require_once('include/jasper/modulosPHP/informeJasper.php');


class Tasoka_animales2 extends gvHidraForm_DB
{
	public function __construct() {

		//Recogemos dsn de conexion
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('g_my');
		
		$estado='';
		$infJasper_listadoFichaJasper;
		$tipoListado;
		$lanzarInforme;
				
		$nombreTablas= array('tasoka_animales');
		parent::__construct($g_dsn, $nombreTablas);

		/************************ QUERYs ************************/
		
		//Consulta del modo de trabajo LIS
		//$str_select = "SELECT id as \"id\", tipo_animal as \"lis_tipo_animal\", raza as \"lis_raza\", nombre as \"lis_nombre\", sexo as \"lis_sexo\", color as \"lis_color\", alto as \"lis_alto\", largo as \"lis_largo\", peso as \"lis_peso\", fecha_nacimiento as \"lis_fecha_nacimiento\", fecha_entrada as \"lis_fecha_entrada\", procedencia as \"lis_procedencia\", chip as \"lis_chip\", pasaporte as \"lis_pasaporte\", web as \"lis_web\", castrado as \"lis_castrado\", fecha_castracion as \"lis_fecha_castracion\", lugar_castracion as \"lis_lugar_castracion\", historia as \"lis_historia\", caracter as \"lis_caracter\" FROM tasoka_animales";
		//$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo LIS
		//$str_where = "";
		//$this->setWhereForSearchQuery($str_where);

		//Order del modo de trabajo LIS
		//$this->setOrderByForSearchQuery('1');


		//Consulta del modo de trabajo EDI
		$str_select = "SELECT distinct tasoka_animales.id as \"id\", estado as \"edi_estado\", tipo_animal as \"edi_tipo_animal\",  raza as \"edi_raza\", nombre as \"edi_nombre\", sexo as \"edi_sexo\", ";
		$str_select .=" color as \"edi_color\", alto as \"edi_alto\", largo as \"edi_largo\", peso as \"edi_peso\", tamanyo as \"edi_tamanyo\", ";
		$str_select .=" fecha_nacimiento as \"edi_fecha_nacimiento\", fecha_entrada as \"edi_fecha_entrada\", procedencia as \"edi_procedencia\", chip as \"edi_chip\", chip_numero as \"edi_chip_numero\",";
		$str_select .=" pasaporte as \"edi_pasaporte\", pasaporte_numero as \"edi_pasaporte_numero\", web as \"edi_web\","; 
		$str_select .=" castrado as \"edi_castrado\", fecha_castracion as \"edi_fecha_castracion\", veterinario as \"edi_veterinario\", ";
		$str_select .=" acogida as \"edi_acogida\", acogida_mami as \"edi_acogida_mami\", acogida_telefono as \"edi_acogida_telefono\", acogida_mail as \"edi_acogida_mail\", historia as \"edi_historia\", caracter as \"edi_caracter\", ";
		$str_select .=" tratamiento as \"edi_tratamiento\" FROM tasoka_animales";	
		$str_select .=" left join tasoka_adopcion on (tasoka_adopcion.id_animal=tasoka_animales.id)";	 
		
		$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo EDI		 
		//$str_where_editar = "";
		//$this->setWhereForEditQuery($str_where_editar);

		//Order del modo de trabajo EDI
		$this->setOrderByForEditQuery('nombre asc');
        $this->setLimit(10);
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
		$this->addMatching("fil_chip_numero","chip_numero","tasoka_animales");
		$this->addMatching("fil_pasaporte","pasaporte","tasoka_animales");
		$this->addMatching("fil_pasaporte_numero","pasaporte_numero","tasoka_animales");
		$this->addMatching("fil_web","web","tasoka_animales");
		$this->addMatching("fil_castrado","castrado","tasoka_animales");
		$this->addMatching("fil_acogida","acogida","tasoka_animales");
		$this->addMatching("fil_acogida_mami","acogida_mami","tasoka_animales");
		$this->addMatching("fil_estado","estado","tasoka_animales");
		$this->addMatching("fil_tamanyo","tamanyo","tasoka_animales");

		//Modo de trabajo EDI
		$this->addMatching("id","id","tasoka_animales");
		$this->addMatching("edi_tipo_animal","tipo_animal","tasoka_animales");
		$this->addMatching("edi_raza","raza","tasoka_animales");
		$this->addMatching("edi_nombre","nombre","tasoka_animales");
		$this->addMatching("edi_sexo","sexo","tasoka_animales");
		$this->addMatching("edi_color","color","tasoka_animales");
		$this->addMatching("edi_alto","alto","tasoka_animales");
		$this->addMatching("edi_largo","largo","tasoka_animales");
		$this->addMatching("edi_peso","peso","tasoka_animales");
		$this->addMatching("edi_tamanyo","tamanyo","tasoka_animales");
		$this->addMatching("edi_fecha_nacimiento","fecha_nacimiento","tasoka_animales");
		$this->addMatching("edi_fecha_entrada","fecha_entrada","tasoka_animales");
		$this->addMatching("edi_procedencia","procedencia","tasoka_animales");
		$this->addMatching("edi_chip","chip","tasoka_animales");
		$this->addMatching("edi_chip_numero","chip_numero","tasoka_animales");
		$this->addMatching("edi_pasaporte","pasaporte","tasoka_animales");
		$this->addMatching("edi_pasaporte_numero","pasaporte_numero","tasoka_animales");
		$this->addMatching("edi_web","web","tasoka_animales");
		$this->addMatching("edi_castrado","castrado","tasoka_animales");
		$this->addMatching("edi_fecha_castracion","fecha_castracion","tasoka_animales");
		$this->addMatching("edi_veterinario","veterinario","tasoka_animales");
		$this->addMatching("edi_historia","historia","tasoka_animales");
		$this->addMatching("edi_caracter","caracter","tasoka_animales");
		$this->addMatching("edi_tratamiento","tratamiento","tasoka_animales");
		$this->addMatching("edi_acogida","acogida","tasoka_animales");
		$this->addMatching("edi_acogida_mami","acogida_mami","tasoka_animales");
		$this->addMatching("edi_acogida_mail","acogida_mail","tasoka_animales");
		$this->addMatching("edi_acogida_telefono","acogida_telefono","tasoka_animales");
		
		$this->addMatching("edi_estado","estado","tasoka_animales");
		
		/************************ END MATCHINGs ************************/


		/************************ TYPEs ************************/
	
		//Fechas: gvHidraDate type
		$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(true);
    	$this->addFieldType('fil_fecha_nacimiento',$fecha);
    	$this->addFieldType('edi_fecha_nacimiento',$fecha);
		

		$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(true);
    	$this->addFieldType('fil_fecha_entrada',$fecha);
    	$this->addFieldType('edi_fecha_entrada',$fecha);
		

		$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(true);
    	$this->addFieldType('fil_fecha_castracion',$fecha);
    	$this->addFieldType('edi_fecha_castracion',$fecha);
		
    	//$string = new gvHidraString(true, 1);
    	//$this->addFieldType('edi_estado',$string);
    	//$this->addFieldType('edi_tipo_animal',$string);
    	
		$string = new gvHidraString(false, 50);
		$this->addFieldType('fil_raza',$string);
		//$this->addFieldType('lis_raza',$string);
		//$string = new gvHidraString(false, 50);
		$string->setRequired(true);
		$this->addFieldType('edi_raza',$string);
		
		
		$string = new gvHidraString(false, 50);
		$this->addFieldType('fil_nombre',$string);
		
		$string = new gvHidraString(false, 50);
		$string->setRequired(true);
		$this->addFieldType('edi_nombre',$string);
		
		$string = new gvHidraString(false, 15);
		$this->addFieldType('fil_chip_numero',$string);
		$this->addFieldType('fil_pasaporte_numero',$string);
		$this->addFieldType('edi_chip_numero',$string);
		$this->addFieldType('edi_pasaporte_numero',$string);
		
		$string = new gvHidraString(false, 30);
		$this->addFieldType('fil_color',$string);
		
		$string = new gvHidraString(false, 9);
		$this->addFieldType('edi_acogida_telefono',$string);
		
		$string = new gvHidraString(false, 30);
		$string->setRequired(true);
		$this->addFieldType('edi_color',$string);
		
		$string = new gvHidraString(false, 100);
		$this->addFieldType('fil_procedencia',$string);
		$this->addFieldType('edi_procedencia',$string);
		$this->addFieldType('fil_acogida_mami',$string);
		$this->addFieldType('edi_acogida_mami',$string);
		$this->addFieldType('edi_acogida_mail',$string);
		
        $this->addFieldType('edi_veterinario',$string);
	
		
		$string = new gvHidraString(false, 5000);
	//	$this->addFieldType('fil_historia',$string);
	//	$this->addFieldType('lis_historia',$string);
		$this->addFieldType('edi_historia',$string);
		$this->addFieldType('edi_caracter',$string);
		$this->addFieldType('edi_tratamiento',$string);
	//	$string = new gvHidraString(false, 5000);
	//	$this->addFieldType('fil_caracter',$string);
	//	$this->addFieldType('lis_caracter',$string);
		
		

		//Integers: gvHidraInteger type
		
		$int = new gvHidraInteger(true, 4);
		$int->setRequired(false);
		$this->addFieldType('edi_id',$int);
		
		//$int = new gvHidraInteger(false, 1);
		//$this->addFieldType('fil_tipo_animal',$int);
		//$this->addFieldType('lis_tipo_animal',$int);		
		//$int = new gvHidraInteger(true, 1);
		//$int->setRequired(true);
		//$this->addFieldType('edi_tipo_animal',$int);
		
	//	$int = new gvHidraInteger(false, 1);
	//	$this->addFieldType('fil_lugar_castracion',$int);
	//	$this->addFieldType('lis_lugar_castracion',$int);		
		
		
		$int = new gvHidraInteger(false, 4);
	//	$this->addFieldType('fil_lugar_castracion',$int);
	//	$this->addFieldType('lis_lugar_castracion',$int);		
		$this->addFieldType('edi_alto',$int);
        $this->addFieldType('edi_largo',$int);
		//Floats: gvHidraFloat type
	
		
	//	$float = new gvHidraInteger(false, 3);
	//	$float->setFloatLength();
	//	$this->addFieldType('fil_alto',$float);
	//	$this->addFieldType('lis_alto',$float);		
	//	$this->addFieldType('edi_alto',$float);
		
	//	$float = new gvHidraFloat(false,3 );
	//	$float->setFloatLength();
	//	$this->addFieldType('fil_largo',$float);
	//	$this->addFieldType('lis_largo',$float);		
	//	$this->addFieldType('edi_largo',$float);
		
		$float = new gvHidraFloat(false, 4);
		$float->setFloatLength(2);
	//	$this->addFieldType('fil_peso',$float);
	//	$this->addFieldType('lis_peso',$float);		
		$this->addFieldType('edi_peso',$float);
		

		/************************ END TYPEs ************************/
				
		/************************ COMPONENTS ************************/
		
		//Declaracion de Listas y WindowSelection
		//La definiciï¿½n debe estar en el AppMainWindow.php
		$lista_raza_fil = new gvHidraList('fil_tipo_animal',"ESPECIES");
		$lista_raza_fil->addOption('','Cualquiera...');
		$lista_raza_fil->setSelected('');
		$this->addList($lista_raza_fil);

	 /*   $lista_raza_fil = new gvHidraList('fil_raza','RAZAS');
		$lista_raza_fil->addOption('','Cualquiera...');
		$lista_raza_fil->setSelected('');
		$lista_raza_fil->setDependence(array('fil_tipo_animal'),array('tasoka_raza.tipo_animal'));
		$this->addList($lista_raza_fil);
		*/
		
		
		
		$lista_raza_edi = new gvHidraList('edi_tipo_animal',"ESPECIES");
		$lista_raza_edi->addOption('','Selecciona...');
		$lista_raza_edi->setSelected('');
		$this->addList($lista_raza_edi);
	/*	
		$lista_raza_edi = new gvHidraList('edi_raza','RAZAS');
		$lista_raza_edi->addOption('','Selecciona...');
		$lista_raza_edi->setSelected('');
		$lista_raza_edi->setDependence(array('edi_tipo_animal'),array('tasoka_raza.tipo_animal'));
		$this->addList($lista_raza_edi);
		*/
		$lista_tamanyo_fil = new gvHidraList('fil_tamanyo');
		$lista_tamanyo_fil->addOption('','Cualquiera...');
		$lista_tamanyo_fil->addOption('G','Grande');
		$lista_tamanyo_fil->addOption('M','Mediano');
		$lista_tamanyo_fil->addOption('P','Pequeño');
		$lista_tamanyo_fil->setSelected('');
		$this->addList($lista_tamanyo_fil);
		
		$lista_tamanyo_edi = new gvHidraList('edi_tamanyo');
		$lista_tamanyo_edi->addOption('','Selecciona...');
		$lista_tamanyo_edi->addOption('G','Grande');
		$lista_tamanyo_edi->addOption('M','Mediano');
		$lista_tamanyo_edi->addOption('P','Pequeño');
		$lista_tamanyo_edi->setSelected('');
		$this->addList($lista_tamanyo_edi);
		
		$lista_estado_fil = new gvHidraList('fil_estado');
		$lista_estado_fil->addOption('','Cualquiera...');
		$lista_estado_fil->addOption('A','Albergue');
		$lista_estado_fil->addOption('D','Devuelto al propietario');
		$lista_estado_fil->addOption('F','Fallecido');
		$lista_estado_fil->setSelected('');
		$this->addList($lista_estado_fil);
		
		$lista_estado_edi = new gvHidraList('edi_estado');
		$lista_estado_edi->addOption('','Selecciona...');
		$lista_estado_edi->addOption('A','Albergue');
		$lista_estado_edi->addOption('D','Devuelto al propietario');
		$lista_estado_edi->addOption('F','Fallecido');
		$lista_estado_edi->setSelected('');
		$this->addList($lista_estado_edi);
		
		$lista_sexo_fil = new gvHidraList('fil_sexo');
		$lista_sexo_fil->addOption('','Cualquiera...');
		$lista_sexo_fil->addOption('Macho','Macho');
		$lista_sexo_fil->addOption('Hembra','Hembra');
		$lista_sexo_fil->setSelected('');
		$lista_sexo_fil->setRadio(true);
		$this->addList($lista_sexo_fil);
		
		$lista_sexo_edi = new gvHidraList('edi_sexo');
		$lista_sexo_edi->addOption('Macho','Macho');
		$lista_sexo_edi->addOption('Hembra','Hembra');
		$lista_sexo_edi->setSelected('Macho');
		$lista_sexo_edi->setRadio(true);
		$this->addList($lista_sexo_edi);
		
		$lista_adoptado_fil = new gvHidraList('fil_adoptado');
		$lista_adoptado_fil->addOption('','Cualquiera...');
		$lista_adoptado_fil->addOption('S','Si');
		$lista_adoptado_fil->addOption('N','No');
		$lista_adoptado_fil->setSelected('');
		$lista_adoptado_fil->setRadio(true);
		$this->addList($lista_adoptado_fil);
		
		$lista_chip_fil = new gvHidraList('fil_chip');
		$lista_chip_fil->addOption('','Cualquiera...');
		$lista_chip_fil->addOption('S','Si');
		$lista_chip_fil->addOption('N','No');
		$lista_chip_fil->setSelected('');
		$lista_chip_fil->setRadio(true);
		$this->addList($lista_chip_fil);
		
	//	$cb_chip_fil = new gvHidraCheckBox('fil_chip');
	//	$cb_chip_fil->setValueChecked('t');
	//	$cb_chip_fil->setValueUnchecked('f');
	//	$this->addCheckBox($cb_chip_fil);
		
		
		$cb_chip_edi = new gvHidraCheckBox('edi_chip');
		$cb_chip_edi->setValueChecked('S');
		$cb_chip_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_chip_edi);
		
		$lista_castrado_fil = new gvHidraList('fil_castrado');
		$lista_castrado_fil->addOption('','Cualquiera...');
		$lista_castrado_fil->addOption('S','Si');
		$lista_castrado_fil->addOption('N','No');
		$lista_castrado_fil->setSelected('');
		$lista_castrado_fil->setRadio(true);
		$this->addList($lista_castrado_fil);
		
		
		
		$cb_castrado_edi = new gvHidraCheckBox('edi_castrado');
		$cb_castrado_edi->setValueChecked('S');
		$cb_castrado_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_castrado_edi);
		
		$lista_acogida_fil = new gvHidraList('fil_acogida');
		$lista_acogida_fil->addOption('','Cualquiera...');
		$lista_acogida_fil->addOption('S','Si');
		$lista_acogida_fil->addOption('N','No');
		$lista_acogida_fil->setSelected('');
		$lista_acogida_fil->setRadio(true);
		$this->addList($lista_acogida_fil);
		
		
		
		$cb_acogida_edi = new gvHidraCheckBox('edi_acogida');
		$cb_acogida_edi->setValueChecked('S');
		$cb_acogida_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_acogida_edi);
		
		$lista_web_fil = new gvHidraList('fil_web');
		$lista_web_fil->addOption('','Cualquiera...');
		$lista_web_fil->addOption('S','Si');
		$lista_web_fil->addOption('N','No');
		$lista_web_fil->setSelected('');
		$lista_web_fil->setRadio(true);
		$this->addList($lista_web_fil);
				
	    $lista_web_edi = new gvHidraList('edi_web');
		
		$lista_web_edi->addOption('S','Si');
		$lista_web_edi->addOption('N','No');
		$lista_web_edi->setSelected('N');
		$lista_web_edi->setRadio(true);
		$this->addList($lista_web_edi);
		
		$cb_web_edi = new gvHidraCheckBox('edi_web');
		$cb_web_edi->setValueChecked('S');
		$cb_web_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_web_edi);

		$lista_pasaporte_fil = new gvHidraList('fil_pasaporte');
		$lista_pasaporte_fil->addOption('','Cualquiera...');
		$lista_pasaporte_fil->addOption('S','Si');
		$lista_pasaporte_fil->addOption('N','No');
		$lista_pasaporte_fil->setSelected('');
		$lista_pasaporte_fil->setRadio(true);
		$this->addList($lista_pasaporte_fil);
						
		
		
		
		$cb_pasaporte_edi = new gvHidraCheckBox('edi_pasaporte');
		$cb_pasaporte_edi->setValueChecked('S');
		$cb_pasaporte_edi->setValueUnchecked('N');
		$this->addCheckBox($cb_pasaporte_edi);
		
/*		
		$lista_raza_lis = new gvHidraList('edi_raza','RAZAS');
		$lista_raza_lis->addOption('','Cualquiera...');
		$lista_raza_lis->setSelected('');
		$this->addList($lista_raza_lis);
		
		$lista_fil = new gvHidraList('fil_lugar_castracion'.'CLINICAS');
		$lista_fil->addOption('','Cualquiera...');
		$lista_fil->setSelected('');
		$this->addList($lista_fil);
		
		$lista_lis = new gvHidraList('edi_lugar_castracion','CLINICAS');
		$lista_lis->addOption('','Cualquiera...');
		$lista_lis->setSelected('');
		$this->addList($lista_lis);
		
*/
		/************************ END COMPONENTS ************************/						
	    $this->addSlave('Tasoka_salud_analitica2D', array('id'), array('id_animal'));
	    $this->addSlave('Tasoka_salud_biopsia2D', array('id'), array('id_animal'));
		$this->addSlave('Tasoka_salud_vacuna2D', array('id'), array('id_animal'));
		$this->addSlave('Tasoka_salud_desaparasitacion2D', array('id'), array('id_animal'));
		//$this->addSlave('Tasoka_salud_fotosD', array('id'), array('id_animal'));
		$this->addSlave('Tasoka_adopcion2D', array('id'), array('id_animal'));

		
		$this->addTriggerEvent('fil_adoptado','toggleFields');
		$this->addTriggerEvent('fil_chip','toggleFields');
	    $this->addTriggerEvent('fil_pasaporte','toggleFields');
	    $this->addTriggerEvent('fil_acogida','toggleFields');
	    
	    $this->addTriggerEvent('edi_castrado','toggleFields');
	    $this->addTriggerEvent('edi_chip','toggleFields');
	    $this->addTriggerEvent('edi_pasaporte','toggleFields');
	    $this->addTriggerEvent('edi_acogida','toggleFields');
	   
		//Mantener los valores del modo de trabajo FIL tras la busqueda
		$this->keepFilterValuesAfterSearch(true);
		$this->showOnlyNewRecordsAfterInsert(true);
		$this->setLazyList(true);
	}//End construct
	
function toggleFields($objDatos) {
	    $campo=$objDatos->getTriggerField();
	    $panel=$objDatos->getActiveMode();
	    $campo=substr($campo,3);
	    //IgepDebug::setDebug(DEBUG_USER,"El valor es: <pre>".$panel." y ".$campo."</pre>");
	    if($campo==="_castrado") {
	    if($objDatos->getValue($panel.'_castrado')=='S'){
	        $objDatos->setEnable($panel.'_fecha_castracion',true);
	        $objDatos->setEnable($panel.'_veterinario',true);
	    }
	    else {
	         $objDatos->setValue($panel."_fecha_castracion",'');
	         $objDatos->setValue($panel."_veterinario",'');
	         $objDatos->setEnable($panel.'_fecha_castracion',false);
	         $objDatos->setEnable($panel.'_veterinario',false);
	    }
	    }
        elseif($campo==="_adoptado"){
	    if($objDatos->getValue($panel.'_adoptado')=='S'){
	        $objDatos->setEnable($panel.'_adoptante_nif',true);
	        
	    }
	    else {
	         $objDatos->setValue($panel."_adoptante_nif",'');
	         $objDatos->setEnable($panel.'_adoptante_nif',false);
	    }
	    }
	    elseif($campo==="_chip"){
	    if($objDatos->getValue($panel.'_chip')=='S'){
	        $objDatos->setEnable($panel.'_chip_numero',true);
	        
	    }
	    else {
	         $objDatos->setValue($panel."_chip_numero",'');
	         $objDatos->setEnable($panel.'_chip_numero',false);
	    }
	    }
	    elseif($campo==="_pasaporte"){
	    if($objDatos->getValue($panel.'_pasaporte')=='S'){
	        $objDatos->setEnable($panel.'_pasaporte_numero',true);
	        
	    }
	    else {
	         $objDatos->setValue($panel."_pasaporte_numero",'');
	         $objDatos->setEnable($panel.'_pasaporte_numero',false);
	    }
	    }
	    elseif($campo==="_acogida"){
	    	if($objDatos->getValue($panel.'_acogida')=='S'){
	    		$objDatos->setEnable($panel.'_acogida_mami',true);
	    		$objDatos->setEnable($panel.'_acogida_telefono',true);
	    		$objDatos->setEnable($panel.'_acogida_mail',true);
	    		 
	    	}
	    	else {
	    		$objDatos->setValue($panel."_acogida_mami",'');
	    		$objDatos->setValue($panel."_acogida_telefono",'');
	    		$objDatos->setValue($panel."_acogida_mail",'');
	    		$objDatos->setEnable($panel.'_acogida_mami',false);
	    		$objDatos->setEnable($panel.'_acogida_telefono',false);
	    		$objDatos->setEnable($panel.'_acogida_mail',false);
	    	}
	    }
	    return 0;
	}
	
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
		$parametros=array();
		$adoptado=$objDatos->getValue('fil_adoptado');
	    if($adoptado){
	        $parametros[]="tasoka_adopcion.adoptado='".$adoptado."'";
	        $nif=$objDatos->getValue('fil_adoptante_nif');
	        if($nif!=''){
	             $parametros[]="tasoka_adopcion.adoptante_nif like '%".$nif."%'";
	        }
	    
	    $where=implode(' AND ',$parametros);
	    $this->setSearchParameters($where);
	    }
	
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
	//	$custom=ConfigFramework::getCustomDirName();
		 $m_datos = $objDatos->getAllTuplas();
        foreach($m_datos as $indice=>$tupla){
            
            if($m_datos[$indice]['edi_castrado']==='S')
		        $m_datos[$indice]['castracion_activa']="true";  
		    else  
		        $m_datos[$indice]['castracion_activa']="false";

		    if($m_datos[$indice]['edi_chip']==='S')
		        $m_datos[$indice]['chip_activa']="true";  
		    else  
		        $m_datos[$indice]['chip_activa']="false";
		    
		    if($m_datos[$indice]['edi_pasaporte']==='S')
		        $m_datos[$indice]['pasaporte_activa']="true";  
		    else  
		        $m_datos[$indice]['pasaporte_activa']="false";
		    
		    if($m_datos[$indice]['edi_acogida']==='S')
		    	$m_datos[$indice]['acogida_activa']="true";
		    else
		    	$m_datos[$indice]['acogida_activa']="false";
		    		
        	 //Voy a ver en que estado de adopcion se encuentra el animal
        	 //Select * from tasoka_adopcion where id_anima=? order by id_adopcion desc limit 1
        	 $res=$this->consultar('Select * from tasoka_adopcion where id_animal='.$m_datos[$indice]['id'].' order by id_adopcion desc limit 1');
        	 if(is_array($res) && count($res)>0)	 {
        	  if($res[0]['devuelto']=='S')
        	  	$m_datos[$indice]['estado_adopcion']="Devuelto";
        	  elseif($res[0]['adoptado']=='S')
        	  	$m_datos[$indice]['estado_adopcion']="Adoptado";
        	
        	 elseif($res[0]['reservado']=='S')
        	  	$m_datos[$indice]['estado_adopcion']="Reservado";
        	 }
             $nombre=utf8_encode($m_datos[$indice]['edi_nombre']);
           if(file_exists("multimedia/Photos/".$nombre."/".$nombre.".jpg")) {
           	
		    $m_datos[$indice]['foto']="../multimedia/Photos/".$nombre."/".$nombre.".jpg";
           }
          elseif(file_exists("multimedia/Photos/".$nombre."/".$nombre.".png")) {
          $m_datos[$indice]['foto']="../multimedia/Photos/".$nombre."/".$nombre.".png";
          }
        //  else 		    $m_datos[$indice]['foto']="custom/asoka/images/menu/Pets-32.png";
      //$this->addDefaultData('ruta',$nuevoFichero);
       }
  //  if(is_array($m_datos))
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
		//$this->activaCastracion($objDatos);
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
		$id=$this->calcularSecuencia('tasoka_animales','id',array(),1);
		$m_datos=$objDatos->getAllTuplas();
		foreach($m_datos as $index=>$registro){
		    $m_datos[$index]['id']=$id++;
		    $m_datos[$index]['edi_nombre']=mb_strtoupper(trim($m_datos[$index]['edi_nombre']));
		    $m_datos[$index]['edi_raza']=mb_strtoupper(trim($m_datos[$index]['edi_raza']));
		    $m_datos[$index]['edi_color']=mb_strtoupper(trim($m_datos[$index]['edi_color']));
		    $m_datos[$index]['edi_procedencia']=mb_strtoupper(trim($m_datos[$index]['edi_procedencia']));
		}
		$objDatos->setAllTuplas($m_datos);
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
		
		 $id_animal=$objDatos->getValue('id');
	    //$datos=$objDatos->getAllTuplas();
	    $datosFileE = $objDatos->getFileInfo('ficheroUploadFoto');
	    if(is_array($datosFileE) and ($datosFileE['tmp_name']!='')) {
	    
	    	$fp      = fopen($datosFileE['tmp_name'], 'r');
	    	$content = fread($fp, filesize($datosFileE['tmp_name']));
	    	$dsn_con = $this->getDSN();
	    	
	    	$conexion = new mysqli($dsn_con['hostspec'], $dsn_con['username'], $dsn_con['password'], $dsn_con['database']);
	    	
	    	$content = mysqli_real_escape_string($conexion,$content);
	    	fclose($fp);
	   
	    	$res = $this->operar("UPDATE tasoka_animales SET foto='".$content."' where id='".$id_animal."' ");
	    
	    	if($res==-1){
	    		$this->showMessage('APL-46');
	    		return -1;
	    	}
	    }
	   /// 	    $fichero = $datos[0]['edi_nombre'];
	    	    $fichero=$objDatos->getValue('edi_nombre');
 //IgepDebug::setDebug(DEBUG_USER,"El valor es: <pre>". mb_detect_encoding($fichero)."</pre>");
	//$file=new mifile($fichero);   
	//IgepDebug::setDebug(DEBUG_USER,"El fiule es: <pre>". $file->mensaje."</pre>"); 
	    mkdir('multimedia/Photos/'.utf8_encode($fichero),0755);
	    mkdir('multimedia/Generated/Thumbs/'.utf8_encode($fichero),0755);
	    //  mkdir('../multimedia/Photos/'.urlencode($datos[0]['edi_nombre']),0755);
	//mkdir('../multimedia/Photos/'.stripslashes($fichero),0755,true);
	     //  mkdir(urlencode('../multimedia/Photos/'.$fichero),0755);
	     //  mkdir(urlencode('../multimedia/Photos/'.$utf8_2),0755);
	     //  mkdir(urlencode('../multimedia/Photos/'.utf8_to_ascii($datos[0]['edi_nombre'])),0755);
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
		$m_datos=$objDatos->getAllTuplas();
		foreach($m_datos as $index=>$registro){
		    
		//    $m_datos[$index]['edi_nombre']=strtoupper(trim($m_datos[$index]['edi_nombre']));
		    $m_datos[$index]['edi_raza']=mb_strtoupper(trim($m_datos[$index]['edi_raza']));
		    $m_datos[$index]['edi_color']=mb_strtoupper(trim($m_datos[$index]['edi_color']));
		    $m_datos[$index]['edi_procedencia']=mb_strtoupper(trim($m_datos[$index]['edi_procedencia']));
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
	$id_animal=$objDatos->getValue('id');
	    
	    
	   
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
	    $datosFileE = $objDatos->getFileInfo('ficheroUploadFoto');
	    if(is_array($datosFileE) and ($datosFileE['tmp_name']!='')) {
	    
	    	$fp      = fopen($datosFileE['tmp_name'], 'r');
	    	$content = fread($fp, filesize($datosFileE['tmp_name']));
	    	$dsn_con = $this->getDSN();
	    	
	    	$conexion = new mysqli($dsn_con['hostspec'], $dsn_con['username'], $dsn_con['password'], $dsn_con['database']);
	    	$conexion2 = new IgepConexion($dsn_con);
	    	//IgepDebug::setDebug(DEBUG_USER,"El conexion es: <pre>".print_r($conexion,true)."</pre>");
	    	//IgepDebug::setDebug(DEBUG_USER,"El conexion2 es: <pre>".print_r($conexion2,true)."</pre>");
	    	//IgepDebug::setDebug(DEBUG_USER,"El codigo es: <pre>".print_r($dsn_con,true)."</pre>");
	    	$content = mysqli_real_escape_string($conexion,$content);
	    	fclose($fp);
	        //IgepDebug::setDebug(DEBUG_USER,"El codigo es: <pre>".print_r($content,true)."</pre>");
	    	$res = $this->operar("UPDATE tasoka_animales SET foto='".$content."' where id='".$id_animal."' ");
	    
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
	    $dir="multimedia/Photos/".$objDatos->getValue('edi_nombre');
		system('rm -rf ' . escapeshellarg($dir), $retval);
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
	    $nombre=$objDatos->getValue('edi_nombre');
	    $nombre=IgepSession::dameCampoTuplaSeleccionada('Tasoka_animales2','edi_nombre');
	    $nombre=stripslashes(mb_strtoupper($nombre));
	    switch ($str_accion) 
			{
				case 'FichaODT':
					$actionForward=$this->listadoFicha('ODT',$objDatos);
					break;
					case 'FichaPDF':
						$actionForward=$this->listadoFicha('PDF',$objDatos);
						break;
        case 'MuestraGaleria':
					if($nombre!='') {
						
				   		$actionForward = $objDatos->getForward('gvHidraSuccess');
				      	$actionForward->setPath($actionForward->getPath()."?f=".utf8_encode($nombre));
			      
						//$this->openWindow($actionForward);
					 }
					else {
						IgepDebug::setDebug(DEBUG_USER,"ERROR: ");
				  		$this->showMessage('APL-53');
				  		$actionForward = new ActionForward('gvHidraNoAction');
                    	$actionForward->put('IGEPclaseManejadora','Tasoka_animales2');
			   			//$actionForward = $objDatos->getForward('gvHidraError');
				  	}
					
					break;	
					
				default:
					throw new Exception('Se ha intentado ejecutar la acci—n '.$str_accion.' y no esta programada.');    
					break;	
			}
			
			return $actionForward;					
		}//accionesParticulares
		    
  
		public  function listadoFicha($tipoListado,$objDatos) {
			$lsrutaInformeCompleto = '';
			$informeJ = null;
		
		
			$str_select = <<<SQL
SELECT
     tasoka_animales.`id` AS id,
     tasoka_animales.`estado` AS estado,
     tasoka_animales.`raza` AS raza,
     tasoka_animales.`nombre` AS nombre,
     tasoka_animales.`sexo` AS sexo,
     tasoka_animales.`color` AS color,
     tasoka_animales.`alto` AS alto,
     tasoka_animales.`largo` AS largo,
     tasoka_animales.`peso` AS peso,
     tasoka_animales.`tamanyo` AS tamanyo,
     tasoka_animales.`fecha_nacimiento` AS fecha_nacimiento,
     tasoka_animales.`fecha_entrada` AS fecha_entrada,
     tasoka_animales.`procedencia` AS procedencia,
     tasoka_animales.`chip` AS chip,
     tasoka_animales.`chip_numero` AS chip_numero,
     tasoka_animales.`pasaporte` AS pasaporte,
     tasoka_animales.`pasaporte_numero` AS pasaporte_numero,
     tasoka_animales.`castrado` AS castrado,
     tasoka_animales.`historia` AS historia,
     tasoka_animales.`caracter` AS caracter,      max(tasoka_historial_desparasitacion.fecha_desparasitacion) AS `fecha_desparasitacion`,
max(tasoka_historial_vacunacion.fecha_vacuna) as `fecha_vacunacion`,
max(tasoka_historial_analitica.fecha) as `fecha_analitica`
 FROM `tasoka_animales`
left join `tasoka_historial_desparasitacion` on (tasoka_animales.id=tasoka_historial_desparasitacion.id_animal)
left join  `tasoka_historial_vacunacion` on (tasoka_animales.id=tasoka_historial_vacunacion.id_animal)
left join  `tasoka_historial_analitica` on (tasoka_animales.id=tasoka_historial_analitica.id_animal)
SQL;
			 
			$str_select=$str_select." where tasoka_animales.id='".$objDatos->getValue("id")."'";
			IgepDebug::setDebug(DEBUG_USER,"La select: <pre>".$str_select."</pre>");
    	$lsrutaInformeCompleto = './plantillasJasper/ficha.jasper';
    	$res = $this->consultar($str_select." LIMIT 1");
   
		    			if(count($res) > 0 && is_array($res) ) {
		    			 
		    			$objDatos->setOperation('external');
		    					 
		    			$informeJ = new InformeJasper('ListadoFicha');
		    			 
		    			$informeJ->setDataSourceType('sgbd');
		    			$informeJ->setDebugMode(false);
		    			$this->tipoListado=$tipoListado;
		
		    			$conf = ConfigFramework::getConfig();
		    			$g_dsn = $conf->getDSN('g_my');
		    			IgepDebug::setDebug(DEBUG_USER,"La select es: <pre>".print_r($g_dsn,true)."</pre>");
		    			$informeJ->importPearDSN($g_dsn);
		
		    			$informeJ->setJasperFile($lsrutaInformeCompleto);
		    			//  IgepDebug::setDebug(DEBUG_USER,"La select es: <pre>".$str_select."</pre>");
		    			$informeJ->addParam('CadSQL', $str_select, 'String');
		    			//$informeJ->addParam('titulo', $titulo, 'String');
		    			// if($tipo_informe==="Detallado") {
		    			//$informeJ->addParam('mostrar', $mostrar_asistentes, 'String');
		    				$this->infJasper_listadoFichaJasper = & $informeJ;
		    				
		    				//}
		    				/*elseif($tipo_informe==="Reducido")
		    				$this->infJasper_listadoComunicacionesReducidoJasper = & $informeJ;
		    				*/
		
		    				$this->lanzarInforme= true;
		    				if(!$this->lanzarInforme)
		    				{
		    					
		    					
		    				$this->showMessage('IGEP-10');
		    				$actionForward = $objDatos->getForward('gvHidraError');
		    				}
		    				else
		    				{
		    					IgepDebug::setDebug(DEBUG_USER,"Laaa select es: <pre>".print_r($g_dsn,true)."</pre>");
		    					$actionForward = $objDatos->getForward('mostrarListado');
		    					$this->openWindow($actionForward);
		    					//$this->showMessage('APL-10');
		    					$actionForward = $objDatos->getForward('gvHidraSuccess');
		    					
		    					 
		    				}
		
		    			}
		    			else {
		
		    				$this->showMessage('IGEP-10');
		    				$actionForward = $objDatos->getForward('gvHidraError');
		    			}
		
		    			return $actionForward;
		    			}
		    			   
	
}//End  Tasoka_animales
