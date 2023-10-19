<?php

namespace Piedpiper\Plugin\Content\ProjectLink\Extension;

use Joomla\Event\SubscriberInterface;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\Event;
use Piedpiper\Plugin\Content\ProjectLink\Helper\LinkHelper;

class ProjectLink extends CMSPlugin implements SubscriberInterface
{
    protected $autoloadLanguage = true;

    public static function getSubscribedEvents(): array
    {
        return [
        'onContentPrepare' => 'getProjectLink'
        ];
    }

    public function getProjectLink(Event $event)
    {
        $context = $event->getArgument('context');

        if (strpos($context, 'com_content.article') === false) {
            return;
        }

        $pattern = '/{projectlink\s([1-9[0-9]*)}/i';

        $article = $event->getArgument('1');

        if (str_contains($article->text, '{projectlink ')) {
            preg_match_all($pattern, $article->text, $matches, PREG_SET_ORDER);
            if ($matches) {
                foreach ($matches as $projectId) {
                    $id = trim($projectId[1]);
                    $projectLink = LinkHelper::formatProjectLink($id);
                    $shortcodeStart = strpos($article->text, $projectId[0]);

                    $article->text = substr_replace($article->text, $projectLink, $shortcodeStart, strlen($projectId[0]));
                }
            }

            $event->stopPropagation();
        }
    }
}
