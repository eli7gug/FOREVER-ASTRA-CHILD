jQuery(document).ready(function($){

    function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
          return data;
        }
        
        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
          return null;
        }
        if (data.element.hasAttribute('data-num') || data.element.hasAttribute("data-email")) {
          data.text=  data.text.toLowerCase();
          // `params.term` should be the term that is used for searching
          // `data.text` is the text that is displayed for the data object
          if (data.text.indexOf(params.term) > -1 || data.element.getAttribute('data-num').indexOf(params.term) > -1 || data.element.getAttribute('data-email').indexOf(params.term) > -1) {
            var matchedData = $.extend({}, data, true);
          
            // You can return matched objects from here
            return matchedData;
          }
        }
        
        // Return `null` if the term should not be displayed
        return null;
    }
    if ( $( "select.agent_name" ).length ) {
        $("select.agent_name").select2({
          allowClear: true,
          matcher: matchCustom
        });
    }
    // add tab for register page
    $('#reg-tabs li a:not(:last)').addClass('inactive');
      $('.tab-reg').hide();
      $('.tab-reg:last').show();
          
      $('#reg-tabs li a').click(function(){
          var t = $(this).attr('id');
        if($(this).hasClass('inactive')){ //this is the start of our condition 
          $('#reg-tabs li a').addClass('inactive');           
          $(this).removeClass('inactive');
          
          $('.tab-reg').hide();
          $('#'+ t + 'C').fadeIn('slow');
        } 
      });
      
      //radio button to find sponsor by name or city
      $('input:radio[name="sponsor_find"]').change(function(){
        if ($(this).is(':checked')){
          if($(this).val() == 'sponsor_city') {
            $( "select.agent_name" ).prop( "disabled", true );
            $( "input#sponsor_by_city" ).prop( "disabled", false );
            $('select.agent_name').val('0').trigger('change');
          }
          else{
            $( "input#sponsor_by_city" ).prop( "disabled", true );
            $( "select.agent_name" ).prop( "disabled", false );
            $("input#sponsor_by_city").val("");
          }
        }
      });

      // autocomplete google address

      $('input#billing_address_1, input#billing_city').addClass('autocomplete-google');

      google.maps.event.addDomListener(window, 'load', initialize);
      function initialize() {

          var acInputs = document.getElementsByClassName("autocomplete-google");
      
          for (var i = 0; i < acInputs.length; i++) {
      
              var autocomplete = new google.maps.places.Autocomplete(acInputs[i]);
              autocomplete.inputId = acInputs[i].id;
      
          }
      }

      //append title to icon for sharing cart
      $("body").on("click", '#wcssc-button-container > .button', function() {
        setTimeout(function(){ 
          $( ".wcssc-icons-container a" ).each(function() {
            var text_share = "<div>" + $(this).attr("title") + "</div>";
            $(this).append(text_share);
          });
          var modal_title_il= "<div class='title_wrap'><h4>שיתוף עגלה עם לקוח</h4><h5>לינק קמעונאי הוא כלי המאפשר לכם לשתף עגלות מוצרים בנויות עם הלקוחות שלכם, תחת מספר המשווק שלכם. זה מבטיח לבעל העסק המפנה לקבל את הקרדיט בגין המכירה.</h5><div>" 
          var modal_title_en= "<div class='title_wrap'><h4>Sharing cart with customer</h4><h5>A retail link is a tool that allows you to share built-in product carts with your customers, under your reseller number. This assures the referring business owner to get the credit for the sale.</h5><div>"  
          if($('body').hasClass('rtl')){
            $('.modal-header').append(modal_title_il);
          }
          else{
            $('.modal-header').append(modal_title_en);
          }
        }, 2000);

      });

      $( ".approval_bag_btn" ).clone().appendTo( ".wcssc-cart .entry-content #saved-cart-description h5" );
});
