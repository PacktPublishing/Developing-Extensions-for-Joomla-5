<?php

\defined('_JEXEC');

use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Factory;

?>

<form>
    <div class="items-limit-box">
        <?php echo $this->pagination->getLimitBox(); ?>
    </div>
    <div>
        <?php foreach ($this->items as $item) : ?>
            <div>
                <h2>
                    <?php echo $item->name; ?>
                </h2>
                <div id="project-id">
                    <?php echo $item->id; ?>
                </div>
                <div id="project-deadline">
                    <?php echo $item->deadline; ?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div>
        <?php echo $this->pagination->getResultsCounter(); ?>
    </div>

    <?php echo $this->pagination->getListFooter(); ?>
    <input type="hidden" name="task" value="projects">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>


