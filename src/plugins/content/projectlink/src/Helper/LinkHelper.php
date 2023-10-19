<?php

namespace Piedpiper\Plugin\Content\ProjectLink\Helper;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Layout\LayoutHelper;


class LinkHelper
{
    public static function formatProjectLink($id)
    {
        $link = Text::_('PLG_CONTENT_PROJECTLINK_PROJECT_NOT_FOUND');

        $app = Factory::getApplication();

        $model = $app
            ->bootComponent('com_spm')
            ->getMVCFactory()
            ->createModel(
                'Project',
                'Site',
                ['ignore_request' => true]
            );

        $item = $model->getItem($id);

        if ($item) {
            $item->url = Route::_(
                'index.php?option=com_spm&view=project&id=' . $item->id
            );
            $layoutFile = PluginHelper::getLayoutPath(
                'content',
                'projectlink',
                'link'
            );

            ob_start();
            include $layoutFile;
            $link = ob_get_clean();

        }

        return $link;
    }
}
