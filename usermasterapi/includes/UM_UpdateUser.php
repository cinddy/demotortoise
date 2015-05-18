<?php
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
        function fn_UM_UpdateUser($params){
            $result = array();
            $result['id'] = 0;
            $result['error'] = 0;

            $json_url = EPALS_UM_URL."user";

			$output = CurlRequest($json_url, $params);
            if ($output->code==200){
                $result['id'] = $output->user->id;
                $result['error'] = 0;
                $result['reason'] = 'OK';
            } else {
                $result['id'] = 0;
                $result['error'] = $output->code;
                $result['reason'] =  $output->reason;
            }

            return $result;
        }
?>