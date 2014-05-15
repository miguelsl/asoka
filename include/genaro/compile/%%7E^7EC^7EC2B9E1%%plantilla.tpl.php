<?php /* Smarty version 2.6.14, created on 2013-11-19 12:13:38
         compiled from patrones/P2M2FIL-EDI/plantilla.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/P2M2FIL-EDI/plantilla.tpl', 9, false),array('modifier', 'floor', 'patrones/P2M2FIL-EDI/plantilla.tpl', 25, false),)), $this); ?>
{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve=$smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}	
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!-- ********************************************** MAESTRO **********************************************-->
	<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado=$estado_fil claseManejadora="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
		{CWBarraSupPanel titulo="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
__nuevo"}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="restaurar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}										
				<table class="text" cellspacing="4" cellpadding="4" border="0">
<?php unset($this->_sections['fil']);
$this->_sections['fil']['name'] = 'fil';
$this->_sections['fil']['loop'] = is_array($_loop=$this->_tpl_vars['fields_maestro']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fil']['show'] = true;
$this->_sections['fil']['max'] = $this->_sections['fil']['loop'];
$this->_sections['fil']['step'] = 1;
$this->_sections['fil']['start'] = $this->_sections['fil']['step'] > 0 ? 0 : $this->_sections['fil']['loop']-1;
if ($this->_sections['fil']['show']) {
    $this->_sections['fil']['total'] = $this->_sections['fil']['loop'];
    if ($this->_sections['fil']['total'] == 0)
        $this->_sections['fil']['show'] = false;
} else
    $this->_sections['fil']['total'] = 0;
if ($this->_sections['fil']['show']):

            for ($this->_sections['fil']['index'] = $this->_sections['fil']['start'], $this->_sections['fil']['iteration'] = 1;
                 $this->_sections['fil']['iteration'] <= $this->_sections['fil']['total'];
                 $this->_sections['fil']['index'] += $this->_sections['fil']['step'], $this->_sections['fil']['iteration']++):
$this->_sections['fil']['rownum'] = $this->_sections['fil']['iteration'];
$this->_sections['fil']['index_prev'] = $this->_sections['fil']['index'] - $this->_sections['fil']['step'];
$this->_sections['fil']['index_next'] = $this->_sections['fil']['index'] + $this->_sections['fil']['step'];
$this->_sections['fil']['first']      = ($this->_sections['fil']['iteration'] == 1);
$this->_sections['fil']['last']       = ($this->_sections['fil']['iteration'] == $this->_sections['fil']['total']);
 $this->assign('campo', $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']]);  $this->assign('componente', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['componente']);  $this->assign('titVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['titVal']);  $this->assign('tamVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['tamVal']);  $this->assign('visibleVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['visibleVal']); ?>
					<tr>
<?php if ($this->_tpl_vars['componente'] == 0): ?>
						<td>{CWCampoTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" size="<?php if ($this->_tpl_vars['tamVal'] == ""):  echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp));  else:  echo $this->_tpl_vars['tamVal'];  endif; ?>" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 1): ?>
					<td>{CWAreaTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" rows="3" cols="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 2): ?>
					<td>{CWCheckBox textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>	
<?php elseif ($this->_tpl_vars['componente'] == 3): ?>
					<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php else: ?>
					<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php endif; ?>
				</tr>
<?php endfor; endif; ?>
			</table>
			<br/>	
			{/CWFicha}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="50" texto="Buscar" class="button" accion="buscar"}
		{/CWBarraInfPanel}						
	{/CWPanel}
	
	<!--*********** PANEL edi ******************-->	
	{CWPanel id="edi" tipoComprobacion="envio" esMaestro="true" itemSeleccionado=$smty_filaSeleccionada action="operarBD" method="post" estado="$estado_edi" claseManejadora="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" accion=$smty_operacionFicha<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
}
		{CWBarraSupPanel titulo="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
			{CWBotonTooltip imagen="01" titulo="Insertar registro" funcion="insertar" actuaSobre="ficha" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
__nuevo"}
			{CWBotonTooltip imagen="02" titulo="Modificar registro" funcion="modificar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registro" funcion="eliminar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="limpiar" actuaSobre="ficha"}		
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFichaEdicion id="FichaEdicion" datos=$smty_datosFichaM}
				{CWFicha}

					<table class="text" cellspacing="4" cellpadding="4" border="0">
<?php unset($this->_sections['edi']);
$this->_sections['edi']['name'] = 'edi';
$this->_sections['edi']['loop'] = is_array($_loop=$this->_tpl_vars['fields_maestro']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 $this->assign('campo', $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']]);  $this->assign('componente', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['componente']);  $this->assign('titVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['titVal']);  $this->assign('tamVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['tamVal']);  $this->assign('visibleVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['visibleVal']); ?>
						<tr>
<?php if ($this->_tpl_vars['componente'] == 0): ?>
						 	<td>{CWCampoTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>" size="<?php if ($this->_tpl_vars['tamVal'] == ""):  echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp));  else:  echo $this->_tpl_vars['tamVal'];  endif; ?>" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 1): ?>
							<td>{CWAreaTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>" rows="3" cols="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 2): ?>
						    <td>{CWCheckBox textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 3): ?>
						 	<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php else: ?>
							<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['edi']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['edi']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>  dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['edi']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  else: ?>edi_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['edi']['index']];  endif; ?>}</td>
<?php endif; ?>
						</tr>
<?php endfor; endif; ?>
					</table>
					<br/>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}	
	
	<!-- ****************** PESTANYA MAESTRO ************************-->	
	{CWContenedorPestanyas id="Maestro"}
		{CWPestanya tipo="fil" panelAsociado="fil" estado=$estado_fil ocultar="Detalle"}
		{CWPestanya tipo="edi" panelAsociado="edi" estado=$estado_edi mostrar="Detalle"}
	{/CWContenedorPestanyas}
</td></tr>
																																								
<!-- ****************** PANELES DETALLES ***********************-->
{if count($smty_datosFichaM ) gt 0 }
				
	{CWDetalles claseManejadoraPadre="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" detalles=$smty_detalles panelActivo=$smty_panelActivo}

<tr><td>