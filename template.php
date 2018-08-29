<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php get_title(); ?></title>
<?php require_once "controllers/connection.php" ?>	
<?php require_once "partials/header.php" ?>		
</head>
<body>
<?php require_once "partials/navbar.php" ?>


	<?php get_content(); ?>	


<?php require 'partials/footer.php'; ?>
<!-- SCRIPTS -->
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>