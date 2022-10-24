<?php

// inisialisasi variabel
$key = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";

// if form was submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declare encrypt and decrypt funtions
	require_once('vigenere.php');
	
	// set the variables
	$key = $_POST['key'];
	$code = $_POST['code'];
	
	// check if password is provided
	if (empty($_POST['key']))
	{
		$error = "Please enter a password!";
		$valid = false;
	}
	
	// check if text is provided
	else if (empty($_POST['code']))
	{
		$error = "Please enter some text or code to encrypt or decrypt!";
		$valid = false;
	}
	
	// check if password is alphanumeric
	else if (isset($_POST['key']))
	{
		if (!ctype_alpha($_POST['key']))
		{
			$error = "Password should contain only alphabetical characters!";
			$valid = false;
		}
	}
	
	// inputs valid
	if ($valid)
	{
		// jika menekan tombol enkripsi
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($key, $code);
			$error = "Text encrypted successfully!";
			$color = "#526F35";
		}
			
		// jika menekan tombol dekripsi
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($key, $code);
			$error = "Code decrypted successfully!";
			$color = "#526F35";
		}
	}
}
?>