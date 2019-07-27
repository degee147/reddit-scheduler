<div class="table-responsive col-sm-12">
    <table class="table table-striped table-bordered server-side file-export" id="teams_table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>GT</th>
                <th>0G</th>
                <th>0G%</th>
                <th>0GP</th>
                <th>1G</th>
                <th>1G%</th>
                <th>1GP</th>
                <th>2G</th>
                <th>2G%</th>
                <th>2GP</th>
                <th>3G</th>
                <th>3G%</th>
                <th>3GP</th>
                <th>4G</th>
                <th>4G%</th>
                <th>4GP</th>
                <th>5G</th>
                <th>5G%</th>
                <th>5GP</th>
                <th>6G</th>
                <th>6G%</th>
                <th>6GP</th>
                <!-- <th>Url</th> -->
                <!-- <th>Category</th> -->
                <!-- <th>Created</th> -->
                <!-- <th>Modified</th> -->
                <th width="18%">Actions</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>GT</th>
                <th>1G</th>
                <th>1G%</th>
                <th>1GP</th>
                <th>2G</th>
                <th>2G%</th>
                <th>2GP</th>
                <th>3G</th>
                <th>3G%</th>
                <th>3GP</th>
                <th>4G</th>
                <th>4G%</th>
                <th>4GP</th>
                <th>5G</th>
                <th>5G%</th>
                <th>5GP</th>
                <th>6G</th>
                <th>6G%</th>
                <th>6GP</th>
                <!-- <th>Url</th> -->
                <!-- <th>Category</th> -->
                <!-- <th>Created</th> -->
                <!-- <th>Modified</th> -->
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>

<?=$this->element('datatable_options', ["record_name" => 'teams', 'specific_id' => 'teams_table', "ajax_table" => true, "autoreload" => false, "ajax_url" => $this->Url->build(['prefix' => false, 'controller' => 'Teams', 'action' => 'getTeamsAjaxDatatable'])])?>
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



    });

</script>
