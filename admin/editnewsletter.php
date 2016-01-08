<?php include("include/config.php");
include("include/function.php");
include("include/validation.php");
	
 ?>
<?php include("include/header.php");?>
      <div id="main-content" ng-app="myapp" ng-controller="customersCtrl"> <!-- Main Content Section with everything -->
        <?php include("include/content_header.php"); ?>
        <div class="content-box ">
          <div class="content-box-header">
            <h3>Manage Newsletter</h3>
            <div class="clear"></div>
          </div>
          <div class="content-box-content">
            <div class="tab-content default-tab" id="tab1">
              <table>
                <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Email Id</th>
                     <th>Date Time</th>
                    <th>Status</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                
                <tbody>
                 
           
                  <tr ng-repeat="e in names">
                      <td>{{ e.id }}</td>
                      <td>{{ e.email }}</td>
                      <td>{{ e.date_time }}</td>
                      <td><a href="active.php?page=newsletter&id={{e.id}}&active={{e.status}}">
<div ng-if="e.status== 1" >
                 

                <img src="resources/images/icons/active.png" style="border:none; width:18px; height:18px;" />

                </div><div ng-if="e.status== 0" >

                <img src="resources/images/icons/deactivate.png" style="border:none; width:18px; height:18px;" />

              </div>

                </a></td>
                    
                  </tr>
                 
                </tbody>
              </table>
            </div>
            <!-- End #tab1 --> 
            
          </div>
          <!-- End .content-box-content --> 
          
        </div>
           <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script>
		var ashish;
        function manage_order(id,myvar){
			//ashish = $(id).val();
		//alert(ashish);
		$.ajax( {
		url:'manage_order.php',
		type:'get',
		data:'id='+id+'&no='+myvar,
		async:false,
		 success: function(response) {
			//$("#experiment").html(response);
			$(id).val(response);
			alert("Order Changed");
        }
		});
		}

var app = angular.module('myapp',[]);

app.controller('customersCtrl', function($scope, $http) {
  $http.get("jsonnewsletter.php")
  .then(function (response) {

console.log(response.data);
//alert(response.data);
    $scope.names = response.data;});
  


}
);

        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <!-- End .content-box -->
        <?php include("include/footer.php"); ?>
