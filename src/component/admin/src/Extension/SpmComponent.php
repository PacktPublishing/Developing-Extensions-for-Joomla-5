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
use Joomla\CMS\Fields\FieldsServiceInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;


class SpmComponent extends MVCComponent implements CategoryServiceInterface, BootableExtensionInterface, RouterServiceInterface, FieldsServiceInterface
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
            'com_spm.project'    => Text::_('COM_SPM_CONTEXT_PROJECTS'),
            'com_spm.client'    => Text::_('COM_SPM_CONTEXT_CLIENTS')
        );

        return $contexts;
    }

    public function validateSection($section, $item = null)
    {
        if (($section === 'customer')) {
            $section = 'client';
        }

        if (Factory::getApplication()->isClient('site') && ($section === 'project')) {
            $section = 'project';
        }

        if ($section !== 'project' && $section !== 'client') {
            return null;
        }

        return $section;
    }

}
