<?php

$rss = simplexml_load_file('http://www.techno-science.net/include/news.xml'); 

foreach ($rss->channel->item as $item) { 
  echo '<div class="rss">
           <div class="rss_title">Titre : '.$item->title.'</div>
           <div class="rss_date">posté le '.date("d/m/Y",strtotime($item->pubDate)).'</div>
           '.$item->description.' <a href="'.$item->link.'">Lire tout l\'article</a>
        </div>';
} 

 
?>
