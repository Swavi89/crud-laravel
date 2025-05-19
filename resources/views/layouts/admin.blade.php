<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title') | SMS</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url(asset('assets/img/icons/sms-mini-logo.png'))}}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{url(asset('assets/vendor/fonts/boxicons.css'))}}" />
    <!-- DateRangepicker css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Bootstrap datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <!-- FontAwesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url(asset('assets/vendor/css/core.css'))}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url(asset('assets/vendor/css/theme-default.css'))}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url(asset('assets/css/demo.css'))}}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'))}}" />
    <link rel="stylesheet" href="{{url(asset('assets/vendor/libs/apex-charts/apex-charts.css'))}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/tagsinput/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/tagify/tagify.css') }}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Custom CSS -->
    <link href="{{url(asset('assets/css/custom.css'))}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Helpers -->
    <script src="{{url(asset('assets/vendor/js/helpers.js'))}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url(asset('assets/js/config.js'))}}"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('elements/menu')
            <div class="layout-page">
                @include('elements/nav')
                <div class="content-wrapper">
                    @yield('content')
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                Copyright ©2025 - SMS
                            </div>
                        </div>
                    </footer>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url(asset('assets/vendor/libs/jquery/jquery.js'))}}"></script>
    <script src="{{url(asset('assets/vendor/libs/popper/popper.js'))}}"></script>
    <script src="{{url(asset('assets/vendor/js/bootstrap.js'))}}"></script>
    <script src="{{url(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'))}}"></script>
    <script src="{{url(asset('assets/vendor/js/menu.js'))}}"></script>
    <!-- ckeditor -->
    <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{url(asset('assets/vendor/libs/apex-charts/apexcharts.js'))}}"></script>
    <!-- Main JS -->
    <script src="{{url(asset('assets/js/main.js'))}}"></script>
    <!-- Page JS -->
    <script src="{{url(asset('assets/js/dashboards-analytics.js'))}}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{asset ('assets/js/delete.js') }}"></script>
    <script src="{{asset ('assets/js/filterDate.js') }}"></script>
    <!-- Moment with date range picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- jQuery validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
    <!-- Bootstrap datepicker JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="{{asset ('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{asset ('assets/tagify/tagify.js') }}"></script>
</body>

</html>