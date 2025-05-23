<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
   <title>Login | Sms</title>
   <meta name="description" content="" />
   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icons/sms-mini-logo.png') }}" />
   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
   <!-- Icons. Uncomment required icon fonts -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
   <!-- Core CSS -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
   <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
   <!-- Vendors CSS -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
   <!-- Page CSS -->
   <!-- Page -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}" />
   <!-- Helpers -->
   <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
   <!-- Content -->
   <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
         <div class="authentication-inner">         
            <!-- Register -->
            <div class="card">
               <div class="card-body">
                  <!-- Logo -->
                  <div class="app-brand justify-content-center">
                     <a href="{{url('login')}}" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                           <img width="30" viewBox="0 0 25 42" src="{{ asset('assets/img/icons/sms-logo.png') }}">
                        </span>
                        <span class="app-brand-text demo text-body fw-bolder">SMS</span>
                     </a>
                  </div>
                  <!-- /Logo -->
                  <h4 class="mb-2">Welcome to Portal! 👋</h4>
                  <p class="mb-4">Sign-in to your account and start the adventure</p>
                  @include('elements.flash')
                  <form class="mb-3" action="{{url('/login')}}" method="POST">
                     @csrf
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email_or_mobile" name="email_or_mobile" placeholder="" autofocus />
                        <label>Email Or Mobile</label>
                     </div>
                     <div class="form-floating">
                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        <label>Password</label>
                     </div>
                     <div class='mt-3'>
                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /Register -->
         </div>
      </div>
   </div>
   <!-- / Content -->
   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="{{asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
   <script src="{{asset('assets/vendor/libs/popper/popper.js') }}"></script>
   <script src="{{asset('assets/vendor/js/bootstrap.js') }}"></script>
   <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
   <script src="{{asset('assets/vendor/js/menu.js') }}"></script>
   <!-- endbuild -->
   <!-- Vendors JS -->
   <!-- Main JS -->
   <script src="{{asset('assets/js/main.js') }}"></script>
   <!-- Page JS -->
   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>