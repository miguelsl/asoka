{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado="$estado_fil" claseManejadora="Tasoka_bacteria"}
		{CWBarraSupPanel titulo="Mantenimiento de Pat&oacute;genos"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar Bacteria" funcion="insertar" actuaSobre="ficha" action="Tasoka_bacteria__nuevo"}
		{/if}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
					
					<tr>
						<td>{CWLista textoAsociado="Especie" nombre="fil_tipo_animal" size="1" editable="true" visible="true" value=$defaultData_Tasoka_bacteria.fil_tipo_animal dataType=$dataType_Tasoka_bacteria.fil_tipo_animal}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Nombre" nombre="fil_nombre" size="50" editable="true" visible="true" value=$defaultData_Tasoka_bacteria.fil_nombre dataType=$dataType_Tasoka_bacteria.fil_nombre}</td>
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
	{CWPanel id="lis" tipoComprobacion="envio" action="operarBD" method="post" estado="$estado_lis" claseManejadora="Tasoka_bacteria"}
		{CWBarraSupPanel titulo="Listado de Pat&oacute;genos"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar Tasoka_bacteria" funcion="insertar" actuaSobre="tabla"  action="Tasoka_bacteria__nuevo"}
			{CWBotonTooltip imagen="02" titulo="Modificar Tasoka_bacteria" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar Tasoka_bacteria" funcion="eliminar" actuaSobre="tabla"}
		{/if}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheck="true" conCheckTodos="true" id="Tabla1" numFilasPantalla="10" datos=$smty_datosTabla}
				{CWFila tipoListado="false"}
					{CWCampoTexto textoAsociado="Id" nombre="lis_id" size="1" editable="false" oculto="true" value=$defaultData_Tasoka_bacteria.lis_id dataType=$dataType_Tasoka_bacteria.lis_id}
					{CWLista textoAsociado="Especie" nombre="lis_tipo_animal" size="1" editable="true" visible="true" value=$defaultData_Tasoka_bacteria.lis_tipo_animal dataType=$dataType_Tasoka_bacteria.lis_tipo_animal}
					{CWCampoTexto textoAsociado="Nombre" obligatorio="true" nombre="lis_nombre" size="50" editable="true" visible="true" value=$defaultData_Tasoka_bacteria.lis_nombre dataType=$dataType_Tasoka_bacteria.lis_nombre}
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

<!-- ****************** PESTANYAS ************************-->
	{CWContenedorPestanyas}
		{CWPestanya tipo="fil" estado=$estado_fil}		
		{CWPestanya tipo="lis" estado=$estado_lis}
	{/CWContenedorPestanyas}
{/CWMarcoPanel}
{/CWVentana}