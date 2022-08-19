# Eliasis WordPress plugin skeleton

[![Latest Stable Version](https://poser.pugx.org/eliasis-framework/wordpress-plugin/v/stable)](https://packagist.org/packages/eliasis-framework/wordpress-plugin)
[![License](https://poser.pugx.org/eliasis-framework/wordpress-plugin/license)](https://packagist.org/packages/eliasis-framework/wordpress-plugin)

[English version](README-ES.md)

![image](https://github.com/Eliasis-Framework/WordPress-Plugin/blob/master/resources/eliasis-wordpress-plugin.png)

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

Estructura para crear plugins WordPress con [Eliasis Framework](https://github.com/Eliasis-Framework/Eliasis).

### Instalación

Puedes instalar esta aplicación utilizando [Composer](http://getcomposer.org/download/). En la carpeta raíz de WordPress ejecutar:

    composer create-project --prefer-dist eliasis-framework/wordpress-plugin

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, excepciones no utilizadas, documentos...) puedes utilizar:

    composer create-project --prefer-source eliasis-framework/wordpress-plugin

También puedes clonar el repositorio completo con Git:

 <https://github.com/Eliasis-Framework/WordPress-Plugin.git>

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

App::run(dirname(__DIR__), 'wordpress-plugin', 'pluginOneId');

function getPublicPath() {
 
 App::pluginOneId('path', 'public');
}

# Plugin dos

App::run(dirname(__DIR__), 'wordpress-plugin', 'pluginTwoId');

function getPublicPath() {
 
 App::pluginTwoId('path', 'public');
}
```

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [GPL-2.0+ License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
