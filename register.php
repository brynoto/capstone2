<?php 
function get_title() {
	'Register';
}

function get_content() { ?>

<div class="row">
<div class="container-fluid">
	<h1 class="display-5">Register</h1>
	<form id="registerform" action="controllers/register_endpoint.php" method="POST">
	<div class="card">
    <div class="card-block">
        <div class="form-header blue-gradient">
            <h3>Register:</h3>
        </div>
        <div>
            <i class="fa fa-user prefix"></i>
            <label for="form3">Enter username</label>  
            <input type="text" id="username" name="username" class="form-control">
            <span></span>              
        </div>
        <div>
            <i class="fa fa-lock prefix"></i>
            <label for="form4">Your password</label> 
            <input type="password" id="password" name= "password" class="form-control"> 
             <span></span>         
        </div>
        <div>
            <i class="fa fa-lock prefix">Confirm password</i>
            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control">
            <span></span>
                 
        </div>
        <div class="text-center">
            <button id="registerBtn" class="btn btn-indigo" type="button">Sign up</button>
   	        <hr>     
   	    </div>
    </div>
</div>
</form>
</div>
</div>

<script type="text/javascript">
	
	$('#registerBtn').click( () => {
	const username = $('#username').val(); 
	let errorFlag = false;

	$.ajax({
		url : 'controllers/check_username.php',
		method : 'post',
		data : {username : username},
		async : false		
	}).done( data => {
		if (data == 'meron') {
			$('#username').next().css('color','red');
			$('#username').next().html('username is already taken');
			errorFlag = true;
		} else {
			$('#username').next().css('color','green');
			$('#username').next().html('username is available');
		}	

	})	


	if (username.length == 0) {
		$('#username').next().css('color','red');
		$('#username').next().html('this field is required');
		errorFlag = true;
	} else {
	
		if (errorFlag == true) {
			$('#username').next().css('color','red');
			$('#username').next().html('username already exists');
			errorFlag = true;
		

		} else {	
			$('#username').next().css('color','green');
			$('#username').next().html('username still available');
		}	

	
	}
		const password = $('#password').val();
		const confirmpassword = $('#confirmpassword').val();
		if (password.length == 0) {
			$('#password').next().css('color','red');
			$('#password').next().html('this field is required');
			$('#confirmpassword').next().html('this field is required');
			$('#confirmpassword').next().css('color','red');
			
			errorFlag = true;
		
		} else {
			$('#password').next().html('');
		
		}	
		if (password !== confirmpassword) {
				$('#confirmpassword').next().css('color','red');
				$('#confirmpassword').next().html('passwords did not match');
				errorFlag = true;
			
			} else {
				$('#confirmpassword').next().html('');
			
			}
		if (errorFlag == false) {
		$('#registerform').submit();
	}
});		


</script>

<?php } ?>
<?php require_once 'template.php'; ?>




</body>
</html>