<?php /* Smarty version 2.6.14, created on 2013-11-19 10:12:26
         compiled from patrones/P2M2FIL-EDIM1EDI/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/P2M2FIL-EDIM1EDI/view.tpl', 4, false),)), $this); ?>
<?php echo '<?php'; ?>


//<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

$comportamientoVentana= new IgepPantalla();

$panelMaestro = new IgepPanel('<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
',"smty_datosFichaM");
$panelMaestro->activarModo("fil","estado_fil");
$panelMaestro->activarModo("edi","estado_edi");
$comportamientoVentana->agregarPanel($panelMaestro);

//<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

if(count(IgepSession::dameUltimaConsulta("<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"))>0){
	$panelDetalle = new IgepPanel('<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
',"smty_datosFichaD");
	$panelDetalle->activarModo("edi","estado_edi");
	$comportamientoVentana->agregarPanelDependiente($panelDetalle,"<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
");
}

$s->display('<?php echo ((is_array($_tmp=$this->_tpl_vars['nombreModulo'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
/p_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.tpl');

<?php echo '?>'; ?>
