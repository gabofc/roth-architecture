<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <?php include 'seo.php';?>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Roth Architecture - Projects</title>
    <meta name="description" content="Projects" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Open Graph-->
          <meta property="og:title" content="Roth Architecture - Projects">
          <meta property="og:description" content="Projects"> 
          <meta property="og:site_name" content="Roth Architecture">
          <meta property="og:locale" content="en"> 
          <meta property="og:type" content="website">
          <meta property="og:url" content="https://roth-architecture.com">
                    <meta property="og:image" content=<?php echo ($dire."images/og-cover.webp")?>> 
          <link rel="canonical" href="https://roth-architecture.com/" />

        <!-- <link rel="manifest" href="site.webmanifest"> --> 
        <link rel="apple-touch-icon" href=<?php echo ($dire."icon.png")?>>
        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" href=<?php echo ($dire."images/favicon-black-bg.png")?>>
        <link rel="icon" type="image/png" href=<?php echo ($dire."images/favicon-black-bg.png")?>>

            <link defer rel="stylesheet" href=<?php echo ($dire."css/main.css")?>>
<link rel="stylesheet" href=<?php echo ($dire."css/normalize.css")?>>
		<link rel="stylesheet" type="text/css" href=<?php echo ($dire."css/slick-theme.css")?>>
	  	<link rel="stylesheet" href=<?php echo ($dire."css/slickp.css")?>>
    
        <link defer href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
	  
  <div class="loading-container">
      <div class="loading-screen">
      </div>
    </div>
		
		    <div data-barba="wrapper">

      <div data-barba="container" data-barba-namespace="projects">
		  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-PRX75J7
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	

		  
	<?php include 'header.php';?>

<div id="smooth-wrapper">
<div id="smooth-content">
<div class="backnav"></div>		  	 
	
	
	  <section class="container-fluid proyect-grid px-lg-5">
		  
		  <div class="row g-3 g-md-5 pb-md-5 pb-4">
		  
		 <div class="col-md-3"> 
		 <select name="Type" id="Type" onchange="dofilter();" >
		   <option value="empty">Type</option>
		   <option value="Residential">Residential</option>
		   <option value="Hospitality">Hospitality</option>
		   <option value="Hotel">Hotel</option>
		   <option value="Restaurante">Restaurante</option>
		   <option value="Cultural">Cultural</option>
		   <option value="Retail">Retail</option>
		 </select> 
		  </div>
		  <div class="col-md-3"> 
		  <select name="Location" id="Location" onchange="dofilter();" >
			  <option value="empty">Location</option>
		   <option value="Tulum, Quintana Roo">Tulum, Quintana Roo</option>
		   <option value="San José, Puerto Rico">San José, Puerto Rico</option>
		   <option value="Uh May, Quintana Roo">Uh May, Quintana Roo</option>
			  <option value="Holbox, Quintana Roo">Holbox, Quintana Roo</option>
		 </select> 
		  </div>
		  <div class="col-md-3"> 
		  <select name="Status" id="Status" onchange="dofilter();" >
			  <option value="empty">Status</option>
		   <option value="In design">In design</option>
			  <option value="In progress">In progress</option>
			  <option value="Under Construction">Under Construction</option>
		   <option value="Completed">Completed</option>
		 </select> 
		  </div>
		  <div class="col-md-3"> 
		  <select name="Year" id="Year" onchange="dofilter();" >
			  <option value="empty">Year</option>
		   <option value="2014">2014</option>
		   <option value="2017">2017</option>
		   <option value="2018">2018</option>
			  <option value="2020">2020</option>
		   <option value="2022-2024">2022-2024</option>
			  <option value="2023">2023</option>
		   <option value="Future">Future</option>
		 </select> 
		  </div>
		  
		  
		  </div>	  
		  
		  
      <div class="row g-5 ">

		  
		  
			  <div class="col-md-4 proy" data-filter="0">
  <a href="projects/azulik-residences.php" class="extpost  botper">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="AZULIK Residences" src="images/proyectos/thumb-azulik-residences.webp" >
				   <div class="tab-text">
					   <h2>AZULIK Residences</h2>
                  </div>
          </div>
				  </a>
</div>	  


		   <!--  <div class="col-md-4 proy" data-filter="9">
  <a href="projects/villa-holbox.php" class="extpost botper">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Zak Ik" src="images/proyectos/thumb-villa-holbox.webp" >
				   <div class="tab-text">
					   <h2>Villa Holbox</h2>
                  </div>
          </div>
				  </a>
</div> -->

