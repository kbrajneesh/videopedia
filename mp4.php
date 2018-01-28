<?php
include_once('getid3/getid3.php');
$getID3 = new getID3;
$dir='./';
$d = listmp4('videos');

   $vids = simplexml_load_file('views.xml');
   $k=1;
	foreach ($d as $i) {
		$flag=0;
		$j="/videopedia".$i;
		  foreach( $vids->video as $video )
				{   $title = $video->title;
					if ($j==$title)
					{ $flag=1; break; 
					}
				}
			if($flag==0)
			{
			    $file = $getID3->analyze(".".$i);
					$searchList = $vids->addChild("video");
					$searchList->addChild('title',htmlspecialchars($j));
					$searchList->addChild('views', $k );
					$searchList->addChild('duration', $file['playtime_string'] );
			}
	}
    $vids->asXML('views.xml');
	
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
include_once('search_list.php');
?>