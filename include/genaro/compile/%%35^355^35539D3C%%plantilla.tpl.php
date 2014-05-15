<?php /* Smarty version 2.6.14, created on 2013-11-13 08:42:40
         compiled from patrones/P2M2FIL-LIS/plantilla.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/P2M2FIL-LIS/plantilla.tpl', 9, false),array('modifier', 'floor', 'patrones/P2M2FIL-LIS/plantilla.tpl', 26, false),)), $this); ?>
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
 $this->assign('campo', $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']]);  $this->assign('componente', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['componente']); ?> 
<?php $this->assign('titVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['titVal']);  $this->assign('tamVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['tamVal']);  $this->assign('visibleVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['visibleVal']); ?>
					<tr>				
<?php if ($this->_tpl_vars['componente'] == 0): ?>
					 	<td>{CWCampoTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" size="<?php if ($this->_tpl_vars['tamVal'] == ""):  echo ((is_array($_tmp=$this->_tpl_vars['lengths'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp));  else:  echo $this->_tpl_vars['tamVal'];  endif; ?>" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 1): ?>
						<td>{CWAreaTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" rows="3" cols="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 2): ?>
					    <td>{CWCheckBox textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php elseif ($this->_tpl_vars['componente'] == 3): ?>
					 	<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?>}</td>
<?php else: ?>
						<td>{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['fil']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre=<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?> size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['fil']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['fil']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  else: ?>fil_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['fil']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
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
	
	<!--*********** PANEL lis ******************-->	
	{CWPanel id="lis" tipoComprobacion="envio" esMaestro="true" itemSeleccionado=$smty_filaSeleccionada action="operarBD" method="post" estado=$estado_lis claseManejadora="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
		{CWBarraSupPanel titulo="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"}
			{CWBotonTooltip imagen="01" titulo="Insertar registro" funcion="insertar" actuaSobre="tabla" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
__nuevo"}
			{CWBotonTooltip imagen="02" titulo="Modificar registro" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registro" funcion="eliminar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="limpiar" actuaSobre="tabla"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheck="true" conCheckTodos="false" id="Tabla1" numFilasPantalla="6" datos=$smty_datosTablaM}
				{CWFila tipoListado="false"}
<?php unset($this->_sections['lis']);
$this->_sections['lis']['name'] = 'lis';
$this->_sections['lis']['loop'] = is_array($_loop=$this->_tpl_vars['fields_maestro']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 $this->assign('campo', $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']]);  $this->assign('componente', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['componente']);  $this->assign('titVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['titVal']);  $this->assign('tamVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['tamVal']);  $this->assign('visibleVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['visibleVal']);  if ($this->_tpl_vars['componente'] == 0): ?>
				 	{CWCampoTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>" size=<?php if ($this->_tpl_vars['tamVal'] == ""):  echo ((is_array($_tmp=$this->_tpl_vars['lengths'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp));  else:  echo $this->_tpl_vars['tamVal'];  endif; ?> editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>}
<?php elseif ($this->_tpl_vars['componente'] == 1): ?>
					{CWCampoTexto textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>" size=<?php if ($this->_tpl_vars['tamVal'] == ""):  echo ((is_array($_tmp=$this->_tpl_vars['lengths'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp));  else:  echo $this->_tpl_vars['tamVal'];  endif; ?> editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>}
<?php elseif ($this->_tpl_vars['componente'] == 2): ?>
				    {CWCheckBox textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '1'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>}
<?php elseif ($this->_tpl_vars['componente'] == 3): ?>
				 	{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>}
<?php else: ?>
					{CWLista textoAsociado=<?php if ($this->_tpl_vars['titVal'] == ""): ?>"<?php echo $this->_tpl_vars['titles_maestro'][$this->_sections['lis']['index']]; ?>
"<?php else: ?>"<?php echo $this->_tpl_vars['titVal']; ?>
"<?php endif; ?> nombre="<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>" size="<?php echo ((is_array($_tmp=$this->_tpl_vars['lengths_maestro'][$this->_sections['lis']['index']])) ? $this->_run_mod_handler('floor', true, $_tmp) : floor($_tmp)); ?>
" editable="true" visible=<?php if ($this->_tpl_vars['visibleVal'] == '0'): ?>"false"<?php else: ?>"true"<?php endif; ?> value=$defaultData_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?> dataType=$dataType_<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.<?php if ($this->_tpl_vars['primaryKey_maestro'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_maestro'][$this->_sections['lis']['index']];  endif; ?>}
<?php endif; ?>								
<?php endfor; endif; ?>
				{/CWFila}				
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}
	
	<!-- ****************** PESTA�AS MAESTRO ************************-->	
	{CWContenedorPestanyas id="Maestro"}				
		{CWPestanya tipo="fil" panelAsociado="fil" estado=$estado_fil ocultar="Detalle"}
		{CWPestanya tipo="lis" panelAsociado="lis" estado=$estado_lis mostrar="Detalle"}
	{/CWContenedorPestanyas}
</td></tr>
																																					
<!-- ****************** PANELES DETALLES ***********************-->

{if count($smty_datosTablaM ) gt 0 }

	{CWDetalles claseManejadoraPadre="<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" detalles=$smty_detalles panelActivo=$smty_panelActivo}

<tr><td>