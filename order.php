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
      <td scope="col">
        <!-- Button trigger modal -->
        <button data-id=<?php echo $id ?> type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewOrderDetails">
          View details
        </button>
      </td>
 
    </tr>
 

  <?php  } ?>
 </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="viewOrderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body-order-details">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

 

<?php require_once "template.php"; ?>


