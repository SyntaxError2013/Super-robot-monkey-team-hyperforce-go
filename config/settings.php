<?
$articleSources = array("toi"=>array("base"=>"http://articles.timesofindia.indiatimes.com/", 
										"search"=>"http://articles.timesofindia.indiatimes.com/keyword/"),
						"ie"=>array("base"=>"",
										"search"=>"http://www.indianexpress.com/topic/")
						);

$apiKey = "AIzaSyBmbBwn6BqrVeXqDG-cbKMQk5RQWvbc0bc";
$ieSearchID = "010961665768017960356:_zeideyipb8";
$toiSearchID = "010961665768017960356:tyb6vy7xp5e";
$hinduSearchID = "010961665768017960356:trzulzp-s_4";

$customSearchUrl = "https://www.googleapis.com/customsearch/v1?key=$apiKey";

// $repustateAPIKey = "d96df10c7b6a0d5846f7c33c427085f7558bf003";
$repustateAPIKey = "68306bc8217d78bad1520ba2c19082086d2781d2";
$repustateEndPoint = "http://api.repustate.com/v2/$repustateAPIKey/bulk-score.json";
?>