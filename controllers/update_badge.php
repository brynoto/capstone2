<?php
	session_start();
	if (isset($_SESSION['cart'])) {
		$count = array_sum($_SESSION['cart']); ?>
		<?php if ($count !== 0): ?>
			<span class="badge amber darken-2" data-badge-caption=<?php echo $count == 1 ? "item" : "items"; ?>><?php echo $count; ?></span>
		<?php endif ?>
<?php	} ?>