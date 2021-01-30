<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | CodeFuN </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">
        <!-- extra page css -->        
        @stack('css')
        <!-- App css -->
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/metismenu.min')}}.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/ar-custom.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('backend/js/modernizr.min')}}.js"></script>
    </head>
    <body>
        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="mdi mdi-check-all"></i>
            <strong>Well done!</strong> You successfully read this important alert
            message.
        </div>