<?php

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');
?>

<form action="<?php echo Route::_('index.php?option=com_spm&view=customer&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="customer-form" class="form-validate">
    <div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $this->form->renderField('firstname'); ?>
                        <?php echo $this->form->renderField('lastname'); ?>
                        <?php echo $this->form->renderField('email'); ?>
                        <?php echo $this->form->renderField('company_name'); ?>
                        <?php echo $this->form->renderField('company_id'); ?>
                        <?php echo $this->form->renderField('company_address'); ?>
                        <?php echo $this->form->renderField('phone'); ?>
                        <?php echo $this->form->renderField('user'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="task" value="">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>
