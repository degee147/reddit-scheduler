<div class="form-body">
    <div class="form-group row">
        <label class="col-md-3 label-control" for="name"> Name:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('name', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control name', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fa fa-briefcase"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control" for="address">Address:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('address', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control address', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'type' => 'textarea'])?>
                <div class="form-control-position">
                    <i class="ft-file"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 label-control" for="phone">Phone:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('phone', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control phone', 'placeholder' => '11 digit phone number', 'autocomplete' => 'off', 'maxLength' => 11, 'minLength' => 11, 'pattern' => "\d*"])?>
                <div class="form-control-position">
                    <i class="ft-file"></i>
                </div>
            </div>
        </div>
    </div>
</div>
