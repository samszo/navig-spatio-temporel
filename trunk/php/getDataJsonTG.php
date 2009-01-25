<?php

	$contenu=$_GET['contenu'];

	$rssJson="";
	$i=0;
	$rssJson.='	
	{ 
	  "country": [';
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
		$rssJson.=' 	
	    ],
  "markers":[';
  foreach ($rss->channel->item as $item) { 
  
    $rssJson.='
	 {
       "point":"'.new GLatLng(43.65654,-79.90138).'",
       "html":"'.trim((str_replace('"',' ',$item->title))).'",
	   "image":"'.($item->image).'",
	   "label":"'.$image.'",
	   "icon":"'.($icon).'"
     }, ';
	 }; 
	$rssJson.=']}';


echo ($rssJson);

?>
