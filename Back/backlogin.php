<?php
    $con = mysql_connect("sql.njit.edu","ovl2_proj","EWzpulq1");
    if(!$con) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("ovl2_proj", $con);
   
    $User = $_POST['Username'];
    $Pass = $_POST['Password'];
    $Bounce = $_POST['check'];
    
    $sql = mysql_query("SELECT COUNT(*) FROM Login L WHERE Username = '$User' AND Password = '$Pass'");
    $info = mysql_fetch_assoc($sql);
    $ver = $info['COUNT(*)'];
    
    //echo $ver;
    
    if($Bounce == 302){
        if($ver == 1) {
            echo "User Found On NJIT Server and Database.";
        }
        else{
            echo "User Found On NJIT Server But Not On Database."; 
        }
    }
    if($Bounce != 302){
        if($ver == 1) {
            echo "User Not Found On NJIT Server But Found On Database.";
        }
        else{
            echo "User Not Found On NJIT Server and On Database.";
        }
    }

?>
