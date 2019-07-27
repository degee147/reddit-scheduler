<?php $this->assign('title', 'Settings');?>
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-sm-12">
            <div class="content-header">Settings</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h4 class="card-title" id="horz-layout-basic">Project Info</h4>
	                <p class="mb-0">This is the basic horizontal form with labels on left and form controls on right in one line. Add <code>.form-horizontal</code> class to the form tag to have horizontal form styling. To define form sections use <code>form-section</code> class with any heading tags.</p> -->
                </div>
                <div class="card-body">
                    <div class="px-3">
                        <?php echo $this->Form->create($generalSetting, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

                        <div class="form-body">
                            <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="hostname"> Hostname (No trailing slashes):
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <div class="position-relative has-icon-left">
                                        <?=$this->Form->control('hostname', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                                        <div class="form-control-position">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="ban_message">Ban Message:
                                </label>
                                <div class="col-md-6">
                                    <div class="position-relative has-icon-left">
                                        <?=$this->Form->control('ban_message', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off'])?>
                                        <div class="form-control-position">
                                            <i class="ft-file"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label class="col-md-3 label-control" for="ban_message">Image Directory:
                                </label>
                                <div class="col-md-6">
                                    <div class="position-relative has-icon-left">
                                        <?=$this->Form->control('image_directory', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off'])?>
                                        <div class="form-control-position">
                                            <i class="ft-file"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

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

                </div>
            </div>
        </div>
    </div>

</section>
