<<<<<<< HEAD
Copyright [2021] [Juan José Baeza López]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

-----------
web-checker
-----------

Webchecker es una pequeña utilidad que compara el contenido de la página principal de uno o varios websites descargando una copia en local del fichero index y 
comparándolo con el archivo que está online en Internet.

Se tienen en cuenta varios parámetros como el Status Code, número de lineas en el archivo, % de diferencia entre local y online.

Hay dos parámetros que establecer que se encuentran en el directorio config, son:

$basepath -> definiremos la URL desde donde llamamos a webchecker, puede ser IP, subdirectorio, subdominio.
$webs     -> está compuesto por un array de sitios web a comprobar, pueden estar activos (1) o desactivados (0), no se comprueban.
$correo   -> dirección del destinatario de correo al cual llega el informe del estado de las webs.

Para recibir por correo automáticamente un informe se puede agregrar al cron una tarea programada del tipo:

0 17 * * * root curl webchecker.intranet.com/sys/informe.php > /dev/null

Sugerencias, cambios y mejoras son bienvenidos.

Saludos!
=======
web-checker

Es una pequeña utilidad que descarga una copia en local del fichero index de un website y lo compara con el archivo que está online. 

Se tienen en cuenta varios parámetros como el Status Code, número de lineas en el archivo, % de diferencia...
>>>>>>> a0139e189c3683b85a9dcd1c6f3f167e5f3b4afe
