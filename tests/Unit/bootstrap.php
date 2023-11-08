<?php

define('_JEXEC', 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('precision', 14);

$rootDirectory = '/home/piedpiper/dev/joomla';

if (!defined('JPATH_BASE')) {
    define('JPATH_BASE', $rootDirectory);
}

if (!defined('JPATH_ROOT')) {
    define('JPATH_ROOT', JPATH_BASE);
}

if (!defined('JPATH_PLATFORM')) {
    define('JPATH_PLATFORM', JPATH_BASE . DIRECTORY_SEPARATOR . 'libraries');
}

if (!defined('JPATH_LIBRARIES')) {
    define('JPATH_LIBRARIES', JPATH_BASE . DIRECTORY_SEPARATOR . 'libraries');
}

if (!defined('JPATH_CONFIGURATION')) {
    define('JPATH_CONFIGURATION', JPATH_BASE);
}

if (!defined('JPATH_SITE')) {
    define('JPATH_SITE', JPATH_ROOT);
}

if (!defined('JPATH_ADMINISTRATOR')) {
    define('JPATH_ADMINISTRATOR', JPATH_ROOT . DIRECTORY_SEPARATOR . 'administrator');
}

if (!defined('JPATH_CACHE')) {
    define('JPATH_CACHE', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'cache');
}

if (!defined('JPATH_API')) {
    define('JPATH_API', JPATH_ROOT . DIRECTORY_SEPARATOR . 'api');
}

if (!defined('JPATH_INSTALLATION')) {
    define('JPATH_INSTALLATION', JPATH_ROOT . DIRECTORY_SEPARATOR . 'installation');
}

if (!defined('JPATH_MANIFESTS')) {
    define('JPATH_MANIFESTS', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'manifests');
}

if (!defined('JPATH_PLUGINS')) {
    define('JPATH_PLUGINS', JPATH_BASE . DIRECTORY_SEPARATOR . 'plugins');
}

if (!defined('JPATH_THEMES')) {
    define('JPATH_THEMES', JPATH_BASE . DIRECTORY_SEPARATOR . 'templates');
}

if (!defined('JDEBUG')) {
    define('JDEBUG', false);
}

if (!class_exists('JLoader')) {
    require_once JPATH_PLATFORM . '/loader.php';

    // If JLoader still does not exist panic.
    if (!class_exists('JLoader')) {
        throw new RuntimeException('Joomla Platform not loaded.');
    }
}

JLoader::setup();

$loader = require JPATH_LIBRARIES . '/vendor/autoload.php';

class_exists('\\Joomla\\CMS\\Autoload\\ClassLoader');

$loader->unregister();

spl_autoload_register([new \Joomla\CMS\Autoload\ClassLoader($loader), 'loadClass'], true, true);

require_once JPATH_LIBRARIES . '/classmap.php';

require_once JPATH_LIBRARIES . '/namespacemap.php';
$extensionPsr4Loader = new \JNamespacePsr4Map();
$extensionPsr4Loader->load();

defined('JVERSION') or define('JVERSION', (new \Joomla\CMS\Version())->getShortVersion());


