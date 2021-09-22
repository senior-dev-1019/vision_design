<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta charset="shift_jis">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META http-equiv="X-UA-Compatible" content="IE=Shift_JIS">
    <meta name="keywords" content="vision-design">
    <meta name="description" content="紹介文">
    <META name="GENERATOR" content="IBM WebSphere Studio Homepage Builder Version 11.0.0.0 for Windows">
    <META http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon_1') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon_1') }}">

    <!--CSS -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <link rel="alternate" hreflang="en-US" href="https://www.a3logics.com/">
    <script>var BASEURL = 'https://www.a3logics.com/';</script>
    <title>Vision&Design</title>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    </head>
    
    <body onload="doOnload()" id="my_body" data-new-gr-c-s-check-loaded="14.1028.0" data-gr-ext-installed=""><style type="text/css">html.hs-messages-widget-open.hs-messages-mobile,html.hs-messages-widget-open.hs-messages-mobile body{overflow:hidden!important;position:relative!important}html.hs-messages-widget-open.hs-messages-mobile body{height:100%!important;margin:0!important}#hubspot-messages-iframe-container{display:initial!important;z-index:2147483647;position:fixed!important;bottom:0!important}#hubspot-messages-iframe-container.widget-align-left{left:0!important}#hubspot-messages-iframe-container.widget-align-right{right:0!important}#hubspot-messages-iframe-container.internal{z-index:1016}#hubspot-messages-iframe-container.internal iframe{min-width:108px}#hubspot-messages-iframe-container .shadow-container{display:initial!important;z-index:-1;position:absolute;width:0;height:0;bottom:0;content:""}#hubspot-messages-iframe-container .shadow-container.internal{display:none!important}#hubspot-messages-iframe-container .shadow-container.active{width:400px;height:400px}#hubspot-messages-iframe-container iframe{display:initial!important;width:100%!important;height:100%!important;border:none!important;position:absolute!important;bottom:0!important;right:0!important;background:transparent!important}</style>
        <div class="flex-center position-ref full-height">
        <header class="main-header fixed">
          <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">
                <img alt="logo" class="nor-img" src="{{ asset('/images/logo_w_1.png') }}">
              </a>
                <a href="#contact-us"  class="btn d-block d-lg-none req-button">Contact Us </a>
              <button class="navbar-toggler  _jsExpandMenu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse justify-content-between _jsExpandMenuBar" id="navbarSupportedContent">
                <a href="#contact-us" class="btn">Contact Us </a>
              </div>
            </div>
          </nav>
        </header>
        <div id="main">
        <div class="content" id="content">
    @yield('content')
            <div class="loader" id="loader"></div>
        </div>
        </div>
    @yield('footer')
            
      <footer style="background-image: url(./images/footer-bg.png);">
          <div class="container-fluid">
            <div class="row align-items-center mt-5">
                <div class="col-lg-3">
                    <img alt="logo" src="./images/logo_w_1.png" class="img-fluid">
                </div>
              </div>
              <div class="row footer_bottom">
                  <div class="col-lg-12">
                      <div class="copyright">
                          <p>Copyright © 2021 - <span>Vision & Design</span> | All Rights Reserved</p>

                          <div class="float-end"><a href="https://localhost:9000/privacy-policy">Privacy Policy &nbsp; &nbsp;</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </footer>
        </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">User Info</h4>
            </div>
            <div class="modal-body">
                <form class="Signup-form" action="{{ route('userupdate') }}" method="post">
                         {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="mid" id="mid">
                            <label class="control-label visible-ie8 visible-ie9">UserName</label>
                            <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" id="mfullname" name="mfullname"/>
                        </div>
                        <!-- <div class="form-group"> -->
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            <!-- <label class="control-label visible-ie8 visible-ie9">Email</label>
                            <input class="form-control placeholder-no-fix" type="text" placeholder="Email" id="memail" name="memail"/> -->
                        <!-- </div> -->
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="mpassword" placeholder="Password" name="mpassword"/>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label visible-ie8 visible-ie9">Status</label>-->
                        <!--    <input class="form-control placeholder-no-fix" type="text" placeholder="status" id="mstatus" name="mstatus"/>-->
                        <!--</div>-->
                        <div class="form-actions">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="register-submit-btn" class="btn btn-primary uppercase pull-right">Submit</button>
                        </div>
                    </form>

            </div>
          </div>
          
        </div>
        </div>

    <script src="{{ asset('js/popper.min.js') }}" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/extra.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation-init.js') }}"></script>
    <script src="{{ asset('js/js.cookie.min.js') }}"></script>

    <!-- <script src="{{ asset('js/api.js') }}"></script> -->

    <script>

        function doOnload(){
            $(".loader").fadeOut("slow");
        }

        function fetchRecords(id){
           $.ajax({
             url: 'getUser_data/'+id,
             type: 'get',
             dataType: 'json',
             success: function(response){
               var len = 0;
               if(response['data'] != null){
                 len = response['data'].length;
               }
               if(len > 0){
                 for(var i=0; i<len; i++){
                   var id = response['data'][i].id;
                   var username = response['data'][i].name;
                   var email = response['data'][i].email;
                   var password = response['data'][i].password;
                   var status = response['data'][i].status;
                   $("#mfullname").val(username);
                   // $("#memail").val(email);
                   //$("#mstatus").val(status);
                   // $("#mpassword").val(password);
                   $("#mid").val(id);

                 }
               }
             }
           });
        }
    </script>
    </body>
</html>
