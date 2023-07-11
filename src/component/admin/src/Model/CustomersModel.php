<?php

namespace Piedpiper\Component\Spm\Administrator\Model;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;
use Joomla\CMS\Factory;

class CustomersModel extends ListModel
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'firstname', 'a.firstname',
                'lastname', 'a.lastname',
                'email', 'a.email',
                'company_name', 'a.company_name',
            );
        }

        parent::__construct($config);
    }

    protected function populateState($ordering = 'lastname', $direction = 'ASC')
    {
        $app = Factory::getApplication();
        $value = $app->input->get('limit', $app->get('list_limit', 0), 'uint');
        $this->setState('list.limit', $value);

        $value = $app->input->get('limitstart', 0, 'uint');
        $this->setState('list.start', $value);

        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        parent::populateState($ordering, $direction);
    }

    protected function getListQuery()
    {
        $db    = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select(
            $this->getState(
                'list.select',
                [
                    $db->quoteName('a.id'),
                    $db->quoteName('a.firstname'),
                    $db->quoteName('a.lastname'),
                    $db->quoteName('a.email'),
                    $db->quoteName('a.company_name')
                ]
            )
        )->from($db->quoteName('#__spm_customers', 'a'));

        $search = $this->getState('filter.search');

        if (!empty($search)) {
            $search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
            $query->where('(a.name LIKE ' . $search . ')');
        }

        $orderCol  = $this->state->get('list.ordering', 'a.lastname');
        $orderDirn = $this->state->get('list.direction', 'ASC');

        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
        return $query;
    }
}
