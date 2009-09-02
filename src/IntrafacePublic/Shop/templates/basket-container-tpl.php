<div id="middle">
    <div class="breadcrumb2">
        <h2><?php e(__(ucfirst($headline))); ?></h2>


<?php if(isset($this->document->purchase_steps) && is_array($this->document->purchase_steps) AND $this->getSubspace() != ''): ?>
    <ul>
    <?php foreach($this->document->purchase_steps as $step): ?>
        <li<?php if($step == $this->document->current_step) echo ' class="current"'; ?>>
            <?php e(ucfirst(__($step))); ?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

</div>

<?php echo $error; ?>

<?php echo $content; ?>
</div>
