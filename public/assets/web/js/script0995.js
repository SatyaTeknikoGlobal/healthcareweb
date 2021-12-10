 $(document).ready(function () {
	
        $('#doctorname').typeahead({
			
			
            source: function (query, result) {
				// alert('test');
				var department = $('#department').val();
				var hospital = $('#hospital').val();
				var doctor = $('#doctor').val();
                $.ajax({
                   	url: "assets/ajax/ajax.php?action=getdoctor",
					data: 'val=' + query+'&department='+department+'&hospital='+hospital,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							console.log(item);
							//$('#cat_id').val(item.cm_id);
							return item;
							
                        }));
                    }
                });
            },
			
			
			
        });
    });