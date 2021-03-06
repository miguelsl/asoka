<?php
/**
 * Test class for IgepAccionesGenericas.
 * Generated by PHPUnit on 2008-05-28 at 12:20:41.
 */
class IgepAccionesGenericasTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var    IgepAccionesGenericas
     * @access protected
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp()
    {
        $this->object = new IgepAccionesGenericas;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown()
    {
    }

    /**
     * 
     */
    public function testPerformOrdenarTabla() {
		if(is_callable(array("IgepAccionesGenericas","ordenarCursor")))
			$this->tesOrdenarCursor();
    }

	/**
	 * test si la funcion no fuera private
	 */
    public function tesOrdenarCursor() {
        $p = ConfigFramework::getNumericSeparatorsUser();
        $pg = $p['GROUP'];
        $pd = $p['DECIMAL'];
        $pf = ConfigFramework::getDateMaskUser();
        $descCampoPanel = array(
				'edad'=>array('tipo'=>TIPO_ENTERO),
        		'importe'=>array('tipo'=>TIPO_DECIMAL, 'parteDecimal'=>2),
        		'nombre'=>array('tipo'=>TIPO_CARACTER),
        		'cantidad'=>array('tipo'=>TIPO_ENTERO),
        		'fecha'=>array('tipo'=>TIPO_FECHA),
        		'fechahora'=>array('tipo'=>TIPO_FECHAHORA),
			);
		//$this->object->comunica = new IgepComunicacion(array(), array('phptype'=>'pgsql'), $descCampoPanel);
		$o = $this->object;
		// lo que tienen puntos suspensivos dependen de la bd, y se inicializan en bucle
		$datos = array(
			array(
				'edad'=>11,
				'xnombre'=>'abc',
				'nombre'=>'def',
				'xcantidad'=>'12',
				'cantidad'=>'12',
				'ximporte'=>'...',
				'importe'=>"12{$pd}3",
				'xfecha'=>'...',
				'fecha'=>'...',
				'xfechahora'=>'...',
				'fechahora'=>'...',
				),
			array(
				'edad'=>1,
				'xnombre'=>'bc',
				'nombre'=>'cde',
				'xcantidad'=>'12345678',
				'cantidad'=>"1{$pg}234{$pg}567",
				'ximporte'=>'...',
				'importe'=>"1{$pg}234{$pg}567{$pd}64",
				'xfecha'=>'...',
				'fecha'=>'...',
				'xfechahora'=>'...',
				'fechahora'=>'...',
				),
			);
		$datos[0]['fecha'] = new gvHidraTimestamp('2008-12-31');
		$datos[0]['fecha'] = $datos[0]['fecha']->formatUser();
		$datos[1]['fecha'] = new gvHidraTimestamp('2009-01-01');
		$datos[1]['fecha'] = $datos[1]['fecha']->formatUser();
		$datos[0]['fechahora'] = new gvHidraTimestamp('2008-12-31 15:00:00');
		$datos[0]['fechahora'] = $datos[0]['fechahora']->formatUser();
		$datos[1]['fechahora'] = new gvHidraTimestamp('2009-01-01 15:30:59');
		$datos[1]['fechahora'] = $datos[1]['fechahora']->formatUser();
		$cursor = $datos;
		
		// Pruebas basicas
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO, 'asc');
		$this->assertEquals(1,$cursor[0]['edad']);
		$this->assertEquals(11,$cursor[1]['edad']);
		// volver a ordenar por lo mismo
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO, 'asc');
		$this->assertEquals(1,$cursor[0]['edad']);
		$this->assertEquals(11,$cursor[1]['edad']);
		// sin indicar el tipo de orden
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO);
		$this->assertEquals(1,$cursor[0]['edad']);
		$this->assertEquals(11,$cursor[1]['edad']);
		// orden en mayuscula
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO, 'ASc');
		$this->assertEquals(1,$cursor[0]['edad']);
		$this->assertEquals(11,$cursor[1]['edad']);
		// orden inverso
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO, 'dSc');
		$this->assertEquals(11,$cursor[0]['edad']);
		$this->assertEquals(1,$cursor[1]['edad']);
		// orden indeterminado
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO, 'X');
		$this->assertEquals(11,$cursor[0]['edad']);
		$this->assertEquals(1,$cursor[1]['edad']);
		
		// Pruebas de cadenas
		// cadenas sin definir en addcampopanel
		$o->ordenarCursor($cursor, 'xnombre', '', 'dsc');
		$this->assertEquals($datos[1]['xnombre'],$cursor[0]['xnombre']);
		$this->assertEquals($datos[0]['xnombre'],$cursor[1]['xnombre']);
		// cadenas definidas en addcampopanel
		$o->ordenarCursor($cursor, 'nombre', TIPO_CARACTER, 'dsc');
		$this->assertEquals($datos[0]['nombre'],$cursor[0]['nombre']);
		$this->assertEquals($datos[1]['nombre'],$cursor[1]['nombre']);
		
		// Pruebas de enteros
		// enteros definidos en addcampopanel
		$o->ordenarCursor($cursor, 'cantidad', TIPO_ENTERO, 'dsc');
		$this->assertEquals($datos[1]['cantidad'],$cursor[0]['cantidad']);
		$this->assertEquals($datos[0]['cantidad'],$cursor[1]['cantidad']);

		// Pruebas de decimales
		// decimales definidos en addcampopanel
		$o->ordenarCursor($cursor, 'importe', TIPO_DECIMAL, 'dsc');
		$this->assertEquals($datos[1]['importe'],$cursor[0]['importe']);
		$this->assertEquals($datos[0]['importe'],$cursor[1]['importe']);

		// Pruebas de fechas sin hora
		// fecha sin hora definidos en addcampopanel
		$o->ordenarCursor($cursor, 'fecha', TIPO_FECHA, 'dsc');
		$this->assertEquals($datos[1]['fecha'],$cursor[0]['fecha']);
		$this->assertEquals($datos[0]['fecha'],$cursor[1]['fecha']);

		// Pruebas de fechas con hora
		// fecha con hora definidos en addcampopanel
		$o->ordenarCursor($cursor, 'fechahora', TIPO_FECHAHORA, 'dsc');
		$this->assertEquals($datos[1]['fechahora'],$cursor[0]['fechahora']);
		$this->assertEquals($datos[0]['fechahora'],$cursor[1]['fechahora']);

		// TODO: esto es si la funcion intentara detectar los numeros y fechas,
		// que necesita el dsn.
