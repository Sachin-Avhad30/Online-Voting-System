<?php
    $connect = mysqli_connect("localhost:4407","root","","voting")or die("connection failed");
    if($connect){
        echo"Connected!";
    }else{
        echo"Not Connected";
    }
?>