<!DOCTYPE html>

<?php
	require 'scripts/functions.php';
?>


<html lang="en" ng-app="mainApp">
<head>
	<title>Computer Hardware Information</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="pictures/favicon.ico" type="image/x-icon">
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body ng-controller="mainCtrl">

	<div id="wrapper">

		<?php drawTop(); ?>
		

		<div class="parts">
			<div class="row vcenter" ng-repeat="part in allParts">

				<!-- Image -->
				<div class="col-sm-3 part-image">
					<a href="part.php?id={{part.part_id}}"><img class="img-responsive" src="scripts/getImage.php?id={{part.part_id}}" /></a>
				</div>

				<!-- Description -->
				<div class="col-sm-9 part-description">
					<h1>{{part.part_name}}</h1>
					<p class="part-description-body">
						{{part.part_description_short}}
						</br>
						<a class="learn-more" href="part.php?id={{part.part_id}}">Learn More >></a>
					</p>
				</div>
			</div>
		</div>
		
		<?php drawBottom(); ?>
	
	</div>

<script>
	var app = angular.module('mainApp', []);
	
	app.controller('mainCtrl', function($scope, $http) {
	
		// Gather all part data
		$http.get("scripts/getAllParts.php").then(function (response) { $scope.allParts = response.data; });
		
	});
</script>
</body>
</html>