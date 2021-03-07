        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('backend/js/jquery.min.js')}}"></script>
        {{-- <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script><!-- yajra dataTable--> --}}
        <script src="{{asset('backend/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
        <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/js/waves.js')}}"></script>
        <script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
        <!-- extra page js  -->        
		@stack('js')
		<script src="{{ asset('js/sweetalert.min.js') }}"></script>
		<script src="{{ asset('backend/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/plugins/autocomplete/jquery.mockjax.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/plugins/autocomplete/jquery.autocomplete.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/plugins/autocomplete/countries.js') }}" type="text/javascript"></script>
		{{-- <script src="{{ asset('backend/pages/jquery.autocomplete.init.js') }}" type="text/javascript"></script> --}}
		<script src="{{ asset('backend/pages/jquery.form-advanced.init.js') }}" type="text/javascript" ></script>
		
        <script>

            // hide alert msg 
            $("document").ready(function() {
                setTimeout(function() {
                    $("div.ar-alert-msg").remove();
                }, 5000); // 5 secs
            });

            // Image show instant start============
			function readURLa(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#img_show').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
				$("#imgInp").change(function () {
				readURLa(this);
			});
				
			//Delete item
			$(document).on("click","#delete",function(e){
				e.preventDefault();
				var link = $(this).attr("href");
				swal({
					title: "Are you Want to Delete?",
					text: "Once Delete, This will be permanently Delete!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete)=> {
					if(willDelete) {
						window.location.href = link;
						event.preventDefault();
					}
				});
			});

      	</script>
        <!-- App js -->
        <script src="{{asset('backend/js/jquery.core.js')}}"></script>
        <script src="{{asset('backend/js/jquery.app.js')}}"></script>
    </body>
</html>