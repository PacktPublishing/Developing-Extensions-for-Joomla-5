<?php

namespace Piedpiper\Component\Spm\Site\View\Project;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\Factory;
use Joomla\CMS\Event\AbstractEvent;
use Joomla\CMS\Plugin\PluginHelper;

class HtmlView extends BaseHtmlView
{
    public $item;

    public function display($tpl=null): void
    {
        $this->item = $this->get('Item');

		$article       = new \stdClass();
    	$article->text = $this->item->description;

    	$event = AbstractEvent::create(
        	'onContentPrepare',
        	[
            	'context' => 'com_spm.project',
            	'article' => $article
        	];
		);
            	
    	PluginHelper::getPlugin('content', 'projectlink')

    	Factory::getApplication()->getDispatcher()->dispatch('onContentPrepare', $event);

    	$this->item->description = $article->text;


        if (count($errors = $this->get('Errors')))
        {
            throw new GenericDataException(implode("\n", $errors), 500);
        }

        parent::display($tpl);
    }
}

