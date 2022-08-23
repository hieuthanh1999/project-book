
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kim Dong Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="{{URL::asset('FE/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/transitions.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/color.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/responsive.css')}}">
    
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script> -->
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/base.css') }}">
    <!-- <script src="{{ asset('/assets/js/js.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.modal.min.js') }}"></script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="{{URL::asset('FE/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    <script src="{{URL::asset('FE/js/vendor/jquery-library.js')}}"></script>
    <script src="{{URL::asset('FE/js/vendor/bootstrap.min.js')}}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en">
    </script>
    <script src="{{URL::asset('FE/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('FE/js/jquery.vide.min.js')}}"></script>
    <script src="{{URL::asset('FE/js/countdown.js')}}"></script>
    <script src="{{URL::asset('FE/js/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('FE/js/parallax.js')}}"></script>
    <script src="{{URL::asset('FE/js/countTo.js')}}"></script>
    <script src="{{URL::asset('FE/js/appear.js')}}"></script>
    <script src="{{URL::asset('FE/js/gmap3.js')}}"></script>
    <script src="{{URL::asset('FE/js/main.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('#country_id').change(function() {
            var $city = $('#state_id');
            $.ajax({
                url: "{{ route('cities.index') }}",
                data: {
                    country_id: $(this).val()
                },
                success: function(data) {
                    var obj = JSON.parse(data) ;
                    console.log(obj);
                    $.each(obj, function(id, value) {
                    $city.append('<option value="'+id+'">'+value+'</option>');
                    });
                    $('#city').show(150);
                    $('#address').show(150);
                }
            });
        });

    });


</script>
</head>