<?php /* Smarty version 2.6.14, created on 2013-11-13 08:42:40
         compiled from patrones/M1LIS-EDI/action.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'patrones/M1LIS-EDI/action.tpl', 35, false),array('modifier', 'explode', 'patrones/M1LIS-EDI/action.tpl', 201, false),)), $this); ?>
<?php echo '<?php'; ?>

/* gvHIDRA. Herramienta Integral de Desarrollo R�pido de Aplicaciones de la Generalitat Valenciana
*
* Copyright (C) 2006 Generalitat Valenciana.
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
*
* For more information, contact:
*
*  Generalitat Valenciana
*  Conselleria d'Infraestructures i Transport
*  Av. Blasco Ib��ez, 50
*  46010 VALENCIA
*  SPAIN
*  +34 96386 24 83
*  gvhidra@gva.es
*  www.gvhidra.org
*
*/

/**
* Clase Manejadora <?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

* 
* Creada con Genaro: generador de c�digo de gvHIDRA
* 
* @autor genaro
* @version 1.0
* @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v.2
*/
class <?php echo ((is_array($_tmp=$this->_tpl_vars['classname_detalle'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 extends gvHidraForm_DB
{
	public function __construct() {

		//Recogemos dsn de conexion
		$conf = ConfigFramework::getConfig();
		$g_dsn = $conf->getDSN('<?php echo $this->_tpl_vars['dsn']; ?>
');

		$nombreTablas= array('<?php echo $this->_tpl_vars['tablename_detalle']; ?>
');
		parent::__construct($g_dsn, $nombreTablas);

		/************************ QUERYs ************************/
		//Consulta del modo de trabajo LIS
		$str_select = "SELECT <?php unset($this->_sections['select']);
$this->_sections['select']['name'] = 'select';
$this->_sections['select']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['select']['show'] = true;
$this->_sections['select']['max'] = $this->_sections['select']['loop'];
$this->_sections['select']['step'] = 1;
$this->_sections['select']['start'] = $this->_sections['select']['step'] > 0 ? 0 : $this->_sections['select']['loop']-1;
if ($this->_sections['select']['show']) {
    $this->_sections['select']['total'] = $this->_sections['select']['loop'];
    if ($this->_sections['select']['total'] == 0)
        $this->_sections['select']['show'] = false;
} else
    $this->_sections['select']['total'] = 0;
if ($this->_sections['select']['show']):

            for ($this->_sections['select']['index'] = $this->_sections['select']['start'], $this->_sections['select']['iteration'] = 1;
                 $this->_sections['select']['iteration'] <= $this->_sections['select']['total'];
                 $this->_sections['select']['index'] += $this->_sections['select']['step'], $this->_sections['select']['iteration']++):
$this->_sections['select']['rownum'] = $this->_sections['select']['iteration'];
$this->_sections['select']['index_prev'] = $this->_sections['select']['index'] - $this->_sections['select']['step'];
$this->_sections['select']['index_next'] = $this->_sections['select']['index'] + $this->_sections['select']['step'];
$this->_sections['select']['first']      = ($this->_sections['select']['iteration'] == 1);
$this->_sections['select']['last']       = ($this->_sections['select']['iteration'] == $this->_sections['select']['total']);
 echo $this->_tpl_vars['fields_detalle'][$this->_sections['select']['index']]; ?>
 as \"<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['select']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['select']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['select']['index']];  endif; ?>\"<?php if ($this->_sections['select']['last']):  else: ?>, <?php endif;  endfor; endif; ?> FROM <?php echo $this->_tpl_vars['tablename_detalle']; ?>
";
		$this->setSelectForSearchQuery($str_select);

		//Where del modo de trabajo LIS
		//$str_where = "";
		//$this->setWhereForSearchQuery($str_where);

		//Order del modo de trabajo LIS
		$this->setOrderByForSearchQuery('1');


		//Consulta del modo de trabajo EDI
		$str_select = "SELECT <?php unset($this->_sections['select']);
$this->_sections['select']['name'] = 'select';
$this->_sections['select']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['select']['show'] = true;
$this->_sections['select']['max'] = $this->_sections['select']['loop'];
$this->_sections['select']['step'] = 1;
$this->_sections['select']['start'] = $this->_sections['select']['step'] > 0 ? 0 : $this->_sections['select']['loop']-1;
if ($this->_sections['select']['show']) {
    $this->_sections['select']['total'] = $this->_sections['select']['loop'];
    if ($this->_sections['select']['total'] == 0)
        $this->_sections['select']['show'] = false;
} else
    $this->_sections['select']['total'] = 0;
if ($this->_sections['select']['show']):

            for ($this->_sections['select']['index'] = $this->_sections['select']['start'], $this->_sections['select']['iteration'] = 1;
                 $this->_sections['select']['iteration'] <= $this->_sections['select']['total'];
                 $this->_sections['select']['index'] += $this->_sections['select']['step'], $this->_sections['select']['iteration']++):
$this->_sections['select']['rownum'] = $this->_sections['select']['iteration'];
$this->_sections['select']['index_prev'] = $this->_sections['select']['index'] - $this->_sections['select']['step'];
$this->_sections['select']['index_next'] = $this->_sections['select']['index'] + $this->_sections['select']['step'];
$this->_sections['select']['first']      = ($this->_sections['select']['iteration'] == 1);
$this->_sections['select']['last']       = ($this->_sections['select']['iteration'] == $this->_sections['select']['total']);
 echo $this->_tpl_vars['fields_detalle'][$this->_sections['select']['index']]; ?>
 as \"<?php if ($this->_tpl_vars['primaryKeyDetalle'] == 'true'): ?>edi_id_detalle<?php elseif ($this->_tpl_vars['fields_detalle'][$this->_sections['select']['index']] == ($this->_tpl_vars['foreignKeyDetalle'])):  echo $this->_tpl_vars['tipoMaestro']; ?>
_id_maestro<?php else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['select']['index']];  endif; ?>\"<?php if ($this->_sections['select']['last']):  else: ?>, <?php endif;  endfor; endif; ?> FROM <?php echo $this->_tpl_vars['tablename_detalle']; ?>
";		 
		$this->setSelectForEditQuery($str_select);

		//Where del modo de trabajo EDI		 
		//$str_where_editar = "";
		//$this->setWhereForEditQuery($str_where_editar);

		//Order del modo de trabajo EDI
		$this->setOrderByForEditQuery('1');

		/************************ END QUERYs ************************/


		/************************ MATCHINGs ************************/

		//Seccion de matching: asociacion campos TPL y campos BD
		
		//Modo de trabajo LIS
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
?>
		$this->addMatching("<?php if ($this->_tpl_vars['foreignKey_detalle'][$this->_sections['lis']['index']] == 'true'):  echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  else: ?>lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']];  endif; ?>","<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['lis']['index']]; ?>
","<?php echo $this->_tpl_vars['tablename_detalle']; ?>
");
		//$this->addMatching("<?php if ($this->_tpl_vars['primaryKey_detalle'][$this->_sections['matchings']['index']] == 'true'): ?>edi_id_detalle<?php elseif ($this->_tpl_vars['fields_detalle'][$this->_sections['matchings']['index']] == ($this->_tpl_vars['foreignKeyDetalle'])):  echo $this->_tpl_vars['tipoMaestro']; ?>
_id_maestro<?php else: ?>edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['matchings']['index']];  endif; ?>","<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['matchings']['index']]; ?>
","<?php echo $this->_tpl_vars['tablename_detalle']; ?>
");
<?php endfor; endif; ?>

		/************************ END MATCHINGs ************************/


		/************************ TYPEs ************************/
	
		//Fechas: gvHidraDate type
<?php unset($this->_sections['fecha']);
$this->_sections['fecha']['name'] = 'fecha';
$this->_sections['fecha']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fecha']['show'] = true;
$this->_sections['fecha']['max'] = $this->_sections['fecha']['loop'];
$this->_sections['fecha']['step'] = 1;
$this->_sections['fecha']['start'] = $this->_sections['fecha']['step'] > 0 ? 0 : $this->_sections['fecha']['loop']-1;
if ($this->_sections['fecha']['show']) {
    $this->_sections['fecha']['total'] = $this->_sections['fecha']['loop'];
    if ($this->_sections['fecha']['total'] == 0)
        $this->_sections['fecha']['show'] = false;
} else
    $this->_sections['fecha']['total'] = 0;
if ($this->_sections['fecha']['show']):

            for ($this->_sections['fecha']['index'] = $this->_sections['fecha']['start'], $this->_sections['fecha']['iteration'] = 1;
                 $this->_sections['fecha']['iteration'] <= $this->_sections['fecha']['total'];
                 $this->_sections['fecha']['index'] += $this->_sections['fecha']['step'], $this->_sections['fecha']['iteration']++):
$this->_sections['fecha']['rownum'] = $this->_sections['fecha']['iteration'];
$this->_sections['fecha']['index_prev'] = $this->_sections['fecha']['index'] - $this->_sections['fecha']['step'];
$this->_sections['fecha']['index_next'] = $this->_sections['fecha']['index'] + $this->_sections['fecha']['step'];
$this->_sections['fecha']['first']      = ($this->_sections['fecha']['iteration'] == 1);
$this->_sections['fecha']['last']       = ($this->_sections['fecha']['iteration'] == $this->_sections['fecha']['total']);
 $this->assign('campo', $this->_tpl_vars['fields_detalle'][$this->_sections['fecha']['index']]);  $this->assign('reqVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['reqVal']);  $this->assign('calVal_lis', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['calVal']);  $this->assign('calVal_edi', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['calVal']);  if ($this->_tpl_vars['types_detalle'][$this->_sections['fecha']['index']] == 'gvHidraDate'): ?>
		$fecha = new gvHidraDate(false);
<?php if ($this->_tpl_vars['calVal_fil'] == 1): ?>
    	$fecha->setCalendar(true);
<?php else: ?>
    	$fecha->setCalendar(false);
<?php endif; ?>
    	$this->addFieldType('lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['fecha']['index']]; ?>
',$fecha);
<?php if ($this->_tpl_vars['notnulls'][$this->_sections['fecha']['index']] == 'true'): ?>
		$fecha = new gvHidraDate(false);
<?php endif;  if ($this->_tpl_vars['calVal_edi'] == 1): ?>
		$fecha->setCalendar(true);
<?php else: ?>
		$fecha->setCalendar(false);
<?php endif;  if ($this->_tpl_vars['reqVal'] == 1): ?>
		$fecha->setRequired(true);
<?php endif; ?>
		$this->addFieldType('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['fecha']['index']]; ?>
',$fecha);

<?php endif;  if ($this->_tpl_vars['types_detalle'][$this->_sections['fecha']['index']] == 'gvHidraDatetime'): ?>
		$fecha = new gvHidraDatetime(false);
<?php if ($this->_tpl_vars['calVal_fil'] == 1): ?>
		$fecha->setCalendar(true);
<?php else: ?>
		$fecha->setCalendar(false);
<?php endif; ?>
		$this->addFieldType('lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['fecha']['index']]; ?>
',$fecha);
<?php if ($this->_tpl_vars['notnulls'][$this->_sections['fecha']['index']] == 'true'): ?>
		$fecha = new gvHidraDatetime(true);
<?php endif;  if ($this->_tpl_vars['calVal_edi'] == 1): ?>
		$fecha->setCalendar(true);
<?php else: ?>
		$fecha->setCalendar(false);
<?php endif;  if ($this->_tpl_vars['reqVal'] == 1): ?>
		$fecha->setRequired(true);
<?php endif; ?>
		$this->addFieldType('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['fecha']['index']]; ?>
',$fecha);

<?php endif;  endfor; endif; ?>

		//Strings: gvHidraString type
<?php unset($this->_sections['string']);
$this->_sections['string']['name'] = 'string';
$this->_sections['string']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['string']['show'] = true;
$this->_sections['string']['max'] = $this->_sections['string']['loop'];
$this->_sections['string']['step'] = 1;
$this->_sections['string']['start'] = $this->_sections['string']['step'] > 0 ? 0 : $this->_sections['string']['loop']-1;
if ($this->_sections['string']['show']) {
    $this->_sections['string']['total'] = $this->_sections['string']['loop'];
    if ($this->_sections['string']['total'] == 0)
        $this->_sections['string']['show'] = false;
} else
    $this->_sections['string']['total'] = 0;
if ($this->_sections['string']['show']):

            for ($this->_sections['string']['index'] = $this->_sections['string']['start'], $this->_sections['string']['iteration'] = 1;
                 $this->_sections['string']['iteration'] <= $this->_sections['string']['total'];
                 $this->_sections['string']['index'] += $this->_sections['string']['step'], $this->_sections['string']['iteration']++):
$this->_sections['string']['rownum'] = $this->_sections['string']['iteration'];
$this->_sections['string']['index_prev'] = $this->_sections['string']['index'] - $this->_sections['string']['step'];
$this->_sections['string']['index_next'] = $this->_sections['string']['index'] + $this->_sections['string']['step'];
$this->_sections['string']['first']      = ($this->_sections['string']['iteration'] == 1);
$this->_sections['string']['last']       = ($this->_sections['string']['iteration'] == $this->_sections['string']['total']);
 $this->assign('campo', $this->_tpl_vars['fields_detalle'][$this->_sections['string']['index']]);  $this->assign('mascara', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['maskVal']);  $this->assign('reqVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['reqVal']);  if ($this->_tpl_vars['types_detalle'][$this->_sections['string']['index']] == 'gvHidraString'):  if ($this->_tpl_vars['lengths_detalle'][$this->_sections['string']['index']] == ""):  $this->assign('length', '200');  else:  $this->assign('length', $this->_tpl_vars['lengths_detalle'][$this->_sections['string']['index']]);  endif; ?>
		$string = new gvHidraString(false, <?php echo $this->_tpl_vars['length']; ?>
);
<?php if ($this->_tpl_vars['mascara'] != ''): ?>
		$string -> setInputMask('<?php echo $this->_tpl_vars['mascara']; ?>
');
<?php endif; ?>
		$this->addFieldType('lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['string']['index']]; ?>
',$string);
<?php if ($this->_tpl_vars['notnulls'][$this->_sections['string']['index']] == 'true'): ?>
		$string = new gvHidraString(false, <?php echo $this->_tpl_vars['length']; ?>
);
	<?php if ($this->_tpl_vars['mascara'] != ''): ?>
		$string->setInputMask('<?php echo $this->_tpl_vars['mascara']; ?>
');
	<?php endif; ?>
	<?php if ($this->_tpl_vars['reqVal'] == 1): ?>
		$string->setRequired(true);
	<?php endif;  endif; ?>
		$this->addFieldType('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['string']['index']]; ?>
',$string);
		
<?php endif;  endfor; endif; ?>

		//Integers: gvHidraInteger type
<?php unset($this->_sections['int']);
$this->_sections['int']['name'] = 'int';
$this->_sections['int']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['int']['show'] = true;
$this->_sections['int']['max'] = $this->_sections['int']['loop'];
$this->_sections['int']['step'] = 1;
$this->_sections['int']['start'] = $this->_sections['int']['step'] > 0 ? 0 : $this->_sections['int']['loop']-1;
if ($this->_sections['int']['show']) {
    $this->_sections['int']['total'] = $this->_sections['int']['loop'];
    if ($this->_sections['int']['total'] == 0)
        $this->_sections['int']['show'] = false;
} else
    $this->_sections['int']['total'] = 0;
if ($this->_sections['int']['show']):

            for ($this->_sections['int']['index'] = $this->_sections['int']['start'], $this->_sections['int']['iteration'] = 1;
                 $this->_sections['int']['iteration'] <= $this->_sections['int']['total'];
                 $this->_sections['int']['index'] += $this->_sections['int']['step'], $this->_sections['int']['iteration']++):
$this->_sections['int']['rownum'] = $this->_sections['int']['iteration'];
$this->_sections['int']['index_prev'] = $this->_sections['int']['index'] - $this->_sections['int']['step'];
$this->_sections['int']['index_next'] = $this->_sections['int']['index'] + $this->_sections['int']['step'];
$this->_sections['int']['first']      = ($this->_sections['int']['iteration'] == 1);
$this->_sections['int']['last']       = ($this->_sections['int']['iteration'] == $this->_sections['int']['total']);
 $this->assign('campo', $this->_tpl_vars['fields_detalle'][$this->_sections['int']['index']]);  $this->assign('reqVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['reqVal']);  if ($this->_tpl_vars['types_detalle'][$this->_sections['int']['index']] == 'gvHidraInteger'): ?>
		$int = new gvHidraInteger(false, <?php echo $this->_tpl_vars['lengths_detalle'][$this->_sections['int']['index']]; ?>
);
		$this->addFieldType('lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['int']['index']]; ?>
',$int);		
<?php if ($this->_tpl_vars['notnulls'][$this->_sections['int']['index']] == 'true'): ?>
		$int = new gvHidraInteger(true, <?php echo $this->_tpl_vars['lengths_detalle'][$this->_sections['int']['index']]; ?>
);
<?php endif;  if ($this->_tpl_vars['reqVal'] == 1): ?>
		$int->setRequired(true);
<?php endif; ?>
		$this->addFieldType('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['int']['index']]; ?>
',$int);
		
<?php endif;  endfor; endif; ?>

		//Floats: gvHidraFloat type
<?php unset($this->_sections['float']);
$this->_sections['float']['name'] = 'float';
$this->_sections['float']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['float']['show'] = true;
$this->_sections['float']['max'] = $this->_sections['float']['loop'];
$this->_sections['float']['step'] = 1;
$this->_sections['float']['start'] = $this->_sections['float']['step'] > 0 ? 0 : $this->_sections['float']['loop']-1;
if ($this->_sections['float']['show']) {
    $this->_sections['float']['total'] = $this->_sections['float']['loop'];
    if ($this->_sections['float']['total'] == 0)
        $this->_sections['float']['show'] = false;
} else
    $this->_sections['float']['total'] = 0;
if ($this->_sections['float']['show']):

            for ($this->_sections['float']['index'] = $this->_sections['float']['start'], $this->_sections['float']['iteration'] = 1;
                 $this->_sections['float']['iteration'] <= $this->_sections['float']['total'];
                 $this->_sections['float']['index'] += $this->_sections['float']['step'], $this->_sections['float']['iteration']++):
$this->_sections['float']['rownum'] = $this->_sections['float']['iteration'];
$this->_sections['float']['index_prev'] = $this->_sections['float']['index'] - $this->_sections['float']['step'];
$this->_sections['float']['index_next'] = $this->_sections['float']['index'] + $this->_sections['float']['step'];
$this->_sections['float']['first']      = ($this->_sections['float']['iteration'] == 1);
$this->_sections['float']['last']       = ($this->_sections['float']['iteration'] == $this->_sections['float']['total']);
 $this->assign('campo', $this->_tpl_vars['fields_detalle'][$this->_sections['float']['index']]);  $this->assign('reqVal', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['reqVal']);  if ($this->_tpl_vars['types_detalle'][$this->_sections['float']['index']] == 'gvHidraFloat'):  $this->assign('partes', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['lengths_detalle'][$this->_sections['float']['index']]) : explode($_tmp, $this->_tpl_vars['lengths_detalle'][$this->_sections['float']['index']]))); ?>
		$float = new gvHidraFloat(false, <?php echo $this->_tpl_vars['partes'][0]; ?>
);
		$float->setFloatLength(<?php echo $this->_tpl_vars['partes'][1]; ?>
);
		$this->addFieldType('lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['float']['index']]; ?>
',$float);		
<?php if ($this->_tpl_vars['notnulls'][$this->_sections['float']['index']] == 'true'): ?>
		$float = new gvHidraFloat(true, <?php echo $this->_tpl_vars['partes'][0]; ?>
);
		$float->setFloatLength(<?php echo $this->_tpl_vars['partes'][1]; ?>
);
<?php endif;  if ($this->_tpl_vars['reqVal'] == 1): ?>
		$float->setRequired(true);
<?php endif; ?>
		$this->addFieldType('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['float']['index']]; ?>
',$float);
		
<?php endif;  endfor; endif; ?>

		/************************ END TYPEs ************************/
				
		/************************ COMPONENTS ************************/
		
		//Declaracion de Listas y WindowSelection
		//La definici�n debe estar en el AppMainWindow.php

<?php unset($this->_sections['components']);
$this->_sections['components']['name'] = 'components';
$this->_sections['components']['loop'] = is_array($_loop=$this->_tpl_vars['fields_detalle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['components']['show'] = true;
$this->_sections['components']['max'] = $this->_sections['components']['loop'];
$this->_sections['components']['step'] = 1;
$this->_sections['components']['start'] = $this->_sections['components']['step'] > 0 ? 0 : $this->_sections['components']['loop']-1;
if ($this->_sections['components']['show']) {
    $this->_sections['components']['total'] = $this->_sections['components']['loop'];
    if ($this->_sections['components']['total'] == 0)
        $this->_sections['components']['show'] = false;
} else
    $this->_sections['components']['total'] = 0;
if ($this->_sections['components']['show']):

            for ($this->_sections['components']['index'] = $this->_sections['components']['start'], $this->_sections['components']['iteration'] = 1;
                 $this->_sections['components']['iteration'] <= $this->_sections['components']['total'];
                 $this->_sections['components']['index'] += $this->_sections['components']['step'], $this->_sections['components']['iteration']++):
$this->_sections['components']['rownum'] = $this->_sections['components']['iteration'];
$this->_sections['components']['index_prev'] = $this->_sections['components']['index'] - $this->_sections['components']['step'];
$this->_sections['components']['index_next'] = $this->_sections['components']['index'] + $this->_sections['components']['step'];
$this->_sections['components']['first']      = ($this->_sections['components']['iteration'] == 1);
$this->_sections['components']['last']       = ($this->_sections['components']['iteration'] == $this->_sections['components']['total']);
 $this->assign('campo', $this->_tpl_vars['fields_detalle'][$this->_sections['components']['index']]);  $this->assign('componente', $this->_tpl_vars['customFields'][$this->_tpl_vars['campo']]['componente']);  if ($this->_tpl_vars['componente'] == 2): ?>
		$check_lis = new gvHidraCheckBox('lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['components']['index']]; ?>
');
		$check_lis->setChecked(false);
		$check_lis->setValueChecked('');
		$check_lis->setValueUnchecked('');
		$this->addCheckBox($check_lis);
		
		$check_edi = new gvHidraCheckBox('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['components']['index']]; ?>
');
		$check_edi->setChecked(false);
		$check_edi->setValueChecked('');
		$check_edi->setValueUnchecked('');
		$this->addCheckBox($check_lis);
		
<?php endif;  if ($this->_tpl_vars['componente'] == 3): ?>
		$radio_lis = new gvHidraList('lis_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['components']['index']]; ?>
');
		$radio_lis->setRadio(true);
		$radio_lis->addOption('','Default 1');
		$radio_lis->addOption('','Default 2');
		$radio_lis->setSelected('');
		$this->addList($radio_lis);
		
		$radio_edi = new gvHidraList('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['components']['index']]; ?>
');
		$radio_edi->setRadio(true);
		$radio_edi->addOption('','Default 1');
		$radio_edi->addOption('','Default 2');
		$radio_edi->setSelected('');
		$this->addList($radio_edi);
		
<?php endif;  if ($this->_tpl_vars['componente'] == 4): ?>
		$lista_lis = new gvHidraList('edi_<?php echo $this->_tpl_vars['fields_detalle'][$this->_sections['components']['index']]; ?>
');
		$lista_lis->addOption('','Default 1');
		$lista_lis->addOption('','Default 2');
		$lista_lis->setSelected('');
		$this->addList($lista_lis);
		
<?php endif;  endfor; endif; ?>

		/************************ END COMPONENTS ************************/						
		
		//Asociamos con la clase maestro	
		$this->addMaster("<?php echo ((is_array($_tmp=$this->_tpl_vars['classname_maestro'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
");
		
	}//End construct

	/************************ CRUD METHODs ************************/

	/**
	* metodo preRecargar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la recarga. Por ejemplo:
	* - Incluir condiciones.
	* - Cancelar la accion. 
	*/	
	public function preRecargar($objDatos) {
		
		return 0;
	}

	/**
	* metodo postRecargar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos obtenidos. Por ejemplo:
	* - Completar la informacion obtenida.
	* - Cambiar el color de las filas dependiendo de su valor
	*/	
	public function postRecargar($objDatos) {
		
		return 0;
	}

	/**
	* metodo preEditar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la edicion. Por ejemplo:
	* - Incluir condiciones de filtrado.
	* - Cancelar la accion. 
	*/	
	public function preEditar($objDatos) {
		
		return 0;
	}

	/**
	* metodo postEditar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos obtenidos. Por ejemplo:
	* - Completar la informacion obtenida.
	*/	
	public function postEditar($objDatos) {
		
		return 0;
	}

	/**
	* metodo preInsertar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar los datos a insertar. Por ejemplo:
	* - Calcular el valor de una secuencia.
	* - Cancelar la acci�n de insercion.
	*/		
	public function preInsertar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo postInsertar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para completar la operacion de insercion. Por ejemplo:
	* - Insertar en una segunda tabla.
	*/		
	public function postInsertar($objDatos) {
		
		return 0;
	}

	/**
	* metodo preModificar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la operacion de actualizacion. Por ejemplo:
	* - Calcular valores derivados.
	* - Cancelar la acci�n de actualizacion.
	*/
	public function preModificar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo postModificar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para completar la operacion de actulizacion. Por ejemplo:
	* - Actualizar en una segunda tabla
	*/	
	public function postModificar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo preBorrar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para parametrizar la operacion de borrado. Por ejemplo:
	* - Cancelar la acci�n de borrado.
	*/	
	public function preBorrar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo postBorrar
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica para completar la operacion de borrado. Por ejemplo:
	* - Borrar en una segunda tabla
	*/	
	public function postBorrar($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo preNuevo
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui los valores por defecto antes de insertar.
	*/	
	public function preNuevo($objDatos) {
		
		return 0;
	}
	
	/**
	* metodo preIniciarVentana
	* 
	* @access public
	* @param object $objDatos
	* 
	* Incorpore aqui la logica a ejecutar cuando entra en la ventana. Por ejemplo:
	* - Puede comprobar que el usuario tiene los permisos necesarios.
	*/	
	public function preIniciarVentana($objDatos) {
		
		return 0;
	}
	
	/************************ END CRUD METHODs ************************/
	
	/**
	* metodo accionesParticulares
	* 
	* @access public
	* @param string $str_accion
	* @param object $objDatos
	* 
	* Incorpore aqui la logica de sus acciones particulares. 
	* -En el parametro $str_accion aparece el id de la accion.
	* -En el parametro $objDatos esta la informacion de la peticion. Recuerde que debe fijar la operacion
	* con el metodo setOperacion.
	*/	
	public function accionesParticulares($str_accion, $objDatos) {
        
		throw new Exception('Se ha intentado ejecutar la acci�n '.$str_accion.' y no est� programada.');        
    }
	
}//End <?php echo ((is_array($_tmp=$this->_tpl_vars['classname'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>


<?php echo '?>'; ?>