<div class="table-responsive col-sm-12">
    <table class="table table-striped table-bordered file-export" id="<?=$idtouse?>">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Customer</th>
                <th>Number</th>
                <th>Total</th>
                <th>Status</th>
                <th>Delivery</th>
                <th>Payment</th>
                <th>Paid</th>
                <th>Created</th>
                <th>Modified</th>
                <th width="20%">Actions</th>
            </tr>
        </thead>
        <?php //if(1==2):?>
        <tbody>
            <?php $sn = 1;foreach ($orders as $order): ?>
            <?php $snapshot = json_decode($order->snapshot)?>
            <tr>
                <td>
                    <?=$sn++?>
                </td>
                <td>
                    <?=ucwords($snapshot->user->firstname) . " " . ucwords($snapshot->user->lastname)?>
                </td>
                <td>
                    <?=$snapshot->order_number?>
                </td>
                <td>
                    <?=$naira?>
                    <?=number_format($this->Custom->getOrderTotal($snapshot))?> for
                    <?=count($snapshot->cart->sales)?>
                    <?=count($snapshot->cart->sales) > 1 ? 'items' : 'item'?>
                </td>
                <td>
                    <?=ucwords($order->order_status->name)?>
                </td>
                <td>
                    <?=ucwords($snapshot->delivery_option->name)?>
                </td>
                <td>
                    <?=ucwords($snapshot->payment_option->name)?>
                </td>
                <td>
                <?=$order->paid ? "Yes" : "No"?>
            </td>

                <td>
                    <?=$this->Time->timeAgoInWords($order->created)?>
                </td>
                <td>
                    <?=$this->Time->timeAgoInWords($order->modified)?>
                </td>
                <td class="actions">
                    <?=$this->Html->link(__('<i class="fa fa-search"></i>'), ['controller' => 'orders', 'action' => 'view', $order->id], ['class' => 'btn  btn-xs btn-primary btn-raised btn-icon mr-1 btn-sm', 'escape' => false])?>
                    <?=$this->Html->link(__('<i class="fa fa-edit"></i>'), ['controller' => 'orders', 'action' => 'edit', $order->id], ['class' => 'btn btn-xs btn-raised btn-warning btn-icon mr-1 btn-sm', 'escape' => false])?>
                    <?=$this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), ['controller' => 'orders', 'action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm', 'escape' => false])?>

                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <?php //endif;?>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Customer</th>
                <th>Number</th>
                <th>Total</th>
                <th>Status</th>
                <th>Delivery</th>
                <th>Payment</th>
                <th>Paid</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php echo $this->element('datatable_options', ["record_name" => 'orders', "record_count" => count(gettype($orders) == 'object' ? $orders->toArray() : $orders), 'specific_id' => $idtouse]) ?>
<?php //echo $this->element('datatable_options', ["record_name" => 'orders', "record_count" => count(gettype($orders) == 'object' ? $orders->toArray() : $orders), 'specific_id' => 'order_table', 'ajaxify' => true])?>
<?php //echo $this->element('datatable_options_ajax', ["record_name" => 'orders', "record_count" => count(gettype($orders) == 'object' ? $orders->toArray() : $orders), 'specific_id' => 'order_table'])?>
<script>
    $(document).ready(function () {});

</script>
