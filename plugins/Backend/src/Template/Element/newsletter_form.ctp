<?php echo $this->Form->create($newsletter, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?> 

<div class="form-body">
    <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->
    <div class="form-group row">
        <label class="col-md-3 label-control" for="email"> Email:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('email', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter email', 'autocomplete' => 'off', 'required'])?>
                <div class="form-control-position">
                    <i class="fa fa-envelope"></i>
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
