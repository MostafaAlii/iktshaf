<script>var hostUrl = "assets/admin/";</script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
		<script src="{{url('vendor/datatables/buttons.server-side.js')}}"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/admin/js/custom/layout-builder/layout-builder.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ar.min.js" integrity="sha512-rdmfDN1kbYc+OJTJsY9LCoXGUjuXaMwrUwBGdLmGs4g9MwdlgnFdfZPRMlFIOB9xTTyauBfAOV/R4BQDwqxg9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!--end::Javascript-->
		<script type="text/javascript">
			$(function() {
			   $('#discount_start_date').datepicker({
					rtl: true, 
					language: 'ar',
					format: 'yyyy-mm-dd',
			   });
			   $('#discount_end_date').datepicker({
					rtl: true,
					language: 'ar',
					format: 'yyyy-mm-dd',
			   });
			});
		</script>
	</body>
	<!--end::Body-->
</html>