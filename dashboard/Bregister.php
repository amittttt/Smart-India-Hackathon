<?php
require_once('config.php');
    if(isset($_POST['email'])&& isset($_POST['password']))
    {
    $fname=htmlspecialchars($_POST['fname']);
    $lname=htmlspecialchars($_POST['lname']);
    $name=$fname." ".$lname;
    $uname=htmlspecialchars($_POST['uname']);
    $email=htmlspecialchars($_POST['email']);
    $mob=htmlspecialchars($_POST['mob']);
    $pos=htmlspecialchars($_POST['position']);
    $password=$_POST['password'];
    $DOB=htmlspecialchars($_POST['dob']);
    $password=md5($password);
    echo $DOB;
       $query = $connection->prepare("INSERT INTO bemp_registration(empid,empname,emailid,password,mob,poss,dob) VALUES (?,?,?,?,?,?,?)");
       $query->bind_param('sssssss',$uname,$name,$email,$password,$mob,$pos,$DOB);
        $query->execute();
        $query->store_result();
        $numRows = $query->affected_rows;
        if($numRows>0)
            {
                setcookie ( "msg", "Registration Successful.", time()+60 );
            }
            else
            {
                 setcookie ( "msg", "Registration Failed.", time()+60 );
            }
         $query->close();
         header('Location: Blogin.php');
    }
    else
        header('Location: Bregistration.php');
?>
