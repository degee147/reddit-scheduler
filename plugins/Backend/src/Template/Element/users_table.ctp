<div class="table-responsive col-sm-12">
    <table class="table table-striped table-bordered server-side file-export" id="users_table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Username</th>
                <th>Images</th>
                <th>Albums</th>
                <th>Likes Rcvd</th>
                <th width="12%">Reg IP</th>
                <th width="5%">Actions</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Username</th>
                <th>Images</th>
                <th>Albums</th>
                <th>Likes Rcvd</th>
                <th width="12%">Reg IP</th>
                <th width="5%">Actions</th>
            </tr>
        </tfoot>
    </table>
</div>

<?=$this->element('datatable_options', ["record_name" => 'users', 'specific_id' => 'users_table', "ajax_table" => true, "autoreload" => false, "ajax_url" => $ajax_url])?>
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
