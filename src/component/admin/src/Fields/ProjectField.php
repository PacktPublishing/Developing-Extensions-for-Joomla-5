<?php

namespace Piedpiper\Component\Spm\Administrator\Fields;

use Joomla\CMS\Form\Field\ListField;
use Joomla\CMS\Factory;

class ProjectField extends ListField
{
    protected $type = 'Project';

    public function getOptions()
    {
        $db = Factory::getDbo();

        $query = $db->getQuery(true);

        $query->select('id, name')
            ->from('#__spm_projects')
            ->order('name', 'asc');

        $db->setQuery($query);

        $options = $db->loadAssocList('id', 'name');

        return $options;
    }
}

