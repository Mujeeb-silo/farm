<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>User Login | Materialize - Material Design Admin Template</title>
    <link rel="apple-touch-icon" href="asset('app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="asset('app-assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/login.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/toast.min.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
          <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
            <form class="login-form" method="post" id="login_form" action="{{url('post-login')}}">
              {!! csrf_field() !!}
              <div class="row">
                <div class="input-field col s12">
                  <h5 class="ml-4">Sign in</h5>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix pt-2">person_outline</i>
                  <input type="email" id="email" name="email" required>
                  <label for="email" class="center-align">Email</label>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix pt-2">lock_outline</i>
                  <input id="password" type="password" name="password" required>
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m12 l12 ml-2 mt-1">
                  <p>
                    <label>
                      <input type="checkbox" />
                      <span>Remember Me</span>
                    </label>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6 m6 l6">
                  <p class="margin medium-small"><a href="{{url('/registration')}}">Register Now!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                  <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password ?</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('app-assets/js/plugins.js')}}"></script>
    <script src="{{asset('app-assets/js/search.js')}}"></script>
    <script src="{{asset('app-assets/js/custom/custom-script.js')}}"></script>
    <script src="{{asset('app-assets/js/toast.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('src/js/common.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
   <script type="text/javascript">
    
     $(document).ready(function() {
        
        var pwd = $('#login_form :password').fieldValue()[0];
        $('#login_form').ajaxForm({
            dataType:  'json',
            success:function(response){
              if(response.hasOwnProperty('status') && response.status==true)
              {
                var not_obj={};
                not_obj.title='Success';
                not_obj.msg=response.msg;
                not_obj.type='success';
                notification(not_obj)
                if(response.hasOwnProperty('url'))
                {
                  window.location.href=response.url;
                }
              }
              if(response.hasOwnProperty('status') && response.status==false)
              {
                var not_obj={};
                not_obj.title='Error';
                not_obj.msg=response.msg;
                not_obj.type='error';
                notification(not_obj)
              }
            },
            error: function (jqXHR, exception) 
            {
              console.log(jqXHR)
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg =  jqXHR.responseText;
                }
                
                var not_obj={};
                not_obj.title='Error';
                not_obj.msg=msg;
                not_obj.type='error';
                
                notification(not_obj)
            },
        });
     });
   </script>
  </body>
</html>