
<?php

	// Creates the top part of the website
	function drawTop() {
		echo '
			<header>
				<nav class="top-nav">
					<ul>
						<li><a href="index.php" title="Home">Home</a></li>
						<li ng-repeat="part in allParts">
							<a href="part.php?id={{part.part_id}}" title="{{part.part_name}}">{{part.part_name}}</a>
						</li>
					</ul>
				</nav>
			</header>';
	}
	
	
	// Creates the bottom part of the website
	function drawBottom() {
		echo '
			<footer>
				<nav class="bottom-nav">
					<a href="index.php" title="Home">Home</a>
					<span ng-repeat="part in allParts">
						<a href="part.php?id={{part.part_id}}" title="{{part.part_name}}">{{part.part_name}}</a>
					</span>
				</nav>
			</footer>
			</br>';
	}
?>