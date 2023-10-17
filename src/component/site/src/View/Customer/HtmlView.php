<?php

namespace Piedpiper\Component\Spm\Site\View\Customer;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\MVC\View\GenericDataException;

class HtmlView extends BaseHtmlView
{
    public $item;

    public function display($tpl=null): void
    {
        $this->item = $this->get('Item');


        $app = \Joomla\CMS\Factory::getApplication();
        $app->triggerEvent('onContentPrepare', ['com_spm.customer', &$this->item]);

        if (count($errors = $this->get('Errors'))) {
            throw new GenericDataException(implode("\n", $errors), 500);
        }

        parent::display($tpl);
    }
}

