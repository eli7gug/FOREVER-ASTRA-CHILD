var $=jQuery.noConflict();

$(document).ready(function(){
  $(".accordion").click(function(e){
    if($('input.search_sku_term').val() == '' && $('input.search_name_term').val() == ''){
      if( $('table.quick-order-accordion-table tbody > tr').is(':hidden')) {
        $('table.quick-order-accordion-table tbody > tr').show();
      }
    }
  });
  $("select.search_sku_term").on("change", function(e){
    var sku_selected = $("select.search_sku_term option:selected").val();
    console.log(sku_selected);
      if(sku_selected != '0')  {
        var pdt_sku= sku_selected;
        $('select.search_name_term').select2('val','0');
        $('table.quick-order-accordion-table tbody > tr').show();
        $.ajax({
          url: ajax_obj.ajaxurl,
          method: 'POST',
          dataType: 'json',
          data: {
            "pdt_sku" : pdt_sku,
            'action': 'get_pdt_by_sku',
          },
          success: function (response) {
            console.log(response);
            if($('body').hasClass('woocommerce-cart')){
              // cart page
              if (response.error && response.pdt_msg) {
                msg_product = response.pdt_msg;
                $('.pdt_msg_error').html(msg_product);
                return;
              }
              else if(response.error && response.product_url){
                window.location = response.product_url;
              }
              else{
                $thisbutton = $('button[type="submit"]');
                $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
              }
            }
            else{
              if(response.data.pdt_msg == ""){
                pdt_id = response.data.pdt_response;
                $('.pdt_msg_error').empty();
                //$('table.quick-order-accordion-table tbody > tr').hide();
                if($('.accordion').hasClass('active')){
                  $('.accordion.active').click();
                }
                $current_pdt_sku = $('table.quick-order-accordion-table tbody > tr.'+pdt_id);
                
                $('tr.'+pdt_id).closest('.panel').prev('.accordion').click();
                $('.accordion.active').next('.panel').find('tbody tr').hide();
                $current_pdt_sku.show();
              }
              else{
                msg_product = response.data.pdt_msg;
                $('.pdt_msg_error').html(msg_product);
                if($('.accordion').hasClass('active')){
                  $('.accordion.active').click();
                }
              }
            }
 

          },
          error: function (err) {
              console.log(err);
              
          }
        });
      }
    

  });

  $("select.search_name_term").bind("change", function(e){
    
    var name_selected = $("select.search_name_term option:selected").val();
      if(name_selected != '0')  {
        var pdt_name= name_selected;
        $('select.search_sku_term').select2('val','0');
        $('table.quick-order-accordion-table tbody > tr').show();
        $.ajax({
          url: ajax_obj.ajaxurl,
          method: 'POST',
          dataType: 'json',
          data: {
            "pdt_name" : pdt_name,
            'action': 'get_pdt_by_name',
          },
          success: function (response) {
            console.log(response);
            if($('body').hasClass('woocommerce-cart')){
              // cart page
              if (response.error && response.pdt_msg) {
                msg_product = response.pdt_msg;
                $('.pdt_msg_error').html(msg_product);
                return;
              }
              else if(response.error && response.product_url){
                window.location = response.product_url;
              }
              else{
                $thisbutton = $('button[type="submit"]');
                $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
              }
            }
            else{
              // quick order page
              if(response.data.pdt_msg == ""){
                console.log(response);
                pdt_id = response.data.pdt_response;
                $('.pdt_msg_error').empty();
                //$('table.quick-order-accordion-table tbody > tr').hide();
                if($('.accordion').hasClass('active')){
                  $('.accordion.active').click();
                }
                $current_pdt_sku = $('table.quick-order-accordion-table tbody > tr.'+pdt_id);
                
                $('tr.'+pdt_id).closest('.panel').prev('.accordion').click();
                $('.accordion.active').next('.panel').find('tbody tr').hide();
                $current_pdt_sku.show();
              }
              else{
                msg_product = response.data.pdt_msg;
                $('.pdt_msg_error').html(msg_product);
                if($('.accordion').hasClass('active')){
                  $('.accordion.active').click();
                }
              }
            }


          },
          error: function (err) {
              console.log(err);
              
          }
        });
      }
    

  });
  
    // on clear select, close the active accordion
  $("select.search_name_term,select.search_sku_term").bind("change", function(e){
    if($("select.search_sku_term option:selected").val() == '0' && $("select.search_name_term option:selected").val() == 0){
      $('.accordion.active').click();
    }
  });


  $("button.find_by_city").on("click", function(e){
    var city_selected = $(this).prev('.sponsor_by_city').val().split(',')[0];
    console.log(city_selected);
    if(city_selected != '')  {
        $(this).addClass('loading');
        $.ajax({
            url: ajax_obj.ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
            "city_selected" : city_selected,
            'action': 'get_sponsor_by_city',
            },
            success: function (response) {
                console.log(response);
                $("button.find_by_city").removeClass('loading');
                if(response.data.msg == ""){
                    var sponsor_id = response.data.sponsor[0].user_id;
                    var sponsor_num = response.data.sponsor[0].current_meta_agent_num;
                    var sponsor_name = response.data.sponsor[0].current_meta_agent_name;
                    var sponsor_phone = response.data.sponsor[0].meta_phone;
                    var sponsor_address = response.data.sponsor[0].meta_address1;
                    var sponsor_city = response.data.sponsor[0].meta_city;
                    //$('.single_reservation_details').show();
                    $('.sponsor_msg_error').empty();
                    $('.sponsor_details_wrapper h4,.sponsor_details_wrapper h5').empty();
                    $('.sponsor_details_wrapper').show();
                    $('.sponsor_detail_num').append(sponsor_num);
                    $('.sponsor_detail_name').append(sponsor_name);
                    $('.sponsor_detail_phone').append(sponsor_phone);
                    $('.sponsor_detail_address').append(sponsor_address);
                    $('.sponsor_detail_city').append(sponsor_city);
                    $('.random_sponsor').val(sponsor_id);
                }
                else{
                    msg_sponsor = response.data.msg;
                    $('.sponsor_details_wrapper').hide();
                    $('.sponsor_msg_error').html(msg_sponsor);

                }
            },
            error: function (err) {
                console.log(err);   
                $("button.find_by_city").removeClass('loading'); 
            }
        });
    }
  });

  
  $('.agent_name').select2({
    minimumInputLength: 3,
    language: "he",
    ajax: {
        url: ajax_obj.ajaxurl,
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
              q: params.term, // search term
              action : 'search_sponsor'     
            };
        },
        processResults: function( response ) {
            $("button.find_by_name").attr('disabled',false);
            return {
                results: response
            };
        },
        cache: true
    },
  });



  $("button.find_by_name").on("click", function(e){
    $(this).addClass('loading');
    var sponsor_selected = $('select.agent_name option:selected').val();
    console.log(sponsor_selected);
    if(sponsor_selected != 0)  {
        $.ajax({
            url: ajax_obj.ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
            "sponsor_selected" : sponsor_selected,
            'action': 'get_sponsor_by_name',
            },
            success: function (response) {
                console.log(response);
                $("button.find_by_name").removeClass('loading');
                if(response.data.msg == ""){
                    var sponsor_num = response.data.sponsor[0].current_meta_agent_num;
                    var sponsor_name = response.data.sponsor[0].current_meta_agent_name;
                    var sponsor_phone = response.data.sponsor[0].meta_phone;
                    var sponsor_address = response.data.sponsor[0].meta_address1;
                    var sponsor_city = response.data.sponsor[0].meta_city;
                    $('.sponsor_msg_error').empty();
                    $('.sponsor_details_wrapper h4,.sponsor_details_wrapper h5').empty();
                    $('.sponsor_details_wrapper').show();
                    $('.sponsor_detail_num').append(sponsor_num);
                    $('.sponsor_detail_name').append(sponsor_name);
                    $('.sponsor_detail_phone').append(sponsor_phone);
                    $('.sponsor_detail_address').append(sponsor_address);
                    $('.sponsor_detail_city').append(sponsor_city);
                }
                else{
                    msg_sponsor = response.data.msg;
                    $('.sponsor_details_wrapper').hide();
                    $('.sponsor_msg_error').html(msg_sponsor);

                }
            },
            error: function (err) {
                console.log(err);    
                $("button.find_by_name").removeClass('loading');
            }
        });
    }

  });

  $('#create_order_submit').click(function(e){
    var cust_type = $("input[name=cust_type]:checked:checked").val();
    console.log(cust_type);
    $.ajax({
        url: ajax_obj.ajaxurl,
        method: 'POST',
        dataType: 'json',
        data: {
        "cust_type" : cust_type,
        'action': 'create_customer_order',
        },
        success: function(){
            window.location.href = ajax_obj.woo_shop_url;
        },
        error: function(results) {
            alert('There was an error ' + results);
        }
    });
  });

  
  $('.back-private-purchase').click(function(e){
    $.ajax({
        url: ajax_obj.ajaxurl,
        method: 'POST',
        dataType: 'json',
        data: {
        'action': 'unset_customer_order_session',
        },
        success: function(){
            window.location.href = ajax_obj.woo_shop_url;
        },
        error: function(results) {
            alert('There was an error ' + results);
        }
    });
  });




});






