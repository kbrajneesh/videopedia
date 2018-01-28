<?php

$q=$_GET["vid"];						      
		$videos = simplexml_load_file('views.xml');
		  foreach( $videos->video as $video )
		  { 
				$title = $video->title;
				if ($q==$title)
					{
						$video->views = $video->views+1;
							break;
					}
			}
					$videos->asXML('views.xml');
?>