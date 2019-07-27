<?php echo $this->Form->create($category, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

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
        <label class="col-md-3 label-control" for="icon">Image Icon:
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="position-relative has-icon-left">
                <?=$this->Form->control('icon', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter html code of icon', 'autocomplete' => 'off'])?>
                <div class="form-control-position">
                    <i class="ft-file"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <a href="https://fontawesome.com/icons" target="_blank">Click here to find icons</a>
        </div>
    </div>
 
    <div class="form-group row">
        <label class="col-md-3 label-control" for="active" style="margin-top: 20px;">Active
        </label>
        <div class="col-md-6">
            <?=$this->Form->checkbox('active', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'option-input radio', isset($category->active) && $category->active == true ? 'checked="checked"' : ''])?>
        </div>
    </div>
 
    <div class="form-group row">
        <label class="col-md-3 label-control" for="featured" style="margin-top: 20px;">Featured
        </label>
        <div class="col-md-6">
            <?=$this->Form->checkbox('featured', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'option-input radio', isset($category->featured) && $category->featured == true ? 'checked="checked"' : ''])?>
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
        <label class="col-md-3 label-control" for="adult" style="margin-top: 20px;">Adult Content
        </label>
        <div class="col-md-6">            
            <?=$this->Form->checkbox('adult', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'option-input radio', isset($category->adult) && $category->adult == true ? 'checked="checked"' : ''])?>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control" for="banner_image" style="margin-top: 20px;">Banner Image <br>Image size:
            270x494
        </label>
        <div class="col-md-6">
            <input name="img_upload" type="file" class="file" data-show-upload="false" data-allowed-file-extensions='["jpeg", "jpg","png","gif"]'
                data-max-image-height="495" data-min-image-height="494" data-max-image-width="270" data-min-image-width="270"
                data-showCaption="true" data-max-file-size="400" <?=$this->Custom->checkImagePreview($category->banner_image,
            "categories")?>>
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
