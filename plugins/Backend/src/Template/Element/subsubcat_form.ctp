<?php echo $this->Form->create($subsubcategory, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

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
            <?=$this->Form->control('category_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $categories, 'empty' => true, 'label' => false, 'class' => 'form-control cat_select', "style" => "width: 100%", 'default' => isset($subsubcategory->subcategory->category_id) ? $subsubcategory->subcategory->category_id : null]);?>
        </div>
    </div>
    <div id="subcatdiv2">

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
</div>

<div class="form-actions">
    <div class="row clearfix">
        <div class="col-sm-9 offset-3">
            <?=$this->Form->button(__(' <i class="fa fa-check-square-o"></i> Save'), ['class' => 'btn btn-raised btn-primary']);?>
        </div>
    </div>

</div>
<?=$this->Form->end()?>
<script>

    function getSubcategories2(selected_subcategory = "<?=!empty($subsubcategory->subcategory_id) ? $subsubcategory->subcategory_id : ''?>") {

            //var selections = ( JSON.stringify($(this).select2('data')) );
            //var selected_category = $(this).select2('val');
            var selected_category = $('select[name^="category_id"]').val();
            //var selected_subcategory = $('.subcat_select').select2('val');
            if(!selected_subcategory){
                selected_subcategory = $('select[name^="subcategory_id"]').val();
            } 

            console.log(selected_category);
            console.log(selected_subcategory);
            //console.log(selected_subcategories);

        if (selected_category) {

            /*Metronic.blockUI({
                animate: true,
                overlayColor: 'none',
            });*/

            $('#subcatdiv2').hide("slow");
            $('#subcatdiv2').load(
                "<?=$this->Url->build(['prefix' => false, 'controller' => 'GeneralActions', 'action' => 'getSubcategoriesDropdown2']);?>", {
                    "selected_category": selected_category,
                    "selected_subcategory": selected_subcategory,
                },
                function () {
                    $('#subcatdiv2').show("slow", function () {
                        // $('.selectpicker').selectpicker('destroy');
                        $('.subcat_select').select2({
                            placeholder: 'Select a subcategory',
                            theme: "classic"
                        });
                    });
                });



        }

    }


    jQuery(document).ready(function () {

        // $('.cat_select').select2({
        //     placeholder: 'Select a Category',
        //     theme: "classic"
        // });
        // $('.subcat_select').select2({
        //     placeholder: 'Select a subcategory',
        //     theme: "classic"
        // });

        getSubcategories2();
        jQuery(document).on('change', '.cat_select', function (e) {
            getSubcategories2();
        });


    });

</script>
