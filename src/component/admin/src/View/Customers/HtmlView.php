<?php

namespace Piedpiper\Component\Spm\Administrator\View\Customers;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\MVC\View\GenericDataException;

class HtmlView extends BaseHtmlView
{
    public $filterForm;
    public $state;
    public $items=[];
    public $pagination;
    public $activeFilters=[];

    public function display($tpl=null): void
    {
        $this->state      = $this->get('State');
        $this->items      = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->filterForm    = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');

        if (count($errors = $this->get('Errors'))) {
            throw new GenericDataException(implode("\n", $errors), 500);
        }

        parent::display($tpl);
    }
}
