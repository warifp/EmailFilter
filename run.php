<?php

/**
 SORTING EMAIL
 PENGGUNAAN "php file.php list.txt"
 */
error_reporting(0);
ini_set('memory_limit', '-1');
mkdir('country');

echo "=====================================================================\r\n";
echo "                   || SORT EMAIL ATAU EMAIL FILTER! \r\n";
echo "                   || (c) 2017 WAHYU ARIF P\r\n";
echo "   =============   || \r\n";
echo " SORT FILTER EMAIL || Facebook  : https://www.facebook.com/warifp\r\n";
echo "   =============   || Instagram : https://www.instagram.com/warifp\r\n";
echo "                   || Github    : https://github.com/idsystem404\r\n";
echo "=====================================================================\r\n\n";
echo "Penggunaan : php namafile.php namalist.txt\r\n";
echo "Hasil tersimpan di Folder /country/\r\n\n";
echo "Tekan [ENTER] Untuk memulai [EMAIL FILTER]!";
rtrim( fgets( STDIN));
echo "\n";

$f = file_get_contents($argv[1]);
$f = explode("\r\n", $f);
$f = array_unique($f);

$yahoo 		= 0;
$gmail 		= 0;
$hotmail 	= 0;
$aol 		= 0;
$other 		= 0;

foreach ($f as $key => $email) {
	$explode = explode("@", $email);
	if(! is_numeric($explode[0]) && filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/marketplace.amazon|example|test|auto|cdiscount.com/", $explode[0])){
		
		if(preg_match("/gmail/", $explode[1])){
			$x = fopen("country/email-gmail.txt", "a+");
			fwrite($x, $email."\r\n");
			fclose($x);
			
			$gmail++;

		}else if(preg_match("/yahoo|ymail|rocketmail/", $explode[1])){
			$x = fopen("country/email-yahoo.txt", "a+");
			fwrite($x, $email."\r\n");
			fclose($x);

			$yahoo++;

		}else if(preg_match("/hotmail|live|outlook|msn/", $explode[1])){
			$x = fopen("country/email-hotmail.txt", "a+");
			fwrite($x, $email."\r\n");
			fclose($x);
			$hotmail++;
		}else if(preg_match("/aol|AOL/", $explode[1])){
			$x = fopen("country/email-aol.txt", "a+");
			fwrite($x, $email."\r\n");
			fclose($x);
			$aol++;
		}else{
			$x = fopen("country/email-other.txt", "a+");
			fwrite($x, $email."\r\n");
			fclose($x);
			$other++;
		}
	}
	echo "Yahoo [".$yahoo."] | Hotmail [".$hotmail."] | Aol  [".$aol."] | GMAIl  [".$gmail."] | Other  [".$other."]\t\n";
}