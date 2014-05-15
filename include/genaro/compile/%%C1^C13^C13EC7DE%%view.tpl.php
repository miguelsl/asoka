<?php /* Smarty version 2.6.14, created on 2013-11-13 08:42:40
         compiled from patrones/M1LIS/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/M1LIS/view.tpl', 2, false),)), $this); ?>

$panelDetalle = new IgepPanel('<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
',"smty_datos<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
");
$panelDetalle->activarModo("lis","estado_lis");
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
");
