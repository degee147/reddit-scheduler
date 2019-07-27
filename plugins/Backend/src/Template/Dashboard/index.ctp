<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="card gradient-blackberry">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0"><?=$viewCounts['images']?></h3>
                            <span>Total Images</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-pie-chart font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="card gradient-ibiza-sunset">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0"><?=$viewCounts['images_pending_reviews']?></h3>
                            <span>Pending Reviews</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-bulb font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="card gradient-green-tea">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0"><?=$viewCounts['users']?></h3>
                            <span>Total Users</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-graph font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card gradient-pomegranate">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0">$8695</h3>
                            <span>Total Earning</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-wallet font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                </div>
            </div>
        </div>
    </div> -->
</div>
<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Images for Review</h4>
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

                        <?php echo $this->element('images_table', ['ajax_url' => $this->Url->build(['prefix' => false, 'controller' => 'images', 'action' => 'getImagesAjax', 'review'])]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
