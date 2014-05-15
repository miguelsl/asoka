{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve=$smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle modal=$smty_modal}	
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!-- ********************************************** MAESTRO **********************************************-->
	<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="buscar" method="post" estado=$estado_fil claseManejadora="Tasoka_saludM"}
		{CWBarraSupPanel titulo="Historial de salud"}
			{*CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha" action="Tasoka_saludM__nuevo"*}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="restaurar" actuaSobre="ficha"}
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFicha}
			
					<table class="text" cellspacing="4" cellpadding="4" border="0">	
					<tr>
					 	<td>			 	
					 	{CWLista textoAsociado="Especie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" actualizaA="fil_raza" nombre="fil_tipo_animal" size="1" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_tipo_animal dataType=$dataType_Tasoka_saludM.fil_tipo_animal}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Raza&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_raza" size="20" longitudMaxmina="50" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_raza dataType=$dataType_Tasoka_saludM.fil_raza}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_nombre" size="20" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_nombre dataType=$dataType_Tasoka_saludM.fil_nombre}</td>
					</tr>
					<tr>
					 	<td>{CWLista textoAsociado="Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_sexo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_sexo dataType=$dataType_Tasoka_saludM.fil_sexo}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Color&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_color" size="20" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_color dataType=$dataType_Tasoka_saludM.fil_color}</td>
					</tr>
					
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Fecha nacimiento" nombre="fil_fecha_nacimiento" size="12" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_fecha_nacimiento dataType=$dataType_Tasoka_saludM.fil_fecha_nacimiento}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Fecha entrada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_fecha_entrada" size="12" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_fecha_entrada dataType=$dataType_Tasoka_saludM.fil_fecha_entrada}</td>
					</tr>
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Procedencia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_procedencia" size="20" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_procedencia dataType=$dataType_Tasoka_saludM.fil_procedencia}</td>
					</tr>
					<tr><td>
					 	{CWLista textoAsociado="Chip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_chip" size="1" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_chip dataType=$dataType_Tasoka_saludM.fil_chip}
					</td>
					</tr>
					<tr>
					<td>
					 	{CWLista textoAsociado="Pasaporte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_pasaporte" size="1" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_pasaporte dataType=$dataType_Tasoka_saludM.fil_pasaporte}
						</td>
					</tr>
					<tr>
					<td>
					 	{CWLista textoAsociado="Castrado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_castrado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_castrado dataType=$dataType_Tasoka_saludM.fil_castrado}
							</td>
					</tr>
					<tr>
					<td>
					{CWLista textoAsociado="Web&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_web" size="1" editable="true" visible="true" value=$defaultData_Tasoka_saludM.fil_web dataType=$dataType_Tasoka_saludM.fil_web}
					 	
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
	{CWPanel id="edi" esMaestro="true" itemSeleccionado=$smty_filaSeleccionada action="operarBD" method="post" estado=$estado_edi claseManejadora="Tasoka_saludM" accion=$smty_operacionFichaTasoka_saludM}
		{CWBarraSupPanel titulo="Mantenimiento de adopciones"}
		{if $smty_acceso eq "total" }
			{*CWBotonTooltip imagen="01" titulo="Insertar registro" funcion="insertar" actuaSobre="ficha" action="Tasoka_saludM__nuevo"*}
			{CWBotonTooltip imagen="02" titulo="Modificar registro" funcion="modificar" actuaSobre="ficha"}
			{*CWBotonTooltip imagen="03" titulo="Eliminar registro" funcion="eliminar" actuaSobre="ficha"*}
			{CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="limpiar" actuaSobre="ficha"}
		{/if}		
		{/CWBarraSupPanel}
		{CWContenedor}
			{CWFichaEdicion id="FichaEdicion" datos=$smty_datosFichaM numPagInsertar="1"}	
				{CWFicha}
					<table class="text" cellspacing="4" cellpadding="4" border="0">
						
						<tr>
							<td>
							<div align="right">
							{CWCampoTexto textoAsociado="Id" oculto="true" nombre="id" size="4" editable="false" value=$defaultData_Tasoka_saludM.edi_id  dataType=$dataType_Tasoka_saludM.id}
	
							{CWCheckBox textoAsociado="Web" nombre="edi_web" size="1" editable="true" value=$defaultData_Tasoka_saludM.edi_web  dataType=$dataType_Tasoka_saludM.edi_web}
							</div>
							<fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
							<legend align='left' style="font-weight:bold;">Descripción: </legend>
							{CWLista textoAsociado="Especie&nbsp;"  nombre="edi_tipo_animal" size="20" longitudMaxmina="50" editable="true" value=$defaultData_Tasoka_saludM.edi_tipo_animal  dataType=$dataType_Tasoka_saludM.edi_tipo_animal}
						&nbsp;&nbsp;
						{CWCampoTexto textoAsociado="Raza" nombre="edi_raza" size="20" longitudMaxmina="50" editable="true" value=$defaultData_Tasoka_saludM.edi_raza  dataType=$dataType_Tasoka_saludM.edi_raza}
						&nbsp;&nbsp;
						{CWCampoTexto textoAsociado="Color" nombre="edi_color" size="20" editable="true" value=$defaultData_Tasoka_saludM.edi_color  dataType=$dataType_Tasoka_saludM.edi_color}
						<br/><br/>
						{CWLista textoAsociado="Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_sexo" size="6" editable="true" value=$defaultData_Tasoka_saludM.edi_sexo  dataType=$dataType_Tasoka_saludM.edi_sexo}
						<br/><br/>
						{CWCampoTexto textoAsociado="Nombre" nombre="edi_nombre" size="20" longitudMaxmina="50" editable="nuevo" value=$defaultData_Tasoka_saludM.edi_nombre  dataType=$dataType_Tasoka_saludM.edi_nombre}
						
						</fieldset>
						</td>
						<td valign="top" rowspan="4">&nbsp;{CWImagen nombre="foto" width="100" height="100" src="igep/custom/asoka/images/menu/Pets-32.png" bumpbox="true"  rutaAbs="no"}
						</td>
						</tr>
						<tr><td>
						<fieldset  style="border-style:doted;  border-bottom-width: thin; border-color:silver;">
<legend align='left' style="font-weight:bold;">Dimensiones</legend>

							{CWCampoTexto textoAsociado="Alto&nbsp;&nbsp;" nombre="edi_alto" size="4" editable="true" value=$defaultData_Tasoka_saludM.edi_alto  dataType=$dataType_Tasoka_saludM.edi_alto}
						cm. &nbsp;x&nbsp{CWCampoTexto textoAsociado="Largo" nombre="edi_largo" size="4" editable="true" value=$defaultData_Tasoka_saludM.edi_largo  dataType=$dataType_Tasoka_saludM.edi_largo}
						cm.<br/><br/>{CWCampoTexto textoAsociado="Peso" nombre="edi_peso" size="4" editable="true" value=$defaultData_Tasoka_saludM.edi_peso  dataType=$dataType_Tasoka_saludM.edi_peso}&nbsp;kg.
						</fieldset>
						</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Fecha nacimiento" nombre="edi_fecha_nacimiento" size="12" editable="true" value=$defaultData_Tasoka_saludM.edi_fecha_nacimiento  dataType=$dataType_Tasoka_saludM.edi_fecha_nacimiento}</td>
						</tr>
						<tr>
							<td>{CWCampoTexto textoAsociado="Fecha entrada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="edi_fecha_entrada" size="12" editable="true" value=$defaultData_Tasoka_saludM.edi_fecha_entrada  dataType=$dataType_Tasoka_saludM.edi_fecha_entrada}
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Procedencia" nombre="edi_procedencia" size="30" longitudMaxima="100" editable="true" value=$defaultData_Tasoka_saludM.edi_procedencia  dataType=$dataType_Tasoka_saludM.edi_procedencia}</td>
						</tr>
						<tr>
							<td>
							{CWCheckBox textoAsociado="Chip" nombre="edi_chip" size="1" editable="true" value=$defaultData_Tasoka_saludM.edi_chip  dataType=$dataType_Tasoka_saludM.edi_chip}
							&nbsp;&nbsp;{CWCheckBox textoAsociado="Pasaporte" nombre="edi_pasaporte" size="1" editable="true" value=$defaultData_Tasoka_saludM.edi_pasaporte  dataType=$dataType_Tasoka_saludM.edi_pasaporte}
							
						   &nbsp;&nbsp; {CWCheckBox textoAsociado="Castrado/Esterilizado" nombre="edi_castrado" size="1" editable="true" value=$defaultData_Tasoka_saludM.edi_castrado  dataType=$dataType_Tasoka_saludM.edi_castrado}
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
																																	
<!-- ****************** PANELES DETALLES ***********************-->

{if count($smty_datosFichaM ) gt 0 }

	{CWDetalles claseManejadoraPadre="Tasoka_saludM" detalles=$smty_detalles panelActivo=$smty_panelActivo}

<tr><td><!--*********** Tasoka_salud_analiticaD ******************-->	
{if $smty_panelActivo eq "Tasoka_salud_analiticaD" }

<!--*********** PANEL edi ******************-->																													
	{CWPanel id="ediDetalle" tipoComprobacion="envio"  action="operarBD" method="post" detalleDe="edi" estado="on" claseManejadora="Tasoka_salud_analiticaD" }
		{CWBarraSupPanel titulo="Mantenimiento de anal&iacute;ticas"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="ficha""}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="ficha"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="ficha"}
		{/if}	
		{/CWBarraSupPanel}		
		{CWContenedor}			 		
			{CWFichaEdicion  id="FichaDetalle" datos=$smty_datosTasoka_salud_analiticaD}	
				{CWFicha}
					<table class="text" cellspacing="4" cellpadding="4" border="0" width="100%">
					<tr>
					 	<td>{CWCampoTexto textoAsociado="Fecha" nombre="edi_fecha" size="12" editable="true" visible="true" value=$defaultData_Tasoka_salud_analiticaD.edi_fecha dataType=$dataType_Tasoka_salud_analiticaD.edi_fecha}
					 	{CWCampoTexto textoAsociado="Id animal" nombre="id_animal" size=1 editable="false" oculto="true" visible="true" value=$defaultData_Tasoka_salud_analiticaD.id_animal dataType=$dataType_Tasoka_salud_analiticaD.id_animal}
					 	</td>
					</tr>
					<tr>
					 	<td>
					 	{CWSelector  titulo="*Formato: Bacteria -> Estado" nombre="edi_analitica_consta"  botones=$smty_botones   datos=$defaultData_Tasoka_salud_analiticaD.edi_analitica_consta dataType=$dataType_Tasoka_salud_analiticaD.edi_analitica_consta editable="true" separador="->"}
							
								{CWLista nombre="edi_bacteriasM" editable="true" value=$defaultData_Tasoka_salud_analiticaD.edi_bacteriasM dataType=$dataType_Tasoka_salud_analiticaD.edi_bacteriasM textoAsociado="Bacterias"}
								{CWLista nombre="edi_estado" textoAsociado="Estado" longitudMaxima="3"  value=$defaultData_Tasoka_salud_analiticaD.edi_estado dataType=$dataType_Tasoka_salud_analiticaD.edi_estado  editable="true" size="3" obligatorio="false" }
								
							{/CWSelector}
				            	<br/>
					 	{CWCampoTexto textoAsociado="Informe Anal&iacute;tica" nombre="edi_nombre_fichero" size="30" editable="false" value=$defaultData_Tasoka_salud_analiticaD.edi_nombre_fichero dataType=$dataType_Tasoka_salud_analiticaD.edi_nombre_fichero}
                         {if $smty_datosTasoka_salud_analiticaD.$smty_iteracionActual.mostrar_informe eq "true" }
                            {CWBotonTooltip imagen="pdf" titulo="Ver" actuaSobre="edi_nombre_fichero"   panelActua="edi"  action="Tasoka_salud_analiticaD__verInformeAnalisis"}
                           
                         {/if}
                             <br/>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                           {CWUpLoad nombre="ficheroUploadInforme" size="25" textoAsociado="Subir Documento"}


 

                    <br/>
					 	
					 	
					 	
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
	
		{CWPestanya tipo="edi" panelAsociado="ediDetalle" estado="$estado_ediDetalle"}
	{/CWContenedorPestanyas}
	{/if}
	<!--*********** Tasoka_salud_vacunaD ******************-->	
{if $smty_panelActivo eq "Tasoka_salud_vacunaD" }
<!--*********** PANEL lis ******************-->	
	{CWPanel id="lisDetalle" detalleDe="edi" tipoComprobacion="envio" action="operarBD" method="post" estado="on" claseManejadora="Tasoka_salud_vacunaD"}
		{CWBarraSupPanel titulo="Historia de vacunaci&oacute;n"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
		{/if}	
		{/CWBarraSupPanel}
		{CWContenedor}			
			{CWTabla conCheck="true" id="TablaDetalle" numFilasPantalla="6" datos=$smty_datosTasoka_salud_vacunaD}
				{CWFila tipoListado="false"}	
				
				 	{CWCampoTexto textoAsociado="Fecha vacuna" nombre="lis_fecha_vacuna" size="12" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacunaD.lis_fecha_vacuna dataType=$dataType_Tasoka_salud_vacunaD.lis_fecha_vacuna}
				 	{CWLista textoAsociado="Vacuna" nombre="lis_id_vacuna" size="1" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacunaD.lis_id_vacuna dataType=$dataType_Tasoka_salud_vacunaD.lis_id_vacuna}
					{CWCampoTexto textoAsociado="Id animal" oculto="true" nombre="id_animal" size="4" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacunaD.id_animal dataType=$dataType_Tasoka_salud_vacunaD.id_animal}
				    {CWCampoTexto textoAsociado="tipo animal" oculto="true" nombre="lis_tipo_animal" size="4" editable="true" visible="true" value=$defaultData_Tasoka_salud_vacunaD.lis_tipo_animal dataType=$dataType_Tasoka_salud_vacunaD.lis_tipo_animal}
				
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
{/if}<!--*********** Tasoka_salud_desaparasitacionD ******************-->	
{if $smty_panelActivo eq "Tasoka_salud_desaparasitacionD" }
<!--*********** PANEL lis ******************-->	
	{CWPanel id="lisDetalle" detalleDe="edi" tipoComprobacion="envio" action="operarBD" method="post" estado="on" claseManejadora="Tasoka_salud_desaparasitacionD"}
		{CWBarraSupPanel titulo="Historia de desparasitaci&oacute;n"}
		{if $smty_acceso eq "total" }
			{CWBotonTooltip imagen="01" titulo="Insertar registros" funcion="insertar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="02" titulo="Modificar registros" funcion="modificar" actuaSobre="tabla"}
			{CWBotonTooltip imagen="03" titulo="Eliminar registros" funcion="eliminar" actuaSobre="tabla"}
		{/if}	
		{/CWBarraSupPanel}
		{CWContenedor}			
			{CWTabla conCheck="true" id="TablaDetalle" numFilasPantalla="6" datos=$smty_datosTasoka_salud_desaparasitacionD}
				{CWFila tipoListado="false"}	
				 	{CWCampoTexto textoAsociado="Fecha desparasitaci&oacute;n" nombre="lis_fecha_desparasitacion" size="12" editable="true" visible="true" value=$defaultData_Tasoka_salud_desaparasitacionD.lis_fecha_desparasitacion dataType=$dataType_Tasoka_salud_desaparasitacionD.lis_fecha_desparasitacion}
				 	{CWLista obligatorio="true" textoAsociado="Tipo" nombre="lis_tipo" size="7" editable="true" visible="true" value=$defaultData_Tasoka_salud_desaparasitacionD.lis_tipo dataType=$dataType_Tasoka_salud_desaparasitacionD.lis_tipo}
		 			{CWCampoTexto oculto="true" textoAsociado="Id animal" nombre="id_animal" size="4" editable="true" visible="true" value=$defaultData_Tasoka_salud_desaparasitacionD.id_animal dataType=$dataType_Tasoka_salud_desaparasitacionD.id_animal}
	
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
{/if}{/if}
														 {/CWMarcoPanel}
														 {/CWVentana}