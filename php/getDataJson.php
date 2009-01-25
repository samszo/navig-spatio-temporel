<?php

//$source_rss=$_GET['rss'];

$source_rss="bbc";
$icon;

switch($source_rss){
	case "bbc":
		$rss=simplexml_load_file('http://newsrss.bbc.co.uk/rss/newsonline_world_edition/front_page/rss.xml'); 
		$icon="js/Timeline/api/images/marker";
		break;
	case "google":
		$rss=simplexml_load_file('http://news.google.com/news?ned=us&topic=h&output=rss');
		$icon="api/images/dark-green-circle.png";
		break;
	case "ts":
		$rss=simplexml_load_file('http://www.techno-science.net/include/news.xml');
		$icon="api/images/dark-blue-circle.png";
		break;
	case "lemonde":
		$rss=simplexml_load_file('http://www.lemonde.fr/rss/une.xml');
		$icon="api/images/gray-circle.png";
		break;
	
}

//   D M d Y h:i:s TO "start":"'.date('D M d Y h:i:s',strtotime($item->pubDate)).'",
$rssJson="";
$i=0;
$rssJson.='	
{ 
  "events": [';
  foreach ($rss->channel->item as $item) { 
  
    $rssJson.='
	 {
       "start":"'.date('U',strtotime($item->pubDate)).'",
       "title":"'.trim((str_replace('"',' ',$item->title))).'",
	   "image":"'.($item->image).'",
	   "link":"'.($item->link).'",
	   "icon":"'.($icon).'",
	   "description":"'.trim(str_replace('"',' ',$item->description)).'",
       "durationEvent":false
     }, ';
	 }; 
	$rssJson.=" 	
    ]    
}";


echo ($rssJson);
?>
