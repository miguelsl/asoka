<?php
								
class AppMainWindow extends CustomMainWindow{	

	public function AppMainWindow() {

		parent::__construct();
		//Cargamos propiedades específicas del CS
		$conf = ConfigFramework::getConfig();

		//***********************DSN***********************//
		//*******************FIN DSN***********************//

		//****************Listas desplegables de la aplicación****************//
		// LISTAS: (nombreLista, query con los alias "valor" y "descripcion"
		// Ejemplo de lista: TIPOS
		// $conf->setList_DBSource('TIPOS',"select ctipo as \"valor\", dtipo as \"descripcion\" from tinv_tipos");
		$conf->setList_DBSource('ESPECIES',"select id as \"valor\", nombre_especie as \"descripcion\" from tasoka_especie");
		$conf->setList_DBSource('RAZAS',"select nombre as \"valor\", nombre as \"descripcion\" from tasoka_raza");
		$conf->setList_DBSource('CLINICAS',"select id as \"valor\", nombre as \"descripcion\" from tasoka_clinica");
		$conf->setList_DBSource('VACUNAS',"select id_vacuna as \"valor\", nombre_vacuna as \"descripcion\" from tasoka_vacuna");
		$conf->setList_DBSource('BACTERIAS',"select id as \"valor\", nombre as \"descripcion\" from tasoka_bacteria");
		
		//---------------- Fin Listas desplegables de la aplicación ----------------//

		//---------------- VENTANA DE PRUEBA DE ACCIONES DE INTERFAZ ----------------//
		// VENTANAS DE SELECCIÓN (nombreLista, query con los alias como en la tpl, nombre campo tpl donde irá el valor)
		// Ejemplo de ventana: VAI_filNombre
		// $conf->setSelectionWindow_DBSource('VAI_filNombre', 'select cif as "filCif", nombre as "filNombre" from accionesInterfaz', array("cif"));
		
	}
	
	public function openApp($objDatos) {

		//$this->showMessage('APL-1');	
		return 0;
	}
}//Fin de AppMainWindow
?>