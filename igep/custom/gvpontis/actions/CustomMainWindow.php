<?php
								
class CustomMainWindow extends gvHidraMainWindow{	

	public function CustomMainWindow() {

		parent::__construct();

		$dir_templates_c = 'templates_c/';
		$conf->setTemplatesCompilationDir($dir_templates_c);
	}

}//Fin de CustomMainWindow
?>