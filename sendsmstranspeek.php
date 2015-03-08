

<?php
require_once("AppPRIME.class.php");															// include class AppPRIME
$config = array(																								// setting config via array
	'partner_key' => 'YOUR_PARTNER_KEY',
	'secret_key' => 'YOUR_SECRET_KEY'
);

/**
 * Berikut contoh implementasi SMS transpeek
 * Namun tim kami blm dapat mengimplementasikannya
 */
 
/** 
 * Selain memasukkan partner_key dan secret_key di atas,
 * Cara lain adalah:
 * $AppPRIME->setPartnerKey('YOUR_PARTNER_KEY');
 * $AppPRIME->setSecretKey('YOUR_SECRET_KEY');
 */
 
$AppPRIME = new AppPRIME($config);

$AppPRIME->debugResponseFormat="JSON";	// debug response : JSON / ARRAY
$AppPRIME->setEnv("runtime");						// Environment : sandbox / runtime
$AppPRIME->setDebug(true);							// debug : true / false

$param=array(														// array parameter send sms
		"address" => "$pelanggan",           // - nomor flexi tujuan
		"charginginformation" => array(
			"description" => "SMS-transpeek",   // - deskripsi
			"currency" => "IDR",              // - mata uang : IDR
			"amount" => "1",                  // - rupiah yang dideduct, berlaku jika code != SDPCHG000
			"code" => "SDPCHG000"             // - charge code
		),
		"message" => "Angkutan Anda sudah melewati $nearby dan akan datang dengan estimasi $estimasi menit"             // - isi pesan sms
	);
$AppPRIME->setParam($param);
$response=$AppPRIME->sendSMS();					// send sms
if (!$response)
	print_r($AppPRIME->showError());
else 
	echo "Send SMS Berhasil";
?>