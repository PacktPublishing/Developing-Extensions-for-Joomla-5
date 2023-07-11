<?php

\defined('_JEXEC');

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo Route::_('index.php?option=com_spm&view=customers'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="table-responsive">
        <table class="table table-striped">
            <caption><?php echo Text::_('COM_SPM_CUSTOMERS_LIST');?></caption>
            <thead>
                <tr>
                    <td><?php echo Text::_('COM_SPM_CUSTOMERS_LIST_ID');?></td>
                    <td><?php echo Text::_('COM_SPM_CUSTOMERS_LIST_LASTNAME');?></td>
                    <td><?php echo Text::_('COM_SPM_CUSTOMERS_LIST_FIRSTNAME');?></td>
                    <td><?php echo Text::_('COM_SPM_CUSTOMERS_LIST_EMAIL');?></td>
                    <td><?php echo Text::_('COM_SPM_CUSTOMERS_LIST_COMPANY_NAME');?></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $item) : ?>
                   <tr>
                   <td><?php echo $item->id; ?></td>
                   <td><?php echo $item->lastname; ?></td>
                   <td><?php echo $item->firstname; ?></td>
                   <td><?php echo $item->email; ?></td>
                   <td><?php echo $item->company_name; ?></td>
                   </tr>
                <?php endforeach;?>
            </tbody>
            <tfooter>
                <?php echo $this->pagination->getListFooter(); ?>
            </tfooter>
        </table>
    </div>

    <input type="hidden" name="task" value="customers">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>
