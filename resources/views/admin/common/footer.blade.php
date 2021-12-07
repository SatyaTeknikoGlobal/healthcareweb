
</div>
<script src="{{asset('public/assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('public/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('public/assets/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('public/assets/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('public/assets/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('public/assets/dist/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset('public/assets/node_modules/raphael/raphael-min.js')}}"></script>
<script src="{{asset('public/assets/node_modules/morrisjs/morris.min.js')}}"></script>
<script src="{{asset('public/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Popup message jquery -->
<!-- <script src="{{asset('public/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script> -->
<!-- Chart JS -->
<script src="{{asset('public/assets/dist/js/dashboard1.js')}}"></script>



<script src="{{asset('public/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('public/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="{{asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('public/assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script src="{{asset('public/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js')}}"></script>
<script src="{{asset('public/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js')}}"></script>
<script src="{{asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js')}}"></script>



 <script src="{{asset('public/assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('public/assets/node_modules/tablesaw/dist/tablesaw.jquery.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/tablesaw/dist/tablesaw-init.js')}}"></script>

      <script src="{{asset('public/assets/dist/js/pages/chat.js')}}"></script>


<script src="{{asset('public/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>

    <script src="{{asset('public/assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/assets/node_modules/dff/dff.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('public/assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>










</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/eliteadmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Nov 2021 06:09:41 GMT -->
</html>

<script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>



<script>
	$(function () {
		$('#myTable').DataTable();
		var table = $('#example').DataTable({
			"columnDefs": [{
				"visible": false,
				"targets": 2
			}],
			"order": [
			[2, 'asc']
			],
			"displayLength": 25,
			"drawCallback": function (settings) {
				var api = this.api();
				var rows = api.rows({
					page: 'current'
				}).nodes();
				var last = null;
				api.column(2, {
					page: 'current'
				}).data().each(function (group, i) {
					if (last !== group) {
						$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
						last = group;
					}
				});
			}
		});
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
            	var currentOrder = table.order()[0];
            	if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            		table.order([2, 'desc']).draw();
            	} else {
            		table.order([2, 'asc']).draw();
            	}
            });
            // responsive table
            $('#config-table').DataTable({
            	responsive: true
            });
            
            $('#example23').DataTable({
            	dom: 'Bfrtip',
            	buttons: [
            	'copy', 'csv', 'excel', 'pdf', 'print'
            	]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
        });

    </script>
    <script type="text/javascript">
    	$(function(){
    		$("[data-dismiss]").on("click", function(){
    			$('.flash-message').hide();
    			$('.alert-danger').hide();
    			
    		});
    	});
    </script>
    <script type="text/javascript">
    	$(".select2").select2();
    </script>

    <script type="text/javascript">
  $(document).ready(function() {
    var table = $('#examplestate').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>
<script type="text/javascript">
    $('#state_id').on('change', function()
    {

        var _token = '{{ csrf_token() }}';
        var state_id = $('#state_id').val();
        $.ajax({
            url: "{{ route('get_city') }}",
            type: "POST",
            data: {state_id:state_id},
            dataType:"HTML",
            headers:{'X-CSRF-TOKEN': _token},
            cache: false,
            success: function(resp){
                $('#city_id').html(resp);
            }
        });
    });
</script>
<script type="text/javascript">
    $('#city_id').on('change', function()
    {

        var _token = '{{ csrf_token() }}';
        var city_id = $('#city_id').val();
        $.ajax({
            url: "{{ route('get_locality') }}",
            type: "POST",
            data: {city_id:city_id},
            dataType:"HTML",
            headers:{'X-CSRF-TOKEN': _token},
            cache: false,
            success: function(resp){
                $('#locality_id').html(resp);
            }
        });
    });
</script>