jQuery(document).ready(function($){

  if ( $( "select.search_sku_term" ).length ) {
      $("select.search_sku_term").select2();
    }
    if ( $( "select.search_name_term" ).length ) {
      $("select.search_name_term").select2();
    }


    //radio button to find sponsor by name or city
    $('input:radio[name="sponsor_find"]').change(function(){
        $('.sponsor_details_wrapper').hide();
        if ($(this).is(':checked')){
            if($(this).val() == 'sponsor_city') {
            //$( "select.agent_name" ).prop( "disabled", true );
            //$( "input.sponsor_by_city" ).prop( "disabled", false );
            $( ".select_agent_wrap" ).hide();
            $( ".select_city_wrapper" ).show();
            $('select.agent_name').val('0').trigger('change');
            }
            else{
            //$( "input.sponsor_by_city" ).prop( "disabled", true );
            //$( "select.agent_name" ).prop( "disabled", false );
            $( ".select_city_wrapper" ).hide();
            $( ".select_agent_wrap" ).show();
            $("input.sponsor_by_city").val("");
            }
        }
    });

    



    
    // autocomplete google  address

    $('input#billing_city, input[name="sponsor_by_city"], input#shipping_city').addClass('autocomplete-google-city');
    $('input#billing_address_1, input#shipping_address_1').addClass('autocomplete-google-address');

    //google.maps.event.addDomListener(window, 'load', initialize);
    initialize();
    function initialize() {
        //var acInputs = document.getElementsByClassName("autocomplete-google");
        var cityInputs = document.getElementsByClassName("autocomplete-google-city");

        for (var i = 0; i < cityInputs.length; i++) {
            var autocomplete = new google.maps.places.Autocomplete(cityInputs[i],{
              types: ['(cities)'], //['(cities)'], geocode to allow postal_code
              });
            autocomplete.inputId = cityInputs[i].id;
            
            autocomplete.addListener('place_changed', fillIn);
        }



        function fillIn() {
          var place = this.getPlace();
          console.log(place.address_components[0].long_name);
          //var boundsByCity = this.getPlace().geometry.viewport;
          var cityBounds = new google.maps.LatLngBounds(
              new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng())
          );
          console.log("🚀 ~ file: custom.js ~ line 97 ~ fillIn ~ cityBounds", cityBounds)
          //var streetInput = document.getElementById('billing_address_1');
          var addressInputs = document.getElementsByClassName("autocomplete-google-address");
          var streetOptions = {
              bounds: cityBounds,
              types: ['address']
          };
          for (var i = 0; i < addressInputs.length; i++) {
              new google.maps.places.Autocomplete(addressInputs[i], streetOptions);
          }
          


        }

    }

    // disable gallery on product image
    $("body").on("click", '.woocommerce-product-gallery__image a', function(e) {
        e.preventDefault();
        e.stopPropagation();
    });


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
