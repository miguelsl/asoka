{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado="$estado_fil"  claseManejadora="Tasoka_clinicas"}
		{CWBarraSupPanel titulo="Mantenimiento de Clínicas"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar Tasoka_clinicas" funcion="insertar" actuaSobre="ficha"  action="Tasoka_clinicas__nuevo"}
		{/if}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
					

					<tr>
						<td>{CWCampoTexto textoAsociado="Nombre&nbsp&nbsp" nombre="fil_nombre" size="50" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.fil_nombre dataType=$dataType_Tasoka_clinicas.fil_nombre}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Dirección" nombre="fil_direccion" size="50" longitudMaxima=200 editable="true" visible="true" value=$defaultData_Tasoka_clinicas.fil_direccion dataType=$dataType_Tasoka_clinicas.fil_direccion}</td>
					</tr>
					
					<tr>
						<td>{CWCampoTexto textoAsociado="Contacto&nbsp" nombre="fil_contacto" size="50" longitudMaxima=200  editable="true" visible="true" value=$defaultData_Tasoka_clinicas.fil_contacto dataType=$dataType_Tasoka_clinicas.fil_contacto}</td>
					</tr>
				</table>
				<br/>
			{/CWFicha}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="50" texto="Buscar" class="button" accion="buscar"}
		{/CWBarraInfPanel}						
	{/CWPanel}

<!-- ****************** PANEL lis ***********************-->
	{CWPanel id="lis" action="borrar" method="post" estado="$estado_lis" claseManejadora="Tasoka_clinicas"}
		{CWBarraSupPanel titulo="Listado de Clínicas"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar Tasoka_clinicas" funcion="insertar" actuaSobre="ficha"  action="Tasoka_clinicas__nuevo"}
		{/if}	
			{CWBotonTooltip imagen="02" titulo="Editar Tasoka_clinicas" funcion="modificar" actuaSobre="ficha" action="Tasoka_clinicas__editar"}
		{if $smty_acceso eq "total" }	
			{CWBotonTooltip imagen="03" titulo="Eliminar Tasoka_clinicas" funcion="eliminar" actuaSobre="tabla"}
		{/if}	
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheck="true" conCheckTodos="true" id="Tabla1" numFilasPantalla="10" datos=$smty_datosTabla}
				{CWFila tipoListado="false"}
					
					{CWCampoTexto textoAsociado="Nombre" nombre="lis_nombre" size="50" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.lis_nombre dataType=$dataType_Tasoka_clinicas.lis_nombre}
					{CWCampoTexto textoAsociado="Telefono 1" nombre="lis_telefono1" size="9" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.lis_telefono1 dataType=$dataType_Tasoka_clinicas.lis_telefono1}
					{CWCampoTexto textoAsociado="Telefono 2" nombre="lis_telefono2" size="9" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.lis_telefono2 dataType=$dataType_Tasoka_clinicas.lis_telefono2}
					{CWCampoTexto textoAsociado="Contacto" nombre="lis_contacto" size=50" longitudMaxima="200" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.lis_contacto dataType=$dataType_Tasoka_clinicas.lis_contacto}
					{CWCampoTexto textoAsociado="Id" nombre="lis_id" size="1" editable="true" oculto="true" value=$defaultData_Tasoka_clinicas.lis_id dataType=$dataType_Tasoka_clinicas.lis_id}
					{*CWCampoTexto textoAsociado="Direccion" nombre="lis_direccion" size="100" longitudMaxima="200" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.lis_direccion dataType=$dataType_Tasoka_clinicas.lis_direccion*}
					{*CWCampoTexto textoAsociado="Web" nombre="lis_web" size="100" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.lis_web dataType=$dataType_Tasoka_clinicas.lis_web*}
					{*CWCampoTexto textoAsociado="Correo" nombre="lis_correo" size="100" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.lis_correo dataType=$dataType_Tasoka_clinicas.lis_correo*}
					
				{/CWFila}				
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}			
		{/CWContenedor}
		{CWBarraInfPanel}
		{if $smty_acceso eq "total" }
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
		{/if}	
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}			
		{/CWBarraInfPanel}						
	{/CWPanel}	


<!-- ****************** PANEL edi ***********************-->
	{CWPanel id="edi" tipoComprobacion="envio" action="$smty_operacionFichaTasoka_clinicas" method="post" estado="$estado_edi" claseManejadora="Tasoka_clinicas"  accion=$smty_operacionFichaTasoka_clinicas}
		{CWBarraSupPanel titulo="Mantenimiento de Clínicas"}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}				
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFichaEdicion id="FichaEdicion" datos=$smty_datosFicha} 
				{CWFicha}

					<table class="text" cellspacing="4" cellpadding="4" border="0">
						
						<tr>
							<td>{CWCampoTexto textoAsociado="Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_nombre" size="50"  longitudMaxima="50" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.edi_nombre dataType=$dataType_Tasoka_clinicas.edi_nombre}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Direcci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_direccion" size="50"  longitudMaxima="200" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.edi_direccion dataType=$dataType_Tasoka_clinicas.edi_direccion}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Web&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_web" size="50"  longitudMaxima="100" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.edi_web dataType=$dataType_Tasoka_clinicas.edi_web}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_correo" size="50"  longitudMaxima="100" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.edi_correo dataType=$dataType_Tasoka_clinicas.edi_correo}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Teléfono #1" nombre="edi_telefono1" size="9" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.edi_telefono1 dataType=$dataType_Tasoka_clinicas.edi_telefono1}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Teléfono #2" nombre="edi_telefono2" size="9" editable="true" visible="true" value=$defaultData_Tasoka_clinicas.edi_telefono2 dataType=$dataType_Tasoka_clinicas.edi_telefono2}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Contacto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_contacto" size="50" longitudMaxima="200"  editable="true" visible="true" value=$defaultData_Tasoka_clinicas.edi_contacto dataType=$dataType_Tasoka_clinicas.edi_contacto}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Id" nombre="edi_id" size="1" editable="false" visible="false" value=$defaultData_Tasoka_clinicas.edi_id dataType=$dataType_Tasoka_clinicas.edi_id}</td>
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
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar" action="cancelarEdicion"}
		{/CWBarraInfPanel}						
	{/CWPanel}	
		
<!-- ****************** PESTANYAS ************************-->
	{CWContenedorPestanyas}
		{CWPestanya tipo="fil" estado=$estado_fil}		
		{CWPestanya tipo="lis" estado=$estado_lis}
		{CWPestanya tipo="edi" estado=$estado_edi}
	{/CWContenedorPestanyas}
{/CWMarcoPanel}
{/CWVentana}