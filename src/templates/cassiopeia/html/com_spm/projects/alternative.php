<?php

use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Factory;

$wam = Factory::getApplication()->getDocument()->getWebAssetManager();
$wam->registerScript('jquery', 'https://code.jquery.com/jquery-3.7.0.min.js');
$wam->registerAndUseStyle('alternative', 'templates/cassiopeia/css/alternative.css');
$wam->disableStyle('com_spm.projects');
?>

<form>
<div class="items-limit-box">
    <?php echo $this->pagination->getLimitBox(); ?>
</div>
<div class="projects">
<?php foreach ($this->items as $item) : ?>
    <details>
        <summary>
            <?php echo $item->name; ?>
        </summary>
      <div class="details">
        <div class="project-id meta">
            <?php echo $item->id; ?>
        </div>
        <div class="project-deadline meta">
            <?php echo $item->deadline; ?>
        </div>
        <div class="project-link">
          <a href="<?php echo Route::_('index.php?option=com_spm&view=project&id=' . $item->id);?>">Go to project</a>
        </div>
      </div>

    </details>
<?php endforeach;?>
</div>
<p><?php echo $this->pagination->getResultsCounter(); ?></p>
<?php echo $this->pagination->getListFooter(); ?>
    <input type="hidden" name="task" value="projects">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>
