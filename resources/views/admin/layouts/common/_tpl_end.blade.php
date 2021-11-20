
<script>var hostUrl = "assets/admin/";</script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
		<script src="{{url('vendor/datatables/buttons.server-side.js')}}"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
	<!--	<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>-->
		<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/admin/js/custom/layout-builder/layout-builder.js')}}"></script>
		<!--end::Global Javascript Bundle-->
	@yield('js')
		<!--end::Javascript-->

	</body>
	<!--end::Body-->
</html>
