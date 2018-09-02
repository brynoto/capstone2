<?php 
session_start();

function get_title() {
	'Order Summary';
}

function get_content() { 
	global $conn; ?>

	<h1>Order Summary</h1>

	<table class="table">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">User Id</th>
      <th scope="col">Transaction Code</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Address</th>
          <th scope="col">Date Created</th>
       <th scope="col">Status Id</th>
      <th scope="col">Payment Method</th>

    </tr>
  </thead>
   <tbody>

<?php 
	$ordersQuery = "SELECT * FROM orders";
	$orders = mysqli_query($conn, $ordersQuery);
	foreach ($orders as $order) { 
		extract($order); 
 ?>

    <tr>
      <td scope="col"><?php echo $id; ?></td>
      <td scope="col"><?php echo $user_id; ?></td>
      <td scope="col"><?php echo $transaction_code; ?></td>
      <td scope="col"><?php echo $contact_number; ?></td>
      <td scope="col"><?php echo $address; ?></td>
      <td scope="col"><?php echo $date_created; ?></td>
      <td scope="col"><?php echo $status_id; ?></td>
      <td scope="col"><?php echo $payment_method_id; ?></td>
      <td scope="col"><button>View details</button></td>
 
    </tr>
 

	<?php	 } ?>
 </tbody>
</table>

<?php } ?>

 

<?php require_once "template.php"; ?>


