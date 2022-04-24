<?php

    // session_start();
    // header("location: index.html");
    // $con = mysqli_connect('localhost:3307','root','');
    // mysqli_select_db($con, 'main_database');

    $username = $_POST['username'];
    // $username = $_POST['username'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $Roll_number = $_POST['Roll_number'];
    $phone_number = $_POST['phone_number'];

    $conn = mysqli_connect("localhost:3307","root","","main_database");

    $sql = "select email_id from student_login where email_id = '$email_id'";
    $result = mysqli_query($conn,$sql);
    

    //database connncection

    //$conn = new mysqli('localhost:3307','root','','main_database');
    if($conn -> connect_error){
        echo "$conn->connect_error";
        die('Connnection Failed : '.$conn->connect_error);
    }
    if(mysqli_num_rows($result)>0){
        echo "Email already taken";
    }
    else{

        $num = substr($email_id,-12);
        if($num == "@jklu.edu.in"){
            $che = "select email_id from faculty_login where email_id = '$email_id'";
            $result1 = mysqli_query($conn,$che);
            if(mysqli_num_rows($result1)== 1 ){
                echo "This Email Was Taken By Faculty";
            }
            else{
                $stmt = $conn->prepare("insert into student_login(Roll_number,username, email_id, password,phone_number) values(?,?,?,?,?)");
                $stmt->bind_param("ssssi",$Roll_number,$username,$email_id,$password,$phone_number);
                $execval = $stmt->execute();
                echo $execval;
                //echo "Singed up Successfully!";
                header("location: index.html");
                $stmt->close();
                $conn->close();
            }
            
        }
        else{
            echo "Sign up only with jklu email id";
        }
        
    }


?>