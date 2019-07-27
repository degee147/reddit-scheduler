<div class="px-3">
    <?php echo $this->Form->create($voucher, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

    <div class="form-body">
        <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->
        <div class="form-group row">
            <label class="col-md-3 label-control" for="code"> Code:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('code', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                    <div class="form-control-position">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="description">Description:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('description', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                    <div class="form-control-position">
                        <i class="ft-file"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-3 label-control">Amount:
            </label>
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <?=$naira?>
                        </span>
                    </div>
                    <?=$this->Form->control('amount', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'aria-label' => "Amount (to the nearest naira)", 'placeholder' => 'enter amount', 'autocomplete' => 'off', 'max' => 9999999, 'min' => 10])?>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-3 label-control" for="user_id">Assign to Customer</label>
            <div class="col-md-6">
                <?=$this->Form->control('user_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => [], 'empty' => true, 'label' => false, 'class' => 'form-control select2ajax', "id" => "select2ajax", "style" => "width: 100%"]);?>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-3 label-control" for="active" style="margin-top: 20px;">Active
            </label>
            <div class="col-md-6">
                <?=$this->Form->checkbox('active', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'option-input radio', isset($voucher->active) && $voucher->active == false ? '' : 'checked' => "checked"])?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="active" style="margin-top: 20px;">Percentage Voucher
            </label>
            <div class="col-md-6">
                <?=$this->Form->checkbox('percentage_voucher', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'option-input radio', isset($voucher->percentage_voucher) && $voucher->percentage_voucher == false ? '' : 'checked' => "checked"])?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="percent"> Percentage:
            </label>
            <div class="col-md-6">
                <?=$this->Form->control('percent', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter percent', 'autocomplete' => 'off', 'max' => 100, 'min' => 1, 'step' => 0.1])?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="expiration"> Expiration Date:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('expiration', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control datepicker', 'placeholder' => 'choose date', 'autocomplete' => 'off', 'required'])?>
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
</div>
<?=$this->element('ajax_dropdown', [
    'ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'GeneralActions', 'action' => 'getUsers']),
    'ajax_placeholder' => 'Find a customer',
])?>


<script>
    jQuery(document).ready(function () {

        $('#select2ajax').on('select2:select', function (e) {
            var data = e.params.data;
            var newOption = new Option(data.name, data.id, true, true);
            $('#select2ajax').append(newOption).trigger('change');
        });


    });

</script>
