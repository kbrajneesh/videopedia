<?php 
$array = explode('/', $_SERVER['REQUEST_URI']);
	if(count($array)==5)
		include "../../content_single.php";
	else if(count($array)==6)
		include "../../../content_single.php";
?>