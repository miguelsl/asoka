<?php
/* gvHIDRA. Herramienta Integral de Desarrollo Rápido de Aplicaciones de la Generalitat Valenciana
*
* Copyright (C) 2006 Generalitat Valenciana.
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
*
* For more information, contact:
*
*  Generalitat Valenciana
*  Conselleria d'Infraestructures i Transport
*  Av. Blasco Ibáñez, 50
*  46010 VALENCIA
*  SPAIN
*  +34 96386 24 83
*  gvhidra@gva.es
*  www.gvpontis.gva.es
*
*/
/**
 * IgepSalto. Clase que contiene la estructura de salto que necesita
 * IGEP. 
 * 
 * @author Toni Félix
 * @version $Id: IgepSalto.php,v 1.5 2011-05-11 09:04:13 vnavarro Exp $
 * @package gvHIDRA 
 */
class IgepSalto
{
    var $str_idSalto;
    var $str_claseOrigen;
    var $str_claseDestino;
    var $str_accionDestino;
    var $str_accionVuelta;
    var $m_params = array();
    
  	/********* MODAL ***********/
  	//Definimos la propiedad del formulario
  	
  	private $_form = null;
  	private $_modal = false;
  	private $_widthModal = 900;
  	private $_heightModal = 600;
  	private $_triggerField = false;
  	
  	/********* MODAL ***********/
    /**
    * Constructor del Objeto Salto    
    * @access public
    * @param String $str_claseOrigen Nombre de la clase origen del salto
    * @param String $str_idSalto Cadena identificadora delobjeto salto
    */
	public function __construct($str_claseOrigen, $str_idSalto = '') {
		
		$this->IgepSalto($str_claseOrigen, $str_idSalto);
	}
	
	//Constructor
	public function IgepSalto($str_claseOrigen,$str_idSalto = '') { 

		$this->str_claseOrigen = $str_claseOrigen;
		$this->setId($str_idSalto);	
	}
  
	
	// Método que fija el identificador de un salto
	//@access private
	//@params string  $str_idSalto  id del salto	
	public function setId($str_idSalto) {
		
		$this->str_idSalto = $str_idSalto;
	}

	/**
	* Método que devuelve el identificador de un salto
	* @access public
	* @return string
	*/  
	public function getId() {

		return $this->str_idSalto;
	}  

	//Método que establece el nombre de la clase destino del salto
	//@access private
	//@param String $str_nameTargetClass Nombre de la clase destino del salto
	public function setClase($str_claseDestino) {

		$this->str_claseDestino = $str_claseDestino;
	}

	/**
	* Método que establece el nombre de la clase destino del salto
	* @access public
	* @param String $str_nameTargetClass Nombre de la clase destino del salto
	*/  
	public function setNameTargetClass($str_nameTargetClass) {

		$this->str_claseDestino = $str_nameTargetClass;
	}
	
	/**
	* Método que devuelve el nombre de la clase destino del salto
	* @access public
	* @return string 
	*/  
	public function getNameTargetClass() {

		return $this->str_claseDestino;
	}
	
	// Método que devuelve el nombre de la clase destino del salto
	// @access private
	// @return string 
	public function getClaseDestino() {

		return $this->str_claseDestino;
	}

	/**
	* Método que devuelve el nombre de la clase origen
	* @access public
	* @return string
	*/  
	public function getNameSourceClass() {

		return $this->str_claseOrigen;
	}

	/**
	* Método que fija la accion destino del salto
	* @access public
	* @params string
	*/	
	public function setAccion($str_accionDestino) {

		$this->str_accionDestino = $str_accionDestino;
	}

	/**
	* Método que fija la accion destino del salto
	* @access public
	* @params string
	*/		
	public function setTargetAction($str_accionDestino) {
		$this->str_accionDestino = $str_accionDestino;
	}

	/**
	* Método que fija la accion de retorno del salto
	* @access public
	* @params string
	*/
	public function setAccionRetorno($str_accionVuelta) {

		$this->str_accionVuelta = $str_accionVuelta;
	}

	/**
	* Método que fija la accion de retorno del salto
	* @access public
	* @params string
	*/
	public function setReturnAction($str_accionVuelta) {

		$this->str_accionVuelta = $str_accionVuelta;
	}


