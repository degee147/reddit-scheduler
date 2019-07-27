<div class="px-3">
    <?php echo $this->Form->create($post, ['class' => 'form form-horizontal', 'enctype' => 'multipart/form-data']) ?>

    <div class="form-body">
        <!-- <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4> -->
        <div class="form-group row">
            <label class="col-md-3 label-control" for="title"> Title:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('title', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'required'])?>
                    <div class="form-control-position">
                        <i class="ft-file"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="url">Url:
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('url', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off', 'type'=>'url', 'oninvalid'=>"setCustomValidity('Please enter a valid url e.g http://google.com')", "oninput"=>"setCustomValidity('')"])?>
                    <div class="form-control-position">
                        <i class="ft-file"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="schedule">Schedule:
                <span class="required" aria-required="true"> * </span>
                <br>
                (YYYY-MM-DD HH:MM)
            </label>
            <div class="col-md-6">
                <div class="position-relative has-icon-left">
                    <?=$this->Form->control('schedule', ['templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'class' => 'form-control', 'placeholder' => 'enter text', 'autocomplete' => 'off'])?>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-3 label-control" for="account_id">Account
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <?=$this->Form->control('account_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $accounts, 'empty' => true, 'label' => false, 'id'=>'account_id','class' => 'form-control', "style" => "width: 100%", 'required']);?>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-default waves-effect btn-round swal" onclick="return false;"
                    data-type="add-account">New
                    Account</button>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="subreddit_id">Subreddit
                <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
                <?=$this->Form->control('subreddit_id', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $subreddits, 'empty' => true, 'label' => false, 'id'=>'subreddit_id','class' => 'form-control', "style" => "width: 100%", 'required']);?>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-default waves-effect btn-round swal add_subreddit" onclick="return false;"
                    data-type="add-subreddit">New
                    Subreddit</button>
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
<?=$this->element('ajax_dropdown', [
    'ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'Posts', 'action' => 'getAccountsJson']),
    'ajax_placeholder' => 'Choose an account', 
    'select_id' => 'account_id',
    'minimumInputLength' => 0
])?>
<?=$this->element('ajax_dropdown', [
    'ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'Posts', 'action' => 'getSubredditsJson']),
    'ajax_placeholder' => 'Choose a subreddit', 
    'select_id' => 'subreddit_id',
    'minimumInputLength' => 0
])?>
<?php echo $this->element('add_account_swal', ['select_id' => 'account_id']) ?>
<?php echo $this->element('add_subreddit_swal', ['select_id' => 'subreddit_id']) ?>