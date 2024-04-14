<?php

try{
    define("HOSTNAME","localhost:3307");
    define("DBNAME","homeland");
    define("USER","root");
    define("PASS","");

    $conn = new PDO("mysql:host=".HOSTNAME.";dbname=".DBNAME.";",USER,PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // if($conn==true){
    //     echo"DB Connected";
    // }
    } catch(PDOException $e){
        die("DB Connection Failed: ". $e->getMessage());
    }

    