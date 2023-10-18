<?php

namespace Piedpiper\Module\ProjectsList\Site\Dispatcher;
use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;
use Joomla\Registry\Registry;

class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
    use HelperFactoryAwareTrait;

    protected function getLayoutData()
    {
        $settings = new Registry($this->module->params);
        $data = parent::getLayoutData();
        $data['projects'] = $this->getHelperFactory()->getHelper('ProjectsListHelper')->getProjects($data['params'], $this->getApplication());
        return $data;
    }
}

