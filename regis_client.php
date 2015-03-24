<!doctype html>
<?php require_once("includes/init.php"); ?>
<?php require_once(resolvePath("includes/header.php")); ?>
<script>
	$("#menu_register_client").addClass("active");
</script>
<html>
<head>
<style media="screen" type="text/css">
.field-description{
	width: 270px;
	float: left;
}
.fixed-input{
	width: 500px;
}
</style>
</head>
<body>
		<div class="col-md-offset-2">
    		<h1><span class="label label-primary">Client Registration</span></h1>	
		</div>
		<!-- Nav tabs -->
			<div class="col-md-8 col-md-offset-2" style="height:20px">
		 	</div>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active well col-md-8 col-md-offset-2" id="ask">
						<form action="regis.php" method="POST">
							<span class="field-description">Reciever's Name(Full Name):</span>
							<input class="fixed-input" type="text" name="db_cp_full_name" ><br>
						    <span class="field-description">Username:</span>
							 <input class="fixed-input" type="text" name="db_cp_username" ><br>
							<span class="field-description">Email Address:</span> 
							<input class="fixed-input" type="text" name="db_cp_email" ><br>
							<span class="field-description">Password:</span> 
							<input class="fixed-input" type="password" 
							 name="db_cp_password" ><br>
							<span class="field-description">Confirm Password:</span> 
							<input class="fixed-input" type="password" name = "db_cp_conf_password" ><br>
							<span class="field-description">Address:</span> 
							<input class="fixed-input" type="text" name="db_cp_send_addr"  ><br>
							<span class="field-description">Credit Card Number:</span> 
							<input class="fixed-input" type="text" name="db_cp_credit_id"  ><br>
							<span class="field-description">Card Code Verification:</span> 
							<input class="fixed-input" type="password" name="db_cp_ccv" ><br>
							<input type="hidden" name="db_cp_type" value="client">
							<input type="Submit"  name="db_cp_submit" value="Confirm">
		 				</form>
				</div>
						
			</div>
		<div class="col-md-8 col-md-offset-2">
    			<h3><a href="index.php"><span class="label label-success">Back</span>
				</a></h3>
		</div>
</body>
</html>
