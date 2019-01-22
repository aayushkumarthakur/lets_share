<?php 
session_start();
if (isset($_COOKIE["email"])){
?>
<html>

<head>

    <style>
        
        .lnk {
            color: crimson;
            font-family: arial;
            font-size: 15px;
            border: 0.1px solid white;
            background: white;
            outline: none;
            cursor: pointer;
        }

        .lnk:hover {
            text-decoration: underline;

        }
         

        @font-face {
            src: url('fonts/comfortaa/Comfortaa-Bold.otf');
            font-family: comfortaa;
        }

        @font-face {
            src: url('fonts/gotham/Gotham-Bold.otf');
            font-family: gotham;
        }
        @font-face {
            src: url('fonts/google/google_sans.ttf');
            font-family: google;
        }

        .img {
              
                width: 80px;
                height: 80px;
                border-radius: 100%;
                
            
        }
html{
            font-family: google sans;
        }
        body{
            background: url("images/backgroundprofile.svg");
        }
        .card {
            width: 50%;
            height: auto;
            border-radius: 2px 2px 2px 2px;
            padding-top: 60px;
            padding-bottom: 60px;
            padding-left: 30px;
            padding-right: 30px;
            border-radius: 5px;
            font-family: gothamb;
            box-shadow: 0 4px 9px 0 rgba(0, 0, 0, 0.4);
            float:left;
            margin-left:30px;
            background: white;
        }

        .logo {
            width: 40px;
            height: 40px;
        }
        .cardright {
            width: 40%;
            height: auto;
            border-radius: 2px 2px 2px 2px;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
            padding-right: 30px;
            border-radius: 5px;
            font-family: gothamb;
            box-shadow: 0 4px 9px 0 rgba(0, 0, 0, 0.4);
            
            margin-right:80px;
            margin-left:200px;
            background: white;
            margin-top:10px;
        }
        .headerbar{
            
            width: auto;
            height: 40px;
            background-color: #565cf4;
            font-family: Facebook Letter Faces;
            color: white;
            text-align: center;
            padding-top: 10px;
            font-size: 30px;
            padding-bottom: 10px;
            box-shadow: 0px 1px 2px 0px grey;
            
        }
        .navbar{
            
            width: 100px;
            height: 35px;
            background-color: white;
            margin-right: 10px;
            border-radius: 10px;
            float: right;
            color: grey;
            font-family: google sans;
            font-size: 20px;
            padding-top: 10px;
            transition: 0.3s ease;
            
        }
        .navbar:hover{
            
            background-color: #565cf4;
            color: white;
            
        }
        .profile{
            
            width: 30%;
            height: 500px;
            background-color: #ffffff;
            box-shadow: 0 4px 9px 0 rgba(0, 0, 0, 0.4);
            margin-left: 10px;
            border-radius:5px;
            float: left;
            
        }
        .feeds{
            width: 650px;
            height: 300px;
            background-color: #ffffff;
            box-shadow: 0px 1px 2px 0px grey;
            padding-top: 10px;
            padding-left: 10px;
            
        }
        .feedcont{
            float:left;
             margin-left: 40px;
            width: auto;
            height: auto;
        }
        
        .chats{
            width: 250px;
            height: 500px;
            background-color: #ffffff;
            box-shadow: 0px 1px 2px 0px grey;
            margin-left: 10px;
            float: right;
            margin-right: 10px
            
        }
        .profilepic{
            width: 100px;
            height: 100px;
            border-radius: 100%;
            
        }
        
        .imgfeed{
             width: 90%;
            height: 80%;
            padding-left: 30px;
            padding-right: 20px;
            padding-top: 15px;
            
            
        }
        .contact{
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
        .strips{
            width: 240px;
            height: auto;
            border-bottom:2px solid #f0f0f0;
            margin: 0 auto;
            padding-top: 10px;
            padding-bottom: 10px
            
        }
        .search{
            border: 2px solid white;
            border-radius: 5px;
            width: 300px;
            height: 40px;
            color: grey;
            font-family: google sans;
            padding-left: 20;
            font-size: 18px;
            margin-left: 300px
            
        }

    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="images/give.png" />
    <title>Dashboard</title>
</head>

</html>
<?php
$con = mysqli_connect("localhost", "root", "", "letsshare");
@$email = $_COOKIE['email'];
if($con){
    $sql = "SELECT * FROM registertable WHERE email = '$email'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    $imgloc = $row['username'];
    if($row['email']==$email && isset($_COOKIE['email'])){
?>
    <?php        
if(isset($_POST['delete'])){   
    $sql2 = "SELECT * FROM registertable WHERE email = '$email'";
    $query2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_assoc($query2);
    $table = strtolower($row2['data']);
    $str = $row2['username'] ;
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    unlink($str."/css/style.css");
    $files = glob($str.'/*');
    foreach($files as $f) {
        if(is_file($f)){
            unlink($f);
        }
    }
    $dir = $str."/css";
    rmdir($dir);
    rmdir($str);
    $sql3 = "DROP TABLE $table ";
    mysqli_query($con,$sql3);
    $sql4  = "DELETE FROM registertable WHERE email = '$email'";
    if(mysqli_query($con,$sql4)){
setcookie("email", '', time() - (3600));
setcookie("password", '', time() - (3600));
 	?>
    <script>
        function redir() {
            window.location = "index.php";
        }
        setTimeout(redir(), 100);

    </script>
    <?php        
    }     
}
?>
    <style>
        <?php include "css/style.css";
        ?>

    </style>
    <center>
        <div class="row">
            <div class="topnav">
                <a href="index.php"><id style="color:grey;font-family:google">Daero</id> <id style="font-family:google">Let's Share</id></a>
                

                        <a class=nav2 onclick="javascript:window.location='signout.php'" style="cursor:pointer;float:right;font-family:google;">Logout</a>
                        <a class=nav1 onclick="javascript:window.location='useredit.php'" style="cursor:pointer;float:right;font-family:google;">Edit Profile</a>
                

            </div>


        </div>
    </center>
    <BR>
    <div class="body">
            <br>
            <div class="profile"><center><br><br><a href="profilepic.php" style="text-decoration:none;">
                    <?php
                    $imagesrc = $row['profilepic'];
                       if($imagesrc){
                          ?>
                        <img class="img" src="<?php echo $imagesrc ;?>">
                        <?php
                       } else {
                           $pic = 'profilepics/av1.png';
                           $sql2 = "UPDATE registertable SET profilepic='$pic' WHERE email = '$email'";
                            mysqli_query($con,$sql2);
                           $sql2 = "SELECT * from registertable WHERE email = '$email'";
                           $querya = mysqli_query($con,$sql2);
                           $res = mysqli_fetch_assoc($querya);
                           
                           
                           ?>
                            <img class="img" src="<?php echo $res['profilepic']; ?>">
                            <?php
                       }                                   
                ?>
                </a><br><br><font size=5 style="font-family:google;">
                    <?php echo strtoupper($row['fname']." ".$row['lname']) ?>
                </font><br><br>
            <font size=4 style="font-family:google;">Email:&nbsp;&nbsp;
                    <?php echo $row['email'] ?>
                </font><br><br><br><font size=4 style="font-family:google;">Contact No.:&nbsp;&nbsp;
                    <?php echo $row['contact'] ?> </font><br>
            <font size=4 style="font-family:google;">
                    <?php
                        if($row['address']){
                            echo "Address : ".$row['address'];
                             echo "";
                        }
                        ?>
                </font><br>
            
            </center></div>


            
            
            </b>
            <!--<div id="container-floating">
                

                <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
                    <p class="plus">+</p>
                    <a href="results.php">
    <img class="edit" width="30px" height="30px" src="images/locate.svg"></a>
                </div>

            </div>-->


<center style="font-size:20px;">Recent Donations</center>

            <?php
        $i=1;
        $j=0;
        $table  = strtolower($row['data']);
        $sql5 = "SELECT COUNT(*) FROM $table ";
        $r  = mysqli_query($con,$sql5);
        $n  = mysqli_fetch_array($r);
        @$email = $_SESSION['email'];
        $sqlx = "select username from registertable where email = '$email'";
        $row2  = mysqli_query($con,$sqlx);
            $result2 = mysqli_fetch_assoc($row2);
            $sql = "SELECT id FROM $table";
$arr ;
    $query = mysqli_query($con,$sql);
    while($dat = mysqli_fetch_array($query)){
      $arr[] = $dat['id'];  
    }
@$arrlen = count($arr)-1;
@$arrid = $arr[$arrlen];
echo "<center><table width=40%>";
        for($i=$arrid;$i>=1;$i--){
            $sql6 = "SELECT * from $table WHERE id= $i ";
            $rows = mysqli_query($con,$sql6);
            $result = mysqli_fetch_assoc($rows);
            
            if($result['description']==""){
                            continue;
                        }
            if($result['description']!=null){
                
            ?><?php 
                                                    
                                                     $pid = $result['id'];
                                                     
                                                     ?>
                                                     
                                                                                                       <tr><td class='cardright'>  <center> <div>
                                                     
                                                  <font style="font-family:google" size=4>You have provided a donation proposal for</font><br><font style="font-family:google" size=5><?php echo strtoupper($result['nameorg']); ?></font><br><font style="font-family:google" size=4>on <?php echo $result['date'];?><br>Description : </font>             
                                   <font style="font-family:google" size=4><?php echo $result['description']; ?></font>
                                    <?php
$orgemail = $result['orgemail'];
$id = $result['donationid'];
$sql7 = "select * from organisation where email='$orgemail'";
$row7 = mysqli_query($con,$sql7);
$result3 = mysqli_fetch_assoc($row7);
$orgtable = $result3['data'];
$sql8 = "select * from $orgtable where donationid='$id'";
$row8 = mysqli_query($con,$sql8);
$result4 = mysqli_fetch_assoc($row8);
$status = $result4['status'];


                                    ?><br>
<font style="font-family:google" size=4>Status : <?php 
if($status=="Approved"){
    echo "<font style='font-family:google' color=green>".$status."</font>";
} else if($status=="Temporary not handling more proposals"){
    echo "<font style='font-family:google;' color=red>".$status."</font>";
} else {
    echo $status;
}


 ?></font>

</div></center>
                                    <br><br><br></td></tr><tr><td></td></tr><tr><td></td></tr>
                            <?php
            }
        }

                
             ?>
                      
                            




            

                            <br><br>
                            <!-- <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
                 <input type="submit"  class="login" name="delete" value="Delete Account">
            </form>-->
        </center>
    </div>
    <?php
    } else {
      header("location:login.php?inf=login101");
        die("");
    }
    mysqli_close($con);
} else {
    echo "Can't Establish Connection";
}
    
} else { 
    $_SESSION['redirect2'] = $_SERVER['REQUEST_URI'];
    header("location:login.php");
}
?>
