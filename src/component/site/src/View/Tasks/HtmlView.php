<?php
namespace Piedpiper\Component\Spm\Site\View\Tasks;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    public $state;
    public $items=[];
    public $pagination;

    public function display($tpl=null): void
    {
        $this->state      = $this->get('State');
        $this->items      = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        parent::display($tpl);
    }
}

