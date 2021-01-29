@include('backend.layouts.header')    
    @guest
        @yield('login')
    @else
        <!--left sidebar menu-->
        @include('backend.layouts.sidebar')
        @include('backend.layouts.content')
    @endguest
@include('backend.layouts.footer')