<!DOCTYPE html>

<?php
	require 'scripts/functions.php';
?>


<html lang="en" ng-app="mainApp" ng-controller="mainCtrl">
<head>
	<title>{{part_name}}</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="pictures/favicon.ico" type="image/x-icon">
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body >

	<div id="wrapper">

		<?php drawTop(); ?>
		
		
		<h1 id="part-header">{{part_name}}</h1>
		
		<div id="part">
		
			<!--<img src="scripts/getImage.php?id={{part_id}}" class="picture img-responsive" />-->
			<img ng-src="{{part_image}}" class="picture img-responsive" />

			
			<h2 class="partData">Also Known As:</h2>
			<p style="margin: 10px;">{{part_synonyms}}</p>
			
			</br>
			
			<h2 style="margin-top: 10px;">Description:</h2>
			<p class="description">{{part_description}}</p>
			
			</br>
			
			<h2 style="margin-top: 10px;">Other Facts:</h2>
			<ul>
				<li ng-repeat="part in part_facts">{{part}}</li>
			</ul>
		</div>
		
		</br>
		
		<?php //drawBottom(); ?>
	
	</div>


	
<script>
	var app = angular.module('mainApp', []);
	
	app.controller('mainCtrl', function($scope, $http) {
	
		// Gather all part data
		$http.get("scripts/getAllParts.php").then(function (response) {$scope.allParts = response.data;});
		
		
		// Get ID of part
		var bid = location.search.split('id=')[1];
		

		// Gather data for part
		$http.get("scripts/getPart.php?id=" + bid).then(function (response) {
			$scope.rawData = angular.toJson(response.data[0]);
			
			
			var part = JSON.parse($scope.rawData);
			$scope.part_id = part.part_id;
			$scope.part_name = part.part_name;
			$scope.part_description = part.part_description_long;
			$scope.part_synonyms = part.part_synonyms;
			$scope.part_image = "pictures/" + part.part_image;
			console.log(part.part_image);
			$scope.part_facts = [];
			var temp = String(part.part_facts).split(",");
			var i;
			for(i = 0; i < temp.length; i++) {
				$scope.part_facts.push(String(temp[i]));
			}
		});
		
	});
	
	
</script>
</body>
</html>