<?php 
function get_title() {
	'Register';
}

function get_content() { ?>


<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<header class="card-header">
				<a href="index.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
				<h4 class="card-title mt-2">Sign up</h4>
			</header>
			<article class="card-body">
				<form  id="registerform" action="controllers/register_endpoint.php" method="POST">
					<div class="form-row">
						<div class="col form-group">
							<label>Username </label>   
						  	<input type="text" id="username" name="username" class="form-control">
						  	<span></span>  
						</div>
						<div class="col form-group">
							<label>Password</label>
						  	<input type="password" id="password" name="password" class="form-control">
						  	<span></span>  
						</div> 
						<div class="col form-group">
							<label>Confirm Password</label>
						  	<input type="password" id="confirmpassword" name="confirmpassword" class="form-control">
						  	<span></span>  
						</div> 
					</div> 
					<div class="form-row">
						<div class="col form-group">
							<label>First name </label>   
						  	<input type="text" id="first_name" name="first_name" class="form-control">
						</div> 
						<div class="col form-group">
							<label>Last name</label>
						  	<input type="text" id="last_name" name="last_name" class="form-control">
						</div>
					</div> 
					<div class="form-row">
						<div class="col form-group">
							<label>Email</label>   
						  	<input type="email" id="email" name="email" class="form-control">
						  	<small class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div> 
						<div class="col form-group">
							<label>Contact Number</label>
						  	<input type="text" id="contact_number" name="contact_number" class="form-control">
						</div>
					</div> 
						<div class="form-group">
						<label>Address</label>
						<input type="email" id="address" name="address" class="form-control">
					</div>	

					<div class="form-row">
						<div class="form-group col-md-6">
						  <label>City</label>
						  <input type="text" class="form-control">
						</div> 
						<div class="form-group col-md-6">
						  <label>Country</label>
						  <select id="inputState" class="form-control">
						    <option> Choose...</option>
						      <option selected="">Philippines</option>	
						      <option>Uzbekistan</option>
						      <option>Russia</option>
						      <option>United States</option>
						      <option>India</option>
						      <option>Afganistan</option>
						  </select>
						</div> 
					</div> 
				    <div class="text-center">
				        <button id="registerBtn" class="btn btn-indigo" type="button">Sign up</button> 
				    </div>      
				    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
				</form>
			</article>
				<div class="border-top card-body text-center">Have an account? <a href="index.php">Log In</a></div>
		</div> 
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