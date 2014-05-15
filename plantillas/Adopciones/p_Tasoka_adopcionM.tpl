{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve=$smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}	
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!-- ********************************************** MAESTRO **********************************************-->
	<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado=$estado_fil claseManejadora="Tasoka_adopcionM"}
		{CWBarraSupPanel titulo="Mantenimiento de adopciones"}
			{*CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha" action="Tasoka_adopcionM__nuevo"*}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="restaurar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">	
					<tr>
					 	<td>			 	
					 	{CWLista textoAsociado="Especie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" actualizaA="fil_raza" nombre="fil_tipo_animal" size="1" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_tipo_animal dataType=$dataType_Tasoka_adopcionM.fil_tipo_animal}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Raza&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_raza" size="20" longitudMaxmina="50" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_raza dataType=$dataType_Tasoka_adopcionM.fil_raza}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_nombre" size="20" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_nombre dataType=$dataType_Tasoka_adopcionM.fil_nombre}</td>
					</tr>
					<tr>
					 	<td>{CWLista textoAsociado="Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_sexo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_sexo dataType=$dataType_Tasoka_adopcionM.fil_sexo}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Color&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_color" size="20" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_color dataType=$dataType_Tasoka_adopcionM.fil_color}</td>
					</tr>
					
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Fecha nacimiento" nombre="fil_fecha_nacimiento" size="12" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_fecha_nacimiento dataType=$dataType_Tasoka_adopcionM.fil_fecha_nacimiento}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Fecha entrada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_fecha_entrada" size="12" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_fecha_entrada dataType=$dataType_Tasoka_adopcionM.fil_fecha_entrada}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Procedencia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_procedencia" size="20" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_procedencia dataType=$dataType_Tasoka_adopcionM.fil_procedencia}</td>
					</tr>
					<tr><td>
					 	{CWLista textoAsociado="Chip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_chip" size="1" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_chip dataType=$dataType_Tasoka_adopcionM.fil_chip}
					</td>
					</tr>
					<tr>
					<td>
					 	{CWLista textoAsociado="Pasaporte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_pasaporte" size="1" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_pasaporte dataType=$dataType_Tasoka_adopcionM.fil_pasaporte}
						</td>
					</tr>
					<tr>
					<td>
					 	{CWLista textoAsociado="Castrado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_castrado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_castrado dataType=$dataType_Tasoka_adopcionM.fil_castrado}
							</td>
					</tr>
					<tr>
					<td>
					{CWLista textoAsociado="Web&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_web" size="1" editable="true" visible="true" value=$defaultData_Tasoka_adopcionM.fil_web dataType=$dataType_Tasoka_adopcionM.fil_web}
					 	
					</td>
					</tr>
					
				</table>
				<br/>
			{/CWFicha}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="50" texto="Buscar" class="button" accion="buscar"}
		{/CWBarraInfPanel}						
	{/CWPanel}
	
	<!--*********** PANEL edi ******************-->	
	{CWPanel id="edi" esMaestro="true" itemSeleccionado=$smty_filaSeleccionada action="operarBD" method="post" estado=$estado_edi claseManejadora="Tasoka_adopcionM" accion=$smty_operacionFichaTasoka_adopcionM}
		{CWBarraSupPanel titulo="Mantenimiento de adopciones"}
			{*CWBotonTooltip imagen="01" titulo="Insertar registro" funcion="insertar" actuaSobre="ficha" action="Tasoka_adopcionM__nuevo"*}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="02" titulo="Modificar registro" funcion="modificar" actuaSobre="ficha"}
		{/if}	
			{*CWBotonTooltip imagen="03" titulo="Eliminar registro" funcion="eliminar" actuaSobre="ficha"*}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="limpiar" actuaSobre="ficha"}	
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFichaEdicion id="FichaEdicion" datos=$smty_datosFichaM numPagInsertar="1"}	
				{CWFicha}
					<table class="text" cellspacing="4" cellpadding="4" border="0">
						
						<tr>
							<td>
							<div align="right">
							{CWCampoTexto textoAsociado="Id" oculto="true" nombre="id" size="4" editable="false" value=$defaultData_Tasoka_adopcionM.edi_id  dataType=$dataType_Tasoka_adopcionM.id}
	
							{CWCheckBox textoAsociado="Web" nombre="edi_web" size="1" editable="true" value=$defaultData_Tasoka_adopcionM.edi_web  dataType=$dataType_Tasoka_adopcionM.edi_web}
							</div>
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
							<legend align='left' style="font-weight:bold;">Descripción: </legend>
							{CWLista textoAsociado="Especie&nbsp;"  nombre="edi_tipo_animal" size="1" editable="true" value=$defaultData_Tasoka_adopcionM.edi_tipo_animal  dataType=$dataType_Tasoka_adopcionM.edi_tipo_animal}
						&nbsp;&nbsp;
						{CWCampoTexto textoAsociado="Raza" nombre="edi_raza" size="20" longitudMaxmina="50" editable="true" value=$defaultData_Tasoka_adopcionM.edi_raza  dataType=$dataType_Tasoka_adopcionM.edi_raza}
						&nbsp;&nbsp;
						{CWCampoTexto textoAsociado="Color" nombre="edi_color" size="20" editable="true" value=$defaultData_Tasoka_adopcionM.edi_color  dataType=$dataType_Tasoka_adopcionM.edi_color}
						<br/><br/>
						{CWLista textoAsociado="Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_sexo" size="6" editable="true" value=$defaultData_Tasoka_adopcionM.edi_sexo  dataType=$dataType_Tasoka_adopcionM.edi_sexo}
						<br/><br/>
						{CWCampoTexto textoAsociado="Nombre" nombre="edi_nombre" size="20" longitudMaxmina="50" editable="nuevo" value=$defaultData_Tasoka_adopcionM.edi_nombre  dataType=$dataType_Tasoka_adopcionM.edi_nombre}
						
						</fieldset>
						</td>
						<td valign="top" rowspan="4">&nbsp;{CWImagen nombre="foto" width="100" height="100" src="igep/custom/asoka/images/menu/Pets-32.png" bumpbox="true"  rutaAbs="no"}
						</td>
						</tr>
						<tr><td>
						<fieldset  style="border-style:doted;  border-bottom-width: thin; border-color:silver;">
