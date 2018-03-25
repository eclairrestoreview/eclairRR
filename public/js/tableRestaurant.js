var $table = $('#table'),
    $deleteButton = $('#delete-button');
    $addButton = $('#add-button');

$(function () {
    $.fn.editable.defaults.url = '/updateRestaurant';
    
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $('#table').bootstrapTable({
        idField: 'nik',
        url: '/getListRestaurant',
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
            field: 'desc',
            title: 'Description',
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
                url: '/deleteRestaurant',
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data[idx],
                success: function(data) {
                    
                }
            });
        }
    });
});

$('#add-restaurant').submit(function()  {
    var formData = new FormData($(this)[0]);
    console.log(formData);
    alert(formData);
    $.ajax({
        url: '/insertRestaurant',
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            // console.log(data);
            // alert(data);
        },
        error: function (ajaxContext) {
            // console.log(ajaxContext.responseText);
            // alert(ajaxContext.responseText);
        }
    });
});

$(function () {
    $addButton.click(function () {
        $table.bootstrapTable('insertRow', {
            index: 1,
            row: {
                restaurant_id: 1,
                name: 'Item ',
                address: '$',
                city: 'd',
                phone_number: 'd',
                price_bottom: 'd',
                price_top: 'd',
                img_url: 'd',
            }
        });
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
            // $(this).data('pk', 23);
            // console.log($(this).data('pk'));
        }
      }
    );
});