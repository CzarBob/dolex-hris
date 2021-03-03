<?php
/*session_start();
include "dbConnection.php";

if ($_SESSION['username'] == ""){
  header("Location: admin");
  exit;
}*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Citizen's Charter</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel="icon" href="img/doleico.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <style type="text/css">
    .shadow_round {
      box-shadow: 1px 2px 4px 1px rgba(0, 0, 0, 0.2), 2px 4px 5px 2px rgba(0, 0, 0, 0.14), 3px 1px 10px 2px rgba(0, 0, 0, 0.12);
      transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);

      &:hover {
        box-shadow: 0px 11px 15px -7px rgba(0, 0, 0, 0.2), 0px 24px 38px 3px rgba(0, 0, 0, 0.14), 0px 9px 46px 8px rgba(0, 0, 0, 0.12);
      }
    }
  </style>
  <main id="main">

    <section id="services" class="section-bg">
      <div class="container">
        <div id="portfolio">
          <div class="col-lg-12 wow fadeInUp ">
            <header class="section-header">
              <h3 class="section-title">Our Services</h3>
            </header>
            <ul id="portfolio-flters">
             <!-- <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-prov">Provincial</li>
              <li data-filter=".filter-tssd">TSSD</li> -->
            </ul>
          </div>

          <div class="row portfolio-container wow fadeInUp">
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-none" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="ACP"><img src="logo/ACP_ICON.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- ACP -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-ble" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="AEP"><img src="logo/AEP_icon.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- AEP -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-ble" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="AEP_EXCLUSION"><img src="logo/AEP_EX_icon.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- AEP -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-blr" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="CBA"><img src="logo/CBA ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- CBA -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-bwc" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="CSHP"><img src="logo/CSHP ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- CSHP -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-bwc" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="DO_174"><img src="logo/DO174 ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- DO174 -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-bwc" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="PNPC"><img src="logo/NO PENDING_ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- NO PENDING -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-ble" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="PEA_1"><img src="logo/PEA_ATOBO.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- PEA -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-ble" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="PME_PEE"><img src="logo/PME_PEE.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- PME/PEE -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-ble" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="PTO_CEI"><img src="logo/PTO_CEI.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- PME/PEE -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-blr" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="WA"><img src="logo/RWAS_ICON2.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- RWAS -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-bwc" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="1020"><img src="logo/1020.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- 1020 -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-ble" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="SPES"><img src="logo/SPES ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- SPES -->
              </div>
            </div>

            <!-- TUPAD -->
            <!--<div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-none" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href=""><img src="logo/TUPAD ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a>
              </div>
            </div>-->
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-blr" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="UNION"><img src="logo/UNION ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- UNION -->
              </div>
            </div>
            <center>
              <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-blr" data-wow-duration="1.4s">
                <div class="box rounded-circle shadow">
                  <a href="WCP"><img src="logo/WCP ICON copy.gif" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- WCP -->
                </div>
              </div>
            </center>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-blr" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="SWMBC"><img src="logo/SWMBC.png" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- SWMBC -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-blr" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="SWDBC"><img src="logo/SWDBC.png" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- SWDBC -->
              </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 portfolio-item filter-blr" data-wow-duration="1.4s">
              <div class="box rounded-circle shadow">
                <a href="LPA"><img src="logo/LPA.png" class="shadow_round rounded-circle" alt="" width="100%"></a><!-- LPA -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Portfolio Section
    ============================-->



  </main>

  <!--==========================
    Footer
  ============================-->
  <?php include "footer.php"; ?>


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>