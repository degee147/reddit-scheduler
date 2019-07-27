<div class="table-responsive col-sm-12">
    <table class="table table-striped table-bordered file-export" id="users_table">
        <thead>
            <tr>
                <th>SN</th>
                <th>First Name</th>
                <th>Last Name</th>
                <!-- <th>Username</th> -->
                <th>Email</th>
                <th>Phone</th>
                <?php if (isset($show_orders) && $show_orders == false): ?>
                <?php else: ?>
                <th>Orders</th>
                <?php endif;?>

                <?php if (isset($show_roles) && $show_roles == false): ?>
                <?php else: ?>
                <th>Roles</th>
                <?php endif;?>


                <th>Registration</th>
                <!-- <th>Modified</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $sn = 1;foreach ($users as $user): ?>
            <tr>
                <td>
                    <?=$sn++?>
                </td>
                <td>
                    <?=ucwords($user->firstname)?>
                </td>
                <td>
                    <?=ucwords($user->lastname)?>
                </td>
                <td>
                    <?=$user->email?>
                </td>
                <td>
                    <?=$user->phone?>
                </td>

                <?php if (isset($show_orders) && $show_orders == false): ?>
                <?php else: ?>
                <td>
                    <?=count($user->orders)?>
                </td>
                <?php endif;?>

                <?php if (isset($show_roles) && $show_roles == false): ?>
                <?php else: ?>
                <td>
                    <?=$this->Custom->getUserRolesInWord($user->roles)?>
                </td>
                <?php endif;?>

                <td>
                    <?=$this->Time->timeAgoInWords($user->created)?>
                </td>
                <!-- <td>
                                        <?=$this->Time->timeAgoInWords($user->modified)?>
                                    </td> -->
                <td class="actions">
                    <?=$this->Html->link(__('<i class="fa fa-search"></i>'), ['action' => 'view', $user->id], ['class' => 'btn btn-xs btn-primary btn-raised btn-icon mr-1 btn-sm', 'escape' => false])?>
                    <?=$this->Html->link(__('<i class="fa fa-shopping-cart"></i>'), ['controller' => 'customers', 'action' => 'order', $user->id], ['class' => 'btn btn-xs btn-info btn-raised btn-icon mr-1 btn-sm', 'escape' => false])?>
                    <?=$this->Html->link(__('<i class="fa fa-map-marker-alt"></i>'), ['controller' => 'customers', 'action' => 'address', $user->id], ['class' => 'btn btn-xs btn-info btn-raised btn-icon mr-1 btn-sm', 'escape' => false])?>
                    <?=$this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $user->id], ['class' => 'btn btn-xs btn-raised btn-warning btn-icon mr-1 btn-sm', 'escape' => false])?>
                    <?=$this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm', 'escape' => false])?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>SN</th>
                <th>First Name</th>
                <th>Last Name</th>
                <!-- <th>Username</th> -->
                <th>Email</th>
                <th>Phone</th>
                <?php if (isset($show_orders) && $show_orders == false): ?>
                <?php else: ?>
                <th>Orders</th>
                <?php endif;?>

                <?php if (isset($show_roles) && $show_roles == false): ?>
                <?php else: ?>
                <th>Roles</th>
                <?php endif;?>


                <th>Registration</th>
                <!-- <th>Modified</th> -->
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- END PAGE LEVEL JS-->
<?=$this->element('datatable_options', ["record_name" => isset($staffs_table) && $staffs_table == true ? 'staffs' : 'customers', "record_count" => count(gettype($users) == 'object' ? $users->toArray() : $users), 'specific_id' => 'users_table'])?>
<script>
    $(document).ready(function () {




    });

</script>
