<?php /* Smarty version 2.6.14, created on 2013-11-13 08:42:40
         compiled from patrones/M1LIS/plantilla.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/M1LIS/plantilla.tpl', 1, false),array('modifier', 'floor', 'patrones/M1LIS/plantilla.tpl', 21, false),array('modifier', 'ceil', 'patrones/M1LIS/plantilla.tpl', 25, false),)), $this); ?>
<!--*********** <?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 ******************-->	
{if $smty_panelActivo eq "<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" }
<!--*********** PANEL lis ******************-->	
	{CWPanel id="lisDetalle" detalleDe="<?php echo $this->_tpl_vars['tipoMaestro']; ?>
" tipoComprobacion="envio" action="operarBD" method="post" estado="on" claseManejadora="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
		{CWBarraSupPanel titulo="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
		{/CWBarraSupPanel}
		{CWContenedor}			
			{CWTabla conCheck="true" id="TablaDetalle" numFilasPantalla="6" datos=$smty_datos<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
}
				{CWFila tipoListado="false"}	
<?php unset($this->_sections['lis']);
$this->_sections['lis']['name'] = 'lis';
$this->_sections['lis']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lis']['show'] = true;
$this->_sections['lis']['max'] = $this->_sections['lis']['loop'];
$this->_sections['lis']['step'] = 1;
$this->_sections['lis']['start'] = $this->_sections['lis']['step'] > 0 ? 0 : $this->_sections['lis']['loop']-1;
if ($this->_sections['lis']['show']) {
    $this->_sections['lis']['total'] = $this->_sections['lis']['loop'];
    if ($this->_sections['lis']['total'] == 0)
        $this->_sections['lis']['show'] = false;
} else
    $this->_sections['lis']['total'] = 0;
if ($this->_sections['lis']['show']):

            for ($this->_sections['lis']['index'] = $this->_sections['lis']['start'], $this->_sections['lis']['iteration'] = 1;
                 $this->_sections['lis']['iteration'] <= $this->_sections['lis']['total'];
                 $this->_sections['lis']['index'] += $this->_sections['lis']['step'], $this->_sections['lis']['iteration']++):
$this->_sections['lis']['rownum'] = $this->_sections['lis']['iteration'];
$this->_sections['lis']['index_prev'] = $this->_sections['lis']['index'] - $this->_sections['lis']['step'];
$this->_sections['lis']['index_next'] = $this->_sections['lis']['index'] + $this->_sections['lis']['step'];
$this->_sections['lis']['first']      = ($this->_sections['lis']['iteration'] == 1);
$this->_sections['lis']['last']       = ($this->_sections['lis']['iteration'] == $this->_sections['lis']['total']);
 $this->assign('campo', $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']]);  $this->assign('defVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['defVal']);  $this->assign('componente', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['componente']);  $this->assign('titVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['titVal']);  $this->assign('tamVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['tamVal']);  $this->assign('visibleVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['visibleVal']);  if ($this->_tpl_vars['componente'] == 0): ?>
				 	{CWCampoTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>" size="<?php if ($this->_tpl_vars['tamVal'] == ""):  echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp));  else:  echo $this->_tpl_vars['tamVal'];  endif; ?>" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>}
<?php elseif ($this->_tpl_vars['componente'] == 1): ?>
					{CWAreaTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>" rows="3" cols="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>}
<?php elseif ($this->_tpl_vars['componente'] == 2): ?>
				    {CWCheckBox textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>}
<?php elseif ($this->_tpl_vars['componente'] == 3): ?>
				 	{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>}
<?php else: ?>
					{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_detalle'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_detalle'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=<?php if ($this->_tpl_vars['defVal'] != ''): ?>"<?php echo $this->_tpl_vars['defVal']; ?>
"<?php else: ?>$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif;  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>}
<?php endif;  endfor; endif; ?>
				{/CWFila}
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}
	<!-- ****************** PESTANYAS DETALLE ************************-->	
	{CWContenedorPestanyas id="Detalle"}
		{CWPestanya tipo="lis" panelAsociado="lisDetalle" estado="on"}
	{/CWContenedorPestanyas}
{/if}