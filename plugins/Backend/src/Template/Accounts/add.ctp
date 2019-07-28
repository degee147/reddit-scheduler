<?php $this->assign('title', 'Add Account');?>
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-sm-12">
            <div class="content-header">Add Account</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h4 class="card-title" id="horz-layout-basic">Project Info</h4>
	                <p class="mb-0">This is the basic horizontal form with labels on left and form controls on right in one line. Edit <code>.form-horizontal</code> class to the form tag to have horizontal form styling. To define form sections use <code>form-section</code> class with any heading tags.</p> -->
                </div>
                <div class="card-body">
                    <div class="px-3">
                        <?php echo $this->Form->create($account, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>
                        <?=$this->element('account_form')?>

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
