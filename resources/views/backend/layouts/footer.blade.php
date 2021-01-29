        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('backend/js/jquery.min.js')}}"></script>
        <script src="{{asset('backend/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
        <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/js/waves.js')}}"></script>
        <script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
        <!-- extra page js  -->        
        @stack('js')
        <!-- App js -->
        <script src="{{asset('backend/js/jquery.core.js')}}"></script>
        <script src="{{asset('backend/js/jquery.app.js')}}"></script>
    </body>
</html>