	/*************** MODAL ****************/
	//Metodo que calcula la URL de ida del salto
	//@access private
	public function getDestinoIda() {
		$paramModal = null;
		if($this->isModal())
			$paramModal = '&openModal=yes';
		return 'phrame.php?action='.$this->str_claseDestino.'__'.$this->str_accionDestino.$paramModal; 
	}
		/*************** FIN MODAL ****************/

	//Metodo que calcula la URL de vuelta del salto
	//@access private  
	public function getDestinoVuelta(){

		if($this->_triggerField)
			return 'phrame.php?action=gvHrefreshUI&gvHclass='.$this->str_claseOrigen.'&gvHfname='.$this->_form.'&gvHfrom='.$this->_btnIdCompleto.'&gvHvalue=X&gvHtarget=X';
		return 'phrame.php?action='.$this->str_claseOrigen.'__'.$this->str_accionVuelta; 
	}

	/**
	* Método que introduce un parametro al salto
	* @access	public
	* @params	string	indice	identificador del parametro
	* @params	string	valor	valor del parametro
	*/
	public function setParam($indice,$valor) {

		$this->m_params[$indice] = $valor; 
	}

	/**
	* Método que devuelve un parametro del salto
	* @access	public
	* @params	string	indice	identificador del parametro
	* @return	mixed
	*/
	public function getParam($indice) {

		return $this->m_params[$indice]; 
	}

	/**
	* Método que fija un array de parametros al salto
	* @access	public
	* @params	array	params	array de parametros
	*/  
	public function setParams($params) {

		if(is_array($params))
			$this->m_params = $params;
	}

	/**
	* Método que devuelve el array de parametros del salto
	* @access	public
	* @return	array
	*/
	public function getParams() {

		return $this->m_params; 
	}

	
	/*************** MODAL ****************/
	//Metodo que fija el id del formulario de origen del salto. Se utiliza para la vuelta de un salto modal con acción de interfaz
	//@access private  
	public function setForm($value) {
		
		$this->_form = $value;
	}

	//Metodo que devuelve el id del formulario de origen del salto. Se utiliza para la vuelta de un salto modal con acción de interfaz
	//@access private  
	public function getForm() {
		
		return $this->_form;
	}

	/**
	* Método que indica si el salto se lanza como modal o no
	* @access	public
	* @params	bool	value	true indica modal/ false no modal	
	*/
	public function setModal($value) {
		
		$this->_modal = $value;
	}
	
	/**
	* Método que fija el tamaño de la ventana modal
	* @access	public
	* @params	integer	width	ancho de la ventana
	* @params	integer	height	alto de la ventana	
	*/
	public function setSizeModal($width,$height) 
	{
		$this->_widthModal = $width;
		$this->_heightModal = $height;
	}

	/**
	* Método que devuelve el ancho de la ventana modal
	* @access	public
	* @params	integer	_widthModal		ancho de la ventana modal	
	*/
	public function getWidthModal() 
	{
		return $this->_widthModal;
	}

	/**
	* Método que devuelve el alto de la ventana modal
	* @access	public
	* @params	integer	_heightModal	alto de la ventana modal
	*/
	public function getHeightModal() 
	{
		return $this->_heightModal;
	}
	
	/**
	* Método que indica si el salto se ha lanzado como modal o no. Util para saber si al recibir un salto estamos en modo modal o no.
	* @access	public
	* @params	bool	value	true indica modal/ false no modal	
	*/	
	public function isModal() 
	{		
		return $this->_modal;
	}

	/**
	* Método que activa el retorno en forma de acción de interfaz.
	* @params bool  $triggerField  true activa / false desactiva
	* @return none
	*/
	public function setReturnAsTriggerEvent($triggerField) {
		
		$this->_triggerField = $triggerField;
	}
	
	//Este metodo nos sirve para obtener el nombre del id completo. Eso nos vale para construir la llamada con el cam, ins o xxx.
	public function setBtnId($id) {

		$this->_btnIdCompleto = $id;
	}
	
	/************** MODAL ************/
}//Fin class IgepSalto
?>