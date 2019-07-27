<table class="table table-striped table-bordered file-export" id="region_table">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>State</th>
            <th>Express</th>
            <th>Small</th>
            <th>Medium</th>
            <th>Large</th>
            <th>Created</th>
            <th>Modified</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $sn = 1;foreach ($regions as $region): ?>
        <tr>
            <td>
                <?=$sn++?>
            </td>
            <td>
                <?=ucwords($region->name)?> 
            </td>
            <td>
                <?=h($region->state->name)?>
            </td>
            <td>
                <?=$region->jankara_express ? "Yes" : "No"?>
            </td>
            <td>
                <?=$naira . number_format($region->small_item_fee)?> <br>
                Max:
                <?=$naira . number_format($region->small_item_maximum)?> <br>

            </td>
            <td>
                <?=$naira . number_format($region->medium_item_fee)?>
                Max:
                <?=$naira . number_format($region->medium_item_maximum)?> <br>
            </td>
            <td>
                <?=$naira . number_format($region->large_item_fee)?>
                Max:
                <?=$naira . number_format($region->large_item_maximum)?> <br>
            </td>


            <td>
                <?=$this->Time->timeAgoInWords($region->created)?>
            </td>
            <td>
                <?=$this->Time->timeAgoInWords($region->modified)?>
            </td>
            <td class="actions">

                <?=$this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $region->id], ['class' => 'btn btn-xs btn-raised btn-warning btn-icon mr-1 btn-sm', 'escape' => false])?>
                <?=$this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id), 'class' => 'btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm', 'escape' => false])?>


            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>State</th>
            <th>Express</th>
            <th>Small</th>
            <th>Medium</th>
            <th>Large</th>
            <th>Created</th>
            <th>Modified</th>
            <th width="15%">Action</th>
        </tr>
    </tfoot>
</table>
<?=$this->element('datatable_options', ["record_name" => 'regions', 'specific_id' => "region_table", "record_count" => count($regions)])?>