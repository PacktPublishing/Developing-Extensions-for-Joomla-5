<?php

\defined('_JEXEC');

use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Factory;

$wam = Factory::getApplication()->getDocument()->getWebAssetManager();

$wam->useStyle('com_spm.projects');

?>

<form>
<div class="items-limit-box">
    <?php echo $this->pagination->getLimitBox(); ?>
</div>
<div class="cards row">
<?php foreach ($this->items as $item) : ?>
    <div class="card col m-1">
        <h2>
            <a href="<?php echo Route::_('index.php?option=com_spm&view=project&id=' . $item->id);?>"><?php echo $item->name; ?></a>
        </h2>
        <div id="project-id" class="meta">
            <?php echo $item->id; ?>
        </div>
        <div id="project-deadline" class="meta">
            <?php echo $item->deadline; ?>
        </div>
    </div>
<?php endforeach;?>
</div>
<p><?php echo $this->pagination->getResultsCounter(); ?></p>
<?php echo $this->pagination->getListFooter(); ?>
    <input type="hidden" name="task" value="projects">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>

