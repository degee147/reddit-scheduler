<div class="px-3">
    <?php echo $this->Form->create($team, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

    <div class="form-body">
        <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->


        <div class="form-group row">
            <label class="col-md-3 label-control" for="country_id">Country
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <?=$this->Form->control('country_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $countries, 'empty' => true, 'label' => false, 'class' => 'form-control select2', "style" => "width: 100%", 'required', 'default'=>$active_country]);?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="name"> Name:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('name', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter name of team', 'autocomplete' => 'off', 'required'])?>
                    <div class="form-control-position">
                        <i class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="url"> Url:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('url', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter link to scrape', 'autocomplete' => 'off', 'required'])?>
                    <div class="form-control-position">
                        <i class="fa fa-link"></i>
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

<script>
    jQuery(document).ready(function () {

    });

</script>
