<?php
require_once('config.php');



function execute($sql) {
    // tao  connection toi database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    // query
    mysqli_query($conn,$sql);


    // dong connection
    mysqli_close($conn);
};

// su dung cho lenh select --> tra ve ket qua 


function executeResult($sql) {
    // tao  connection toi database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    // query
    $resultset = mysqli_query($conn,$sql);
    $list = [];
    while($row =mysqli_fetch_array($resultset, 1)){
        $list[] =$row;
    }


    // dong connection
    mysqli_close($conn);
    return $list;
};


?>