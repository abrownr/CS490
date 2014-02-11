<?php
    $con = mysql_connect("sql.njit.edu","ovl2_proj","EWzpulq1");
    if(!$con) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("ovl2_proj", $con);
    
    //$request_body = file_get_contents('php://input');
    //$json = json_decode($request_body);
    
    //$User = $json->Username;
    //$Pass = $json->Password; 
   
    $User = $_POST['Username'];
    $Pass = $_POST['Password'];
    $H = $_POST['hp'];
    
    //creating new user
    #$sql1 = "INSERT INTO Login(Username, Password) VALUES ('$Username', '$Password')";
    #$exec = mysql_query($sql1,$con);
    
    $sql = mysql_query("SELECT COUNT(*) FROM Login L WHERE Username = '$User' AND Password = '$Pass'");
    $info = mysql_fetch_assoc($sql);
    $ver = $info['COUNT(*)'];
    
    //echo $ver;
    
    if($H == 302){
        if($ver == 1) {
            echo "User Found On NJIT Server and In Database.";
        }
        else{
            echo "User Found On NJIT Server But Not In Database."; 
        }
    }
    if($H != 302){
        if($ver == 1) {
            echo "User Not Found on NJIT Server But Found In Database.";
        }
        else{
            echo "User Not Found on NJIT Server and In Database.";
        }
    }
    /*
    if($H == 302 && $ver == 0) {
        echo "User Found On NJIT Server But Not In Database."; 
        header('Location: home.html');
    }
    else{
        echo "User Not Found on NJIT Server But Found In Database."
        header('Location: index.html');
    } */
?>