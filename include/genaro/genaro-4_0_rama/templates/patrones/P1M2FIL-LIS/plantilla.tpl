{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado="$estado_fil" claseManejadora="<<$classname|capitalize>>"}
		{CWBarraSupPanel titulo="Mantenimiento de <<$classname|capitalize>>"}
			{CWBotonTooltip imagen="01" titulo="Insertar <<$classname|capitalize>>" funcion="insertar" actuaSobre="ficha" action="<<$classname|capitalize>>__nuevo"}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
<<section name=fil loop=$fields>>
<<assign var='campo' value=$fields[fil]>>
<<assign var='defVal' value=$customFields.$campo.defVal>>
<<assign var='componente' value=$customFields.$campo.componente>>
<<assign var='titVal' value=$customFields.$campo.titVal>>
<<assign var='tamVal' value=$customFields.$campo.tamVal>>
<<assign var='visibleVal' value=$customFields.$campo.visibleVal>>
					<tr>
<<if $componente eq 0 >>
						<td>{CWCampoTexto textoAsociado=<<if $titVal eq "" >>"<<$titles[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="fil_<<$fields[fil]>>" size="<<if $tamVal eq "" >><<$lengths[fil]|floor>><<else>><<$tamVal>><</if>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.fil_<<$fields[fil]>><</if>> dataType=$dataType_<<$classname|capitalize>>.fil_<<$fields[fil]>>}</td>
<<elseif $componente eq 1 >>
						<td>{CWAreaTexto textoAsociado=<<if $titVal eq "" >>"<<$titles[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="fil_<<$fields[fil]>>" rows="3" cols="<<$lengths[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.fil_<<$fields[fil]>><</if>> dataType=$dataType_<<$classname|capitalize>>.fil_<<$fields[fil]>>}</td>
<<elseif $componente eq 2 >>
						<td>{CWCheckBox textoAsociado=<<if $titVal eq "" >>"<<$titles[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="fil_<<$fields[fil]>>" size="<<$lengths[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.fil_<<$fields[fil]>><</if>> dataType=$dataType_<<$classname|capitalize>>.fil_<<$fields[fil]>>}</td>
<<elseif $componente eq 3 >>
						<td>{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="fil_<<$fields[fil]>>" size="<<$lengths[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.fil_<<$fields[fil]>><</if>> dataType=$dataType_<<$classname|capitalize>>.fil_<<$fields[fil]>>}</td>
<<else>>
						<td>{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles[fil]>>"<<else>>"<<$titVal>>"<</if>> nombre="fil_<<$fields[fil]>>" size="<<$lengths[fil]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.fil_<<$fields[fil]>><</if>> dataType=$dataType_<<$classname|capitalize>>.fil_<<$fields[fil]>>}</td><</if>>
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

<!-- ****************** PANEL lis ***********************-->
	{CWPanel id="lis" tipoComprobacion="envio" action="operarBD" method="post" estado="$estado_lis" claseManejadora="<<$classname|capitalize>>"}
		{CWBarraSupPanel titulo="Listado de <<$classname|capitalize>>"}
			{CWBotonTooltip imagen="01" titulo="Insertar <<$classname|capitalize>>" funcion="insertar" actuaSobre="tabla"  action="<<$classname|capitalize>>__nuevo"}
			{CWBotonTooltip imagen="02" titulo="Modificar <<$classname|capitalize>>" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar <<$classname|capitalize>>" funcion="eliminar" actuaSobre="tabla"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheck="true" conCheckTodos="true" id="Tabla1" numFilasPantalla="10" datos=$smty_datosTabla}
				{CWFila tipoListado="false"}
<<section name=lis loop=$fields>>
<<assign var='campo' value=$fields[lis]>>
<<assign var='defVal' value=$customFields.$campo.defVal>>
<<assign var='componente' value=$customFields.$campo.componente>>
<<assign var='titVal' value=$customFields.$campo.titVal>>
<<assign var='tamVal' value=$customFields.$campo.tamVal>>
<<assign var='visibleVal' value=$customFields.$campo.visibleVal>>
<<if $componente eq 0 >>
					{CWCampoTexto textoAsociado=<<if $titVal eq "" >>"<<$titles[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="lis_<<$fields[lis]>>" size="<<if $tamVal eq "" >><<$lengths[lis]|floor>><<else>><<$tamVal>><</if>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.lis_<<$fields[lis]>><</if>> dataType=$dataType_<<$classname|capitalize>>.lis_<<$fields[lis]>>}
<<elseif $componente eq 1 >>
					{CWAreaTexto textoAsociado=<<if $titVal eq "" >>"<<$titles[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="lis_<<$fields[lis]>>" rows="3" cols="<<$lengths[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.lis_<<$fields[lis]>><</if>> dataType=$dataType_<<$classname|capitalize>>.lis_<<$fields[lis]>>}
<<elseif $componente eq 2 >>
					{CWCheckBox textoAsociado=<<if $titVal eq "" >>"<<$titles[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="lis_<<$fields[lis]>>" size="<<$lengths[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.lis_<<$fields[lis]>><</if>> dataType=$dataType_<<$classname|capitalize>>.lis_<<$fields[lis]>>}
<<elseif $componente eq 3 >>
					{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="lis_<<$fields[lis]>>" size="<<$lengths[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.lis_<<$fields[lis]>><</if>> dataType=$dataType_<<$classname|capitalize>>.lis_<<$fields[lis]>>}
<<else>>
					{CWLista textoAsociado=<<if $titVal eq "" >>"<<$titles[lis]>>"<<else>>"<<$titVal>>"<</if>> nombre="lis_<<$fields[lis]>>" size="<<$lengths[lis]|floor>>" editable="true" visible=<<if $visibleVal eq "0" >>"false"<<else>>"true"<</if>> value=<<if $defVal neq ''>>"<<$defVal>>"<<else>>$defaultData_<<$classname|capitalize>>.lis_<<$fields[lis]>><</if>> dataType=$dataType_<<$classname|capitalize>>.lis_<<$fields[lis]>>}
<</if>><</section>>
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
