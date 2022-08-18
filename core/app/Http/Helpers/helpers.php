<?php

    use App\GeneralSettings;

    if (!function_exists('send_email')) {

        function send_email($to, $name, $subject, $message)
        {
            $gnl      = GeneralSettings::first();
            $template = $gnl->emessage;
            $from     = $gnl->esender;
            if ($gnl->email_notification == 1) {
                $headers = "From: $gnl->title <$from> \r\n";
                $headers .= "Reply-To: $gnl->title <$from> \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                $mm      = str_replace("{{name}}", $name, $template);
                $message = str_replace("{{message}}", $message, $mm);

                @mail($to, $subject, $message, $headers);
            }
        }
    }

    if (!function_exists('send_contact_email')) {

        function send_contact_email($from, $name, $subject, $message)
        {
            $gnl      = GeneralSettings::first();
            $template = $gnl->emessage;
            $to       = $gnl->esender;
            if ($gnl->email_notification == 1) {
                $headers = "From: $name <$from> \r\n";
                $headers .= "Reply-To: $name <$from> \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                $mm      = str_replace("{{name}}", 'Admin', $template);
                $message = str_replace("{{message}}", $message, $mm);

                @mail($to, $subject, $message, $headers);
            }
        }
    }


    if (!function_exists('send_sms')) {

        function send_sms($to, $message)
        {
            $gnl = GeneralSettings::first();
            if ($gnl->sms_notification == 1) {
                $sendtext = urlencode($message);
                $appi     = $gnl->smsapi;
                $appi     = str_replace("{{number}}", $to, $appi);
                $appi     = str_replace("{{message}}", $sendtext, $appi);
                $result   = file_get_contents($appi);
            }
        }
    }


    function Replace($data)
    {
        $data = str_replace("'", "", $data);
        $data = str_replace("!", "", $data);
        $data = str_replace("@", "", $data);
        $data = str_replace("#", "", $data);
        $data = str_replace("$", "", $data);
        $data = str_replace("%", "", $data);
        $data = str_replace("^", "", $data);
        $data = str_replace("&", "", $data);
        $data = str_replace("*", "", $data);
        $data = str_replace("(", "", $data);
        $data = str_replace(")", "", $data);
        $data = str_replace("+", "", $data);
        $data = str_replace("=", "", $data);
        $data = str_replace(",", "", $data);
        $data = str_replace(":", "", $data);
        $data = str_replace(";", "", $data);
        $data = str_replace("|", "", $data);
        $data = str_replace("'", "", $data);
        $data = str_replace('"', "", $data);
        $data = str_replace("?", "", $data);
        $data = str_replace("  ", "_", $data);
        $data = str_replace("'", "", $data);
        $data = str_replace(".", "-", $data);
        $data = strtolower(str_replace("  ", "-", $data));
        $data = strtolower(str_replace(" ", "-", $data));
        $data = strtolower(str_replace(" ", "-", $data));
        $data = strtolower(str_replace("__", "-", $data));
        return str_replace("_", "-", $data);
    }

    function short_text($data, $length)
    {
        $first_part = explode(" ", $data);
        $main_part  = strip_tags(implode(' ', array_splice($first_part, 0, $length)));
        return $main_part . "....";
    }

