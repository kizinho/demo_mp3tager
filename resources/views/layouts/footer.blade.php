
<!--footer start-->

<footer class="footer footer-1" style="background-color: #292D4E !important; border-bottom: 4px #F6A724 solid;">
    <div class="primary-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-logo mb-3">
                        <img id="footer-logo-img" class="img-center" src="{{asset($settings['logo']) }}" alt="">
                    </div>
                    <p class="mb-0">{{$settings['site_name']}} main task is to extract the largest possible profit from exchange operations at crypto-currency trading markets. We can guarantee a stable inflow of profits, as we are always searching for new, more appealing and profitable operation methods.</p>
                    <div class="social-icons circle social-hover mt-4">
                        <ul class="list-inline mb-0">

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-list pl-lg-5 sm-mt-5">
                    <h5>Useful links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{url('about-us')}}"><i class="fas fa-angle-right"></i> About Us</a>
                        </li>
                        <li><a href="{{url('terms-condition')}}"><i class="fas fa-angle-right"></i> Terms & Condition</a>
                        </li>
                        <li><a href="{{url('privacy-policy')}}"><i class="fas fa-angle-right"></i> Privacy Policy</a>
                        </li>
                        <li><a href="{{url('plan')}}"><i class="fas fa-angle-right"> </i>Pricing Plans</a>
                        </li>
                        <li><a href="{{url('contact-us')}}"><i class="fas fa-angle-right"></i> Contact Us</a>
                        </li>

                        <li><a href="{{url('faq')}}"><i class="fas fa-angle-right"></i> Frequently Asked Questions</a>
                        </li>
                        <li><a href="{{url('banners')}}"><i class="fas fa-angle-right"></i> Promotional Banners</a>
                        </li>

                        </li>
                        @Auth
                        @else
                        <li><a href="{{url('password/reset')}}"><i class="fas fa-angle-right"></i> Forgot Password</a>
                        </li>
                        @endAuth

                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 md-mt-5">
                    <h5>Contact information</h5>
                    <ul class="media-icon list-unstyled">
                        <li class="mb-4"> <i class="ti-map-alt"></i>
                            <p class="mb-0">{{$settings['address']}}</p>
                        </li>
                        <li class="mb-4"> <i class="ti-email"></i>
                            <a href="mailto:{{$settings['site_email']}}">{{$settings['site_email']}}</a>
                        </li>
                        <li> <i class="ti-mobile"></i>
                            <a href="#">{{$settings['site_phone']}}</a>
                        </li>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-6 md-mt-5 footer-list">
                    <h5>DAILY OFFERS & DISCOUNTS</h5>
                    <p>Enter your email below to get Daily Offers and Discount info!</p>
                    <p>
                    <form id="sub">
                       <div class="input-group mb-3">
                           <input type="email" placeholder="Your Email Address" id="email" aria-label="Your Email Address" class="form-control bg-transparent border-dark border-right-0" style="background-color: #fff;">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-dark border-left-0"><i class="fa fa-paper-plane text-lg"></i></button>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="secondary-footer text-center" 
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12"> <span>{{$settings['copy_right']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

      @section('script')
    <script>
    /*
     login
     */
    $('#sub').submit(function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".modal").show();
            },
            complete: function () {
                $(".modal").hide();
               
            }
        });
        jQuery.ajax({
            url: "{{url('/sub')}}",
            type: 'POST',
            data: {
                email: jQuery('#email').val()


            },
            success: function (data) {
                if (data.status === 401) {
                    jQuery.each(data.message, function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {
                            //  window.location.href = "{{url('/register')}}";
                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    return false;
                }
                if (data.status === 200) {
                    var message = data.message;
                   
                    toastr.success(message, {timeOut: 50000});
                     $("#contact")[0].reset();
                    return false;
                }
            }

        });
    });

</script> 
    @endsection