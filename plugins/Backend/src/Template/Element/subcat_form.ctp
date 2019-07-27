<?php echo $this->Form->create($subcategory, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

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
        <label class="col-md-3 label-control" for="category_id">Category
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <?=$this->Form->control('category_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $categories, 'empty' => true, 'label' => false, 'class' => 'form-control select2', "style" => "width: 100%"]);?>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control" for="description">Description:
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('description', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off'])?>
                <div class="form-control-position">
                    <i class="ft-file"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 label-control" for="sku"> Sku Code:
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('sku', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off'])?>
                <div class="form-control-position">
                    <i class="fa fa-code"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control" for="adult" style="margin-top: 20px;">Adult
            Content
        </label>
        <div class="col-md-6">
            <?=$this->Form->checkbox('adult', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'option-input radio', isset($category->adult) && $category->adult == true ? 'checked="checked"' : ''])?>
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
