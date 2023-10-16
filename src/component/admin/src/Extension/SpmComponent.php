<?php

namespace Piedpiper\Component\Spm\Administrator\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Extension\BootableExtensionInterface;
use Joomla\CMS\Extension\MVCComponent;
use Psr\Container\ContainerInterface;
use Joomla\CMS\Component\Router\RouterServiceTrait;
use Joomla\CMS\Component\Router\RouterServiceInterface;
use Joomla\CMS\Categories\CategoryServiceTrait;
use Joomla\CMS\Categories\CategoryServiceInterface;

class SpmComponent extends MVCComponent implements CategoryServiceInterface, BootableExtensionInterface, RouterServiceInterface
{
    use RouterServiceTrait;
    use CategoryServiceTrait;

    public function boot(ContainerInterface $container)
    {
    }

    public function getContexts(): array
    {
        Factory::getLanguage()->load('com_spm', JPATH_ADMINISTRATOR);

        $contexts = array(
            'com_spm.project'    => Text::_('Project'),
            'com_spm.client'    => Text::_('Client')
        );

        return $contexts;
    }

}
