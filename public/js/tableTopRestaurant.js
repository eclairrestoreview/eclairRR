var $table = $('#table'),
    $deleteButton = $('#delete-button');

$(function () {
    $.fn.editable.defaults.url = '/updateTopRestaurant';
    
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $('#table').bootstrapTable({
        idField: 'nik',
        url: '/getListTopRestaurant',
        // url: '../json/resto.json',
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
            checkbox: 'true',
        }, {
            field: 'restaurant_id',
            title: 'Restaurant ID',
            sortable: 'true'
        }, {
            field: 'name',
            title: 'Restaurant Name',
            sortable: 'true'
        }, {
            field: 'address',
            title: 'Location',
            sortable: 'true'
        }, {
            field: 'city',
            title: 'City',
            sortable: 'true',
        }, {
            field: 'phone_number',
            title: 'Phone Number',
            sortable: 'true',
            // editable: {
            //     type: 'text',
            //     mode: 'popup',
            //     name: 'phone_numner',
            //     pk: function(row){
            //         return row.restaurant_id;
            //     },
            //     params: function(params){
            //         params.pk = $(this).attr('data-pk');
            //         return params;
            //     },
            //     validate: function(value) {
            //         if($.trim(value) == '') return 'This field is required';
            //     },
            //     success: function(data) {
            //         console.log(data);
            //         alert(data);
            //     }
            // }
        }, {
            field: 'price_bottom',
            title: 'Lower Bound Price',
            sortable: 'true',
            // editable: {
            //     type: 'text',
            //     mode: 'popup',
            //     name: 'price_bottom',
            //     pk : '*[@id="table"]/tbody/tr/td[1]',
            //     validate: function(value) {
            //         if($.trim(value) == '') return 'This field is required';
            //     }
            // }
        }, {
            field: 'price_top',
            title: 'Upper Bound Price',
            sortable: 'true',
            // editable: {
            //     type: 'text',
            //     mode: 'popup',
            //     name: 'price_top',
            //     pk : '*[@id="table"]/tbody/tr/td[1]',
            //     validate: function(value) {
            //         if($.trim(value) == '') return 'This field is required';
            //     }
            // }
        }]
    });
});

$(function () {
    $deleteButton.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.restaurant_id;
        });
        var data = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row;
        });
        $table.bootstrapTable('remove', {
            field: 'restaurant_id',
            values: ids
        });
        for (idx = 0; idx < data.length; idx++) {
            $.ajax({
                url: '/deleteTopRestaurant',
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data[idx],
                success: function(data) {
                    
                }
            });
        }
    });
});

$('#add-top').submit(function()  {
    var data = {
        restaurant_id: $('#restaurant_id').val(),
    };
    $.ajax({
        url: '/insertTopRestaurant',
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: data,
        success: function(data) {
            // console.log(data);
            // alert(data);
        }
    });
});

$(function() {
    $('#test').editable({
        type: 'text',
        mode: 'inline',
        pk: 1,
        validate: function(value) {
            if($.trim(value) == '') return 'This field is required';
        },
        success: function(data) {
            $(this).data('pk', 23);
            console.log($(this).data('pk'));
        }
      }
    );
});