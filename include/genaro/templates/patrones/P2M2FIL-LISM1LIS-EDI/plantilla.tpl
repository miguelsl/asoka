{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve=$smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}	
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!-- ********************************************** MAESTRO **********************************************-->
	<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado=$estado_fil claseManejadora="<<$classname_maestro|capitalize>>"}
		{CWBarraSupPanel titulo="<<$classname_maestro|capitalize>>"}
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha" action="<<$classname_maestro|capitalize>>__nuevo"}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="restaurar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
<<section name=fil loop=$fields_maestro>>
<<assign var='campo' value=$fields_maestro[fil]>>
<<assign var='componente' value=$customFields.$campo.componente>>
<<assign var='titVal' value=$customFields.$campo.titVal>>
<<assign var='tamVal' value=$customFields.$campo.tamVal>>
<<assign var='visibleVal' value=$customFields.$campo.visibleVal>>
					<tr>
<<if $componente eq 0 >>
					 	<td>{CWCampoTexto textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>" size="<<if $tamVal eq "" >><<$lengths_maestro[fil]|floor>><<else>><<$tamVal>><</if>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>}</td>
<<elseif $componente eq 1 >>
						<td>{CWAreaTexto textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>" rows="3" cols="<<$lengths_maestro[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>}</td>
<<elseif $componente eq 2 >>
					    <td>{CWCheckBox textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>" size="<<$lengths_maestro[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>}</td>
<<elseif $componente eq 3 >>
					 	<td>{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>" size="<<$lengths_maestro[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>}</td>
<<else>>
						<td>{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>" size="<<$lengths_maestro[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[fil] eq "true">><<$fields_maestro[fil]>><<else>>fil_<<$fields_maestro[fil]>><</if>>}</td>
<</if>>
					</tr>
<</section>>
				</table>
				<br/>
			{/CWFicha}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="50" texto="Buscar" class="button" accion="buscar"}
		{/CWBarraInfPanel}						
	{/CWPanel}
	
	<!--*********** PANEL lis ******************-->	
	{CWPanel id="lis" tipoComprobacion="envio" esMaestro="true" itemSeleccionado=$smty_filaSeleccionada action="operarBD" method="post" estado=$estado_lis claseManejadora="<<$classname_maestro|capitalize>>"}
		{CWBarraSupPanel titulo="<<$classname_maestro|capitalize>>"}
			{CWBotonTooltip imagen="01" titulo="Insertar registro" funcion="insertar" actuaSobre="tabla" action="<<$classname_maestro|capitalize>>__nuevo"}
			{CWBotonTooltip imagen="02" titulo="Modificar registro" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registro" funcion="eliminar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="limpiar" actuaSobre="tabla"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheck="true" conCheckTodos="false" id="Tabla1" numFilasPantalla="6" datos=$smty_datosTablaM}
				{CWFila tipoListado="false"}
<<section name=lis loop=$fields_maestro>>
<<assign var='campo' value=$fields_maestro[lis]>>
<<assign var='componente' value=$customFields.$campo.componente>>
<<assign var='titVal' value=$customFields.$campo.titVal>>
<<assign var='tamVal' value=$customFields.$campo.tamVal>>
<<assign var='visibleVal' value=$customFields.$campo.visibleVal>>
<<if $componente eq 0 >>
		 			{CWCampoTexto textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>" size="<<if $tamVal eq "" >><<$lengths_maestro[lis]|floor>><<else>><<$tamVal>><</if>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>}
<<elseif $componente eq 1 >>
					{CWAreaTexto textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>" rows="3" cols ="<<$lengths_maestro[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>}
<<elseif $componente eq 2 >>
					{CWCheckBox textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>" size="<<$lengths_maestro[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>}
<<elseif $componente eq 3 >>
					{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>" size="<<$lengths_maestro[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>}
<<else>>
					{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles_maestro[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>" size="<<$lengths_maestro[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>  dataType=$dataType_<<$classname_maestro|capitalize>>.<<if $primaryKey_maestro[lis] eq "true">><<$fields_maestro[lis]>><<else>>lis_<<$fields_maestro[lis]>><</if>>}
<</if>>
<</section>>
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
<tr><td>																																									
<!-- ************************************ DETALLE *****************************************-->
	<!--*********** PANEL lis ******************-->	
	{if count($smty_datosTablaM ) gt 0 }
	{CWPanel id="lisDetalle" action="borrar" method="post" detalleDe="lis" estado="$estado_lisDetalle" claseManejadora="<<$classname_detalle|capitalize>>"}
		{CWBarraSupPanel titulo="<<$classname_detalle|capitalize>>"}
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha"  action="<<$classname_detalle|capitalize>>__nuevo"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="ficha" action="<<$classname_detalle|capitalize>>__editar"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheckTodos="true" conCheck="true" id="TablaDetalle" numPagInsertar="1" numFilasPantalla="6" datos=$smty_datosTablaD}
				{CWFila tipoListado="false"}
<<section name=lis loop=$fields_detalle>>
<<assign var='campo' value=$fields_detalle[lis]>>
<<assign var='titVal' value=$customFields.$campo.titVal>>
					{CWCampoTexto textoAsociado=<<if $titVal eq "" >>"<<$titles_detalle[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $foreignKey_detalle[lis] eq "true">><<$fields_detalle[lis]>><<else>>lis_<<$fields_detalle[lis]>><</if>>" size="<<$lengths_detalle[lis]|ceil>>" editable="true" value=$defaultData_<<$classname_detalle|capitalize>>.<<if $foreignKey_detalle[lis] eq "true">><<$fields_detalle[lis]>><<else>>lis_<<$fields_detalle[lis]>><</if>> dataType=$dataType_<<$classname_detalle|capitalize>>.<<if $foreignKey_detalle[lis] eq "true">><<$fields_detalle[lis]>><<else>>lis_<<$fields_detalle[lis]>><</if>>}
<</section>>
				{/CWFila}
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}&nbsp;&nbsp;
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}	
	<!--*********** PANEL edi ******************-->																													
	{CWPanel id="ediDetalle" tipoComprobacion="envio" action="$smty_operacion<<$classname_detalle|capitalize>>" method="post" detalleDe="lis" estado="$estado_ediDetalle" claseManejadora="<<$classname_detalle|capitalize>>" accion=$smty_operacionFicha<<$classname_detalle|capitalize>>}
		{CWBarraSupPanel titulo="<<$classname_detalle|capitalize>>"}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}		
		{CWContenedor}			 		
			{CWFichaEdicion  id="FichaDetalle" datos=$smty_datosFichaD numPagInsertar="1"}	
				{CWFicha}
						<table class="text" cellspacing="4" cellpadding="4" border="0">
<<section name=edi loop=$fields_detalle>>
<<assign var='campo' value=$fields_detalle[edi]>>
<<assign var='componente' value=$customFields.$campo.componente>>
<<assign var='titVal' value=$customFields.$campo.titVal>>
<<assign var='tamVal' value=$customFields.$campo.tamVal>>
<<assign var='visibleVal' value=$customFields.$campo.visibleVal>>
	                        <tr>
<<if $componente eq 0 >>
	                        	<td>{CWCampoTexto textoAsociado=<<if $titVal eq "" >>"<<$titles_detalle[edi]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $fields_detalle[edi] eq "$foreignKeyDetalle">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>" size=<<if $tamVal eq "" >><<$lengths_detalle[edi]|floor>><<else>><<$tamVal>><</if>> editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> <<if $fields_detalle[edi] eq "$foreignKeyDetalle">>value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname_detalle|capitalize>>.edi_id_maestro<</if>><<else>>value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>"<<$defaults_detalle[edi]>>"<</if>><</if>><<if $fields_detalle[edi] ne "$foreignKeyDetalle">> dataType=$dataType_<<$classname_detalle|capitalize>>.edi_<<if $primaryKey_detalle[edi] eq "true">>id_detalle<<else>><<$fields_detalle[edi]>><</if>><</if>>}</td>
<<elseif $componente eq 1 >>
	                        	<td>{CWAreaTexto textoAsociado=<<if $titVal eq "" >>"<<$titles_detalle[edi]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $fields_detalle[edi] eq "$foreignKeyDetalle">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>" rows="3" cols="<<$lengths_detalle[edi]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>  dataType=$dataType_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>}</td>
<<elseif $componente eq 2 >>
	                        	<td>{CWCheckBox textoAsociado=<<if $titVal eq "" >>"<<$titles_detalle[edi]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $fields_detalle[edi] eq "$foreignKeyDetalle">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>" size="<<$lengths_detalle[edi]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>  dataType=$dataType_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>}</td>
<<elseif $componente eq 3 >>
	                        	<td>{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles_detalle[edi]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $fields_detalle[edi] eq "$foreignKeyDetalle">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>" size="<<$lengths_detalle[edi]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>  dataType=$dataType_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>}</td>
<<else>>
	                        	<td>{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles_detalle[edi]>>"<<else>>"<<$titVal>>"<</if>> nombre="<<if $fields_detalle[edi] eq "$foreignKeyDetalle">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>" size="<<$lengths_detalle[edi]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=$defaultData_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>  dataType=$dataType_<<$classname_detalle|capitalize>>.<<if $primaryKey_detalle[edi] eq "true">><<$fields_detalle[edi]>><<else>>edi_<<$fields_detalle[edi]>><</if>>}</td>
<</if>>
	                        </tr>
<</section>>
						</table>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}	
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar" action="cancelarEdicion"}
		{/CWBarraInfPanel}
	{/CWPanel}
		
	<!-- ****************** PESTA�AS DETALLE ************************-->	
	{CWContenedorPestanyas id="Detalle"}
		{CWPestanya tipo="lis" panelAsociado="lisDetalle" estado="$estado_lisDetalle"}
		{CWPestanya tipo="edi" panelAsociado="ediDetalle" estado="$estado_ediDetalle"}
	{/CWContenedorPestanyas}
	{/if}
{/CWMarcoPanel}
{/CWVentana}