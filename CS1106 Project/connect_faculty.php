<?php
    $username = $_POST['username'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $phone_number = $_POST['phone_number'];


    // database connncection

    $conn = new mysqli('localhost:3307','root','','main_database');

    $sql = "select email_id from faculty_login where email_id = '$email_id'";
    $result = mysqli_query($conn,$sql);
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

            $che = "select email_id from student_login where email_id = '$email_id'";
            $result1 = mysqli_query($conn,$che);
            if(mysqli_num_rows($result1)== 1 ){
                echo "This Email Was Taken By Student";
            }
            else{
                $stmt = $conn->prepare("insert into faculty_login(username, email_id, password,department,phone_number) values(?,?,?,?,?)");
                $stmt->bind_param("ssssi",$username,$email_id,$password,$department,$phone_number);
                $execval = $stmt->execute();
                echo $execval;
                // echo "Singed up Successfully!";
                header('location: index.html');
                $stmt->close();
                $conn->close();
            }
            
        }
        else{
            echo "Sign up only with jklu email id";
        }
    }
?>