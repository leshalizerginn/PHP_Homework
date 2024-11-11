<?php
//Функция Шифровки сообщения message и установки шага(Shift)
function encrypt($message,$shift){
	$str = '';
	
	$array = str_split($message);
	if (gettype($shift) == "integer"){
		$shift %= 26;
		for($count = 0; $count < count($array);$count++){ 
		$elemarray = $array[$count];
		$str .= chr(ord($elemarray) + $shift); 
	}
	printf("%s : %d\n", $str,$shift);
	return $str;
	}
	else{echo "Напишите в shift число b и без кавычек(!)";exit;}
}
//Функция Дешифровки, а так как дешифровка это шифровка со знаком минус, добавим знак минус к уже имеющейся функции
function decrypt($message, $shift){
	return encrypt($message,(int)-$shift);
}
$message = "Hello"; 
$shift = 1; 
$encryptedMessage = encrypt($message, $shift); // Вызов функции шифрования
$decryptedMessage = decrypt($encryptedMessage, $shift); // Вызов функции дешифрования
