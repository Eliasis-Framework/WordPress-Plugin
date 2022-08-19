# Eliasis WordPress plugin skeleton

[![Latest Stable Version](https://poser.pugx.org/eliasis-framework/wordpress-plugin/v/stable)](https://packagist.org/packages/eliasis-framework/wordpress-plugin)
[![License](https://poser.pugx.org/eliasis-framework/wordpress-plugin/license)](https://packagist.org/packages/eliasis-framework/wordpress-plugin)

[Versión en español](README-ES.md)

![image](https://github.com/Eliasis-Framework/WordPress-Plugin/blob/master/resources/eliasis-wordpress-plugin.png)

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Sponsor](#Sponsor)
- [License](#license)

---

A skeleton for creating WordPress plugins with [Eliasis Framework](https://github.com/Eliasis-Framework/Eliasis).

### Installation

You can install this application using [Composer](http://getcomposer.org/download/). In the root folder of WordPress run:

    composer create-project --prefer-dist eliasis-framework/wordpress-plugin

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, exceptions not used, docs...) you can use:

    composer create-project --prefer-source eliasis-framework/wordpress-plugin

Or you can also clone the complete repository with Git:

 <https://github.com/Eliasis-Framework/WordPress-Plugin.git>

### Requirements

This framework is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

### Quick Start and Examples

To use Eliasis PHP Framework in a plugin, simply:

```php
$DS = DIRECTORY_SEPARATOR;

require dirname(__DIR__) . $DS . 'lib' . $DS . 'vendor' . $DS .'autoload.php';

use Eliasis\App\App;

App::run(dirname(__DIR__), 'wordpress-plugin', 'unique_id');

/**
 * The unique id is used to run Eliasis on several 
 * WordPress plugins without any conflict between them.
 *
 * Let's tell the App class the plugin that is in use using:
 * App::unique_id('namespace')
 *
 * For example:
 */

# Plugin one

App::run(dirname(__DIR__), 'wordpress-plugin', 'pluginOneId');

function getPublicPath() {
 
 App::pluginOneId('path', 'public');
}

# Plugin two

App::run(dirname(__DIR__), 'wordpress-plugin', 'pluginTwoId');

function getPublicPath() {
 
 App::pluginTwoId('path', 'public');
}
```

### Contribute

1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Licensing

This project is licensed under **GPL-2.0+**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [GPL-2.0+ License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius#contact)
