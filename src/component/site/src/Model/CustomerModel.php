<?php

namespace Piedpiper\Component\Spm\Site\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class CustomerModel extends BaseDatabaseModel
{
    protected $_item = null;

    protected function populateState()
    {
        $app = Factory::getApplication();

        $params = $app->getParams();

        $id = $app->input->getInt('id');

        $this->setState('customer.id', $id);

        $this->setState('customer.params', $params);
    }

    function getItem($pk = null)
    {
        $id = (int) $pk ?: (int) $this->getState('customer.id');

        if (!$id) {
            throw new \Exception('Missing customer id', 404);
        }

        if ($this->_item !== null && $this->_item->id != $id) {
            return $this->_item;
        }

        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('*')
            ->from($db->quoteName('#__spm_customers', 'a'))
            ->where('a.id = ' . (int) $id);

        $db->setQuery($query);

        $item = $db->loadObject();

        if (!empty($item)) {
            $this->_item = $item;
        }

        return $this->_item;
    }
}
