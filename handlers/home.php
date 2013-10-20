<?php
require('scraping/main.php');
require 'api_calls/helper.php';

class HomeHandler{
	function get() {
			$view = array();
			//array_push($view,'home');
			include("views/layout.php");
		}
	function post_xhr(){
		$source = $_POST['source'];
		$keystring = urlencode($_POST['keystring']);
		$details = getDetailsBySource($source,$keystring);
		//echo json_encode($details);
		foreach ($details as $key => $article) {
			$scores[$key] = apiCall($article["comments"], $keystring);
		}
		//echo(json_encode($scores));
		
		$i = 0;
		$total = 0;
		$positive = 0;
		$negative = 0;
		foreach($scores as $key=>$article_score){
			$article_score = json_decode($article_score,1);
			foreach($article_score['results'] as $comment){
				$total += $comment['score'];
				if($comment['score']){
					$i+=1;
				}
				if($comment['score']> 0 ){
					$positive+=1;
				}
				if($comment['score']<0 ){
					$negative+=1;
				}
			}
		}
		// echo 10*$total/$i + 5;
		// echo "\n";
		// echo $positive;
		// echo "\n";
		// echo $negative;

		if((($negative+1)/($positive+1)) > 0.5){
			echo (10*$total + 5 - 2*($negative+1)/($positve+1)
		}
		else{
			echo (10*$total + 5 + 2*($negative+1)/($positve+1)
		}

	}
}