// For Paytm
    if (!function_exists("encrypt_e")) {
        function encrypt_e($input, $ky)
        {
            $key  = html_entity_decode($ky);
            $iv   = "@@@@&&&&####$$$$";
            $data = openssl_encrypt($input, "AES-128-CBC", $key, 0, $iv);
            return $data;
        }
    }

    if (!function_exists("decrypt_e")) {
        function decrypt_e($crypt, $ky)
        {
            $key  = html_entity_decode($ky);
            $iv   = "@@@@&&&&####$$$$";
            $data = openssl_decrypt($crypt, "AES-128-CBC", $key, 0, $iv);
            return $data;
        }
    }

    if (!function_exists("pkcs5_pad_e")) {
        function pkcs5_pad_e($text, $blocksize)
        {
            $pad = $blocksize - (strlen($text) % $blocksize);
            return $text . str_repeat(chr($pad), $pad);
        }
    }

    if (!function_exists("pkcs5_unpad_e")) {
        function pkcs5_unpad_e($text)
        {
            $pad = ord($text[strlen($text) - 1]);
            if ($pad > strlen($text))
                return false;
            return substr($text, 0, -1 * $pad);
        }
    }

    if (!function_exists("generateSalt_e")) {
        function generateSalt_e($length)
        {
            $random = "";
            srand((double)microtime() * 1000000);

            $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
            $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
            $data .= "0FGH45OP89";

            for ($i = 0; $i < $length; $i++) {
                $random .= substr($data, (rand() % (strlen($data))), 1);
            }

            return $random;
        }
    }


    if (!function_exists("checkString_e")) {
        function checkString_e($value)
        {
            $myvalue = ltrim($value);
            $myvalue = rtrim($myvalue);
            if ($myvalue == 'null')
                $myvalue = '';
            return $myvalue;
        }
    }

    if (!function_exists("getChecksumFromArray")) {
        function getChecksumFromArray($arrayList, $key, $sort = 1)
        {
            if ($sort != 0) {
                ksort($arrayList);
            }
            $str         = getArray2Str($arrayList);
            $salt        = generateSalt_e(4);
            $finalString = $str . "|" . $salt;
            $hash        = hash("sha256", $finalString);
            $hashString  = $hash . $salt;
            $checksum    = encrypt_e($hashString, $key);
            return $checksum;
        }
    }

    if (!function_exists("verifychecksum_e")) {
        function verifychecksum_e($arrayList, $key, $checksumvalue)
        {
            $arrayList = removeCheckSumParam($arrayList);
            ksort($arrayList);
            $str        = getArray2StrForVerify($arrayList);
            $paytm_hash = decrypt_e($checksumvalue, $key);
            $salt       = substr($paytm_hash, -4);

            $finalString = $str . "|" . $salt;

            $website_hash = hash("sha256", $finalString);
            $website_hash .= $salt;

            $validFlag = "FALSE";
            if ($website_hash == $paytm_hash) {
                $validFlag = "TRUE";
            } else {
                $validFlag = "FALSE";
            }
            return $validFlag;
        }
    }

    if (!function_exists("getArray2Str")) {
        function getArray2Str($arrayList)
        {
            $findme     = 'REFUND';
            $findmepipe = '|';
            $paramStr   = "";
            $flag       = 1;
            foreach ($arrayList as $key => $value) {
                $pos     = strpos($value, $findme);
                $pospipe = strpos($value, $findmepipe);
                if ($pos !== false || $pospipe !== false) {
                    continue;
                }

                if ($flag) {
                    $paramStr .= checkString_e($value);
                    $flag     = 0;
                } else {
                    $paramStr .= "|" . checkString_e($value);
                }
            }
            return $paramStr;
        }
    }

    if (!function_exists("getArray2StrForVerify")) {
        function getArray2StrForVerify($arrayList)
        {
            $paramStr = "";
            $flag     = 1;
            foreach ($arrayList as $key => $value) {
                if ($flag) {
                    $paramStr .= checkString_e($value);
                    $flag     = 0;
                } else {
                    $paramStr .= "|" . checkString_e($value);
                }
            }
            return $paramStr;
        }
    }

    if (!function_exists("redirect2PG")) {
        function redirect2PG($paramList, $key)
        {
            $hashString = getchecksumFromArray($paramList);
            $checksum   = encrypt_e($hashString, $key);
        }
    }


    if (!function_exists("removeCheckSumParam")) {
        function removeCheckSumParam($arrayList)
        {
            if (isset($arrayList["CHECKSUMHASH"])) {
                unset($arrayList["CHECKSUMHASH"]);
            }
            return $arrayList;
        }
    }

    if (!function_exists("getTxnStatus")) {
        function getTxnStatus($requestParamList)
        {
            return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
        }
    }

    if (!function_exists("initiateTxnRefund")) {
        function initiateTxnRefund($requestParamList)
        {
            $CHECKSUM                     = getChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY, 0);
            $requestParamList["CHECKSUM"] = $CHECKSUM;
            return callAPI(PAYTM_REFUND_URL, $requestParamList);
        }
    }

    if (!function_exists("callAPI")) {
        function callAPI($apiURL, $requestParamList)
        {
            $jsonResponse      = "";
            $responseParamList = [];
            $JsonData          = json_encode($requestParamList);
            $postData          = 'JsonData=' . urlencode($JsonData);
            $ch                = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postData)
            ]);
            $jsonResponse      = curl_exec($ch);
            $responseParamList = json_decode($jsonResponse, true);
            return $responseParamList;
        }
    }

    if (!function_exists("sanitizedParam")) {
        function sanitizedParam($param)
        {
            $pattern[0]     = "%,%";
            $pattern[1]     = "%#%";
            $pattern[2]     = "%\(%";
            $pattern[3]     = "%\)%";
            $pattern[4]     = "%\{%";
            $pattern[5]     = "%\}%";
            $pattern[6]     = "%<%";
            $pattern[7]     = "%>%";
            $pattern[8]     = "%`%";
            $pattern[9]     = "%!%";
            $pattern[10]    = "%\\$%";
            $pattern[11]    = "%\%%";
            $pattern[12]    = "%\^%";
            $pattern[13]    = "%=%";
            $pattern[14]    = "%\+%";
            $pattern[15]    = "%\|%";
            $pattern[16]    = "%\\\%";
            $pattern[17]    = "%:%";
            $pattern[18]    = "%'%";
            $pattern[19]    = "%\"%";
            $pattern[20]    = "%;%";
            $pattern[21]    = "%~%";
            $pattern[22]    = "%\[%";
            $pattern[23]    = "%\]%";
            $pattern[24]    = "%\*%";
            $pattern[25]    = "%&%";
            $sanitizedParam = preg_replace($pattern, "", $param);
            return $sanitizedParam;
        }
    }

    if (!function_exists("callNewAPI")) {
        function callNewAPI($apiURL, $requestParamList)
        {
            $jsonResponse      = "";
            $responseParamList = [];
            $JsonData          = json_encode($requestParamList);
            $postData          = 'JsonData=' . urlencode($JsonData);
            $ch                = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($postData)]
            );
            $jsonResponse      = curl_exec($ch);
            $responseParamList = json_decode($jsonResponse, true);
            return $responseParamList;
        }
    }

