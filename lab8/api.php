<?php



function getDatabaseConnection() {
   $host = "us-cdbr-iron-east-05.cleardb.net";
     $username = "b10d78d16d1281";
     $password = "12f943a2";
     $dbname="heroku_e746fa7e355c8e7";
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}



function getUsersThatMatchUserName() {
    
    $username = $_GET['username']; 

    
     $dbConn = getDatabaseConnection(); 

     $sql = "SELECT * from login WHERE username='$username'"; 
     
     $statement = $dbConn->prepare($sql); 
    
     $statement->execute(); 
     $records = $statement->fetchAll(); 
     echo json_encode($records); 
}


getUsersThatMatchUserName(); 

?>
