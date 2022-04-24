<!-- ?php
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die("Sorry we failed to connect: ".mysqli_connect_error());
}

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";     
    $url.= $_SERVER['HTTP_HOST'];
    $url.= $_SERVER['REQUEST_URI'];   

? -->

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
  <link rel="stylesheet" href="insert-styles.css">
  

  <title>Upload Page</title>


  
  </head>



  <div class="container-fluid">
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
          $param_str = parse_url($url, PHP_URL_QUERY);
          parse_str($param_str, $query_params);
    ?>
    <!-- Header and Navbar -->
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <!-- <a class="navbar-brand" href="#">Home</a> -->
          <img class="logo-img" src="../../Project/images/logo-test.png" alt="logo">
          <!-- <img class="logo-img" src="images/logo1.png" alt="logo"> -->
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
             <a class="btn btn btn-sm" type="button" name="button" href="../upload-testing/Upload/insert.php"class="nav-link">UPLOAD</a>
          </div> -->
          
        </div>
      </nav>
    </div>

    <?php
      if (array_key_exists("rn", $query_params)){
        $id = "S" . $query_params['rn'];
      }else if (array_key_exists("fi", $query_params)){
        $id =  "F" . $query_params['fi'];
      }else{
        $id = "Please go back";
      }

      // echo subStr($id, 0);
    ?>

    <div class="insertion-box">
      <form class="" action="insert.php" method="post" enctype="multipart/form-data">
        <label for="">Choose Your Resource File</label>
        <br>
        <input class="comment" type="text" name="id" placeholder="Enter Topic" value="<?php echo $id ?>" readonly>
        <br>
        <br>
        <select class="comment" name="course_name" id="course">
          <option value="course">Select Course</option>
          <option value="CAM">Calculus and Applied Mechnics</option>
          <option value="CAO">Computer Architecture and Organization</option>
          <option value="CDA">Computational Data Analysis</option>
          <option value="CEA">Computational Engineering Analysis</option>
          <option value="DS">Data Structures</option>
          <option value="DBMS">Database System</option>
          <option value="DAA">Design and Analysis of Algorithms</option>
          <option value="OOP">Object Oriented Programming</option>
        </select>
        <!-- <input class="comment course" type="text" name="course_name" value="" placeholder="Enter your Course Name"> -->
        <br>
        <br>
        <input class="comment" type="text" name="f_topic" placeholder="Enter Topic" value="" required>
        <br>
        <br>
        <input id="pdf" type="file" name="f_name" value="" required>       
        <br>
        <br>
        <!-- <input class="comment" type="text" name="comment" value="" placeholder="Enter your Comment">
        <br> -->
        <br>
        <input id="upload" type="submit" name="submit" onmouseover="this.style.cursor='pointer'" onclick="history.back()" value="Upload">
        <?php
        include 'db.php';

        if (isset($_POST['submit'])) {
          $id = $_POST['id'];
          $course_name=$_POST['course_name'];
          $f_topic = $_POST['f_topic'];
          $pdf=$_FILES['f_name']['name'];
          // $comment=$_POST['comment'];
         
          // $comment = isset($_FILES['comment']) ? $_FILES['comment'] : '';
          $pdf_type=$_FILES['f_name']['type'];
          $pdf_size=$_FILES['f_name']['size'];
          $pdf_tem_loc=$_FILES['f_name']['tmp_name'];
          $pdf_store="pdf/".$pdf;

          move_uploaded_file($pdf_tem_loc,$pdf_store);
          
          if ( $id[0] == "S")
          {
            $student_id = subStr($id, 1);
            $sql="INSERT INTO resolib(course_name,f_topic,f_name, Roll_number) values('$course_name','$f_topic','$pdf', '$student_id')";
            $query=mysqli_query($conn,$sql);
          }
          else if($id[0] == "F"){
            $faculty_id = subStr($id, 1);
            $sql="INSERT INTO resolib(course_name,f_topic,f_name, faculty_id) values('$course_name','$f_topic','$pdf', '$faculty_id')";
            $query=mysqli_query($conn,$sql);
          }
          

        }



         ?>

      </form>

    </div>
    </body>

</html>