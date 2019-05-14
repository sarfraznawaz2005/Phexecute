<?php function httpGet($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, true); 
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}
 
echo httpGet("https://islamicaid.staging.wpengine.com/donation.php");