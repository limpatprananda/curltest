<?php         
        $base_url = "http://localhost/tools/curltest/";
        $url = $base_url . "data.php?firstName=Limpat&lastName=Prananda";        
        $return = "default value";
                
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        /*post data field*/
//        $vars = "firstName=Wimpi&lastName=Agung";
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//        curl_setopt($ch, CURLOPT_HEADER, 0);                          
        /*post data field*/
        
        /*post data json*/        
//        $data = array(
//            "firstName" => "Wimpi",
//            "lastName" => "Agung Nugraha"
//        );
//        $data_string = json_encode($data);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                                   
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
//            'Content-Type: application/json',                                                                                
//            'Content-Length: ' . strlen($data_string))                                                                       
//        ); 
        /*post data json*/
        
        $return_value = curl_exec($ch);
        if(!$return_value){
            echo curl_error($ch);
            exit();
        }
        else{
            $status_info = curl_getinfo($ch);
        }
                        	
        curl_close ($ch);
	echo json_encode(array(
            'return_value' => $return_value,
            'status_info' => $status_info
        ));
?>