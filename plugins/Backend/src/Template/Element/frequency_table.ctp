<div class="table-responsive col-sm-12">
    <table class="table table-striped table-bordered file-export" id="<?=$idtouse?>">
        <thead>
            <tr>
                <th>S/N</th>
                <th width="60%">Fixture</th>
                <th>Date</th>
                <!-- <th width="18%">Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $sn = 1;foreach ($fixtures as $fixture): ?>
            <tr>
                <td>
                    <?=$sn++?>
                </td>
                <td>
                   <?= $fixture->home_team?> <span style="padding: 2px;" class="<?=$this->Custom->getFixtureClass($fixture)?>">&nbsp;<?= $fixture->home_score?> - <?= $fixture->away_score?>&nbsp;</span> <?= $fixture->away_team?>
                </td>
                <td>
                    <?=$this->Custom->strToDate($fixture->matchdate)?>
                </td>

                <!-- <td class="actions">
                    <?=$this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), ['controller' => 'Items', 'action' => 'deletefixtureRecord', $fixture->id], ['confirm' => __('Are you sure you want to delete this fixture record? Deleting a fixture record will alter stock level count for this item', $fixture->id), 'class' => 'btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm', 'escape' => false])?>
                </td> -->
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Fixture</th>
                <th>Date</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- File export table -->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- <script src="<?=$this->Url->build('/', true);?>app-assets/js/data-tables/datatable-advanced.js" type="text/javascript"></script> -->
<!-- END PAGE LEVEL JS-->

<?=$this->element('datatable_options', ["record_name" => 'fixtures', "record_count" => count(gettype($fixtures) == 'object' ? $fixtures->toArray() : $fixtures), 'specific_id' => $idtouse])?>
<script>
    $(document).ready(function () {




    });

</script>
