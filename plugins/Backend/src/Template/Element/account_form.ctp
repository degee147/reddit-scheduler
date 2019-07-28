<div class="form-body">
    <div class="form-group row">
        <label class="col-md-3 label-control" for="name"> Reddit Username:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('name', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control name', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 label-control" for="name"> Reddit Password:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('password', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control password', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required', 'type' => 'password'])?>
                <div class="form-control-position">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control" for="clientid">Client ID:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('clientid', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control clientid', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fa fa-key"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 label-control" for="client_secret">Client Secret:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('client_secret', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control client_secret', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
        </div>
    </div>
</div>
