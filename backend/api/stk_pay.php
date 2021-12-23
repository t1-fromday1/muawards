<?php

    $consumer_key="8N0RDEOYyluQgm87cXKmkSGj0mkOIweG";
    $consumer_secret="ERlXu8fsNuDSkURE";
    $BusinessShortCode = "174379";
    $Timestamp = date("YmdHis");

    function mpesapassword(){
        global $Timestamp, $BusinessShortCode;
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = $BusinessShortCode;
        $password = base64_encode($BusinessShortCode.$passkey.$Timestamp);
        return $password;
    }

    function generateAccessToken(){
        global $consumer_key, $consumer_secret;
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }

    function makepay($phone, $amount){
        global $Timestamp, $BusinessShortCode;
        $phone = $phone;
        $amount = $amount;
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.generateAccessToken()));
        $curl_post_data = [
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => mpesapassword(),
            'Timestamp' => $Timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone,
            'PartyB' => 174379,
            'PhoneNumber' => $phone,
            'CallBackURL' => 'https://0a82-2c0f-fe38-2400-70a1-c11f-bc94-f3aa-50ce.ngrok.io/muawards/backend/api/callback.php',
            'AccountReference' => "MUAWARDS",
            'TransactionDesc' => "Testing stk push muawards"
        ];

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return json_decode($curl_response);
    }

    function querypaymentstatus($CheckoutRequestID){
        global $Timestamp, $BusinessShortCode;
        $CheckoutRequestID = $CheckoutRequestID;
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.generateAccessToken()));
        $curl_post_data = [
            "BusinessShortCode" => $BusinessShortCode,
            "Password" => mpesapassword(),
            "Timestamp" => $Timestamp,
            "CheckoutRequestID" => $CheckoutRequestID
        ];

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return json_decode($curl_response);
    }


?>