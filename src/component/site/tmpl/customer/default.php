<?php

defined('_JEXEC');

?>
<div class="customer-item p-4">
    <h1><?php echo $this->item->firstname; ?>&nbsp;<?php echo $this->item->firstname; ?></h1>
    <div id="created" class="date meta">
        <?php echo $this->item->created;?>
    </div>
    <p id="company_name" class="company_name">
        <?php echo $this->item->company_name; ?>
    </p>
    <div id="company_address" class="company_address">
        <?php echo $this->item->company_address;?>
    </div>
</div>
<div id=”crm”>
    <?php foreach ($this->item->jcfields as $field) :?>
        <dl>
            <dt>
                <?php echo $field->label; ?>
            </dt>
            <dd>
                <?php echo $field->value; ?>
            </dd>
        </dl>
    <?php endforeach; ?>
</div>


