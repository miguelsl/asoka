<?php /* Smarty version 2.6.14, created on 2013-11-19 12:13:38
         compiled from patrones/M1EDI/plantilla.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/M1EDI/plantilla.tpl', 1, false),array('modifier', 'floor', 'patrones/M1EDI/plantilla.tpl', 23, false),array('modifier', 'ceil', 'patrones/M1EDI/plantilla.tpl', 27, false),)), $this); ?>
<!--*********** <?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 ******************-->	
{if $smty_panelActivo eq "<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" }
<!--*********** PANEL edi ******************-->	
	{CWPanel id="ediDetalle" detalleDe="<?php echo $this->_tpl_vars['tipoMaestro']; ?>
" tipoComprobacion="envio" action="operarBD" method="post" estado="on" claseManejadora="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
		{CWBarraSupPanel titulo="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}	
			{CWFichaEdicion  id="FichaDetalle" datos="$smty_datos<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
				{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
<?php unset($this->_sections['edi']);
$this->_sections['edi']['name'] = 'edi';
$this->_sections['edi']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['edi']['show'] = true;
$this->_sections['edi']['max'] = $this->_sections['edi']['loop'];
$this->_sections['edi']['step'] = 1;
$this->_sections['edi']['start'] = $this->_sections['edi']['step'] > 0 ? 0 : $this->_sections['edi']['loop']-1;
if ($this->_sections['edi']['show']) {
    $this->_sections['edi']['total'] = $this->_sections['edi']['loop'];
    if ($this->_sections['edi']['total'] == 0)
        $this->_sections['edi']['show'] = false;
} else
    $this->_sections['edi']['total'] = 0;
if ($this->_sections['edi']['show']):

            for ($this->_sections['edi']['index'] = $this->_sections['edi']['start'], $this->_sections['edi']['iteration'] = 1;
                 $this->_sections['edi']['iteration'] <= $this->_sections['edi']['total'];
                 $this->_sections['edi']['index'] += $this->_sections['edi']['step'], $this->_sections['edi']['iteration']++):
$this->_sections['edi']['rownum'] = $this->_sections['edi']['iteration'];
$this->_sections['edi']['index_prev'] = $this->_sections['edi']['index'] - $this->_sections['edi']['step'];
$this->_sections['edi']['index_next'] = $this->_sections['edi']['index'] + $this->_sections['edi']['step'];
$this->_sections['edi']['first']      = ($this->_sections['edi']['iteration'] == 1);
$this->_sections['edi']['last']       = ($this->_sections['edi']['iteration'] == $this->_sections['edi']['total']);
?>
					<tr>
<?php $this->assign('campo', $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']]);  $this->assign('defVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['defVal']);  $this->assign('componente', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['componente']);  $this->assign('titVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['titVal']);  $this->assign('tamVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['tamVal']);  $this->assign('visibleVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['visibleVal']);  if ($this->_tpl_vars['componente'] == 0): ?>
				 	<td>{CWCampoTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>" size="<?php if ($this->_tpl_vars['tamVal'] == ""):  echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp));  else:  echo $this->_tpl_vars['tamVal'];  endif; ?>" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 1): ?>
					<td>{CWAreaTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>" rows="3" cols="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 2): ?>
				    <td>{CWCheckBox textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 3): ?>
				 	<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php else: ?>
					<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php endif; ?>
					</tr>
<?php endfor; endif; ?>
				</table>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}	 		
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}
	
	<!-- ****************** PESTANYAS DETALLE ************************-->	
	{CWContenedorPestanyas id="Detalle"}
		{CWPestanya tipo="edi" panelAsociado="ediDetalle" estado="on"}
	{/CWContenedorPestanyas}
	{/if}
	