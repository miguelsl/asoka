------------------------------------------------
Proyecto Jasper
Librería de integracion de JasperReport con PHP.
------------------------------------------------

#################################
Requerimientos y notas de interés
#################################

1.- Entorno Apache - PHP4/PHP5

2.- JRE >= 1.5 (recomendado 1.6, pues a partir de la versión 4.6.0 JasperReport necesita JRE>=1.6)

3.- Varible JAVA_HOME creada. La mismoa debe estar fijada de forma correcta para el usuario o proceso
que ejecuta el servidor Web.

4.- Puede comprobrase si el funcionamiento  es correcto ejecutando el fichero "http://...testJasper.php".
Este fichero contiene ejemplos de creación de un informe (distintas fuentes de datos, disposicciones...)

5.- La librería es compatible con el motor Jasper VA.B.C.
Siendo A, B y C los tres primeros números de la cadena que aparece en el fichero import.txt.
Cadena import.txt jasper-A_B_C_D --> motor Jasper adecuado JasperReport vA.B.C
Ejemplos:
	 Cadena import.txt jasper-3_0_0_5 --> motor Jasper adecuado JasperReport v3.0.0
	 Cadena import.txt jasper-4_0_2_0 --> motor Jasper adecuado JasperReport v4.0.2

6.- La herramienta recomendada para crear los ficheros .jasper es iReport.
La versión de la misma puede determinarse de forma similar a la del motor JasperReport.
Ejemplos:
	 Cadena import.txt jasper-3_0_0_5 --> iReport recomendado v3.0.0
	 Cadena import.txt jasper-4_0_1_0 --> iReport recomendado v4.0.1
Podrán usarse versiones de la herramienta iReport superiores a las recomendadas,
pero, es importante, generar los ficheros .jasper, con compatibilidad a la versión del motor
JasperReport que indique esta librería (punto 5). Dicha compatibilidad se establece dentro
de las opciones de la herramienta iReport.


