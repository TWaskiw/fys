<?php
    session_start(); 
    include("mysql.php");
    include_once 'components/header.php'; 
?> 

<body>

    
<main class="hero-section">
  <div class="hero2">
  <fieldset class="hero2-text" data-aos="fade-right" data-aos-duration="2000">
      <legend class="border-text">&nbsp; Mark Skals</legend>
  <h1>Fysioterapi med dig i fokus</h1>
  <p>Jeg har over 5 års erfaring  med alt fra småskader, sportsskader massage og meget mere.</p>
    <a href="#anchor-behandlinger"><button>Læs mere</button></a>
  </fieldset></div>
</main>

<?php
  if (isset($_GET["booking"])) 
    if ($_GET["booking"] == "success") {
    echo '<script>alert("Tak for din bestilling, tiden er nu booket!")</script>';
    }
  include_once 'components/behandlinger.php';
  include_once 'components/ommig.php';
  include_once 'components/contact.php';
  include_once 'components/testimonials.php'; 
  include_once 'components/footer.php'; 
?>



