var $table = $('#table'),
    $deleteButton = $('#delete-button');
var restaurant_id = $('#restaurant_id').val();

$(function () {
    $('#table').bootstrapTable({
        idField: 'nik',
        url: '/getListMemberVoucher/' + restaurant_id,
        // url: '../json/reviewspec.json',
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
            field: 'user_id',
            title: 'User ID',
            sortable: 'true'
        }, {
            field: 'email',
            title: 'Email',
            sortable: 'true'
        }]
    });
});

$(function () {
    $deleteButton.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.user_id;
        });
        var data = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row;
        });
        $table.bootstrapTable('remove', {
            field: 'user_id',
            values: ids
        });
        for (idx = 0; idx < data.length; idx++) {
            $.ajax({
                url: '/deleteMemberVoucher',
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data[idx],
                success: function(data) {
                    
                }
            });
        }
    });
});