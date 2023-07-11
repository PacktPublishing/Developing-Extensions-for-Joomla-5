<?php

namespace Piedpiper\Component\Spm\Administrator\Table;

\defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class CustomersTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('#__spm_customers', 'id', $db);
    }
}


