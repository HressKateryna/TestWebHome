<?php
include 'html/form.html';
$data = htmlspecialchars($_POST['name']);

//					Privat   API
$url = 'https://api.privatbank.ua/p24api/exchange_rates?json&date=';

$options = array(
	'data' => $data,
	'baseCurrencyLit' => 'UAH',
	'coursid' => '5',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url.$data);

$response = curl_exec($ch);
$data1 = json_decode($response, true);
curl_close($ch);

$usd = $data1[exchangeRate][23];

// 					MySQL 

$link = mysqli_connect("localhost", "root", "", "usdform");

$sqlInsert = "INSERT INTO `usd`(`date`, `saleRate`, `purchaseRate`) VALUES ('$data1[date]','$usd[saleRate]','$usd[purchaseRate]')";

$sqlSelect = "SELECT * FROM `usd` WHERE date = '$data1[date]'";


$resultSelect = mysqli_query($link, $sqlSelect);
$resultSelect = mysqli_fetch_array($resultSelect,MYSQLI_ASSOC);

if($resultSelect == null){
	$resultInsetr = mysqli_query($link, $sqlInsert);
	$resultSelect = mysqli_query($link, $sqlSelect);
	$resultSelect = mysqli_fetch_array($resultSelect,MYSQLI_ASSOC);
}

// 					Вывод данных на экран

print_r('</br>Дата - ');
print_r($resultSelect[date]);
print_r('</br>Курс продажи - ');
print_r($resultSelect[saleRate]);
print_r('</br> Курс покупки - ');
print_r($resultSelect[purchaseRate]);
print_r('</br>');


?>
