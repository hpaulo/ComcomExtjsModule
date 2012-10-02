# ComcomExtjsModule
## Loading Extjs Applications from your modules

This Zend Framework 2 module allows running Extjs application without the need
to copy them over into your `public/` directory every time. The aim of this
package is to leave classes used within your Extjs applications within the
modules that ship them.

## Installation:

Installation uses composer, and is as simple as running composer in your
application root:

```sh
$ composer require  comcom/comcom-extjs-module
```

To enable the module, you will need to edit your `config/application.config.php`
file and add following to its `modules` section:

```php
'AssetManager',
'ComcomExtjsModule',
```

## Usage:

TBD. This module is still a WIP

## Todos

 * Generation of `app.js` file
 * Attaching of `app.js` and required JS/CSS files through a view helper
 * Compiling assets through `sencha` CLI tools
 * Automatical downloading/unpacking of Extjs in the module dir