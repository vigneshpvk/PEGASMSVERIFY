    
<?php
    $dbhost = 'freedb.tech';
    $dbuser = 'freedbtech_FreeUser';
    $dbpass = 'Freeuser@123';
    $con = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_select_db('freedbtech_pegadb');
    $response = array();

    //checking my Comnnection is Working or Not

    if(! $con){
        die('Could not connect: ' . mysql_error());
    }
    

    $mnumber=$_GET['mobile_number'];
    $sql="SELECT * FROM sms_validator WHERE mobile_number=$mnumber";
    $ret=mysql_query($sql,$con);
    if(! $ret){
        echo 'could Not Fetch Data';
    }
    if($ret){
    header("Content-Type: JSON");
    $i=0;
    while($row = mysql_fetch_array($ret, MYSQL_ASSOC)){
       // echo "Mobile_number : '.$row['mobile_number].'";
        $response[$i]['mobile_number']=$row['mobile_number'];
        $response[$i]['message']=$row['message'];
        $response[$i]['date']=$row['date'];
        $i++;
    }
    echo json_encode($response,JSON_PRETTY_PRINT);
    }
    ?>



    
    
