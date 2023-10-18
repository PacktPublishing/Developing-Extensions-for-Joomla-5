<?php

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Router\Route;

class PlgWebservicesSpm extends CMSPlugin
{
    public function onBeforeApiRoute(&$router)
    {
        $router->createCRUDRoutes(
            'v1/projects',
            'projects',
            ['component' > 'com_spm']
        );

        $router->createCRUDRoutes(
            v1/projects/categories’,
            'categories',
            ['component' => 'com_categories', 'extension' => 'com_spm'],
            true
        );

        $route = new Route(
            ['GET'],
            'v1/invoices',
            'invoices.displayItem',
            ['id' => '(\d+)'],
            ['component' => 'com_spm']
        );
        $router->addRoute($route);

        $route = new Route(
            ['POST'],
            'v1/invoices',
            'invoices.add',
            [],
            ['component' => 'com_spm']
        );
        $router->addRoute($route);

    }
}
