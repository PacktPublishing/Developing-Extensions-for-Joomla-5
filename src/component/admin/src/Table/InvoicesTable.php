<?php

namespace Piedpiper\Component\Spm\Administrator\Table;

\defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class InvoicesTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('#__spm_invoices', 'id', $db);
    }
}


