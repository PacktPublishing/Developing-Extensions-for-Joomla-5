<?php

\defined('_JEXEC');

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo Route::_('index.php?option=com_spm&view=invoices'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="table-responsive">
        <table class="table table-striped">
            <caption><?php echo Text::_('COM_SPM_INVOICES_LIST');?></caption>
            <thead>
                <tr>
                    <td><?php echo Text::_('COM_SPM_INVOICES_LIST_ID');?></td>
                    <td><?php echo Text::_('COM_SPM_INVOICES_LIST_ITEMS');?></td>
                    <td><?php echo Text::_('COM_SPM_INVOICES_LIST_CUSTOMER');?></td>
                    <td><?php echo Text::_('COM_SPM_INVOICES_LIST_NUMBER');?></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $item) : ?>
                   <tr>
                   <td><?php echo $item->id; ?></td>
                   <td><?php echo $item->items; ?></td>
                   <td><?php echo $item->customer; ?></td>
                   <td><?php echo $item->number; ?></td>
                   </tr>
                <?php endforeach;?>
            </tbody>
            <tfooter>
                <?php echo $this->pagination->getListFooter(); ?>
            </tfooter>
        </table>
    </div>

    <input type="hidden" name="task" value="invoices">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>
