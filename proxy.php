<?php
    /*proxy script to handle ajax cross domain*/
    
    $options = null;
    init();
    
    $vars = "";
    foreach($options["data"] as $key => $value){
        if(strtoupper($options["method"]) == "GET"){
            $value = urlencode($value);
        }
        $vars .= $key . "=" . $value . "&";
    }
    
    if(strtoupper($options["method"]) == "GET"){
        $options["url"] = $options["url"] . "?" . $vars;
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_URL, $options["url"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    if(strtoupper($options["method"]) == "POST"){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);  
    }
    
    $return_value = curl_exec($ch);    
    if(!$return_value){
        echo json_encode(array(
            'code' => 400,
            'message' => curl_error($ch)
        ));
    }
    else{
        echo $return_value;
    }
    curl_close ($ch);
    
    
    function init(){
        if(isset($_POST['datajson'])){
            $GLOBALS['options'] = json_decode($_POST['datajson'], true);
        }
        else{
            $GLOBALS['options'] = $_POST;
        }

        if(!isset($GLOBALS['options']['url'])){
             echo json_encode(array(
                'code' => 401,
                'message' => 'url unindetified'
             ));
             exit();
        }
        else if(!isset ($GLOBALS['options']['method'])){
             echo json_encode(array(
                'code' => 402,
                'message' => 'method unindetified'
             ));
             exit();
        }

        if(!isset($GLOBALS['options']['data'])){
             $GLOBALS['options']['data'] = array();
        }
    }; 
?>