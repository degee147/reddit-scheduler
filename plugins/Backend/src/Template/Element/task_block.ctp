<h4 class="ml-2 mt-2 text-bold-500">
    <?=$block_title?>
</h4>
<div class='dragdrop-container' id='<?=$block_id?>' status="<?=$status?>">
    <?php if (!empty($tasks->toArray())): ?>
    <?php foreach ($tasks as $task): ?>
    <?php echo $this->element('task_single_card', ['task' => $task]) ?>
    <?php endforeach;?>
    <?php endif; ?>
</div>
<?php if (!empty($tasks->toArray())): ?>
<p class="text-center">
    <button type="button" class="btn btn-raised btn-info square btn-min-width mr-1 mb-1 text-center loadmore" status="1"
        page="2" target="<?=$block_id?>">Load
        More</button>
</p>
<?php endif; ?>
