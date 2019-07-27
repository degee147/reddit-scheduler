<div class="col-4">
    <div class="row">
        <div class="col-md-3">
            <fieldset class="form-group">
                <label for="maxAge">Max Age</label>
                <input class="form-control" type="number" max="99" min="1" id="maxAge">
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset class="form-group">
                <label for="status_one">Status 1</label>
                <select class="form-control" id="status_one">
                    <option value="all">All</option>
                    <option value="review">Review</option>
                    <option value="approved">Approved</option>
                </select>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset class="form-group">
                <label for="status_two">Status 2</label>
                <select class="form-control" id="status_two">
                    <option value="all">All</option>
                    <option value="safe">Safe</option>
                    <option value="unsafe">Unsafe</option>
                </select>
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
