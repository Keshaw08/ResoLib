<?php 
$e_id = $_POST['email_id'];
$pass = $_POST['password'];
$email_id = $_POST['email_id'];
$password = $_POST['password'];
$conn = new mysqli("localhost:3307","root","","main_database");

if($conn -> connect_error){
    die("Failed to Connect : ".$conn->connect_error);
}
else{

    $stmt1 = "select * from student_login where email_id='$e_id'";
    $stmt2 = "select * from faculty_login where email_id='$e_id'";
    $stmt3 = "select * from Admin where email_id='$e_id'";
    $result1 = $conn->query($stmt1);
    $result2 = $conn->query($stmt2);
    $result3 = $conn->query($stmt3);
    if(!$result1){
        die("Invalid query: " . $conn->error);
    }
    while($rows = $result1->fetch_assoc()){
        $email = $rows['email_id'];
        $password = $rows['password'];
        $roll_number = $rows['Roll_number'];
        if($email==$e_id){
            if($password==$pass){
                //echo "Student successfull!!";
                
                header("location:Project/index.php?rn=" . $roll_number);
            }
            else{
                echo "Email or Password did not match.";
            }
        }
        else{
            echo "Email or Password did not match.";
        }
    }
    if(!$result2){
        die("Invalid query: " . $conn->error);
    }
    while($rows = $result2->fetch_assoc()){
        $email = $rows['email_id'];
        $password = $rows['password'];
        $faculty_id = $rows['faculty_id'];
        if($email==$e_id){
            if($password==$pass){
                //echo "Faculty successfull!!";
                header("location:Project/index.php?fi=" . $faculty_id);
            }
            else{
                echo "Email or Password did not match.";
            }
        }
        else{
            echo "Email or Password did not match.";
        }
    }
    if(!$result3){
        die("Invalid query: " . $conn->error);
    }
    while($rows = $result3->fetch_assoc()){
        $email = $rows['email_id'];
        $password = $rows['password'];
        $S_no = $rows['S_no'];
        if($email==$e_id){
            if($password==$pass){
                //echo "Faculty successfull!!";
                header("location:Admin_dashboard/dashboard.php?fi=" . $S_no);
            }
            else{
                echo "Email or Password did not match.";
            }
        }
        else{
            echo "Email or Password did not match.";
        }
    }
}


?>