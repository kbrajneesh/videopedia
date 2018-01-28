<?php

function GetDir($dir) {
	static $alldirs = array();
if(is_dir($dir)) {
    if($kami= opendir($dir)){
        while($file = readdir($kami)){
            if($file != '.' && $file != '..'){
                if(is_dir($dir . $file)){
				  $array = explode('/', $dir);
				   if(count($array)>3)
					{
						 $e = $array[count($array)-2];
					$alldirs[] = $dir . $file ." - ".$e;
				   }
				  else
				  {  $alldirs[] = $dir . $file;
				  }
					$file=$dir.$file."/";
                    // since it is a directory we recurse it.
				
                    GetDir( $file );
                }		
            }
        }
    }
    closedir($kami);         
    }
	return $alldirs;
}
$dir='./videos/';
$d = GetDir($dir);
    /* create a dom document with encoding utf8 */
    $domtree = new DOMDocument('1.0', 'UTF-8');

    /* create the root element of the xml tree */
    $xmlRoot = $domtree->createElement("pages");
    /* append it to the document created */
    $xmlRoot = $domtree->appendChild($xmlRoot);

	foreach ($d as $i) {
		$array = explode('/', $i);
		$j = end($array);
		$array1 = explode(' - ', $i);
		$k = $array1[0];
		$array2 = explode('.', $k);
		$l = $array2[1];
	$searchList = $domtree->createElement("link");
    $searchList = $xmlRoot->appendChild($searchList);
    $searchList->appendChild($domtree->createElement('title',$j));
	$searchList->appendChild($domtree->createElement('url',"/videopedia".$l."/all.php"));
	}
    $domtree->save("links.xml");
	
?>