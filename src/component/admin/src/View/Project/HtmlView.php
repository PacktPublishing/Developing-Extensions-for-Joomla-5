<?php

namespace Piedpiper\Component\Spm\Administrator\View\Project;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\Toolbar\Toolbar;
use Joomla\CMS\Toolbar\ToolbarHelper;

class HtmlView extends BaseHtmlView
{
    public $form;
    public $state;
    public $item;

    public function display($tpl=null): void
    {
        $this->form    = $this->get('Form');
        $this->state      = $this->get('State');
        $this->item      = $this->get('Item');

        if (count($errors = $this->get('Errors')))
        {
            throw new GenericDataException(implode("\n", $errors), 500);
        }

        $this->addToolbar();

        parent::display($tpl);
    }

    protected function addToolbar()
    {
        Factory::getApplication()->input->set('hidemainmenu', true);

        $isNew = ($this->item->id == 0);

        $canDo = ContentHelper::getActions('com_spm');

        $toolbar = Toolbar::getInstance();

        ToolbarHelper::title(
            Text::_('COM_SPM_PROJECT_TITLE_' . ($isNew ? 'ADD' : 'EDIT'))
        );

        if ($canDo->get('core.create'))
        {
            if ($isNew)
            {
                $toolbar->apply('project.save');
            }
            else
            {
                $toolbar->apply('project.apply');
            }
            $toolbar->save('project.save');

        }
        $toolbar->cancel('project.cancel', 'JTOOLBAR_CLOSE');
    }
}