//		$dbs = IgepDB::supportedDBMS();
//		foreach ($dbs as $db) {
//			$dsn_virtual = array('phptype'=>$db);
//	        $b = IgepDB::caracteresNumericos($dsn_virtual);
//	        $bd = $b['DECIMAL'];
//	        $bg = $b['GROUP'];
//	        $ffecha = IgepDB::mascaraFechas($dsn_virtual);
//			$of = new IgepComunicacion(array(), $dsn_virtual, $descCampoPanel);
//			$datos[0]['ximporte'] = "1{$bd}2";
//			$datos[1]['ximporte'] = "154{$bg}321{$bd}2";
//			$datos[0]['xfecha'] = date($ffecha, mktime(0,0,0,12,31,2008));
//			$datos[1]['xfecha'] = date($ffecha, mktime(0,0,0,1,1,2009));
//			$datos[0]['xfechahora'] = date($ffecha.' '.ConfigFramework::getTimeMask(), mktime(15,0,0,12,31,2008));
//			$datos[1]['xfechahora'] = date($ffecha.' '.ConfigFramework::getTimeMask(), mktime(15,10,30,12,31,2008));
//			
//			$cursor = $datos;
//
//			// enteros sin definir en addcampopanel
//			$of->ordenarCursor($cursor, 'xcantidad', 'dsc');
//			$this->assertEquals($datos[1]['xcantidad'],$cursor[0]['xcantidad']);
//			$this->assertEquals($datos[0]['xcantidad'],$cursor[1]['xcantidad']);
//
//			// decimales sin definir en addcampopanel
//			$of->ordenarCursor($cursor, 'ximporte', 'dsc');
//			$this->assertEquals($datos[1]['ximporte'],$cursor[0]['ximporte']);
//			$this->assertEquals($datos[0]['ximporte'],$cursor[1]['ximporte']);
//
//			// fechas sin hora sin definir en addcampopanel
//			$of->ordenarCursor($cursor, 'xfecha', 'dsc');
//			$this->assertEquals($datos[1]['xfecha'],$cursor[0]['xfecha']);
//			$this->assertEquals($datos[0]['xfecha'],$cursor[1]['xfecha']);
//
//			// fechas con hora sin definir en addcampopanel
//			$of->ordenarCursor($cursor, 'xfechahora', 'dsc');
//			$this->assertEquals($datos[1]['xfechahora'],$cursor[0]['xfechahora']);
//			$this->assertEquals($datos[0]['xfechahora'],$cursor[1]['xfechahora']);
//		}
		
		// ordenacion de 1 fila
		$cursor = array_slice($datos,0,1);
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO, 'asc');
		$this->assertEquals($datos[0]['edad'],$cursor[0]['edad'], 'ordenando array con 1 fila');

		// ordenacion de 0 fila
		$cursor = array();
		$o->ordenarCursor($cursor, 'edad', TIPO_ENTERO, 'asc');
		$this->assertTrue(empty($cursor), 'ordenando array con 0 filas');
    }

    /**
     * @todo Implement testCalcularCamposDependientes().
     */
    public function testCalcularCamposDependientes() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testAbrirVentanaSeleccion().
     */
    public function testAbrirVentanaSeleccion() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testBuscarVentanaSeleccion().
     */
    public function testBuscarVentanaSeleccion() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testFocusChanged().
     */
    public function testFocusChanged() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}

?>
