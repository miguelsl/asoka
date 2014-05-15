{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado="$estado_fil" claseManejadora="Tasoka_especie"}
		{CWBarraSupPanel titulo="Mantenimiento de Especies"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar Tasoka_especie" funcion="insertar" actuaSobre="ficha" action="Tasoka_especie__nuevo"}
		{/if}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
					
					<tr>
						<td>{CWCampoTexto textoAsociado="Nombre especie" nombre="fil_nombre_especie" size="20" editable="true" visible="true" value=$defaultData_Tasoka_especie.fil_nombre_especie dataType=$dataType_Tasoka_especie.fil_nombre_especie}</td>
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
	{CWPanel id="lis" tipoComprobacion="envio" action="operarBD" method="post" estado="$estado_lis" claseManejadora="Tasoka_especie"}
		{CWBarraSupPanel titulo="Listado de Especies"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar Tasoka_especie" funcion="insertar" actuaSobre="tabla"  action="Tasoka_especie__nuevo"}
			{CWBotonTooltip imagen="02" titulo="Modificar Tasoka_especie" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar Tasoka_especie" funcion="eliminar" actuaSobre="tabla"}
		{/if}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheck="true" conCheckTodos="true" id="Tabla1" numFilasPantalla="10" datos=$smty_datosTabla}
				{CWFila tipoListado="false"}
					
					{CWCampoTexto textoAsociado="Nombre especie" nombre="lis_nombre_especie" size="20" editable="true" visible="true" value=$defaultData_Tasoka_especie.lis_nombre_especie dataType=$dataType_Tasoka_especie.lis_nombre_especie}
					{CWCampoTexto textoAsociado="Id" nombre="lis_id" size="1" editable="false" oculto="true" value=$defaultData_Tasoka_especie.lis_id dataType=$dataType_Tasoka_especie.lis_id}
				{/CWFila}				
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}			
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
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