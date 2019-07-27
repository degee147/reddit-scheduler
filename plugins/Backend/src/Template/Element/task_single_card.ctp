<?php

$div_class = 'info';
$complete = false;
if ($task->task_status_id == 2) {
    $div_class = 'warning';
}
if ($task->task_status_id == 3) {
    $div_class = 'success';
    $complete = true;
}

?>
<div class="card" id="cardid<?=$task->id?>" taskid="<?=$task->id?>">
    <div class="card-block pt-3">
        <div class="clearfix">
            <h5 class="text-bold-500 <?=$div_class?> float-left">
                <?=!empty($task->user) ? $task->user->firstname : ''?>
            </h5>
            <div class="actions float-right">
                <?php if(!$complete):?>
                <button type="button" taskid="<?=$task->id?>" cardid="cardid<?=$task->id?>" class="complete_task btn btn-raised btn-icon
                    btn-success btn-sm"><i
                        class="ft-check"></i></button>
                <!-- <button type="button" id="<?='task_id' . $task->id?>" class="btn btn-raised btn-icon
                    btn-warning btn-sm"><i
                        class="ft-edit"></i></button> -->
                <?php endif;?>
                <?php if($userIsSuperAdmin ):?>
                <button taskid="<?=$task->id?>" cardid="cardid<?=$task->id?>" type="button" class="delete_task btn btn-raised btn-icon btn-danger btn-sm"><i class="ft-trash-2"></i></button>
                <?php endif;?>
            </div>
        </div>
        <p>
            <?=$task->name?>
        </p>
        <!-- <img src="../app-assets/img/portrait/small/avatar-s-1.png" class="rounded-circle width-50 mr-2"> -->
        <span class="<?=$div_class?>">
            <?=!empty($task->due_date) ? 'Due: ' . $this->Custom->niceShortestDate($task->due_date) : ''?></span>
    </div>
</div>
<?php echo $this->element('task_edit_swal', ['select_id' => 'task_id' . $task->id]) ?>
