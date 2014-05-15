{CWVentana titulo="VENTANA DE SELECCIÓN" tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onUnload=$smty_unLoad}
{CWMarcoPanel conPestanyas="true"}
	{CWPanel id="vSeleccion" action="buscarVentanaSeleccion" method="post" estado="on" }
		{CWBarraSupPanel titulo="Ventana de Selección"}
			{CWBotonTooltip imagen="04" titulo="Restaurar" funcion="restaurar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
			<input type='hidden' id='actionOrigen' name='actionOrigen' value="{$smty_actionOrigen}" />
			<center>
			<br/><br/>
			<div style='display:none'> <input type='text' name='captafoco' id='captafoco' value="{$smty_actionOrigen}" /> </div>
			Valor a buscar: {CWCampoTexto nombre="campoBuscar" conVentanaModal="true" editable="true" size="13" comprobacion="true"}
			{CWBotonTooltip imagen="50" titulo="Busqueda en la Seleccion" funcion="buscarVS" actuaSobre=$smty_campoActua formActua=$smty_formActua filaActual=$smty_filaActual panelActua=$smty_panelActua claseManejadora=$smty_claseManejadora}
			<br/>
			<hr width='50%'>
			<br/>
			{/CWFicha}
			<div id="resBusqueda" style="display:block;overflow:auto;">
			{if count($smty_datosTabla) gt 0 }
			{CWTabla conCheck="true" conCheckTodos="false" noOrdenacion="true" id=$smty_panelActua numPagInsertar="0" numFilasPantalla="$stmy_numFilasPantalla" datos=$smty_datosTabla}
					{if $stmy_templateSource != ""}
						{CWFila tipoListado="false"}
						{include file=$stmy_templateSource}
						{/CWFila}
					{else}
						{CWFila tipoListado="true"}
						{/CWFila}
					{/if}					
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}
			{else}
			<script  type='text/javascript'>//<![CDATA[
				var vSeleccion_paginacion;
			//]]
			</script>
			{/if}
			<br/>
			</div>
			<br/><br/></center>
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Aceptar" class="button" accion="aceptarvs" formActua=$smty_formActua actuaSobre=$smty_matching filaActual=$smty_filaActual panelActua=$smty_panelActua}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelarvs" formActua=$smty_formActua}
		{/CWBarraInfPanel}
	{/CWPanel}
{/CWMarcoPanel}	
{/CWVentana}