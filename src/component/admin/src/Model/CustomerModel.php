<?php

namespace Piedpiper\Component\Spm\Administrator\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Form\Form;

class CustomerModel extends AdminModel
{
    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_spm.customer', 'customer', array('control' => 'jform', 'load_data' => $loadData));

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $app = Factory::getApplication();
        $data = $app->getUserState('com_spm.edit.customer.data', array());

        if (empty($data)) {
            $data = $this->getItem();
        }
        $this->preprocessData('com_spm.customer', $data);
        return $data;
    }

    public function getTable($name = '', $prefix = '', $options = array())
    {
        $name = 'Customers';
        $prefix = 'Table';

        if ($table = $this->_createTable($name, $prefix, $options)) {
            return $table;
        }

        throw new \Exception(Text::sprintf('JLIB_APPLICATION_ERROR_TABLE_NAME_NOT_SUPPORTED', $name), 0);
    }
}

