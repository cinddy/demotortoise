<?php
    include_once 'includes/config.php';


    /*
     *  $params["email"]: alphanumeric
     *  $params["username"]: alphanumeric
     *  $params["password"]: alphanumeric
     *  $params["firstname"]: alphanumeric
     *  $params["lastname"]: alphanumeric
     *  $params["displayname"]: alphanumeric
     *  $params["country"]: alphanumeric
     *  $params["origin"]: alphanumeric
     *  $params["DOB"]: date()
     * comment
     */
        function UM_CreateUser($params){
            include_once 'includes/UM_CreateUser.php';
            $result = fn_UM_CreateUser($params);
            return $result;
        }

        
    /*
     *  $params["id"]: alphanumeric
     *  $params["email"]: alphanumeric
     *  $params["username"]: alphanumeric
     *  $params["password"]: alphanumeric
     *  $params["firstname"]: alphanumeric
     *  $params["lastname"]: alphanumeric
     *  $params["displayname"]: alphanumeric
     *  $params["country"]: alphanumeric
     *  $params["origin"]: alphanumeric
     *  $params["DOB"]: date()
     */
        function UM_UpdateUser($params){
            include_once 'includes/UM_UpdateUser.php';
            $result = fn_UM_UpdateUser($params);
            return $result;
        }
        
    /*
     *  $params["username"]: alphanumeric
     *  $params["password"]: alphanumeric
     */
        function UM_LoginUser($params){
            include_once 'includes/UM_LoginUser.php';
            $result = fn_UM_LoginUser($params);
            return $result;
        } 
	/*
     *  $params["id"]: alphanumeric
     *  $params["password"]: alphanumeric
     */
        function UM_UpdatePassword($params){
            include_once 'includes/UM_UpdatePassword.php';
            $result = fn_UM_UpdatePassword($params);
            return $result;
        } 
	/*
     *  $params["email"]: alphanumeric
     *  $params["username"]: alphanumeric
     */
        function UM_ForgetPassword($params){
            include_once 'includes/UM_ForgetPassword.php';
            $result = fn_UM_ForgetPassword($params);
            return $result;
        }  	
	/*
     *  $params["id"]: alphanumeric
     *  $params["password"]: alphanumeric
	 *	$params["token"]: alphanumeric
     */
        function UM_ResetPassword($params){
            include_once 'includes/UM_ResetPassword.php';
            $result = fn_UM_ResetPassword($params);
            return $result;
        }  		
		

    /*
     *  $params["id"]: alphanumeric
     */
        
        function UM_GetUser($params){
            include_once 'includes/UM_GetUser.php';
            $result = fn_UM_GetUser($params);
            return $result;
        }    
    
	/*
     *  $params["username"]: alphanumeric
     */
        
        function UM_CheckUsername($params){
            include_once 'includes/UM_CheckUsername.php';
            $result = fn_UM_CheckUsername($params);
            return $result;
        } 
	
    /*
     *  $params["id"]: alphanumeric
     */
        function UM_DeleteUser($params){
            include_once 'includes/UM_DeleteUser.php';
            $result = fn_UM_DeleteUser($params);
            return $result;
        }  
	/*
     *  $params["url"]: alphanumeric
	 *  $params["params"]: array with params
     */
        function CurlRequest($url, $params, $otherRequest = "POST"){
            $data_string = json_encode($params);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $otherRequest);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
			    'Authorization: '.EPALS_UM_AUTHORIZATION,
				'Content-Length: ' . strlen($data_string))
			);
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			//execute post
			$output = json_decode(curl_exec($ch));
			//close connection
			curl_close($ch);
            return $output;
        }  		
?>