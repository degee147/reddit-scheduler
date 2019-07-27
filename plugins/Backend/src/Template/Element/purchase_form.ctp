<?php echo $this->Form->create($purchase, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

<div class="form-body">
    <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->

    <div class="form-group row">
        <label class="col-md-3 label-control" for="supplier_id">Supplier / Vendor
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <?=$this->Form->control('supplier_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => [], 'empty' => true, 'label' => false, 'id' => 'supplier_id', 'class' => 'form-control noselectinit', "style" => "width: 100%", 'required']);?>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-default waves-effect btn-round swal" onclick="return false;" data-type="add-supplier">New
                Supplier</button>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control" for="quantity">Quantity:        
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('quantity', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter number', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 1])?>
                <div class="form-control-position">
                    <i class="ft-file"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 label-control" for="unit_cost">Unit Cost:        
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('unit_cost', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 1])?>
                <div class="form-control-position">
                    <i class="ft-file"></i>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="form-actions">


    <div class="row clearfix">
        <div class="col-sm-9 offset-3">
            <?=$this->Form->button(__(' <i class="fa fa-check-square-o"></i> Save'), ['class' => 'btn btn-raised btn-primary']);?>
        </div>
    </div>

</div>
<?=$this->Form->end()?>
<?=$this->element('ajax_dropdown', [
    'ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'GeneralActions', 'action' => 'getSuppliersJson']),
    'ajax_placeholder' => 'Choose a Supplier', 
    'select_id' => 'supplier_id',
    'minimumInputLength' => 0
])?>
<?php echo $this->element('add_supplier_swal', ['select_id' => 'supplier_id']) ?>