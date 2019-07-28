<div class="col-6">
    <div class="row">
        <div class="col-md-4">
            <fieldset class="form-group">
                <label for=""></label>
                <a href="<?=$this->Url->build(['action' => 'add']);?>" class="btn round btn-raised btn-dark">
                    <i class="fa fa-plus"></i>&nbsp;New Post
                </a>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset class="form-group">
                <label for="accountDropdown">Accounts</label>
                <?=$this->Form->control('accountDropdown', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $accounts, 'empty' => true, 'label' => false, 'id'=>'accountDropdown','class' => 'form-control select2_all', "style" => "width: 100%", 'required']);?>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset class="form-group">
                <label for="subredditDropdown">Subreddits</label>
                <?=$this->Form->control('subredditDropdown', ['templates' => ['inputContainer' => '{{content}}'], 'options' => $subreddits, 'empty' => true, 'label' => false, 'id'=>'subredditDropdown','class' => 'form-control select2_all', "style" => "width: 100%", 'required']);?>
            </fieldset>
        </div>

    </div>


    <!-- Dropdown for Status, input for max age, safe/unsafe dropdown -->
    <!-- <a href="<?=$this->Url->build(['action' => 'index']);?>" class="btn round btn-raised btn-dark">
        All
    </a>
    <a href="<?=$this->Url->build(['action' => 'review']);?>" class="btn round btn-raised btn-dark">
        Review
    </a>
    <a href="<?=$this->Url->build(['action' => 'deleted']);?>" class="btn round btn-raised btn-dark">
        Deleted
    </a>
    <a href="<?=$this->Url->build(['action' => 'approved']);?>" class="btn round btn-raised btn-dark">
        Approved
    </a> -->
</div>
