<?php /* Smarty version 2.6.14, created on 2013-11-13 08:42:40
         compiled from patrones/P2M2FIL-LIS/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/P2M2FIL-LIS/view.tpl', 6, false),)), $this); ?>
<?php echo '<?php'; ?>


//MAESTRO
$comportamientoVentana= new IgepPantalla();
$panelMaestro = new IgepPanel('<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
',"smty_datosTablaM");
$panelMaestro->activarModo("fil","estado_fil");
$panelMaestro->activarModo("lis","estado_lis");
$datosPanel = $comportamientoVentana->agregarPanel($panelMaestro);

//DETALLES