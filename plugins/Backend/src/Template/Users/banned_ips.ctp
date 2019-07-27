<?php $this->assign('title', "Banned IPs");?>
<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Banned IPs</h4>
                        </div>
                        <div class="col-4 text-right">
                            <!-- <a href="<?=$this->Url->build(['action' => 'add']);?>" class="btn round btn-raised btn-dark">
                                <i class="fa fa-plus"></i>&nbsp;New Item
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="card-body collapse show">


                    <div class="card-block card-dashboard">
                        <!-- <p class="card-text">Exporting data from a table can often be a key part of a complex application. The Buttons extension
                            for DataTables provides three plug-ins that provide overlapping functionality for data export.</p> -->

                        <?php echo $this->element('banned_ips_table', ['ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'GeneralSettings', 'action' => 'getBannedIpsAjax'])]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