<legend align='left' style="font-weight:bold;">Dimensiones</legend>

							{CWCampoTexto textoAsociado="Alto&nbsp;&nbsp;" nombre="edi_alto" size="4" editable="true" value=$defaultData_Tasoka_adopcionM.edi_alto  dataType=$dataType_Tasoka_adopcionM.edi_alto}
						cm. &nbsp;x&nbsp{CWCampoTexto textoAsociado="Largo" nombre="edi_largo" size="4" editable="true" value=$defaultData_Tasoka_adopcionM.edi_largo  dataType=$dataType_Tasoka_adopcionM.edi_largo}
						cm.<br/><br/>{CWCampoTexto textoAsociado="Peso" nombre="edi_peso" size="4" editable="true" value=$defaultData_Tasoka_adopcionM.edi_peso  dataType=$dataType_Tasoka_adopcionM.edi_peso}&nbsp;kg.
						</fieldset>
						</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Fecha nacimiento" nombre="edi_fecha_nacimiento" size="12" editable="true" value=$defaultData_Tasoka_adopcionM.edi_fecha_nacimiento  dataType=$dataType_Tasoka_adopcionM.edi_fecha_nacimiento}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Fecha entrada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_fecha_entrada" size="12" editable="true" value=$defaultData_Tasoka_adopcionM.edi_fecha_entrada  dataType=$dataType_Tasoka_adopcionM.edi_fecha_entrada}
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Procedencia" nombre="edi_procedencia" size="30" longitudMaxima="100" editable="true" value=$defaultData_Tasoka_adopcionM.edi_procedencia  dataType=$dataType_Tasoka_adopcionM.edi_procedencia}</td>
						</tr>
						<tr>
							<td>
							{CWCheckBox textoAsociado="Chip" nombre="edi_chip" size="1" editable="true" value=$defaultData_Tasoka_adopcionM.edi_chip  dataType=$dataType_Tasoka_adopcionM.edi_chip}
							&nbsp;&nbsp;{CWCheckBox textoAsociado="Pasaporte" nombre="edi_pasaporte" size="1" editable="true" value=$defaultData_Tasoka_adopcionM.edi_pasaporte  dataType=$dataType_Tasoka_adopcionM.edi_pasaporte}
							
						   &nbsp;&nbsp; {CWCheckBox textoAsociado="Castrado/Esterilizado" nombre="edi_castrado" size="1" editable="true" value=$defaultData_Tasoka_adopcionM.edi_castrado  dataType=$dataType_Tasoka_adopcionM.edi_castrado}
						    </td>
						</tr>
						
					</table>
					<br/>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}
		{/CWContenedor}
		{CWBarraInfPanel}
		{if $smty_acceso eq "total" }
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
		{/if}	
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}
	
	<!-- ****************** PESTAÑAS MAESTRO ************************-->
	{CWContenedorPestanyas id="Maestro"}				
		{CWPestanya tipo="fil" panelAsociado="fil" estado=$estado_fil ocultar="Detalle"}
		{CWPestanya tipo="edi" panelAsociado="edi" estado=$estado_edi mostrar="Detalle"}
	{/CWContenedorPestanyas}
