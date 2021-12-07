
</div>
<script src="<?php echo e(asset('public/assets/node_modules/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo e(asset('public/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo e(asset('public/assets/dist/js/perfect-scrollbar.jquery.min.js')); ?>"></script>
<!--Wave Effects -->
<script src="<?php echo e(asset('public/assets/dist/js/waves.js')); ?>"></script>
<!--Menu sidebar -->
<script src="<?php echo e(asset('public/assets/dist/js/sidebarmenu.js')); ?>"></script>
<!--Custom JavaScript -->
<script src="<?php echo e(asset('public/assets/dist/js/custom.min.js')); ?>"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="<?php echo e(asset('public/assets/node_modules/raphael/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/node_modules/morrisjs/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>
<!-- Popup message jquery -->
<!-- <script src="<?php echo e(asset('public/assets/node_modules/toast-master/js/jquery.toast.js')); ?>"></script> -->
<!-- Chart JS -->
<script src="<?php echo e(asset('public/assets/dist/js/dashboard1.js')); ?>"></script>



<script src="<?php echo e(asset('public/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>
<!-- start - This is for export functionality only -->
<script src="<?php echo e(asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js')); ?>"></script>



 <script src="<?php echo e(asset('public/assets/node_modules/select2/dist/js/select2.full.min.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('public/assets/node_modules/tablesaw/dist/tablesaw.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/node_modules/tablesaw/dist/tablesaw-init.js')); ?>"></script>

      <script src="<?php echo e(asset('public/assets/dist/js/pages/chat.js')); ?>"></script>

</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/eliteadmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Nov 2021 06:09:41 GMT -->
</html>

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
</script><?php /**PATH /home/appmantr/healthcareweb.appmantra.live/resources/views/admin/common/footer.blade.php ENDPATH**/ ?>