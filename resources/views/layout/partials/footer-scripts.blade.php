		<script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ URL::asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- Feather Icon JS -->
    	<script src="{{ URL::asset('/assets/libs/feather/feather.min.js')}}"></script>
    	<!-- Swiper JS -->
		<script src="{{ URL::asset('/assets/libs/swiper/js/swiper.min.js')}}"></script>
    	 <!-- Slick -->
	    <script src="{{ URL::asset('/assets/js/slick.js')}}"></script>   
	    <script src="{{ URL::asset('/assets/js/pages/slick.init.js')}}"></script>
	     <!-- sticky-sidebar -->
	    <script src="{{ URL::asset('/assets/libs/theia-sticky-sidebar/dist/ResizeSensor.js')}}"></script>   
	    <script src="{{ URL::asset('/assets/libs/theia-sticky-sidebar/dist/theia-sticky-sidebar.js')}}"></script>
	     <!-- Select2 JS-->
	    <script src="{{ URL::asset('/assets/libs/select2/dist/js/select2.min.js')}}"></script>   
	    <script src="{{ URL::asset('/assets/js/pages/select.init.js')}}"></script>
    	<!-- Daterangepicker js -->
	    <script src="{{ URL::asset('/assets/js/moment.min.js')}}"></script>   
	    <script src="{{ URL::asset('/assets/libs/daterangepicker/daterangepicker.js')}}"></script> 
	    <script src="{{ URL::asset('/assets/js/pages/daterangepicker.init.js')}}"></script>
	    <!-- Daterangepicker js -->
	    <script src="{{ URL::asset('/assets/js/moment.min.js')}}"></script>   
	    <script src="{{ URL::asset('/assets/js/bootstrap-datetimepicker.min.js')}}"></script> 
	    <script src="{{ URL::asset('/assets/js/pages/datetimepicker.init.js')}}"></script>
	    <!-- Apecharts js -->
    	<script src="{{ URL::asset('/assets/libs/apex/apexcharts.min.js')}}"></script>   
	     <!-- Jquery-ui -->
   		 <script src="{{ URL::asset('/assets/js/jquery-ui.min.js')}}"></script> 
	    <!-- Full Calendar js -->
	    <script src="{{ URL::asset('/assets/js/jquery-ui.min.js')}}"></script>   
	    <script src="{{ URL::asset('/assets/libs/fullcalendar/fullcalendar.min.js')}}"></script> 
	    <script src="{{ URL::asset('/assets/js/pages/fullcalendar.init.js')}}"></script>
	    <!-- Fancybox  js -->  
   		 <script src="{{ URL::asset('/assets/libs/fancybox/jquery.fancybox.min.js')}}"></script>   
   		 <!-- Circle Progress JS -->
	    <script src="{{ URL::asset('/assets/js/circle-progress.min.js')}}"></script>   
	    <script src="{{ URL::asset('/assets/js/pages/progress-bar.init.js')}}"></script>
	    <!-- Bootstrap Tagsinput JS -->
	    <script src="{{ URL::asset('/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>   
	    <!-- Dropzone JS -->
	    <script src="{{ URL::asset('/assets/js/pages/dropzone.init.js')}}"></script>  
	    <script src="{{ URL::asset('/assets/js/pages/profile-settings.init.js')}}"></script>
    	<!-- Owl carousel JS -->
     	<script src="{{ URL::asset('/assets/js/owl.carousel.min.js')}}"></script>
		@if(Route::is(['onboarding-phone','patient-phone']))
     	<!-- IntlTelInput JS -->
		<script src="{{ URL::asset('/assets/js/intlTelInput.js')}}"></script>
		<script src="{{ URL::asset('/assets/js/intlTelInput.min.js')}}"></script>
		@endif
	    <!-- Animation js -->
    	<script src="{{ URL::asset('/assets/libs/aos/aos.js')}}"></script>   
		<!-- Custom JS -->
		<script src="{{ URL::asset('/assets/js/app.js')}}"></script>
		@if(Route::is(['map-grid','map-list','map-list-1']))
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
    	<script src="{{ URL::asset('/assets/js/map.js')}}"></script>
    	@endif
		@if(Route::is(['onboarding-phone','patient-phone']))
		<script>
			var input = document.querySelector("#phone");
			window.intlTelInput(input, {
				autoHideDialCode: true,
				autoPlaceholder: "polite",
				formatOnDisplay: true,
				placeholderNumberType: "MOBILE",
				separateDialCode: true,
				utilsScript: "assets/js/utils.js",
			});

		</script>
		@endif