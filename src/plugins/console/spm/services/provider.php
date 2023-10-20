<?php

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Piedpiper\Plugin\Console\Spm\Extension\SpmConsolePlugin;

return new class implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $dispatcher = $container->get(DispatcherInterface::class);
                $plugin     = new SpmConsolePlugin(
                    $dispatcher,
                    (array) PluginHelper::getPlugin('console', 'spm')
                );

                return $plugin;
            }
        );
    }
};
