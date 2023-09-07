
<div class="row">
    <div class="footer">
        <div class="col-md-12">
            <div class="col-md-6 col-sm-6">
                <div class="editorial_1">
                    <p style="text-align:center">Author : {{ $setting->author }}</p>
                    <p style="text-align:center">Office : {{ $setting->address }}</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="editorial_2">
                    <p style="text-align:center">Phone : {{ $setting->phone }}, Email : {{ $setting->email }}</p>
                    <p style="text-align:center"> <a target="_blank" href="{{ $setting->website }}"> Website </a></p>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-6">
            <div class="row">
                @foreach($footer_categories_chunk as $footer_categories)
                <div class="col-md-4 col-xs-3 col-sm-3 ">
                    <div class="footer-menu footer-border">
                        <ul>
                            @foreach($footer_categories as $footer_category)
                            <li> <a href="{{ route('category.post', $footer_category['slug']) }}">{{ $footer_category['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="col-md-7 col-sm-6">
            <div class="row">
                <div class="col-md-6 col-sm-12  footer-logo">
                    <a href="{{ url('/') }}">
                        <img style="width:100%; height:auto" src="{{ url( $setting->logo ) }}">
                    </a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="btm-social">
                        <ul>
                            <li><a href="{{ $setting->facebook }}" target="_blank"> <i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href="{{ $setting->twitter }}" target="_blank"> <i class="fa fa-twitter"></i> Twitter</a></li>
                            <li><a href="{{ $setting->linked_in }}" target="_blank"> <i class="fa fa-linkedin"></i> Linkedin</a></li>
                            <li><a href="{{ $setting->google_plus }}" target="_blank"> <i class="fa fa-google-plus"></i> Google Plus</a></li>
                            <li><a href="{{ $setting->youtube }}" target="_blank"> <i class="fa fa-youtube"></i> Youtube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="bottom_footer">
            <div class="col-md-6 col-sm-6 copy">© All rights reserved © 2018 Fresh Script </div>
            <div class="col-md-6 col-sm-6 Design"> Developed By <a href="" target="_blank" title="Mobile :   +880017xxxxxxxx"><b>Arafat Hossen Rony</b></a>
            </div>
        </div>
    </div>

    <div class="scrollToTop"><i class="fa fa-arrow-circle-up"></i></div>

    </section>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('public/frontend') }}/others/js/jquery.min.js"></script>
    <script src="{{ asset('public/frontend') }}/others/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontend') }}/others/js/main.js"></script>
    <script src="{{ asset('public/frontend') }}/others/js/lazyload.min.js"></script>

    <script>
            $("img.lazyload").lazyload();
    </script>
    @stack('js')
    </body>

    <!-- Mirrored from newssitedesign.com/freshscript/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Feb 2021 09:06:05 GMT -->
    </html>
