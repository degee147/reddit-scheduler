<div class="form-body">
    <div class="form-group row">
        <label class="col-md-3 label-control" for="name"> Username:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('username', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control username', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control" for="password">Password:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('password', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control password', 'placeholder' => 'enter text', 'autocomplete' => 'off'])?>
                <div class="form-control-position">
                    <i class="fa fa-key"></i>
                </div>
            </div>
        </div>
    </div>
</div>
