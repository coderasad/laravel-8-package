@extends('backend.layouts.app')

@section('title')
    Login
@endsection
@section('login')
    <div class="row" id="login-row">
        <div class="col-sm-12">

            <div class="wrapper-page">

                <div class="account-pages">
                    <div class="account-box">
                        <div class="account-logo-box">
                            <h2 class="text-uppercase text-center">
                                <a href="index.html" class="text-success">
                                    <span><img src="{{asset('backend/images/logo_dark.png')}}" alt="" height="30"></span>
                                </a>
                            </h2>
                            <h5 class="text-uppercase font-bold m-b-5 m-t-30">Sign In</h5>
                            <p class="m-b-0">Login to your Admin account</p>
                        </div>
                        <div class="account-content">
                            <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                                @csrf
                                <div class="form-group {{ $errors->has('email') ? ' has-danger ' : '' }}m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress" class="">Email address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input name="email" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" value="{{ old('email') }}" type="email" id="emailaddress" required="" placeholder="Enter Your Email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="form-control-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? ' has-danger ' : '' }}m-b-20 row">
                                    <div class="col-12">
                                        <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                                        <label for="password" class="form-control-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input name="password" class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}" type="password" id="password" required="" placeholder="Enter Your password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="form-control-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                    </div>
                                </div>

                            </form>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        <button type="button" class="btn m-r-5 btn-facebook waves-effect waves-light">
                                            <i class="fa fa-facebook"></i>
                                        </button>
                                        <a href="{{ Route('google.login') }}" class="btn m-r-5 btn-googleplus waves-effect waves-light">
                                            <i class="fa fa-google"></i>
                                        </a>
                                        <button type="button" class="btn m-r-5 btn-twitter waves-effect waves-light">
                                            <i class="fa fa-twitter"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-10">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? 
                                        <a href="{{ Route('register') }}" class="text-dark m-l-5"><b>Sign Up</b></a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>
            <!-- end wrapper -->
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#login-row').parents('body').addClass('bg-accpunt-pages')
        })
    </script>
@endpush