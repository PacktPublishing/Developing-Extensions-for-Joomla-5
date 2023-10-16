<?php
namespace Piedpiper\Component\Spm\Site\Service;

defined('_JEXEC') or die;

use Joomla\CMS\Categories\Categories;

class Category extends Categories
{
    public function __construct($options)
    {
        $options = array_merge(
            $options, [
            'extension'  => 'com_spm',
            'table'      => '#__projects',
            'field'      => 'category',
            'key'        => 'id',
            'statefield' => 'state',
            ]
        );

        parent::__construct($options);
    }

}
