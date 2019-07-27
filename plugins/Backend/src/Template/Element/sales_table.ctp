<div class="table-responsive col-sm-12">
    <table class="table table-striped table-bordered file-export" id="<?=$idtouse?>">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Hot Deal</th>
                <th>Date</th>
                <!-- <th width="18%">Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $sn = 1;foreach ($sales as $sale): ?>
            <tr>
                <td>
                    <?=$sn++?>
                </td>
                <td>
                    <?=$this->Number->format($sale->quantity)?>
                </td>
                <td>
                    <?=$naira?>
                    <?=$this->Number->format($sale->price)?>
                </td>
                <td>
                    <?=$sale->hotdeal ? "Yes" : "No"?>
                </td>
                <td>
                    <?=$this->Time->timeAgoInWords($sale->created)?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Hot Deal</th>
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

<?=$this->element('datatable_options', ["record_name" => 'items', "record_count" => count(gettype($sales) == 'object' ? $sales->toArray() : $sales), 'specific_id' => $idtouse])?>
<script>
    $(document).ready(function () {




    });

</script>
