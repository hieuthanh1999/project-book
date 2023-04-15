<!doctype html>
<html class="no-js" lang="zxx">
@include('FE.layouts.head_cart')

<body class="tg-home tg-homevtwo">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        @include('FE.layouts.header')
        <!--************************************
				Header End
		*************************************-->

        <!--************************************
				Main Start
		*************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
			
			@yield('content')
        </main>
        <!--************************************
				Main End
		*************************************-->
        <!--************************************
				Footer Start
		*************************************-->
        @include('FE.layouts.footer')
        <!--************************************
				Footer End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->
	<script>
        $(document).ready(function() {
            $('#check_coupon_cart').click(function () {
                var _token = $('input[name=_token]').val();
                var couponCode = $('input[name=coupon_code]').val();
                $.ajax({
                    url: 'add_coupon_cart',
                    method: 'POST',
                    data: {
                        _token: _token,
                        coupon_code: couponCode,
                    },
                    success: function (data) {
                        $('#cart_coupon_message').text(data[0])
                        $('#cart_coupon').html(data[3])
                        $('#total').text(data[2].toLocaleString('ja-JP')+ ''+ ' VNĐ')
                        $('#totalKM').text(data[3].toLocaleString('ja-JP')+ ''+ ' VNĐ')
                        $('#data_counpons').val(data[4])
                        $('#settotal').text(data[2].toLocaleString('ja-JP')+ ''+ ' VNĐ')
                        
                    }
                })
            })
        })
</script>
</body>

</html>