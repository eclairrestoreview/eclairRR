var $table = $('#table'),
    $deleteButton = $('#delete-button');
    $addButton = $('#add-button');
var restaurant_id = $('#restaurant_id').val();

$(function () {
    $('#table').bootstrapTable({
        idField: 'nik',
        url: '/getListVoucher/' + restaurant_id,
        // url: '../json/voucherspec.json',
        queryParams: 'queryParams',
        pagination: 'true',
        pageList: '[5,10,15,20]',
        pageSize: 5,
        toolbar: '#toolbar',
        showColumns: 'true',
        showToggle: 'true',
        search: 'true',
        clickToSelect: 'true',
        columns: [{
            field: 'state',
            checkbox: 'true'
        }, {
            field: 'code',
            title: 'Voucher Code',
            sortable: 'true'
        }, {
            field: 'name',
            title: 'Name',
            sortable: 'true',
            // editable: {
            //     type: 'text',
            //     mode: 'popup',
            //     name: 'spj',
            //     pk : '*[@id="table"]/tbody/tr/td[1]',
            //     validate: function(value) {
            //         if($.trim(value) == '') return 'This field is required';
            //     }
            // }
        }, {
            field: 'description',
            title: 'description',
            sortable: 'true',
            // editable: {
            //     type: 'text',
            //     mode: 'popup',
            //     name: 'spj',
            //     pk : '*[@id="table"]/tbody/tr/td[1]',
            //     validate: function(value) {
            //         if($.trim(value) == '') return 'This field is required';
            //     }
            // }
        }, {
            field: 'valid_from',
            title: 'Valid From',
            sortable: 'true',
        }, {
            field: 'valid_until',
            title: 'Valid Until',
            sortable: 'true',
        }, {
            field: 'img_url',
            title: 'Image File',
            sortable: 'true',
            formatter: function formatter(value, row, index) {
                return [
                    '<div class="pull-left">',
                    '<span>' + value + '</span>',
                    '</div>',
                    '<div class="custom-file">',
                    '<input type="file" class="custom-file-input" id="customFile">',
                    '</div>'
                ].join('');
            }
        }]
    });
});

$(function () {
    $deleteButton.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.code;
        });
        var data = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row;
        });
        $table.bootstrapTable('remove', {
            field: 'code',
            values: ids
        });
        for (idx = 0; idx < data.length; idx++) {
            $.ajax({
                url: '/deleteVoucher',
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data[idx],
                success: function(data) {
                    
                }
            });
        }
    });
});

$('#add-voucher').submit(function()  {
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/insertVoucher',
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
            alert(data);
        },
        error: function (ajaxContext) {
            console.log(ajaxContext.responseText);
            alert(ajaxContext.responseText);
        }
    });
});

$(function () {
    $addButton.click(function () {
        $table.bootstrapTable('insertRow', {
            index: 1,
            row: {
                code: 1,
                name: 'Item ',
                description: '$',
                valid_from: 'd',
                valid_until: 'd',
                img_url: 'd',
            }
        });
    });
});

$(function () {
    $('#valid_from_picker').datetimepicker();
});

$(function () {
    $('#valid_until_picker').datetimepicker();
});