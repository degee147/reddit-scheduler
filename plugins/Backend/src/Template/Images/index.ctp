<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">All Images</h4>
                        </div>
                        <?=$this->element('image_controls')?>
                    </div>
                </div>
                <div class="card-body collapse show">


                    <div class="card-block card-dashboard">
                        <!-- <p class="card-text">Exporting data from a table can often be a key part of a complex application. The Buttons extension
                            for DataTables provides three plug-ins that provide overlapping functionality for data export.</p> -->

                        <?php echo $this->element('images_table', ['ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'images', 'action' => 'getImagesAjax'])]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
