<?php
    $otp = random_int(1001, 9999);
    $api_key = 'FINOfnWTiXsGphrghAWI';
    $type = 'text';
    $senderid = '8809617617903';
    $message = "Your Real State OTP is $otp . This otp expires after 5 minutes.";

    // URL তৈরি করা
    $url = "http://bulksmsbd.net/api/smsapi?api_key=" . urlencode($api_key) .
        "&type=" . urlencode($type) .
        "&number=" . urlencode($number) .
        "&senderid=" . urlencode($senderid) .
        "&message=" . urlencode($message);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
?>