// For Paytm


    function levelCommision($id, $amount)
    {

        $usr = $id;
        $i   = 1;

        $level = \App\Referral::count();

        while ($usr != "" || $usr != "0" || $i < $level) {
            $me    = \App\User::find($usr);
            $refer = \App\User::find($me->ref_id);
            if ($refer == "") {
                break;
            }
            $comission = \App\Referral::where('level', $i)->first();
            if (!$comission) {
                break;
            }
            $com = ($amount * $comission->percent) / 100;

            $new_bal                 = $refer->interest_balance + $com;
            $refer->interest_balance = $new_bal;
            $refer->save();

            $tlog['user_id'] = $refer->id;
            $tlog['amount']  = $com;
            $tlog['balance'] = $new_bal;
            $tlog['type']    = 11;
            $tlog['des']     = 'Level ' . $i . ' Referral Commission';
            $tlog['trxid']   = Illuminate\Support\Str::random(16);
            \App\Transection::create($tlog);


            $msg = 'Congratulation, You Got ' . $i . ' Level Referral Commission.';
            send_email($refer->email, $refer->username, 'Referral Commission', $msg);
            send_sms($refer->mobile, $msg);

            $usr = $refer->id;
            $i++;
        }

        return 0;

    }


    function showBelowUser($id)
    {

        $level = \App\Referral::count();

        $under_ref = \App\User::where('ref_id', $id)->get();

        $print = [];

        $i = 2;

        foreach ($under_ref as $data) {

//        if ($i < $level){

            $cc = \App\User::where('ref_id', $data->id)->count();

            echo "<li class=\"container\">";
            echo '<p>' . $print[] = $data->username . '</p>';

            if ($cc > 0) {
                echo '<ul>';
                echo '<li class="container">';
                echo '<p>' . $print[] = showBelowUser($data->id) . '</p>';
                echo '</li>';
                echo '</ul>';
            }
            echo "</li>";
//        }else{
//            echo "0000";
//        }

            $i++;


        }

    }


    function activeTemp()
    {
        $gnl = GeneralSettings::first();
//   $sess =  Session::get('template');
//   if(trim($sess) != null) {
//       return $sess;
//   }else{
        return $gnl->template_active;
//   }
    }
