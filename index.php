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
    <link rel="stylesheet" href="style.css" />
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/slider.js"></script>

		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<head>

<!-- Portfolio alani baslangic-->
<script src="jquery-1.8.2.min.js"></script>

<style>
	@media screen and (min-width: 480px) {
    #logofont{
    	font-size: 60px;
    	font-family:Lucida Console;
    }
    #logofont:hover{
    	font-size: 60px;
    	font-family:Lucida Console;
    	color: white;
    }
}
@media screen and (max-width: 480px) {
    #logofont{
    	font-size: 40px;
    	font-family:Lucida Console;
    }
    #logofont:hover{
    	font-size: 40px;
    	font-family:Lucida Console;
    	color: white;
    }
}
</style>



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
		<div class="flex-head">
			<h1 id="logofont"><?php echo $ayarcek['ayar_title']; ?></h1>
		</div>
		
		<!--<div class="logo">
			<img src="<?php echo $ayarcek['ayar_logo']; ?>" />
		</div> -->
		<!-- slider -->
	<div id="flex-head" class="flexslider">
		<ul class="slides">
			<li>
				<h1>Varför är gungorna tomma?</h1>
			</li>
		</ul>
	</div> 
	<div style="font-size: 20px; color: lightgray;">I Turkiet är 668 barn tillsammans med sina mammor fängslade på godtyckliga grunder.</div>
    <!-- end slider --> 
		<a href="#varfor" class="btn btnAbout btn-clear border-color color-primary btn-lg linear">Varför #668bebisar</a>
	</div><!--  end main caption -->
			
    </div>
	<!-- end header -->
    <!-- /Full Page Image Header Area -->

    
    
    
    <!-- /Intro -->   

    <!--varför-->
    <div id="varfor" class="page">
      <div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">Varför #668bebisar?</h2>	
				<div class="line-title bg-primary"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
		
        <div class="row">
           <div class="col-md-12">
			   <div class="build main-about">
				   <div class="row">
				       <div class="col-md-12">
				            <div class="about-content">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hashtagen #668babies är en kampanj som startat i USA för att uppmärksamma de 668 barn som då var i turkiska fängelser. Med barn avses barn under 6 år och i Turkiet finns många fler barn i fängelser tillsammans med sina föräldrar. Hashtagen #668babies, och den svenska motsvarigheten #668bebisar berör enbart de barn som är fängslade med föräldrar som godtyckligt frihetsberövats och vars domar inte fastställts. Hashtagen #668bebisar är således inspirerad av den amerikanska hashtagen och har därmed ett likartat syfte, nämligen att bidra till ett medvetande kring barns situation i dagens Turkiet. Vår önskan är att mammor åtminstone kan släppas i väntan på sina respektive rättegångar.
						Alla barn har enligt Barnkonventionens 8:e artikel rätt till liv, överlevnad och utveckling, och denna rättighet tas delvis ifrån dem. I nuläget är siffran för barn som befinner sig bakom galler högre än 668.</p>
					</div>
				       </div>
				       
				   </div>
				  
					
				</div>
            </div><!-- end col -->
		  
        
        </div><!-- end row -->
      </div>
      </div>

      <!--end varför-->

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
				<h2 class="text-center">I Turkiet</h2>	
				<div class="line-title bg-primary"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
		
		<div class="col-md-12">
			<div class="slider">
				<a href="#" class="onceki"><</a>
				<a href="#" class="sonraki">></a>
				<ul class="slider_liste">
					
			
			<?php 

			while ($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>

			<li>

					<span>
						<h2 class="text-center"><p><?php echo $icerikcek['icerik_ad']; ?></p></h2>
						<span class="post-meta">
							<span><?php echo $icerikcek['icerik_zaman']; ?> | <a target="_blank" href="<?php echo $icerikcek['icerik_kaynak']; ?>">Referenser</a></span>
						</span>
						<p class="font-size-md"><?php echo $icerikcek['icerik_detay']; ?></p>
						<a style="text-decoration: none;" class="mt-md" href="<?php echo $icerikcek['icerik_kaynak']; ?>">Läs mer...<i class="fa fa-arrow-right"></i></a>
					</span>
				
			</li>

			<?php } ?>

				</ul>
			</div>

		</div>

      </div>
    </div>
	
	<!--contact-->
    <div id="contact" class="page page-bgcolor">
		<div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">Kontakt</h2>	
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
					<p>&copy; Design by  <a class="color-primary linear"><?php echo $ayarcek['ayar_author']; ?></a> 2017</p>
				</div><!-- end build -->
			</div><!-- end col -->
			
			<div class="col-md-6 text-right">
		
			<ul class="list-inline">
			<li><a target="_blank" href="<?php echo $ayarcek['ayar_facebook']; ?>" class="socIcon color-primary linear"><i class="fa fa-facebook fa-2x"></i></a></li>
			
			<!--<li><a target="_blank" href="<?php echo $ayarcek['ayar_instagram']; ?>" class="socIcon color-primary linear"><i class="fa fa-instagram fa-2x"></i></a></li>-->

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
   