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
			var readpage = "/diradm/read.php";
			var createpage = "/diradm/create.php";
			var updatepage = "/diradm/update.php";
			var deletepage = "/diradm/delete.php";
			angular.module('myApp', ['ui.bootstrap']);
			angular.module('myApp').controller('pageCtrl', function ($scope,$http) {
				change = function () {
					var limit = 9;
					var offset = 0;
					$scope.numPerPage = limit;
					if (!isNaN($scope.currentPage)) {
						offset = ($scope.currentPage - 1) * limit;
					}
					$http.get(site + readpage + "?offset=" + offset + "&limit=" + limit).success(function(response) {
						console.log('offset is: ' + offset);
						console.log('limit is: ' + limit);
						$scope.names = response;
					});

					$http.get(site + readpage + "?q=count").success(function(response) {
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
			angular.module('myApp').controller('createModalCtrl', function ($scope,$http,$modal) {
				$scope.entry = {
			        FirstName: null,
			        LastName: null,
			        Address: null,
			        City: null,
			        State: null,
			        Zip: null,
			        HomePhone: null,
			        CellPhone: null,
			        WorkPhone: null,
			        Email: null,
			        Image: null,
			    };

				$scope.open = function() {
					var createModalInstance = $modal.open({
						templateUrl: "createModalContent.html",
						controller: "createModalInstance",
						backdrop: 'static'
					});
				};
			});
			angular.module('myApp').controller('createModalInstance', function ($scope,$http,$modalInstance) {

				$scope.close = function () {
					$http({
						url: site + createpage,
						method: "POST",
						data: $scope.entry,
						headers: {'Content-Type': 'application/x-www-form-urlencoded'}
					}).success(function(data, status, headers, config){});
				  	$modalInstance.close('closing');
				};

				$scope.cancel = function () {
				  	$modalInstance.dismiss('cancel');
				};
			});
		</script>
		<script type="text/ng-template" id="createModalContent.html">
	        <div class="modal-header">
	            <h3 class="modal-title">Add new entry to directory</h3>
	        </div>
            <form ng-submit="submit()">
				<div class="modal-body form-group">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" placeholder="Enter first name" ng-model="entry.FirstName" />
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" placeholder="Enter last name" ng-model="entry.LastName" />
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" placeholder="Enter address" ng-model="entry.Address" />
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" placeholder="Enter city" ng-model="entry.City" />
					</div>
					<div class="form-group">
						<label>State</label>
						<input type="text" class="form-control" placeholder="Enter state" ng-model="entry.State" />
					</div>
					<div class="form-group">
						<label>Zip</label>
						<input type="text" class="form-control" placeholder="Enter zip" ng-model="entry.Zip" />
					</div>
					<div class="form-group">
						<label>Home Phone</label>
						<input type="text" class="form-control" placeholder="Enter home phone" ng-model="entry.HomePhone" />
					</div>
					<div class="form-group">
						<label>Cell Phone</label>
						<input type="text" class="form-control" placeholder="Enter cell phone" ng-model="entry.CellPhone" />
					</div>
					<div class="form-group">
						<label>Work Phone</label>
						<input type="text" class="form-control" placeholder="Enter work phone" ng-model="entry.WorkPhone" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" placeholder="Enter email" ng-model="entry.Email" />
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="text" class="form-control" placeholder="Enter image" ng-model="entry.Image" />
					</div>
				</div>
				<div class="modal-footer">
				    <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
				    <input type="submit" class="btn primary-btn" value="Submit" ng-click="close()" data-dismiss="modal"/>
				</div>
	        </form>
	    </script>
	</head>

  	<body ng-app="myApp">
	<?php require_once("../include/navbar.php"); ?>

    <!-- Begin page content -->
	<div class="container mytext" ng-controller="pageCtrl">
		<div class="row">
			<div ng-controller="createModalCtrl">
				<div class="col-lg-4 col-sm-6 col-xs-12">
					<div class="text-center padtop">
						<button class="btn btn-success" ng-click="open()">
							<span class="glyphicon glyphicon-user"></span>  New Entry
						</button>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-xs-12">
				<div class="text-center">
					<pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" items-per-page="numPerPage" class="pagination-sm" boundary-links="true" ng-change="pageChanged()"></pagination>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-6 col-xs-12" ng-repeat="x in names">
				<a href="http://res.cloudinary.com/tworidges/image/upload/directory/{{ x.Image }}">
		             <img src="http://res.cloudinary.com/tworidges/image/upload/c_fill,g_faces:center,h_600,w_800/directory/{{ x.Image }}" class="thumbnail img-responsive">
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
