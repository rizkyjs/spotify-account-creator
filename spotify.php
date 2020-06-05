<?php
//Created by ikballnh
function save($filename, $email)
{
    $save = fopen($filename, "a");
    fputs($save, "$email");
    fclose($save);
}

function getfol($url, $email, $password, $file) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$data = curl_exec($ch);
	curl_close($ch); 
	if (strpos($data, "www.spotify.com")) {
		$a = "\nBerhasil verif email --> $email|$password";
		echo "$a";
		save($file, $a); 


	} else {
		echo "Gagal verif email\n";
	}
}

function get($url, $headers, $put = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($put):
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	endif;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($headers):
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	endif;
	curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
	return curl_exec($ch);
}

function request($url, $data, $headers, $put = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($put):
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	endif;
	if($data):
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	endif;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($headers):
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	endif;
	curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
	return curl_exec($ch);
}


function openlink($url){
	$getotp = getfol($url);
	echo $getotp;

}


function createmail($email){
$url = "https://api.internal.temp-mail.io/api/v3/email/new";
$data = '{"name":"'.$email.'","domain":"inbox-me.top"}';
$headers = array();
$headers [] = "Host: api.internal.temp-mail.io";
$headers [] = "Connection: close";
$headers [] = "Accept: application/json, text/plain, */*";
$headers [] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36";
$headers [] = "Content-Type: application/json;charset=UTF-8";
$headers [] = "Origin: https://temp-mail.io";
$headers [] = "Sec-Fetch-Site: same-site";
$headers [] = "Sec-Fetch-Mode: cors";
$headers [] = "Sec-Fetch-Dest: empty";
$headers [] = "Referer: https://temp-mail.io/en";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";
$headers [] = "Referer: https://m.tokopedia.com/register?ld=";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";
$headers [] = "Cookie: __cfduid=d38828fa7a1bd1b084014560fbb0369131591295947; _ga=GA1.2.1284780574.1591295957; _gid=GA1.2.73843276.1591295957; __gads=ID=60fa90a69e6b97d4:T=1591295968:S=ALNI_MaH-5WX-f0vB2fECQbdiATHHok4Sw";


$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);

//var_dump($json);

if (strpos($getotp, "$email")) {
		echo "Berhasil membuat email --> $email@inbox-me.top\n";	
	} else {
		echo "gagal bikin email\n";
	}
}


function regis($email, $password, $nama){
$url = "https://spclient.wg.spotify.com/signup/public/v1/account/";
$data = 'birth_year=2004&name='.$nama.'&password='.$password.'&email='.$email.'&creation_point=client_mobile&gender=female&key=142b583129b2df829de3656f9eb484e6&platform=Android-ARM&iagree=true&birth_month=6&birth_day=4&password_repeat='.$password.'';
$headers = array();
$headers [] = "Accept-Language: en-US";
$headers [] = "Connection: close";
$headers [] = "User-Agent: Spotify/8.5.60 Android/23 (Custom)";
$headers [] = "Spotify-App-Version: 8.5.60";
$headers [] = "X-Client-Id: 9a8d2f0ce77a4e248bb71fefcb557637";
$headers [] = "App-Platform: Android";
$headers [] = "Content-Type: application/x-www-form-urlencoded";
$headers [] = "Host: spclient.wg.spotify.com";
$headers [] = "Connection: close";
$headers [] = "Accept-Encoding: gzip, deflate";

$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);


$a = $json['username'];
echo "Berhasil daftar spotify --> $a";
}

 function random_str()
    {
        $data = '1234567890';
        $string = '';
        for($i = 0; $i <5; $i++) {
            $pos = rand(0, strlen($data)-1);
            $string .= $data{$pos};
        }
    
return $string;
        }

function verivemail($email, $password, $file) {
$url = "https://api.internal.temp-mail.io/api/v3/email/$email/messages";
$headers = array();
$headers [] = "Host: api.internal.temp-mail.io";
$headers [] = "Connection: close";
//$headers [] = "Content-Length: 399";
$headers [] = "Accept: application/json, text/plain, */*";
$headers [] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36";
$headers [] = "Origin: https://temp-mail.io";
$headers [] = "Sec-Fetch-Site: same-site";
$headers [] = "Sec-Fetch-Mode: cors";
$headers [] = "Sec-Fetch-Dest: empty";
$headers [] = "Referer: https://temp-mail.io/en";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";


$getotp = get($url, $headers);
$json = json_decode($getotp);
$cari = strpos($getotp, "no-reply@spotify.com");
$sub_kal = substr($getotp, $cari);
$cari2 = strpos($sub_kal, 'https://wl.spotify.com/ls/click?upn=');
//$bner = $cari2 - 213 - 35;
$output = substr($sub_kal, $cari2, 1000);
$cari3 = strpos($output, ' )\n\n#');
$output2 = substr($sub_kal, $cari2, $cari3);

//echo "$output2";
sleep(2);
getfol($output2, $email, $password, $file);

}

echo "=========================\n";
echo "Spotify account creator + auto veriv\n";
echo "Created by Ikbal Nur Hakim\n";
echo "=========================\n";

echo "Masukan password (Min. 8 character) : ";
$password = trim(fgets(STDIN));
echo "Maukan User email: ";
$useremail = trim(fgets(STDIN));
echo "Nama file result: (Contoh: spotify.txt) ";
$file = trim(fgets(STDIN));
echo "Jumlah akun: ";
$jmlh = trim(fgets(STDIN));
for ($i=0; $i <$jmlh; $i++) { 
	$dakkta = random_str();
	$mail1 = "$useremail$dakkta";
	$mail2 = "$useremail$dakkta@inbox-me.top";

	echo "\n===========================\n";
	createmail($mail1);
	regis($mail2, $password, $mail1);
	sleep(3);
	verivemail($mail2, $password, $file); 
	echo "\n===========================\n";



}

echo "Hasil di simpan di $file";



