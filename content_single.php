<?php
		if( !isset($_GET['var']) )
			{
			header('Location: /videopedia/index.php');
			}
			$array = explode('/', $_SERVER['REQUEST_URI']);
			if(count($array)==5)
						include "../../header.php";
			else if(count($array)==6)
						include "../../../header.php";
?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
<!---728x90--->
		
			<div class="show-top-grids">
				<div class="col-sm-8 single-left ">
				<?php
					$variable = $_GET['var'];
					$dir1 = explode('/single', $_SERVER['REQUEST_URI']);
						$var1=explode(".mp4",$variable);
						 $view_dir = $dir1[0] .'/'.$variable;
						  $view=view($view_dir);
						echo"  
						<div class='song'>
							<div class='song-info'>
								<h3>".$var1[0]."</h3>	
						</div>
							<div class='video-grid'>
							
							<video id='video' src='".$variable."' onClick='playPause();'  ondblclick='webkitEnterFullScreen();' controls autoplay >
							<track src='".$var1[0].".vtt' kind='subtitles' srclang='en' label='English' default></video>
						</div>
						<h5> views : $view	</h5>	 
					</div>
					<div class='clearfix'> </div>
					"?>
					
					<script> 
							document.body.onkeyup = function(e){
											if(e.keyCode == 32)
											{   
												if (video.paused == true)
													video.play();
												else
													video.pause();
											}
											e.preventDefault();			
						}


							var myVideo=document.getElementById('video'); 
							function playPause()
							{ 
							if (myVideo.paused) 
								myVideo.play(); 
							else 
								myVideo.pause();
							}
							var flag=0;
							var a = $("#video").attr("src");
							var u=window.location.pathname;
							var url = u .split( '/single.php' );
							var url_c = u .split( '/' );
							var vid= encodeURIComponent(url[0]+'/'+a) ;
							myVideo.addEventListener('timeupdate', function(){
							if(this.currentTime >= 5 && flag==0 ) { 
									if(url_c.length==5){
									$.ajax({
									  url: '../../update_view.php?vid='+ vid  
									});
									}
									if(url_c.length==6){
									$.ajax({
									  url: '../../../update_view.php?vid='+vid
									});
									}
									flag=1;
								}
							});		
												
							</script>
							
							
				</div>
				<div class="col-md-4 single-right">
					<h3>Related Videos</h3>
					<div class="single-grid-right" style="max-height:465px; overflow:auto;">
					<?php
					  $dir="./";
					  $dir1 = explode('/single', $_SERVER['REQUEST_URI']);
					  $poster_dir="/videopedia/images/poster/";
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
											 if($name[0]!=$var1[0])
											 {   $view_dir = $dir1[0] .'/'.$file;
												 $view=view($view_dir);
												 $duration=duration($view_dir);
												echo" 
													<div class='single-right-grids'>
														<div class='col-md-4 single-right-grid-left'>
															<a href='./single.php?var=".urlencode($file)."'><img src=\"".$poster_dir .$poster_name."\"  ></img></a>
															<div class='time time2'>
																<p>$duration</p>
															</div>
														</div>
														<div class='col-md-8 single-right-grid-right'>
															<div class='my_title'><a href='./single.php?var=".urlencode($file)."' class='title'> $file</a></div>
															<p class='views'>$view views</p>
														</div>
														<div class='clearfix'> </div>
													</div>
												";
											 }	
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
					  function update_view($q){
						      $array = explode('/', $_SERVER['REQUEST_URI']);
						   	if(count($array)==5)
									$videos = simplexml_load_file('../../views.xml');
							else if(count($array)==6)
									$videos = simplexml_load_file('../../../views.xml');
						  foreach( $videos->video as $video )
							{   $title = $video->title;
								if ($q==$title)
								{
									$video->views = $video->views+1;
									break;
								}
							}
							if(count($array)==5)
								$videos->asXML('../../views.xml');		
							else if(count($array)==6)
								$videos->asXML('../../../views.xml');
							
					  }
					  ?>
					</div>
				</div>
				
<!---300x250--->
				<div class="clearfix"> </div>
			</div>
<!---728x90--->
			
		</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/videopedia/js/bootstrap.min.js"></script>
  </body>
</html>