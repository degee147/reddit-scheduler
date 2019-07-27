<?php echo $this->Form->create($region, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

<div class="form-body">
    <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->
    <div class="form-group row">
        <label class="col-md-3 label-control" for="name"> Name:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('name', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fa fa-briefcase"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control" for="state_id">State
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <?=$this->Form->control('state_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $states, 'empty' => true, 'label' => false, 'class' => 'form-control select2', "style" => "width: 100%"]);?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control" for="jankara_express" style="margin-top: 20px;">Jankara Express
        </label>
        <div class="col-md-6">
            <?=$this->Form->checkbox('jankara_express', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'option-input radio', isset($region->jankara_express) && $region->jankara_express == false ? '' : 'checked' => "checked"])?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control">Small Item Delivery Fee:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <?=$naira?>
                    </span>
                </div>
                <?=$this->Form->control('small_item_fee', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 10])?>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control">Small Item Max:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <?=$naira?>
                    </span>
                </div>
                <?=$this->Form->control('small_item_maximum', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 10])?>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control">Medium Item Delivery Fee:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <?=$naira?>
                    </span>
                </div>
                <?=$this->Form->control('medium_item_fee', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 10])?>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control">Medium Item Max:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <?=$naira?>
                    </span>
                </div>
                <?=$this->Form->control('medium_item_maximum', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 10])?>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control">Large Item Delivery Fee:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <?=$naira?>
                    </span>
                </div>
                <?=$this->Form->control('large_item_fee', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 10])?>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control">Large Item Max:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <?=$naira?>
                    </span>
                </div>
                <?=$this->Form->control('large_item_maximum', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'required', 'max' => 9999999, 'min' => 10])?>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
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
