<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GeneralSetting $generalSetting
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $generalSetting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $generalSetting->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List General Settings'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->
<div class="generalSettings form large-9 medium-8 columns content">
    <?= $this->Form->create($generalSetting) ?>
    <fieldset>
        <legend><?= __('Edit General Settings') ?></legend>
        <?php
            echo $this->Form->control('hostname', ['label'=>'Hostname (No trailing slashes)']);
            echo $this->Form->control('ban_message', ['label'=>'Ban Message']);
            echo $this->Form->control('starting', ['empty' => true, 'label'=>'Start Date (YYYY-MM-DD HH:MM)']);
            //echo $this->Form->control('ending', ['empty' => true, 'label'=>'End Date (YYYY-MM-DD HH:MM)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
