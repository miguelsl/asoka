<?php
 class Tasoka_AdminUsers extends gvHidraForm_DB{	

	function __construct(){
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('g_my'); 		
		//print_r($conf);		
		//Las tablas sobre las que trabaja
		$nombreTablas= array('acceso');
		parent::__construct($g_dsn,$nombreTablas);
		/*$this->str_select="Select id as \"id\", ";
		$this->str_select.="ip as \"ip\", ";
		$this->str_select.="libre as \"libre\" ";
		$this->str_select.="FROM Ip ";
	  	
		*/
		
        $str_select="Select  login as \"lis_login\", ";
		//$this->str_selectEditar.="password as \"password\", ";
		$str_select.="nombre as \"lis_nombre\", ";
		$str_select.="rol as \"lis_rol\", ";
		$str_select.="activo as \"lis_activo\", ";
		$str_select.="multimedia as \"lis_multimedia\" ";
		$str_select.=" FROM acceso ";
		$this->setSelectForSearchQuery($str_select);
		//El orden de presentación de los datos
		
		
		$this->setOrderByForSearchQuery("1");
		
		$selectEditar="Select  login as \"edi_login\", ";
		//$this->str_selectEditar.="password as \"password\", ";
		$selectEditar.="nombre as \"edi_nombre\", ";
		$selectEditar.="rol as \"edi_rol\", ";
		$selectEditar.="activo as \"edi_activo\", ";
		$selectEditar.="multimedia as \"edi_multimedia\" ";
		$selectEditar.=" FROM acceso ";

		$this->setSelectForEditQuery($selectEditar);
		$this->setOrderByForEditQuery("1");
		
		
		/*Añadimos los Matching - Correspondecias campoTPL <-> campoBD*/
		$this->addMatching("lis_login","login","acceso");
		$this->addMatching("edi_login","login","acceso");
		$this->addMatching("edi_nombre","nombre","acceso");
		$this->addMatching("edi_rol","rol","acceso");
		$this->addMatching("edi_activo","activo","acceso");
		$this->addMatching("edi_multimedia","multimedia","acceso");
		
	    $this->setPKForQueries(array("lis_login"));
	    
	   	$cb=new gvHidraCheckBox('edi_activo');
	   	$cb->setValueChecked('S');
	   	$cb->setValueUnchecked('N');
	   	$cb->setChecked(true);
	   	$this->addCheckBox($cb);
	   	
	    $cb=new gvHidraCheckBox('edi_multimedia');
	   	$cb->setValueChecked('S');
	   	$cb->setValueUnchecked('N');
	   	$cb->setChecked(true);
	   	$this->addCheckBox($cb);
	   	/*
	   	$ip=new gvHidraString('false');
	   	$ip->setMaxLength(15);
	   	//$ip->setInputMask("###.###.###.###");
	   	$this->addFieldType('ip',$ip);

		$this->addAccionInterfaz('libres','deshabilita');
		*/
	}

	function preInsertar($objDatos) {
		$objDatos->setValue('edi_rol','user');
		return 0;
	}
	function postInsertar($objDatos){
		$clave=$objDatos->getValue('edi_password','insertar');
		if(!empty($clave)){
			$clave=md5($clave);
			$sql="update acceso set password='".$clave."' where login='".$objDatos->getValue('edi_login')."'";
			$this->operar($sql);
			
		}
		
		return 0;
	}
	
	function postModificar($objDatos){
		$m_datos=$objDatos->getAllTuplas('actualizar');
		
		foreach($m_datos as $indice=>$linea) {
			//$clave=$objDatos->getValue('password','actualizar');
			$clave=$linea['edi_password'];
			if(!empty($clave)) {
			
				$clave=md5($clave);			
				$sql="update acceso set password='".$clave."' where login='".$objDatos->getValue('edi_login')."'";
				$this->operar($sql);
					
			}
		}
		return 0;
	}
 }
 ?>