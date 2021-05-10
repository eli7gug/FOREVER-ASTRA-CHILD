var $=jQuery.noConflict();

$(document).ready(function(){
  $(".accordion").click(function(e){
    if($('input#search_sku_term').val() == '' && $('input#search_name_term').val() == ''){
      if( $('table.quick-order-accordion-table tbody > tr').is(':hidden')) {
        $('table.quick-order-accordion-table tbody > tr').show();
      }
    }
  });
  $("input#search_sku_term").bind("keypress", function(e){
    if(e.which == 13){
      if(e.target.value != '')  {
        var pdt_sku= e.target.value;
        $('input#search_name_term').val('');
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
              if(response.data.pdt_msg == null){
                pdt_id = response.data.pdt_response[0];
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

          },
          error: function (err) {
              console.log(err);
              
          }
        });
      }
    }

  });

  $("input#search_name_term").bind("keypress", function(e){
    if(e.which == 13){
      if(e.target.value != '')  {
        var pdt_name= e.target.value;
        $('input#search_sku_term').val('');
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
              if(response.data.pdt_msg == null){
                pdt_id = response.data.pdt_response[0];
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

          },
          error: function (err) {
              console.log(err);
              
          }
        });
      }
    }

  });

  // on clear input, close the active accordion
  $("input#search_sku_term,input#search_name_term").keyup(function() {

    if (!this.value) {
      if($('.accordion').hasClass('active')){
        $('.accordion.active').click();
      }
    }

  });

});




