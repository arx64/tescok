<?php
error_reporting(0);
// Wagiah: 126100130722
echo "Input (1/2) : ";
$in = trim(fgets(STDIN));
if($in == "1"){
	$id = "126100130722";
} elseif($in == "2") {
	$id = "126160123985";
} else {
	die("Invalid Option!");
}
//include "wa.php";
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.sepulsa.com/api/v1/carts/add/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"url\":\"http://api.sepulsa.com/api/v1/oscar/products/14/\",\"quantity\":1,\"options\":[{\"option\":\"https://api.sepulsa.com/api/v1/oscar/options/1/\",\"value\":\"$id\"}]}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: api.sepulsa.com';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"98\"';
$headers[] = 'X-Chital-Order-Source: web';
$headers[] = 'Dnt: 1';
$headers[] = 'Sec-Ch-Ua-Mobile: ?1';
$headers[] = 'X-Chital-Api-Key: qQFAFT8d.6Yt44sZWZdkd1P4jFwAv4E5UyEp9QYNw';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.89 Mobile Safari/537.36';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
$headers[] = 'X-Chital-Requester: https://www.sepulsa.com';
$headers[] = 'Sec-Ch-Ua-Platform: \"Android\"';
$headers[] = 'Origin: https://www.sepulsa.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://www.sepulsa.com/';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Cookie: __zlcmid=1BIl7tlIhX8XnRM';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$json = json_decode($result, true);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
//print_r($json["data"]["lines"]);
//print_r($json);
//echo "<hr>";
$data = $json["data"]["lines"]["0"]["attributes"]["1"]["value"];
file_put_contents("text.txt", $data);
$newdata = json_decode(file_get_contents("text.txt"), true);
$pesan = "*Informasi Tagihan Listrik*
";
if($json["status"] == "400"){
	print_r($json["errors"][0]["detail"]);
	die();
}
foreach($newdata as $x => $val){
	echo "$x : $val\n";
}
/*
$pesanx = $pesan.$x.$val;
SendText("6285265681313", $pesanx);
 */
?>