<div class="col-md-4 proy" data-filter="10">
  <a href="projects/villa-sian-kaan.php" class="extpost botper">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Zak Ik" src="images/proyectos/thumb-casa-max.webp" >
				   <div class="tab-text">
					   <h2>Villa Sian Ka'an</h2>
                  </div>
          </div>
				  </a>
</div>
		  

		  
		  
		  <div class="col-md-4 proy" data-filter="1">
  <a href="projects/azulik-siete-musas.php" class="extpost  botper">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Azulik Siete musas" src="images/proyectos/thumb-azulik-sietemusas-4.webp" >
				   <div class="tab-text">
					   <h2>AZULIK Siete Musas</h2>
                  </div>
          </div>
				  </a>
</div>
		  
		  
		  
		  <div class="col-md-4 proy" data-filter="2">
  <a href="projects/azulik-tulum.php" class="extpost  botper">
              <div class="img-wrap-cover1 imghproygrid vish">
            <img alt="Azulik Tulum" src="images/proyectos/thumb-azulik-tulum-5.webp" >
				   <div class="tab-text">
					   <h2>AZULIK Tulum</h2>
                  </div>
          </div>
				  </a>
</div>


		  
          <div class="col-md-4 proy" data-filter="3">
			  <a href="projects/uh-may-residence.php" class="extpost botper ">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Uh May Residence" src="images/proyectos/thumb-azulik-residence-9.webp" >
				   <div class="tab-text">
					   <h2>Uh May Residence</h2>
                  </div>
          </div>
				  </a>
      </div>
 
      <div class="col-md-4 proy" data-filter="4">
        <a href="projects/kin-toh.php" class="extpost botper ">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Kin Toh" src="images/proyectos/thumb-kin-toh-4.webp" >
				   <div class="tab-text">
					   <h2>Kin Toh</h2>
                  </div>
          </div>
				  </a>
  </div>

  <div class="col-md-4 proy" data-filter="5">
  <a href="projects/sfer-ik-tulum.php" class="extpost botper ">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Sfer-Ik Tulum" src="images/proyectos/thumb-sfer-ik-tulum-5.webp" >
				   <div class="tab-text">
					   <h2>SFER-IK Tulum</h2>
                  </div>
          </div>
				  </a>
</div>
		  
		      <div class="col-md-4 proy"  data-filter="6">
			  <a href="projects/sfer-ik-uh-may.php" class="extpost botper ">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Sfer-Ik Uh May" src="images/proyectos/thumb-sfer-ik-uh-mau-6.webp" >
				   <div class="tab-text">
					   <h2>SFER-IK Uh May</h2>
                  </div>
          </div>
				  </a>
      </div>
 
      <div class="col-md-4 proy" data-filter="7">
        <a href="projects/tseen-ja.php" class="extpost botper ">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Tseen Ja" src="images/proyectos/thumb-tseen-ja-3.webp" >
				   <div class="tab-text">
					   <h2>Tseen Ja</h2>
                  </div>
          </div>
				  </a>
  </div>

  <div class="col-md-4 proy" data-filter="8">
  <a href="projects/zak-ik.php" class="extpost botper">
              <div class="img-wrap-cover1 imghproygrid  vish">
            <img alt="Zak Ik" src="images/proyectos/thumb-zak-ik-8.webp" >
				   <div class="tab-text">
					   <h2>Zak Ik</h2>
                  </div>
          </div>
				  </a>
</div>
		  

		  
		    


        </div>
		  
		    <div class="row g-5 pb-5">
		  
		 <div class="col-md-8 mx-auto text-center nores"> 
			 <h2> No results found </h2>
     </div>


        </div>
  </section>
  <?php include 'footer.php';?>	
	</div>
</div>

</div>
</div>
<div class="sharethis-inline-share-buttons"></div>
	  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/@barba/core"></script>
<script src="https://unpkg.com/@barba/prefetch"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/Observer.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollToPlugin.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.8.3/TweenMax.min.js"></script>
		<script src=<?php echo ($dire."js/DrawSVGPlugin.min.js")?>></script>	
		<script src=<?php echo ($dire."js/SplitText.min.js")?>></script>
		<script src=<?php echo ($dire."js/ScrollSmoother.min.js")?>></script>
		<script src=<?php echo ($dire."js/slick.js")?>></script>
		<script src=<?php echo ($dire."js/interior.js")?>></script>
   
		<script src=<?php echo ($dire."js/main.js")?>></script>
	  <script src="https://platform-api.sharethis.com/js/sharethis.js#property=63a60f2f65735e001232db71&product=sop" asinc defer></script>
	  

  </body>
</html>
