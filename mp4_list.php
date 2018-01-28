<?php
include_once('getid3/getid3.php');
$getID3 = new getID3;
$dir='./';
$d = listmp4('videos');

    $domtree = new DOMDocument('1.0', 'UTF-8');
    $xmlRoot = $domtree->createElement("videos");
    $xmlRoot = $domtree->appendChild($xmlRoot);
   $k=1;
	foreach ($d as $i) {
		$file = $getID3->analyze(".".$i);
		$i="/videopedia".$i;
	$searchList = $domtree->createElement("video");
    $searchList = $xmlRoot->appendChild($searchList);
    $searchList->appendChild($domtree->createElement('title',htmlspecialchars($i)));
	$searchList->appendChild($domtree->createElement('views', $k ));
	$searchList->appendChild($domtree->createElement('duration', $file['playtime_string'] ));
	}
    $domtree->save("views.xml");
	
	function listmp4($dir) {
	static $all_mp4 =array();
    $dirs = glob($dir . '/*', GLOB_ONLYDIR);
    if (count($dirs) > 0) {
        foreach ($dirs as $d) 
		{
		 if($dh =opendir($d)){
				  while(($file= readdir($dh))!==false){
						if($file!='.'&&$file!='..'){
							$array = explode('.', $file);
						 $extension = end($array);
							 if($extension=="mp4")
						 { $all_mp4[]= "/".$d."/".$file;
																 
						 }
						}
				  }
																											  }
		}
    }
    foreach ($dirs as $dir) listmp4($dir);
    return $all_mp4;
}
?>