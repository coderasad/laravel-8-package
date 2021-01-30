@extends('backend.layouts.app')

@section('title')
    Register
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
                            <h5 class="text-uppercase font-bold m-b-5 m-t-30">Register</h5>
                            <p class="m-b-0">Get access to our admin panel</p>
                        </div>
                        <div class="account-content">
                            <form action="{{ route('register') }}" method="POST" class="form-horizontal" >
                                @csrf
                                <div class="form-group row m-b-20  {{ $errors->has('name') ? ' has-danger ' : '' }}">
                                    <div class="col-12">
                                        <label for="username">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}" value="{{ old('name') }}" id="username" required="" placeholder="Enter Your Name">
                                        </div>
                                        @error('name')
                                            <span class="form-control-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-b-20 {{ $errors->has('email') ? ' has-danger ' : '' }}">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input name="email" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" value="{{ old('email') }}" type="email" id="emailaddress" required="" placeholder="Enter Your Email">
                                        </div>
                                        @error('email')
                                            <span class="form-control-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-b-20 {{ $errors->has('password') ? ' has-danger ' : '' }}">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                           <input name="password" class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}" type="password" required="" id="password" placeholder="Enter your password">
                                        </div>
                                        @error('password')
                                            <span class="form-control-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password_confirmation">Confirm Password</label>
                                       <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                           <input name="password_confirmation" class="form-control" type="password" required="" id="password_confirmation" placeholder="Enter your confirm password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                I accept <a href="#">Terms and Conditions</a>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign Up Free</button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-12">
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
                                <div class="col-12 text-center">
                                    <p class="text-muted">Already have an account?  
                                        <a href="{{ Route('login') }}" class="text-dark m-l-5"><b>Sign In</b></a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end card-box-->
                </div>
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