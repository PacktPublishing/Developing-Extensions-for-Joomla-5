<?php
defined('_JEXEC');

?>
<div class="task-item p-4">
    <h1><?php echo $this->item->title; ?></h1>
    <div id="created" class="date meta">
        <?php echo $this->item->created;?>
    </div>
    <p id="description" class="description">
        <?php echo $this->item->description; ?>
    </p>
    <div id="deadline" class="date">
        <?php echo $this->item->deadline; ?>
    </div>
</div>

