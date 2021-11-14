<?php
$json = file_get_contents('../korzinka.json');
$json = json_decode($json, true);

$message = '';
$message .= '<h1>Заказы</h1>';
$message .= '<p>Телефон:'.$_POST['ephone'].'</p>';
$message .= '<p>Почта:'.$_POST['email'].'</p>';
$message .= '<p>Клиент:'.$_POST['ename'].'</p>';

$korzinka = $_POST['korzinka'];
$sum = 0;
foreach ($korzinka as $key=>$val ){
	$message .=$json[$key]['name'];
	$message .='<br>';
	$message .=$val.'шт';
	$message .='<br>';
	$message .= $val*$json[$key]['cost'].' KZT';
	$message .='<br>';
	$message .='<hr>';
	$sum = $sum + $val*$json[$key]['cost'];
}
$message .='Всего: '.$sum.' KZT';
print_r($message);