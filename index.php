<?php
session_start();
require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/Facebook.php';

$fb = new Facebook\Facebook([
  'app_id' => '1023466864382694',
  'app_secret' => '814079f172a9399b12177a08a9cbbc42',
  'default_graph_version' => 'v2.4',
]);

$token='CAAOi1nLkEuYBAAb450P075eXAo7scVnZAl1GXPwffgIbJqfO0AZC54bZA7T4ehfLdo574gdBiC1Wfw1CwZBdviCrLNywe2MDlK3cXdu5XqCWmtFn2s5LmGuZAsJeC5rLvZB2O4arqDdnEf6sIn98vu4lnwZA4qhypQnIbRI05Y0vvBGg9w3zj9jdVadMdzMIh13f0xtZCnEyNAZDZD';
$fb->setDefaultAccessToken($token);

	$requestFriends = $fb->get('/me/taggable_friends?fields=name&limit=100');
	$friends = $requestFriends->getGraphEdge();



if ($fb->next($friends)) {
		$allFriends = array();
		$friendsArray = $friends->asArray();
		$allFriends = array_merge($friendsArray, $allFriends);
		while ($friends = $fb->next($friends)) {
			$friendsArray = $friends->asArray();
			$allFriends = array_merge($friendsArray, $allFriends);
		}
		foreach ($allFriends as $key) {
			echo $key['name'] . "<br>";
		}
		echo count($allfriends);
	} else {
		$allFriends = $friends->asArray();
		$totalFriends = count($allFriends);
		foreach ($allFriends as $key) {
			echo $key['name'] . "<br>";
		}
	}

?>