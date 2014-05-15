<?php
 class TgusCambioClave extends gvHidraForm_DB{	

	function __construct(){
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('g_dsn'); 		
		//print_r($conf);		
		//Las tablas sobre las que trabaja
		$nombreTablas= array('acceso');
		parent::__construct($g_dsn,$nombreTablas);
		$cadena = new gvHidraString(false,10);
		$cadena->setPasswordType(true);
		$this->addFieldType('password1',$cadena);
		$this->addFieldType('password2',$cadena);
	}
	
	function preIniciarVentana($objDatos){
		
		
		$sql="Select login,nombre from acceso where login='".IgepSession::dameUsuario()."'";
		$res=$this->consultar($sql);
		if(is_array($res) && count($res)>0) {
			
			$this->addDefaultData('nombre',$res[0]['nombre']);
			$this->addDefaultData('login',$res[0]['login']);
		
		}
		
		return 0;
	}
	
	function accionesParticulares($accion, $objDatos) 	{
			
			switch ($accion) 
			{
				
				
				case 'cancelar':
										$actionForward = $objDatos->getForward('gvHidraSuccess');
						
					break;	
				
				case 'guardar':
										$actionForward  = $this->guardarCambios($objDatos);
						
					break;	
					
				default:
					die ("No ha seleccionado una accion correcta");
					break;	
			}
			
			return $actionForward;					
		}//accionesParticulares
	  
	function guardarCambios($objDatos){
		$p1=$objDatos->getValue('password1');
		$p2=$objDatos->getValue('password2');
		if(!empty($p1) && !empty($p2) && $p1===$p2) {
			$sql= "update acceso set password='".md5($p1)."' where login='".$objDatos->getValue('login')."'";
			if($this->operar($sql)==0) {
				 $this->showMessage('APL-13');
				$actionForward = $objDatos->getForward('gvHidraSuccess');
			}
			else {
				$this->showMessage('APL-12');
				$actionForward = $objDatos->getForward('gvHidraError');
			}
		}
		else {
			$this->showMessage('APL-14');
			$actionForward = $objDatos->getForward('gvHidraError');
		}
		return $actionForward;
	}
	
	

 }
 ?>