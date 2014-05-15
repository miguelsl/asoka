#!/bin/bash

# Comando invocado desde el proyecto jasper para llamar a java
# Recibe como argumento el fichero tmp con los parametros

# Para usar este comando hay que:
# 1. instalar exec_dir en php (http://kyberdigi.cz/projects/execdir/english.html)
# 2. crear carpeta en servidor y colocar este script
# 3. incluir carpeta anterior en directiva de php exec_dir
# 4. en invocacion de listado jasper añadir esta linea con la carpeta donde se encuentra
#    el script 'jasper_exec_dir.sh':
#        $informeJ->setSecurityMode('<carpeta en exec dir>');

if test -z "$1"; then
  echo 'No recibe como parametro el fichero tmp!!!'
  exit 1
fi

java=$JAVA_HOME
if test -z "$java"; then
  echo 'No esta definida la variable de entorno JAVA_HOME'
  exit 1
fi
$java/bin/java -Djava.awt.headless=true $2 InformeJasper $1


