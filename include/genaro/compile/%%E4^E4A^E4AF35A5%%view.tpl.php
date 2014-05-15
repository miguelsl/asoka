<?php /* Smarty version 2.6.14, created on 2013-11-19 12:13:38
         compiled from patrones/P2M2FIL-EDI/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/P2M2FIL-EDI/view.tpl', 6, false),)), $this); ?>
<?php echo '<?php'; ?>


//MAESTRO
$comportamientoVentana= new IgepPantalla();
$panelMaestro = new IgepPanel('<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
',"smty_datosFichaM");
$panelMaestro->activarModo("fil","estado_fil");
$panelMaestro->activarModo("edi","estado_edi");
$datosPanel = $comportamientoVentana->agregarPanel($panelMaestro);

//DETALLES