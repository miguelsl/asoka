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
* Clase Manejadora TaudentrListadoAgenda
* 
* Creada con Genaro: generador de c�digo de gvHIDRA
* 
* @autor genaro
* @version 1.0
* @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v.2
*/
//require_once('include/jasper/modulosPHP/informeJasper.php');
//	require_once('./modulosPHP/informeJasper.php');
class Tasoka_listadoGeneral extends gvHidraForm_DB
{
	public function __construct() {

		//Recogemos dsn de conexion
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('g_my');
        $infJasper_listadoGeneralJasper;
       
       // $infJasper_listadoComunicacionesReducidoJasper;
       $tipoListado;
        $lanzarInforme;
		$nombreTablas= array('tasoka_animales');
		parent::__construct($g_dsn, $nombreTablas);

		/************************ QUERYs ************************/
		
		//Consulta del modo de trabajo LIS
        /*$str_select = "SELECT num_orden as \"edi_num_orden\", anyo as \"edi_anyo\", fecha_entrada as \"edi_fecha_entrada\", motivo as \"edi_motivo\", delegada_en as \"edi_delegada_en\", delegada_mhp as \"edi_delegada_mhp\", num_ref_deleg_mhp as \"edi_num_ref_deleg_mhp\", partido_politico_ayto as \"edi_partido_politico_ayto\", persona_solicitante as \"edi_persona_solicitante\", '' as \"edi_informe_entrada\", taudentr_audiencias.id_contacto as \"edi_id_contacto\", id_estado as \"edi_id_estado\", taudentr_audiencias.cnucl as \"edi_cnucl\", taudentr_audiencias.id_empresa as \"edi_id_empresa\", tipo as \"edi_tipo\", ";
        $str_select .= "taudentr_empresa.nombre_empresa as \"edi_nombre_empresa\",taudentr_empresa.nombre_presidente as \"edi_presidente\",taudentr_empresa.direccion as \"edi_direccion\",taudentr_empresa.cnucl as \"edi_nucleo\",taudentr_empresa.cprov as \"edi_provincia\",taudentr_empresa.tipo_empresa as \"edi_tipo_empresa\",";
        $str_select .= "taudentr_contacto.persona as \"edi_desc_contacto\",taudentr_contacto.telefono as \"edi_telefono\",taudentr_contacto.fax as \"edi_fax\",taudentr_contacto.movil as \"edi_movil\",taudentr_contacto.email as \"edi_email\", ";
        $str_select .= "tcmn_nucleos.cprov as \"edi_provincia_cv\",tcmn_nucleos.cnucl as \"edi_nucleo_cv\",tcmn_nucleos.presidente as \"edi_alcalde\",tcmn_nucleos.numhabit as \"edi_num_habitantes\" ";
        $str_select .= " FROM taudentr_audiencias";
        $str_select .= " left join taudentr_empresa on (taudentr_audiencias.id_empresa=taudentr_empresa.id_empresa)";
        $str_select .= " left join taudentr_contacto on (taudentr_audiencias.id_contacto=taudentr_contacto.id_contacto)";
        $str_select .= " left join tcmn_nucleos on (taudentr_audiencias.cnucl=tcmn_nucleos.cnucl)";
        $str_select .= " left join vcmn_odirectivos on (taudentr_audiencias.delegada_en=vcmn_odirectivos.codmap)";
*/        $this->setSelectForSearchQuery("");

        //Where del modo de trabajo EDI
        //$str_where = "";
        //$this->setWhereForSearchQuery($str_where);

        //Order del modo de trabajo EDI
        $this->setOrderByForSearchQuery('2 desc,1 desc');

        /************************ END QUERYs ************************/
        


        /************************ MATCHINGs ************************/

        //Seccion de matching: asociacion campos TPL y campos BD
       
		/************************ END MATCHINGs ************************/


		/************************ TYPEs ************************/
$fecha = new gvHidraDate(false);
    	$fecha->setCalendar(true);
    	$this->addFieldType('fil_fecha_nacimiento',$fecha);
    	$this->addFieldType('fil_fecha_entrada',$fecha);
    	$this->addFieldType('fil_fecha_castracion',$fecha);
    	
    			$string = new gvHidraString(false, 50);
		$this->addFieldType('fil_raza',$string);
		
				$string = new gvHidraString(false, 50);
		$this->addFieldType('fil_nombre',$string);
		
		$string = new gvHidraString(false, 15);
		$this->addFieldType('fil_chip_numero',$string);
		$this->addFieldType('fil_pasaporte_numero',$string);
		
		$string = new gvHidraString(false, 20);
		$this->addFieldType('fil_color',$string);
		
				$string = new gvHidraString(false, 100);
		$this->addFieldType('fil_procedencia',$string);
			$this->addFieldType('fil_acogida_mami',$string);
		//Fechas: gvHidraDate type
/*
        $fecha = new gvHidraDate(false);
        $fecha->setCalendar(true);
        $this->addFieldType('fil_fechaentrada',$fecha);
        $this->addFieldType('fil_fecharespuestaremitente',$fecha);
        
        //Strings: gvHidraString type
        $string = new gvHidraString(false, 4);
        $string->setInputMask('####');
        $this->addFieldType('fil_anyo',$string);

        $string = new gvHidraString(false, 200);
        
        $this->addFieldType('fil_asunto',$string);
        $this->addFieldType('fil_direccion',$string);
        
        $int = new gvHidraInteger(false, 4);
        $this->addFieldType('fil_numorden","numorden","tcomint_comunicaciones',$int);
        


       // $string = new gvHidraString(false, 50);
        
        //$this->addFieldType('fil_otro',$string);
        
        
       

        //Floats: gvHidraFloat type
*/
        /************************ END TYPEs ************************/
        
        /************************ COMPONENTS ************************/

        		$lista_raza_fil = new gvHidraList('fil_tipo_animal',"ESPECIES");
		$lista_raza_fil->addOption('','Cualquiera...');
		$lista_raza_fil->setSelected('');
		$this->addList($lista_raza_fil);
		
				$lista_estado_fil = new gvHidraList('fil_estado');
		$lista_estado_fil->addOption('','Cualquiera...');
		$lista_estado_fil->addOption('A','Albergue');
		$lista_estado_fil->addOption('D','Devuelto al propietario');
		$lista_estado_fil->addOption('F','Fallecido');
		$lista_estado_fil->setSelected('');
		$this->addList($lista_estado_fil);
		
		$lista_sexo_fil = new gvHidraList('fil_sexo');
		$lista_sexo_fil->addOption('','Cualquiera...');
		$lista_sexo_fil->addOption('Macho','Macho');
		$lista_sexo_fil->addOption('Hembra','Hembra');
		$lista_sexo_fil->setSelected('');
		$lista_sexo_fil->setRadio(true);
		$this->addList($lista_sexo_fil);
		
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
		
		$lista_tamanyo_fil = new gvHidraList('fil_tamanyo');
		$lista_tamanyo_fil->addOption('','Cualquiera...');
		$lista_tamanyo_fil->addOption('G','Grande');
		$lista_tamanyo_fil->addOption('M','Mediano');
		$lista_tamanyo_fil->addOption('P','Peque�o');
		$lista_tamanyo_fil->setSelected('');
		$this->addList($lista_tamanyo_fil);
		
		$lista_castrado_fil = new gvHidraList('fil_castrado');
		$lista_castrado_fil->addOption('','Cualquiera...');
		$lista_castrado_fil->addOption('S','Si');
		$lista_castrado_fil->addOption('N','No');
		$lista_castrado_fil->setSelected('');
		$lista_castrado_fil->setRadio(true);
		$this->addList($lista_castrado_fil);
		
		$lista_acogida_fil = new gvHidraList('fil_acogida');
		$lista_acogida_fil->addOption('','Cualquiera...');
		$lista_acogida_fil->addOption('S','Si');
		$lista_acogida_fil->addOption('N','No');
		$lista_acogida_fil->setSelected('');
		$lista_acogida_fil->setRadio(true);
		$this->addList($lista_acogida_fil);
		
		$lista_web_fil = new gvHidraList('fil_web');
		$lista_web_fil->addOption('','Cualquiera...');
		$lista_web_fil->addOption('S','Si');
		$lista_web_fil->addOption('N','No');
		$lista_web_fil->setSelected('');
		$lista_web_fil->setRadio(true);
		$this->addList($lista_web_fil);
		
		$lista_pasaporte_fil = new gvHidraList('fil_pasaporte');
		$lista_pasaporte_fil->addOption('','Cualquiera...');
		$lista_pasaporte_fil->addOption('S','Si');
		$lista_pasaporte_fil->addOption('N','No');
		$lista_pasaporte_fil->setSelected('');
		$lista_pasaporte_fil->setRadio(true);
		$this->addList($lista_pasaporte_fil);
		
		$lista_tipoInforme_fil = new gvHidraList('fil_tipoInforme');
		$lista_tipoInforme_fil->addOption('pdf','PDF');
		$lista_tipoInforme_fil->addOption('odt','ODT');
		$lista_tipoInforme_fil->addOption('doc','DOC');
		//$lista_tipoInforme_fil->addOption('N','No');
		$lista_tipoInforme_fil->setSelected('pdf');
		$lista_tipoInforme_fil->setRadio(false);
		$this->addList($lista_tipoInforme_fil);
		
		
		
        
        $mhp=new gvHidraList('fil_tipo_listado');
        //$mhp ->addOption('','Cualquiera...');
        $mhp ->addOption('Detallado','Detallado');
        $mhp ->addOption('Reducido','Reducido');
        $mhp ->setSelected('Detallado');
        $this->addList($mhp);
		//Floats: gvHidraFloat type

		/************************ END TYPEs ************************/
		
		/************************ COMPONENTS ************************/
		
		//Declaracion de Listas y WindowSelection
		//La definici�n debe estar en el AppMainWindow.php
		$this->addTriggerEvent('fil_adoptado','toggleFields');
		$this->addTriggerEvent('fil_chip','toggleFields');
	    $this->addTriggerEvent('fil_pasaporte','toggleFields');
	    $this->addTriggerEvent('fil_acogida','toggleFields');
        
		/************************ END COMPONENTS ************************/						
		
		//Mantener los valores del modo de trabajo FIL tras la busqueda
		$this->keepFilterValuesAfterSearch(true);		

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
	    		 
	    	}
	    	else {
	    		$objDatos->setValue($panel."_acogida_mami",'');
	    		$objDatos->setEnable($panel.'_acogida_mami',false);
	    	}
	    }
	    return 0;
	}
	
	


    
	
	public function accionesParticulares($str_accion, $objDatos) {
	 
	    switch ($str_accion) 
        {
	       case 'abrirListado':
                $actionForward = $this->listadoGeneral($objDatos);
                break;
	       default:     
		      throw new Exception('Se ha intentado ejecutar la acci�n '.$str_accion.' y no est� programada.');        
        }
            return $actionForward;
    }
	
    
    public function listadoGeneral($objDatos) {
    
        $lsrutaInformeCompleto = '';
        $informeJ = null;
        
        $titulo=trim($objDatos->getValue('fil_titulo','external'));
         $this->tipoListado= $objDatos->getValue('fil_tipoInforme','external');
      
        // IgepDebug::setDebug(DEBUG_USER,"El codigo es: <pre>".print_r($objDatos,true)."</pre>");
        $tipo_listado=$objDatos->getValue('fil_tipo_listado','external');
        
        $tipo_animal=$objDatos->getValue('fil_tipo_animal','external');
        $raza=trim($objDatos->getValue('fil_raza','external'));
        $estado = $objDatos->getValue('fil_estado','external');
        $nombre = trim($objDatos->getValue('fil_nombre','external'));
        $sexo = $objDatos->getValue('fil_sexo','external');
        $tam=$objDatos->getValue('fil_tamanyo','external');
        $fecha_nacimiento = $objDatos->getValue('fil_fecha_nacimiento','external');
        
        $fecha_entrada = $objDatos->getValue('fil_fecha_entrada','external');
        
        $procedencia = trim($objDatos->getValue('fil_procedencia','external'));
        $acogida = $objDatos->getValue('fil_acogida','external');
        $acogida_mami= trim($objDatos->getValue('fil_acogida_mami','external'));
        
        $adoptado = $objDatos->getValue('fil_adoptado','external');
        $adoptante_nif= trim($objDatos->getValue('fil_adoptante_nif','external'));
        
        $chip = $objDatos->getValue('fil_chip','external');
        $chip_numero= trim($objDatos->getValue('fil_chip_numero','external'));
        
        $pasaporte = $objDatos->getValue('fil_pasaporte','external');
        $pasaporte_numero= trim($objDatos->getValue('fil_pasaporte_numero','external'));
        
        $castrado = $objDatos->getValue('fil_castrado','external');
        $web= trim($objDatos->getValue('fil_web','external'));
        
        
        $con=$this->getConnection();
        
        /*if(!empty($motivo))
                $filtro[] = $con->unDiacriticCondition('taudentr_audiencias.motivo',$motivo, 1);
                */
        if(!empty($tipo_animal))
                $filtro[] = "tasoka_animales.tipo_animal='{$tipo_animal}'";
        if(!empty($raza))
                $filtro[] = $con->unDiacriticCondition('tasoka_animales.raza',$raza, 1);         
        if(!empty($estado))
                $filtro[] = "tasoka_animales.estado='{$estado}'";
        if(!empty($nombre))
                $filtro[] = $con->unDiacriticCondition('tasoka_animales.nombre',$nombre, 1);         
        if(!empty($sexo))
                $filtro[] = "tasoka_animales.sexo='{$sexo}'";
        if(!empty($tam))
                $filtro[] = "tasoka_animales.tamanyo='{$tam}'";        
        if(!empty($fecha_nacimiento))
                $filtro[] = "tasoka_animales.fecha_nacimiento='{$con->prepararFecha($fecha_nacimiento)}'";
        if(!empty($fecha_entrada))
                $filtro[] = "tasoka_animales.fecha_entrada='{$con->prepararFecha($fecha_entrada)}'";     
        if(!empty($procedencia))
                $filtro[] = $con->unDiacriticCondition('tasoka_animales.procedencia',$procedencia, 1);    
        if(!empty($acogida))
                $filtro[] = "tasoka_animales.acogido='{$acogida}'";         
        if(!empty($acogida_mami))
                $filtro[] = $con->unDiacriticCondition('tasoka_animales.acogida_mami',$acogida_mami, 1);    

        if(!empty($adoptado))
                $filtro[] = "tasoka_adopcion.adoptado='{$adoptado}'";         
        if(!empty($adoptante_nif))
                $filtro[] = $con->unDiacriticCondition('tasoka_adopcion.adoptante_nif',$adoptante_nif, 1);    

        if(!empty($chip))
                $filtro[] = "tasoka_animales.chip='{$chip}'";         
        if(!empty($chip_numero))
                $filtro[] = $con->unDiacriticCondition('tasoka_animales.chip_numero',$chip_numero, 1);            
        if(!empty($pasaporte))
                $filtro[] = "tasoka_animales.pasaporte='{$pasaporte}'";         
        if(!empty($pasaporte_numero))
                $filtro[] = $con->unDiacriticCondition('tasoka_animales.pasaporte_numero',$pasaporte_numero, 1);            
                        
                
                
        if(!empty($castrado))
                $filtro[] = "tasoka_animales.castrado='{$castrado}'";
      
        if(!empty($web))
                $filtro[] = "tasoka_animales.web='{$web}'";
                    
            
   
$str_select = <<<SQL
SELECT distinct tasoka_animales.id as "id", estado as "estado", tipo_animal as "tipo_animal", 
raza as "raza", nombre as "nombre", sexo as "sexo", color as "color", alto as "alto", largo as "largo", 
peso as "peso",tamanyo as "tamanyo", fecha_nacimiento as "fecha_nacimiento", fecha_entrada as "fecha_entrada", 
procedencia as "procedencia", chip as "chip", chip_numero as "chip_numero", pasaporte as "pasaporte", 
pasaporte_numero as "pasaporte_numero", web as "web", castrado as "castrado", 
fecha_castracion as "fecha_castracion", veterinario as "veterinario", acogida as "acogida", 
acogida_mami as "acogida_mami", historia as "historia", caracter as "caracter", tratamiento as "tratamiento" 
FROM tasoka_animales 
left join tasoka_adopcion on (tasoka_adopcion.id_animal=tasoka_animales.id)
SQL;
                
        
        /*$str_select_detallado = <<<EOD
SELECT distinct
tcomint_comunicaciones.anyo as "anyo",
tcomint_comunicaciones.numorden as "numorden", 
tcomint_comunicacionesintercambio.sentido as "sentido",
tcomint_comunicaciones.situacion_archivo as "situacion_archivo",
tremitente.descripcion as "tipo_remitente",
tcomint_organismo.descripcion as "remitente",
tcomint_organismo.cargo_remitente as "cargo",
tcomint_organismo.telefono as "telefono",
tcomint_comunicacionesintercambio.linea as "linea",
vcmn_odirectivos.denoc as "ORGANO",
tcomint_consellerias.descripcion as "CONSELLERIA", 
tcomint_ministerios.descripcion as "MINISTERIO", 
tcomint_comunicacionesintercambio.otros as "OTROS",
P.dpro as "PROVINCIA",
N.dnucl as "AYUNTAMIENTO",
fechaentrada as "fechaentrada",
asunto as "asunto",
fecharespuestaremitente as "fecharespuestaremitente",
observaciones as "observaciones",
tcomint_estado.descripcion as "estado",
tcomint_mediocomunicacion.descripcion as "mediocomunicacion",
viene_presidencia as "viene_presidencia",
tcomint_motivo_presidencia.descripcion as "motivo_presidencia",
entrada as "entrada",
fechacomunicacion as "fechacomunicacion",
tipo_organismo as "tipo_organismo",
tcomint_motivo.descripcion as "motivo" 
FROM tcomint_comunicaciones
left join tcomint_organismo on (tcomint_comunicaciones.remitente=tcomint_organismo.codigo)
left join tcomint_tipo_remitente as tremitente on (tremitente.tipo=tcomint_organismo.tipo_remitente)
left join tcomint_comunicacionesintercambio on (tcomint_comunicaciones.anyo=tcomint_comunicacionesintercambio.anyo AND tcomint_comunicaciones.numorden=tcomint_comunicacionesintercambio.numorden )
left join tcmn_nucleos as N on (tcomint_comunicacionesintercambio.cnucl=N.cnucl) 
left join tcmn_provincias as P on (tcomint_comunicacionesintercambio.cnucl=N.cnucl and N.cprov=P.cprov)
left join tcomint_consellerias on (tcomint_consellerias.codigo=tcomint_comunicacionesintercambio.codmap)
left join vcmn_odirectivos on (tcomint_comunicacionesintercambio.codmap=vcmn_odirectivos.codmap)
left join tcomint_ministerios on (tcomint_ministerios.codigo=tcomint_comunicacionesintercambio.codmap)
left join tcomint_estado on (tcomint_estado.codigo=tcomint_comunicaciones.estado)
left join tcomint_mediocomunicacion on (tcomint_mediocomunicacion.codigo=tcomint_comunicaciones.mediocomunicacion)
left join tcomint_motivo_presidencia on (tcomint_comunicaciones.motivo_presidencia=tcomint_motivo_presidencia.codigo)
left join tcomint_motivo on(tcomint_motivo.codigo=tcomint_comunicacionesintercambio.motivo)
EOD;*/
        $order_by=" order by nombre ";
      
        $where="";
        if(count($filtro)>0)
            $where=" where ".implode(" AND ",$filtro);
            
       // if($tipo_informe==="Detallado")    {
          
                $str_select=$str_select.$where.$order_by;
                IgepDebug::setDebug(DEBUG_USER,"La select: <pre>".$str_select."</pre>");
                $lsrutaInformeCompleto = './plantillasJasper/listadoGeneral.jasper';
            
        //}
        /*elseif($tipo_informe==="Reducido"){
            $str_select=$str_select_reducido.$where.$order_by_reducido;
            IgepDebug::setDebug(DEBUG_USER,"La select: <pre>".$str_select."</pre>");
            $lsrutaInformeCompleto = './plantillasJasper/listadoGeneralJasper.jasper';
            
        }*/
        
        $res = $this->consultar($str_select." LIMIT 1");

        if(count($res) > 0 && is_array($res) ) {

            $objDatos->setOperation('external');        
            
            $informeJ = new InformeJasper('ListadoGeneral');
            
            $informeJ->setDataSourceType('sgbd');
$informeJ->setDebugMode(false);

            $conf = ConfigFramework::getConfig();
            $g_dsn = $conf->getDSN('g_my');
 //IgepDebug::setDebug(DEBUG_USER,"La select es: <pre>".print_r($g_dsn,true)."</pre>");
            $informeJ->importPearDSN($g_dsn);
 /*
$informeJ->setDataSourceType('sgbd');
	$informeJ->setDBType('mysql');
	$informeJ->setDBHost('192.186.199.161');
	$informeJ->setDBPort('3306');
	$informeJ->setDBDatabase('');
	$informeJ->setDBUser('');
	$informeJ->setDBPassword('');
	*/
            $informeJ->setJasperFile($lsrutaInformeCompleto);
          //  IgepDebug::setDebug(DEBUG_USER,"La select es: <pre>".$str_select."</pre>");
            $informeJ->addParam('CadSQL', $str_select, 'String');
            $informeJ->addParam('titulo', $titulo, 'String');
           // if($tipo_informe==="Detallado") {
                //$informeJ->addParam('mostrar', $mostrar_asistentes, 'String');
                $this->infJasper_listadoGeneralJasper = & $informeJ;
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
                $actionForward = $objDatos->getForward('gvHidraSuccess'); 
            }       
            
        }
        else {
           
            $this->showMessage('IGEP-10');
            $actionForward = $objDatos->getForward('gvHidraError');
        }                   
        
        return $actionForward;
    }
}//End TaudentrListadoAgenda

?>
