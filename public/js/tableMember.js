var $table = $('#table'),
    $deleteButton = $('#delete-button');

$(function () {
    $('#table').bootstrapTable({
        idField: 'nik',
        url: '/getListMember',
        // url: '../json/member.json',
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
            field: 'name',
            title: 'Name',
            sortable: 'true'
        }, {
            field: 'email',
            title: 'Email',
            sortable: 'true'
        }, {
            field: 'phone_number',
            title: 'Phone Number',
            sortable: 'true',
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
                url: '/deleteMember',
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data[idx],
                success: function(data) {
                    
                }
            });
        }
    });
});