
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Student_Details</title>
</head>

<body>


    <!-- SIDE BAR-->
    <section id="sidebar">

        <a href="dashboard.php" class="brand">
            <i class="bx bxs-book-open"></i>
            <span class="text">Resolib</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard.php">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="student_Details.php">
                    <i class='bx bx-group'></i>
                    <span class="text">Student_Details</span>
                </a>
            </li>
            <li>
                <a href="Faculty_Details.php">
                    <i class='bx bx-group'></i>
                    <span class="text">Faculty_Details</span>
                </a>
            </li>
            <li>
                <a href="File_Details.php">
                    <i class='bx bx-file'></i>
                    <span class="text">File_Details</span>
                </a>
            </li>
            <li>
                <a href="placements_h.php">
                    <i class='bx bx-briefcase-alt-2'></i>
                    <span class="text">Setting</span>
                </a>
            </li>
            <li>

                <a href="../index.html">
                    <i class='bx bx-log-out-circle'></i>
                    <span class="text">Log Out</span>
                </a>

            </li>
        </ul>

    </section>

    <!--SIDE BAR-->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>

            <form action="search.php" method="post">
                <div class="form-input">
                    <input type="search" name="search" placeholder="Search...">
                    <button type="submit" name="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>

            <a href="#" class="profile">
                <img src="img/people.jpg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">

                    <h1>Student Details</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="student_Details.php">Student_Details</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="student_Details.php">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="../sign-up.html" class="btn-download">
                <i class='bx bxs-message-square-add'></i>
                    <span class="text">Student</span>
                </a>
            </div>
            <!-- Table Starts -->
            <div class="table">
                <div class="limiter">
                    <div class="container-table">
                <?php

                    $con = new PDO("mysql:host=localhost:3307;dbname=main_database",'root','');
                    // $con = mysqli_connect("localhost:3307","root","","main_database");
                    if(isset($_POST["submit"])){
                        $str = $_POST["search"];
                        $sth = $con->prepare("select * from student_login where username = '$str' or Roll_number = '$str'");
                        $sth->setFetchMode(PDO:: FETCH_OBJ);
                        $sth->execute();

                        if($row = $sth->fetch()){
                            ?>
                            <br><br><br>
                            <table>
                                    <thead>
                                    <tr>
                                    <th class="column1">Roll_Number</th>
                                    <th class="column2">Username</th>
                                    <th class="column3">Email_id</th>
                                    <th class="column4">Password</th>
                                    <th class="column5">Phone_Number</th>
                                    </tr>

                                    <tr>
                                        <td><?php echo $row->Roll_number; ?></td>
                                        <td><?php echo $row->username; ?></td>
                                        <td><?php echo $row->email_id; ?></td>
                                        <td><?php echo $row->password; ?></td>
                                        <td><?php echo $row->phone_number; ?></td>
                                    </tr>
                                    </thead>
                                    
                            </table>
                <?php
                        }
                            
                            else{
                                echo "Name Does not exist";
                            }
                    }
                ?>



                </div>
                </div>
            </div>
            <style>
                .limiter {
  width: 100%;
  margin: auto;
}
 .container-table{
  width: 100%;


  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 33px 30px;
 }
table {
  border-spacing: 1;
  /* border-collapse: collapse;  */
  background: white;
  border-radius: 10px;
  overflow: hidden;
  width: 100%;
  margin: 0 auto;
  position: relative;
  color: white;
} 

 table * {
  position: relative;
}
table td, table th {
  padding-left: 7px;
}

table thead tr {
  height: 60px;
  background: #36304a;
}

table tbody tr {
  height: 70px;
}
table tbody tr:last-child {
  border: 0;
}
table td, table th {
  text-align: left;
}
table td.l, table th.l {
  text-align: left;
}
table td.c, table th.c {
  text-align: center;
}
table td.r, table th.r {
  text-align: center;
}


.table-head th{
  font-family: OpenSans-Regular;
  font-size: 18px;
  color: #fff;
  line-height: 1.2;
  font-weight: unset;
  text-align: center;
}

tbody tr:nth-child(even) {
  background-color: #f5f5f5;
}

tbody tr {
  font-family: OpenSans-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.2;
  font-weight: unset;
}

tbody tr:hover {
  color: #555555;
  background-color: #f5f5f5;
  cursor: pointer;
}

.column1 {
  width: 230px;
  padding-left: 40px;
}

.column2 {
  width: 160px;
}

.column3 {
  width: 245px;
}

.column4 {
  width: 90px;
  text-align: center;
}

.column5 {
  width: 222px;
  text-align: center;
}

 @media screen and (max-width: 992px) {
  table {
    display: block;
  }
  table > *, table tr, table td, table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 37px 0;
  }
  table tbody tr td {
    padding-left: 40% !important;
    margin-bottom: 24px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
    font-family: OpenSans-Regular;
    font-size: 14px;
    color: #999999;
    line-height: 1.2;
    font-weight: unset;
    position: absolute;
    width: 40%;
    left: 30px;
    top: 0; 
   } 
  table tbody tr td:nth-child(1):before {
    content: "Roll_Number";
  }
  table tbody tr td:nth-child(2):before {
    content: "Username";
  }
  table tbody tr td:nth-child(3):before {
    content: "Email_id";
  }
  table tbody tr td:nth-child(4):before {
    content: "Password";
  }
  table tbody tr td:nth-child(5):before {
    content: "Phone_number";
  }
  .column4,
  .column5{
    text-align: left;
  }
  .column5{
      text-align: center;
  }

  .column4,
  .column5,
  .column1,
  .column2,
  .column3 {
    width: 100%;
  }

  tbody tr {
    font-size: 14px;
  }
}
@media (max-width: 576px) {
  .container-table{
    padding-left: 15px;
    padding-right: 15px;
  }
} 

                
                
                /* tr:hover {background-color: coral;}
                tr:nth-child(even){ background-color:#f2f2f2} */
            </style>

            <!-- Table Ends -->




        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>