<?php

namespace Piedpiper\Component\Spm\Api\View\Projects;

use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;

class JsonapiView extends BaseApiView
{
    protected $fieldsToRenderList = [
        'id',
        'title'
    ];

    protected $fieldsToRenderItem = [
        'id',
        'title',
        'description'
    ];

}

