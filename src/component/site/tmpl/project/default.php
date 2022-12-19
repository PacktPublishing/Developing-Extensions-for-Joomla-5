<?php

defined('_JEXEC');

?>
<div class="project-item p-4">
    <h1><?php echo $this->item->name; ?></h1>
    <div id="created" class="date meta">
        <?php echo $this->item->created;?>
    </div>
    <p id="description" class="description">
        <?php echo $this->item->description; ?>
    </p>
    <div id="deadline" class="date">
        <?php echo $this->item->deadline;?>
    </div>
</div>

