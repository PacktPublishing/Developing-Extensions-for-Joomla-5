<ul class="mod-projects-list">
<?php foreach ($projects as $item) : ?>
    <li>
        <?php echo $item->name; ?>
        <?php echo $item->deadline; ?>
    </li>
<?php endforeach; ?>
</ul>
