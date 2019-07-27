<?php echo $this->Form->create($hotdeal, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

<div class="form-body">
    <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->

    <div class="form-group row">
        <label class="col-md-3 label-control" for="item_id">Item/Product
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <?=$this->Form->control('item_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => [], 'empty' => true, 'label' => false, 'class' => 'form-control select2ajax', "id" => "item_id", "style" => "width: 100%", 'required']);?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control">Deal Price:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <?=$naira?>
                    </span>
                </div>
                <?=$this->Form->control('price', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control deal_price', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 10])?>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control" for="expiration_date"> Expiration Date:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('expiration_date', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control datepicker', 'placeholder' => 'choose date', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fas fa-calendar-alt"></i>
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
    'ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'GeneralActions', 'action' => 'getItems']),
    'ajax_placeholder' => 'Find an item',
    'select_id' => 'item_id',
    'minimumInputLength' => 1,
])?>

<script>
    $(document).ready(function () {

        <?php if($this->request->getParam('action') == 'edit'): ?>
        setTimeout(function () {
            var newOption = new Option("<?=$hotdeal->item->name . ' ('. $hotdeal->item->main_price . ')'?>", "<?=$hotdeal->item_id?>", true, true);
            $('#item_id').append(newOption).trigger('change');
        }, 4000);
        <?php endif;?>


    });

</script>
