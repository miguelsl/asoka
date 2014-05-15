{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve=$smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}	
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!-- ********************************************** MAESTRO **********************************************-->
	<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado="$estado_fil"  claseManejadora="Tasoka_animales2"}
		{CWBarraSupPanel titulo="Mantenimiento de Animales"}
		{if $smty_acceso eq "total" }	
			{CWBotonTooltip imagen="01" titulo="Insertar Ficha de Animales" funcion="insertar" actuaSobre="ficha"  action="Tasoka_animales2__nuevo"}
		{/if}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
				<table class="text" cellspacing="4" cellpadding="4" border="0">
					<tr>
						<td>{CWLista textoAsociado="Estado&nbsp;&nbsp;"  nombre="fil_estado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_estado dataType=$dataType_Tasoka_animales2.fil_estado}</td>
					</tr>
					<tr>
						<td>{CWLista textoAsociado="Especie"  nombre="fil_tipo_animal" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_tipo_animal dataType=$dataType_Tasoka_animales2.fil_tipo_animal}&nbsp;&nbsp;
					{CWCampoTexto textoAsociado="Raza" nombre="fil_raza" size="20" longitudMaxima="50" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_raza dataType=$dataType_Tasoka_animales2.fil_raza}&nbsp;&nbsp;
					{CWLista textoAsociado="Tamaño&nbsp;&nbsp;&nbsp;" nombre="fil_tamanyo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_tamanyo dataType=$dataType_Tasoka_animales2.fil_tamanyo}
					</td>
					
					
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Nombre" nombre="fil_nombre" size="20" longitudMaxima="50" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_nombre dataType=$dataType_Tasoka_animales2.fil_nombre}</td>
					</tr>
					<tr>
						<td>{CWLista textoAsociado="Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_sexo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_sexo dataType=$dataType_Tasoka_animales2.fil_sexo}</td>
					</tr>
					
					
					<tr>
						<td>{CWCampoTexto textoAsociado="Fecha nacimiento" nombre="fil_fecha_nacimiento" size="12" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_fecha_nacimiento dataType=$dataType_Tasoka_animales2.fil_fecha_nacimiento}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Fecha entrada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_fecha_entrada" size="12" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_fecha_entrada dataType=$dataType_Tasoka_animales2.fil_fecha_entrada}
					&nbsp;&nbsp;{CWCampoTexto textoAsociado="Procedencia" nombre="fil_procedencia" size="20" longitudMaxima="100" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_procedencia dataType=$dataType_Tasoka_animales2.fil_procedencia}</td>
					</tr>
					<tr>
						<td>
						{CWLista nombre="fil_acogida" actualizaA="fil_acogida_mami" value=$defaultData_Tasoka_animales2.fil_acogida dataType=$dataType_Tasoka_animales2.fil_acogida editable="true" textoAsociado="Acogido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" }
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Mami" nombre="fil_acogida_mami" size="15" editable="false" visible="true" value=$defaultData_Tasoka_animales2.fil_acogida_mami dataType=$dataType_Tasoka_animales2.fil_acogida_mami}
						</td>
					</tr>
					<tr>
						<td>
						{CWLista nombre="fil_adoptado" actualizaA="fil_adoptante_nif" value=$defaultData_Tasoka_animales2.fil_adoptado dataType=$dataType_Tasoka_animales2.fil_adoptado editable="true" textoAsociado="Adoptado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" }
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Nif Adoptante" nombre="fil_adoptante_nif" size="15" editable="false" visible="true" value=$defaultData_Tasoka_animales2.fil_adoptante_nif dataType=$dataType_Tasoka_animales2.fil_adoptante_nif}
						</td>
					</tr>
					<tr>
						<td>
						{CWLista nombre="fil_chip" actualizaA="fil_chip_numero" value=$defaultData_Tasoka_animales2.fil_chip dataType=$dataType_Tasoka_animales2.fil_chip editable="true" textoAsociado="Chip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" }
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="N&uacute;mero" nombre="fil_chip_numero" size="15" editable="false" visible="true" value=$defaultData_Tasoka_animales2.fil_chip_numero dataType=$dataType_Tasoka_animales2.fil_chip_numero}
						</td>
					</tr>
					<tr><td>
						{CWLista actualizaA="fil_pasaporte_numero"  textoAsociado="Pasaporte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_pasaporte" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_pasaporte dataType=$dataType_Tasoka_animales2.fil_pasaporte}
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="N&uacute;mero"  nombre="fil_pasaporte_numero" size="15" editable="false" visible="true" value=$defaultData_Tasoka_animales2.fil_pasaporte_numero dataType=$dataType_Tasoka_animales2.fil_pasaporte_numero}
						</td>
					</tr>
					<tr><td>	
						{CWLista textoAsociado="Castrado/Esterilizado" nombre="fil_castrado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_castrado dataType=$dataType_Tasoka_animales2.fil_castrado}
						</td>
					</tr>
					
					<tr><td>
						{CWLista textoAsociado="Web&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_web" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_web dataType=$dataType_Tasoka_animales2.fil_web}
						{*CWCampoTexto textoAsociado="Chip" nombre="fil_chip" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.fil_chip dataType=$dataType_Tasoka_animales2.fil_chip*}
						
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

<!-- ****************** PANEL edi ***********************-->
	{CWPanel id="edi" tipoComprobacion="envio"  esMaestro="true" itemSeleccionado=$smty_filaSeleccionada action="operarBD" method="post" estado="$estado_edi" claseManejadora="Tasoka_animales2"  accion=$smty_operacionFichaTasoka_animales2}
		{CWBarraSupPanel titulo="Mantenimiento de Animales"}
		{if $smty_acceso eq "total" }
		{CWBotonTooltip imagen="01" titulo="Insertar Ficha de Animales" funcion="insertar" actuaSobre="ficha"  action="Tasoka_animales2__nuevo"}
		{CWBotonTooltip imagen="02" titulo="Modificar registro" funcion="modificar" actuaSobre="ficha"}
		{CWBotonTooltip imagen="03" titulo="Eliminar registro" funcion="eliminar" actuaSobre="ficha"}
		{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/if}				
	{/CWBarraSupPanel}
		{CWContenedor}
			{CWFichaEdicion id="FichaEdicion" datos=$smty_datosFicha} 
				{CWFicha}
	
					<table class="text" cellspacing="4" cellpadding="4" border="0">
<tr>

<td align="left">
{CWLista textoAsociado="Estado"  obligatorio="true"  nombre="edi_estado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_estado dataType=$dataType_Tasoka_animales2.edi_estado}

&nbsp;&nbsp;{$smty_datosFicha.$smty_iteracionActual.estado_adopcion} 
</td>
<td align="right">
{CWLista textoAsociado="Web" nombre="edi_web" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_web dataType=$dataType_Tasoka_animales2.edi_web}

</td>
<td valign="top" rowspan="4">&nbsp;{CWImagen nombre="foto" width="100" height="100" src="../igep/custom/asoka/images/menu/Pets-32.png" bumpbox="true"  rutaAbs="false"}

{*CWUpLoad nombre="ficheroUploadFoto" size="15" textoAsociado="Subir Foto"*}
</td>
</tr>
						<tr>
							<td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Descripci&oacute;n: </legend>
							{CWLista textoAsociado="Especie" obligatorio="true"  nombre="edi_tipo_animal" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_tipo_animal dataType=$dataType_Tasoka_animales2.edi_tipo_animal}
						
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Raza"  obligatorio="true"  nombre="edi_raza" size="20" longitudMaxima="50" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_raza dataType=$dataType_Tasoka_animales2.edi_raza}
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Color" nombre="edi_color" size="30" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_color dataType=$dataType_Tasoka_animales2.edi_color}
						
												<br/><br/>{CWCampoTexto textoAsociado="Nombre" nombre="edi_nombre" size="20" longitudMaxima="50" editable="nuevo" visible="true" value=$defaultData_Tasoka_animales2.edi_nombre dataType=$dataType_Tasoka_animales2.edi_nombre}
							&nbsp;&nbsp;{CWLista textoAsociado="Sexo" nombre="edi_sexo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_sexo dataType=$dataType_Tasoka_animales2.edi_sexo}
							
							
						
							
												</fieldset>
						</td>
						</tr>
						<tr>
							<td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Medidas: </legend>
           
                
							{CWCampoTexto textoAsociado="Alto" nombre="edi_alto" size="4" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_alto dataType=$dataType_Tasoka_animales2.edi_alto}
						cm.&nbsp;x&nbsp;
						
							{CWCampoTexto textoAsociado="Largo" nombre="edi_largo" size="4" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_largo dataType=$dataType_Tasoka_animales2.edi_largo}
						cm.&nbsp;&nbsp;
						
							{CWCampoTexto textoAsociado="Peso" nombre="edi_peso" size="4" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_peso dataType=$dataType_Tasoka_animales2.edi_peso}
							kg.
							&nbsp;&nbsp;
						{CWLista textoAsociado="Tamaño"  obligatorio="true"  nombre="edi_tamanyo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_tamanyo dataType=$dataType_Tasoka_animales2.edi_tamanyo}
					
							</fieldset> 
							</td>
						</tr>
						<tr>
							<td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Procedencia: </legend>
							{CWCampoTexto textoAsociado="F. Nacimiento" nombre="edi_fecha_nacimiento" size="12" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_fecha_nacimiento dataType=$dataType_Tasoka_animales2.edi_fecha_nacimiento}
							&nbsp;&nbsp;<br/><br/>
							{CWCampoTexto textoAsociado="F. Entrada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_fecha_entrada" size="12" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_fecha_entrada dataType=$dataType_Tasoka_animales2.edi_fecha_entrada}
							&nbsp;&nbsp;
						{CWCampoTexto textoAsociado="Procedencia" nombre="edi_procedencia" size="20" longitudMaxima="100" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_procedencia dataType=$dataType_Tasoka_animales2.edi_procedencia}
						</fieldset>
						</td>
						</tr>
						<tr>
							<td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Acogida: </legend>
							{CWCheckBox textoAsociado="Acogido" nombre="edi_acogida" size="1" actualizaA="edi_acogida_mami" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_acogida dataType=$dataType_Tasoka_animales2.edi_acogida}
							&nbsp;&nbsp;{CWCampoTexto textoAsociado="Mami" nombre="edi_acogida_mami" size="45" longitudMaxima="100" editable=$smty_datosFicha.$smty_iteracionActual.acogida_activa visible="true" value=$defaultData_Tasoka_animales2.edi_acogida_mami dataType=$dataType_Tasoka_animales2.edi_acogida_mami}
							<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							{CWCampoTexto textoAsociado="Tel&eacute;fono" nombre="edi_acogida_telefono" size="10" longitudMaxima="9" editable=$smty_datosFicha.$smty_iteracionActual.acogida_activa visible="true" value=$defaultData_Tasoka_animales2.edi_acogida_telefono dataType=$dataType_Tasoka_animales2.edi_acogida_telefono}
							&nbsp;&nbsp;{CWCampoTexto textoAsociado="Mail" nombre="edi_acogida_mail" size="45" longitudMaxima="100" editable=$smty_datosFicha.$smty_iteracionActual.acogida_activa visible="true" value=$defaultData_Tasoka_animales2.edi_acogida_mail dataType=$dataType_Tasoka_animales2.edi_acogida_mail}
							</fieldset>
						</td>
						</tr>
						<tr>
							<td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Identificaci&oacute;n: </legend>
							{CWCheckBox textoAsociado="Chip" nombre="edi_chip" size="1" actualizaA="edi_chip_numero" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_chip dataType=$dataType_Tasoka_animales2.edi_chip}
							&nbsp;&nbsp;{CWCampoTexto textoAsociado="N&uacute;mero" nombre="edi_chip_numero" size="15" editable=$smty_datosFicha.$smty_iteracionActual.chip_activa visible="true" value=$defaultData_Tasoka_animales2.edi_chip_numero dataType=$dataType_Tasoka_animales2.edi_chip_numero}
						&nbsp;&nbsp;{CWCheckBox textoAsociado="Pasaporte" nombre="edi_pasaporte" actualizaA="edi_pasaporte_numero" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_pasaporte dataType=$dataType_Tasoka_animales2.edi_pasaporte}
						{CWCampoTexto textoAsociado="N&uacute;mero" nombre="edi_pasaporte_numero" size="15" editable=$smty_datosFicha.$smty_iteracionActual.pasaporte_activa visible="true" value=$defaultData_Tasoka_animales2.edi_pasaporte_numero dataType=$dataType_Tasoka_animales2.edi_pasaporte_numero}
						</fieldset>
						</td>
						</tr>
						
						<tr>
							<td  colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Castraci&oacute;n/Esterilizaci&oacute;n: </legend>
							{CWCheckBox textoAsociado="Castrado/Esterilizado" actualizaA="edi_fecha_castracion,edi_veterinario" nombre="edi_castrado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_castrado dataType=$dataType_Tasoka_animales2.edi_castrado}
							&nbsp;&nbsp;<br/><br/>
						{CWCampoTexto textoAsociado="Fecha operaci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_fecha_castracion" size="12" editable=$smty_datosFicha.$smty_iteracionActual.castracion_activa  visible="true" value=$defaultData_Tasoka_animales2.edi_fecha_castracion dataType=$dataType_Tasoka_animales2.edi_fecha_castracion}
						&nbsp;&nbsp;
						{CWCampoTexto textoAsociado="Lugar operaci&oacute;n" nombre="edi_veterinario" size="40" longitudMaxima="100" editable=$smty_datosFicha.$smty_iteracionActual.castracion_activa  visible="true" value=$defaultData_Tasoka_animales2.edi_veterinario dataType=$dataType_Tasoka_animales2.edi_veterinario}
						</fieldset>
						</td>
						</tr>
						<tr><td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Historia: </legend>
							{CWAreaTexto textoAsociado="" nombre="edi_historia" rows="5" cols="110" longitudMaxima="5000" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_historia dataType=$dataType_Tasoka_animales2.edi_historia}
							</fieldset>
							</td>
						</tr>
						<tr>
							<td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Caracter: </legend>
							{CWAreaTexto textoAsociado="" nombre="edi_caracter"  rows="5" cols="110" longitudMaxima="5000" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_caracter dataType=$dataType_Tasoka_animales2.edi_caracter}
							</fieldset>
							
							</td>
						</tr>
						<tr>
							<td colspan="2">
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
	<legend align='left' style="font-weight:bold;">Tratamiento: </legend>
							{CWAreaTexto textoAsociado="" nombre="edi_tratamiento"  rows="5" cols="110" longitudMaxima="5000" editable="true" visible="true" value=$defaultData_Tasoka_animales2.edi_tratamiento dataType=$dataType_Tasoka_animales2.edi_tratamiento}
							</fieldset>
							{CWCampoTexto textoAsociado="Id" nombre="id" size="4" editable="true" visible="false" value=$defaultData_Tasoka_animales2.id dataType=$dataType_Tasoka_animales2.id}
							</td>
						</tr>
					</table>
					<br/>
				{/CWFicha}
				{CWPaginador enlacesVisibles="3"}
			{/CWFichaEdicion}
		{/CWContenedor}
		{CWBarraInfPanel}
		{CWBoton imagen="doc" texto="Ficha .ODT" class="button" accion="particular" action="FichaODT" }
		{CWBoton imagen="pdf" texto="Ficha .PDF" class="button" accion="particular" action="FichaPDF" }
		{CWBoton imagen="50" texto="Galeria de Fotos" class="button" accion="listar" action="MuestraGaleria" }
		{if $smty_acceso eq "total" }
			{CWBoton imagen="41" texto="Guardar" class="button" accion="guardar"}
		{/if}	
			
			{CWBoton imagen="42" texto="Cancelar" class="button" accion="cancelar" }
		{/CWBarraInfPanel}						
	{/CWPanel}	
		
	<!-- ****************** PESTAï¿½AS MAESTRO ************************-->
	{CWContenedorPestanyas id="Maestro"}				
		{CWPestanya tipo="fil" panelAsociado="fil" estado=$estado_fil ocultar="Detalle"}
		
		{CWPestanya tipo="edi" panelAsociado="edi" estado=$estado_edi mostrar="Detalle"}
	{/CWContenedorPestanyas}
</td></tr>
																																	
<!-- ****************** PANELES DETALLES ***********************-->

{if count($smty_datosFicha) gt 0 }

	{CWDetalles claseManejadoraPadre="Tasoka_animales2" detalles=$smty_detalles panelActivo=$smty_panelActivo}

<tr><td><!--*********** Tasoka_salud_analitica2D ******************-->	
{if $smty_panelActivo eq "Tasoka_salud_analitica2D" }

<!--*********** PANEL edi ******************-->																													
	{CWPanel id="ediDetalle" tipoComprobacion="envio"  action="operarBD" method="post" detalleDe="edi" estado="on" claseManejadora="Tasoka_salud_analitica2D" }
		{CWBarraSupPanel titulo="Mantenimiento de anal&iacute;ticas"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha""}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="ficha"}
		{/if}	
		{/CWBarraSupPanel}		
		{CWContenedor}			 		
			{CWFichaEdicion  id="FichaDetalle" datos=$smty_datosTasoka_salud_analitica2D}	
				{CWFicha}
					<table class="text" cellspacing="4" cellpadding="4" border="0" width="100%">
					
					
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Fecha" nombre="edi_fecha" size="12" editable="true" visible="true" value=$defaultData_Tasoka_salud_analitica2D.edi_fecha dataType=$dataType_Tasoka_salud_analitica2D.edi_fecha}			 	
					 	{CWCampoTexto textoAsociado="Id animal" nombre="id_animal" size=1 editable="false" oculto="true" visible="true" value=$defaultData_Tasoka_salud_analitica2D.id_animal dataType=$dataType_Tasoka_salud_analitica2D.id_animal}
					 	</td>
					</tr>
					<tr>
					 	<td>
					 	{CWSelector  titulo="*Formato: Pat&oacute;geno -> Estado" nombre="edi_analitica_consta"  botones=$smty_botones   datos=$defaultData_Tasoka_salud_analitica2D.edi_analitica_consta dataType=$dataType_Tasoka_salud_analitica2D.edi_analitica_consta editable="true" separador="->"}
							
								{CWLista nombre="edi_bacteriasM" editable="true" value=$defaultData_Tasoka_salud_analitica2D.edi_bacteriasM dataType=$dataType_Tasoka_salud_analitica2D.edi_bacteriasM textoAsociado="Pat&oacute;genos"}
								{CWLista nombre="edi_estado" textoAsociado="Estado" longitudMaxima="3"  value=$defaultData_Tasoka_salud_analitica2D.edi_estado dataType=$dataType_Tasoka_salud_analitica2D.edi_estado  editable="true" size="3" obligatorio="false" }
								
							{/CWSelector}
				            	<br/>
					 	{CWCampoTexto textoAsociado="Informe Anal&iacute;tica" nombre="edi_nombre_fichero" size="30" editable="false" value=$defaultData_Tasoka_salud_analitica2D.edi_nombre_fichero dataType=$dataType_Tasoka_salud_analitica2D.edi_nombre_fichero}
                         {if $smty_datosTasoka_salud_analitica2D.$smty_iteracionActual.mostrar_informe eq "true" }
                            {CWBotonTooltip imagen="pdf" titulo="Ver" actuaSobre="edi_nombre_fichero"   panelActua="edi"  action="Tasoka_salud_analitica2D__verInformeAnalisis"}
                           
                         {/if}
                             <br/>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                           {CWUpLoad nombre="ficheroUploadInforme" size="25" textoAsociado="Subir Documento"}


 

                    <br/><br/>
					 	
					 	
					 	
					 	</td>
					</tr>
					</table>
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
		
	<!-- ****************** PESTANYAS DETALLE ************************-->	
	{CWContenedorPestanyas id="Detalle"}
	
		{CWPestanya tipo="edi" panelAsociado="ediDetalle" estado="on"}
	{/CWContenedorPestanyas}
	{/if}
	
	
	<!--*********** Tasoka_salud_biopsia2D ******************-->	
{if $smty_panelActivo eq "Tasoka_salud_biopsia2D" }

<!--*********** PANEL edi ******************-->																													
	{CWPanel id="ediDetalle" tipoComprobacion="envio"  action="operarBD" method="post" detalleDe="edi" estado="on" claseManejadora="Tasoka_salud_biopsia2D" }
		{CWBarraSupPanel titulo="Mantenimiento de Biopsias"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha""}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="ficha"}
		{/if}	
		{/CWBarraSupPanel}		
		{CWContenedor}			 		
			{CWFichaEdicion  id="FichaDetalle" datos=$smty_datosTasoka_salud_biopsia2D}	
				{CWFicha}
					<table class="text" cellspacing="4" cellpadding="4" border="0" width="100%">
					
					
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Fecha" nombre="edi_fecha" size="12" editable="true" visible="true" value=$defaultData_Tasoka_salud_biopsia2D.edi_fecha dataType=$dataType_Tasoka_salud_biopsia2D.edi_fecha}			 	
					 	{CWCampoTexto textoAsociado="Id animal" nombre="id_animal" size=1 editable="false" oculto="true" visible="true" value=$defaultData_Tasoka_salud_biopsia2D.id_animal dataType=$dataType_Tasoka_salud_biopsia2D.id_animal}
					 	</td>
					</tr>
					<tr>
					 	<td>
					 	<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
					 <legend align='left' style="font-weight:bold;">Descripci&oacute;n: </legend>
					 	{CWAreaTexto textoAsociado="" nombre="edi_descripcion"  rows="5" cols="110" longitudMaxima="5000" editable="true" visible="true" value=$defaultData_Tasoka_salud_biopsia2D.edi_descripcion dataType=$dataType_Tasoka_salud_biopsia2D.edi_descripcion}
					 	</fieldset>
				            	<br/>
					 	{CWCampoTexto textoAsociado="Informe Biopsia" nombre="edi_nombre_fichero" size="30" editable="false" value=$defaultData_Tasoka_salud_biopsia2D.edi_nombre_fichero dataType=$dataType_Tasoka_salud_biopsia2D.edi_nombre_fichero}
                         {if $smty_datosTasoka_salud_biopsia2D.$smty_iteracionActual.mostrar_informe eq "true" }
                            {CWBotonTooltip imagen="pdf" titulo="Ver" actuaSobre="edi_nombre_fichero"   panelActua="edi"  action="Tasoka_salud_biopsia2D__verInformeAnalisis"}
                           
                         {/if}
                             <br/>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                           {CWUpLoad nombre="ficheroUploadInforme" size="25" textoAsociado="Subir Documento"}


 

                    <br/><br/>
					 	
					 	
					 	
					 	</td>
					</tr>
					</table>
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
		
	<!-- ****************** PESTANYAS DETALLE ************************-->	
	{CWContenedorPestanyas id="Detalle"}
	
		{CWPestanya tipo="edi" panelAsociado="ediDetalle" estado="on"}
	{/CWContenedorPestanyas}
	{/if}
	<!--*********** Tasoka_salud_vacuna2D ******************-->	
{if $smty_panelActivo eq "Tasoka_salud_vacuna2D" }
<!--*********** PANEL lis ******************-->	
	{CWPanel id="lisDetalle" detalleDe="edi" tipoComprobacion="envio" action="operarBD" method="post" estado="on" claseManejadora="Tasoka_salud_vacuna2D"}
		{CWBarraSupPanel titulo="Historia de vacunaci&oacute;n"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
		{/if}	
		{/CWBarraSupPanel}
		{CWContenedor}			
			{CWTabla conCheck="true" id="TablaDetalle" numFilasPantalla="6" datos=$smty_datosTasoka_salud_vacuna2D}
				{CWFila tipoListado="false"}	
				
				 	{CWCampoTexto textoAsociado="Fecha vacuna" nombre="lis_fecha_vacuna" size="12" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacuna2D.lis_fecha_vacuna dataType=$dataType_Tasoka_salud_vacuna2D.lis_fecha_vacuna}
				 	{CWLista textoAsociado="Vacuna" nombre="lis_id_vacuna" size="1" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacuna2D.lis_id_vacuna dataType=$dataType_Tasoka_salud_vacuna2D.lis_id_vacuna}
					{CWCampoTexto textoAsociado="Id animal" oculto="true" nombre="id_animal" size="4" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacuna2D.id_animal dataType=$dataType_Tasoka_salud_vacuna2D.id_animal}
				    {CWCampoTexto textoAsociado="tipo animal" oculto="true" nombre="lis_tipo_animal" size="4" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacuna2D.lis_tipo_animal dataType=$dataType_Tasoka_salud_vacuna2D.lis_tipo_animal}
				
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
	<!-- ****************** PESTANYAS DETALLE ************************-->	
	{CWContenedorPestanyas id="Detalle"}
		{CWPestanya tipo="lis" panelAsociado="lisDetalle" estado="on"}
	{/CWContenedorPestanyas}
{/if}<!--*********** Tasoka_salud_desaparasitacion2D ******************-->	
{if $smty_panelActivo eq "Tasoka_salud_desaparasitacion2D" }
<!--*********** PANEL lis ******************-->	
	{CWPanel id="lisDetalle" detalleDe="edi" tipoComprobacion="envio" action="operarBD" method="post" estado="on" claseManejadora="Tasoka_salud_desaparasitacion2D"}
		{CWBarraSupPanel titulo="Historia de desparasitaci&oacute;n"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
		{/if}	
		{/CWBarraSupPanel}
		{CWContenedor}			
			{CWTabla conCheck="true" id="TablaDetalle" numFilasPantalla="6" datos=$smty_datosTasoka_salud_desaparasitacion2D}
				{CWFila tipoListado="false"}	
				 	{CWCampoTexto textoAsociado="Fecha desparasitaci&oacute;n" nombre="lis_fecha_desparasitacion" size="12" editable="true" visible="true" value=$defaultData_Tasoka_salud_desaparasitacion2D.lis_fecha_desparasitacion dataType=$dataType_Tasoka_salud_desaparasitacion2D.lis_fecha_desparasitacion}
				 	{CWLista obligatorio="true" textoAsociado="Tipo" nombre="lis_tipo" size="7" editable="true" visible="true" value=$defaultData_Tasoka_salud_desaparasitacion2D.lis_tipo dataType=$dataType_Tasoka_salud_desaparasitacion2D.lis_tipo}
		 			{CWCampoTexto oculto="true" textoAsociado="Id animal" nombre="id_animal" size="4" editable="true" visible="true" value=$defaultData_Tasoka_salud_desaparasitacion2D.id_animal dataType=$dataType_Tasoka_salud_desaparasitacion2D.id_animal}
	
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
	<!-- ****************** PESTANYAS DETALLE ************************-->	
	{CWContenedorPestanyas id="Detalle"}
		{CWPestanya tipo="lis" panelAsociado="lisDetalle" estado="on"}
	{/CWContenedorPestanyas}
{/if}


{if $smty_panelActivo eq "Tasoka_adopcion2D" }
	{CWPanel id="lisDetalle" action="borrar" method="post" detalleDe="edi" estado="$estado_lisDetalle" claseManejadora="Tasoka_adopcion2D"}
		{CWBarraSupPanel titulo="Listado adopciones"}
		{if $smty_acceso eq "total" }
		
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha"  action="Tasoka_adopcion2D__nuevo"}
		{/if}	
			{CWBotonTooltip imagen="02" titulo="Editar registros" funcion="modificar" actuaSobre="ficha" action="Tasoka_adopcion2D__editar"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}			
		{/if}
		{/CWBarraSupPanel}			
		{CWContenedor}
			{CWTabla conCheckTodos="true" conCheck="true" id="TablaDetalle" numFilasPantalla="6" datos=$smty_datosTablaD}
				{CWFila tipoListado="false"}				
										{CWCheckBox textoAsociado="Reservado" nombre="lis_reservado" size="1" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_reservado dataType=$dataType_Tasoka_adopcion2D.lis_reservado}
					{CWCampoTexto textoAsociado="Contacto" nombre="lis_contacto" size="50" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_contacto dataType=$dataType_Tasoka_adopcion2D.lis_contacto}
					{CWCampoTexto textoAsociado="Destino" nombre="lis_pais_destino" size="20" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_pais_destino dataType=$dataType_Tasoka_adopcion2D.lis_pais_destino}
					{CWCampoTexto textoAsociado="F. Salida" nombre="lis_fecha_salida" size="12" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_fecha_salida dataType=$dataType_Tasoka_adopcion2D.lis_fecha_salida}
					{CWCheckBox textoAsociado="Adoptado" nombre="lis_adoptado" size="1" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_adoptado dataType=$dataType_Tasoka_adopcion2D.lis_adoptado}
					{CWCampoTexto textoAsociado="F. Adopci&oacute;n" nombre="lis_fecha_adopcion" size="12" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_fecha_adopcion dataType=$dataType_Tasoka_adopcion2D.lis_fecha_adopcion}
					{CWCheckBox textoAsociado="Devuelto" nombre="lis_devuelto" size="1" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_devuelto dataType=$dataType_Tasoka_adopcion2D.lis_devuelto}
					{CWCampoTexto textoAsociado="F. devoluci&oacute;n" nombre="lis_fecha_devolucion" size="12" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_fecha_devolucion dataType=$dataType_Tasoka_adopcion2D.lis_fecha_devolucion}
					{CWCampoTexto textoAsociado="Id adopcion" oculto="true" nombre="lis_id_adopcion" size="1" editable="true" value=$defaultData_Tasoka_adopcion2D.lis_id_adopcion dataType=$dataType_Tasoka_adopcion2D.lis_id_adopcion}
					{CWCampoTexto textoAsociado="Id animal" oculto="true" nombre="id_animal" size="4" editable="true" value=$defaultData_Tasoka_adopcion2D.id_animal dataType=$dataType_Tasoka_adopcion2D.id_animal}
					
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
																													
	{CWPanel id="ediDetalle" tipoComprobacion="envio" action="$smty_operacionTasoka_adopcion2D" method="post" detalleDe="edi" estado="$estado_ediDetalle" claseManejadora="Tasoka_adopcion2D" accion=$smty_operacionFichaTasoka_adopcion2D}
		{CWBarraSupPanel titulo="Mantenimiento de adopciones"}
			{CWBotonTooltip imagen="04" titulo="Limpiar campos" funcion="limpiar" actuaSobre="ficha"}
		{/CWBarraSupPanel}		
		{CWContenedor}			 		
			{CWFichaEdicion id="FichaDetalle" datos=$smty_datosFichaD}	
				{CWFicha}

					<table class="text" cellspacing="4" cellpadding="4" border="0">
	                        
	                        <tr>
	                        	<td>{CWCampoTexto textoAsociado="Id adopcion" oculto="true" nombre="edi_id_adopcion" size="1" editable="false" visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_id_adopcion}
						{CWCampoTexto textoAsociado="Id animal" oculto="true" nombre="id_animal" size="4" editable="false" visible="true" value=$defaultData_Tasoka_adopcion2D.id_animal}
	                        	
	                        	<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
								<legend align='left' style="font-weight:bold;">Reserva: </legend>
           
	                        		{CWCheckBox textoAsociado="Reservado&nbsp;&nbsp;&nbsp;" actualizaA="edi_contacto,edi_pais_destino,edi_fecha_salida"  nombre="edi_reservado" size="1" editable="true" visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_reservado}
									<br/><br/>{CWCampoTexto textoAsociado="Contacto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_contacto" size="63" longitudMaxima="100" editable=$smty_datosFichaD.$smty_iteracionActual.reserva_activa visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_contacto}
								<br/><br/>
								{CWCampoTexto textoAsociado="Pa&iacute;s destino&nbsp;" nombre="edi_pais_destino" size="30" longitudMaxima="50" editable=$smty_datosFichaD.$smty_iteracionActual.reserva_activa visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_pais_destino}
								&nbsp;&nbsp;{CWCampoTexto textoAsociado="Fecha salida" nombre="edi_fecha_salida" size="12" editable=$smty_datosFichaD.$smty_iteracionActual.reserva_activa visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_fecha_salida}
								</fieldset> 
								</td>
						</tr>
						
	                        <tr><td>
	                        <fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
								<legend align='left' style="font-weight:bold;">Adopci&oacute;n: </legend>
	                        	
	                        	{CWCheckBox textoAsociado="Adoptado" actualizaA="edi_fecha_adopcion" nombre="edi_adoptado" size="1" editable="true" visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_adoptado}
						&nbsp;&nbsp;
	                        	{CWCampoTexto textoAsociado="Fecha adopci&oacute;n&nbsp;&nbsp;&nbsp;" nombre="edi_fecha_adopcion" size="12" editable=$smty_datosFichaD.$smty_iteracionActual.adopcion_activa visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_fecha_adopcion}
	                        	<br/><br/>
	                        	{CWCampoTexto textoAsociado="Nif Adoptante" nombre="edi_adoptante_nif" size="10" longitudMaxima="9" editable=$smty_datosFichaD.$smty_iteracionActual.adopcion_activa visible="true" value=$defaultData_Tasoka_adopcion2D.edi_adoptante_nif dataType=$dataType_Tasoka_adopcion2D.edi_adoptante_nif}
	                        	&nbsp;&nbsp;
	                        	{CWCampoTexto textoAsociado="Nombre" nombre="edi_adoptante_nombre" size="40" longitudMaxima="100" editable=$smty_datosFichaD.$smty_iteracionActual.adopcion_activa visible="true" value=$defaultData_Tasoka_adopcion2D.edi_adoptante_nombre  dataType=$dataType_Tasoka_adopcion2D.edi_adoptante_nombre}
	                        	<br/><br/>
	                        	
	                        	{CWCampoTexto textoAsociado="Telefono&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_adoptante_telefono" size="10" longitudMaxima="9" editable=$smty_datosFichaD.$smty_iteracionActual.adopcion_activa visible="true" value=$defaultData_Tasoka_adopcion2D.edi_adoptante_telefono  dataType=$dataType_Tasoka_adopcion2D.edi_adoptante_telefono}
	                        	&nbsp;&nbsp;
	                        	{CWCampoTexto textoAsociado="Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_adoptante_mail" size="40" longitudMaxima="100" editable=$smty_datosFichaD.$smty_iteracionActual.adopcion_activa visible="true" value=$defaultData_Tasoka_adopcion2D.edi_adoptante_mail  dataType=$dataType_Tasoka_adopcion2D.edi_adoptante_mail}
	                        	
	                        	</td>
						
						
						</fieldset> 
						</tr>
						
	                        <tr>
	                        
	                        	<td>
	                        	<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
								<legend align='left' style="font-weight:bold;">Devoluci&oacute;n: </legend>
	                        	{CWCheckBox editable="false" textoAsociado="Devuelto" actualizaA="edi_fecha_devolucion,edi_motivo_devolucion" nombre="edi_devuelto" size="1" editable="true" visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_devuelto}
							&nbsp;&nbsp;	{CWCampoTexto textoAsociado="Fecha devoluci&oacute;n" nombre="edi_fecha_devolucion" size="12" editable=$smty_datosFichaD.$smty_iteracionActual.devolucion_activa visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_fecha_devolucion}
								<br/>
								{CWAreaTexto textoAsociado="Motivo devoluci&oacute;n"  rows="4" cols="65" nombre="edi_motivo_devolucion" longitudMaxima="1000" editable=$smty_datosFichaD.$smty_iteracionActual.devolucion_activa visible="true" value="" dataType=$dataType_Tasoka_adopcion2D.edi_motivo_devolucion}
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
		
<!-- ****************** PESTAï¿½AS ************************-->
	{CWContenedorPestanyas  id="Detalle"}				
		{CWPestanya tipo="lis" panelAsociado="lisDetalle" estado="$estado_lisDetalle"}
		{CWPestanya tipo="edi" panelAsociado="ediDetalle" estado="$estado_ediDetalle"}
	{/CWContenedorPestanyas}
{/if}

{/if}
{/CWMarcoPanel}
{/CWVentana}