<?php
session_start();
@$password = $_SESSION['password'];
@$email = $_SESSION['email'];
@$fname = $_SESSION['fname'];
@$lname = $_SESSION['lname'];
@$contact = $_SESSION['contact'];
$name = $fname." ".$lname ;
$con = mysqli_connect("localhost", "root", "", "letsshare");
if($con){
                    $sql = "INSERT INTO registertable (email,password,fname,lname,name,contact) VALUES ('$email','$password','$fname','$lname','$name','$contact')";
                    $query = mysqli_query($con, $sql);
                    if($query){
                        $str = strtolower($fname.$lname) ;
                        if(file_exists("profile/$str")){
                            for($i=1;$i<=10000;$i++){
                                if(file_exists("profile/$str$i")){
                                    continue;
                                } else {
                                    
                                     $str = strtolower($str.$i);
                                     $user = $str;
                                     $str = "profile/$str";
                                    mkdir($str);
                                    break;
                                }
                            }
                        } else {
                            $str = strtolower($str);
                            $user=$str;
                            $str = "profile/$str";
                            mkdir($str);
                        }
                        
                        mkdir("$str/css");
                        copy("profilepics/av1.png","$str/av1.png");
                        $sql2 = "SELECT * FROM registertable WHERE email = '$email' AND password = '$password' ";
                        $data = strtolower($_SESSION['fname'].date("YsHm")."offers");
                        $sql3 = "CREATE TABLE $data (id int(20) AUTO_INCREMENT , orgemail varchar(100) ,date varchar(100),donationid LONGTEXT,nameorg varchar(200),description LONGTEXT,PRIMARY KEY (id) )";
                        mysqli_query($con,$sql3);
                        $sql4 = "UPDATE registertable SET data ='$data' , username='$user' WHERE email ='$email'";
                        mysqli_query($con,$sql4);
                        $query = mysqli_query($con,$sql2);
                        $row = mysqli_fetch_assoc($query);
                        if($row['email']==$email && $row['password']==$password){
                           
                            $_SESSION['email']=$email;
                            $_SESSION['fname']=$row['fname'];
                            $_SESSION['name']=$row['name'];
                            $_SESSION['lname']=$row['lname'];
                            $_SESSION['contact']=$row['contact'];
                            $_SESSION['topic']=$row['topic'];
                            setcookie("email",$email,time()+86400*10);
                            header("location:index.php");
                        } else {
                             echo "Wrong Email or Password. ";
                        }
                        
                    } else {
                        echo "Email Exists";
                    }
    mysqli_close($con);
                } else {
                     echo "Error Establishing Connection ";
                }