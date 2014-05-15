{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!--*********** PANEL fil ******************-->	
	{CWPanel id="fil" action="buscar" method="post" estado="$estado_fil" claseManejadora="Tasoka_AdminUsers"}
		{CWBarraSupPanel titulo="Busqueda de Usuarios"}
			
			{CWBotonTooltip imagen="01" titulo="Insertar Usuario" funcion="insertar" actuaSobre="ficha" action="Tasoka_AdminUsers__nuevo"}
			
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="restaurar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
				<tr><td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{CWCampoTexto nombre="fil_nombre" longitudMaxima="50" size="25" editable="true" textoAsociado="Nombre"  value=$defaultData_Tasoka_AdminUsers.fil_nombre dataType=$dataType_Tasoka_AdminUsers.fil_nombre}
				</td></tr>
				<tr><td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{CWCampoTexto nombre="fil_login" longitudMaxima="50" size="25" editable="true" textoAsociado="Login&nbsp;&nbsp;&nbsp;&nbsp;"  value=$defaultData_Tasoka_AdminUsers.fil_login dataType=$dataType_Tasoka_AdminUsers.fil_login}
				</td></tr>
				</table>
			
			{/CWFicha}
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="50" texto="Buscar" class="button" accion="buscar" }
		{/CWBarraInfPanel}						
	{/CWPanel}

	
<!-- ****************** PANEL lis ***********************-->
	{CWPanel id="lis" action="operarBD" method="post" estado="$estado_lis" claseManejadora="Tasoka_AdminUsers"}
		{CWBarraSupPanel titulo="Listado de Usuarios/Equipos"}
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha" action="Tasoka_AdminUsers__nuevo"}
			

			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="ficha" action="Tasoka_AdminUsers__editar"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
			
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWTabla conCheck="true" conCheckTodos="true" id="Tabla1" numPagInsertar="1" numFilasPantalla="15" datos=$smty_datosTabla}
				{CWFila tipoListado="false"}
					{CWCampoTexto nombre="lis_login" textoAsociado="Usuario." longitudMaxima="15" editable="false" oculto="false" size="15"}
					
					{CWCampoTexto nombre="lis_nombre" textoAsociado="Nombre." longitudMaxima="50" editable="false"  size="50"}
					{CWCampoTexto nombre="lis_rol" textoAsociado="Rol." longitudMaxima="10" editable="false"  size="10"}
					{CWCampoTexto nombre="lis_activo" textoAsociado="Activo." longitudMaxima="1" editable="false"  size="2"}
					{CWCampoTexto nombre="lis_multimedia" textoAsociado="Multimedia." longitudMaxima="1" editable="false"  size="2"}
					{CWCampoTexto nombre="lis_solo_lectura" textoAsociado="Solo Lectura." longitudMaxima="1" editable="false"  size="2"}
				{/CWFila}				
				{CWPaginador enlacesVisibles="3"}
			{/CWTabla}			
		{/CWContenedor}
		{CWBarraInfPanel}
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar" }
		{/CWBarraInfPanel}						
	{/CWPanel}	
	<!-- ****************** PANEL edi ***********************-->
	{CWPanel id="edi" tipoComprobacion="envio"  action="$smty_operacionFichaTasoka_AdminUsers" method="post" estado="$estado_edi" claseManejadora="Tasoka_AdminUsers"  accion="$smty_operacionFichaTasoka_AdminUsers"}
		{CWBarraSupPanel titulo="Administraci&oacute;n de Usuarios"}
		    {*CWBotonTooltip imagen="01" titulo="Insertar Usuario" funcion="insertar" actuaSobre="ficha" *}
			

		    {CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}							
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFichaEdicion id="FichaEdicion" datos=$smty_datosFicha numPagInsertar="1" }
				{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
						
						<tr >
						<td></td>
							<td>&nbsp;&nbsp;
								{CWCampoTexto nombre="edi_login" oculto="false" textoAsociado="Usuario" longitudMaxima="15" editable="nuevo"  size="15"  value=$defaultData_Tasoka_AdminUsers.edi_login dataType=$dataType_Tasoka_AdminUsers.edi_login}
						
								&nbsp;&nbsp;
								{CWCheckBox nombre="edi_activo"  value=$defaultData_Tasoka_AdminUsers.edi_activo dataType=$dataType_Tasoka_AdminUsers.edi_activo editable="true" textoAsociado="Activo" }
							&nbsp;&nbsp;
								{CWCheckBox nombre="edi_multimedia"  value=$defaultData_Tasoka_AdminUsers.edi_multimedia dataType=$dataType_Tasoka_AdminUsers.edi_multimedia editable="true" textoAsociado="Multimedia" }
							&nbsp;&nbsp;
								{CWCheckBox nombre="edi_solo_lectura"  value=$defaultData_Tasoka_AdminUsers.edi_solo_lectura dataType=$dataType_Tasoka_AdminUsers.edi_solo_lectura editable="true" textoAsociado="Solo Lectura" }
							
							</td>
						</tr>
						
						<tr >
						<td></td>
							<td>
							{CWCampoTexto nombre="edi_nombre" textoAsociado="Nombre" longitudMaxima="50"   editable="true" size="50" obligatorio="true"  value=$defaultData_Tasoka_AdminUsers.edi_nombre dataType=$dataType_Tasoka_AdminUsers.edi_nombre}
							
							</td>
							
						
						</tr>
						
						
						<tr >
						<td></td>
							<td colspan="3">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							{CWCampoTexto nombre="edi_password" textoAsociado="Clave" longitudMaxima="10"   value=$defaultData_Tasoka_AdminUsers.edi_password dataType=$dataType_Tasoka_AdminUsers.edi_password editable="true" size="10" obligatorio="false" }
							&nbsp;&nbsp;
							{CWCampoTexto nombre="edi_rol" textoAsociado="Rol" longitudMaxima="10" oculto="true"  editable="true" size="10" obligatorio="false"  value=$defaultData_Tasoka_AdminUsers.edi_rol dataType=$dataType_Tasoka_AdminUsers.edi_rol }
							
							</td>
						
			
					</table>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}
		{/CWContenedor}
		{CWBarraInfPanel}
     		{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar"}
		{/CWBarraInfPanel}						
	{/CWPanel}		
<!-- ****************** PESTAÑAS ************************-->	
	{CWContenedorPestanyas}
		{CWPestanya tipo="fil" estado=$estado_fil}
		{CWPestanya tipo="lis" estado=$estado_lis}
		{CWPestanya tipo="edi" estado=$estado_edi}
	{/CWContenedorPestanyas}
{/CWMarcoPanel}
{/CWVentana}