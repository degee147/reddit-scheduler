<table id="table" class="table table-bordered table-striped table-condensed" data-toolbar="#toolbar" data-search="true"
    data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-detail-view="true"
    data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true"
    data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, ALL]" data-show-footer="false"
    data-side-pagination="server" data-url="<?=$this->Url->build(['prefix' => false, 'controller' => 'Items', 'action' => 'getItemsBsTable']);?>"
    data-response-handler="responseHandler">
    <thead> 
        <tr>
            <th data-field="sn" data-sortable="true" export="false">S/N</th>
            <th data-field="name" data-sortable="true" data-align="center">Name</th>
            <!-- <th>Category</th> -->
            <th data-field="price" data-sortable="true" data-align="center">Price</th>
            <th data-field="featured" data-sortable="true" data-align="center">Feat'd</th>
            <?php if(isset($showSku) && $showSku == true):?>
            <th data-field="sku" data-sortable="false" data-align="center">SKU</th>
            <?php endif;?>
            <th data-field="active" data-sortable="true" data-align="center">Active</th>
            <th data-field="Items.created" data-sortable="true" data-align="center">Created</th>
            <th data-field="Items.modified" data-sortable="true" data-align="center">Modified</th>
            <th data-field="action" data-sortable="true" data-align="center" width="18%">
                <?=__('Action')?>
            </th>


        </tr>
    </thead>
</table>
<script>
    var $table = $('#table'),
        $remove = $('#remove'),
        selections = [];

    function initBSTable() {
        $table.bootstrapTable({
            height: getHeight(),
            /* columns: [
                [{
                    field: 'state',
                    checkbox: true,
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle'
                }, {
                    title: 'Item ID',
                    field: 'id',
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    footerFormatter: totalTextFormatter
                }, {
                    title: 'Item Detail',
                    colspan: 3,
                    align: 'center'
                }],
                [{
                    field: 'name',
                    title: 'Item Name',
                    sortable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                }, {
                    field: 'price',
                    title: 'Item Price',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalPriceFormatter
                }, {
                    field: 'operate',
                    title: 'Item Operate',
                    align: 'center',
                    events: operateEvents,
                    formatter: operateFormatter
                }]
            ] */
        });
        // sometimes footer render error.
        setTimeout(function () {
            $table.bootstrapTable('resetView');
        }, 200);
        $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table',
            function () {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
                // save your data, here just save the current page
                selections = getIdSelections();
                // push or splice the selections if you want to save all data selections
            });
        $table.on('expand-row.bs.table', function (e, index, row, $detail) {
            if (index % 2 == 1) {
                $detail.html('Loading from ajax request...');
                $.get('LICENSE', function (res) {
                    $detail.html(res.replace(/\n/g, '<br>'));
                });
            }
        });
        $table.on('all.bs.table', function (e, name, args) {
            console.log(name, args);
        });
        $remove.click(function () {
            var ids = getIdSelections();
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            });
            $remove.prop('disabled', true);
        });
        $(window).resize(function () {
            $table.bootstrapTable('resetView', {
                height: getHeight()
            });
        });
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        });
    }

    function responseHandler(res) {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.id, selections) !== -1;
        });
        return res;
    }

    function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="like" href="javascript:void(0)" title="Like">',
            '<i class="fa fa-heart-o"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="fa fa-trash"></i>',
            '</a>'
        ].join('');
    }
    window.operateEvents = {
        'click .like': function (e, value, row, index) {
            alert('You click like action, row: ' + JSON.stringify(row));
        },
        'click .remove': function (e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });
        }
    };

    function totalTextFormatter(data) {
        return 'Total';
    }

    function totalNameFormatter(data) {
        return data.length;
    }

    function totalPriceFormatter(data) {
        var total = 0;
        $.each(data, function (i, row) {
            total += +(row.price.substring(1));
        });
        return '$' + total;
    }

    function getHeight() {
        return $(window).height() - $('h1').outerHeight(true);
    }


    $(document).ready(function () {
        initBSTable();

    });

</script>
