<?php
/**
 * Controlador
 *
 * $Revision: 1.2 $
 */
 include 'igep/include/gvHidraMaps.php';


	class ComponentesMap extends gvHidraMaps {
        /**
         *      constructor function
         *      @return void
         */
		function ComponentesMap () {
                
            //Llamamos al constructor del padre. Cargamos la accines gen�ricas de Igep           	
			parent::gvHidraMaps();				

			$this->_AddMapping('abrirAplicacion', 'AppMainWindow');
			$this->_AddForward('abrirAplicacion', 'gvHidraOpenApp', 'index.php?view=igep/views/aplicacion.php');
			$this->_AddForward('abrirAplicacion', 'gvHidraCloseApp', 'index.php?view=igep/views/gvHidraCloseApp.php');
			
			//.....//	
		
			/*Tasoka_especie*/
			$this->_AddMapping('Tasoka_especie__iniciarVentana', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=buscar');
			$this->_AddForward('Tasoka_especie__iniciarVentana', 'gvHidraError', 'index.php?view=views/Especies/p_Tasoka_especie.php');

			$this->_AddMapping('Tasoka_especie__buscar', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__buscar', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=listar');
			$this->_AddForward('Tasoka_especie__buscar', 'gvHidraError', 'index.php?view=views/Especies/p_Tasoka_especie.php');
			$this->_AddForward('Tasoka_especie__buscar', 'gvHidraNoData', 'index.php?view=views/Especies/p_.php&panel=listar');
			
			$this->_AddMapping('Tasoka_especie__operarBD', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__operarBD', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=listar');
			$this->_AddForward('Tasoka_especie__operarBD', 'gvHidraError', 'index.php?view=views/Especies/p_Tasoka_especie.php');
			
			$this->_AddMapping('Tasoka_especie__borrar', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__borrar', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=listar');
			$this->_AddForward('Tasoka_especie__borrar', 'gvHidraError', 'index.php?view=views/Especies/p_Tasoka_especie.php');
			$this->_AddForward('Tasoka_especie__borrar', 'gvHidraNoData', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=buscar');
			
			$this->_AddMapping('Tasoka_especie__cancelarTodo', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php');
			
			$this->_AddMapping('Tasoka_especie__cancelarEdicion', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=listar');
			
			$this->_AddMapping('Tasoka_especie__editar', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__editar', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=editar');
			$this->_AddForward('Tasoka_especie__editar', 'gvHidraError', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=listar');
			
			$this->_AddMapping('Tasoka_especie__nuevo', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__nuevo', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=listar');				
			
			$this->_AddMapping('Tasoka_especie__insertar', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__insertar', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=buscar');
			$this->_AddForward('Tasoka_especie__insertar', 'gvHidraError', 'index.php?view=views/Especies/p_Tasoka_especie.php');
			
			$this->_AddMapping('Tasoka_especie__modificar', 'Tasoka_especie');
			$this->_AddForward('Tasoka_especie__modificar', 'gvHidraSuccess', 'index.php?view=views/Especies/p_Tasoka_especie.php&panel=listar');
			$this->_AddForward('Tasoka_especie__modificar', 'gvHidraError', 'index.php?view=views/Especies/p_Tasoka_especie.php');
			/*Tasoka_bacteria*/
			$this->_AddMapping('Tasoka_bacteria__iniciarVentana', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=buscar');
			$this->_AddForward('Tasoka_bacteria__iniciarVentana', 'gvHidraError', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php');

			$this->_AddMapping('Tasoka_bacteria__buscar', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__buscar', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');
			$this->_AddForward('Tasoka_bacteria__buscar', 'gvHidraError', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php');
			$this->_AddForward('Tasoka_bacteria__buscar', 'gvHidraNoData', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');
			
			$this->_AddMapping('Tasoka_bacteria__operarBD', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__operarBD', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');
			$this->_AddForward('Tasoka_bacteria__operarBD', 'gvHidraError', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php');
			
			$this->_AddMapping('Tasoka_bacteria__borrar', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__borrar', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');
			$this->_AddForward('Tasoka_bacteria__borrar', 'gvHidraError', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php');
			$this->_AddForward('Tasoka_bacteria__borrar', 'gvHidraNoData', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=buscar');
			
			$this->_AddMapping('Tasoka_bacteria__cancelarTodo', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php');
			
			$this->_AddMapping('Tasoka_bacteria__cancelarEdicion', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');
			
			$this->_AddMapping('Tasoka_bacteria__editar', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__editar', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=editar');
			$this->_AddForward('Tasoka_bacteria__editar', 'gvHidraError', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');
			
			$this->_AddMapping('Tasoka_bacteria__nuevo', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__nuevo', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');				
			
			$this->_AddMapping('Tasoka_bacteria__insertar', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__insertar', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=buscar');
			$this->_AddForward('Tasoka_bacteria__insertar', 'gvHidraError', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php');
			
			$this->_AddMapping('Tasoka_bacteria__modificar', 'Tasoka_bacteria');
			$this->_AddForward('Tasoka_bacteria__modificar', 'gvHidraSuccess', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php&panel=listar');
			$this->_AddForward('Tasoka_bacteria__modificar', 'gvHidraError', 'index.php?view=views/Bacterias/p_Tasoka_bacteria.php');
			/*Tasoka_clinicas*/
			$this->_AddMapping('Tasoka_clinicas__iniciarVentana', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=buscar');
			$this->_AddForward('Tasoka_clinicas__iniciarVentana', 'gvHidraError', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php');

			$this->_AddMapping('Tasoka_clinicas__buscar', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__buscar', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=listar');
			$this->_AddForward('Tasoka_clinicas__buscar', 'gvHidraError', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php');
			$this->_AddForward('Tasoka_clinicas__buscar', 'gvHidraNoData', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_clinicas__borrar', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__borrar', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=listar');
			$this->_AddForward('Tasoka_clinicas__borrar', 'gvHidraError', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php');
			$this->_AddForward('Tasoka_clinicas__borrar', 'gvHidraNoData', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=buscar');
			
			$this->_AddMapping('Tasoka_clinicas__cancelarTodo', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php');
			
			$this->_AddMapping('Tasoka_clinicas__cancelarEdicion', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_clinicas__editar', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__editar', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=editar');
			$this->_AddForward('Tasoka_clinicas__editar', 'gvHidraError', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_clinicas__nuevo', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__nuevo', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=editar');
			
			$this->_AddMapping('Tasoka_clinicas__insertar', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__insertar', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=editar');
			$this->_AddForward('Tasoka_clinicas__insertar', 'gvHidraError', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php');
			
			$this->_AddMapping('Tasoka_clinicas__modificar', 'Tasoka_clinicas');
			$this->_AddForward('Tasoka_clinicas__modificar', 'gvHidraSuccess', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=listar');
			$this->_AddForward('Tasoka_clinicas__modificar', 'gvHidraError', 'index.php?view=views/Clinicas/p_Tasoka_clinicas.php&panel=listar');
			/*Tasoka_razas*/
			$this->_AddMapping('Tasoka_razas__iniciarVentana', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=buscar');
			$this->_AddForward('Tasoka_razas__iniciarVentana', 'gvHidraError', 'index.php?view=views/Razas/p_Tasoka_razas.php');

			$this->_AddMapping('Tasoka_razas__buscar', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__buscar', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');
			$this->_AddForward('Tasoka_razas__buscar', 'gvHidraError', 'index.php?view=views/Razas/p_Tasoka_razas.php');
			$this->_AddForward('Tasoka_razas__buscar', 'gvHidraNoData', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_razas__operarBD', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__operarBD', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');
			$this->_AddForward('Tasoka_razas__operarBD', 'gvHidraError', 'index.php?view=views/Razas/p_Tasoka_razas.php');
			
			$this->_AddMapping('Tasoka_razas__borrar', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__borrar', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');
			$this->_AddForward('Tasoka_razas__borrar', 'gvHidraError', 'index.php?view=views/Razas/p_Tasoka_razas.php');
			$this->_AddForward('Tasoka_razas__borrar', 'gvHidraNoData', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=buscar');
			
			$this->_AddMapping('Tasoka_razas__cancelarTodo', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php');
			
			$this->_AddMapping('Tasoka_razas__cancelarEdicion', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_razas__editar', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__editar', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=editar');
			$this->_AddForward('Tasoka_razas__editar', 'gvHidraError', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_razas__nuevo', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__nuevo', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');				
			
			$this->_AddMapping('Tasoka_razas__insertar', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__insertar', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=buscar');
			$this->_AddForward('Tasoka_razas__insertar', 'gvHidraError', 'index.php?view=views/Razas/p_Tasoka_razas.php');
			
			$this->_AddMapping('Tasoka_razas__modificar', 'Tasoka_razas');
			$this->_AddForward('Tasoka_razas__modificar', 'gvHidraSuccess', 'index.php?view=views/Razas/p_Tasoka_razas.php&panel=listar');
			$this->_AddForward('Tasoka_razas__modificar', 'gvHidraError', 'index.php?view=views/Razas/p_Tasoka_razas.php');
			/*Tasoka_vacunas*/
			$this->_AddMapping('Tasoka_vacunas__iniciarVentana', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=buscar');
			$this->_AddForward('Tasoka_vacunas__iniciarVentana', 'gvHidraError', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php');

			$this->_AddMapping('Tasoka_vacunas__buscar', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__buscar', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');
			$this->_AddForward('Tasoka_vacunas__buscar', 'gvHidraError', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php');
			$this->_AddForward('Tasoka_vacunas__buscar', 'gvHidraNoData', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_vacunas__operarBD', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__operarBD', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');
			$this->_AddForward('Tasoka_vacunas__operarBD', 'gvHidraError', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php');
			
			$this->_AddMapping('Tasoka_vacunas__borrar', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__borrar', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');
			$this->_AddForward('Tasoka_vacunas__borrar', 'gvHidraError', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php');
			$this->_AddForward('Tasoka_vacunas__borrar', 'gvHidraNoData', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=buscar');
			
			$this->_AddMapping('Tasoka_vacunas__cancelarTodo', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php');
			
			$this->_AddMapping('Tasoka_vacunas__cancelarEdicion', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_vacunas__editar', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__editar', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=editar');
			$this->_AddForward('Tasoka_vacunas__editar', 'gvHidraError', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');
			
			$this->_AddMapping('Tasoka_vacunas__nuevo', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__nuevo', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');				
			
			$this->_AddMapping('Tasoka_vacunas__insertar', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__insertar', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=buscar');
			$this->_AddForward('Tasoka_vacunas__insertar', 'gvHidraError', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php');
			
			$this->_AddMapping('Tasoka_vacunas__modificar', 'Tasoka_vacunas');
			$this->_AddForward('Tasoka_vacunas__modificar', 'gvHidraSuccess', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php&panel=listar');
			$this->_AddForward('Tasoka_vacunas__modificar', 'gvHidraError', 'index.php?view=views/Vacunas/p_Tasoka_vacunas.php');

			//Maestro
$this->_AddMapping('Tasoka_adopcionM__iniciarVentana', 'Tasoka_adopcionM');
$this->_AddForward('Tasoka_adopcionM__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=buscar');
$this->_AddForward('Tasoka_adopcionM__iniciarVentana', 'gvHidraError', 'index.php?view=igep/views/aplicacion.php');

$this->_AddMapping('Tasoka_adopcionM__nuevo', 'Tasoka_adopcionM');
$this->_AddForward('Tasoka_adopcionM__nuevo', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');

$this->_AddMapping('Tasoka_adopcionM__operarBD', 'Tasoka_adopcionM');
$this->_AddForward('Tasoka_adopcionM__operarBD', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');
$this->_AddForward('Tasoka_adopcionM__operarBD', 'gvHidraError', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php');
$this->_AddForward('Tasoka_adopcionM__operarBD', 'gvHidraNoData', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=buscar');

$this->_AddMapping('Tasoka_adopcionM__buscar', 'Tasoka_adopcionM');
$this->_AddForward('Tasoka_adopcionM__buscar', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');
$this->_AddForward('Tasoka_adopcionM__buscar', 'gvHidraNoData', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=buscar');
$this->_AddForward('Tasoka_adopcionM__buscar', 'gvHidraError', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');

$this->_AddMapping('Tasoka_adopcionM__cancelarEdicion', 'Tasoka_adopcionM');
$this->_AddForward('Tasoka_adopcionM__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');

$this->_AddMapping('Tasoka_adopcionM__recargar', 'Tasoka_adopcionM');
$this->_AddForward('Tasoka_adopcionM__recargar', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php');
$this->_AddForward('Tasoka_adopcionM__recargar', 'gvHidraError', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php');

//Detalle
$this->_AddMapping('Tasoka_adopcionD__nuevo', 'Tasoka_adopcionD');
$this->_AddForward('Tasoka_adopcionD__nuevo', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=editar');

$this->_AddMapping('Tasoka_adopcionD__borrar', 'Tasoka_adopcionD');
$this->_AddForward('Tasoka_adopcionD__borrar', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');
$this->_AddForward('Tasoka_adopcionD__borrar', 'gvHidraError', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');

$this->_AddMapping('Tasoka_adopcionD__cancelarEdicion', 'Tasoka_adopcionD');
$this->_AddForward('Tasoka_adopcionD__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');

$this->_AddMapping('Tasoka_adopcionD__editar', 'Tasoka_adopcionD');
$this->_AddForward('Tasoka_adopcionD__editar', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=editar');
$this->_AddForward('Tasoka_adopcionD__editar', 'gvHidraError', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=editar');

$this->_AddMapping('Tasoka_adopcionD__insertar', 'Tasoka_adopcionD');
$this->_AddForward('Tasoka_adopcionD__insertar', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');
$this->_AddForward('Tasoka_adopcionD__insertar', 'gvHidraError', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');

$this->_AddMapping('Tasoka_adopcionD__modificar', 'Tasoka_adopcionD');
$this->_AddForward('Tasoka_adopcionD__modificar', 'gvHidraSuccess', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');
$this->_AddForward('Tasoka_adopcionD__modificar', 'gvHidraError', 'index.php?view=views/Adopciones/p_Tasoka_adopcionM.php&panel=listar');
			

			$this->_AddMapping('Tasoka_saludM__operarBD', 'Tasoka_saludM');
			$this->_AddForward('Tasoka_saludM__operarBD', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');
			$this->_AddForward('Tasoka_saludM__operarBD', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php');
			$this->_AddForward('Tasoka_saludM__operarBD', 'gvHidraNoData', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=buscar');

			$this->_AddMapping('Tasoka_saludM__iniciarVentana', 'Tasoka_saludM');
			$this->_AddForward('Tasoka_saludM__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=buscar');
			$this->_AddForward('Tasoka_saludM__iniciarVentana', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=buscar');

			$this->_AddMapping('Tasoka_saludM__buscar', 'Tasoka_saludM');
			$this->_AddForward('Tasoka_saludM__buscar', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');
			$this->_AddForward('Tasoka_saludM__buscar', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');
			$this->_AddForward('Tasoka_saludM__buscar', 'gvHidraNoData', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');

			$this->_AddMapping('Tasoka_saludM__cancelarTodo', 'Tasoka_saludM');
			$this->_AddForward('Tasoka_saludM__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php');

			$this->_AddMapping('Tasoka_saludM__recargar', 'Tasoka_saludM');
			$this->_AddForward('Tasoka_saludM__recargar', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');
			$this->_AddForward('Tasoka_saludM__recargar', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');/*Tasoka_salud_analiticaD*/

			$this->_AddMapping('Tasoka_salud_analiticaD__operarBD', 'Tasoka_salud_analiticaD');
            $this->_AddForward('Tasoka_salud_analiticaD__operarBD', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=editar');
            $this->_AddForward('Tasoka_salud_analiticaD__operarBD', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php');
            $this->_AddForward('Tasoka_salud_analiticaD__operarBD', 'gvHidraNoData', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=buscar');

            
		    $this->_AddMapping('Tasoka_salud_analiticaD__verInformeAnalisis', 'Tasoka_salud_analiticaD');
            $this->_AddForward('Tasoka_salud_analiticaD__verInformeAnalisis', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=editar'); 
            $this->_AddForward('Tasoka_salud_analiticaD__verInformeAnalisis', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=editar');
                       
            $this->_AddMapping('Tasoka_salud_analiticaD__borrarInformeAnalisis', 'Tasoka_salud_analiticaD');
            $this->_AddForward('Tasoka_salud_analiticaD__borrarInformeAnalisis', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=editar'); 
            $this->_AddForward('Tasoka_salud_analiticaD__borrarInformeAnalisis', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=editar');
			/*Tasoka_salud_vacunaD*/

            $this->_AddMapping('Tasoka_salud_vacunaD__operarBD', 'Tasoka_salud_vacunaD');
            $this->_AddForward('Tasoka_salud_vacunaD__operarBD', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');
            $this->_AddForward('Tasoka_salud_vacunaD__operarBD', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php');
            $this->_AddForward('Tasoka_salud_vacunaD__operarBD', 'gvHidraNoData', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');/*Tasoka_salud_desaparasitacionD*/
            $this->_AddMapping('Tasoka_salud_desaparasitacionD__operarBD', 'Tasoka_salud_desaparasitacionD');
            $this->_AddForward('Tasoka_salud_desaparasitacionD__operarBD', 'gvHidraSuccess', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');
            $this->_AddForward('Tasoka_salud_desaparasitacionD__operarBD', 'gvHidraError', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php');
            $this->_AddForward('Tasoka_salud_desaparasitacionD__operarBD', 'gvHidraNoData', 'index.php?view=views/Historial Salud/p_Tasoka_saludM.php&panel=listar');
			
			/*Tasoka_animales*/
			$this->_AddMapping('Tasoka_animales__iniciarVentana', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=buscar');
			$this->_AddForward('Tasoka_animales__iniciarVentana', 'gvHidraError', 'index.php?view=views/Asoketes/p_Tasoka_animales.php');

			$this->_AddMapping('Tasoka_animales__buscar', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__buscar', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=listar');
			$this->_AddForward('Tasoka_animales__buscar', 'gvHidraError', 'index.php?view=views/Asoketes/p_Tasoka_animales.php');
			$this->_AddForward('Tasoka_animales__buscar', 'gvHidraNoData', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=listar');
			
			$this->_AddMapping('Tasoka_animales__borrar', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__borrar', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=listar');
			$this->_AddForward('Tasoka_animales__borrar', 'gvHidraError', 'index.php?view=views/Asoketes/p_Tasoka_animales.php');
			$this->_AddForward('Tasoka_animales__borrar', 'gvHidraNoData', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=buscar');
			
			$this->_AddMapping('Tasoka_animales__cancelarTodo', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php');
			
			$this->_AddMapping('Tasoka_animales__cancelarEdicion', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=listar');
			
			$this->_AddMapping('Tasoka_animales__editar', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__editar', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=editar');
			$this->_AddForward('Tasoka_animales__editar', 'gvHidraError', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=listar');
			
			$this->_AddMapping('Tasoka_animales__nuevo', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__nuevo', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=editar');
			
			$this->_AddMapping('Tasoka_animales__insertar', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__insertar', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=editar');
			$this->_AddForward('Tasoka_animales__insertar', 'gvHidraError', 'index.php?view=views/Asoketes/p_Tasoka_animales.php');
			
			$this->_AddMapping('Tasoka_animales__modificar', 'Tasoka_animales');
			$this->_AddForward('Tasoka_animales__modificar', 'gvHidraSuccess', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=listar');
			$this->_AddForward('Tasoka_animales__modificar', 'gvHidraError', 'index.php?view=views/Asoketes/p_Tasoka_animales.php&panel=listar');
		
		//Administracion de usuario
		    $this->_AddMapping('Tasoka_AdminUsers__iniciarVentana', 'Tasoka_AdminUsers');
            $this->_AddForward('Tasoka_AdminUsers__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php');
        $this->_AddForward('Tasoka_AdminUsers__iniciarVentana', 'gvHidraError', 'index.php?view=igep/views/aplicacion.php');                                                                           
       
        $this->_AddMapping('Tasoka_AdminUsers__buscar', 'Tasoka_AdminUsers');
        $this->_AddForward('Tasoka_AdminUsers__buscar', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=listar');
        $this->_AddForward('Tasoka_AdminUsers__buscar', 'gvHidraError', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=buscar');
        
        $this->_AddMapping('Tasoka_AdminUsers__operarBD', 'Tasoka_AdminUsers');
        $this->_AddForward('Tasoka_AdminUsers__operarBD', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=listar');
        $this->_AddForward('Tasoka_AdminUsers__operarBD', 'gvHidraError', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=buscar');
        
        $this->_AddMapping('Tasoka_AdminUsers__editar', 'Tasoka_AdminUsers');
        $this->_AddForward('Tasoka_AdminUsers__editar', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=editar');
        $this->_AddForward('Tasoka_AdminUsers__editar', 'gvHidraError', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=listar');
        
        $this->_AddMapping('Tasoka_AdminUsers__cancelarEdicion', 'Tasoka_AdminUsers');
        $this->_AddForward('Tasoka_AdminUsers__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=listar');
       	
        $this->_AddMapping('Tasoka_AdminUsers__nuevo', 'Tasoka_AdminUsers');
        $this->_AddForward('Tasoka_AdminUsers__nuevo', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=editar');				
        
        $this->_AddMapping('Tasoka_AdminUsers__insertar', 'Tasoka_AdminUsers');
        $this->_AddForward('Tasoka_AdminUsers__insertar', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_AdminUsers.php&panel=listar');
       
        
        
        $this->_AddMapping('Tasoka_CambioClave__iniciarVentana', 'Tasoka_CambioClave');
        $this->_AddForward('Tasoka_CambioClave__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_CambioClave.php&panel=editar');
        $this->_AddForward('Tasoka_CambioClave__iniciarVentana', 'gvHidraError', 'index.php?view=igep/views/aplicacion.php');                                                                           
       
        $this->_AddMapping('Tasoka_CambioClave__cancelar', 'Tasoka_CambioClave');
        $this->_AddForward('Tasoka_CambioClave__cancelar', 'gvHidraSuccess', 'index.php?view=igep/views/aplicacion.php');
       	
        $this->_AddMapping('Tasoka_CambioClave__guardar', 'Tasoka_CambioClave');
        $this->_AddForward('Tasoka_CambioClave__guardar', 'gvHidraSuccess', 'index.php?view=igep/views/aplicacion.php');
        $this->_AddForward('Tasoka_CambioClave__guardar', 'gvHidraError', 'index.php?view=views/Administracion/Tasoka_CambioClave.php&panel=editar');
       	
        $this->_AddMapping('Tasoka_CambioClave__editar', 'Tasoka_CambioClave');
        $this->_AddForward('Tasoka_CambioClave__editar', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_CambioClave.php&panel=editar');
        
        $this->_AddMapping('Tasoka_CambioClave__buscar', 'Tasoka_CambioClave');
		$this->_AddForward('Tasoka_CambioClave__buscar', 'gvHidraSuccess', 'index.php?view=views/Administracion/Tasoka_CambioClave.php&panel=listar');
		$this->_AddForward('Tasoka_CambioClave__buscar', 'gvHidraError', 'index.php?view=views/Administracion/Tasoka_CambioClave.php');
		$this->_AddForward('Tasoka_CambioClave__buscar', 'gvHidraNoData', 'index.php?view=views/Administracion/Tasoka_CambioClave.php&panel=listar');
      
		
		
		

			/*Tasoka_analitica*/
	   	    $this->_AddMapping('Tasoka_salud_analitica2D__operarBD', 'Tasoka_salud_analitica2D');
            $this->_AddForward('Tasoka_salud_analitica2D__operarBD', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
            $this->_AddForward('Tasoka_salud_analitica2D__operarBD', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');
            $this->_AddForward('Tasoka_salud_analitica2D__operarBD', 'gvHidraNoData', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=buscar');

            
		    $this->_AddMapping('Tasoka_salud_analitica2D__verInformeAnalisis', 'Tasoka_salud_analitica2D');
            $this->_AddForward('Tasoka_salud_analitica2D__verInformeAnalisis', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar'); 
            $this->_AddForward('Tasoka_salud_analitica2D__verInformeAnalisis', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
                       
            $this->_AddMapping('Tasoka_salud_analitica2D__borrarInformeAnalisis', 'Tasoka_salud_analitica2D');
            $this->_AddForward('Tasoka_salud_analitica2D__borrarInformeAnalisis', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar'); 
            $this->_AddForward('Tasoka_salud_analitica2D__borrarInformeAnalisis', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');


            /*Tasoka_biopsia*/
            $this->_AddMapping('Tasoka_salud_biopsia2D__operarBD', 'Tasoka_salud_biopsia2D');
            $this->_AddForward('Tasoka_salud_biopsia2D__operarBD', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
            $this->_AddForward('Tasoka_salud_biopsia2D__operarBD', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');
            $this->_AddForward('Tasoka_salud_biopsia2D__operarBD', 'gvHidraNoData', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=buscar');
            
            
            $this->_AddMapping('Tasoka_salud_biopsia2D__verInformeAnalisis', 'Tasoka_salud_biopsia2D');
            $this->_AddForward('Tasoka_salud_biopsia2D__verInformeAnalisis', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
            $this->_AddForward('Tasoka_salud_biopsia2D__verInformeAnalisis', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
             
            $this->_AddMapping('Tasoka_salud_biopsia2D__borrarInformeAnalisis', 'Tasoka_salud_biopsia2D');
            $this->_AddForward('Tasoka_salud_biopsia2D__borrarInformeAnalisis', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
            $this->_AddForward('Tasoka_salud_biopsia2D__borrarInformeAnalisis', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
            
            
            /*Tasoka_salud_vacunaD*/

            $this->_AddMapping('Tasoka_salud_vacuna2D__operarBD', 'Tasoka_salud_vacuna2D');
            $this->_AddForward('Tasoka_salud_vacuna2D__operarBD', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            $this->_AddForward('Tasoka_salud_vacuna2D__operarBD', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');
            $this->_AddForward('Tasoka_salud_vacuna2D__operarBD', 'gvHidraNoData', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            
            /*Tasoka_salud_desaparasitacionD*/
            
            $this->_AddMapping('Tasoka_salud_desaparasitacion2D__operarBD', 'Tasoka_salud_desaparasitacion2D');
            $this->_AddForward('Tasoka_salud_desaparasitacion2D__operarBD', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            $this->_AddForward('Tasoka_salud_desaparasitacion2D__operarBD', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');
            $this->_AddForward('Tasoka_salud_desaparasitacion2D__operarBD', 'gvHidraNoData', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');

            
            $this->_AddMapping('Tasoka_adopcion2D__nuevo', 'Tasoka_adopcion2D');
            $this->_AddForward('Tasoka_adopcion2D__nuevo', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');

            $this->_AddMapping('Tasoka_adopcion2D__borrar', 'Tasoka_adopcion2D');
            $this->_AddForward('Tasoka_adopcion2D__borrar', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            $this->_AddForward('Tasoka_adopcion2D__borrar', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');

            $this->_AddMapping('Tasoka_adopcion2D__cancelarEdicion', 'Tasoka_adopcion2D');
            $this->_AddForward('Tasoka_adopcion2D__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');

            $this->_AddMapping('Tasoka_adopcion2D__editar', 'Tasoka_adopcion2D');
            $this->_AddForward('Tasoka_adopcion2D__editar', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
            $this->_AddForward('Tasoka_adopcion2D__editar', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');

            $this->_AddMapping('Tasoka_adopcion2D__insertar', 'Tasoka_adopcion2D');
            $this->_AddForward('Tasoka_adopcion2D__insertar', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            $this->_AddForward('Tasoka_adopcion2D__insertar', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');

            $this->_AddMapping('Tasoka_adopcion2D__modificar', 'Tasoka_adopcion2D');
            $this->_AddForward('Tasoka_adopcion2D__modificar', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            $this->_AddForward('Tasoka_adopcion2D__modificar', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            	

			/*Tasoka_animales2*/
			
			$this->_AddMapping('Tasoka_animales2__operarBD', 'Tasoka_animales2');
			$this->_AddForward('Tasoka_animales2__operarBD', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
			$this->_AddForward('Tasoka_animales2__operarBD', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');
			$this->_AddForward('Tasoka_animales2__operarBD', 'gvHidraNoData', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=buscar');

			$this->_AddMapping('Tasoka_animales2__iniciarVentana', 'Tasoka_animales2');
			$this->_AddForward('Tasoka_animales2__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=buscar');
			$this->_AddForward('Tasoka_animales2__iniciarVentana', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=buscar');

			$this->_AddMapping('Tasoka_animales2__buscar', 'Tasoka_animales2');
			$this->_AddForward('Tasoka_animales2__buscar', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
			$this->_AddForward('Tasoka_animales2__buscar', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
			//$this->_AddForward('Tasoka_animales2__buscar', 'gvHidraNoData', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');

			$this->_AddMapping('Tasoka_animales2__cancelarTodo', 'Tasoka_animales2');
			$this->_AddForward('Tasoka_animales2__cancelarTodo', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');

			$this->_AddMapping('Tasoka_animales2__recargar', 'Tasoka_animales2');
			$this->_AddForward('Tasoka_animales2__recargar', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
			$this->_AddForward('Tasoka_animales2__recargar', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
			
            
		    $this->_AddMapping('Tasoka_animales2__nuevo', 'Tasoka_animales2');
			$this->_AddForward('Tasoka_animales2__nuevo', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=editar');
			
		    
		    $this->_AddMapping('Tasoka_animales2__cancelarEdicion', 'Tasoka_animales2');
			$this->_AddForward('Tasoka_animales2__cancelarEdicion', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
		
			
		
            $this->_AddMapping('Tasoka_animales2__insertar', 'Tasoka_animales2');
            $this->_AddForward('Tasoka_animales2__insertar', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');
            $this->_AddForward('Tasoka_animales2__insertar', 'gvHidraError', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php&panel=listar');

			$this->_AddMapping('Tasoka_animales2__MuestraGaleria', 'Tasoka_animales2');
        $this->_AddForward('Tasoka_animales2__MuestraGaleria', 'gvHidraSuccess', 'include/PhotoShow');
        $this->_AddForward('Tasoka_animales2__MuestraGaleria', 'gvHidraError', 'index.php?view=igep/views/principal.php');
            
        $this->_AddMapping('Tasoka_animales2__FichaODT', 'Tasoka_animales2');
        $this->_AddForward('Tasoka_animales2__FichaODT', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');
        $this->_AddForward('Tasoka_animales2__FichaODT', 'mostrarListado', 'index.php?view=views/listados/l_Tasoka_listadoFicha.php');
        
        $this->_AddForward('Tasoka_animales2__FichaODT', 'gvHidraError', 'index.php?view=igep/views/Asoketes2/p_Tasoka_animales2.php');
        
        $this->_AddMapping('Tasoka_animales2__FichaPDF', 'Tasoka_animales2');
        $this->_AddForward('Tasoka_animales2__FichaPDF', 'gvHidraSuccess', 'index.php?view=views/Asoketes2/p_Tasoka_animales2.php');
        $this->_AddForward('Tasoka_animales2__FichaPDF', 'mostrarListado', 'index.php?view=views/listados/l_Tasoka_listadoFicha.php');
        
        $this->_AddForward('Tasoka_animales2__FichaPDF', 'gvHidraError', 'index.php?view=igep/views/Asoketes2/p_Tasoka_animales2.php');
        
        ///LISTADOS
        
          
            $this->_AddMapping('Tasoka_listadoGeneral__iniciarVentana', 'Tasoka_listadoGeneral');
            $this->_AddForward('Tasoka_listadoGeneral__iniciarVentana', 'gvHidraSuccess', 'index.php?view=views/listados/p_Tasoka_listadoGeneral.php&panel=buscar');
            $this->_AddForward('Tasoka_listadoGeneral__iniciarVentana', 'gvHidraError', 'index.php?view=views/listados/p_Tasoka_listadoGeneral.php');
            
            $this->_AddMapping('Tasoka_listadoGeneral__abrirListado', 'Tasoka_listadoGeneral');
            $this->_AddForward('Tasoka_listadoGeneral__abrirListado', 'gvHidraSuccess', 'index.php?view=views/listados/p_Tasoka_listadoGeneral.php');
            $this->_AddForward('Tasoka_listadoGeneral__abrirListado', 'gvHidraError', 'index.php?view=views/listados/p_Tasoka_listadoGeneral.php');          
        
		
			}}?>