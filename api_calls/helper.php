<?
require_once 'config/settings.php';

function apiCall($comments, $keyword)
{
	global $repustateEndPoint;
	$command = "curl -d topics=$keyword'";
	$text = "";
	$c = 0;
	foreach ($comments as $key => $comment){
		if($c++ > 5) //To avoid articles with large number of comments to eat up api limits
			break;
		$comment = str_replace("'", '', $comment);
		$text .= "text$key=$comment&"; 
	}
	$text = substr($text, 0, -1);
	$command = "$command$text' $repustateEndPoint";
	$command = str_replace('!', '', $command);
	//echo $command;
	$res = shell_exec($command);
	return $res;
}

// apiCall(array("jayant", "im awesome", 'y"es", really'));
?>