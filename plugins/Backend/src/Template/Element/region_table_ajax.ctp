<table class="table table-striped table-bordered file-export index_table custom_table" id="index_table">
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
<?=$this->element('datatable_options', ["record_name" => 'regions', "record_count" => count(gettype($regions) == 'object' ? $regions->toArray() : $regions), 'specific_id' => 'index_table', "ajax_table" => true, "ajax_url" => $this->Url->build(['prefix' => false, 'controller' => 'Regions', 'action' => 'getRegionsAjax'])])?>
