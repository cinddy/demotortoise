<?php
    /*
     *  $params["id"]: alphanumeric
     */
        function fn_UM_DeleteUser($params){
            $result = array();
            $result['error'] = 0;

            $json_url = EPALS_UM_URL."user";

			$output = CurlRequest($json_url, $params, "DELETE");
                        var_dump($output);
            if ($output->code==200){
                $result['error'] = 0;
                $result['reason'] = 'OK';
            } else {
                $result['error'] = $output->code;
                $result['reason'] = $output->reason;
            }
            return $result;
        } 
?>
