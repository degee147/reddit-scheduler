<div class="table-responsive col-sm-12">
    <table class="table table-striped table-bordered server-side file-export" id="images_table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Image</th>
                <!-- <th>Title</th> -->
                <th width="12%">Upload IP</th>
                <th>Safe</th>
                <th>API Scan</th>
                <th>Status</th>
                <th>Age</th>
                <th>Username</th>
                <th width="15%">Actions</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Image</th>
                <!-- <th>Title</th> -->
                <th width="12%">Upload IP</th>
                <th>Safe</th>
                <th>API Scan</th>
                <th>Status</th>
                <th>Age</th>
                <th>Username</th>
                <th width="15%">Actions</th>
            </tr>
        </tfoot>
    </table>
</div>

<?=$this->element('datatable_options', ["record_name" => 'images', 'specific_id' => 'images_table', "ajax_table" => true, "autoreload" => false, "ajax_url" => $ajax_url])?>
<script>
    /*=========================================================================================
    File Name: datatables-sources.js
    Description: Sources Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Apex - Responsive Admin Theme
    Version: 2.1
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

    $(document).ready(function () {

        /**************************************
         *       Server-side processing        *
         **************************************/


    });

</script>
