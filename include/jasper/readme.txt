------------------------------------------------
Proyecto Jasper
Librer�a de integracion de JasperReport con PHP.
------------------------------------------------

#################################
Requerimientos y notas de inter�s
#################################

1.- Entorno Apache - PHP4/PHP5

2.- JRE >= 1.5 (recomendado 1.6, pues a partir de la versi�n 4.6.0 JasperReport necesita JRE>=1.6)

3.- Varible JAVA_HOME creada. La mismoa debe estar fijada de forma correcta para el usuario o proceso
que ejecuta el servidor Web.

4.- Puede comprobrase si el funcionamiento  es correcto ejecutando el fichero "http://...testJasper.php".
Este fichero contiene ejemplos de creaci�n de un informe (distintas fuentes de datos, disposicciones...)

5.- La librer�a es compatible con el motor Jasper VA.B.C.
Siendo A, B y C los tres primeros n�meros de la cadena que aparece en el fichero import.txt.
Cadena import.txt jasper-A_B_C_D --> motor Jasper adecuado JasperReport vA.B.C
Ejemplos:
	 Cadena import.txt jasper-3_0_0_5 --> motor Jasper adecuado JasperReport v3.0.0
	 Cadena import.txt jasper-4_0_2_0 --> motor Jasper adecuado JasperReport v4.0.2

6.- La herramienta recomendada para crear los ficheros .jasper es iReport.
La versi�n de la misma puede determinarse de forma similar a la del motor JasperReport.
Ejemplos:
	 Cadena import.txt jasper-3_0_0_5 --> iReport recomendado v3.0.0
	 Cadena import.txt jasper-4_0_1_0 --> iReport recomendado v4.0.1
Podr�n usarse versiones de la herramienta iReport superiores a las recomendadas,
pero, es importante, generar los ficheros .jasper, con compatibilidad a la versi�n del motor
JasperReport que indique esta librer�a (punto 5). Dicha compatibilidad se establece dentro
de las opciones de la herramienta iReport.


