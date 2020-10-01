<?php include 'admin/connect/config.php';

$query = $conn->prepare("SELECT * FROM ayar WHERE ayar_id=?");
$query->execute(array(1));
$ayarcek=$query->fetch(PDO::FETCH_ASSOC);

$haksor = $conn->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
$haksor->execute(array(0));
$hakcek=$haksor->fetch(PDO::FETCH_ASSOC);


$iceriksor = $conn->prepare("SELECT * FROM icerik ORDER BY icerik_zaman ASC LIMIT 25");
$iceriksor->execute();
$icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keyw']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
	
    <title><?php echo $ayarcek['ayar_title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
	
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link href="css/ekko-lightbox.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<head>

<!-- Portfolio alani baslangic-->
<script src="jquery-1.8.2.min.js"></script>



</head>
  </head>

  <body>
  <div id="boxWrapp">
    <div class="main-nav clearfix">
	  <!-- navbar -->
	<nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#NavCol">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand bg-primary" href="#about"><?php echo $ayarcek['ayar_title']; ?></a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="NavCol">
         <ul class="nav navbar-nav navbar-right">
           
            <li class="current"><a href="#about" class="linear navbar-brand down">HEM</a></li>
            <li><a href="#aboutMore" class="linear down">OM OSS</a></li>
            <li><a href="#work" class="linear down">I TURKIET</a></li>
            <li><a href="#contact" class="linear down">KONTAKT</a></li>
          </ul>
        
         
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
	  
	</div>
    <!-- Full Page Image Header Area -->
    <div id="about" class="header">

	<div class="maskHeader"></div>
	<div class="main-caption">
		<div class="logo">
			<img src="<?php echo $ayarcek['ayar_logo']; ?>" />
		</div> 
		<!-- slider -->
	<div id="flex-head" class="flexslider">
		<ul class="slides">
			<li>
				<h1>Varför är gungorna tomma?</h1>
			</li>
			<li>
				<h1>668 barn i fängelse i Turkiet!</h1>
			</li>
		</ul>
	</div> 
    <!-- end slider --> 
		<a href="#aboutMore" class="btn btnAbout btn-clear border-color color-primary btn-lg linear">LÄS MER</a>
	</div><!--  end main caption -->
			
    </div>
	<!-- end header -->
    <!-- /Full Page Image Header Area -->

    
    
    
    <!-- /Intro -->   

	<!-- content -->
    <div id="aboutMore" class="page">
      <div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center"><?php echo $hakcek['hakkimizda_baslik']; ?></h2>	
				<div class="line-title bg-primary"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
		
        <div class="row">
           <div class="col-md-12">
			   <div class="build main-about">
				   <div class="row">
				       <div class="col-md-9">
				            <div class="about-content">
						<p><?php echo $hakcek['hakkimizda_icerik']; ?></p>
					</div>
				       </div>
				       <div class="col-md-3">
				            <div class="about-content">
						<iframe width="300" height="200" src="https://www.youtube.com/embed/<?php echo $hakcek['hakkimizda_video'] ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				       </div>
				   </div>
				  
					
				</div>
            </div><!-- end col -->
		  
        
        </div><!-- end row -->
      </div>
      </div>
       <!-- Portfolio -->
    <div id="work" class="page">
      <div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">I TURKIET</h2>	
				<div class="line-title bg-primary"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
		
		<div class="col-md-12">
			
			<?php 

			while ($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>

				<span class=" ">
							<h2 class="text-center"><p><?php echo $icerikcek['icerik_ad']; ?></p></h2>
							<span class="post-meta">
								<span><?php echo $icerikcek['icerik_zaman']; ?> | <a target="_blank" href="<?php echo $icerikcek['icerik_kaynak']; ?>">Referenser</a></span>
							</span>
							<p class="font-size-md"><?php echo $icerikcek['icerik_detay']; ?></p>
							<a style="text-decoration: none;" class="mt-md" href="<?php echo $icerikcek['icerik_kaynak']; ?>">Läs mer...<i class="fa fa-arrow-right"></i></a>
				</span>

			<?php } ?>

		</div>

      </div>
    </div>
	
	<!--contact-->
    <div id="contact" class="page page-bgcolor">
		<div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">KONTAKT</h2>	
				<div class="line-title bg-primary"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->

			<!--<div class="col-md-6 ">
				<div class="build contact clearfix text-center">
					<span class="fa fa-phone color-primary"></span>
					<p><a><?php echo $ayarcek['ayar_tel']; ?></a></p>
					
				</div>
			</div>-->

			<div class="col-md-12 ">
				<div class="build contact clearfix text-center">
					<span class="fa fa-envelope color-primary"></span>
					<p><a style="text-decoration: none;" href="mailto:<?php echo $ayarcek['ayar_mail']; ?>"><?php echo $ayarcek['ayar_mail']; ?></a></p>
				</div>
			</div>
		</div><!-- end row -->
	
	  </div><!-- end container -->

    <!--contact-->

	<!-- Footer -->
    <footer class="bg-black">
      <div class="container">
        <div class="row">
			<div class="col-md-6 ">
				<div class="cp-right">
					<p>&copy; 2017 <a href="http://www.668bebisar.se" class="color-primary linear"><?php echo $ayarcek['ayar_title']; ?></a> i fängelse i Turkiet! </p>
				</div><!-- end build -->
			</div><!-- end col -->
			
			<div class="col-md-6 text-right">
		
			<ul class="list-inline">
			<!--<li><a target="_blank" href="<?php echo $ayarcek['ayar_facebook']; ?>" class="socIcon color-primary linear"><i class="fa fa-facebook fa-2x"></i></a></li>
			
			<li><a target="_blank" href="<?php echo $ayarcek['ayar_instagram']; ?>" class="socIcon color-primary linear"><i class="fa fa-instagram fa-2x"></i></a></li>-->

			<li><a target="_blank" href="<?php echo $ayarcek['ayar_twitter']; ?>" class="socIcon color-primary linear"><i class="fa fa-twitter fa-2x"></i></a></li>
			
			<li><a target="_blank" href="<?php echo $ayarcek['ayar_youtube']; ?>" class="socIcon color-primary linear"><i class="fa fa-youtube fa-2x"></i></a></li>
			</ul>
		
			</div>
        </div>
      </div>
    </footer>
    <!-- /Footer -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.sticky.js" ></script>
	 <script src="js/jquery.nav.js"></script>
    <script src="js/jquery.scrollTo.js" ></script>
    <script src="js/jquery.flexslider.js" ></script>
   <script type="text/javascript" src="js/ekko-lightbox.js"></script>
   <script src="js/jquery.easing.1.3.js" ></script>
   <script src="js/jquery.shuffle.js" ></script>
    <script src="js/script.js"></script>
    <script src="js/site.js"></script>

    <!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->

  </div>
  </body>

</html>
   