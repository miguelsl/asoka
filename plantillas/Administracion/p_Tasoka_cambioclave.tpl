{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado="off" claseManejadora="Tasoka_CambioClave"}
		{CWBarraSupPanel titulo="Mantenimiento de Tasoka_CambioClave"}
			{CWBotonTooltip imagen="01" titulo="Insertar Tasoka_CambioClave" funcion="insertar" actuaSobre="ficha" action="Tasoka_CambioClave__nuevo"}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
					<tr>
						<td>{CWCampoTexto textoAsociado="Login" nombre="fil_login" size="15" oculto="true" editable="true" visible="true" value=$defaultData_Tasoka_CambioClave.fil_login dataType=$dataType_Tasoka_CambioClave.fil_login}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Password" nombre="fil_password" size="100" editable="true" visible="true" value=$defaultData_Tasoka_CambioClave.fil_password dataType=$dataType_Tasoka_CambioClave.fil_password}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Nombre" nombre="fil_nombre" size="100" editable="true" visible="false" value=$defaultData_Tasoka_CambioClave.fil_nombre dataType=$dataType_Tasoka_CambioClave.fil_nombre}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Rol" nombre="fil_rol" size="15" editable="true" visible="false" value=$defaultData_Tasoka_CambioClave.fil_rol dataType=$dataType_Tasoka_CambioClave.fil_rol}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Activo" nombre="fil_activo" size="1" editable="true" visible="false" value=$defaultData_Tasoka_CambioClave.fil_activo dataType=$dataType_Tasoka_CambioClave.fil_activo}</td>
					</tr>
				</table>
				<br/>
			{/CWFicha}
		{/CWContenedor}
		{CWBarraInfPanel}
			{*CWBoton imagen="50" texto="Buscar" class="button" accion="buscar"*}
		{/CWBarraInfPanel}						
	{/CWPanel}

<!-- ****************** PANEL edi ***********************-->
	{CWPanel id="edi" tipoComprobacion="envio" action="operarBD" method="post" estado="on" claseManejadora="Tasoka_CambioClave"}
		{CWBarraSupPanel titulo="Cambio de password"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="ficha"}
			
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFichaEdicion id="FichaEdicion" datos=$smty_datosFicha}
				{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
						
						<tr >
						<td></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								{CWCampoTexto nombre="login" oculto="false" textoAsociado="Usuario" longitudMaxima="15" editable="false"  size="15" value=$defaultData_Tasoka_CambioClave.login  dataType=$dataType_Tasoka_CambioClave.login }
						
							
							
							</td>
						</tr>
						
						<tr >
						<td></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							{CWCampoTexto nombre="nombre" textoAsociado="Nombre" longitudMaxima="50"   size="50" obligatorio="true" editable="false" value=$defaultData_Tasoka_CambioClave.nombre dataType=$dataType_Tasoka_CambioClave.nombre}							
							</td>
							
						
						</tr>
						
						
						<tr >
						<td>
						</td>
							<td colspan="3">
							&nbsp;&nbsp;
							{CWCampoTexto nombre="password1" dataType=$dataType_Tasoka_CambioClave.password1 textoAsociado="Nuevo Password"   size="10" obligatorio="false" }
							
							</td>
						
					<tr >
						<td>
						</td>
							<td colspan="3">
							&nbsp;&nbsp;
							{CWCampoTexto nombre="password2" dataType=$dataType_Tasoka_CambioClave.password2 textoAsociado="Repite Password" longitudMaxima="10"  size="10" obligatorio="false" }
							
							</td>
						
						</tr>
					</table>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}
		{/CWContenedor}
		{CWBarraInfPanel}
		
            {CWBoton imagen="41" id="idGuardar"  visible="false" texto="Guardar"  confirm="APL-15" class="button" accion="particular" action="Tasoka_CambioClave__guardar"}
     		{*CWBoton imagen="41" texto="Guardar" class="boton" accion="particular" confirm="APL-15" action="guardar"*}
			{CWBoton imagen="42" id="idCancelar"  visible="false" texto="Cancelar"   class="button" accion="particular" action="Tasoka_CambioClave__cancelar"}
              
			{*CWBoton imagen="42" texto="Cancelar" class="boton" accion="cancelar"*}
		{/CWBarraInfPanel}						
	{/CWPanel}	

<!-- ****************** PESTANYAS ************************-->
	{CWContenedorPestanyas}
		{*CWPestanya tipo="fil" estado=$estado_fil*}		
		{CWPestanya tipo="edi" estado="on"}
	{/CWContenedorPestanyas}
{/CWMarcoPanel}
{/CWVentana}