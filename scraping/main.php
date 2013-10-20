<?

require 'init.php';
require 'toiscraper.php';
require 'iescraper.php';
require 'hinduscraper.php';


function getAllDetails($keyword)
{
	global $scrapers;
	$links = array();
	$details = array();

	foreach ($scrapers as $key => $scraper) {
		$links[$key] = $scraper->getArticleLinks($keyword);
		foreach ($links[$key] as $index => $link)
		{
			$details[$key][$link] = $scraper->getArticleContent($link);
			if(!isset($details[$key][$link]["comments"]))
				$details[$key][$link]["comments"] = $scraper->getComments($details[$key][$link]["commentUrl"]);
			break;//For testing
		}
		
	}
}

function getDetailsBySource($source,$keyword)
{
	$links = array();
	$details = array();
	$scrapername = $source.'Scraper';
	$scraper = new $scrapername;
	$links = $scraper->getArticleLinks($keyword);
	foreach($links as $index=>$link)
	{
		$details[$link] = $scraper->getArticleContent($link);
		if(!isset($details[$link]["comments"]))
			$details[$link]["comments"] = $scraper->getComments($details[$link]["commentUrl"]);

	}
}

//getAllDetails('modi');
getDetailsBySource('Ie','sachin%20tendulkar');
?>