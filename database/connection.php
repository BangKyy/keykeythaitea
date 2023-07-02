<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "keykeythaitea";
    
    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // if ($connection) {
    //     echo "conected";
    // }
    function unique_id(){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($chars);
        $randomString = '';
        for ($i=0; $i < 20; $i++) {
            $randomString.=$chars[mt_rand(0, $charlength - 1)];
        }
        return $randomString;
    }
?>