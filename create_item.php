<?php require_once("includes/init.php"); ?>
<?php require_once(resolvePath("includes/header.php")); ?>
<?php $uid = $_GET['uid'];?>
<script>
	$("#menu_create_item").addClass("active");
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
    		<h1><span class="label label-primary">Add Item</span></h1>	
		</div>
		<!-- Nav tabs -->
			<div class="col-md-8 col-md-offset-2" style="height:20px">
		 	</div>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active well col-md-8 col-md-offset-2" id="add_item">
						<form action="upload_file.php" method="post"
							enctype="multipart/form-data">
							<span class="field-description">Item Name: </span>
							<input class="fixed-input" type="text" name="db_cp_item_name" ><br>
						    <span class="field-description">Category: </span>
							   <select name="db_cp_item_cat">
							   	<option value="1">Audios & Books</option>
							   	<option value="2">Clothings & Shoes</option>
							   	<option value="3">Electronics Devices</option>
							   	<option value="4">Home & Accessories</option>
							   </select>
							   <br>
							<span class="field-description">Price/Unit(Bht):</span> 
							<input class="fixed-input" type="text" name="db_cp_item_price" ><br>
							<span class="field-description">Amount Available(pcs):</span> 
							<input class="fixed-input" type="text" 
							 name="db_cp_item_amount" ><br>
							<span class="field-description">Item Description:</span> 
							<input class="fixed-input" type="text" name = "db_cp_item_desc" ><br>
							<span class="field-description">Item Image:</span>
							<input class="fixed-input" type="file" name="file" id="file"><br>
							<input type="hidden" name="user_id" value="<?php echo $uid; ?>">
							<input type="submit"  name="db_cp_submit" value="Confirm">
		 				</form>
				</div>
						
			</div>
		<div class="col-md-8 col-md-offset-2">
    			<h3><a href="index.php"><span class="label label-success">Back</span>
				</a></h3>
		</div>
</body>
</html>
