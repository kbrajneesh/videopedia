<?php
			$array = explode('/', $_SERVER['REQUEST_URI']);
			if(count($array)==5)
						include "../../header.php";
			else if(count($array)==6)
						include "../../../header.php";
?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
<!---728x90--->

			<div class="main-grids">
<!---728x90--->
				
				<div class="top-grids" >
					<div class="recommended-info">
						<?php
						//echo $array [1]; // vid
						//echo $array [2]; // algo
						//echo $array [3]; // filename
					  $dir='./';
					  $dir1= explode('/all', $_SERVER['REQUEST_URI']);
					  $poster_dir="/videopedia/images/poster/";
					  if(count($array)==5)
						echo"	<h3>All ".$array[3]." videos </h3>";
					  else if(count($array)==6)
						echo"	<h3>All ".$array[4]." ( ".$array[3]." ) videos </h3>";  
						echo "</div>";
					  if(is_dir($dir))
					  {
						  if($dh =opendir($dir)){
							  while(($file = readdir($dh))!==false){
								  if($file!='.'&&$file!='..'){
									$array = explode('.', $file);
									 $extension = end($array);
									 if($extension=="mp4")
									 {
											 $name=explode(".mp4",$file);
											 $poster_name=$name[0].'.jpg';
											 $view=view($dir1[0].'/'.$file);
											 $duration=duration($dir1[0].'/'.$file);
												echo"  
													<div class='col-md-3 resent-grid recommended-grid slider-top-grids' style='margin-bottom:20px'>
															<div class='resent-grid-img recommended-grid-img item_img'>
															<a href='./single.php?var=". urlencode($file)."'><img src=\"".$poster_dir .$poster_name."\"  ></video></a>
															<div class='time time1'>
																<p>$duration</p>
															</div>
														</div>
														<div class='resent-grid-info recommended-grid-info video-info-grid'>
															<h5><a href='./single.php?var=".urlencode($file)."' class='title'> $file</a></h5>
															<ul>
															<li class='left-list'><p class='views views-info'>$view views</p></li>
														</ul>
														</div>
														<div class='clearfix'> </div>
													</div>
												";
									}
								  }
							  }
							closedir($dh);
						  }
					  }
					  	function view($q){
						      $array = explode('/', $_SERVER['REQUEST_URI']);
						   	if(count($array)==5)
									$videos = simplexml_load_file('../../views.xml');
							else if(count($array)==6)
									$videos = simplexml_load_file('../../../views.xml');
						  foreach( $videos->video as $video )
							{   $title = $video->title;
								if ($q==$title)
								{
									$views = $video->views; 
									return $views;
								}
							}
							return 0;
					  }
					  function duration($q){
						      $array = explode('/', $_SERVER['REQUEST_URI']);
						   	if(count($array)==5)
									$videos = simplexml_load_file('../../views.xml');
							else if(count($array)==6)
									$videos = simplexml_load_file('../../../views.xml');
						  foreach( $videos->video as $video )
							{   $title = $video->title;
								if ($q==$title)
								{
									$duration = $video->duration; 
									return $duration;
								}
							}
							return 0;
					  }
					  ?>
					
						<div class="clearfix"> </div>
					</div>
			</div>
			
<!---728x90--->
			
			
		</div>
		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/videopedia/css/bootstrap.min.css"></script>
  </body>
</html>