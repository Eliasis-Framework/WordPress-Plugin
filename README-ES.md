# Eliasis WordPress plugin skeleton

[![Latest Stable Version](https://poser.pugx.org/eliasis-framework/wordpress-plugin/v/stable)](https://packagist.org/packages/eliasis-framework/wordpress-plugin) [![Total Downloads](https://poser.pugx.org/eliasis-framework/wordpress-plugin/downloads)](https://packagist.org/packages/eliasis-framework/wordpress-plugin) [![Latest Unstable Version](https://poser.pugx.org/eliasis-framework/wordpress-plugin/v/unstable)](https://packagist.org/packages/eliasis-framework/wordpress-plugin) [![License](https://poser.pugx.org/eliasis-framework/wordpress-plugin/license)](https://packagist.org/packages/eliasis-framework/wordpress-plugin)

[English version](README-ES.md)

![image](https://github.com/Eliasis-Framework/WordPress-Plugin/blob/master/resources/eliasis-wordpress-plugin.png)

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

Estructura para crear plugins WordPress con [Eliasis Framework](https://github.com/Eliasis-Framework/Eliasis).

### Instalación 

Puedes instalar esta aplicación utilizando [Composer](http://getcomposer.org/download/). En la carpeta raíz de WordPress ejecutar:

    $ composer create-project --prefer-dist eliasis-framework/wordpress-plugin

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, excepciones no utilizadas, documentos...) puedes utilizar:

    $ composer create-project --prefer-source eliasis-framework/wordpress-plugin

También puedes clonar el repositorio completo con Git:

	$ https://github.com/Eliasis-Framework/WordPress-Plugin.git

### Requisitos

Este plugin es soportado por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Cómo empezar y ejemplos

Para utilizar Eliasis PHP Framework en un plugin, simplemente:

```php
$DS = DIRECTORY_SEPARATOR;

require dirname(__DIR__) . $DS . 'lib' . $DS . 'vendor' . $DS .'autoload.php';

use Eliasis\App\App;

App::run(dirname(__DIR__), 'wordpress-plugin', 'unique_id');

/**
 * El id único es utilizado para poder ejecutar Eliasis PHP Framework
 * en varios plugins de WordPress sin que haya conflicto entre ellos.
 *
 * Indicamos a la clase App el plugin que está en uso de la siguiente manera:
 * App::unique_id('namespace')
 *
 * Por ejemplo:
 */

# Plugin uno

App::run(dirname(__DIR__), 'wordpress-plugin', 'plugin-uno-id');

function getPublicPath() {
	
	App::plugin-one-id('path', 'public');
}

# Plugin dos

App::run(dirname(__DIR__), 'wordpress-plugin', 'plugin-dos-id');

function getPublicPath() {
	
	App::plugin-two-id('path', 'public');
}
```

### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Licencia

Este proyecto está licenciado bajo **GPL-2.0+**. Consulta el archivo [LICENSE](LICENSE) para más información.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).