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
    <link rel="stylesheet" href="nav-bar-for-display.css">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 1px solid black;
        /* margin-top: 30px; */
        margin-top:5%;
      }
      .div1{
        /* margin-left: 170px; */
        margin-left:10%;
        margin-right:10%;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        
    <!-- Header and Navbar -->
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <!-- <a class="navbar-brand" href="#">Home</a> -->
          <img class="logo-img" src="Logo1.png" alt="logo">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" onmouseover="this.style.cursor='pointer'" onclick="history.back()">Home</a>
                <!-- <a class="nav-link active" aria-current="page" href="../../Project/index.php">Home</a> -->
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="Account/account.php">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="display_pdf.php">Display</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="Account/account.php">Contact-US</a>
              </li>
            </ul>
          </div>
            
          <!-- <div class="nav-upload">
             <a class="btn btn btn-sm" type="button" name="button" href="insert.php"class="nav-link">UPLOAD</a>
          </div> -->
          
        </div>
      </nav>
    </div>
    <div class="dashboard">
      <h1>Computational Data Analysis</h1>
    </div>

    </div>
        
    <div class="dashboard">
      <h1>Faculty Files</h1>
    </div>
    <div class="div1">
      <?php
      include 'db.php';

      $sql1="SELECT f_name, username, email_id, department,f_topic from faculty_login,resolib where faculty_login.faculty_id = resolib.faculty_id and course_name = 'CDA'";
      $query1=mysqli_query($conn,$sql1);
      while ($info=mysqli_fetch_array($query1)) {
        ?>
        <br>
        <?php
        echo "Name: ";
        echo $info['username']; 
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Email Id: ";
        echo $info['email_id'];
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Department: ";
        echo $info['department'];
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp File_topic: ";
        echo $info['f_topic'];
        ?>
      <embed type="application/pdf" src="pdf/<?php echo $info['f_name'] ;?>" width="1000" height="550">
      <hr>
      <?php
      }
      ?>


    <div class="dashboard" style="margin-left:-12%;">
      <h1>Student Files</h1>
    </div>
      <?php
      include 'db.php';

      $sql="SELECT f_name, username, email_id,f_topic from student_login,resolib where student_login.Roll_number = resolib.Roll_number and course_name = 'CDA'";
      $query=mysqli_query($conn,$sql);
      while ($info=mysqli_fetch_array($query)) {
        ?>
        <br>
        <?php
        echo "Name: "; 
        echo $info['username'];
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Email Id: ";
        echo $info['email_id']; 
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp File_topic: ";
        echo $info['f_topic']; 
        ?>
      <embed type="application/pdf" src="pdf/<?php echo $info['f_name'] ;?>" width="1000" height="550">
      <hr>
      <?php
      }
      ?>


    </div>

  </body>
</html>
