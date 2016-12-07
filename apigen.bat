@rem *** Instrucciones ****
@rem Descarga "apigen.phar" (http://www.apigen.org/) y copialo en una carpeta, la que quieras.
@rem Inicializa las variables PHP_PATH y APIGEN_PATH
@rem 	- PHP_PATH = ruta del fichero "php.exe" que estará en la carpeta php de XAMMP
@rem 	- APIGEN_PATH = ruta del fichero "apigen.phar"

@set PHP_PATH=C:\XAMPP\php
@set APIGEN_PATH=C:\XAMPP\htdocs\Problema1

%PHP_PATH%\php.exe %APIGEN_PATH%\apigen.phar %1 %2 %3 %4 %5 %6 %7 %8 %9

apigen generate -s C:\XAMPP\htdocs\Problema1\app -d C:\XAMPP\htdocs\Problema1\Doc