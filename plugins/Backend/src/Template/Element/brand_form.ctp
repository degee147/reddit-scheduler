<?php echo $this->Form->create($brand, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

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
        <label class="col-md-3 label-control" for="category_id">Category
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <?=$this->Form->control('category_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $categories, 'empty' => true, 'label' => false, 'class' => 'form-control', "style" => "width: 100%"]);?>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 label-control" for="img_upload" style="margin-top: 20px;">Brand Image  <br>Image size:
            210x100  
        </label>
        <div class="col-md-6">
            <input name="img_upload" type="file" class="file" data-show-upload="false" data-allowed-file-extensions='["jpeg", "jpg","png","gif"]'
                data-max-image-height="100" data-min-image-height="70" data-max-image-width="220" data-min-image-width="170"
                data-showCaption="true" data-max-file-size="400" <?=$this->Custom->checkImagePreview($brand->image,
            "brands")?>>
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
