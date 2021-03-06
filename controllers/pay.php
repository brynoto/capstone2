<?php 
session_start();

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require 'start.php';
require 'connection.php';

if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])) {
	die();
}

if((bool)$_GET['success'] === false) {
	echo "Transaction cancelled. <a href='../index.php'> Go back to Homepage.</a>"; die();
}

$payment_id = $_GET['paymentId'];
$payer_id = $_GET['PayerID'];
$transaction_code = uniqid();

$payment = Payment::get($payment_id, $paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payer_id);

try {
	$result = $payment->execute($execute, $paypal);
	$result = json_decode($result);
	$invoice_number = $result->transactions[0]->invoice_number;
	foreach($result->payer->payer_info->shipping_address as $key => $address_piece) {
		if($key != 'recipient_name') {
			$address_array[] = $address_piece;
		}
	}
	$address = implode(' ', $address_array);
} catch(Execption $e) {
	$data = json_decode($e->getData());
	print_r($data);
	die();
}
$user_id = $_SESSION['logged_in_user']['id'];

$sql = "INSERT INTO orders VALUES(null,$user_id,'$transaction_code','$address',null,null,1,2)";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
$order_id = mysqli_insert_id($conn);

foreach($_SESSION['cart'] as $id => $quantity) {
	$sql = "INSERT INTO order_details VALUES(null,$id,$quantity,$order_id)";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
}

unset($_SESSION['cart']);
$_SESSION['success_message'] = "Payment Successful!";


header('location: ../index.php');


?>
