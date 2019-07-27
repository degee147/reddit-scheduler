<div class="px-3">
    <?php echo $this->Form->create($user, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

    <div class="form-body">
        <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->
        <?php if (isset($show_fullname) && $show_fullname == false): ?>
        <?php else: ?>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="name"> Full Name:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('name', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                        <div class="form-control-position">
                            <i class="fa fa-user"></i>
                        </div>
                </div>
            </div>
        </div>
        <?php endif;?>


        <?php if (isset($show_othernames) && $show_othernames == false): ?>
        <?php else: ?>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="name"> First Name:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('firstname', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                        <div class="form-control-position">
                            <i class="fa fa-user"></i>
                        </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="name"> Last Name:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('lastname', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                        <div class="form-control-position">
                            <i class="fa fa-user"></i>
                        </div>
                </div>
            </div>
        </div>
        <?php endif;?>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="name"> Email:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('email', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                        <div class="form-control-position">
                            <i class="fa fa-envelope"></i>
                        </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="name"> Phone:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('phone', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter 11 digit phone number', 'autocomplete' => 'off', 'required', 'maxLength' => 11, 'minLength' => 11, 'pattern' => "\d*"])?>
                        <div class="form-control-position">
                            <i class="fa fa-phone"></i>
                        </div>
                </div>
            </div>
        </div>


        <?php if (isset($show_role) && $show_role == false): ?>
        <?php else: ?>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="roles._ids">Role
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <?=$this->Form->control('roles._ids', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $roles, 'empty' => true, 'label' => false, 'class' => 'form-control select2_multiple', "style" => "width: 100%", "multiple"]);?>
            </div>
        </div>
        <?php endif;?>

        <?php if (isset($show_password) && $show_password == false): ?>
        <?php else: ?>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="description">Password:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <p>The default password is
                        <strong>jankara</strong>
                    </p>
                    <p>User will be required to change their password</p>
                </div>
            </div>
        </div>
        <?php endif;?>



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

<script>
    jQuery(document).ready(function () {

        if ($('input[name=active2]').is(':checked')) {
            //alert("YES");
            $('input[name=active]').val(1);
        } else {
            //alert("NO");
            $('input[name=active]').val(0);
        }

        $('#active').change(function () {
            //$('input[name=high_priority]').val($('input[name=high_priority2]:checked').val());

            if ($(this).is(':checked')) {
                $('input[name=active]').val(1);
            } else {
                $('input[name=active]').val(0);
            }
        });
        $('#featured2').change(function () {
            //$('input[name=high_priority]').val($('input[name=high_priority2]:checked').val());

            if ($(this).is(':checked')) {
                $('input[name=featured]').val(1);
            } else {
                $('input[name=featured]').val(0);
            }
        });
    });

</script>
