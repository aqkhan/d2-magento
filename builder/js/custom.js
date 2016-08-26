$(document).ready(function() {
    // datatables
    $('#best_deals').DataTable({
        "filter":     false
    });
    $(document).on('click', '#best_deals_paginate', function() {
        select_switch();
    });
    $(document).on('click', '.submit-module-data', function() {
        var module = $('.module').val();
        var title = $('.title').val();
        var content = $('.content').val();

        $.ajax({
            url:base_url+'/includes/services.php',
            type: 'POST',
            dataType: 'html',
            data: {
                'function': 'insert_module_data',
                'module': module,
                'title': title,
                'content': content
            },
            error: function(errorThrown) {
            },
            success: function(data) {
                console.log(data);
                $('.messages').show().text(data);
                setTimeout(function(){
                    $('.messages').hide();
                }, 3000);
            },
            beforeSend: function() {
            }
        });
    });
    $(document).on('click', '.update', function() {
        var sku = [];
        var ths = $(this);
        $(this).text('Updating...');
        $(this).parents('.panel-body').find('.products-list tr').each(function() {
            var product_list = $(this);
            if(product_list.find('.checkbox input').is(':checked')) {
                sku.push(product_list.find('.product-sku').text());
            }
        });
        var products_sku = sku.join(',');
        $.ajax({
            url:base_url+'/includes/services.php',
            type: 'POST',
            dataType: 'html',
            data: {
                'function': 'insert_offer',
                'skus': products_sku,
                'type': 'best_deal'
            },
            error: function(errorThrown) {
            },
            success: function(data) {
                console.log(data);
                setTimeout(function(){
                    ths.text('Updated');
                }, 3000);
                setTimeout(function(){
                    ths.text('Update');
                }, 5000);
            },
            beforeSend: function() {
            }
        });
    });
});