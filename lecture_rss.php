<?php

$rss = simplexml_load_file('http://newsrss.bbc.co.uk/rss/newsonline_world_edition/front_page/rss.xml'); 

$xml="";
$i=0;
$fichier="data_events.xml"; 
$xml.="	
{ 
  'events': [";
  foreach ($rss->channel->item as $item) { 
  if($i<3)
    $xml.="
	 {
       'start':'".date("M d Y h:i:s",strtotime($item->pubDate))."',
       'title':'". addslashes(str_replace("\""," ",$item->title))."',
	   'image':'".$item->image."',
	   'link':'".$item->link."',
	   
	   'description':'".$item->description."',
       'durationEvent':false
     }, ";
	 $i++;
	 }; 
	$xml.=" 	
    ]    
}";


echo $xml;


?>
