<?php 

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;


require 'start.php';

$payer = new Payer();
$payer->setPaymentMethod('paypal');


session_start();

require 'connection.php';


$items = [];
$total = 0;
foreach ($_SESSION['cart'] as $id => $quantity) {
	$sql = "SELECT * FROM products WHERE id = $id";
	$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	extract($result);
	
	$product = $name;
	$subtotal = $price*$quantity;
	$total += $subtotal;

	$item = new Item();
	$item->setName($product)
		->setCurrency('PHP')
		->setQuantity($quantity)
		->setPrice($price);

	$items[] = $item;
}


$item_list = new ItemList();
$item_list->setItems($items);

$amount = new Amount();
$amount->setCurrency('PHP')
	->setTotal($total);

$transaction = new Transaction();
$transaction
	->setAmount($amount)
	->setItemList($item_list)
	->setDescription('payment for PeenoiseDota2 Purchase purchase')
	->setInvoiceNumber(uniqid('PeenoiseDota2_'));

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL.'/controllers/pay.php?success=true')
	->setCancelUrl(SITE_URL.'/pay.php?success=false');

$payment = new Payment();
$payment->setIntent('sale')
	->setPayer($payer)
	->setRedirectUrls($redirectUrls)
	->setTransactions([$transaction]); 

try {
	$payment->create($paypal);
} catch(Exception $e) {
	die($e);
}

$approvalUrl = $payment->getApprovalLink();

header('location: '.$approvalUrl); 

?>


 ?>