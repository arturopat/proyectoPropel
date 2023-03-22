#!/bin/bash
# -*- ENCODING: UTF-8 -*-
echo "############.....CREANDO MODELO ORM"
./propel-gen demosexto om
# -*- ENCODING: UTF-8 -*-
echo "############.....ENTRANDO A DIRECTORIO"
cd demosexto
echo "############.....GENERACION DE SQL E INSERTARLO EN EL mysql"
.././propel-gen sql
.././propel-gen insert-sql
echo "############.....SALIENDO DE DIRECTORIO sisittmodeldev"
cd ..
echo "############.....GENERACION DE LA CONFIGURACION ORM PROPEL"
./propel-gen demosexto convert-conf
exit
