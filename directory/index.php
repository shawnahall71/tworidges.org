<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome to Two Ridges Presbyterian Directory</title>
		<?php require_once("../include/head.php"); ?>
		<!--<script>.thumbnail {margin-bottom:10px;}</script>-->
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
		<script src="/js/ui-bootstrap-tpls-0.11.2.min.js"></script>
		<script>
			var site = "http://www.tworidges.org";
			var page = "/directory/mysql_to_json.php";
			angular.module('myApp', ['ui.bootstrap']);
			angular.module('myApp').controller('myCtrl', function ($scope,$http) {
				change = function () {
					var limit = 9;
					var offset = 0;
					$scope.numPerPage = limit;
					if (!isNaN($scope.currentPage)) {
						offset = ($scope.currentPage - 1) * limit;
					}
					$http.get(site + page + "?offset=" + offset + "&limit=" + limit).success(function(response) {
						console.log('offset is: ' + offset);
						console.log('limit is: ' + limit);
						$scope.names = response;
					});

					$http.get(site + page + "?q=count").success(function(response) {
						$scope.totalItems = response;
					});
				}

				$scope.maxSize = 5;

				change();

				$scope.pageChanged = function() {
					console.log('Page changed to: ' + $scope.currentPage);
					change();
				};
			});
		</script>
	</head>

  	<body ng-app="myApp">
	<?php require_once("../include/navbar.php"); ?>

    <!-- Begin page content -->
	<div class="container mytext" ng-controller="myCtrl">
		<div class="text-center">
			<pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" items-per-page="numPerPage" class="pagination-sm" boundary-links="true" ng-change="pageChanged()"></pagination>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-6 col-xs-12" ng-repeat="x in names">
				<a href="#">
		             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
		        </a>
		        <b>Name: </b>{{ x.FirstName }} {{ x.LastName }}<br>
		        <b>Address: </b>{{ x.Address }}<br>{{ x.City }}, {{ x.State }} {{ x.Zip }} <br>
		        <b>Home Phone: </b>{{ x.HomePhone }}<br>
		        <b>Cell Phone: </b>{{ x.CellPhone }}<br>
		        <b>Work Phone: </b>{{ x.WorkPhone }}<br>
		        <b>Email: </b>{{ x.Email }}<br><br>
			</div>
		</div>
		<div class="text-center">
			<pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" items-per-page="numPerPage" class="pagination-sm" boundary-links="true" ng-change="pageChanged()"></pagination>
		</div>
	</div>	
	<?php require_once("../include/js.php"); ?>
  	</body>
</html>
