<?php

/**
* Example usage for the Open Calais Tags class written by Dan Grossman
* (http://www.dangrossman.info). Read about this class and how to get
* an API key at http://www.dangrossman.info/open-calais-tagsopen-calais-tags
*/
$content=$_GET["text"];
//$content = "Algeria"; 
require('opencalais.php');
$apikey = "5ja5wjehybxxv8pb7ez6ka47";
$oc = new OpenCalais($apikey);
$entities = $oc->getEntities($content);


foreach ($entities as $type => $values) {
if($type=="Country")
	{ 
	foreach ($values as $entity) {
		$entity=substr($entity,0,strlen($entity)-1);
		//echo $entity;
		$results[] ='"'.$entity.'"';
	}
}
}
$json = "{".'"country":['.join(",",$results). "]}";
echo $json;

?>