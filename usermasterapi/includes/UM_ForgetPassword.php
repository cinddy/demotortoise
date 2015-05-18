<?php
    /*
     *  $params["email"]: alphanumeric
     *  $params["username"]: alphanumeric
     */
        function fn_UM_ForgetPassword($params){
            $result = array();
			$json_url = EPALS_UM_URL."user/password/forgot";
			
			$output = CurlRequest($json_url, $params);
			if ($output->code==200){
					$result['token'] = $output->token;
					$result['error'] = 0;
				    $result['reason'] = 'OK';
			}	
			else{
				$result['token'] = 0;
				$result['error'] = $output->code;
                $result['reason'] = $output->reason;
			}
            return $result;
        } 
?>