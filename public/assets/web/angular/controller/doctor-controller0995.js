var url = window.location.href;
var arr = url.split("index.html");
var result = arr[0] + "//" + arr[2]+"/"; // arr[2] for local arr[1] for online
var Path="assets/angular/api/index.html";


var app = angular.module('cms', ['ngAnimate','ngRoute','ui.bootstrap', 'infinite-scroll']);
//alert(Path);
app.filter('removeHTMLTags', function () { //removeHTMLTags is the filter name
            return function (text) {
              return text ? String(text).replace(/<[^>]+>/gm, '') : ''; // used regular expression
            };
          });
		  
		  
		 
 



//App controller for CMS
app.controller('doctor', function($scope, $http, $timeout) {
	
  $scope.filteredDoct = [];
  $scope.currentPage = 1;
  $scope.numPerPage = 10;
  $scope.maxSize = 5;
  

	
	$scope.getDoctorData = function (sitepath)
	{
		var department = $('#department').val();
		var hospital = $('#hospital').val();
		var doctor = $('#doctorname').val();
		
		$scope.doctpreload = true;
		$scope.doctdata = false;
		$('#docterdata').hide();
		$scope.notfound = false;
		 $scope.Docts = [];
		$http({
			url:sitepath+Path+"service.php",
			method:"POST",
			data:$.param({action:'GetDoctorDetails','Department':department,'hospital':hospital,'doctor':doctor}),
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			//headers:{'Cache-Control': 'no-cache'}

		}).then(function successCallback(response){
			$scope.doctpreload = false;
			$scope.doctdata = true;
			$('#docterdata').show();
			
			$scope.DoctorDetails  = response.data.DoctorList;
			
				angular.forEach(response.data.DoctorList,function(item) {
        $scope.Docts.push(item);
       });
			/*$scope.filteredDoct= $scope.Docts.slice(0, 10);*/		
			$scope.Status  = response.data.status;
			
			 $scope.filteredDoct = $scope.Docts.slice(0, 5);
$scope.getMoreData = function () {
    $scope.filteredDoct = $scope.Docts.slice(0, $scope.filteredDoct.length + 5);
}
			
			
			if($scope.Status=='failure')
			{
				$scope.errorresult = 'There are no results that match your search !'
				$scope.notfound = true;
				}else
				{
					$scope.errorresult = ''
					$scope.notfound = false;
					
					}
			//console.log($scope.Status);
		});

 $scope.$watch('currentPage + numPerPage', function() {
    var begin = (($scope.currentPage - 1) * $scope.numPerPage)
    , end = begin + $scope.numPerPage;
    
    $scope.filteredDoct = $scope.Docts.slice(begin, end);
  });
	
		
		
		}
		
	
	  $scope.remove_hospital = function(sitepath) {
		//alert(sit)
	  $scope.hospital='';
            $("#hospital").val(''); //.trigger("change"); 
			 $("#hospital").select2();
			 $("#app_text_hs").hide();
			 $scope.getDoctorData(sitepath);
			 	var hs=$("#hospital").val();
				var dept=$("#department").val();

				if(hs!='' || dept!='')
				{
	 				 $("#app_text").show();
				}
				else{
				 $("#app_text").hide();
				}
	
	
    };	
	
	  $scope.remove_department = function(sitepath) {
	 		 $scope.department='';
            $("#department").val(''); //.trigger("change"); 
			 $("#department").select2();
			 $("#app_text_dept").hide();
			 $scope.getDoctorData(sitepath);
			 	var hs=$("#hospital").val();
				var dept=$("#department").val();

				if(hs!='' || dept!='')
				{
	 				 $("#app_text").show();
				}
				else{
				 $("#app_text").hide();
				}
    };	
 
		
		
	/////////////////for pagination//////////////////


	  $scope.setPage = function(pageNo) {
		
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 5);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	
	 $scope.pagesize = {};
    
	  //Configuration
	  $scope.pagesize.configs = [
	  							 
		     	                 /*{'name': '5','value': '5'},*/
		     	                  {'name': '10','value': '10'},
								  {'name': '20','value': '20'},
								  {'name': '50','value': '50'},
		     	                
								 
		     	               ];
	  //Setting first option as selected in configuration select
	  $scope.pagesize.config = $scope.pagesize.configs[0].value; 

///////////////////pagination section  closed///////////
		

 
});







 