</td></tr>
<tr><td>
	<!-- ****************** PANEL DETALLE ***********************-->
	{if count($smty_datosFichaM ) gt 0 }
	{CWPanel id="lisDetalle" action="borrar" method="post" detalleDe="edi" estado="$estado_lisDetalle" claseManejadora="Tasoka_adopcionD"}
		{CWBarraSupPanel titulo="Listado adopciones"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha"  action="Tasoka_adopcionD__nuevo"}
		{/if}	
			{CWBotonTooltip imagen="02" titulo="Editar registros" funcion="modificar" actuaSobre="ficha" action="Tasoka_adopcionD__editar"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
		{/if}				
		{/CWBarraSupPanel}			
		{CWContenedor}
			{CWTabla conCheckTodos="true" conCheck="true" id="TablaDetalle" numFilasPantalla="6" datos=$smty_datosTablaD}
				{CWFila tipoListado="false"}				
					{CWCampoTexto textoAsociado="Id adopcion" oculto="true" nombre="lis_id_adopcion" size="1" editable="true" value=$defaultData_Tasoka_adopcionD.lis_id_adopcion dataType=$dataType_Tasoka_adopcionD.lis_id_adopcion}
					{CWCampoTexto textoAsociado="Id animal" oculto="true" nombre="id_animal" size="4" editable="true" value=$defaultData_Tasoka_adopcionD.id_animal dataType=$dataType_Tasoka_adopcionD.id_animal}
					{CWCheckBox textoAsociado="Reservado" nombre="lis_reservado" size="1" editable="true" value=$defaultData_Tasoka_adopcionD.lis_reservado dataType=$dataType_Tasoka_adopcionD.lis_reservado}
					{CWCampoTexto textoAsociado="Contacto" nombre="lis_contacto" size="50" editable="true" value=$defaultData_Tasoka_adopcionD.lis_contacto dataType=$dataType_Tasoka_adopcionD.lis_contacto}
					{CWCampoTexto textoAsociado="Pais destino" nombre="lis_pais_destino" size="20" editable="true" value=$defaultData_Tasoka_adopcionD.lis_pais_destino dataType=$dataType_Tasoka_adopcionD.lis_pais_destino}
					{CWCampoTexto textoAsociado="Fecha salida" nombre="lis_fecha_salida" size="12" editable="true" value=$defaultData_Tasoka_adopcionD.lis_fecha_salida dataType=$dataType_Tasoka_adopcionD.lis_fecha_salida}
					{CWCheckBox textoAsociado="Adoptado" nombre="lis_adoptado" size="1" editable="true" value=$defaultData_Tasoka_adopcionD.lis_adoptado dataType=$dataType_Tasoka_adopcionD.lis_adoptado}
					{CWCampoTexto textoAsociado="Fecha adopcion" nombre="lis_fecha_adopcion" size="12" editable="true" value=$defaultData_Tasoka_adopcionD.lis_fecha_adopcion dataType=$dataType_Tasoka_adopcionD.lis_fecha_adopcion}
					{CWCheckBox textoAsociado="Devuelto" nombre="lis_devuelto" size="1" editable="true" value=$defaultData_Tasoka_adopcionD.lis_devuelto dataType=$dataType_Tasoka_adopcionD.lis_devuelto}
					{CWCampoTexto textoAsociado="Fecha devolucion" nombre="lis_fecha_devolucion" size="12" editable="true" value=$defaultData_Tasoka_adopcionD.lis_fecha_devolucion dataType=$dataType_Tasoka_adopcionD.lis_fecha_devolucion}
					
				{/CWFila}				
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}			
		{/CWContenedor}
		{CWBarraInfPanel}
		{if $smty_acceso eq "total" }
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}&nbsp;&nbsp;
		{/if}	
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}	
																													
	{CWPanel id="ediDetalle" tipoComprobacion="envio" action="$smty_operacionTasoka_adopcionD" method="post" detalleDe="edi" estado="$estado_ediDetalle" claseManejadora="Tasoka_adopcionD" accion=$smty_operacionFichaTasoka_adopcionD}
		{CWBarraSupPanel titulo="Mantenimiento de adopciones"}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}		
		{CWContenedor}			 		
			{CWFichaEdicion id="FichaDetalle" datos=$smty_datosFichaD}	
				{CWFicha}

					<table class="text" cellspacing="4" cellpadding="4" border="0">
	                        
	                        <tr>
	                        	<td>{CWCampoTexto textoAsociado="Id adopcion" oculto="true" nombre="edi_id_adopcion" size="1" editable="false" visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_id_adopcion}
						{CWCampoTexto textoAsociado="Id animal" oculto="true" nombre="id_animal" size="4" editable="false" visible="true" value=$defaultData_Tasoka_adopcionD.id_animal}
	                        	
	                        	<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
								<legend align='left' style="font-weight:bold;">Reserva: </legend>
           
	                        		{CWCheckBox textoAsociado="Reservado&nbsp;&nbsp;&nbsp;" actualizaA="edi_contacto,edi_pais_destino,edi_fecha_salida"  nombre="edi_reservado" size="1" editable="true" visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_reservado}
									<br/><br/>{CWCampoTexto textoAsociado="Contacto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_contacto" size="63" longitudMaxima="100" editable=$smty_datosFichaD.$smty_iteracionActual.reserva_activa visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_contacto}
								<br/><br/>
								{CWCampoTexto textoAsociado="País destino&nbsp;" nombre="edi_pais_destino" size="30" longitudMaxima="50" editable=$smty_datosFichaD.$smty_iteracionActual.reserva_activa visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_pais_destino}
								&nbsp;&nbsp;{CWCampoTexto textoAsociado="Fecha salida" nombre="edi_fecha_salida" size="12" editable=$smty_datosFichaD.$smty_iteracionActual.reserva_activa visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_fecha_salida}
								</fieldset> 
								</td>
						</tr>
						
	                        <tr><td>
	                        <fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
								<legend align='left' style="font-weight:bold;">Adopción: </legend>
	                        	
	                        	{CWCheckBox textoAsociado="Adoptado" actualizaA="edi_fecha_adopcion" nombre="edi_adoptado" size="1" editable="true" visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_adoptado}
						&nbsp;&nbsp;
	                        	{CWCampoTexto textoAsociado="Fecha adopción&nbsp;&nbsp;&nbsp;" nombre="edi_fecha_adopcion" size="12" editable=$smty_datosFichaD.$smty_iteracionActual.adopcion_activa visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_fecha_adopcion}</td>
						</fieldset> 
						</tr>
						
	                        <tr>
	                        
	                        	<td>
	                        	<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
								<legend align='left' style="font-weight:bold;">Devolución: </legend>
	                        	{CWCheckBox editable="false" textoAsociado="Devuelto" actualizaA="edi_fecha_devolucion,edi_motivo_devolucion" nombre="edi_devuelto" size="1" editable="true" visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_devuelto}
							&nbsp;&nbsp;	{CWCampoTexto textoAsociado="Fecha devolución" nombre="edi_fecha_devolucion" size="12" editable=$smty_datosFichaD.$smty_iteracionActual.devolucion_activa visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_fecha_devolucion}
								<br/>
								{CWAreaTexto textoAsociado="Motivo devolución"  rows="4" cols="65" nombre="edi_motivo_devolucion" longitudMaxima="1000" editable=$smty_datosFichaD.$smty_iteracionActual.devolucion_activa visible="true" value="" dataType=$dataType_Tasoka_adopcionD.edi_motivo_devolucion}
								</fieldset> 
								</td>
						</tr>
					</table>
					<br/><br/>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}	
		{/CWContenedor}
		{CWBarraInfPanel}
		{if $smty_acceso eq "total" }
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
		{/if}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar" action="cancelarEdicion"}
		{/CWBarraInfPanel}
	{/CWPanel}
		
<!-- ****************** PESTAÑAS ************************-->
	{CWContenedorPestanyas  id="Detalle"}				
		{CWPestanya tipo="lis" panelAsociado="lisDetalle" estado="$estado_lisDetalle"}
		{CWPestanya tipo="edi" panelAsociado="ediDetalle" estado="$estado_ediDetalle"}
	{/CWContenedorPestanyas}
{/if}
{/CWMarcoPanel}
{/CWVentana}