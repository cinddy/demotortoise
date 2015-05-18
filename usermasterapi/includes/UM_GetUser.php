<?php
    /*
     *  $params["id"]: alphanumeric
     */
        
        function fn_UM_GetUser($params){
            $result = array();
            $result["id"] = $params["id"];
            $result["email"] = '';
            $result["username"] = '';
            $result["firstname"] = '';
            $result["lastname"] = '';
            $result["displayname"] = '';
            $result["country"] = '';
            $result["origin"] = '';
            $result["dob"] = '';
            $result['error'] = 0;
            $result['reason'] = '';

            $json_url = EPALS_UM_URL."user";
			$output = CurlRequest($json_url, $params);
			
            if ($output->code==200){
                $result['id'] = $output->user->id;
                $result["email"] = $output->user->email;
                $result["username"] = $output->user->username;
                $result["firstname"] = $output->user->firstname;
                $result["lastname"] = $output->user->lastname;
                $result["displayname"] = $output->user->displayname;
                $result["country"] = $output->user->country;
                $result["origin"] = $output->user->origin;
                $result["dob"] = $output->user->dob;
                $result["created"] = $output->user->created;
                $result["modified"] = $output->user->modified;
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