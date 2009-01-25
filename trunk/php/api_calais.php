<?php

/**
* Example usage for the Open Calais Tags class written by Dan Grossman
* (http://www.dangrossman.info). Read about this class and how to get
* an API key at http://www.dangrossman.info/open-calais-tagsopen-calais-tags
*/
$content=$_GET["text"];
$icon=$_GET["icon"];
//$content = "Algeria"; 
require('opencalais.php');
$apikey = "5ja5wjehybxxv8pb7ez6ka47";
$oc = new OpenCalais($apikey);
$entities = $oc->getEntities($content);

//if(isset($entities[0]))
if($entities)
foreach ($entities as $type => $values) {
	if($type=="Country")
		{ 
		foreach ($values as $entity) {
			$entity=substr($entity,0,strlen($entity)-1);
			//echo $entity;
			$Country[] ='{'.
							'"name":"'.$entity.'",'.
							'"icon":"'.$icon.'"}';
		}
	}
	if($type=="City")
		{ 
		foreach ($values as $entity) {
			$entity=substr($entity,0,strlen($entity)-1);
			//echo $entity;
			$City[] ='{'.
							'"name":"'.$entity.'",'.
							'"icon":"'.$icon.'"}';
		}
	}
	if($type=="Company")
		{ 
		foreach ($values as $entity) {
			$entity=substr($entity,0,strlen($entity)-1);
			//echo $entity;
			$Company[] ='{'.
							'"name":"'.$entity.'",'.
							'"icon":"'.$icon.'"}';
		}
	}
	if($type=="Person")
		{ 
		foreach ($values as $entity) {
			$entity=substr($entity,0,strlen($entity)-1);
			//echo $entity;
			$Person[] ='{'.
							'"name":"'.$entity.'",'.
							'"icon":"'.$icon.'"}';
		}
	}
}
	$json="";
	$json.='{';
	
	if(isset($Country[0]))
		$json1[] ='"country":['.join(',',$Country).']';
	
	if(isset($City[0]))
		$json1[] ='"city":['.join(',',$City).']';
	
	if(isset($Company[0]))
		$json1[] ='"company":['.join(',',$Company).']';

	if(isset($Person[0]))
		$json1[] ='"person":['.join(',',$Person).']';
		
	$json.=join(',',$json1);
	$json.='}';

echo $json;

?>