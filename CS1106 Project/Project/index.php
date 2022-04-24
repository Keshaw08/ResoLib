<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>

  <!-- Google Font Signika -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">

  <!-- BootStrap CSS and JS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Style Sheet -->
  <link rel="stylesheet" href="css/styles.css">
  <title>Home</title>
</head>
<body>
<?php
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
      else  
            $url = "http://";     
      $url.= $_SERVER['HTTP_HOST'];
      $url.= $_SERVER['REQUEST_URI'];    
      // echo $url;
 ?>
  <?php 
    $e_id = parse_url($url, PHP_URL_QUERY);
  ?>
  <div class="container-fluid">

    <!-- Header and Navbar -->
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <!-- <a class="navbar-brand" href="#">Home</a> -->
          <img class="logo-img" src="images/logo-test.png" alt="logo">
          <!-- <img class="logo-img" src="images/logo1.png" alt="logo"> -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active disabled" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="Account/account.php">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../upload-testing/Upload/display_pdf.php">Display</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="Account/account.php">Contact-US</a>
              </li>
            </ul>
          </div>
            
          <div class="nav-upload">

              <?php
                $insert_url="../upload-testing/Upload/insert.php?" . $e_id;
              ?>
             <a class="btn btn btn-sm" type="button" name="button" href="<?php echo $insert_url ?>"class="nav-link">UPLOAD</a>
             <a class="btn btn btn-sm log-out" type="button" name="button" href="../index.html"class="nav-link">Log-out</a>
          </div>
          
        </div>
      </nav>
    </div>


    <!-- CARDs and Dashboard -->
    <div class="dashboard">
      <h1>Dashboard</h1>
    </div>

    <div class="card-courses">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="collapse-card">

            <p>
              <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#FirstYear" aria-expanded="false" aria-controls="collapseWidthExample">
                <div class="card-box">
                  <!-- <i>First Year</i> -->
                  <i>Ist Year</i><br>

                  <i>(Courses)</i>
                </div>
              </button>
            </p>
            <!-- <div style="min-height: 120px;"> -->
            <div class="collapse" id="FirstYear">
              <div class="card card-body">
                <a href="../upload-testing/Upload/CDA_display.php">Computational Data Analysis (CDA)</a>
                <a href="../upload-testing/Upload/OOP_display.php">Object Oriented Programming (OOP)</a>
                <a href="../upload-testing/Upload/CAM_display.php">Calculus and Applied Mechanics (CAM)</a>
              </div>
            </div>
            <!-- </div> -->
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="collapse-card">

            <p>
              <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#SecondYear" aria-expanded="false" aria-controls="collapseWidthExample">
                <div class="card-box">
                  <!-- Second Year -->
                  <i>IInd Year</i><br>

                  <i>(Courses)</i>
                </div>
              </button>
            </p>
            <!-- <div style="min-height: 120px;"> -->
            <div class="collapse" id="SecondYear">
              <div class="card card-body">
                <a href="../upload-testing/Upload/CAO_display.php">Computer Architecture and Organization (CAO)</a>
                <a href="../upload-testing/Upload/CEA_display.php">Computational Engineering Analysis (CEA)</a>
                <a href="../upload-testing/Upload/DS_display.php">Data Structures (DS)</a>
                <a href="../upload-testing/Upload/DBS_display.php">Database Systems (DBS)</a>
                <a href="../upload-testing/Upload/DAA_display.php">Design and Analysis of Algorithms (DAA)</a>
              </div>
            </div>
            <!-- </div> -->
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="collapse-card">

            <p>
              <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#ThirdYear" aria-expanded="false" aria-controls="collapseWidthExample">
                <div class="card-box">
                  <!-- <i>First Year</i> -->
                  <i>IIIrd Year</i><br>

                  <i>(Courses)</i>
                </div>
              </button>
            </p>
            <!-- <div style="min-height: 120px;"> -->
            <div class="collapse" id="ThirdYear">
              <div class="card card-body">
                <a href="#">Artificial Intelligence and Machine Learning (AI-ML)</a>
                <a href="#">Compiler Design (CD)</a>
                <a href="#">Cloud Computing Architecture (CCA)</a>
                <a href="#">Cryptography (BTC)</a>
                <a href="#">Cybersecurity (CYBER)</a>
                <a href="#">Introduction to IoT (IoT)</a>
                <a href="#">Mobile Application Development (MAD)</a>
                <a href="#">Operating Systems (OS)</a>
                <a href="#">Software Engineering (SE)</a>


              </div>
            </div>
            <!-- </div> -->
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="collapse-card">

            <p>
              <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#ForthYear" aria-expanded="false" aria-controls="collapseWidthExample">
                <div class="card-box">
                  <!-- Second Year -->
                  <i>IVth Year</i><br>

                  <i>(Courses)</i>
                </div>
              </button>
            </p>
            <!-- <div style="min-height: 120px;"> -->
            <div class="collapse" id="ForthYear">
              <div class="card card-body">
                <a href="#">Advanced Data Structures and Algorithms (ADSA)</a>
                <a href="#">Blockchain Technology and Application (BTA)</a>
                <a href="#">Cross-Platform App Development (CPAD)</a>
                <a href="#">Geographical Information System (GIS)</a>
                <a href="#">Natural Language Processing (NLP)</a>
                <a href="#">Machine Vision (MV)</a>
              </div>
            </div>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>


  </div>



</body>

</html>
