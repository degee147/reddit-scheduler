<script>

    var <?=$specific_id . "_table"?>;

    jQuery(document).ready(function () {

        if (!$.fn.DataTable.isDataTable("<?='#' . $specific_id?>")) {

            <?=$specific_id . "_table"?> = $("<?='#' . $specific_id?>").DataTable({
                // dom: 'Blfrtip',
                <?php if (isset($ajax_table) && $ajax_table == true): ?>
                "processing": true,
                "serverSide": true,
                "ajax": {
                    'url':"<?=$ajax_url?>",
                    'data': function(data){

                        <?php if ($specific_id == "images_table"): ?>
                        data.age = $('#maxAge').val();
                        data.status_one = $('#status_one').val();
                        data.status_two = $('#status_two').val();                            
                        <?php endif;?>
                        
                    }
                },
                <?php endif;?>
                <?php if (isset($ordering) && $ordering == false): ?>
                "ordering": false,
                <?php endif;?>
                <?php if (isset($searching) && $searching == false): ?>
                "searching": false,
                <?php endif;?>
                <?php if (isset($paging) && $paging == false): ?>
                // dom: "<'row'<'col-4'irt><'col-4'B><'col-4'f>>t<'row'<'col-6'><'col-6'>>",
                dom: "<'row'<'col-4'><'col-4'B><'col-4'f>>rt<'row'<'col-6'><'col-6'>>",
                <?php else: ?>
                dom: "<'row'<'col-4'ltr><'col-4'B><'col-4'f>>t<'row'<'col-6'i><'col-6'p>>",
                <?php endif;?>
                "pagingType": "full_numbers",
                "paging": true,
                "lengthMenu": [10, 25, 50, 75, 100],
                <?php if (isset($export) && $export == false): ?>
                buttons: [],
                <?php else: ?>
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                <?php endif;?>
                <?php if (isset($ajaxify) && $ajaxify == true): ?>
                // "processing": true,
                //"serverSide": true,
                //"ajax": "<?=$this->Url->build('/', true);?>admin/orders/ajax",
                //"ajax": {
                //  "url": "<?=$this->Url->build('/', true);?>admin/orders/ajax", // ajax source
                //},
                <?php endif;?>
                "language": {
                    "emptyTable": "Not <?=!empty($record_count) ? $this->Custom->singularise($record_name, $record_count) : ''?> available at the moment",
                    "decimal": "",
                    "info": "Showing _START_ to _END_ of _TOTAL_ <?=$record_name?>",
                    "infoEmpty": "Showing 0 to 0 of 0 <?=$record_name?>",
                    "infoFiltered": "(filtered from _MAX_ total <?=!empty($record_count) ? $this->Custom->singularise($record_name, $record_count) : ''?>)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Show _MENU_ <?=$record_name?>",
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                    "search": "Search:",
                    "zeroRecords": "No matching <?=!empty($record_count) ? $this->Custom->singularise($record_name, $record_count) : ''?> records found",
                }
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
                'btn btn-outline-primary mr-1');



            <?php if (isset($autoreload) && $autoreload == true): ?>
            // setInterval(function () {
            //     table.ajax.reload(null, false);
            // }, 15000);

            <?php endif;?>

            <?php if ($specific_id == "images_table"): ?>

            $('#maxAge').keyup(function(){
                <?=$specific_id . "_table"?>.draw();
            });

            $('#status_one').change(function(){
                <?=$specific_id . "_table"?>.draw();
            });
            $('#status_two').change(function(){
                <?=$specific_id . "_table"?>.draw();
            });
            <?php endif;?>


        }



    });

</script>
