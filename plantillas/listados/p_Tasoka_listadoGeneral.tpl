{CWVentana tipoAviso=$smty_tipoAviso  codAviso=$smty_codError  descBreve = $smty_descBreve  textoAviso=$smty_textoAviso onLoad=$smty_jsOnLoad}
{CWBarra usuario=$smty_usuario codigo=$smty_codigo customTitle=$smty_customTitle}
	{CWMenuLayer name="$smty_nombre" cadenaMenu="$smty_cadenaMenu"}	
{/CWBarra}
{CWMarcoPanel conPestanyas="true"}

<!--*********** PANEL fil ******************-->
	{CWPanel id="fil" action="abrirListado" method="post" estado="on" claseManejadora="Tasoka_listadoGeneral"}

        {CWBarraSupPanel titulo="Listado General"}
         
            {CWBotonTooltip imagen="04" titulo="Restaurar valores" funcion="restaurar" actuaSobre="ficha"}
        {/CWBarraSupPanel}
        {CWContenedor}
            {CWFicha}                                       
                <table class="text" cellspacing="4" cellpadding="4" border="0">
                <tr><td>{CWLista textoAsociado="Estado&nbsp;&nbsp;"  nombre="fil_estado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_estado dataType=$dataType_Tasoka_listadoGeneral.fil_estado}
                </td></tr>
                   <tr>
						<td>{CWLista textoAsociado="Especie"  nombre="fil_tipo_animal" size="1" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_tipo_animal dataType=$dataType_Tasoka_listadoGeneral.fil_tipo_animal}&nbsp;&nbsp;
					{CWCampoTexto textoAsociado="Raza" nombre="fil_raza" size="20" longitudMaxima="50" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_raza dataType=$dataType_Tasoka_listadoGeneral.fil_raza}&nbsp;&nbsp;
					{CWLista textoAsociado="Tamaño&nbsp;&nbsp;&nbsp;" nombre="fil_tamanyo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_tamanyo dataType=$dataType_Tasoka_listadoGeneral.fil_tamanyo}
					</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Nombre" nombre="fil_nombre" size="20" longitudMaxima="50" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_nombre dataType=$dataType_Tasoka_listadoGeneral.fil_nombre}</td>
					</tr>
					<tr>
						<td>{CWLista textoAsociado="Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_sexo" size="6" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_sexo dataType=$dataType_Tasoka_listadoGeneral.fil_sexo}</td>
					</tr>
									
					<tr>
						<td>{CWCampoTexto textoAsociado="Fecha nacimiento" nombre="fil_fecha_nacimiento" size="12" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_fecha_nacimiento dataType=$dataType_Tasoka_listadoGeneral.fil_fecha_nacimiento}</td>
					</tr>
					<tr>
						<td>{CWCampoTexto textoAsociado="Fecha entrada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_fecha_entrada" size="12" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_fecha_entrada dataType=$dataType_Tasoka_listadoGeneral.fil_fecha_entrada}
					&nbsp;&nbsp;{CWCampoTexto textoAsociado="Procedencia" nombre="fil_procedencia" size="20" longitudMaxima="100" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_procedencia dataType=$dataType_Tasoka_listadoGeneral.fil_procedencia}</td>
					</tr>
					<tr>
						<td>
						{CWLista nombre="fil_acogida" actualizaA="fil_acogida_mami" value=$defaultData_Tasoka_listadoGeneral.fil_acogida dataType=$dataType_Tasoka_listadoGeneral.fil_acogida editable="true" textoAsociado="Acogido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" }
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Mami" nombre="fil_acogida_mami" size="15" editable="false" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_acogida_mami dataType=$dataType_Tasoka_listadoGeneral.fil_acogida_mami}
						</td>
					</tr>
					<tr>
						<td>
						{CWLista nombre="fil_adoptado" actualizaA="fil_adoptante_nif" value=$defaultData_Tasoka_listadoGeneral.fil_adoptado dataType=$dataType_Tasoka_listadoGeneral.fil_adoptado editable="true" textoAsociado="Adoptado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" }
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="Nif Adoptante" nombre="fil_adoptante_nif" size="15" editable="false" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_adoptante_nif dataType=$dataType_Tasoka_listadoGeneral.fil_adoptante_nif}
						</td>
					</tr>
					<tr>
						<td>
						{CWLista nombre="fil_chip" actualizaA="fil_chip_numero" value=$defaultData_Tasoka_listadoGeneral.fil_chip dataType=$dataType_Tasoka_listadoGeneral.fil_chip editable="true" textoAsociado="Chip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" }
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="N&uacute;mero" nombre="fil_chip_numero" size="15" editable="false" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_chip_numero dataType=$dataType_Tasoka_listadoGeneral.fil_chip_numero}
						</td>
					</tr>
					<tr><td>
						{CWLista actualizaA="fil_pasaporte_numero"  textoAsociado="Pasaporte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_pasaporte" size="1" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_pasaporte dataType=$dataType_Tasoka_listadoGeneral.fil_pasaporte}
						&nbsp;&nbsp;{CWCampoTexto textoAsociado="N&uacute;mero"  nombre="fil_pasaporte_numero" size="15" editable="false" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_pasaporte_numero dataType=$dataType_Tasoka_listadoGeneral.fil_pasaporte_numero}
						</td>
					</tr>
					<tr><td>	
						{CWLista textoAsociado="Castrado/Esterilizado" nombre="fil_castrado" size="1" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_castrado dataType=$dataType_Tasoka_listadoGeneral.fil_castrado}
						</td>
					</tr>
					
					<tr><td>
						{CWLista textoAsociado="Web&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" nombre="fil_web" size="1" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_web dataType=$dataType_Tasoka_listadoGeneral.fil_web}
						{*CWCampoTexto textoAsociado="Chip" nombre="fil_chip" size="1" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_chip dataType=$dataType_Tasoka_listadoGeneral.fil_chip*}
						
						</td>
					</tr>
				
                      
                          <tr><td>              
                            <fieldset style="border-style:doted;  border-bottom-width: thin; border-color: silver">
    <legend align='left' style="font-weight:bold;">Opciones de Informe: </legend>  
    &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; {CWCampoTexto textoAsociado="T&iacute;tulo"  nombre="fil_titulo" size="50" editable="true" visible="true" value=$defaultData_Tasoka_listadoGeneral.fil_titulo dataType=$dataType_Tasoka_listadoGeneral.fil_titulo}   
    <br/><br/>
    &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;{CWLista nombre="fil_tipo_listado" dataType=$dataType_Tasoka_listadoGeneral.fil_tipo_listado value=$defaultData_Tasoka_listadoGeneral.fil_tipo_listado editable="true" textoAsociado="Tipo de listado" }  
                   &nbsp;&nbsp;{CWLista nombre="fil_tipoInforme" dataType=$dataType_Tasoka_listadoGeneral.fil_tipoInforme value=$defaultData_Tasoka_listadoGeneral.fil_tipoInforme editable="true" textoAsociado="Versi&oacute;n" }  
                   
                     <br/>            
                       </td></tr>
                                </table>
                <br/>   
            {/CWFicha}
        {/CWContenedor}
        {CWBarraInfPanel}
            {CWBoton imagen="10" texto="Listar" class="button"  accion="particular"}
        {/CWBarraInfPanel}                      
    {/CWPanel}
    

<!-- ****************** PESTANYAS ************************-->
	{CWContenedorPestanyas}
		{CWPestanya tipo="fil" estado="on"}		

	{/CWContenedorPestanyas}
{/CWMarcoPanel}
{/CWVentana}