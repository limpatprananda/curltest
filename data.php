<?php
//    $get_data = "";
//    $post_data = "";
//    if(isset($_GET)){
//        $get_data = $_GET;
//    }
//    if(isset($_POST)){
//        $post_data = $_POST;
//    }
//    echo json_encode(array(
//        "get_data" => $get_data,
//        "post_data" => $post_data,
//    ));

    /*recieving json curl*/
    $jsonStr = file_get_contents("php://input"); //read the HTTP body.
    echo $jsonStr;
    /*recieving json curl*/
?>