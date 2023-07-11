<?php

\defined('_JEXEC');

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo Route::_('index.php?option=com_spm&view=tasks'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="table-responsive">
        <table class="table table-striped">
            <caption><?php echo Text::_('COM_SPM_TASKS_LIST');?></caption>
            <thead>
                <tr>
                    <td><?php echo Text::_('COM_SPM_TASKS_LIST_ID');?></td>
                    <td><?php echo Text::_('COM_SPM_TASKS_LIST_TITLE');?></td>
                    <td><?php echo Text::_('COM_SPM_TASKS_LIST_DESCRIPTION');?></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $item) : ?>
                   <tr>
                   <td><?php echo $item->id; ?></td>
                   <td><?php echo $item->title; ?></td>
                   <td><?php echo $item->description; ?></td>
                   </tr>
                <?php endforeach;?>
            </tbody>
            <tfooter>
                <?php echo $this->pagination->getListFooter(); ?>
            </tfooter>
        </table>
    </div>

    <input type="hidden" name="task" value="tasks">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>
