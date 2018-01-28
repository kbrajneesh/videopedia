<!DOCTYPE HTML>
<html>
<head>
<title>Videopedia | SLIET </title>
<link rel="shortcut icon" href="/videopedia/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Videopedia" />
<!-- bootstrap -->
<link href="/videopedia/css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="/videopedia/css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="/videopedia/css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="/videopedia/js/jquery-1.11.1.min.js"></script>
<link href = "/videopedia/css/jquery-ui.css" rel = "stylesheet">
<script src="/videopedia/jquery/jquery.min.js"></script>
<script src="/videopedia/jquery/jquery-ui.js"></script>
<script>
	 $(document).ready(function () {         
       $('#search_box').val('');
});
         $(function() {
           
            $( "#search_box" ).autocomplete({
               minLength: 0,
               source: "/videopedia/livesearch.php",
               focus: function( event, ui ) {
                  $( "#search_box" ).val( ui.item.label );
                     return false;
               },
               select: function( event, ui ) {
                  location.href=ui.item.value;
				  return false;
               }
            })
				
            .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
               return $( "<li>" )
               .append( "<a href="+ item.value+">"+ item.label  +  "</a>")
               .appendTo( ul );
            };
         });

      </script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/videopedia/index.php"><h1> Site Name</h1></a>
         </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input id = "search_box" type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="/videopedia/images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
   					<li><center><h2 style="color:#21DEEF">Videopedia</h2></center></li>
					<li id="home"><a href="/videopedia/index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li id="cs"><a href="#" onClick=slide_me('cl-effect-0')>Computer Science<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-0">
							<li ><a href="#" onClick=slide_me('cl-effect-3')>Algorithm<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
								<ul class="cl-effect-3 " style="margin-left:21px;">
									<li><a href="/videopedia/videos/algorithm/basic/all.php">Basic</a></li>
									<li><a href="/videopedia/videos/algorithm/dynamic_prog/all.php">Dynamic Prog</a></li>
									<li><a href="#">Greedy Algo</a></li>
									<li><a href="#">Various Algo </a></li>
								</ul>
							</li>
							<li ><a href="#" onClick=slide_me('cl-effect-4')>C++<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
								<ul class="cl-effect-4 " style="margin-left:21px;" >
									<li><a href="/videopedia/videos/c++/basic/all.php">Basic</a></li>
									<li><a href="#">Advance C++</a></li>
									<li><a href="/videopedia/videos/c++/stl/all.php">STL</a></li>
								</ul>
							</li>
							<li><a href="/videopedia/videos/java/all.php">Java</a></li> 
						</ul>
					<li id="ee"><a href="#" onClick=slide_me('cl-effect-1')>Electrical Engineering<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-1">
							<li><a href="/videopedia/videos/abc/all.php">Abc</a></li>                                             
							<li><a href="/videopedia/videos/efg/all.php">Efg</a></li>
							<li><a href="/videopedia/videos/hij/all.php">Hij</a></li> 
						</ul>
					<li id="me"><a href="#" onClick=slide_me('cl-effect-2')>Mechanical Engineering<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-2">
							<li><a href="/videopedia/videos/thermodynamics/all.php">Thermodynamics</a></li>                                             
							<li><a href="#">Cricket</a></li>
							<li><a href="#">Tennis</a></li> 
							<li><a href="#">Shattil</a></li>  
						</ul>
					<li id="other"><a href="#">Miscellaneous</a></li>
				  </ul>
				  <script>
						function slide_me( effect ){
							$( "ul." + effect).slideToggle( 300 );
							}
				  </script>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
				</div>
        </div>