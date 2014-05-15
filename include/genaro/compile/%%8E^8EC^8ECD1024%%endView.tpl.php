<?php /* Smarty version 2.6.14, created on 2013-11-13 08:42:40
         compiled from patrones/P2M2FIL-LIS/endView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/P2M2FIL-LIS/endView.tpl', 5, false),)), $this); ?>

$detalles = array (
			<?php $_from = $this->_tpl_vars['array_classname_detalle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['hijos'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hijos']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['hijo']):
        $this->_foreach['hijos']['iteration']++;
?>
				array (
				"panelActivo" =>"<?php echo ((is_array($_tmp=$this->_tpl_vars['hijo'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
",
				"titDetalle" =>"<?php echo ((is_array($_tmp=$this->_tpl_vars['hijo'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"
				)
				<?php if (($this->_foreach['hijos']['iteration'] == $this->_foreach['hijos']['total'])): ?>);<?php else: ?>,<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
	        
$panelActivo = IgepSession::dameVariable('<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
','panelDetalleActivo');

$s->assign('smty_detalles',$detalles);
$s->assign('smty_panelActivo',$panelActivo);

$s->display('<?php echo ((is_array($_tmp=$this->_tpl_vars['nombreModulo'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
/p_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.tpl');
<?php echo '?>'; ?>

