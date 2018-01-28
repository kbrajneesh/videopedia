<?php include "header.php"?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
<!---728x90--->
		
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Recent Videos</h3>
					</div>
					<?php
					  $dir="./videos/thermodynamics/";
					  $dir1=explode(".",$dir);
					  $poster_dir="./images/poster/";
					  if(is_dir($dir))
					  {   $count=0;
						  if($dh =opendir($dir)){
							  while(($file = readdir($dh))!==false){
								  if($file!='.'&&$file!='..'){
							    	 $array = explode('.', $file);
									 $extension = end($array);
									 if($extension=="mp4" && $count<3)
									 {		$count=$count+1;
											 $name=explode(".mp4",$file);
											 $poster_name=$name[0].'.jpg';
											$view=view(end($dir1).$file);
											$duration=duration(end($dir1).$file);
											echo" 
											<div class='col-md-4 resent-grid recommended-grid slider-top-grids' style='margin-bottom:20px'>
												<div class='resent-grid-img recommended-grid-img item_img'>
														<a href='".$dir."single.php?var=". urlencode($file)."'><img src=\"".$poster_dir .$poster_name."\"  alt=''></video></a>
													<div class='time'>
														<p>$duration</p>
													</div>
												</div>
												<div class='resent-grid-info recommended-grid-info'>
													<h3><a href='".$dir."single.php?var=".urlencode($file)."' class='title title-info'> $file</a></h3>
													<ul> 
														<li class='left-list'><p class='views views-info'>$view views</p></li>
													</ul>
												</div>
											</div>
											";
									 }
								  }
							  }
							closedir($dh);
						  }
					  }
					  ?>
					<div class="clearfix"> </div>
				</div>
				
<!---728x90--->
				
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Recommended</h3>
						</div>
						<?php
					  $dir="./videos/java/";
					  $dir1=explode(".",$dir);
					  $poster_dir="./images/poster/";
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
											$view=view(end($dir1).$file);
											$duration=duration(end($dir1).$file);
										echo"  
										<div class='col-md-3 resent-grid recommended-grid slider-top-grids' style='margin-bottom:20px'>
												<div class='resent-grid-img recommended-grid-img item_img'>
														<a href='".$dir."single.php?var=".urlencode($file)."'><img src=\"".$poster_dir .$poster_name."\"  ></video></a>
														<div class='time time1'>
															<p>$duration</p>
													</div>
											</div>
											<div class='resent-grid-info recommended-grid-info video-info-grid'>
												<h5><a href='".$dir."single.php?var=".urlencode($file)."' class='title'> $file</a></h5>
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
						   $q="/videopedia".$q;
						$videos = simplexml_load_file('views.xml');
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
						   $q="/videopedia".$q;
						$videos = simplexml_load_file('views.xml');
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
			</div>
			
<!---728x90--->
			
			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
						<div class="footer-top-nav">
							<ul>
								<li><a href="#">About</a></li>
								<li><a href="#">Developers</a></li>
							</ul>
						</div>
						
				
				</div>
			</div>
			<!-- //footer -->
		</div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/videopedia/css/bootstrap.min.css"></script>
  </body>
</html>