<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="{{ asset('public/assets/') }}/js/jquery.min.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="{{ asset('public/assets/') }}/js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="{{ asset('public/assets/') }}/js/nifty.min.js"></script>




<!--=================================================-->

<!--Demo script [ DEMONSTRATION ]-->
<script src="{{ asset('public/assets/') }}/js/demo/nifty-demo.min.js"></script>

<!--FooTable [ OPTIONAL ]-->
<script src="{{ asset('public/assets/') }}/plugins/fooTable/dist/footable.all.min.js"></script>


<!--FooTable Example [ SAMPLE ]-->
<script src="{{ asset('public/assets/') }}/js/demo/tables-footable.js"></script>



<!--Flot Chart [ OPTIONAL ]-->
<script src="{{ asset('public/assets/') }}/plugins/flot-charts/jquery.flot.min.js"></script>
<script src="{{ asset('public/assets/') }}/plugins/flot-charts/jquery.flot.resize.min.js"></script>
<script src="{{ asset('public/assets/') }}/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>


<!--Sparkline [ OPTIONAL ]-->
<script src="{{ asset('public/assets/') }}/plugins/sparkline/jquery.sparkline.min.js"></script>


<!--Specify page [ SAMPLE ]-->
<script src="{{ asset('public/assets/') }}/js/demo/dashboard.js"></script>

<script src="{{ asset('public/assets/') }}/plugins/select2/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>



<script>
    $(document).ready(function(){
        $("#calculate_insurance").click(function(){
            if($('#user_select').val() == 'thirdParty'){
                if($('#user_select2').val() == 'private'){
                    $('#required_amount').text('230');
                }else if($('#user_select2').val() == 'commercial'){
                    $('#required_amount').text('374');
                }else if($('#user_select2').val() == 'company'){
                    $('#required_amount').text('230');
                }
                if($('.required_amount').hasClass('hide')){
                    $('.required_amount').removeClass('hide');
                }
            }

            if($('#user_select').val() == 'comprehensive'){
                var input_amount  = $('#user_amount').val();
                if(input_amount != ''){
                    if($('#user_select2').val() == 'private'){
                        input_amount = input_amount * 0.05;
                        input_amount = input_amount / 2;
                        input_amount = input_amount + 230;
                    }else if($('#user_select2').val() == 'commercial'){
                        input_amount = input_amount * 0.07 *0.75;
                        input_amount = input_amount + 374;
                    }else if($('#user_select2').val() == 'company'){
                        input_amount = input_amount * 0.06 * 0.5;
                        input_amount = input_amount + 230;
                    }
                    $('#required_amount').text(input_amount.toFixed(0));
                    if($('.required_amount').hasClass('hide')){
                        $('.required_amount').removeClass('hide');
                    }
                } else{
                    $('.required_amount').addClass('hide');
                    alert('Please Enter Amount');
                }
            }
        });

        $('#user_select, #user_select2').change(function(){
            $('.required_amount').addClass('hide');
            if($('#user_select').val() == 'comprehensive'){
                $('.user_amount').removeClass('hide');
            }else{
                $('.user_amount').addClass('hide');
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.footable-toggle').click(function() {
            $('span').find(function(){
                $(this).find('.nod').parent().parent().children('div.footable-row-detail-name').remove();
                $(this).find('.nod').parent().parent().children('div.footable-row-detail-value').remove();
            });
        });

        $("#network").change(function(){
            if($("#network").val() == 'vodafone-gh'){
                $("#tokenDiv").html('');
                $("#tokenDiv").append('<div class="col-sm-12"><div class="form-group"> <label class="control-label" for="token">Provide Vodafone token</label> <input type="text" id="token" name="token" class="form-control" /> </div></div> ');
            }else{
                $("#tokenDiv").html('');
            }
        });
        $("#carNumbers,#carType").on('change keyup',function(){
            if($('#carType').val() == 'private' && $('#carNumbers').val() > 0 ){
                $('#estimate_amount').text((198 + (50* $('#carNumbers').val())) - 50);
                $('#subscription_pay_button').html('<button class="btn btn-success" id="btn-subscription-express" type="submit">Subscribe with Card</button>');
                $('.estimate_amount').removeClass('hide');
            }else if($('#carType').val() == 'corporate' && $('#carNumbers').val() > 0){
                $('#estimate_amount').text((200 + (50* $('#carNumbers').val())) - 50);
                $('#subscription_pay_button').html('<button class="btn btn-success" id="btn-subscription-express" type="submit">Subscribe with Card</button>');
                $('.estimate_amount').removeClass('hide');
            }else{
                $('#subscription_pay_button').html('');
                $('.estimate_amount').addClass('hide');
            }
        });


        $("#subscription_pay_button").on('click', '#btn-subscription-express', function(){
            var url = "{{ url('/dashboard/subscribe/express') }}";
            $("#subscription-form").attr("action",url).submit();
        });

        /*$("#subscription-form").bind('submit', function (e) {
            e.preventDefault();
        })*/

    });
</script>

<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    var map, infoWindow;
    function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 17
        });


        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                $('.latitude').val(position.coords.latitude);
                $('.longitude').val(position.coords.longitude);

                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: 'Property Location',
                    draggable: true
                });

                markerCoords(marker);

                function markerCoords(markerobject){
                    google.maps.event.addListener(markerobject, 'dragend', function(evt){
                        $('.latitude').val( evt.latLng.lat());
                        $('.longitude').val(evt.latLng.lng());
                        infoWindow.setOptions({
                            content: '<p style="color: black;">Marker dropped: ' + 'Location has been updated' + '</p>'
                        });
                        infoWindow.open(map, markerobject);
                    });

                    google.maps.event.addListener(markerobject, 'drag', function(evt){
                        console.log("marker is being dragged");
                    });
                }

                //infoWindow.setPosition(pos);
                //infoWindow.setContent('Location found.');
                //infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADcX3PRdoAErlTbiaAWeNmUKccGpzjcHM&callback=initMap">
</script>

