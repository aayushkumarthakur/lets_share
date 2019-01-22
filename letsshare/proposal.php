<?php

if(isset($_GET['id'])!="" && isset($_GET['id'])!=null && isset($_GET['user'])!="" && isset($_GET['user'])!=null){
    
$id = $_GET['id'];
$user = $_GET['user'];
$con = mysqli_connect("localhost", "root", "", "letsshare");
$sql = "select * from organisation where username = '$user'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$table = $row['data'];
$sql2 = "select * from $table where donationid = '$id'";
$query2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_assoc($query2);
$useremail = $row2['email'];
$sql3 = "select * from registertable where email = '$useremail'";
$query3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_assoc($query3);

?>
<html>
<head>
<style>
.profilepic {
                width: 80px;
                height: 80px;
                border-radius: 70px;
            }
.card {
               width:450px;
                padding-top: 10px;
                padding-bottom: 35px;
                border-radius: 6px;
                box-shadow: 0 4px 30px 0 rgba(0,0,0,0.2);
                 border-bottom: 5px solid #00b359;
                 border-right: 5px solid #00b359;
            }
            .signup {
    border : 1px solid #00cc66;    
    background: #00cc66;
    padding-left:40px;
    padding-right:40px;
    padding-top:15px;
    padding-bottom:15px;
    border-radius: 30px;
    cursor: pointer;
    outline: none;
    color: white;
    text-decoration: none;
    font-family: google_sans;   
    font-size: 20px;
    transition : all 0.2s ease;
}
.signup:hover {
      
    
    box-shadow: 0 4px 18px 0 #00cc66;  
    
}
            @font-face{
    src : url('fonts/google/google_sans.ttf');
    font-family: google_sans;
}
</style>
</head>

<body>
<center>
<div class="card">
<br> <br>
                <img class="profilepic" src="<?php echo $row3['profilepic']; ?>"><br><br>
                <font style="padding-top: 10px;font-family:google_sans"  size=6 color=grey><?php echo $row3['name']; ?></font><br><br>
                
                 <font  size=4 face="google_sans"><?php
                        if($row3['contact']){
                            echo "Contact : ".$row3['contact'];
                             echo "<br><br>";
                        }
                        ?>
                      <font  size=4 face="google_sans"><?php
                        if($row3['address']){
                            echo "Address : ".$row3['address'];
                             echo "<br><br>";
                        }
                        ?>
          

                <font style="padding-top: 10px;" face="google_sans" size=4 color=grey>Email:&nbsp;
                    <?php
                                           $em = $row3['email'] ;
                                           echo "<a style='text-decoration:none;color:crimson;' href='mailto:$em'>$em</a>";
                    ?>
                </font>
                <br><br>
                <form action="" method=post>
                <select name="status">
                                       <option value="Recieved Proposal" <?php if($row2['status']=="Recieved Proposal"){ echo "selected"; }?> >Recieved Proposal</option> 
                                       <option value="Approved" <?php if($row2['status']=="Approved"){ echo "selected"; }?>>Approved</option>
                                       <option value="Queued" <?php if($row2['status']=="Queued"){ echo "selected"; }?>>Queued</option>
                                       <option value='Delayed' <?php if($row2['status']=="Delayed"){ echo "selected"; }?>>Delayed</option>
                                       <option value='Temporary not handling more proposals' <?php if($row2['status']=="Temporary not handling more proposals"){ echo "selected"; }?>>Temporary not handling more proposals</option>
                                      </select>
                                      <br><br>
<input name="submit" type=submit value=Update class="signup">

</form>
<?php
if(isset($_POST['submit'])){
    $status = $_POST['status'];
    $sql4 = "UPDATE $table SET status='$status' WHERE donationid='$id' ";
    $query4 = mysqli_query($con,$sql4);

    if($query4){
        header("location:orgprofile.php");
    } else {
        die("Try Again Later");
    }
    mysqli_close($con);
}




?>
</div>
</center>
</body>


</html>

<?php
}