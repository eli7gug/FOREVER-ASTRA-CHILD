var $=jQuery.noConflict();

$(document).ready(function(){
  $(".accordion").click(function(e){
    if($('input.search_sku_term').val() == '' && $('input.search_name_term').val() == ''){
      if( $('table.quick-order-accordion-table tbody > tr').is(':hidden')) {
        $('table.quick-order-accordion-table tbody > tr').show();
      }
    }
  });
  $("input.search_sku_term").bind("keypress", function(e){

    if(e.which == 13){
      if(e.target.value != '')  {
        var pdt_sku= e.target.value;
        $('input.search_name_term').val('');
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
    }

  });

  $("input.search_name_term").bind("keypress", function(e){
    if(e.which == 13){
      if(e.target.value != '')  {
        var pdt_name= e.target.value;
        $('input.search_sku_term').val('');
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
    }

  });



  // on clear input, close the active accordion
  $("input.search_sku_term,input.search_name_term").keyup(function() {

    if (!this.value) {
      if($('.accordion').hasClass('active')){
        $('.accordion.active').click();
      }
    }

  });

});




