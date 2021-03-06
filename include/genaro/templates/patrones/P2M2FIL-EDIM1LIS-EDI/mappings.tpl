
//Maestro
$this->_AddMapping('<<$classname_maestro|capitalize>>__iniciarVentana', '<<$classname_maestro|capitalize>>');
$this->_AddForward('<<$classname_maestro|capitalize>>__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=buscar');
$this->_AddForward('<<$classname_maestro|capitalize>>__iniciarVentana', 'gvHidraError', 'index.php?view=igep/views/aplicacion.php');

$this->_AddMapping('<<$classname_maestro|capitalize>>__nuevo', '<<$classname_maestro|capitalize>>');
$this->_AddForward('<<$classname_maestro|capitalize>>__nuevo', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');

$this->_AddMapping('<<$classname_maestro|capitalize>>__operarBD', '<<$classname_maestro|capitalize>>');
$this->_AddForward('<<$classname_maestro|capitalize>>__operarBD', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');
$this->_AddForward('<<$classname_maestro|capitalize>>__operarBD', 'gvHidraError', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php');
$this->_AddForward('<<$classname_maestro|capitalize>>__operarBD', 'gvHidraNoData', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=buscar');

$this->_AddMapping('<<$classname_maestro|capitalize>>__buscar', '<<$classname_maestro|capitalize>>');
$this->_AddForward('<<$classname_maestro|capitalize>>__buscar', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');
$this->_AddForward('<<$classname_maestro|capitalize>>__buscar', 'gvHidraNoData', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=buscar');
$this->_AddForward('<<$classname_maestro|capitalize>>__buscar', 'gvHidraError', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');

$this->_AddMapping('<<$classname_maestro|capitalize>>__cancelarEdicion', '<<$classname_maestro|capitalize>>');
$this->_AddForward('<<$classname_maestro|capitalize>>__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');

$this->_AddMapping('<<$classname_maestro|capitalize>>__recargar', '<<$classname_maestro|capitalize>>');
$this->_AddForward('<<$classname_maestro|capitalize>>__recargar', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php');
$this->_AddForward('<<$classname_maestro|capitalize>>__recargar', 'gvHidraError', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php');

//Detalle
$this->_AddMapping('<<$classname_detalle|capitalize>>__nuevo', '<<$classname_detalle|capitalize>>');
$this->_AddForward('<<$classname_detalle|capitalize>>__nuevo', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=editar');

$this->_AddMapping('<<$classname_detalle|capitalize>>__borrar', '<<$classname_detalle|capitalize>>');
$this->_AddForward('<<$classname_detalle|capitalize>>__borrar', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');
$this->_AddForward('<<$classname_detalle|capitalize>>__borrar', 'gvHidraError', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');

$this->_AddMapping('<<$classname_detalle|capitalize>>__cancelarEdicion', '<<$classname_detalle|capitalize>>');
$this->_AddForward('<<$classname_detalle|capitalize>>__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');

$this->_AddMapping('<<$classname_detalle|capitalize>>__editar', '<<$classname_detalle|capitalize>>');
$this->_AddForward('<<$classname_detalle|capitalize>>__editar', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=editar');
$this->_AddForward('<<$classname_detalle|capitalize>>__editar', 'gvHidraError', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=editar');

$this->_AddMapping('<<$classname_detalle|capitalize>>__insertar', '<<$classname_detalle|capitalize>>');
$this->_AddForward('<<$classname_detalle|capitalize>>__insertar', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');
$this->_AddForward('<<$classname_detalle|capitalize>>__insertar', 'gvHidraError', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');

$this->_AddMapping('<<$classname_detalle|capitalize>>__modificar', '<<$classname_detalle|capitalize>>');
$this->_AddForward('<<$classname_detalle|capitalize>>__modificar', 'gvHidraSuccess', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');
$this->_AddForward('<<$classname_detalle|capitalize>>__modificar', 'gvHidraError', 'index.php?view=views/<<$nombreModulo|capitalize>>/p_<<$classname_maestro|capitalize>>.php&panel=listar');
