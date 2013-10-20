<?
require_once 'config/settings.php';

function apiCall($comments, $keyword)
{
	global $repustateEndPoint;
	$command = "curl -d topics=$keyword'";
	$text = "";
	foreach ($comments as $key => $comment){
		// $key = $key+1;
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